<?php

namespace frontend\models\author;

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
class Author extends \yii\db\ActiveRecord
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
            'id' => 'ID',
            'author_first_name' => 'Author First Name',
            'author_lastname' => 'Author Lastname',
            'author_midname' => 'Author Midname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthorDescriptions()
    {
        return $this->hasMany(AuthorDescription::className(), ['author_id' => 'id']);
    }
}
