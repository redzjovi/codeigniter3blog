<?php
class Migration_Posts extends CI_Migration {

	public function up()
	{
		$this->dbforge->drop_table('posts', TRUE);

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
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'content' => array(
				'type' => 'TEXT',
			),
			'image' => array(
				'type' => 'TEXT',
			),
			'author' => array(
				'type' => 'INT',
				'constraint' => '11',
			),
			'status' => array(
				'type' => 'TINYINT',
				'constraint' => '1',
			),
			'post_date' => array(
				'type' => 'DATETIME',
			),
			'created_date' => array(
				'type' => 'DATETIME',
			),
		));
		$this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('posts');
	}

	public function down()
	{
		$this->dbforge->drop_table('posts', TRUE);
	}
}
?>