<?php

class CampaignController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layoutsAdmin/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			//'accessControl', // perform access control for CRUD operations
			array('auth.filters.AuthFilter'),
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			(!Yii::app()->user->isGuest)?
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete','index','view','create','update'),
				'users'=>array(Yii::app()->user->name),
			):array(),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Campaign;
		$model->scenario = 'input-step1';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Campaign']))
		{
			$model->attributes=$_POST['Campaign'];
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$model->tgl_input = date("Y-m-d H:i:s");
					$model->tgl_update = date("Y-m-d H:i:s");
					$model->save();

					foreach ($_POST['Campaign']['contact'] as $key => $value) {
						$model2=new CampaignContact;
						$model2->campaign_id = $model->id;
						$model2->group_kontak_id = $value;
						$model2->save();
					}

					Log::createLog("Campaign Controller Create $model->id");
					Yii::app()->user->setFlash('success','Data disimpan');
				    $transaction->commit();
					$this->redirect(array('createstep2','id'=>$model->id));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionCreatestep2($id)
	{
		$model=$this->loadModel($id);
		if ($model->template != '' AND $_GET['pilih']==false) {
			$this->redirect(array('createstep'.$model->template, 'id'=>$id));
		}
		$this->render('createstep2',array(
			'model'=>$model,
		));
	}

	public function actionCreatestepbasic($id)
	{
		$model= new TemplateBasic;

		$model2=$this->loadModel($id);

		if(isset($_POST['TemplateBasic']))
		{
			if ($_POST['ajax']=='ajax') {
				$model->attributes = $_POST['TemplateBasic'];
				$model2->data = json_encode($model->attributes);
				$model2->save();
				$this->renderPartial('template/basic', array('model'=>json_decode($model2->data)));
				exit;
			}
			$model->attributes=$_POST['TemplateBasic'];
			if($model->validate()){
				$transaction=$model2->dbConnection->beginTransaction();
				try
				{
					$model2->data = json_encode($model->attributes);
					$model2->template = 'basic';
					$model2->tgl_update = date("Y-m-d H:i:s");
					$model2->html_message = $this->renderPartial('template/basic', array('model'=>json_decode($model2->data)), true);
					$model2->text_message = $this->renderPartial('template/basic_text', array('model'=>json_decode($model2->data)), true);
					$model2->save();
					Log::createLog("Campaign Controller Update $model2->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('createstep3','id'=>$model2->id));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$model->attributes = (array)json_decode($model2->data);

		$this->render('createstepbasic',array(
			'model'=>$model,
			'model2'=>$model2,
		));
	}

	public function actionCreatestepproperty($id)
	{
		$model= new TemplateProperty;

		$model2=$this->loadModel($id);

		if(isset($_POST['TemplateProperty']))
		{
			if ($_POST['ajax']=='ajax') {
				$model->attributes = $_POST['TemplateProperty'];
				$model2->data = json_encode($model->attributes);
				$model2->save();
				$this->renderPartial('template/property', array('model'=>json_decode($model2->data)));
				exit;
			}
			$model->attributes=$_POST['TemplateProperty'];
			if($model->validate()){
				$transaction=$model2->dbConnection->beginTransaction();
				try
				{
					$model2->data = json_encode($model->attributes);
					$model2->tgl_update = date("Y-m-d H:i:s");
					$model2->template = 'property';
					$model2->html_message = $this->renderPartial('template/property', array('model'=>json_decode($model2->data)), true);
					$model2->text_message = $this->renderPartial('template/property_text', array('model'=>json_decode($model2->data)), true);
					$model2->save();
					Log::createLog("Campaign Controller Update $model2->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('createstep3','id'=>$model2->id));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$modelProperty=new Property('search');
		$modelProperty->unsetAttributes();  // clear any default values
		if(isset($_GET['Property']))
			$modelProperty->attributes=$_GET['Property'];

		$model->attributes = (array)json_decode($model2->data);

		$this->render('createstepproperty',array(
			'model'=>$model,
			'model2'=>$model2,
			'modelProperty'=>$modelProperty,
		));
	}

	public function actionCreatestep3($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['Campaign']))
		{
			$model->attributes=$_POST['Campaign'];
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$model->tgl_update = date("Y-m-d H:i:s");
					$model->save();
					Log::createLog("Campaign Controller Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('createstep4','id'=>$model->id));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('createstep3',array(
			'model'=>$model,
		));
	}

	public function actionCreatestep4($id)
	{
		$model=$this->loadModel($id);

		$dataContact = CampaignContact::model()->findAll('campaign_id = :campaign_id',array(':campaign_id'=>$model->id));

		if(isset($_POST['Campaign']))
		{
			$transaction=$model->dbConnection->beginTransaction();
			try
			{
				foreach ($dataContact as $key => $value) {
					$kontak = Kontak::model()->findAll('group_id = :group_id', array(':group_id'=>$value->group_kontak_id ));
					foreach ($kontak as $k => $v) {
						$modelOutbox = new Outbox;
						$modelOutbox->to = $v->email;
						$modelOutbox->from = 'deo@markdesign.net';
						$modelOutbox->subject = $model->subject;
						$modelOutbox->html_message = Yii::app()->viewRenderer->renderString()->render($model->html_message, array(
							'nama'=>$v->nama,
							'email'=>$v->email,
						));
						$modelOutbox->text_message = Yii::app()->viewRenderer->renderString()->render($model->text_message, array(
							'nama'=>$v->nama,
							'email'=>$v->email,
						));
						$modelOutbox->tgl_input = date('Y-m-d H:i:s');
						$modelOutbox->status = 0;
						$modelOutbox->save();
					}
				}
				$model->tgl_update = date("Y-m-d H:i:s");
				$model->status = 'terkirim';
				$model->save();
				Log::createLog("Campaign Send Update $model->id");
				Yii::app()->user->setFlash('success','Data Edited');
			    $transaction->commit();
				$this->redirect(array('index'));
			}
			catch(Exception $ce)
			{
			    $transaction->rollback();
			}
		}

		$arrayContact = array();
		foreach ($dataContact as $key => $value) {
			$arrayContact[] = GroupKontak::model()->findByPk($value->group_kontak_id)->nama;
		}
		$model->contact = implode(', ', $arrayContact);

		$this->render('createstep4',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Campaign']))
		{
			$model->attributes=$_POST['Campaign'];
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$model->tgl_update = date("Y-m-d H:i:s");
					$model->save();

					CampaignContact::model()->deleteAll('campaign_id = :campaign_id',array(':campaign_id'=>$model->id));
					foreach ($_POST['Campaign']['contact'] as $key => $value) {
						$model2=new CampaignContact;
						$model2->campaign_id = $model->id;
						$model2->group_kontak_id = $value;
						$model2->save();
					}

					Log::createLog("CampaignController Update $model->id");
					Yii::app()->user->setFlash('success','Data disimpan');
				    $transaction->commit();
					$this->redirect(array('createstep2','id'=>$model->id));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$dataContact = CampaignContact::model()->findAll('campaign_id = :campaign_id',array(':campaign_id'=>$model->id));
		$arrayContact = array();
		foreach ($dataContact as $key => $value) {
			$arrayContact[] = $value->group_kontak_id;
		}
		$model->contact = $arrayContact;

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Campaign('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Campaign']))
			$model->attributes=$_GET['Campaign'];

		$dataProvider=new CActiveDataProvider('Campaign');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	public function actionTemplate($name)
	{
		$this->layout='//layouts/_blank';
		$this->render('template/'.$name,array(
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Campaign::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function actionGetproperty($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='campaign-form')
		{
			Yii::app()->end();
		}
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='campaign-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionTest()
	{
		// echo $this->viewRender('index');
		echo Yii::app()->viewRenderer->renderString()->render('asdasda {{ nama }}', array('nama'=>'deory'));
	}
}
