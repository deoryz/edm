<?php

class MailController extends Controller
{

	public function actionIndex()
	{

		$criteria = new CDbCriteria;
		$criteria->condition = "status LIKE '0'";
		$criteria->limit = 5;
		$model = Outbox::model()->findAll($criteria);
		foreach ($model as $key => $value) {
			$config = array(
				'to'=>$value->to,
				'cc'=>$value->cc,
				'bcc'=>$value->bcc,
				'from'=>$value->from,
				'subject'=>$value->subject,
				'message'=>$value->html_message,
				'pesan'=>$value->text_message,
			);
			Common::mail($config);
			$value->status = 1;
			$value->tgl_kirim = date('Y-m-d H:i:s');
			$value->save();
		}

	}

}