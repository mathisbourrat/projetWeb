<?php

class BenevoleCtrl extends CI_Controller {

    public function index() {
        $idLogged = $this->CookieModel->isLoggedIn();
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
        $idLogged = $this->CookieModel->isLoggedIn();
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

    /* public function connexion() {
      $data['benevole'] = $this->benevole->selectByMail($_POST['mailBen']);
      $benevole = $data['benevole'];

      if ($benevole == null) {
      $data['title'] = "connexion";
      $this->load->view('template/header', $data);
      $data['typeEvent']=$this->typeevent->selectAll();
      $this->load->view('template/navbar',$data);
      $this->load->view('organisateur/connexion');
      $this->load->view('template/footer');
      $this->load->view('benevole/connexion');
      } else {

      $idBenevole = $benevole[0]->idBen;
      if (!password_verify($_POST['mdpBen'], $benevole[0]->mdpBen)) {
      echo "erreur : mauvais mot de passe";
      $data['title'] = "connexion";
      $this->load->view('template/header', $data);
      $data['typeEvent']=$this->typeevent->selectAll();
      $this->load->view('template/navbar',$data);
      $this->load->view('organisateur/connexion');
      $this->load->view('template/footer');
      $this->load->view('benevole/connexion');
      echo "chatte";
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
      } */

    public function connexion() {
        $this->load->model('CookieModel');
        $idLogged = $this->CookieModel->isLoggedIn();
        if (!(isset($idLogged))) {
            /* $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
              $this->form_validation->set_rules('mdp', 'Password', 'required|min_length[7]');
              if ($this->form_validation->run() === FALSE) {
              $this->load->view('template/header');
              $this->load->view('benevole/connexion');
              $this->load->view('templates/footer'); */

            $data['benevole'] = $this->benevole->selectByMail($_POST['mailBen']);
            $benevole = $data['benevole'];

            if ($benevole == null) {
                $data['title'] = "connexion";
                $this->load->view('template/header', $data);
                $data['typeEvent'] = $this->typeevent->selectAll();
                $this->load->view('template/navbar', $data);
                $this->load->view('benevole/connexion');
                $this->load->view('template/footer');
                $this->load->view('benevole/connexion');
            } else {

                $idBenevole = $benevole[0]->idBen;
                if (!password_verify($_POST['mdpBen'], $benevole[0]->mdpBen)) {
                    echo "erreur : mauvais mot de passe";
                    $data['title'] = "connexion";
                    $this->load->view('template/header', $data);
                    $data['typeEvent'] = $this->typeevent->selectAll();
                    $this->load->view('template/navbar', $data);
                    $this->load->view('organisateur/connexion');
                    $this->load->view('template/footer');
                    $this->load->view('benevole/connexion');
                    echo "chatte";
                } else {

                    $cstrong = true;
                    $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                    $values = array(
                        'idUser' => $idBenevole,
                        'token' => $token
                    );
                    $this->input->set_cookie('LoginToken', json_encode($values), (60 * 60 * 24 * 7), '', '/', '', null, true);
                    $this->CookieModel->setCookie($idBenevole, $token);
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
        $this->load->model('CookieModel');
        $this->CookieModel->deleteCookie();
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

        $idLogged = $this->CookieModel->isLoggedIn();
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
        $idLogged = $this->CookieModel->isLoggedIn();
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
        $idLogged = $this->CookieModel->isLoggedIn();
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
