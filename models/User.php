<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $full_name
 * @property string $email
 * @property string $login
 * @property string $pass
 * @property string $image
 * @property integer $isAdmin
 *
 * @property UserServices[] $userServices
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
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
            [['full_name'], 'string'],
            [['isAdmin'], 'integer'],
            [['email', 'login', 'pass', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'email' => 'Email',
            'login' => 'Login',
            'pass' => 'Pass',
            'image' => 'Image',
            'isAdmin' => 'Is Admin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserServices()
    {
        return $this->hasMany(UserServices::className(), ['userId' => 'id']);
    }
    public static function findByUsername($username){
        return User::find()->where(["login"=>$username])->one();
    }
    public function validatePassword($password){
        return ($this->pass == $password) ? true: false;
    }


    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
}
