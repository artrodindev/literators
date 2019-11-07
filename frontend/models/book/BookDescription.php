<?php

namespace frontend\models\book;

use Yii;

/**
 * This is the model class for table "{{%book_description}}".
 *
 * @property int $id
 * @property int $book_id
 * @property string $book_description
 * @property string $book_price
 */
class BookDescription extends \yii\db\ActiveRecord
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
            [['book_id', 'book_description', 'book_price'], 'required'],
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
            'id' => 'ID',
            'book_id' => 'Book ID',
            'book_description' => 'Book Description',
            'book_price' => 'Book Price',
        ];
    }
}
