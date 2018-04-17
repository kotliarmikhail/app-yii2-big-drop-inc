<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_vendor".
 *
 * @property int $id
 * @property int $client_id
 * @property int $vendor_id
 * @property string $date
 */
class EventVendor extends \yii\db\ActiveRecord
{
    const MINIMUM_VENDOR_PRICE = 999;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_vendor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id', 'vendor_id', 'date'], 'required'],
            [['client_id', 'vendor_id','price'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'client_id' => 'Client ID',
            'vendor_id' => 'Vendor ID',
            'date' => 'Date',
            'price' => 'Price',
        ];
    }
}
