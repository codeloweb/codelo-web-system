<?php
$this->breadcrumbs=array(
	'Events'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List event', 'url'=>array('index')),
	array('label'=>'Manage event', 'url'=>array('admin')),
);
?>

<h1>Create event</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>