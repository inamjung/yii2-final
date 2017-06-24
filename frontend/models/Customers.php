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
            [['createdate'], 'safe'],
            [['name'], 'string', 'max' => 150],
            [['addr', 'email'], 'string', 'max' => 100],
            [['p', 'tel', 'interest', 'pic'], 'string', 'max' => 255],
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
}
