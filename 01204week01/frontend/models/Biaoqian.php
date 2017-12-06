<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "biaoqian".
 *
 * @property integer $biaoqian_id
 * @property string $biaoqian_name
 */
class Biaoqian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'biaoqian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['biaoqian_name'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'biaoqian_id' => 'Biaoqian ID',
            'biaoqian_name' => 'Biaoqian Name',
        ];
    }
}
