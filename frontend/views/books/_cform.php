<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $book frontend\models\book\Book */
/* @var $book_description frontend\models\book\BookDescription;
/* @var $form yii\widgets\ActiveForm */
?>


<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($book, 'book_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($book_description, 'book_description')->textarea() ?>

    <?= $form->field($book_description, 'book_price') ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>