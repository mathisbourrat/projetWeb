<?php

class Participer extends CI_Model {

    protected $table = 'participer';

    public function __construct() {
        parent::__construct();
    }

    public function selectAll() {

        $this->load->database();

        return $this->db->select('*')
                        ->from('participer')
                        ->get()
                        ->result();
    }

    public function selectByIdEvent($idE,$per_page,$offset) {

        $this->load->database();

        return $this->db->select('*')
                        ->from('participer')
                        ->where('idEvent', $idE)
                ->limit($per_page,$offset)
                        ->get()
                        ->result();
    }
    
    public function selectByIdBen($id) {

        $this->load->database();

        return $this->db->select('*')
                        ->from('participer')
                        ->where('idBen', $id)
                        ->get()
                        ->result();
    }
    
    public function selectByKey($idEvent,$idBen) {

        $this->load->database();

        return $this->db->select('*')
                        ->from('participer')
                        ->where('idBen', $idBen)
                        ->where('idEvent', $idEvent)
                        ->get()
                        ->result();
    }

    public function insert($data) {

        $this->load->database();
        $this->db->set('idEvent', $data['idEvent'])
                ->set('idBen', $data['idBen'])
                ->insert($this->table);
    }


    public function delete($idEvent,$idBen){
            $this->load->database();
            return $this->db
                    ->where('idEvent',$idEvent)
                    ->where('idBen',$idBen)
                    ->delete($this->table);
            
    	}
      
        
    public function selectParticipant($idE){
        $this->load->database();
        return $this->db->select('*')
                ->from('participer p')
                ->join('benevole b','b.idBen = p.idBen')
                ->where('idEvent',$idE)
                ->get()
                ->result();
    }
    
    public function selectEvent($idB){
        $this->load->database();
        return $this->db->select('*')
                ->from('participer p')
                ->join('event e','e.idEvent = p.idEvent')
                ->where('idBen',$idB)
                ->get()
                ->result();
    }

}

