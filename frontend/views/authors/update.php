<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\author\Author */

$this->title = 'Редактирование профиля автора: ' . $model->author_lastname . ' ' . $model->author_first_name;
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->author_lastname . ' ' . $model->author_first_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="author-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
