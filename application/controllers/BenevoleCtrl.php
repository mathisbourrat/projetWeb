<?php

class BenevoleCtrl extends CI_Controller {

    public function index() {
        $idLogged = $this->CookieBenModel->isLoggedIn();
        if ((isset($idLogged))) {
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
        $idLogged = $this->CookieBenModel->isLoggedIn();
        var_dump($idLogged);
        if ((isset($idLogged))) {

            $data['benevole'] = $this->benevole->selectById($idLogged);
            $data['title'] = "votre profil";
            $this->load->view('template/header', $data);
            $this->load->view('benevole/navbarB');
            $this->load->view('benevole/profil', $data);
            $this->load->view('template/footer');
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
        $this->load->model('CookieBenModel');
        $idLogged = $this->CookieBenModel->isLoggedIn();
        if (!(isset($idLogged))) {
            $data['benevole'] = $this->benevole->selectByMail($_POST['mailBen']);
            $benevole = $data['benevole'];

            if ($benevole == null) {
                $data['title'] = "connexion";
                $this->load->view('template/header', $data);
                $data['typeEvent'] = $this->typeevent->selectAll();
                $this->load->view('template/navbar', $data);
                $this->load->view('benevole/connexion');
                $this->load->view('template/footer');
            } else {

                $idBenevole = $benevole[0]->idBen;
                if (!password_verify($_POST['mdpBen'], $benevole[0]->mdpBen)) {
                    echo "erreur : mauvais mot de passe";
                    $data['title'] = "connexion";
                    $this->load->view('template/header', $data);
                    $data['typeEvent'] = $this->typeevent->selectAll();
                    $this->load->view('template/navbar', $data);
                    $this->load->view('benevole/connexion');
                    $this->load->view('template/footer');                    
                } 
                else {

                    $cstrong = true;
                    $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                    $values = array(
                        'idUser' => $idBenevole,
                        'token' => $token
                    );
                    $this->input->set_cookie('LoginToken', json_encode($values), (60 * 60 * 24 * 7), '', '/', '', null, true);
                    $this->CookieBenModel->setCookie($idBenevole, $token);
                    $data['title'] = 'bienvenue';
                    $this->load->view('template/header', $data);
                    $this->load->view('benevole/navbarB');
                    $this->load->view('benevole/accueil');
                    $this->load->view('template/footer');
                }
            }
        }
    }

    public function deconnexion() {
        $this->load->model('CookieBenModel');
        $this->CookieBenModel->deleteCookie();
        redirect();
    }

    /* public function logout() {
      $this->session->unset_userdata('benevole');
      setcookie('idBen', "", time() - 3600);
      setcookie('mdpBen', "", time() - 3600);
      $data['title'] = "accueil";
      $data['event'] = $this->event->select3byDate();
      $this->load->view('template/header', $data);
      $data['typeEvent'] = $this->typeevent->selectAll();
      $this->load->view('template/navbar', $data);
      $this->load->view('home', $data);
      $this->load->view('template/footer');
      } */

    public function modifier() {

        $idLogged = $this->CookieBenModel->isLoggedIn();
        if ((isset($idLogged))) {

            $data['benevole'] = $this->benevole->selectById($idLogged);
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

                $this->benevole->update($idLogged, $data);
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
        $idLogged = $this->CookieBenModel->isLoggedIn();
        if ((isset($idLogged))) {
            $this->load->model('participer');
            $participation = $this->participer->selectByKey($idEvent, $idLogged);
            var_dump($participation);
            if (empty($participation)) {
                $data = ['idBen' => $idLogged,
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
            $data['typeEvent'] = $this->typeevent->selectAll();
            $this->load->view('template/navbar', $data);
            $this->load->view('benevole/connexion');
            $this->load->view('template/footer');
        }
    }

    public function liste_participation() {
        $idLogged = $this->CookieBenModel->isLoggedIn();
        if ((isset($idLogged))) {
            $data['event'] = $this->participer->selectEvent($idLogged);
            $data['title'] = 'Mes participations';
            $this->load->view('template/header', $data);
            $this->load->view('benevole/navbarB');
            $this->load->view('benevole/liste_event', $data);
            $this->load->view('template/footer');
        }
    }

}
