<div class="col-lg-8">
	<div class="row">
		<div class="col-lg-12">
			<div id="carousel-news" class="carousel slide" data-ride="carousel">
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<?php $first = true; $itemClass=''; foreach ($carrousels as $item) { ?>
					<?php if($first){ $itemClass = 'item active'; $first=false; }else{$itemClass = 'item';} ?>
					<div class="<?php echo $itemClass ?>" style="background-image: url('<?php echo Yii::app()->request->baseUrl.'/images/carousel/'.$item->image_path ?>'); background-size: cover;">
						<div class="carousel-caption ellipsis">
							<h4><?php echo CHtml::link($item->article->title,array('/article/view', 'id'=>$item->article->id)); ?></h4>
							<p><?php echo strip_tags($item->article->content) ?></p>
						</div>
					</div>
					<?php } ?>
				</div>
				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-news" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				<a class="right carousel-control" href="#carousel-news" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
			</div>
		</div>
	</div>
	<div class="row">
		<?php for ($i = 0; $i < 5; $i++) { ?>
			<?php if ($i == 0) { ?>
				<div class="col-lg-12">
			<?php }else{ ?>
				<div class="col-lg-6">
			<?php } ?>
				<div class="article">
					<div class="cogo-header">SECCION</div>
					<div class="article-container ellipsis">
						<div class="article-header">
							<h3><?php echo CHtml::link($articles[$i]->title,array('/article/view', 'id'=>$articles[$i]->id)); ?></h3>
							<hr class="title-separator"/>
							<p class="subtitle"><?php echo $articles[$i]->subtitle ?></p>
						</div>
						<div class="article-content" stlye="position: absolute;">
							<?php if(!(isset($articles[$i]->thumbnail_img_path)&&(trim($articles[$i]->thumbnail_img_path)===''))){ ?>
							<div class="article-img col-sm-6 thumbnail">
								
									<img src="<?php echo Yii::app()->request->baseUrl.'/images/article/'.$articles[$i]->id.'/'.$articles[$i]->thumbnail_img_path ?>"
										alt="thumbnail_img">
								
							</div>
							<?php }?>
							<div class="article-text">
								<?php echo strip_tags($articles[$i]->content) ?>
							</div>
						</div>
					</div>
					<div class="article-footer">
						<hr class="footer-separator"/>
						<div class="left small"><em>Fecha de publicación: <?php echo $articles[$i]->created_date ?></em></div>
						<div class="right">por <a href="#"><?php echo $articles[$i]->author->username ?></a></div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<div class="col-lg-4">
	<div class="row">
		<div class="col-lg-12">
			<?php $this->widget('efullcalendar-master.EFullCalendar', array(
				'options'=>array(
					'header'=>array(
						'left'=>'title',
						'center'=>'',
						'right'=>'prev,next'
					),
					'events'=>$events,
					'theme'=>true
				)));
			?>
		</div>
	</div>
	<div class="row eventos-list">
		<h3>Próximos eventos:</h3>
		<ul class="event-list">
			<?php foreach ($eventsData as $event) { ?>
				<li>
					<div class="event-object">
						<span class="event-title-object"><?php echo $event->id ?></span>
					</div>
					<p><?php echo $event->event_date.' - '.$event->name?><p>
				</li>
			<?php } ?>
		</ul>
	</div>
	<hr/>
	<div class="row" style="text-align: center;">
		<div class="fb-likebox-container">
			<?php $this->widget('ext.faceplugs.LikeBox', array(
				'url' => $this->createAbsoluteUrl('/'),
				'colorscheme' => 'dark',
				'href' => 'https://www.facebook.com/Cogollosdeloesteargentina',
				'show_faces' => 'true',
				'header' => 'true',
				'stream' => 'false',
			)); ?>
		</div>
	</div>
	<hr/>
	<div class="row" style="text-align: center;">
		<?php $this->widget('application.extensions.YiiTagCloud.YiiTagCloud', 
			array(
				'beginColor' => 'FFAD29',
				'endColor' => 'FA5C1E',
				'minFontSize' => 8,
				'maxFontSize' => 20,
				'htmlOptions' => array('style'=>'width: 90%; margin-left: auto; margin-right: auto'),
				'arrTags' => $tagsCount,
				)
		); ?>
	</div>
</div>
<script type="text/javascript" language="javascript" charset="utf-8">
	$('#carousel-news').on('slid.bs.carousel', function () {
		$('.carousel-caption.ellipsis').dotdotdot({
			after: '<a href="#" onclick="carrouselRedirectToArticle(this); return false;" title="read more" class="readmore">Leer más »</a>'
		});
	});

	$( window ).load(function() {
		$('.article-container.ellipsis, .carousel-caption.ellipsis').dotdotdot({
			after: '<a href="#" onclick="redirectToArticle(this); return false;" title="read more" class="readmore">Leer más »</a>'
		});
		$('.carousel-caption.ellipsis').dotdotdot({
			after: '<a href="#" onclick="carrouselRedirectToArticle(this); return false;" title="read more" class="readmore">Leer más »</a>'
		});
	});

	function redirectToArticle(hrefObject){
		var redirectLink = $(hrefObject).parent().parent().parent().find('.article-header h3 a').attr('href');
		window.location.replace(redirectLink);
	}

	function carrouselRedirectToArticle(hrefObject){
		var redirectLink = $(hrefObject).parent().parent().find('h4 a').attr('href');
		window.location.replace(redirectLink);
	}
	
</script>