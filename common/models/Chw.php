<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chw".
 *
 * @property integer $id
 * @property string $PROVINCE_CODE
 * @property string $name
 * @property integer $GEO_ID
 */
class Chw extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chw';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PROVINCE_CODE', 'name'], 'required'],
            [['GEO_ID'], 'integer'],
            [['PROVINCE_CODE'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'PROVINCE_CODE' => 'Province  Code',
            'name' => 'Name',
            'GEO_ID' => 'Geo  ID',
        ];
    }
}
