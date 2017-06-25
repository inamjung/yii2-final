<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "inmain".
 *
 * @property string $id
 * @property integer $company_id
 * @property integer $bill_no
 * @property string $inventory
 * @property string $date
 */
class Inmain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $name;
    public $qty;
    public $price;
    public $product_id;
    public $exp;
    public static function tableName()
    {
        return 'inmain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['company_id', 'bill_no','product_id','qty','price'], 'integer'],
            [['inventory'], 'string'],
            [['date','exp'], 'safe'],
            [['id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'เลขที่ใบรับเข้า',
            'company_id' => 'บริษัท',
            'bill_no' => 'เลขที่ใบส่งของ',
            'inventory' => 'Inventory',
            'date' => 'วันรับของ',
        ];
    }
    public function getMain(){
        return $this->hasMany(Indetail::className(),['inventory_id'=>'id']);
    }
    public function getCompany(){
        return $this->hasOne(Companys::className(),['id'=>'company_id']);
    }
}
