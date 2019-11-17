<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%author_description}}`.
 */
class m191117_195246_create_author_description_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%author_description}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'author_description' => $this->text(),
        ]);

        $this->createIndex(
            'idx-author_description-author_id',
            '{{%author_description}}',
            'author_id'
        );

        $this->addForeignKey(
          'fk-author_description-author_id',
          '{{%author_description}}',
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
        $this->dropTable('{{%author_description}}');

        $this->dropForeignKey(
          'idx-author_description-author_id',
          '{{%author_description}}'
        );

        $this->dropIndex(
            'idx-author_description-author_id',
            '{{%author_description}}'
        );
    }
}
