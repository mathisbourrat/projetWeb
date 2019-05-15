<?php

class typeevent extends CI_Model {

    protected $table = 'typeevent';

    public function __construct() {
        parent::__construct();
    }

    public function selectAll() {

        $this->load->database();

        return $this->db->select('*')
                        ->from('typeevent')
                        ->get()
                        ->result();
    }

    public function selectById($id) {

        $this->load->database();

        return $this->db->select('*')
                        ->from('typeevent')
                        ->where('idType', $id)
                        ->get()
                        ->result();
    }

    public function insert($data) {

        $this->load->database();
        $this->db->set('descriptionType', $data['descriptionType'])
                ->insert($this->table);
    }

    public function update($id, $data) {

        $this->load->database();
        $this->db->set('descriptionType', $data['descriptionType'])
                ->where('idType', $id)
                ->update($this->table);
    }

    public function delete($id) {
        $this->load->database();
        return $this->db->where('idType', $id)->delete($this->table);
    }
    
    }
