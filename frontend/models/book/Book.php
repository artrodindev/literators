<?php

namespace frontend\models\book;

use frontend\models\associative\AuthorBook;
use frontend\models\author\Author;
use Yii;
use \yii\db\ActiveRecord;
/**
 * This is the model class for table "{{%books}}".
 *
 * @property int $id
 * @property string $book_name
 */
class Book extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%books}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_name'], 'required'],
            [['book_name'], 'string', 'max' => 256],
            [['description'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'book_name' => 'Название книги',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getDescription()
    {
        return $this->hasOne(BookDescription::className(), ['book_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getAuthorBook()
    {
        return $this->hasMany(AuthorBook::className(), ['book_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getAuthors()
    {
        return $this->hasMany(Author::className(), ['id' => 'author_id'])->via('authorBook');
    }
}
