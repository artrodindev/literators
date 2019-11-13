<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\typeahead\Typeahead;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\book\BookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

 <div class="book-search">

    <?php echo 1;/*$form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]);  */

     echo '<label class="control-label">Автор</label>';
     $template = '<div> {{book_id}} {{book_name}}<h4></p></div>';

     echo Typeahead::widget([
     'name' => 'country',
     'options' => ['placeholder' => 'Начните вводить имя автора...'],
     'pluginOptions' => ['highlight'=>true],
     'dataset' => [
     [
     'remote' => [
     'url' => Url::to(['books/search']) . '?userQuery=%QUERY',
     'wildcard' => '%QUERY'
     ],
     'templates' => [
     'notFound' => '<div class="text-danger" style="padding:0 8px">Не нашли нужного автора?  </div>',
     'suggestion' => new JsExpression("Handlebars.compile('{$template}')")
     ],
     'display' => 'empty',
     ]
     ]
     ]); ?>

    <div class="form-group">
        <?= 1//Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php echo 1//ActiveForm::end(); ?>

</div>
