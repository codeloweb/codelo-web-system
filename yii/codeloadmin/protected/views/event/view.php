<?php
$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List event', 'url'=>array('index')),
	array('label'=>'Create event', 'url'=>array('create')),
	array('label'=>'Update event', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete event', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage event', 'url'=>array('admin')),
);
?>

<h1>View event #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'event_date',
		'id_article',
	),
)); ?>
