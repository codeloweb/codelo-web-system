<?php
$this->breadcrumbs=array(
	'Carrousels',
);

$this->menu=array(
	array('label'=>'Create carrousel', 'url'=>array('create')),
	array('label'=>'Manage carrousel', 'url'=>array('admin')),
);
?>

<h1>Carrousels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
