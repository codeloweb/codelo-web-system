<?php
$this->breadcrumbs=array(
	'Carrousels'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List carrousel', 'url'=>array('index')),
	array('label'=>'Create carrousel', 'url'=>array('create')),
	array('label'=>'View carrousel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage carrousel', 'url'=>array('admin')),
);
?>

<h1>Update carrousel <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>