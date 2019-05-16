<?php

class Event extends CI_Model {

    protected $table = 'event';

    public function __construct() {
        parent::__construct();
    }

    public function selectAll() {


        $this->load->database();

        return $this->db->select('*')
                        ->from('event')
                        ->get()
                        ->result();
    }

    public function selectAllByDate() {


        $date = date('Y/m/d');
        return $this->db->select('*')
                        ->from('event')
                        ->where('dateDebut >', $date)
                        ->order_by('dateDebut')
                        ->get()
                        ->result();
    }

    public function select3ByDate() {

        $date = date('Y/m/d');
        $this->load->database();
        return $this->db->select('*')
                        ->from('event')
                        ->where('dateDebut >', $date)
                        ->order_by('dateDebut')
                        ->limit(3)
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

    public function selectByName($name) {

        $this->load->database();

        return $this->db->select('*')
                        ->from('event')
                        ->where('nomEvent', $name)
                        ->get()
                        ->result();
    }

    public function selectByIdOrga($idOrganisateur) {

        $this->load->database();

        return $this->db->select('*')
                        ->from('event')
                        ->where('idOrga', $idOrganisateur)
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
                ->set('idOrga', $data['idOrga'])
                ->set('description', $data['description'])
                ->set('imageEvent', $data['imageEvent'])
                ->insert($this->table);
    }

    public function update($id, $data) {

        $this->load->database();
        $this->db->set('nomEvent', $data['nomEvent'])
                ->set('dateDebut', $data['dateDebut'])
                ->set('dateFin', $data['dateFin'])
                ->set('lieu', $data['lieu'])
                ->set('description', $data['description'])
                ->set('idType', $data['idType'])
                ->where('idEvent', $id)
                ->update($this->table);
    }

    public function delete($id) {
        $this->load->database();
        return $this->db->where('idEvent', $id)->delete($this->table);
    }

    public function getName($id) {
        $this->load->database();

        return $this->db->select('nomEvent')
                        ->from('event')
                        ->where('idEvent', $id)
                        ->get()
                        ->result();
    }

    public function selectByType($idT) {

        $this->load->database();

        return $this->db->select('*')
                        ->from('event')
                        ->where('idType', $idT)
                        ->get()
                        ->result();
    }

    public function search($name) {

        $this->load->database();

        return $this->db->select('*')
                        ->from('event')
                        ->like('nomEvent', $name)
                        ->or_like('lieu', $name)
                        ->get()
                        ->result();
    }

    public function count_event() {
        $this->db->from('event');
        return $num_rows = $this->db->count_all_results();
    }

}
