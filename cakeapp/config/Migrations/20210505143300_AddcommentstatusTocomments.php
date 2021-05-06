<?php
use Migrations\AbstractMigration;

class AddcommentstatusTocomments extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('builds');
        $table->addColumn('build_status', 'integer', [
            'default' => 0,
            'limit' => 3,
            'null' => true,
            'after'=> 'status'
        ]);
        $table->update();
    }
}
