<?php
class TestController extends Controller
{
	public function actionIndex()
	{
		$messaged = $this->renderPartial('//temp/basic_example',array(
					// 'model'=>$model,
				),TRUE);
		echo $messaged;
		exit;
		$config = array(
			'to'=>array('ibnu@markdesign.net', 'deo@markdesign.net'),
			'subject'=>'[Hello] Just Test Edm Html',
			'message'=>$messaged,
		);

		// kirim email
		Common::mail($config);

		$this->layout='//layouts/_blank';
		$this->render('test', array(
		));

	}

	public function actionProperty()
	{
		$messaged = $this->renderPartial('//temp/example',array(
					// 'model'=>$model,
				),TRUE);
		echo $messaged;
		exit;
		$config = array(
			'to'=>array('ibnu@markdesign.net', 'deo@markdesign.net', 'deoryz@yahoo.co.id'),
			'subject'=>'[Hello] Just Test Edm Html',
			'message'=>$messaged,
		);

		// kirim email
		Common::mail($config);

		$this->layout='//layouts/_blank';
		$this->render('test', array(
		));

	}

	public function actionTestoff()
	{
		$messaged = $this->renderPartial('//temp/example',array(
					// 'model'=>$model,
				),TRUE);

		echo $messaged;
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}