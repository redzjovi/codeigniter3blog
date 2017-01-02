<?php
class Groups_Model extends CI_Model
{
	public function check_unique_group_name($group_id, $group_name)
	{
		$this->db->where_not_in('id', $group_id);
		$this->db->where('name', $group_name);
		return $this->db->count_all_results('groups');
	}
}
?>