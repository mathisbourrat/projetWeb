<?php

class OrganisateurCtrl extends CI_Controller {

    public function index() {

        if (isset($_COOKIE['idOrga']) && isset($_COOKIE['mdpOrga'])) {
            $data['titre'] = 'bienvenue';
            $this->load->view('template/header', $data);
            $this->load->view('organisateur/navbarO');
            $this->load->view('organisateur/accueil');
            $this->load->view('template/footer');
        } else {
            echo "vous n'êtes plus connecté";
            $data['title'] = 'connexion';
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('organisateur/connexion');
            $this->load->view('template/footer');
        }
    }

    public function inscription() {
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
        $this->load->view('organisateur/inscription');
        $this->load->model('organisateur');
        if (null != $this->organisateur->selectByMail($_POST['mailOrga'])) {
            echo "erreur : cet email n'est pas disponible";
            $this->load->view('organisateur/inscription');
        } else if ($_POST['mdpOrga'] == $_POST['mdpOrga2']) {
            $data = array(
                "nomOrga" => htmlspecialchars($_POST['nomOrga']),
                "prenomOrga" => htmlspecialchars($_POST['prenomOrga']),
                "mailOrga" => htmlspecialchars($_POST['mailOrga']),
                "telOrga" => htmlspecialchars($_POST['telOrga']),
                "codePOrga" => htmlspecialchars($_POST['codePOrga']),
                "villeOrga" => htmlspecialchars($_POST['villeOrga']),
                "adresseOrga" => htmlspecialchars($_POST['adresseOrga']),
                "mdpOrga" => htmlspecialchars(crypt($_POST['mdpOrga'], 'md5')));
            $this->organisateur->insert($data);
            echo "Vous avez été inscrit en tant qu'organisateur";
            $this->load->view('home');
        } else {
            echo "erreur : la confirmation de Mot de passe ne correspond pas au premier";
            $this->load->view('organisateur/inscription');
        }
    }

    public function connexion() {
        $organisateur = $this->organisateur->selectByMail($_POST['mailOrga']);
        $mdpOrganisateur = $_POST['mdpOrga'];
        if ($organisateur == null) {
            echo "erreur : cet email n'existe pas"; //a gicler
            $this->load->view('organisateur/connexion');
        } else {
            $idOrganisateur = $organisateur[0]->idOrga;
            $mailOrganisateur = $_POST['mailOrga'];
            if (!password_verify($_POST['mdpOrga'], $organisateur[0]->mdpOrga)) {
                echo "erreur : mauvais mot de passe";
                $this->load->view('organisateur/connexion');
            } else {
                $data['organisateur'] = $organisateur;
                if ($data['organisateur'] != NULL && password_verify($_POST['mdpOrga'], $organisateur[0]->mdpOrga)) {
                    $this->session->set_userdata(array('username' => $organisateur));
                    //var_dump($idOrganisateur);
                    setcookie('idOrga', $idOrganisateur, time() + 3600, '/');
                    setcookie('mdpOrga', $mdpOrganisateur, time() + 3600, '/');

                    var_dump($_COOKIE['idOrga']);
                    $this->index();
                }
            }
        }
    }

    public function deconnexion() {
        $this->load->helper('cookie');
        $this->session->unset_userdata('username');
        setcookie('idOrga', "", 0);
        setcookie('mdpOrga', "", 0);
        $data['title'] = "accueil";
        $data['event']= $this->event->select3byDate();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('home',$data);
        $this->load->view('template/footer');
    }

    public function profil() {
        if (isset($_COOKIE['idOrga'])) {
            $varid = $this->input->cookie('idOrga');
            var_dump($varid);
            if (isset($varid)) {
                $data['organisateur'] = $this->organisateur->selectById($varid);
                $data['title'] = "votre profil";
                $this->load->view('template/header', $data);
                $this->load->view('organisateur/navbarO');
                $this->load->view('organisateur/profil', $data);
                $this->load->view('template/footer');
            }
        } else {
            $data['title'] = "connexion";
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('organisateur/connexion');
            $this->load->view('template/footer');
        }
        // modifie le profil à l'envoi du formulaire
    }

    public function modifier_profil() {

        if (isset($_COOKIE['idOrga'])) {
            $varid = $this->input->cookie('idOrga');
            var_dump($varid);
            $data['organisateur'] = $this->organisateur->selectById($varid);
            $mdp = $data['organisateur'][0]->mdpOrga;
            $id = $data['organisateur'][0]->idOrga;
            $varmail = $data['organisateur'][0]->mailOrga;

            if ($varmail != $_POST['mailOrga']) {
                $data['message'] = "erreur : Vous ne pouvez pas changer votre adresse email";
                $this->load->view('errors/erreur_formulaire', $data);
                $this->index();
            } else {
                $data = array(
                    "nomOrga" => htmlspecialchars($_POST['nomOrga']),
                    "prenomOrga" => htmlspecialchars($_POST['prenomOrga']),
                    "mailOrga" => htmlspecialchars($_POST['mailOrga']),
                    "adresseOrga" => htmlspecialchars($_POST['adresseOrga']),
                    "codePOrga" => htmlspecialchars($_POST['codePOrga']),
                    "villeOrga" => htmlspecialchars($_POST['villeOrga']),
                    "telOrga" => htmlspecialchars($_POST['telOrga'])
                );

                $this->organisateur->update($varid, $data);
                $data['organisateur'] = $this->organisateur->selectByMail($varmail);
                $data['message'] = "Votre profil organisateur a été modifié avec succès";
                $data['title'] = "accueil";
                $this->load->view('errors/validation_formulaire', $data);
                $this->load->view('template/header', $data);
                $this->load->view('organisateur/navbarO');
                $this->load->view('organisateur/accueil');
                $this->load->view('template/footer');
            }
        } else {
            $data['message'] = "erreur : Votre session a expiré, veuillez vous reconnecter";
            $this->load->view('errors/erreur_formulaire', $data);
            $this->load->view('organisateur/connexion');
        }
    }

