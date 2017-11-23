<?php
/**
 * Created by PhpStorm.
 * User: Yula
 * Date: 22.11.2017
 * Time: 13:56
 */

namespace app\models;


use yii\base\Model;

class SignupForm extends Model
{
    public $fullName;
    public $email;
    public $login;
    public $pass;
    public $pass2;
    public $image;
    public function rules()
    {
        return [
            [['fullName','email','login','pass','pass2','image'],'required'],
            [['email'],'email'],
            [['email'],'unique','targetClass'=>'app\models\User','targetAttribute'=>'email'],
            [['login'],'unique','targetClass'=>'app\models\User','targetAttribute'=>'login'],
            [['fullName'],'validateFullName','message'=>'Полное имя должно быть в формате "Фамилия Имя Отчество"'],
            [['pass'],'validatePassword','message'=>'Пароли должны совпадать'],
        ];
    }
    public function validateFullName() {
        return false;
    }
    public function validatePassword() {
        return true;
    }
}