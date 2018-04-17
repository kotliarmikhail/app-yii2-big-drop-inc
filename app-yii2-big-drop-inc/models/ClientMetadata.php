<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client_metadata".
 *
 * @property int $client_id
 * @property int $city
 * @property int $state
 */
class ClientMetadata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client_metadata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id'], 'integer'],
            [['city', 'state'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'client_id' => 'Client ID',
            'city' => 'City',
            'state' => 'State',
        ];
    }
}
