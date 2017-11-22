<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div id="signin" class="content">
        <?php $form = ActiveForm::begin();?>
            <?= $form->field($model,'username')->textInput()?>
            <?= $form->field($model,'password')->passwordInput()?>

            <button type="submit">Войти</button>
        <?php ActiveForm::end(); ?>
    </div>

</div>
