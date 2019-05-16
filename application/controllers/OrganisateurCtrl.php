<?php

class OrganisateurCtrl extends CI_Controller {

    public function index() {

        $idLogged = $this->CookieOrgaModel->isLoggedIn();
        if ((isset($idLogged))){
            $data['title'] = 'bienvenue';
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
        
        if (null != $this->Organisateur->selectByMail($_POST['mailOrga'])) {
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
            $this->Organisateur->insert($data);
            $data['message'] = "inscription réussite";
            $this->load->view('errors/validation_formulaire', $data);
            $this->load->view('home');
        } else {
            echo "erreur : la confirmation de Mot de passe ne correspond pas au premier";
            $this->load->view('organisateur/inscription');
        }
    }

        
    public function connexion() {
        $idLogged = $this->CookieOrgaModel->isLoggedIn();
        if (!(isset($idLogged))) {
            $data['organisateur'] = $this->Organisateur->selectByMail($_POST['mailOrga']);
            $organisateur = $data['organisateur'];

            if ($organisateur == null) {
                $data['title'] = "connexion";
                $this->load->view('template/header', $data);
                $data['typeEvent'] = $this->Typeevent->selectAll();
                $this->load->view('template/navbar', $data);
                $this->load->view('organisateur/connexion');
                $this->load->view('template/footer');
            } else {

                $idOrga = $organisateur[0]->idOrga;
                if (!password_verify($_POST['mdpOrga'], $organisateur[0]->mdpOrga)) {
                    echo "erreur : mauvais mot de passe";
                    $data['title'] = "connexion";
                    $this->load->view('template/header', $data);
                    $data['typeEvent'] = $this->Typeevent->selectAll();
                    $this->load->view('template/navbar', $data);
                    $this->load->view('organisateur/connexion');
                    $this->load->view('template/footer');
                } 
                else {

                    $cstrong = true;
                    $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                    $values = array(
                        'idOrga' => $idOrga,
                        'token' => $token
                    );
                    $this->input->set_cookie('LoginToken', json_encode($values), (60 * 60 * 24 * 7), '', '/', '', null, true);
                    $this->CookieOrgaModel->setCookie($idOrga, $token);
                    $data['title'] = 'bienvenue';
                    $this->load->view('template/header', $data);
                    $this->load->view('organisateur/navbarO');
                    $this->load->view('organisateur/accueil');
                    $this->load->view('template/footer');
                }
            }
        }
    }
    
    public function deconnexion() {
        $this->CookieOrgaModel->deleteCookie();
        redirect();
    }

    public function profil() {
        $idLogged = $this->CookieOrgaModel->isLoggedIn();
        if ((isset($idLogged))){
                $data['organisateur'] = $this->Organisateur->selectById($idLogged);
                $data['title'] = "votre profil";
                $this->load->view('template/header', $data);
                $this->load->view('organisateur/navbarO');
                $this->load->view('organisateur/profil', $data);
                $this->load->view('template/footer');
            }
        else {
            $data['title'] = "connexion";
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('organisateur/connexion');
            $this->load->view('template/footer');
        }
        // modifie le profil à l'envoi du formulaire
    }

    public function modifier_profil() {

            $idLogged = $this->CookieOrgaModel->isLoggedIn();
        if ((isset($idLogged))){
            $data['organisateur'] = $this->Organisateur->selectById($idLogged);
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

                $this->organisateur->update($idLogged, $data);
                $data['organisateur'] = $this->Organisateur->selectByMail($varmail);
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
            redirect();
        }
    }

    public function mes_events() {
        $idLogged = $this->CookieOrgaModel->isLoggedIn();
        if ((isset($idLogged))){
            $data['event'] = $this->Event->selectByIdOrga($idLogged);
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
        $idLogged = $this->CookieOrgaModel->isLoggedIn();
        if ((isset($idLogged))){
            $data['title'] = "créer son événement";
            $data['typeEvent']=$this->Typeevent->selectAll();
            $this->load->view('template/header', $data);
            $this->load->view('organisateur/navbarO');
            $this->load->view('organisateur/creation_event',$data);
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
        $idLogged = $this->CookieOrgaModel->isLoggedIn();
        if ((isset($idLogged))){
            $data['event'] = $this->Event->selectById($idE);
            $data['title'] = "modifier son événement";
            $data['typeEvent']=$this->Typeevent->selectAll();
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
                $this->index();
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
        $idLogged = $this->CookieOrgaModel->isLoggedIn();
        if ((isset($idLogged))){
            $data = array(
                "nomEvent" => htmlspecialchars($_POST['nomEvent']),
                "dateDebut" => htmlspecialchars($_POST['dateDebut']),
                "dateFin" => htmlspecialchars($_POST['dateFin']),
                "lieu" => htmlspecialchars($_POST['lieu']),
                "description" => htmlspecialchars($_POST['description']),
                "idType"=> htmlspecialchars($_POST['idType'])
            );

            $this->Event->update($idE, $data);
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
        $idLogged = $this->CookieOrgaModel->isLoggedIn();
        if ((isset($idLogged))){
        $this->participer->delete($idE, $idB);
        $data['message'] = "inscription supprimée";
        $this->load->view('errors/validation_formulaire', $data);
        $this->afficher_benevoles($idE);
        }
        else{
            redirect();
        }
    }

    public function afficher_benevoles($idE) {
        $idLogged = $this->CookieOrgaModel->isLoggedIn();
        if ((isset($idLogged))){
        $data['benevoles'] = $this->participer->selectParticipant($idE);
        $data['nameEvent'] = $this->Event->getName($idE);
        $data['title'] = "participants";
        $this->load->view('template/header', $data);
        $this->load->view('organisateur/navbarO');
        $this->load->view('organisateur/liste_benevoles', $data);
        $this->load->view('template/footer');
        }
    }


    public function supprimer_event($idE) {
        $this->Event->delete($idE);
        $data['message'] = "événement supprimé";
        $data['title'] = "mes événements";
        $this->load->view('errors/validation_formulaire', $data);
        $this->load->view('template/header', $data);
        $this->load->view('organisateur/navbarO');
        $this->load->view('organisateur/mes_events');
        $this->load->view('template/footer');
    }

}
