<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserServices */

$this->title = 'Create User Services';
$this->params['breadcrumbs'][] = ['label' => 'User Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-services-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
