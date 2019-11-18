<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%author_book}}`.
 */
class m191118_174905_create_author_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%author_book}}', [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-author_book-book_id-author_id',
            '{{%author_book}}',
            'book_id, author_id'
        );

        $this->addForeignKey(
            'fk-author_book-book_id',
            '{{%author_book}}',
            'book_id',
            '{{%books}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-author_book-author_id',
            '{{%author_book}}',
            'author_id',
            '{{%authors}}',
            'id',
            'CASCADE'

        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%author_book}}');

        $this->dropIndex(
            'idx-author_book-book_id-author_id',
            '{{%author_book}}'
        );

        $this->dropForeignKey(
            'fk-author_book-book_id',
            '{{%author_book}}'
        );

        $this->dropForeignKey(
            'fk_author_book-author_id',
            '{{%author_booK}}'
        );
    }
}
