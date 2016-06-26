<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m160626_121505_init extends Migration
{
    public function up()
    {
        $this->createTable('url', [
            'id' => Schema::TYPE_PK,
            'url' => 'varchar(255) NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('url');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
