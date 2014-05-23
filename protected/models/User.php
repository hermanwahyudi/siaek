<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id_user
 * @property integer $role
 * @property string $username
 * @property string $password
 * @property string $nama
 * @property string $jenis_kelamin
 * @property string $email
 * @property string $nip
 * @property string $no_telp
 * @property string $alamat
 * @property string $url_image
 */
class User extends CActiveRecord {

    public $password_sekarang;
    public $password_baru;
    public $password_baru_repeat;

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('role, username, password, nama, jenis_kelamin, email, nip, no_telp, alamat', 'required'),
            array('role', 'numerical', 'integerOnly' => true),
            array('username, password, nama, email, nip', 'length', 'max' => 255),
            array('username','length','min'=>6),
            array('nama','length','min'=>6),
            array('no_telp','length','min'=>7),
            array('email', 'email'),
            array('no_telp', 'numerical'),
            array('jenis_kelamin', 'length', 'max' => 12),
            array('no_telp', 'length', 'max' => 20),
            array('url_image', 'file', 'types' => 'jpg, jpeg, gif, png', 'allowEmpty' => true),
            //Edit Password saya komen kak soalnya jadi kagak bisa kalau create and update
            //array('password_sekarang, password_baru, password_baru_repeat', 'required'),
            //array('password_baru', 'compare','on'=>'changePassword'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_user, role, username, password, nama, jenis_kelamin, email, nip, no_telp, alamat, url_image', 'safe', 'on' => 'search'),
        );
    }

    public function validateCurrentPassword() {
        $valid = $this->password_sekarang === $this->password;

        return $valid;
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_user' => 'Id User',
            'role' => 'Role',
            'username' => 'Username',
            'password' => 'Password',
            'nama' => 'Nama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'email' => 'Email',
            'nip' => 'Nip',
            'no_telp' => 'No Telp',
            'alamat' => 'Alamat',
            'url_image' => 'Foto',
                //kak yang dibawah ini kan kagak dimasukkin database ya jadi jangan taruh ini kalau saya mau create/update profile jadi kagak bisa
                //'password_sekarang' => 'Password Sekarang',
                //'password_baru' => 'Password Baru',
                //'password_baru_repeat' => 'Konfirmasi Password',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_user', $this->id_user);
        $criteria->compare('role', $this->role);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('nama', $this->nama, true);
        $criteria->compare('jenis_kelamin', $this->jenis_kelamin, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('nip', $this->nip, true);
        $criteria->compare('no_telp', $this->no_telp, true);
        $criteria->compare('alamat', $this->alamat, true);
        $criteria->compare('url_image', $this->url_image, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination'=> array(
                'pageSize'=> 5,
               ),
			'sort'=>array(
                'defaultOrder'=>'id_user DESC',
            ),
        ));
    }

    public function validatePassword($password) {
        //return $password === $this->password;
        //var_dump($this->hashPassword($password, $this->saltpassword));
        return md5($password) === $this->password;
    }

    public function sendMail($to, $message) {
        $info = "Please click here to reset your password " . Yii::app()->getBaseUrl(true) . "/site/login" ." ". $message;
        $from = "siaekb10@gmail.com";
        $subject = "Reset Your Password";
        $mail = Yii::app()->Smtpmail;
        $mail->SetFrom($from, 'Admin Siaek');
        $mail->Subject = $subject;
        $mail->MsgHTML($info);
        $mail->AddAddress($to, "");
        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }

    public function getRoleOption() {
        return array( '3' => 'Pengurus Regional', '2' => 'Pengurus Pusat','1' => 'Administrator',);
    }

    public function getGenderOption() {
        return array('L' => 'Laki-Laki', 'P' => 'Perempuan');
    }

}
