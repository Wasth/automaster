<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Услуги - Automaster';

?>
<div id="servicesWrapper">

    <div id="services" class="content">
        <div class="filter-item">
            <a href="<?= Url::toRoute(['/']) ?>">Все</a>
        </div>
        <div class="filter-item">
            <a href="<?= Url::toRoute(['/','filter'=>'active']) ?>">Активно</a>
        </div>
        <div class="filter-item">
            <a href="<?= Url::toRoute(['/','filter'=>'passed']) ?>">Прошла</a>
        </div>
        <div class="filter-item">
            <a href="<?= Url::toRoute(['/','filter'=>'busy']) ?>">Нет мест</a>
        </div>
        <div id="servicesList">
            <?php foreach ($services as $service): ?>
                <?php
                    $today = date("Y-m-d");
                ?>
                <?php if($service->date < $today): ?>
                    <div class="service passed">
                        <?= $service->date ?> - <?= $service->name ?>
                    </div>
                <?php elseif($service->max_order <= $service->orders): ?>
                    <div class="service busy">
                        <?= $service->date ?> - <?= $service->name ?>
                    </div>
                <?php else: ?>

                    <a href="<?= Url::toRoute(['service','id'=>$service->id]) ?>"><div class="service">
                        <?= $service->date ?> - <?= $service->name ?>
                    </div></a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
