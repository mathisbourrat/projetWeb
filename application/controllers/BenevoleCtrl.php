<?php

class BenevoleCtrl extends CI_Controller {

    public function index() {

        if (isset($_COOKIE['idBen']) && isset($_COOKIE['mdpBen'])) {
            $data['title'] = 'bienvenue';
            $this->load->view('template/header', $data);
            $this->load->view('benevole/navbarB');
            $this->load->view('benevole/accueil');
            $this->load->view('template/footer');
        } else {
            $data['title'] = 'connexion';
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('benevole/connexion');
            $this->load->view('template/footer');
        }
    }

    public function profil() {
        if (isset($_COOKIE['idBen'])) {
            $varid = $this->input->cookie('idBen');
            var_dump($varid);
            if (isset($varid)) {
                $data['benevole'] = $this->benevole->selectById($varid);
                $data['title'] = "votre profil";
                $this->load->view('template/header', $data);
                $this->load->view('benevole/navbarB');
                $this->load->view('benevole/profil', $data);
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

    public function inscription() {
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
        $this->load->model('benevole');
        if (null != $this->benevole->selectByMail($_POST['mailBen'])) {
            echo "erreur : cet email n'est pas disponible";
            $this->load->view('benevole/inscription');
        } else if ($_POST['mdpBen'] == $_POST['mdpBen2']) {
            $data = array(
                "nomBen" => htmlspecialchars($_POST['nomBen']),
                "prenomBen" => htmlspecialchars($_POST['prenomBen']),
                "mailBen" => htmlspecialchars($_POST['mailBen']),
                "telBen" => htmlspecialchars($_POST['telBen']),
                "codePBen" => htmlspecialchars($_POST['codePBen']),
                "villeBen" => htmlspecialchars($_POST['villeBen']),
                "adresseBen" => htmlspecialchars($_POST['adresseBen']),
                "mdpBen" => htmlspecialchars(crypt($_POST['mdpBen'], 'md5')));
            $this->benevole->insert($data);
            echo "Vous avez été inscrit en tant que benevole";
            $this->index();
        } else {
            echo "erreur : la confirmation de Mot de passe ne correspond pas au premier";
            $this->load->view('benevole/inscription');
        }
    }

    public function connexion() {
        $data['benevole'] = $this->benevole->selectByMail($_POST['mailBen']);
        $benevole = $data['benevole'];
        var_dump($benevole);
        if ($benevole == null) {
            $data['title'] = "connexion";
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('organisateur/connexion');
            $this->load->view('template/footer');
            $this->load->view('benevole/connexion');
        } else {
            
            $idBenevole = $benevole[0]->idBen;
            if (!password_verify($_POST['mdpBen'], $benevole[0]->mdpBen)) {
                echo "erreur : mauvais mot de passe";
                $data['title'] = "connexion";
                $this->load->view('template/header', $data);
                $this->load->view('template/navbar');
                $this->load->view('organisateur/connexion');
                $this->load->view('template/footer');
                $this->load->view('benevole/connexion');
            } else {
                $data['benevole'] = $benevole;
                $mdpBenevole = $benevole[0]->mdpBen;
                if ($data['benevole'] != NULL && password_verify($_POST['mdpBen'], $benevole[0]->mdpBen)) {
                    $this->session->set_userdata(array('benevole' => $benevole));
                    setcookie('idBen', $idBenevole, time() + 3600, '/');
                    setcookie('mdpBen', $mdpBenevole, time() + 3600, '/');

                    //var_dump($_COOKIE['idBen']);
                    $this->index();
                }
            }
        }
    }

    public function deconnexion() {
        $this->session->unset_userdata('benevole');
        setcookie('idBen', "", time() - 3600);
        setcookie('mdpBen', "", time() - 3600);
        $data['title'] = "accueil";
        $data['event']= $this->event->select3byDate();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('home',$data);
        $this->load->view('template/footer');
    }

    public function modifier() {

        if (isset($_COOKIE['idBen'])) {
            $varid = $this->input->cookie('idBen');
            var_dump($varid);
            $data['benevole'] = $this->benevole->selectById($varid);
            $mdp = $data['benevole'][0]->mdpBen;
            $id = $data['benevole'][0]->idBen;
            $varmail = $data['benevole'][0]->mailBen;

            if ($varmail != $_POST['mailBen']) {
                $data['message'] = "erreur : Vous ne pouvez pas changer votre adresse email";
                $this->load->view('errors/erreur_formulaire', $data);
                $this->index();
            } else if ($_POST['mdpBen'] == $_POST['mdpBen']) {
                $data = array(
                    "nomBen" => htmlspecialchars($_POST['nomBen']),
                    "prenomBen" => htmlspecialchars($_POST['prenomBen']),
                    "mailBen" => htmlspecialchars($_POST['mailBen']),
                    "mdpBen" => htmlspecialchars(crypt($_POST['mdpBen'], 'md5')),
                    "adresseBen" => htmlspecialchars($_POST['adresseBen']),
                    "codePBen" => htmlspecialchars($_POST['codePBen']),
                    "villeBen" => htmlspecialchars($_POST['villeBen']),
                    "telBen" => htmlspecialchars($_POST['telBen'])
                );

                $this->benevole->update($varid, $data);
                $data['benevole'] = $this->benevole->selectByMail($varmail);
                $data['message'] = "Votre profil benevole a été modifié avec succès";
                $data['title'] = "accueil";
                $this->load->view('errors/validation_formulaire', $data);
                $this->load->view('template/header', $data);
                $this->load->view('benevole/navbarB');
                $this->load->view('benevole/accueil');
                $this->load->view('template/footer');
            } else {
                $data['message'] = "erreur : Votre mot de passe n'est pas correct, si vous souhaitez modifier votre mot de passe cliquez sur le bouton en bas de page";
                $this->load->view('errors/erreur_formulaire', $data);
                $data['title'] = "votre profil";
                $this->load->view('template/header', $data);
                $this->load->view('benevole/navbarB');
                $this->load->view('benevole/profil');
                $this->load->view('template/footer');
            }
        } else {
            $data['message'] = "erreur : Votre session a expiré, veuillez vous reconnecter";
            $this->load->view('errors/erreur_formulaire', $data);
            $this->load->view('benevole/connexion');
        }
    }

    public function liste_prochains_events() {

        $data['event'] = $this->event->selectAllByDate();
        $data['title'] = 'Prochains événements';
        $this->load->view('template/header', $data);
        $this->load->view('benevole/navbarB');
        $this->load->view('benevole/liste_event', $data);
        $this->load->view('template/footer');
    }

    public function participer($idEvent) {
        if (isset($_COOKIE['idBen'])) {
            $idBen = $this->input->cookie('idBen');
            $this->load->model('participer');
            $participation = $this->participer->selectByKey($idEvent, $idBen);
            var_dump($participation);
            if (empty($participation)) {
                $data = ['idBen' => $idBen,
                    'idEvent' => $idEvent];
                $this->participer->insert($data);
                $data['message'] = "participation enregistrée";
                $this->load->view('errors/validation_formulaire', $data);
                $this->index();
            } else {
                $data['message'] = "Vous participer déja à cet événement";
                $this->load->view('errors/erreur_formulaire', $data);
                $this->liste_prochains_events();
            }
        } else {
            $data['message'] = "erreur : session expirée";
            $this->load->view('errors/erreur_formulaire', $data);
            $data['title'] = 'connexion';
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('benevole/connexion');
            $this->load->view('template/footer');
        }
    }

}
