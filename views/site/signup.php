<?php
use yii\widgets\ActiveForm;
$this->title = "Регистрация"
?>
<div class="wrapper">
    <div id="signup" class="content">
        <h1>Зарегистрироваться</h1>
        <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model,'fullName')->textInput(['placeholder'=>"Фамилия Имя Отчество"])->label("") ?>
<!--            <input type="text" name="fio" placeholder="Фамилия Имя Отчество">-->
            <?= $form->field($model,'email')->input('email',['placeholder'=>"Ваш e-mail"])->label("") ?>
<!--            <input type="email" name="email" placeholder="e-mail">-->
            <?= $form->field($model,'login')->textInput(['placeholder'=>"Логин"])->label("") ?>
<!--            <input type="text" name="login" placeholder="Логин">-->
            <?= $form->field($model,'pass')->passwordInput(['placeholder'=>"Пароль"])->label("") ?>
<!--            <input type="password" name="pass" placeholder="Пароль">-->
            <?= $form->field($model,'pass2')->passwordInput(['placeholder'=>"Повторите пароль"])->label("") ?>
<!--            <input type="password" name="pass2" placeholder="Повторите пароль">-->
            <?= $form->field($model,'image')->fileInput()->label('Аватарка')?>
<!--            <input type="file">-->
            <button type="submit">
                Зарегистрироваться
            </button>
        <?php ActiveForm::end();?>

    </div>
</div>