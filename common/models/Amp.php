<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "amp".
 *
 * @property integer $id
 * @property string $AMPHUR_CODE
 * @property string $name
 * @property integer $GEO_ID
 * @property integer $chw_id
 */
class Amp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'amp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AMPHUR_CODE', 'name'], 'required'],
            [['GEO_ID', 'chw_id'], 'integer'],
            [['AMPHUR_CODE'], 'string', 'max' => 4],
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
            'AMPHUR_CODE' => 'Amphur  Code',
            'name' => 'Name',
            'GEO_ID' => 'Geo  ID',
            'chw_id' => 'Chw ID',
        ];
    }
}
