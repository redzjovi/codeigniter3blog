<?php
class Migration_Post_Categories extends CI_Migration {

	public function up()
	{
		$this->dbforge->drop_table('post_categories', TRUE);

		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'slug' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			)
		));
		$this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('post_categories');

		$data = array(
            array(
    			'id' => '1',
    			'slug' => 'post-category-1',
    			'name' => 'Post Category 1',
    		),
            array(
    			'id' => '2',
    			'slug' => 'post-category-2',
    			'name' => 'Post Category 2',
    		),
            array(
    			'id' => '3',
    			'slug' => 'post-category-3',
    			'name' => 'Post Category 3',
    		),
		);
		$this->db->insert_batch('post_categories', $data);
	}

	public function down()
	{
		$this->dbforge->drop_table('post_categories', TRUE);
	}
}
?>