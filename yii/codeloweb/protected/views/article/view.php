<div class="col-lg-12">
	<div class="row">
		<div class="col-lg-9">
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
	</div>
</div>


<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'subtitle',
		'content',
		'id_user_author',
		'created_date',
		'sources',
		'thumbnail_img_path',
	),
)); */?>
