<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'enctype' => 'multipart/form-data',
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subtitle'); ?>
		<?php echo $form->textField($model,'subtitle',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'subtitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php
		/*this->widget('application.extensions.editor.CKkceditor',array(
			"model"=>$model,                # Data-Model
			"attribute"=>'content',         # Attribute in the Data-Model
			"height"=>'400px',
			"width"=>'100%',
			"filespath"=>(!$model->isNewRecord)?Yii::app()->basePath."/../media/paquetes/".$model->id."/":"",
			"filesurl"=>(!$model->isNewRecord)?Yii::app()->baseUrl."/media/paquetes/".$model->id."/":"",
		    ) 
		);*/
		$extEditMeOpt = array(
			'model'=>$model,
			'attribute'=>'content',
			'toolbar'=>array(
				array('Styles', 'Format', 'Font', 'FontSize',),
				array('Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat',),
				'/',
				array('JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'),
				
				array('Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo',),
				array('Find', 'Replace', '-', 'SelectAll', '-', 'Scayt'),
				'/',
				
				array('NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'BidiLtr', 'BidiRtl',),
				array('Link', 'Unlink', 'Anchor',),
				array('Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar'),
				'/',
				
				array('TextColor', 'BGColor',),
				/*array('Maximize', 'ShowBlocks',),*/
				array('Source',),
			),
			'ckeConfig'=>array(
				'scayt_sLang'=>'es_ES',
				'scayt_autoStartup'=>true,
			),
		);
		if(!$model->isNewRecord){
			$extEditMeOpt['filebrowserImageBrowseUrl']=Yii::app()->baseUrl.'/protected/extensions/ResponsiveFilemanager-master/filemanager/dialog.php?lang=es&type=1&popup=1&field_id=cke_86_textInput&fldr='.$model->id;
		}
		$this->widget('ext.editMe.widgets.ExtEditMe', $extEditMeOpt); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'name' => 'tags',
			'value' => $model->tags->toString(),
			'options' => array(
				'minLength' => '0',
				'select'=>"js:function(event, ui) { 
					 var terms = this.value.split( /,\s*/ );
					// remove the current input
					terms.pop();
					// add the selected item
					terms.push( ui.item.value );
					// add placeholder to get the comma-and-space at the end
					terms.push( '' );
					this.value = terms.join( ', ' );
					return false;
				}",
			),
			'source'=>$this->createUrl('autocomplete/tags'),
		)) ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sources'); ?>
		<?php echo $form->textField($model,'sources',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'sources'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail_img_path'); ?>
		<?php echo CHtml::encode($model->thumbnail_img_path); ?><br/>
		<?php echo $form->fileField($model,'uploaded_thumbnail_image_file'); ?>
		<?php echo $form->error($model,'thumbnail_img_path'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'verified'); ?>
		<?php echo $form->checkBox($model,'verified',array('value'=>1, 'uncheckValue'=>0, 'checked'=>($model->verified==1))); ?>
		<?php echo $form->error($model,'verified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'show_in_news'); ?>
		<?php echo $form->checkBox($model,'show_in_news',array('value'=>1, 'uncheckValue'=>0, 'checked'=>($model->show_in_news==1))); ?>
		<?php echo $form->error($model,'show_in_news'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>