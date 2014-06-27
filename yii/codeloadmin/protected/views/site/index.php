<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1><i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Bienvenido <?php echo Yii::app()->user->name; ?>.</p>

<p>Este sitio administrará el contenido de la web pública de Cogollos Del Oeste</p>
