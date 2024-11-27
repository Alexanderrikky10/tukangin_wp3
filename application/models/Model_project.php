<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Project extends CI_Model
{

    protected $table = '';

    public function __construct()
    {
        parent::__construct();
    }

    # code...
    public function getProject()
    {
        return $this->db->get('project');
    }


    public function update_project($id_project, $data)
    {
        $this->db->where('id_project', $id_project);
        $this->db->update('project', $data);
    }

    public function saveProject($data)
    {
        return $this->db->insert('project', $data);
    }


    public function deleteProject($id)
    {
        $this->db->where('id_project', $id);
        return $this->db->delete('project');
    }
}

/* End of file: Model_Project.php */
