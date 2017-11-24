<?php
/**
 * Created by PhpStorm.
 * User: Yula
 * Date: 22.11.2017
 * Time: 13:56
 */

namespace app\models;


use Yii;
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
        $attribute = trim($attribute);
//        var_dump(explode(" ",$this->fullName));die;
        if(sizeof(explode(" ",$this->fullName)) != 3) {
            $this->addError($attribute,'Имя должно быть в формате "Фамилия Имя Отчество"');
        }

    }
    public function signup(){
        if($this->validate()){
            $newUser = $this->loadToUser();
            return $newUser->save();
        }else {
            return false;
        }
    }
    public function setImage($img){
        $this->image = $this->generateFilename($img);
        $img->saveAs(Yii::getAlias("@web").'avatars/'.$this->image);
        return $this->image;
    }
    private function generateFilename($img){
        return $filename = md5(uniqid($img->baseName)).'.'.$img->extension;
    }
    private function loadToUser(){
        $newUser = new User();
        $newUser->login = $this->login;
        $newUser->full_name = $this->fullName;
        $newUser->email = $this->email;
        $newUser->pass = $this->pass;
        $newUser->image = $this->image;
        return $newUser;
    }
}