<?php

/**
 * This is the model class for table "kegiatan".
 *
 * The followings are the available columns in table 'kegiatan':
 * @property integer $id_kegiatan
 * @property string $materi
 * @property string $waktu_mulai
 * @property string $waktu_selesai
 * @property string $pembicara
 * @property string $hari
 * @property string $tanggal
 * @property integer $jenis_kegiatan
 * @property integer $id_regional
 * @property string $nama_kegiatan
 */
class Kegiatan extends CActiveRecord
{
	public $bulan1, $bulan2;
	public $tahun1, $tahun2;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kegiatan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('materi, waktu_mulai, waktu_selesai, pembicara, hari, tanggal, jenis_kegiatan, id_regional, nama_kegiatan, deadline', 'required'),
			array('jenis_kegiatan, id_regional', 'numerical', 'integerOnly'=>true),
			array('pembicara', 'length', 'max'=>64),
			array('hari', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_kegiatan, materi, waktu_mulai, waktu_selesai, pembicara, hari, tanggal, jenis_kegiatan, id_regional, nama_kegiatan', 'safe', 'on'=>'search'),
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
                    'absensi'   => array(self::HAS_MANY,'Absensi','id_kegiatan'),
                    'regional'   => array(self::BELONGS_TO,'Regional','id_regional'),
		);
	}
	function getAktifKegiatan($id_regional, $exp_bulan, $tahun) {
		$sql = "SELECT COUNT(*) AS jumlah FROM KEGIATAN WHERE id_regional = '". 
										$id_regional ."' AND tanggal LIKE '%". $tahun ."-". $exp_bulan ."-%' AND status_isi = '1'";
		return Yii::app()->db->createCommand($sql)->query();
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
						"2013"=>"2013",
						"2014"=>"2014",
						"2015"=>"2015", 
			);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_kegiatan' => 'Id Kegiatan',
			'materi' => 'Materi',
			'waktu_mulai' => 'Waktu Mulai',
			'waktu_selesai' => 'Waktu Selesai',
			'pembicara' => 'Pembicara',
			'hari' => 'Hari',
			'tanggal' => 'Tanggal',
			'jenis_kegiatan' => 'Jenis Kegiatan',
			'id_regional' => 'Id Regional',
			'nama_kegiatan' => 'Nama Kegiatan',
                    'status_isi' => 'status',
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

		$criteria->compare('id_kegiatan',$this->id_kegiatan);
		$criteria->compare('materi',$this->materi,true);
		$criteria->compare('waktu_mulai',$this->waktu_mulai,true);
		$criteria->compare('waktu_selesai',$this->waktu_selesai,true);
		$criteria->compare('pembicara',$this->pembicara,true);
		$criteria->compare('hari',$this->hari,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('jenis_kegiatan',$this->jenis_kegiatan);
		$criteria->compare('id_regional',$this->id_regional);
		$criteria->compare('nama_kegiatan',$this->nama_kegiatan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=> array(
				'pageSize'=> 10,
				),
		));
	
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kegiatan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
		}
	
	public function Regionals(){
		return CHtml::listData(Regional::model()->findAll(), 'id_regional', 'nama');
	}
    public function getTipeOption() {
        return array('1' => 'Bulanan', '2' => 'Pekanan', '3' => 'Lokal', '4' => 'Khusus');
    }
    public function getDayOption() {
       return array('Senin' => 'Senin', 'Selasa' => 'Selasa', 'Rabu' => 'Rabu', 'Kamis' => 'Kamis','Jumat' => 'Jumat','Sabtu' => 'Sabtu','Minggu'=>'Minggu');
    }
}
