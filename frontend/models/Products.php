<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $name
 * @property string $detail
 * @property integer $qty
 * @property double $price
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'detail', 'qty', 'price'], 'required'],
            [['detail'], 'string'],
            [['qty'], 'integer'],
            [['price'], 'number'],
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
            'name' => 'ชื่อวัสดุ',
            'detail' => 'คุณสมบัตเฉพาะ',
            'qty' => 'จำนวนคงเหลือ',
            'price' => 'ราคา',
        ];
    }
}
