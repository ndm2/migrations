<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class TheDiffAddRemovePgsql extends AbstractMigration
{
    public function up()
    {
        $this->table('articles')
            ->removeColumn('excerpt')
            ->update();

        $this->table('articles')
            ->addColumn('the_text', 'text', [
                'after' => 'title',
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->update();
    }

    public function down()
    {
        $this->table('articles')
            ->addColumn('excerpt', 'text', [
                'after' => 'title',
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->removeColumn('the_text')
            ->update();
    }
}
