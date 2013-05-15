<?php
	$firstname = '';
	$lastname = '';
	$postcode = '';
	$email = '';
	if(isset($_GET['firstname'])){
		$firstname = $_GET['firstname'];
	}
	if(isset($_GET['lastname'])){
		$lastname = $_GET['lastname'];
	}
	if(isset($_GET['postcode'])){
		$postcode = $_GET['postcode'];
	}
	if(isset($_GET['email'])){
		$email = $_GET['email'];
	}
?>
<!doctype html>
<html>
<head>
	<title>Publish What You Pay Australia - Our resources, our right to know</title>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
	<meta name="description" content="Publish What You Pay is a global campaign for transparency and accountability in the mining and oil and gas industries. In Australia, the campaign is supported by a coalition of organisations and individuals that are committed to ensuring that citizens of resource-rich countries benefit from their natural wealth.">
	<meta name="keywords" content="Mining, oil and gas, transparency, accountability, natural wealth">
	<meta name="author" content="Nicolas Fenwick">
	<meta name="robots" content="noindex, nofollow">
		<link type="image/x-icon" href="mis/img/favicon.ico" rel="shortcut icon">
	<script src='mis/js/jquery-1.7.1.min.js' type='text/javascript'></script>
	<script src='mis/js/jquery.knob.js' type='text/javascript'></script>
	<script src='mis/js/jquery.validate.min.js' type='text/javascript'></script>
	<link rel="stylesheet" type="text/css" href="mis/css/main.css">
	<link rel="stylesheet" type="text/css" href="mis/css/orangebox.css">
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-40671337-1']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
	<!--[if IE 7]>
		<link rel="stylesheet" media="all" href="mis/css/fontawesome-ie7.css" />
	<![endif]-->
