<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contaco';
?>

<div class="col-lg-12">
	<div class="row">
		<div class="col-lg-9">
			<div class="article main">
				<div class="cogo-header">Contacto</div>
				<div class="article-main-container">
						<div class="article-header">
							<h3>Completa el formulario para contactarnos</h3>
							<hr class="title-separator"/>
							
							<p class="subtitle">Los campos con <span class="required">*</span> son requeridos.</p>
						</div>
					<?php if(Yii::app()->user->hasFlash('contact')): ?>

						<div class="article-content">
							<?php echo Yii::app()->user->getFlash('contact'); ?>
						</div>

					<?php else: ?>

						<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>'contact-form',
							'enableClientValidation'=>true,
							'clientOptions'=>array(
								'validateOnSubmit'=>true,
							),
							'htmlOptions'=>array(
								'role'=>'form',
							),
						)); ?>
						
						<div class="article-content">
							<?php echo $form->errorSummary($model); ?>

							<div class="form-group">
								<?php echo $form->labelEx($model,'name', array('class'=>'control-label')); ?>
								<?php echo $form->textField($model,'name', array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'name'); ?>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'email'); ?>
								<?php echo $form->textField($model,'email', array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'email'); ?>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'subject'); ?>
								<?php echo $form->textField($model,'subject',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'subject'); ?>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'body'); ?>
								<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
								<?php echo $form->error($model,'body'); ?>
							</div>

							<?php if(CCaptcha::checkRequirements()): ?>
									<div class="form-group">
									<?php echo $form->labelEx($model,'verifyCode'); ?>
									<div>
									<?php $this->widget('CCaptcha'); ?>
									<?php echo $form->textField($model,'verifyCode',array('class'=>'form-control', 'style' => 'margin: 10px 0 0 0; width: 50%;')); ?>
									</div>
									<div class="hint">Por favor ingrese las letras que ve en la imagen.
									<br/>No se diferencian minúsculas y mayúsculas.</div>
									<?php echo $form->error($model,'verifyCode'); ?>
								</div>
							<?php endif; ?>

							<?php echo CHtml::submitButton('Enviar', array('class' => 'btn btn-primary btn-lg btn-block ', 'style' => 'width: 50%; margin: 0 auto 0 auto;')); ?>
						</div>
						<?php $this->endWidget(); ?>
					<?php endif; ?>
				
				</div>
			</div>
		</div>
	</div>
</div>
<!-- form -->

