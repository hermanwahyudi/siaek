<?php

/**
 * This is the model class for table "peserta".
 *
 * The followings are the available columns in table 'peserta':
 * @property integer $id_peserta
 * @property integer $id_regional
 * @property string $nomor_peserta
 * @property string $nama
 * @property string $no_handphone
 * @property string $email
 * @property string $jenis_kelamin
 * @property integer $status_aktif
 */
class Peserta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'peserta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_regional, nomor_peserta, nama, no_handphone, email, jenis_kelamin, status_aktif', 'required'),
			array('id_regional, status_aktif', 'numerical', 'integerOnly'=>true),
			array('nomor_peserta', 'length', 'max'=>8),
			array('no_handphone', 'numerical'),
			array('email', 'email'),
			array('nama, email', 'length', 'max'=>64),
			array('no_handphone', 'length', 'max'=>20),
			array('jenis_kelamin', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_peserta, id_regional, nomor_peserta, nama, no_handphone, email, jenis_kelamin, status_aktif', 'safe', 'on'=>'search'),
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
                    'absensi'   => array(self::HAS_MANY,'Absensi','id_peserta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_peserta' => 'Id Peserta',
			'id_regional' => 'Id Regional',
			'nomor_peserta' => 'Nomor Peserta',
			'nama' => 'Nama',
			'no_handphone' => 'No Handphone',
			'email' => 'Email',
			'jenis_kelamin' => 'Jenis Kelamin',
			'status_aktif' => 'Status Aktif',
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

		$criteria->compare('id_peserta',$this->id_peserta);
		$criteria->compare('id_regional',$this->id_regional);
		$criteria->compare('nomor_peserta',$this->nomor_peserta,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('no_handphone',$this->no_handphone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('jenis_kelamin',$this->jenis_kelamin,true);
		$criteria->compare('status_aktif',$this->status_aktif);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=> array(
				'pageSize'=> 10,
			),
			'sort'=>array(
                'defaultOrder'=>'nama ASC',
            ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Peserta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
