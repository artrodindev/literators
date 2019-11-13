<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $book frontend\models\book\Book */

$this->title = 'Редактирование: ' . $book->book_name;
$this->params['breadcrumbs'][] = ['label' => 'Книги', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $book->book_name, 'url' => ['view', 'id' => $book->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_uform', [
        'book' => $book,
    ]) ?>

</div>
