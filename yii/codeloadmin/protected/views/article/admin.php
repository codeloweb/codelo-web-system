<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List article', 'url'=>array('index')),
	array('label'=>'Create article', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#article-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Articles</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'article-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'subtitle',
		/*'content',*/
		array(            // display 'create_time' using an expression
            'name'=>'id_user_author',
            'value'=>'$data->author->username',
		),
 		'created_date',
		array(            // display 'create_time' using an expression
            'name'=>'verified',
            'value'=>'$data->verified ? "<div class=label-success>Autorizado</div>" : "<div class=label-important>No Autorizado</div>"',
            'type'=>'html'
        ),
		/*
		'sources',
		'thumbnail_img_path',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
