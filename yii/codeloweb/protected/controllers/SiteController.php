<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		$articlesCriteria=new CDbCriteria;
		$articlesCriteria->order='created_date desc';
		$articlesCriteria->compare('verified',1);
		$articlesCriteria->compare('show_in_news',1);
		$articlesCriteria->limit='5';
		$articles=article::model()->findAll($articlesCriteria);

		$carrousels=new CActiveDataProvider('carrousel');
		$events=new CActiveDataProvider('event');
		$eventsData=$events->getData();

		$eventsCalendar=array();
		
		foreach ($eventsData as &$event) {

			$eventsCalendar[]=array(
				'title'=>$event->id,
				'start'=>$event->event_date
			);
		}

		$tagsCount=array();

		$tags = article::model()->getAllTagsWithModelsCount();
		foreach($tags as $tag){
			$tagsCount[$tag['name']]=array('weight'=>$tag['count']+1);
		}
		
		$this->render('index',array(
			'articles'=>$articles,
			'carrousels'=>$carrousels->getData(),
			'events'=>$eventsCalendar,
			'eventsData'=>$events->getData(),
			'tagsCount'=>$tagsCount,
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				/*$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";*/
				$msg = wordwrap($model->body, 70, "\r\n");
				//$mail=mail(Yii::app()->params['adminEmail'],$subject,$msg);
				$mailMsg = $this->mailsend($model->email,Yii::app()->params['adminEmail'],$model->name,$model->subject,$msg);
				if($mailMsg===""){
					Yii::app()->user->setFlash('contact','<h3>Gracias por contactarse con nosotros. Estaremos atendiendo su consulta a la brevedad.</h3>');
				}else{
					Yii::app()->user->setFlash('contact','<h3>Ocurrio un error al enviar el mensaje.<br/>'.$mailMsg.'</h3>');
				}
				
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	public function mailsend($to,$from,$fromName,$subject,$message){
        $mail=Yii::app()->Smtpmail;
        $mail->SMTPDebug = 1;
        $mail->SetFrom($from, $fromName);
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->AddAddress($to, "");
        if(!$mail->Send()) {
            return "Mailer Error: " . $mail->ErrorInfo;
        }else {
            return "";
        }
    }

	public function actionInstitucional()
	{
		$this->render('institucional');	
	}

	public function actionAsociate()
	{
		$this->render('asociate');	
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}