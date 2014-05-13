<?php

/**
 * This is the model class for table "absensi".
 *
 * The followings are the available columns in table 'absensi':
 * @property integer $id_peserta
 * @property integer $id_kegiatan
 * @property integer $id_status
 * @property string $alasan
 */
class Absensi extends CActiveRecord
{
	public $bulan1, $bulan2;
	public $tahun1, $tahun2;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'absensi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_peserta, id_kegiatan, id_status', 'required'),
			array('id_peserta, id_kegiatan, id_status', 'numerical', 'integerOnly'=>true),
                        array('alasan','allowEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_peserta, id_kegiatan, id_status, alasan', 'safe', 'on'=>'search'),
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
                    'peserta'    => array(self::BELONGS_TO, 'Peserta',    'id_peserta'),
                    'kegiatan'    => array(self::BELONGS_TO, 'Kegiatan',    'id_kegiatan'),
                    'status'    => array(self::BELONGS_TO, 'Status',    'id_status'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_peserta' => 'Id Peserta',
			'id_kegiatan' => 'Id Kegiatan',
			'id_status' => 'Id Status',
			'alasan' => 'Alasan',
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
		$criteria->compare('id_kegiatan',$this->id_kegiatan);
		$criteria->compare('id_status',$this->id_status);
		$criteria->compare('alasan',$this->alasan,true);

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
	 * @return Absensi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public function getStatusOption() {
        return CHtml::listData(Status::model()->findAll(), 'id_status', 'status_kehadiran');
    }
	public function getBulan() {
		return array(	
					  "1"=>"Januari", 
					  "2"=>"Februari",
					  "3"=>"Maret", 
					  "4"=>"April",
					  "5"=>"Mei", 
					  "6"=>"Juni",
					  "7"=>"Juli", 
					  "8"=>"Agustus",
					  "9"=>"September", 
					  "10"=>"Oktober",
					  "11"=>"November", 
					  "12"=>"Desember",
					  );
	}
	public function getTahun() {
			return array(	
						"2010"=>"2010", 
						"2011"=>"2011",
						"2012"=>"2012", 
						"2013"=>"2013",
						"2014"=>"2014",
						"2015"=>"2015", 
						"2016"=>"2016",
						"2017"=>"2017", 
						"2018"=>"2018",
			);
	}
	
	/*
	public function getAbsen{
		
	}*/
}
