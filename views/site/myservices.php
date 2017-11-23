<?php
use yii\helpers\Url;
?>
<div id="profileContent" class="content">
    <div id="infoBlock">
        <div id="imgBlock" style="background-image: url('ava.jpg');"></div>
        <div id="fioBlock">
            <h2><?= $user->full_name; ?></h2>
        </div>
    </div>
    <div id="myServicesList">
        <?php foreach($services as $user_service): ?>
            <?php
            $today = date("Y-m-d");
            $service = $user_service->service;
            ?>
                    <a href="<?= Url::toRoute(['service','id'=>$service->id]) ?>"><div class="service <?= ($service->date < $today)?"passed":"" ?>">
                        <?= $service->date ?> - <?= $service->name ?>
                    </div></a>

        <?php endforeach; ?>
    </div>
</div>