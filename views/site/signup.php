<?php
use yii\widgets\ActiveForm;
$this->title = "Регистрация"
?>
<div class="wrapper">
    <div id="signup" class="content">
        <h1>Зарегистрироваться</h1>
        <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model,'fullName')->textInput(['placeholder'=>"Фамилия Имя Отчество"])->label("") ?>
            <?= $form->field($model,'email')->input('email',['placeholder'=>"Ваш e-mail"])->label("") ?>
            <?= $form->field($model,'login')->textInput(['placeholder'=>"Логин"])->label("") ?>
            <?= $form->field($model,'pass')->passwordInput(['placeholder'=>"Пароль"])->label("") ?>
            <?= $form->field($model,'pass2')->passwordInput(['placeholder'=>"Повторите пароль"])->label("") ?>
            <?= $form->field($model,'image')->fileInput()->label('Аватарка')?>
            <button type="submit">
                Зарегистрироваться
            </button>
        <?php ActiveForm::end();?>

    </div>
</div>