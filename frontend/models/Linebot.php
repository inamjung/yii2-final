<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "linebot".
 *
 * @property integer $id
 * @property string $name
 * @property integer $last_id
 */
class Linebot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'linebot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['last_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'last_id' => 'Last ID',
        ];
    }
}
