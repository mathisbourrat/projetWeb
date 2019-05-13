<?php

class organisateur extends CI_Model {

    protected $table = 'organisateur';

    public function __construct() {
        parent::__construct();
    }

    public function selectAll() {

        $this->load->database();

        return $this->db->select('*')
                        ->from('organisateur')
                        ->get()
                        ->result();
    }

    public function selectById($id) {

        $this->load->database();

        return $this->db->select('*')
                        ->from('organisateur')
                        ->where('idOrga', $id)
                        ->get()
                        ->result();
    }
    
    public function selectByMail($mail) {

        $this->load->database();

        return $this->db->select('*')
                        ->from('organisateur')
                        ->where('mailOrga', $mail)
                        ->get()
                        ->result();
    }

    public function insert($data) {

        $this->load->database();
        $this->db->set('nomOrga', $data['nomOrga'])
                ->set('prenomOrga', $data['prenomOrga'])
                ->set('mailOrga', $data['mailOrga'])
                ->set('telOrga', $data['telOrga'])
                ->set('codePOrga', $data['codePOrga'])
                ->set('villeOrga', $data['villeOrga'])
                ->set('adresseOrga', $data['telOrga'])
                ->set('mdpOrga', $data['mdpOrga'])
                ->insert($this->table);
    }
    
    public function update($id, $data) {

		$this->load->database();
		$this->db->set('nomOrga', $data['nomOrga'])
                ->set('prenomOrga', $data['prenomOrga'])
                ->set('mailOrga', $data['mailOrga'])
                ->set('telOrga', $data['telOrga'])
                ->set('codePOrga', $data['codePOrga'])
                ->set('villeOrga', $data['villeOrga'])
                ->set('adresseOrga', $data['telOrga'])
                ->where('idOrga', $id)
		->update($this->table);
	}

    public function delete($id){
            $this->load->database();
            return $this->db->where('idOrga',$id) ->delete($this->table);
    	}
        
        

}
