<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_services".
 *
 * @property integer $id
 * @property integer $serviceId
 * @property integer $userId
 *
 * @property Services $service
 * @property User $user
 */
class UserServices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serviceId', 'userId'], 'integer'],
            [['serviceId'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['serviceId' => 'id']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serviceId' => 'Service ID',
            'userId' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::className(), ['id' => 'serviceId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }
}
