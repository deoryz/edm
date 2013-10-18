<?php

class PropertyController extends Controller
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
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Property;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Property']))
		{
			$model->attributes=$_POST['Property'];
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					if($_POST['Property']['area'] == 'Lainnya'){
						$model->area = $_POST['Property']['area_lain'];
					}
					$model->save();

					// save nama file gambar
					$dir = Yii::getPathOfAlias('webroot').'/images/temp/';
					if (count($_POST['upl'])==0)
						$_POST['upl'] = array();

					foreach ($_POST['upl'] as $key => $value){
						// copy temp data
						copy($dir.$value, $dir.'../propertyGallery/'.$value);
						$modelGallery = new PropertyGallery;
						$modelGallery->property_id = $model->id;
						$modelGallery->image = $value;
						$modelGallery->save();
						// delete temp data
						@unlink($dir.$value);
					}

					Log::createLog("PropertyController Create $model->id");
					Yii::app()->user->setFlash('success','Data has been inserted');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id));
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

		if(isset($_POST['Property']))
		{
			$model->attributes=$_POST['Property'];
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					if($_POST['Property']['area'] == 'Lainnya'){
						$model->area = $_POST['Property']['area_lain'];
					}
					$model->save();

					// setting directory
					$dir = Yii::getPathOfAlias('webroot').'/images/temp/';
					// save nama file gambar lama
					$data2 = PropertyGallery::model()->findAll('property_id = :property_id', array(':property_id'=> $model->id));
					$dataGallery = array();
					foreach ($data2 as $key => $value) {
						$dataGallery[] = $value->image;						
					}
					PropertyGallery::model()->deleteAll('property_id = :property_id', array(':property_id'=> $model->id));
					if (count($_POST['upl-old'])==0)
						$_POST['upl-old'] = array();

					$deleteGallery = array_diff_assoc($dataGallery, $_POST['upl-old']);
					foreach ($deleteGallery as $key => $value) {
						@unlink($dir.'../propertyGallery/'.$value);
					}

					foreach ($_POST['upl-old'] as $key => $value) {
						$modelGallery = new PropertyGallery;
						$modelGallery->property_id = $model->id;
						$modelGallery->image = $value;
						$modelGallery->save();
					}

					// save nama file gambar baru
					if (count($_POST['upl'])==0)
						$_POST['upl'] = array();

					foreach ($_POST['upl'] as $key => $value) {
						@copy($dir.$value, $dir.'../propertyGallery/'.$value);
						$modelGallery = new PropertyGallery;
						$modelGallery->property_id = $model->id;
						$modelGallery->image = $value;
						$modelGallery->save();
						@unlink($dir.$value);
					}



					Log::createLog("PropertyController Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}
		if($model->area != 'Surabaya Barat'
		|| da_area != 'Surabaya Timur'
		 || da_area != 'Surabaya Utara'
		 || da_area != 'Surabaya Selatan'
		 || da_area != 'Surabaya Pusat'
		){
			$model->area_lain = $model->area;
			$model->area = 'Lainnya';
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionUpload()
	{
		$dir = Yii::getPathOfAlias('webroot').'/images/temp/';

		$_FILES['upl']['type'] = strtolower($_FILES['upl']['type']);

		if ($_FILES['upl']['type'] == 'image/png'
		|| $_FILES['upl']['type'] == 'image/jpg'
		|| $_FILES['upl']['type'] == 'image/gif'
		|| $_FILES['upl']['type'] == 'image/jpeg'
		|| $_FILES['upl']['type'] == 'image/pjpeg')
		{
		    // setting file's mysterious name
		    $file = md5(date('YmdHis').rand(0,10000000000000)).'.jpg';

		    // copying
		    move_uploaded_file($_FILES['upl']['tmp_name'], $dir.$file);

		    // displaying file
		    $array = array(
		    	'status'=>'success',
		        'filelink' => Yii::app()->baseUrl.'/images/temp/'.$file,
		        'thumb' => Yii::app()->baseUrl.ImageHelper::thumb(250,200, '/images/temp/'.$file , array('method' => 'adaptiveResize', 'quality' => '90')),
		        'name' => $file,
		    );

		    echo json_encode($array);
		}
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
		$model=new Property('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Property']))
			$model->attributes=$_GET['Property'];

		$dataProvider=new CActiveDataProvider('Property');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Property('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Property']))
			$model->attributes=$_GET['Property'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Property::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='property-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
