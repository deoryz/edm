<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class TemplateProperty extends CFormModel
{
	public $title;
	public $bulan;
	public $part;
	public $property_id;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('title, bulan, part, property_id', 'required', 'on'=>'insert'),
			array('title, bulan, part, property_id', 'safe'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'title'=>Yii::t('main', 'Title'),
			'bulan'=>Yii::t('main', 'Bulan'),
			'part'=>Yii::t('main', 'Part'),
			'property_id'=>Yii::t('main', 'Property'),
		);
	}
}