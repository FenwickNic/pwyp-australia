<?php
	include 'class.phpmailer.php';
	
	define('DEBUGMODE',0);
	
	/**********************************
	**PRODUCTION
	**
	************************************/
	define('SMTPHOST','smtp.anchor.net.au'); 			//Set the SMTP Address
	define('SMTPPORT','25');
	define('SMTPUSERNAME','pwypaus');
	define('SMTPPASSWORD','gg9tpBb3');
	
	define('HOST','localhost');					//Set the Database
	define('DBNAME','pwypaus');
	define('USER','pwypaus');
	define('PASSWORD','wzxSfd6wR2');
	
	//////////////////////////////////////////////////////
	
	define('ERROR1', 'Database Connection Error');
	define('ERROR2', 'Invalid Stored Procedure');
	define('ERROR3', 'Invalid Request');
	define('ERROR4', 'Email not sent');

$response = array();
if (!isset($_POST['data']) ){
	$response['status'] = 'error';
	$response['error'] = ERROR3;
	echo json_encode($response);
	return;
}	
	
$data = json_decode($_POST['data']);
$business = new Engine();

$action = $data->action;
if($action == 'count'){
	echo json_encode($business->getcount());
	return;
}elseif($action == 'submit'){
	$firstname = $data->firstname;
	$lastname = $data->lastname;
	$postcode = $data->postcode;
	$email = $data->email;
	$message = $data->message;
	if($firstname != 'Test' && $lastname != 'Test'){
		$response = $business->insert($firstname, $lastname, $postcode, $email, $message);
		if($response['status'] == 'success'){
			
			$resultCount = $business->getcount();
			$count='';
			if($resultCount['status'] == 'success'){
				$count = $resultCount['count'];
			}
			$response['count'] = $count;
	
			$response['error'] = '';
			if(!$business->sendThanksEmail($email,$message,$firstname, $lastname)){
				$response['error'] .= ERROR4.' THANKS';
			}
			if(!$business->sendTreasurerEmail($email,$message,$firstname, $lastname)){
				$response['error'] .= ERROR4.' TREASURER';
			}
			if(!$business->sendMinisterEmail($email,$message,$firstname, $lastname)){
				$response['error'] .= ERROR4.' MINISTER';
			}
			
			if(!$business->sendAssistantTreasurerEmail($email,$message,$firstname, $lastname)){
				$response['error'] .= ERROR4.' ASSISTANT';
			}
			if(!$business->sendPWYPEmail($email,$message,$firstname, $lastname,$count)){
				$response['error'] .= ERROR4.' PWYP';
			}
					
		}
	}else{
		$response['status'] = 'success';
	}
	echo json_encode($response);
	return;
}



class Engine{
	
	private $connectionHandler;
	private $mailHandler;
	
	private $treasurerAddress = 'claires@oxfam.org.au';			//CHANGE ADDRESS HERE
	private $assistantTreasurer = 'claires@oxfam.org.au';
	private $PWYPAddress = 'nicolas.fenwick@gmail.com';
	private $minister = 'claires@oxfam.org.au';
	
	function __construct(){
	//Create database connection
		$this->connectionHandler = new mysqli(HOST, USER, PASSWORD, DBNAME);
		if ($this->connectionHandler->connect_errno) {
			$response['status'] = 'error';
			$response['error'] = ERROR1;
			echo json_encode($response);
			exit;
		}
	//Create SMTP Connection
		$this->mailHandler = new PHPMailer();
		$this->mailHandler->IsSMTP();
		$this->mailHandler->SMTPDebug  = DEBUGMODE;
		$this->mailHandler->Debugoutput = 'html';
		$this->mailHandler->Host       = SMTPHOST;
		$this->mailHandler->Port       = SMTPPORT;
		$this->mailHandler->SMTPAuth   = true;
		$this->mailHandler->Username   = SMTPUSERNAME;
		$this->mailHandler->Password   = SMTPPASSWORD;
		return;
	}
	
	function __destruct(){
		$this->connectionHandler->close();
	}
	
	//Get Count
	function getcount(){
		if (!$this->connectionHandler->real_query("CALL letters_count()")) {
			$local_response['status'] = 'error';
			$local_response['error'] = ERROR2;
			return $local_response;
		}else{
			if ($this->connectionHandler->field_count) {
				$res = $this->connectionHandler->store_result();
				$result = $res->fetch_assoc();
				$local_response['count'] = $result['count(*)'];
				$local_response['status'] = 'success';
				$res->free();
				return $local_response;			
			} else {
				if ($this->connectionHandler->errno) {
					$local_response['status'] = 'error';
					$local_response['error'] = ERROR2;
					return $local_response;
				}
			}
		}	
	}

