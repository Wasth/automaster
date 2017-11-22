<div id="profileContent" class="content">
    <div id="infoBlock">
        <div id="imgBlock" style="background-image: url('ava.jpg');"></div>
        <div id="fioBlock">
            <h2><?=$user->full_name ?></h2>
        </div>
    </div>
    <div id="myServicesList">
        <?php foreach($services as $service): ?>
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