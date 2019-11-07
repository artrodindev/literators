<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>

<div class="container">
    <div class="row">

        <div class="col-md-4 col-sm-6">
            <div class="serviceBox">
                <div class="service-icon">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="service-content">
                    <h3><?= Html::a(Html::encode($model->book_name), ['view', 'id' => $model->id]); ?></h3>
                    <h5>Автор(ы): </h5>
                    <h5>Жанр(ы): </h5>
                    <h5>Стоимость: <?= $model->description->book_price ?></h5>
                </div>
                <div class="read">
                    <a href="view/<?= $model->id ?>" class="btn btn-default">Подробнее</a>
                </div>
            </div>
        </div>



    </div>
</div>
