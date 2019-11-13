<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $book frontend\models\book\Book */
/* @var $book_description frontend\models\book\BookDescription */

$this->title = 'Добавление новой книги';
$this->params['breadcrumbs'][] = ['label' => 'Книги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_cform', [
        'book' => $book,
        'book_description' => $book_description,
    ]) ?>

</div>
