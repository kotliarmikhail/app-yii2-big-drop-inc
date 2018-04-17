<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendor_metadata".
 *
 * @property int $vendor_id
 * @property string $sphere
 * @property int $level
 */
class VendorMetadata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendor_metadata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendor_id'], 'required'],
            [['vendor_id', 'level'], 'integer'],
            [['sphere'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vendor_id' => 'Vendor ID',
            'sphere' => 'Sphere',
            'level' => 'Level',
        ];
    }
}
