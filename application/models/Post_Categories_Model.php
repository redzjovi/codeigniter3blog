<?php
class Post_Categories_Model extends CI_Model
{
    function create($data)
    {
        $this->db->insert('post_categories', $data);
    }

    function read()
    {
        return $this->db->get('post_categories');
    }

    function read_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('post_categories')->row();
    }

    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('post_categories', $data);
    }

    function delete($id)
    {
        $this->db->delete('post_categories', array('id' => $id));
    }

    function check_unique_slug($id = '', $slug)
	{
        if ( ! empty($id))
            $this->db->where_not_in('id', $id);

		$this->db->where('slug', $slug);
		return $this->db->count_all_results('post_categories');
	}
}
?>