<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('BagaB_Dev', 'BagaB');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php header('Content-type: text/html; charset=UTF-8') ;?>
	<?php echo $this->Html->charset('UTF-8'); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo '<link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">';
		echo '<link href="http://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css">';
		echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
		echo $this->Html->meta('icon');

		echo $this->Html->css('custom');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-responsive.min');
		echo $this->Html->css('font-awesome-ie7.min');
		echo $this->Html->css('font-awesome.min');
		echo $this->Html->css('jquery-ui-1.8.18.custom');
		
		echo $this->Html->script('jquery-1.7.1.min');
		echo $this->Html->script('jquery-ui-1.8.18.custom.min');
		echo $this->Html->script('jquery.validate.min.js');
		echo $this->Html->script('cakebootstrap.js');
		echo $this->Html->script('bootstrap.min.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25012749-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
	<div id='modal_conditions' title='Conditions g&eacute;n&eacute;rales' style="display:none"><?php echo $this->Element('Conditions');?></div>
	<div id='wrapper'>
	<header>
		<div class="navbar">
			<div class="navbar-inner">
			<ul class='nav pull-right' style="margin:0px">
				<li class='<?php echo isset($ishome)?'active':''?>'><a href='/'><i class='icon-home'></i>Acceuil</a></li>
				<li class='<?php echo isset($isrental)?'active':''?>'><a href='/products/index'>Louez</a></li>
				<li class='<?php echo isset($isalumes)?'active':''?>'><a href='/Pages/alumes'>ALUm&eacute;s</a></li>
				<!--li><a href='/Pages/bureau'>Bureautique</a></li-->
				<li class="divider-vertical"></li>
				<?php echo $this->Auth->Widget(); ?>
				<li class="divider-vertical"></li>
				<li class='dropdown' id='shoppingCartPanel'>
					<?php echo $this->Cart->Widget() ?>
				</li>
			</ul>
			<h3 style='margin:0px;padding:0px' class='brand'>bagab</h3>
			</div>
		</div>
		
	</header>
	<div id="content">
			<?php 
			if (isset($subtitle)){
				echo '<section class=\'subhead jumbotron\'>';
				echo '<h1>'.$subtitle.'</h1>';
				echo '<p>'.$paragraph_for_subtitle.'</p>';
				echo '</section>';
			}?>
			<div id="error-label">
			<?php
			if(isset($error_for_layout)){
				echo $this->element('Message', array(
								'messageList'=>$error_for_layout,
								'messageType'=>'error'
							));
			}
			if(isset($warning_for_layout)){
				echo $this->element('Message', array(
								'messageList'=>$warning_for_layout,
								'messageType'=>'warning'
							));
			}
			if(isset($information_for_layout)){
				echo $this->element('Message', array(
								'messageList'=>$information_for_layout,
								'messageType'=>'information'
							));
			}
			?>
			</div>
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
	</div>
	<footer>
		<div class='bar-color'></div>
		<div class='container'>
			<center><span><a href='#' class='open_modal_conditions'>Conditions G&eacute;n&eacute;rales</a></span></center>
		    <address class='pull-right'>
				<strong>BagaB.</strong><br>
				R&eacute;sidence Edelweiss<br>
				Bat. 1A RDC<br>
				38610 Gi&egrave;res<br>
				<i class='icon-phone'></i>06 47 07 62 53<br>
				<i class='icon-envelope'></i>bap.roux@gmail.com
			</address>
		</div>
	</footer>
	<?php 
		echo $this->element('sql_dump');
		?>
	
	</div>
	<script type='text/javascript'>
	function updateCart(sum){
		var panel = $("#shoppingCartPanel");
		if(sum > 0){
			//Check that we are already using a drop down list if not update it.
			$('#shoppingCartPanel>a').removeClass('disabled').html("<i class='icon-shopping-cart'></i>Panier : &#8364; "+ sum +" <i class='caret'></i>");
		}else{
			//Take the DropDown List off
			$('#shoppingCartPanel>a').addClass('disabled').html("<i class='icon-shopping-cart'></i>Panier : Vide");
		}		
	}
	$(document).ready(function()
	{
		$('.accordion').accordion();
		$('#modal_conditions').dialog({
		    modal: true,
			width: '80%',
			height: 400,
			autoOpen:false,
			buttons: {
				Ok: function() {
					$( this ).dialog( "close" );
				}
			}
		});
		$('.open_modal_conditions').click(function(){
			$('#modal_conditions').dialog('open');
			return false;
		});
	
	});
	</script>
</body>
</html>
