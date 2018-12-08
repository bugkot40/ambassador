<?php

use yii\db\Migration;

/**
 * Class m181205_163635_init_migration
 */
class m181205_163635_init_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('ambassador_section', [
            'id' => $this->primaryKey(),
            'status' => $this->string(),
            'name' => $this->string()->unique(),
            'text' => $this->text(),
            'banner' => $this->string(),
        ]);

        $this->createTable('ambassador_photo', [
            'id' => $this->primaryKey(),
            'section_id' => $this->integer(),
            'name' => $this->string(),
        ]);

        $this->addForeignKey('section-photo-fk', 'ambassador_photo', 'section_id', 'ambassador_section', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('ambassador_photo');
        $this->dropTable('ambassador_section');
    }

}