	//Insert Message
	function insert($firstname, $lastname, $postcode, $email, $message){
		$escapedMessage = $this->connectionHandler->real_escape_string($message);
		if (!$this->connectionHandler->query("CALL letters_insert('".$firstname."', '".$lastname."', '".$postcode."', '".$email."', '".$escapedMessage."');")) {
			$local_response['status'] = 'error';
			$local_response['error'] = ERROR2;
			$local_response['errortext'] = $this->connectionHandler->error;
			return $local_response;
		}else{
			$local_response['status'] = 'success';
			return $local_response;
		}	
	}
	
	function sendThanksEmail($email,$message,$firstname, $lastname){
		$this->mailHandler->ClearAddresses();
		$this->mailHandler->SetFrom('no-reply@pwypaustralia.org');
		$this->mailHandler->AddAddress($email,$firstname.' '.$lastname);
		$this->mailHandler->Subject = 'Publish What You Pay Australia thanks you';
		$this->mailHandler->MsgHTML(file_get_contents('mis/email/thank-email.html'), dirname(__FILE__));
		$this->mailHandler->AltBody = 'Thanks!\r\n Thanks for asking the Treasurer to take action on transparency laws in relation to mining.\n
				Please ask your friends or family to support this initiative too. ';
		if(!$this->mailHandler->Send()) {
			return false;
		} else {
			return true;
		}
	}
	
	function sendTreasurerEmail($email,$message,$firstname, $lastname){
		$this->mailHandler->ClearAddresses();
		$messageToSend = "<p>Dear Treasurer,</p>".$message."<p>Yours Sincerely.</p>";
		
		$this->mailHandler->SetFrom('no-reply@pwypaustralia.org');
		//$this->mailHandler->AddReplyTo($email, $firstname.' '.$lastname);
		$this->mailHandler->AddAddress($this->treasurerAddress);
		$this->mailHandler->Subject = 'Please act and bring transparency to the mining, oil and gas industries';
		$this->mailHandler->MsgHTML($messageToSend);
		$this->mailHandler->AltBody = strip_tags($messageToSend);
		if(!$this->mailHandler->Send()) {
			return false;
		} else {
			return true;
		}
	}
	
	function sendAssistantTreasurerEmail($email,$message,$firstname, $lastname){
		$this->mailHandler->ClearAddresses();
		$messageToSend = "<p>Dear Assistant Treasurer,</p>".$message."<p>Yours Sincerely.</p>";
		
		$this->mailHandler->SetFrom('no-reply@pwypaustralia.org');
		//$this->mailHandler->AddReplyTo($email, $firstname.' '.$lastname);
		$this->mailHandler->AddAddress($this->assistantTreasurer);
		$this->mailHandler->Subject = 'Please act and bring transparency to the mining, oil and gas industries';
		$this->mailHandler->MsgHTML($messageToSend);
		$this->mailHandler->AltBody = strip_tags($messageToSend);
		if(!$this->mailHandler->Send()) {
			return false;
		} else {
			return true;
		}
	}
	
	function sendMinisterEmail($email,$message,$firstname, $lastname){
		$this->mailHandler->ClearAddresses();
		$messageToSend = "<p>Dear Minister,</p>".$message."<p>Yours Sincerely.</p>";
		
		$this->mailHandler->SetFrom('no-reply@pwypaustralia.org');
		//$this->mailHandler->AddReplyTo($email, $firstname.' '.$lastname);
		$this->mailHandler->AddAddress($this->minister);
		$this->mailHandler->Subject = 'Please act and bring transparency to the mining, oil and gas industries';
		$this->mailHandler->MsgHTML($messageToSend);
		$this->mailHandler->AltBody = strip_tags($messageToSend);
		if(!$this->mailHandler->Send()) {
			return false;
		} else {
			return true;
		}
	}
	
	function sendPWYPEmail($email,$message,$firstname, $lastname,$count){
		$this->mailHandler->ClearAddresses();
		$messageCount = '';
		if(is_numeric($count)){
			$messageCount = "<p>The action has been taken <strong> ".$count." </strong> times.</p>";
		}
		
		$messageToSend = "<p>Hi Claire,</p><p>".$firstname." ".$lastname." has taken the e-action. This is the message that has been sent:</p>". $message . $messageCount;
		
		$this->mailHandler->SetFrom('no-reply@pwypaustralia.org');
		//$this->mailHandler->AddReplyTo($email,$firstname.' '.$lastname);
		$this->mailHandler->AddAddress($this->PWYPAddress);
		$this->mailHandler->Subject = $firstname.' '.$lastname.' has taken the e-action';
		$this->mailHandler->MsgHTML($messageToSend);
		$this->mailHandler->AltBody = strip_tags($messageToSend);
		if(!$this->mailHandler->Send()) {
			return false;
		} else {
			return true;
		}
	}
}
?>