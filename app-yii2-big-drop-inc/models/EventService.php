<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property string $title
 * @property string $discription
 * @property string $created_date
 */
class EventService extends \yii\db\ActiveRecord
{
    //public $client_id;
   // public $service_id;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'discription', 'created_date'], 'required'],
            [['discription'], 'string'],
            [['created_date'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'discription' => 'Discription',
            'created_date' => 'Created Date',
        ];
    }
}
