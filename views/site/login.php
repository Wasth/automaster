<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap\ActiveForm;

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div id="signin" class="content">
        <h1>Войти</h1>
        <?php $form = ActiveForm::begin();?>
            <?= $form->field($model,'username')->textInput(['placeholder'=>'Логин'])->label('')?>
            <?= $form->field($model,'password')->passwordInput(['placeholder'=>'Пароль'])->label('')?>
            <button type="submit">Войти</button>
        <?php ActiveForm::end(); ?>
    </div>

</div>
