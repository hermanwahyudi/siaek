<?php

/**
 * This is the model class for table "regional".
 *
 * The followings are the available columns in table 'regional':
 * @property integer $id_regional
 * @property string $nama
 * @property string $alamat
 * @property integer $id_user
 */
class Regional extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'regional';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, alamat, id_user', 'required'),
			array('id_user', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_regional, nama, alamat, id_user', 'safe', 'on'=>'search'),
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
	
	public function getRegional() {
		$sql = "SELECT id_regional, nama FROM REGIONAL";
		return Yii::app()->db->createCommand($sql)->query();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_regional' => 'Id Regional',
			'nama' => 'Nama Regional',
			'alamat' => 'Alamat',
			'id_user' => 'Hak Pengurus',
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

		$criteria->compare('id_regional',$this->id_regional);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('id_user',$this->id_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=> array(
				'pageSize'=> 5,
				),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Regional the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function users(){
		return CHtml::listData(User::model()->findAll(), 'id_user', 'nama');
	}
}
