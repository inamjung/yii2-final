<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tmb".
 *
 * @property integer $id
 * @property string $DISTRICT_CODE
 * @property string $name
 * @property integer $amp_id
 * @property integer $chw_id
 * @property integer $GEO_ID
 */
class Tmb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tmb';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DISTRICT_CODE', 'name'], 'required'],
            [['amp_id', 'chw_id', 'GEO_ID'], 'integer'],
            [['DISTRICT_CODE'], 'string', 'max' => 6],
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
            'DISTRICT_CODE' => 'District  Code',
            'name' => 'Name',
            'amp_id' => 'Amp ID',
            'chw_id' => 'Chw ID',
            'GEO_ID' => 'Geo  ID',
        ];
    }
}
