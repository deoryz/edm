<?php

/**
 * This is the model class for table "campaign".
 *
 * The followings are the available columns in table 'campaign':
 * @property integer $id
 * @property string $nama
 * @property string $subject
 * @property string $html_message
 * @property string $text_message
 * @property string $tgl_input
 * @property string $tgl_update
 * @property string $status
 * @property integer $active
 */
class Campaign extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Campaign the static model class
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
		return 'campaign';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, subject, html_message, text_message', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('subject', 'length', 'max'=>225),
			array('status', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, subject, html_message, text_message, tgl_input, tgl_update, status, active', 'safe', 'on'=>'search'),
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
			'nama' => 'Nama Promosi',
			'subject' => 'Subject',
			'html_message' => 'Html Message',
			'text_message' => 'Text Message',
			'tgl_input' => 'Tanggal Input',
			'tgl_update' => 'Tanggal Update',
			'status' => 'Status',
			'active' => 'Active',
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
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('html_message',$this->html_message,true);
		$criteria->compare('text_message',$this->text_message,true);
		$criteria->compare('tgl_input',$this->tgl_input,true);
		$criteria->compare('tgl_update',$this->tgl_update,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}