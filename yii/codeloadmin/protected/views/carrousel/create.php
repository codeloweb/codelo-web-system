<?php
$this->breadcrumbs=array(
	'Carrousels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List carrousel', 'url'=>array('index')),
	array('label'=>'Manage carrousel', 'url'=>array('admin')),
);
?>

<h1>Create carrousel</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>