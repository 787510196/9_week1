<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $phone
 * @property string $password
 * @property string $username
 * @property string $birthday
 * @property string $work_address
 * @property integer $biaoqian_id
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone', 'biaoqian_id'], 'integer'],
            [['password', 'username', 'birthday'], 'string', 'max' => 20],
            [['work_address'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Phone',
            'password' => 'Password',
            'username' => 'Username',
            'birthday' => 'Birthday',
            'work_address' => 'Work Address',
            'biaoqian_id' => 'Biaoqian ID',
        ];
    }
}
