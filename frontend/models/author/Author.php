<?php

namespace frontend\models\author;

use frontend\models\associative\AuthorBook;
use frontend\models\book\Book;
use \yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "{{%authors}}".
 *
 * @property int $id
 * @property string $author_first_name
 * @property string $author_lastname
 * @property string $author_midname
 *
 * @property AuthorDescription[] $authorDescriptions
 */
class Author extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%authors}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_first_name', 'author_lastname'], 'required'],
            [['author_first_name', 'author_lastname', 'author_midname'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'author_first_name' => 'Имя автора',
            'author_lastname' => 'Фамилия автора',
            'author_midname' => 'Отчество автора',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDescription()
    {
        return $this->hasOne(AuthorDescription::className(), ['author_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getAuthorBook()
    {
        return $this->hasMany(AuthorBook::className(), ['author_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['id' => 'book_id'])->via('authorBook');
    }

}
