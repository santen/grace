<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $nickname
 * @property string $mail
 * @property string $passwd
 * @property string $cdate
 * @property string $last_entry
 * @property string $firstname
 * @property string $surname
 * @property string $lastname
 * @property string $house
 * @property integer $apartment
 * @property integer $m_index
 * @property integer $block
 * @property string $phone
 * @property integer $is_visitor
 * @property integer $country_id
 * @property integer $city_id
 * @property integer $street_id
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mail, passwd, cdate', 'required'),
			array('apartment, m_index, block, is_visitor, country_id, city_id, street_id', 'numerical', 'integerOnly'=>true),
			array('nickname', 'length', 'max'=>40),
			array('mail', 'length', 'max'=>50),
			array('passwd', 'length', 'max'=>255),
			array('firstname, surname, lastname', 'length', 'max'=>45),
			array('house', 'length', 'max'=>10),
			array('phone', 'length', 'max'=>30),
			array('last_entry', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nickname, mail, passwd, cdate, last_entry, firstname, surname, lastname, house, apartment, m_index, block, phone, is_visitor, country_id, city_id, street_id', 'safe', 'on'=>'search'),
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
			'nickname' => 'Nickname',
			'mail' => 'Mail',
			'passwd' => 'Passwd',
			'cdate' => 'Cdate',
			'last_entry' => 'Last Entry',
			'firstname' => 'Firstname',
			'surname' => 'Surname',
			'lastname' => 'Lastname',
			'house' => 'House',
			'apartment' => 'Apartment',
			'm_index' => 'M Index',
			'block' => 'Block',
			'phone' => 'Phone',
			'is_visitor' => 'Is Visitor',
			'country_id' => 'Country',
			'city_id' => 'City',
			'street_id' => 'Street',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('passwd',$this->passwd,true);
		$criteria->compare('cdate',$this->cdate,true);
		$criteria->compare('last_entry',$this->last_entry,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('house',$this->house,true);
		$criteria->compare('apartment',$this->apartment);
		$criteria->compare('m_index',$this->m_index);
		$criteria->compare('block',$this->block);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('is_visitor',$this->is_visitor);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('street_id',$this->street_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
