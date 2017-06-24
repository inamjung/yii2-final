<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property integer $id
 * @property string $name
 * @property string $addr
 * @property integer $t
 * @property integer $a
 * @property integer $c
 * @property string $p
 * @property string $tel
 * @property string $department_id
 * @property string $interest
 * @property string $email
 * @property string $pic
 * @property string $createdate
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $pic_img;
    
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t', 'a', 'c','department_id'], 'integer'],
            [['createdate', 'interest'], 'safe'],
            [['name'], 'string', 'max' => 150],
            [['addr', 'email'], 'string', 'max' => 100],
            [['p', 'tel', 'pic'], 'string', 'max' => 255],
            [['pic_img'],'file','skipOnEmpty'=>'true','on'=>'update','extensions'=>'jpg,png']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อ - สกุล',
            'addr' => 'ที่อยู่ ',
            't' => 'ตำบล',
            'a' => 'อำเภอ',
            'c' => 'จังหวัด',
            'p' => 'รหัสไปรษณย์',
            'tel' => 'โทรศัพท์',
            'department_id' => 'แผนก',
            'interest' => 'ความสนใจ',
            'email' => 'Email',
            'pic' => 'Pic',
            'createdate' => 'Createdate',
        ];
    }
    
    public function getArray($value) {
        return explode(',', $value);
    }

    public function setToArray($value) {
        return is_array($value) ? implode(',', $value) : NULL;
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if (!empty($this->id)) {
                $this->interest = $this->setToArray($this->interest);
            }
            return true;
        } else {
            return false;
        }                
    }
    public static function itemAlias($type, $code = NULL) {
        $_items = array(
            'interest' => array(
                'php' => 'Php',
                'access' => 'Access',
                'delphi'=>'Delphi',
                'css'=>'Css',
                'c#'=>'C#'
            ),
             );


        if (isset($code)) {
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        } else {
            return isset($_items[$type]) ? $_items[$type] : false;
        }
    }
}
