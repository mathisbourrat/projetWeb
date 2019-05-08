<?php

class event extends CI_Model {

    protected $table = 'event';

    public function __construct() {
        parent::__construct();
    }

    public function selectAll() {

        $this->load->database();

        return $this->db->select('*')
                        ->from('event')
                        ->order_by('dateDebut')
                        ->get()
                        ->result();
    }

    public function selectById($id) {

        $this->load->database();

        return $this->db->select('*')
                        ->from('event')
                        ->where('idEvent', $id)
                        ->get()
                        ->result();
    }

    public function insert($data) {

        $this->load->database();
        $this->db->set('nomEvent', $data['nomEvent'])
                ->set('dateDebut', $data['dateDebut'])
                ->set('dateFin', $data['dateFin'])
                ->set('lieu', $data['lieu'])
                ->set('idType', $data['idType'])
                ->set('description', $data['description'])
                ->insert($this->table);
    }
    
    public function update($id, $data) {

		$this->load->database();
		$this->db->set('nomEvent', $data['nomEvent'])
                ->set('dateDebut', $data['dateDebut'])
                ->set('dateFin', $data['dateFin'])
                ->set('lieu', $data['lieu'])
                ->set('idType', $data['idType'])
                ->set('description', $data['description'])
                ->where('idClient', $id)
		->update($this->table);
	}

    public function delete($id){
            $this->load->database();
            return $this->db->where('idEvent',$id) ->delete($this->table);
    	}
        
        

}
