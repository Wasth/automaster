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
            [['fullName'],'validateFullName'],
            [['pass2'],'compare','compareAttribute'=>'pass','message'=>'Пароли должны совпадать'],
            ['image','file','extensions'=>'png, jpg, jpeg','message'=>"Картинка должна быть в формате jpg ли png"]
        ];
    }
    public function validateFullName($attribute,$params) {
        //$this->addError($attribute,'Полное имя должно быть в формате "Фамилия Имя Отчество');

    }
    public function signup(){
        $hasImg =
        $ss = $this->validate();
        var_dump($ss);
        echo "<br>";
        var_dump($this->attributes);die;
    }
    public function setImage(){

    }

}