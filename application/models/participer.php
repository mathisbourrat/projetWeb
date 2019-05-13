<?php

class participer extends CI_Model {

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

    public function selectByIdEvent($id) {

        $this->load->database();

        return $this->db->select('*')
                        ->from('participer')
                        ->where('idEvent', $id)
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
        
    /*public function selectParticipant($idE){
        $this->load->database();
        return $this->db->select('*')
                ->from('participer')
                ->join('benevole','benevole.idBen = participer.idBen')
                ->where('idEvent',$idE);
    }  */

}

