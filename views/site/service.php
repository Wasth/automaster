<?php
use yii\helpers\Url;
?>
<div id="fullService" class="content">
    <h2><a href="<?= Url::toRoute('/') ?>"><</a> <?= $service->name ?></h2>
    <p><?= $service->date ?></p>
    <form>
        <input type="hidden" name="<?= $service->id ?>">
        <?php if(Yii::$app->user->isGuest): ?>
            <h3>Вы не можете записаться на услугу, т.к. вы не авторизованный пользователь</h3>
        <?php else: ?>
            <button type="submit">Записаться</button>
        <?php endif; ?>

    </form>
</div>

