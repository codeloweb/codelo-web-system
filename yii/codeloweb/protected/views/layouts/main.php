<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fullcalendar.css"/>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui/jquery-ui.custom.css" />
	
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body>
	<div id="fb-root"></div>
	
	<!--[if lt IE 7]>
		<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->
	
	<!-- Start page content -->
	<div class="container">
		<header class="text-center">
			<img class="logo" src="images/LogoCodelo3.png"/>
		</header>
		<nav class="navbar navbar-inverse" role="navigation">
			<ul class="nav navbar-nav" style="width:70%;">
				<li class="text-center" style="width:20%;"><?php echo CHtml::link('<span class="glyphicon glyphicon-home"></span> HOME',array('site/index')); ?></li>
				<li class="text-center" style="width:20%;"><?php echo CHtml::link('<span class="glyphicon glyphicon-book"></span> INSTITUCIONAL',array('site/institucional')); ?></li>
				<!--<li class="text-center" style="width:15%;" class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">SECCIONES</a>
					<ul style="width: 15em;" class="dropdown-menu">
						<li><a href="#">CAÑAMO INDUSTRIAL</a></li>
						<li><a href="#">CULTIVO</a></li>
						<li><a href="#">MEDICINAL</a></li>
						<li><a href="#">LEGALES</a></li>
					</ul>
				</li>!-->
				<li class="text-center" style="width:20%;"><a href="a.html"><span class="glyphicon glyphicon-calendar"></span> EVENTOS</a></li>
				<li class="text-center" style="width:20%;"><?php echo CHtml::link('<span class="glyphicon glyphicon-credit-card"></span> ASOCIATE',array('site/asociate')); ?></li>
				<li class="text-center" style="width:20%;"><?php echo CHtml::link('<span class="glyphicon glyphicon-envelope"></span> CONTACTO',array('site/contact')); ?></li>
			</ul>
			<form class="navbar-form navbar-left" role="search" style="width:30%;">
				<div class="input-group" style="height: 10px;">
			      <input type="text" class="form-control" style="background-color: #383838; border: 1px solid #222222;">
			      <span class="input-group-btn">
			        <button class="btn btn-info" type="button" style="max-height: 34px; border: 1px solid #222222;"><span class="glyphicon glyphicon-search"></span></button>
			      </span>
			    </div>
			</form>
		</nav>
		<div class="container-fluid glass-container" style="left: -99999px;">
			<div class="row">
				<?php echo $content; ?>
			</div>
			<hr class="footer-separator" />
			<div class="row footer">
				<div class="col-lg-9 disclaimer">
					<img class="img-rounded footer-logo" src="images/logo.png" alt="logo_codelo" />
					<p>Portal de difusi&oacute;n de noticias, informaci&oacute;n y actividades por la normalizaci&oacute;n del cannabis de la Agrupaci&oacute;n Cogollos del Oeste .- Cogollos del Oeste es una organizaci&oacute;n sin fines de lucro, cuyo principal objetivo es lograr la normalizacion de la planta y la despenalizaci&oacute;n de su consumo y cultivo, en todas sus subespecies (sativa, indica y rudelaris) y para todos sus usos (medicinal, industrial y l&uacute;dico)</p>
				</div>
				<div class="col-lg-3 social-links">
					<div class="social-button-containers">
						<a href="https://www.facebook.com/Cogollosdeloesteargentina"><img width="42" src="images/social_buttons/facebook_button.png"></a>
						<img width="42" src="images/social_buttons/twitter_button.png">
						<img width="42" src="images/social_buttons/youtube_button.png">
						<img width="42" src="images/social_buttons/google_plus_button.png">
					</div>
				</div>
			</div>
		</div>

	</div>
	<?php 
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/vendor/jquery-1.10.1.min.js');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/vendor/bootstrap.min.js');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.dotdotdot.min.js');

		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/plugins.js');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/main.js');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/fullcalendar.js');
	?>
	<!-- End page content -->
	<script type="text/javascript" language="javascript" charset="utf-8">
		$( window ).load(function() {
			$('.container-fluid.glass-container').hide();
			$('.container-fluid.glass-container').css('left','0');
			$('.container-fluid.glass-container').fadeIn(3000);
		});
	</script>
</body>
</html>
