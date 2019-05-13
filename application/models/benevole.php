<?php

class benevole extends CI_Model {

    protected $table = 'benevole';

    public function __construct() {
        parent::__construct();
    }

    public function selectAll() {

        $this->load->database();

        return $this->db->select('*')
                        ->from('benevole')
                        ->get()
                        ->result();
    }

    public function selectById($id) {

        $this->load->database();

        return $this->db->select('*')
                        ->from('benevole')
                        ->where('idBen', $id)
                        ->get()
                        ->result();
    }
    
    public function selectByMail($mail) {

        $this->load->database();

        return $this->db->select('*')
                        ->from('benevole')
                        ->where('mailBen', $mail)
                        ->get()
                        ->result();
    }

    public function insert($data) {

        $this->load->database();
        $this->db->set('nomBen', $data['nomBen'])
                ->set('prenomBen', $data['prenomBen'])
                ->set('mailBen', $data['mailBen'])
                ->set('telBen', $data['telBen'])
                ->set('codePBen', $data['codePBen'])
                ->set('villeBen', $data['villeBen'])
                ->set('adresseBen', $data['telBen'])
                ->set('mdpBen', $data['mdpBen'])
                ->insert($this->table);
    }
    
    public function update($id, $data) {

		$this->load->database();
		$this->db->set('nomBen', $data['nomBen'])
                ->set('prenomBen', $data['prenomBen'])
                ->set('mailBen', $data['mailBen'])
                ->set('telBen', $data['telBen'])
                ->set('codePBen', $data['codePBen'])
                ->set('villeBen', $data['villeBen'])
                ->set('adresseBen', $data['telBen'])
                ->set('mdpBen', $data['mdpBen'])
                ->where('idBen', $id)
		->update($this->table);
	}

    public function delete($id){
            $this->load->database();
            return $this->db->where('idOrga',$id) ->delete($this->table);
    	}
        
    
        
        

}
