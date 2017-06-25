<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "companys".
 *
 * @property integer $id
 * @property string $name
 * @property string $tel
 * @property string $addr
 */
class Companys extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'companys';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'addr'], 'string', 'max' => 255],
            [['tel'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'บริษัท',
            'tel' => 'Tel',
            'addr' => 'ที่อยู่',
        ];
    }
}
