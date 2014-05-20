<?php
$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List event', 'url'=>array('index')),
	array('label'=>'Create event', 'url'=>array('create')),
	array('label'=>'View event', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage event', 'url'=>array('admin')),
);
?>

<h1>Update event <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>