</head>
<body id='act-now'>
	<nav class='website'>
		<a href='index.php'>
			<span class='arrow'><img src='mis/img/img-arrow-left.png' alt='arrow left'></span>
			<span class='link'>BACK TO THE WEBSITE</span>
		</a>
	</nav>
	<div class='content'>
		<!--div class='fillette'></div-->
	<div class='section-wrapper'>
		<div class='container-top'>
			<div style='padding-top:50px;display:inline-block;width:70%;text-align:justify;margin:0px 5%'><h1>Call on the Australian Government to act</h1>
			<p>Income from minerals and oil and gas should be one of the greatest sources of wealth for resource-rich developing countries. But almost 3.5 billion people living in these countries often don’t receive it.</p>
			<p>Laws similar to that recently introduced by the United States Government and forthcoming in the European Union could change this. These laws require mining, oil and gas companies to report the taxes and royalties they pay government in the countries where they are mining or extracting oil and gas. Such legislation could help citizens of developing countries to hold their governments to account for these revenues.</p>
			<p>Please send a message to the Minister for Resources and Energy, Gary Gray, the Treasurer, Wayne Swan and Assistant Treasurer, David Bradbury, to say that you would like to see similar legislation introduced in Australia.</p>
			</div>
			<div class='chart-wrapper' style='display:inline-block;text-align:center;'>
				<div>GOAL:<span id='goal'></span></div>
				<input type='text' value='100' class='chart'/>
				<span class='signatures' style='font-size:30px;display:block;'></span> <span>signatures</span>
			</div>
		</div>
	
	<div class='form-wrapper'>	
		<form id='form'>
			<div class='form-item'>
				<label for='form-firstname' class='required'>First Name</label>
				<input type='text' id='form-firstname' name='form-firstname' placeholder='First Name' value='<?php echo (sizeof($firstname) > 0 ? $firstname : '')?>'/>
			</div>
			<div class='form-item'>
				<label for='form-lastname' class='required'>Last Name</label>
				<input type='text' id='form-lastname' name='form-lastname' placeholder='Last Name' value='<?php echo (sizeof($lastname) > 0 ? $lastname : '')?>'/>
			</div>
			<div class='form-item'>
				<label for='form-postcode' class='required'>Postcode</label>
				<input type='text' id='form-postcode' name='form-postcode' placeholder='Postcode' value='<?php echo (sizeof($postcode) > 0 ? $postcode : '')?>'/>
			</div>
			<div class='form-item'>
				<label for='form-email' class='required'>Email</label>
				<input type='text' id='form-email' name='form-email' placeholder='Email' value='<?php echo (sizeof($email) > 0 ? $email : '')?>'/>
			</div>
			<hr/>
			<p>Dear [we'll insert name here],</p>
			<textarea name='form-message'>About 3.5 billion people live in countries rich in minerals and oil and gas.  Revenue from the mining and oil and gas industries is often one of the greatest sources of wealth generated within developing countries, but such wealth often provides little benefit to the people living in these countries, especially those living in poverty. This is due to losses from tax dodging by the companies involved or corruption by the governments of the countries in question.

Currently many mining, oil and gas companies only report their finances on a global or regional basis, making it impossible for communities to know how much tax and royalties have been paid to their governments.

I note the G20 countries, of which Australia is a member, has encouraged disclosures by the mining, oil and gas industries of payments made to governments. Further, the United States Government has introduced laws requiring companies in the mining, oil and gas industries listed on the US Securities and Exchange Commission to have to report on taxes and royalties paid to governments on a country-by-country and project-by-project basis. The European Union is also introducing laws that will require EU-listed companies as well as large private ones to disclose such payment information. I ask that your government introduce laws that would require mining, oil and gas companies listed on the Australian stock exchange or operating here to do the same.

This is a step towards reducing tax evasion and other forms of corruption by making it harder for companies to shift their revenues to tax havens unseen. It also increases the ability of citizens of developing countries to hold their own governments to account for the tax revenue they receive from natural resources. Please also work through the G20 and other international forums to ensure this transparency becomes a global standard.</textarea>
			<p>Yours sincerely.</p>
			<div class='button-holder'>
				<div class='btn next'>REVIEW <span class='chevron-right'></span></div>
			</div>
		</form>
		<div id='confirm'>
			<p>Please review the following information before we send them:</p>
			<div class='review' id='firstname'>
				<span class='label'>First Name</span><span class='value greyed'></span>
			</div>
			<div class='review' id='lastname'>
				<span class='label'>Last Name</span><span class='value greyed'></span>
			</div>
			<div class='review' id='postcode'>
				<span class='label'>Postcode</span><span class='value greyed'></span>
			</div>
			<div class='review' id='email'>
				<span class='label'>Email</span><span class='value greyed'></span>
			</div>
			<div class='review' id='message'>
				<span class='value'></span>
			</div>
			<div class='button-holder'>
				<div id='loader'></div>
				<div class='btn btn-grey back'>BACK</div>
				<div class='btn next'>SEND</div>
			</div>
			<input type='hidden' name='firstname' value=''/>
			<input type='hidden' name='lastname' value=''/>
			<input type='hidden' name='email' value=''/>
			<input type='hidden' name='postcode' value=''/>
			<input type='hidden' name='message' value=''/>
		</div>
		<div id='success'>
			<h1 class='jumbo'>Thanks!</h1>
			<p>
				Thanks for asking the Treasurer to take action on transparency laws in relation to mining.
				Please ask your friends or family to support this initiative too.
			</p>
			<p>
				<a href="index.php" class='btn'>BACK TO THE WEBSITE</a>
			</p>
		</div>
	</div>
		</div>
		</div>
	<div class='clear'></div>
	<div class='section act-now' id='footer'>
		<div class='top'></div>
		<span class='pull-left logo-black'>
		</span>
		<span class='pull-right fat-content'>
			FOR A LIST OF MEMBER ORGANISATIONS, THE LATEST NEWS AND RESOURCES PLEASE VISIT:<br/>
			<a href='http://www.publishwhatyoupay.org/where/coalitions/australia'>www.publishwhatyoupay.org/where/coalitions/australia</a>
		</span>
		<span class='clear'>
		</span>
	</div>

<script type='text/javascript'>
$(document).ready(function(){
	$('#loader').hide();
	
	$('#form').validate({
		rules:{
			'form-firstname':{
				required:true
			},
			'form-lastname':{
				required:true
			},
			'form-postcode':{
				required:true
			},
			'form-email':{
				required:true,
				email:true
			},
			'form-message':{
				required:true
			}
		},
		messages:{
			'form-firstname':"Please enter your first name.",
			'form-lastname':"Please enter your last name.",
			'form-postcode':"We need your postcode.",
			'form-email':"Please enter a valid email address.",
			'form-message':"Please enter your message."
		},
		showErrors: function(errorMap, errorList) {
			this.defaultShowErrors();
		}
	});
	
	var data = {};
	data.action = 'count';
	
	var jsonRequest = JSON.stringify(data);
	
	$.ajax({
		url: 'submit.php',
		type: 'post',
		dataType: 'json',
		data: {data : jsonRequest},
		success: function(response) {
			if(response.status == 'success'){
				$(".chart").val(response.count);
				$('.signatures').text(response.count);
				var max = 1000;
				var i = 1;
				while(response.count > (max * i) - 5){
					max = max*2;
					i++;
				}
				$('#goal').html('<h1>'+max+'</h1>');
				$(".chart").knob({
					'min':0
					,'max':max
					,'readOnly':true
					,'width':100
					,'height':100
					,'fgColor':'#0e71b4'
					,'inputColor':'#0e71b4'
				});
			}
		},
		error:function( req, status, err ) {
			console.log( 'Error in the request', status, err );
			$('.chart-wrapper').hide();
		}
	});
	
	
	//Button form next
	$('#form .next').click(function(){
		if($('#form').valid()){
			var firstname = $('#form input[name="form-firstname"]').val();
			var lastname = $('#form input[name="form-lastname"]').val();
			var postcode = $('#form input[name="form-postcode"]').val();
			var email = $('#form input[name="form-email"]').val();
			var message = $('#form textarea[name="form-message"]').val();
		
			HTMLmessage = "<p>" + message + "</p>";
			HTMLmessage = HTMLmessage.replace(/\r\n\r\n/g, "</p><p>").replace(/\n\n/g, "</p><p>");
			HTMLmessage = HTMLmessage.replace(/\r\n/g, "<br />").replace(/\n/g, "<br />");
		
			$('#confirm #firstname .value').html(firstname);
			$('#confirm #lastname .value').html(lastname);
			$('#confirm #postcode .value').html(postcode);
			$('#confirm #email .value').html(email);
			$('#confirm #message .value').html("<p>Dear [we'll insert name here],</p>" + HTMLmessage +"<p>Yours sincerely.</p>");
		
			$('#confirm input[name="firstname"]').val(firstname);
			$('#confirm input[name="lastname"]').val(lastname);
			$('#confirm input[name="postcode"]').val(postcode);
			$('#confirm input[name="email"]').val(email);
			$('#confirm input[name="message"]').val(HTMLmessage);
		
			$('#confirm').animate({top:'0px'});
		}
	});
	
	//Button confirm Next
	$('#confirm .next').click(function(){
		if($(this).not('.disabled')){
			$('#loader').show();
			$('.btn').addClass('disabled');
			var data = {};
			data.action = 'submit';
			data.firstname = $('#confirm input[name="firstname"]').val();
			data.lastname = $('#confirm input[name="lastname"]').val();
			data.postcode = $('#confirm input[name="postcode"]').val();
			data.email = $('#confirm input[name="email"]').val();
			data.message = $('#confirm input[name="message"]').val();
		
			var jsonRequest = JSON.stringify(data);
		
			//Send the request
			$.ajax({
				url: 'submit.php',
				type: 'post',
				dataType: 'json',
				data: {data : jsonRequest},
				success: function(response) {
					if(response.status == 'success'){
						$('#success').animate({top:'0px'});
						$('#form').remove();
						$('#confirm').remove();
						$('#loader').hide();
						$('.btn').removeClass('disabled');
						$(".chart").val(Number(response.count)).trigger('change');
						$('.signatures').text(response.count);
					}else{
						$('#loader').hide();
						$('.btn').removeClass('disabled');
					}
				},
				error:function( req, status, err ) {
					console.log( 'Error in the request', status, err );
					$('#loader').hide();
					$('.btn').removeClass('disabled');
				}
			});
		}
	});
	
	//Button confirm Back
	$('#confirm .back').click(function(){
		$('#confirm').animate({top:'1000px'});
	});
});
</script>
</body>
</html>