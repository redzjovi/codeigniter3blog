<?php
class Posts_Model extends CI_Model
{
    public $image = NULL;

    function create($data)
    {
        $this->db->insert('posts', $data);
        return $this->db->insert_id();
    }

    function read()
    {
        $this->db->select('posts.*');
        $this->db->select('users.first_name');
        $this->db->from('posts');
        $this->db->join('users', 'users.id = posts.author', 'left');
        return $this->db->get();
    }

    function read_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('posts')->row();
    }

    function read_by_slug($id)
    {
        $this->db->select('posts.*');
        $this->db->select('users.first_name');
        $this->db->from('posts');
        $this->db->join('users', 'users.id = posts.author', 'left');
        $this->db->where('slug', $id);
        return $this->db->get()->row();
    }

    function read_order_by($field, $direction = 'ASC')
    {
        $this->db->order_by($field, $direction);
        return $this->db->get('posts');
    }

    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('posts', $data);
    }

    function delete($id)
    {
        $this->db->delete('posts', array('id' => $id));
    }

    function check_unique_slug($id = '', $slug)
	{
        if ( ! empty($id))
            $this->db->where_not_in('id', $id);

		$this->db->where('slug', $slug);
		return $this->db->count_all_results('posts');
	}

    function cleansing($directory)
    {
        $data = $this->db->get('posts')->result_array();
        $data = array_column($data, 'image', 'id');

        $files = directory_map($directory);

        $count = 0;
        foreach ($files as $file)
        {
            if ( ! in_array($file, $data))
            {
                unlink($directory.'/'.$file);
                $count++;
            }
        }

        return $count;
    }
}
?>