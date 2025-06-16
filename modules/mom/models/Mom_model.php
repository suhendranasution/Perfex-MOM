<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mom_model extends App_Model
{
    private $table = 'mom_notes';

    public function __construct()
    {
        parent::__construct();
    }

    public function add($project_id, $data)
    {
        $insert = [
            'project_id'  => $project_id,
            'meeting_date'=> to_sql_date($data['meeting_date']),
            'description' => $data['description'],
            'hash'        => app_generate_hash(),
        ];
        $this->db->insert($this->table, $insert);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $update = [
            'meeting_date'=> to_sql_date($data['meeting_date']),
            'description' => $data['description'],
        ];
        $this->db->where('id', $id);
        $this->db->update($this->table, $update);
        return $this->db->affected_rows() > 0;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows() > 0;
    }

    public function get($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row();
    }

    public function get_by_project($project_id)
    {
        if (!$project_id) {
            return [];
        }
        return $this->db->where('project_id', $project_id)->get($this->table)->result();
    }

    public function get_by_hash($hash)
    {
        return $this->db->where('hash', $hash)->get($this->table)->row();
    }
}
