<?php
$this->breadcrumbs=array(
	'Carrousels'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List carrousel', 'url'=>array('index')),
	array('label'=>'Create carrousel', 'url'=>array('create')),
	array('label'=>'Update carrousel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete carrousel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage carrousel', 'url'=>array('admin')),
);
?>

<h1>View carrousel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_article',
		'image_path',
	),
)); ?>