    public function mes_events() {
        if (isset($_COOKIE['idOrga'])) {
            $varidorga = $this->input->cookie('idOrga');
            $data['event'] = $this->event->selectByIdOrga($varidorga);
            $data['title'] = 'Mes événements';
            $this->load->view('template/header', $data);
            $this->load->view('organisateur/navbarO');
            $this->load->view('organisateur/mes_events', $data);
            $this->load->view('template/footer');
        } else {
            $data['message'] = "erreur : Votre session a expiré, veuillez vous reconnecter";
            $this->load->view('errors/erreur_formulaire', $data);
            $data['title'] = "Connexion";
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('organisateur/connexion');
            $this->load->view('template/footer');
        }
    }

    public function creation_event() {
        if (isset($_COOKIE['idOrga'])) {
            $data['title'] = "créer son événement";
            $this->load->view('template/header', $data);
            $this->load->view('organisateur/navbarO');
            $this->load->view('organisateur/creation_event');
            $this->load->view('template/footer');
        } else {
            $data['title'] = "connexion";
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('organisateur/connexion');
            $this->load->view('template/footer');
        }
    }

    public function modification_event($idE) {
        if (isset($_COOKIE['idOrga'])) {
            $data['event'] = $this->event->selectById($idE);
            $data['title'] = "modifier son événements";
            $this->load->view('template/header', $data);
            $this->load->view('organisateur/navbarO');
            $this->load->view('organisateur/modification_event', $data);
            $this->load->view('template/footer');
        } else {
            $data['title'] = "connexion";
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('organisateur/connexion');
            $this->load->view('template/footer');
        }
    }

    public function create_event() {

        $this->load->library('form_validation');
        if (isset($_COOKIE['idOrga'])) {
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
                $this->index();
            } else {
                $file_data = $this->upload->data();
                var_dump($file_data);
                $varid = (int) ($this->input->cookie('idOrga'));
                $data = array(
                    'nomEvent' => htmlspecialchars($_POST['nomEvent']),
                    "dateDebut" => htmlspecialchars($_POST['dateDebut']),
                    "dateFin" => htmlspecialchars($_POST['dateFin']),
                    "lieu" => htmlspecialchars($_POST['lieu']),
                    "description" => htmlspecialchars($_POST['description']),
                    "idType" => htmlspecialchars($_POST['idType']),
                    "idOrga" => htmlspecialchars($varid),
                    "imageEvent" => htmlspecialchars($file_data['file_name'])
                );

                $this->event->insert($data);
                $data['message'] = "erreur : nouvel événements créé!";
                $this->load->view('errors/validation_formulaire', $data);
                $this->mes_events();
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

    public function modifier_event($idE) {
        if (isset($_COOKIE['idOrga'])) {
            $data = array(
                "nomEvent" => htmlspecialchars($_POST['nomEvent']),
                "dateDebut" => htmlspecialchars($_POST['dateDebut']),
                "dateFin" => htmlspecialchars($_POST['dateFin']),
                "lieu" => htmlspecialchars($_POST['lieu']),
                "description" => htmlspecialchars($_POST['description']),
            );

            $this->event->update($idE, $data);
            $data['message'] = "événements modifié avec succès";
            $data['title'] = "mes événements";
            $this->load->view('errors/validation_formulaire', $data);
            $this->load->view('template/header', $data);
            $this->load->view('organisateur/navbarO');
            $this->load->view('organisateur/mes_events');
            $this->load->view('template/footer');
        } else {
            $data['message'] = "erreur : Votre session a expiré, veuillez vous reconnecter";
            $this->load->view('errors/erreur_formulaire', $data);
            $this->load->view('organisateur/connexion');
        }
    }

    public function supprimer_benevole($idE, $idB) {
        $this->participer->delete($idE, $idB);
        $data['message'] = "inscription supprimée";
        $this->load->view('errors/validation_formulaire', $data);
        $this->afficher_benevoles($idE);
    }

    public function afficher_benevoles($idE) {
        $data['benevoles'] = $this->participer->selectParticipant($idE);
        $data['nameEvent'] = $this->event->getName($idE);
        $data['title'] = "participants";
        $this->load->view('template/header', $data);
        $this->load->view('organisateur/navbarO');
        $this->load->view('organisateur/liste_benevoles', $data);
        $this->load->view('template/footer');
    }

    public function update_mdp() {
        
    }

    public function supprimer_event($idE) {
        $this->event->delete($idE);
        $data['message'] = "événement supprimé";
        $data['title'] = "mes événements";
        $this->load->view('errors/validation_formulaire', $data);
        $this->load->view('template/header', $data);
        $this->load->view('organisateur/navbarO');
        $this->load->view('organisateur/mes_events');
        $this->load->view('template/footer');
    }

}
