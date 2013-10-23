<?php

/**
 * This is the model class for table "outbox".
 *
 * The followings are the available columns in table 'outbox':
 * @property integer $id
 * @property string $to
 * @property string $cc
 * @property string $bcc
 * @property string $from
 * @property string $subject
 * @property string $html_message
 * @property string $text_message
 * @property string $tgl_input
 * @property string $tgl_kirim
 * @property integer $status
 */
class Outbox extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Outbox the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'outbox';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('to, from, subject, html_message, text_message', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('to, cc, bcc, subject', 'length', 'max'=>200),
			array('from', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, to, cc, bcc, from, subject, html_message, text_message, tgl_input, tgl_kirim, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'to' => 'To',
			'cc' => 'Cc',
			'bcc' => 'Bcc',
			'from' => 'From',
			'subject' => 'Subject',
			'html_message' => 'Html Message',
			'text_message' => 'Text Message',
			'tgl_input' => 'Tgl Input',
			'tgl_kirim' => 'Tgl Kirim',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('to',$this->to,true);
		$criteria->compare('cc',$this->cc,true);
		$criteria->compare('bcc',$this->bcc,true);
		$criteria->compare('from',$this->from,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('html_message',$this->html_message,true);
		$criteria->compare('text_message',$this->text_message,true);
		$criteria->compare('tgl_input',$this->tgl_input,true);
		$criteria->compare('tgl_kirim',$this->tgl_kirim,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}