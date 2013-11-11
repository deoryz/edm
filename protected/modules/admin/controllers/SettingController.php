<?php

class SettingController extends ControllerAdmin
{
	public function actionIndex()
	{
		$model = Setting::model()->getModelSetting('setting');

		if(isset($_POST['Setting']))
		{
			$model2 = new Setting;
			$transaction=$model2->dbConnection->beginTransaction();
			try
			{
				$setting = $_POST['Setting'];
				foreach ($setting as $key => $value) {
					if ( ! is_array($value)) {
						$modelSetting = Setting::model()->getSettingByName($key);
						$modelSetting->value = $value;
						$modelSetting->save();
					}else{
						foreach ($value as $k => $v) {
							$modelSetting = SettingDescription::model()->getSettingModel($key,$k);
							if ($modelSetting==null) {
								$modelSetting = new SettingDescription;
								$setting_id = Setting::model()->find('name = :name',array(':name'=>$key))->id;
								$language_id = Language::model()->find('code = :code',array(':code'=>$k))->id;
								$modelSetting->setting_id = $setting_id;
								$modelSetting->language_id = $language_id;
							}
							$modelSetting->value = $v;
							$modelSetting->save();
						}
					}
				}
				Log::createLog("Setting Update");
				Yii::app()->user->setFlash('success','Data has been updated');
			    $transaction->commit();
				$this->refresh();
			}
			catch(Exception $ce)
			{
			    $transaction->rollback();
			}
		}

		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function actionHome()
	{
		$model = Setting::model()->getModelSetting('home');

		if(isset($_POST['Setting']))
		{
			$model2 = new Setting;
			$transaction=$model2->dbConnection->beginTransaction();
			try
			{
				$setting = $_POST['Setting'];
				foreach ($setting as $key => $value) {
					if ( ! is_array($value)) {
						$modelSetting = Setting::model()->getSettingByName($key);
						$modelSetting->value = $value;
						$modelSetting->save();
					}else{
						foreach ($value as $k => $v) {
							$modelSetting = SettingDescription::model()->getSettingModel($key,$k);
							if ($modelSetting==null) {
								$modelSetting = new SettingDescription;
								$setting_id = Setting::model()->find('name = :name',array(':name'=>$key))->id;
								$language_id = Language::model()->find('code = :code',array(':code'=>$k))->id;
								$modelSetting->setting_id = $setting_id;
								$modelSetting->language_id = $language_id;
							}
							$modelSetting->value = $v;
							$modelSetting->save();
						}
					}
				}
				Log::createLog("Setting Update");
				Yii::app()->user->setFlash('success','Data has been updated');
			    $transaction->commit();
				$this->refresh();
			}
			catch(Exception $ce)
			{
			    $transaction->rollback();
			}
		}

		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function actionLog()
	{
		$model=new Log('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Log'])){
			$model->attributes=$_GET['Log'];
		}

		$dataProvider=new CActiveDataProvider('Log');
		$this->render('log',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}
	
	public function actionUploadimage($type)
	{
		$dir = Yii::getPathOfAlias('webroot').'/upload/images/';
		if ($type == 'image') {

			$_FILES['file']['type'] = strtolower($_FILES['file']['type']);

			if ($_FILES['file']['type'] == 'image/png'
			|| $_FILES['file']['type'] == 'image/jpg'
			|| $_FILES['file']['type'] == 'image/gif'
			|| $_FILES['file']['type'] == 'image/jpeg'
			|| $_FILES['file']['type'] == 'image/pjpeg')
			{
			    // setting file's mysterious name
			    $file = substr(md5(date('YmdHis').rand(0,10000000)), 0, 5).$_FILES['file']['name'];

			    // copying
			    move_uploaded_file($_FILES['file']['tmp_name'], $dir.$file);

			    // displaying file
			    $array = array(
			        'filelink' => Yii::app()->baseUrl.'/upload/images/'.$file
			    );

			    echo stripslashes(json_encode($array));
			}
		}
		if ($type == 'clip') {

			$contentType = $_POST['contentType'];
			$data = base64_decode($_POST['data']);

			$filename = md5(date('YmdHis').rand(0,10000000)).'.png';
			$file = $dir.$filename;

			file_put_contents($file, $data);

			echo json_encode(array('filelink' => Yii::app()->baseUrl.'/upload/images/'.$filename));
		}
	}

}
