<?php

class EventCtrl extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function supprimer_benevole($idE, $idB) {
        $this->Participer->delete($idE, $idB);
        
        $idLogged = $this->CookieOrgaModel->isLoggedIn();
        if ((isset($idLogged))) {
            redirect('OrganisateurCtrl/index');
        } 
        else
        $idLogged = $this->CookieOrgaModel->isLoggedIn();

        if ((isset($idLogged))) {
            redirect('BenevoleCtrl/index');
        }
        redirect();
    }
    
    public function create_event() {

        $this->load->library('form_validation');
        $idLogged = $this->CookieOrgaModel->isLoggedIn();
        if ((isset($idLogged))){
            $config = array(
                'upload_path' => "./assets/image/Event",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => FALSE,
                'max_size' => "8192000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "1536",
                'max_width' => "2048",
                'encrypt_name' => TRUE
            );
            $this->load->library('upload', $config);

            if (!($this->upload->do_upload('imageEvent'))) {

                log_message('error', $this->upload->display_errors());
                $data['message'] = "erreur : la photo n'a pas pu s'importer";
                $this->load->view('errors/erreur_formulaire', $data);
                redirect('OrganisateurCtrl/mes_events');
            } else {
                $file_data = $this->upload->data();
                var_dump($file_data);
                $data = array(
                    'nomEvent' => htmlspecialchars($_POST['nomEvent']),
                    "dateDebut" => htmlspecialchars($_POST['dateDebut']),
                    "dateFin" => htmlspecialchars($_POST['dateFin']),
                    "lieu" => htmlspecialchars($_POST['lieu']),
                    "description" => htmlspecialchars($_POST['description']),
                    "idType" => htmlspecialchars($_POST['idType']),
                    "idOrga" => htmlspecialchars($idLogged),
                    "imageEvent" => htmlspecialchars($file_data['file_name'])
                );

                $this->Event->insert($data);
                $data['message'] = "Nouvel événements créé!";
                $this->load->view('errors/validation_formulaire', $data);
                redirect('OrganisateurCtrl/mes_events');
            }
        } else {
            $data['message'] = "session expirée";
            $data['title'] = "Connexion";
            $this->load->view('errors/erreur_formulaire', $data);
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('organisateur/connexion');
            $this->load->view('template/footer');
        }
    }
    
    
    public function supprimer_event($idE) {
        $this->Event->delete($idE);
        redirect('OrganisateurCtrl/mes_events');
    }
    
    public function update_event($idE) {
        $idLogged = $this->CookieOrgaModel->isLoggedIn();
        if ((isset($idLogged))) {
            $data = array(
                "nomEvent" => htmlspecialchars($_POST['nomEvent']),
                "dateDebut" => htmlspecialchars($_POST['dateDebut']),
                "dateFin" => htmlspecialchars($_POST['dateFin']),
                "lieu" => htmlspecialchars($_POST['lieu']),
                "description" => htmlspecialchars($_POST['description']),
                "idType" => htmlspecialchars($_POST['idType'])
            );

            $this->Event->update($idE, $data);
            redirect('OrganisateurCtrl/mes_events');
        } else {
            redirect();
        }
    }

}

