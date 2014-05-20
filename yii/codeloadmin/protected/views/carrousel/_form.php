<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'carrousel-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'enctype' => 'multipart/form-data',
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_article'); ?>
		<?php echo $form->dropDownList($model, 'id_article', CHtml::listData(
			article::model()->findAll(), 'id', 'title'),
			array('prompt' => 'Select an Article')
		); ?>
		<?php echo $form->error($model,'id_article'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image_path'); ?>
		<?php echo CHtml::encode($model->image_path); ?><br/>
		<?php echo $form->fileField($model,'uploaded_image_file'); ?>
		<?php echo $form->error($model,'image_path'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->