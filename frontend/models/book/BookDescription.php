<?php

namespace frontend\models\book;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%book_description}}".
 *
 * @property int $id
 * @property int $book_id
 * @property string $book_description
 * @property string $book_price
 */
class BookDescription extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%book_description}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_description', 'book_price'], 'required'],
            [['book_id'], 'integer'],
            [['book_description'], 'string'],
            [['book_price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'book_description' => 'Описание книги',
            'book_price' => 'Цена',
        ];
    }
}
