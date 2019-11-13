<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book_description}}`.
 */
class m191112_220324_create_book_description_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book_description}}', [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer()->notNull(),
            'book_description' => $this->text(),
            'book_price' => $this->decimal(),
        ]);

        $this->createIndex(
            'idx-book_description-book_id',
            '{{%book_description}}',
            'book_id'
        );

        $this->addForeignKey(
          'fk-book_description-book_id',
            '{{%book_description}}',
            'book_id',
            '{{%books}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book_description}}');

        $this->dropForeignKey(
            'fk-book_description-book_id',
            '{{%book_description}}'
        );

        $this->dropIndex(
          'idx-book_description-book_id',
          '{{%book_description}}'
        );

    }
}
