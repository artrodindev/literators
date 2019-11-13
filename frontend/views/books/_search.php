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

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]);
    ?>

    <?php $template = '<div><a href = books/view?id=>{{book_name}}</a></div>';
    ?>

     <?= $form->field($model, 'book_name')->widget(Typeahead::classname(), [
     'options' => ['placeholder' => 'Начните набирать название книги'],
     'pluginOptions' => ['highlight'=>true],
     'dataset' => [
            [
               'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('value')",
                'display' => 'value',
                'limit' => 5,
                'remote' => [
                'url' => Url::to(['books/search']) . '?userQuery=%QUERY',
                'wildcard' => '%QUERY',

                    'templates' => [
                        'notFound' => '<div class="text-danger" style="padding:0 8px">По вашему запросу ни одного совпадения</div>',
                        'suggestion' => new JsExpression("Handlebars.compile('{$template}')")
                    ]
                ],

            ]

     ]
     ]); ?>


    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
