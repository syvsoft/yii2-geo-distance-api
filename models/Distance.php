<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "distances".
 *
 * @property integer $id
 * @property integer $from_city
 * @property integer $to_city
 * @property string $distance
 */
class Distance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'distances';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_city', 'to_city', 'distance'], 'required'],
            [['from_city', 'to_city'], 'integer'],
            [['distance'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_city' => 'From City',
            'to_city' => 'To City',
            'distance' => 'Distance',
        ];
    }
}
