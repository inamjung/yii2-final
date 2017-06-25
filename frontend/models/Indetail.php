<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "indetail".
 *
 * @property integer $id
 * @property string $inventory_id
 * @property integer $product_id
 * @property double $price
 * @property integer $qty
 * @property string $exp
 */
class Indetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'indetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inventory_id', 'product_id'], 'required'],
            [['product_id', 'qty'], 'integer'],
            [['price'], 'number'],
            [['exp'], 'safe'],
            [['inventory_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'inventory_id' => 'เลขที่ใบรับเข้า',
            'product_id' => 'วัสดุ',
            'price' => 'ราคา',
            'qty' => 'จำนวนรับ',
            'exp' => 'EXP',
        ];
    }
    public function  getProduct(){
        return $this->hasOne(Products::className(), ['id'=>'product_id']);
    }
}
