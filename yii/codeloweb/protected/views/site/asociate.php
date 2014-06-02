<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Asociate';
?>

<div class="col-lg-12">
	<div class="row">
		<div class="col-lg-9">
			<div class="article">
				<div class="cogo-header">Asociate</div>
				<div class="article-main-container">
					<div class="article-header">
						<h3>En que consiste asociarte a Cogollos del Oeste?</h3>
						<hr class="title-separator"/>
						
						<p class="subtitle"></p>
					</div>
					<div class="article-content asociate">
							<div class="col-sm-4 thumbnail" style="">
								<img src="<?php echo Yii::app()->request->baseUrl.'/images/carnets.png' ?>" alt="thumbnail_img">
							</div>
							<p class="article-text"> Partiendo del contexto social y politico en el que estamos, sumado al crecimiento del movimiento cannabico en el ambito local e internacional, surgio la necesidad de difundir el trabajo que venimos haciendo, e integrar a los cultivadores en un espacio en comun, de construcción, y de solidaridad. Y a traves de una financiación colectiva podemos crecer y seguir difundiendo. 
							Asociarte es sumar. por eso el asociado tiene los siguientes beneficios:
							<ul>
								<li>La entrada a los eventos realizados por la asociacion (uno o dos mensuales)</li>
								<li>Participacion en la asamblea trimestral</li>
								<li>Descuentos en varios growshops</li>
								<li>Carnet de asociado que te acreditara en cada ocasion</li>
							</ul>
						</p>
					</div>
					<div class="col-md-6 col-md-offset-3">
						<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal">ASOCIATE</button>
					</div>

					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">Ficha Inscripción</h4>
								</div>
								<div class="modal-body">
									<form role="form">
										<div class="form-group">
											<label for="exampleInputEmail1">Nombre: *</label>
											<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Apellido: *</label>
											<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Apellido">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">E-mail: *</label>
											<input type="email" class="form-control" id="exampleInputPassword1" placeholder="E-mail">
										</div>
										<div class="form-group">
											<label for="exampleInputFile">Foto: (Opcional)</label><br/>
											<input id="uploadFile" placeholder="Selecciona una foto" disabled="disabled" />
											<div class="fileUpload btn btn-primary">
												<span>Examinar...</span>
												<input id="uploadBtn" type="file" class="upload" />
											</div>
										</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									<button type="button" class="btn btn-primary">Enviar Formulario</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- form -->

