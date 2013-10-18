<?php

/**
 * This is the model class for table "gallery".
 *
 * The followings are the available columns in table 'gallery':
 * @property integer $id
 * @property integer $id_property
 * @property string $images
 * @property string $date_input
 * @property string $date_modified
 * @property integer $active
 * @property integer $sort
 */
class Gallery extends CActiveRecord
{
	public $picture;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Gallery the static model class
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
		return 'gallery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_property', 'required'),
			array('id_property, sort', 'numerical', 'integerOnly'=>true),
			array('images', 'length', 'max'=>225),
			// The following rule is used by search().

			array('images, picture, sort', 'safe'),

			// array('images', 'file', 'types'=>'jpg, gif, png', 'maxSize' => 1024 * 1024 * 2, 'allowEmpty'=>FALSE, 'on'=>'insert'),
			// array('images', 'file', 'types'=>'jpg, gif, png', 'maxSize' => 1024 * 1024 * 2, 'allowEmpty'=>TRUE, 'on'=>'update'),
			// Please remove those attributes that should not be searched.
			array('id, id_property, images, sort', 'safe', 'on'=>'search'),
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
			'id_property' => 'Id Property',
			'images' => 'Images',
			'sort' => 'Sort',
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
		$criteria->compare('id_property',$this->id_property);
		$criteria->compare('images',$this->images,true);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}