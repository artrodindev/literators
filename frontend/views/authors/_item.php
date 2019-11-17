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
                    <h3><?= Html::a(Html::encode(
                        $model->author_lastname. ' ' . $model->author_first_name), ['view', 'id' => $model->id]); ?></h3>
                    <h5>Об авторе: <?= $model->description->author_description ?></h5>
                </div>
                <div class="read">
                    <a href="view/<?= Html::encode($model->id) ?>" class="btn btn-default">Подробнее</a>
                </div>
            </div>
        </div>



    </div>
</div>