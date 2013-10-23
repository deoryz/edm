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

		if(isset($_POST['Campaign']))
		{
			$model->attributes=$_POST['Campaign'];
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$model->save();
					Log::createLog("Campaign Controller Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('createstep3','id'=>$model->id));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('createstep2',array(
			'model'=>$model,
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

		$dataContact = CampaignContact::model()->findAll('group_kontak_id = :group_kontak_id',array(':group_kontak_id'=>$model->id));

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
				$model->status = 'terkirim';
				$model->save();
				Log::createLog("Campaign Send Update $model->id");
				Yii::app()->user->setFlash('success','Data Edited');
			    $transaction->commit();
				$this->redirect(array('index'));
			}
			catch(Exception $ce)
			{
				echo $ce;
				exit;
			    $transaction->rollback();
			}
		}

		$arrayContact = array();
		foreach ($dataContact as $key => $value) {
			$arrayContact[] = GroupKontak::model()->findByPk($value->campaign_id)->nama;
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
					$model->save();

					CampaignContact::model()->deleteAll('group_kontak_id = :group_kontak_id',array(':group_kontak_id'=>$model->id));
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

		$dataContact = CampaignContact::model()->findAll('group_kontak_id = :group_kontak_id',array(':group_kontak_id'=>$model->id));
		$arrayContact = array();
		foreach ($dataContact as $key => $value) {
			$arrayContact[] = $value->campaign_id;
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
