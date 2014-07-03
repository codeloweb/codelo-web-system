<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->title,
);

/*$this->menu=array(
	array('label'=>'List article', 'url'=>array('index')),
	array('label'=>'Create article', 'url'=>array('create')),
	array('label'=>'Update article', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete article', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage article', 'url'=>array('admin')),
);*/
?>

<!--<h1>View article #<?php echo $model->id; ?></h1>-->

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'subtitle',
		'id_user_author',
		'id_section',
		'created_date',
		'sources',
		'thumbnail_img_path',
	),
));*/ ?>
<?php  
  $baseUrl = Yii::app()->baseUrl; 
  Yii::app()->getClientScript()->registerCssFile($baseUrl.'/css/bootstrap.css');
  Yii::app()->getClientScript()->registerCssFile($baseUrl.'/css/article-view.css');
?>
<?php if(Yii::app()->user->getIsSuperuser()){
	if(!$model->verified){ ?>
		<div class="msg-box-red">
			Este artículo no está autorizado.
		</div>
		<?php echo CHtml::button('Autorizar', array(
		'submit' => $this->createUrl('Authorize',
			array('command'=>'authorize','key'=>$model->id)),
			'confirm'=>"Está seguro que desea autorizar este artículo ?",
			'class' => 'btn btn-success')); ?>
	<?php }else{ ?>
	<div class="msg-box-green">
		Este artículo está autorizado.
	</div>
	<?php echo CHtml::button('Desautorizar', array(
		'submit' => $this->createUrl('Disavow',
			array('command'=>'disavow','key'=>$model->id)),
			'confirm'=>"Está seguro que desea desautorizar este artículo ? ?",
			'class' => 'btn btn-danger')); ?>
	<?php }
} ?>
<p><b>Preview:</b></p>
<div class="col-lg-12">
	<div class="article main">
		<div class="cogo-header"><?php echo $model->section->name ?></div>

		<div class="article-main-container ellipsis">
			<div class="article-header">
				<h3><?php echo $model->title ?></h3>
				<hr class="title-separator"/>
				<div class="article-author-date col-lg-12">
					<div class="fb-likebutton-container">
						<?php $this->widget('ext.faceplugs.LikeButton', array(
							'url' => $this->createAbsoluteUrl('/'),
							'layout'=>"button",
							'share'=>'true',
							'href' => $this->createAbsoluteUrl('/').Yii::app()->request->url,
						)); ?>
					</div>
					<p>por <a href="#"><?php echo $model->author->username ?></a> | Publicación: <?php echo $model->created_date ?></p>
				</div>
				<p class="subtitle"><?php echo $model->subtitle ?></p>
			</div>
			<div class="article-content">
				<p class="article-text">
					<?php echo $model->content ?>
				</p>
			</div>
			<?php if(!empty($model->sources)){ ?>
				<blockquote class="article-sources">
					<p>Fuentes:<p>
					<p><?php echo $model->sources ?></p>
				</blockquote>
			<?php } ?>
			<pre class="article-tags"><span class="glyphicon glyphicon-tags"></span><?php echo $model->tags->toString() ?></pre>
			<div class="article-author-date col-lg-12">
				<div class="fb-likebutton-container">
					<?php $this->widget('ext.faceplugs.LikeButton', array(
						'url' => $this->createAbsoluteUrl('/'),
						'layout'=>"button",
						'share'=>'true',
						'href' => $this->createAbsoluteUrl('/').Yii::app()->request->url,
					)); ?>
				</div>
				<p>por <a href="#"><?php echo $model->author->username ?></a> | Publicación: <?php echo $model->created_date ?></p>
			</div>
		</div>
		<div style="width: 95%; margin: 0 auto 0 auto;">
			<?php $this->widget('ext.faceplugs.Comments', array(
				'url' => $this->createAbsoluteUrl('/'),
				'colorscheme' => 'dark',
				'width' => '100%',
				'href' => $this->createAbsoluteUrl('/').Yii::app()->request->url,
			)); ?>
		</div>
	</div>
</div>
