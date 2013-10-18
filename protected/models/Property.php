<?php

/**
 * This is the model class for table "property".
 *
 * The followings are the available columns in table 'property':
 * @property integer $id
 * @property string $type
 * @property string $jenis
 * @property integer $area
 * @property integer $bedroom
 * @property integer $shower
 * @property integer $carport
 * @property integer $luas_tanah
 * @property integer $luas_bangunan
 * @property integer $harga
 * @property integer $score
 * @property string $intro
 * @property string $deskripsi
 */
class Property extends CActiveRecord
{
	public $area_lain;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Property the static model class
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
		return 'property';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, jenis, area, bedroom, shower, carport, luas_tanah, luas_bangunan, harga, score, intro, deskripsi, bind', 'required'),
			array('bedroom, shower, carport, luas_tanah, luas_bangunan, harga, score', 'numerical', 'integerOnly'=>true),
			array('type, jenis', 'length', 'max'=>9),
			array('bind', 'length', 'max'=>10),
			array('area', 'length', 'max'=>225),
			array('type, jenis, area_lain', 'safe'),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, jenis, area, bedroom, shower, carport, luas_tanah, luas_bangunan, harga, score, intro, deskripsi, bind', 'safe', 'on'=>'search'),
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
			'type' => 'Type',
			'jenis' => 'Jenis',
			'area' => 'Area',
			'bedroom' => 'Bedroom',
			'shower' => 'Shower',
			'carport' => 'Carport',
			'luas_tanah' => 'Luas Tanah',
			'luas_bangunan' => 'Luas Bangunan',
			'harga' => 'Harga',
			'bind' => 'Bind',
			'score' => 'Score',
			'intro' => 'Intro',
			'deskripsi' => 'Deskripsi',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('jenis',$this->jenis,true);
		$criteria->compare('area',$this->area);
		$criteria->compare('bedroom',$this->bedroom);
		$criteria->compare('shower',$this->shower);
		$criteria->compare('carport',$this->carport);
		$criteria->compare('luas_tanah',$this->luas_tanah);
		$criteria->compare('luas_bangunan',$this->luas_bangunan);
		$criteria->compare('harga',$this->harga);
		$criteria->compare('score',$this->score);
		$criteria->compare('intro',$this->intro,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}