<?php

class Benevoles extends CI_Controller {

    public function index() {
        $idLogged = $this->CookieBenModel->isLoggedIn();
        if ((isset($idLogged))) {
            $data['title'] = 'bienvenue';
            $data['event'] = $this->Event->select3byDate();
            $data['typeEvent'] = $this->Typeevent->selectAll();
            $this->load->view('template/header', $data);
            $this->load->view('benevole/navbarB', $data);
            $this->load->view('home', $data);
            $this->load->view('template/footer');
        } else {
            redirect();
        }
    }

    public function profil() {
        $idLogged = $this->CookieBenModel->isLoggedIn();

        if ((isset($idLogged))) {
            $data['benevole'] = $this->Benevole->selectById($idLogged);
            $data['title'] = "votre profil";
            $data['typeEvent'] = $this->Typeevent->selectAll();
            $this->load->view('template/header', $data);
            $this->load->view('benevole/navbarB');
            $this->load->view('benevole/profil', $data);
            $this->load->view('template/footer');
        } else {
            redirect();
        }
        // modifie le profil à l'envoi du formulaire
    }

    public function inscription() {
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
        $this->load->model('benevole');
        if (null != $this->Benevole->selectByMail($_POST['mailBen'])) {

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
            $this->Benevole->insert($data);
            redirect('Accueil/connexion_benevole');
            
        } else {
            $data['title'] = "inscription bénévole";
            $this->load->view('template/header', $data);
            $data['typeEvent'] = $this->Typeevent->selectAll();
            $this->load->view('template/navbar', $data);
            $this->load->view('benevole/inscription');
            $this->load->view('template/footer');
        }
    }

    public function connexion() {
        $this->load->model('CookieBenModel');
        $idLogged = $this->CookieBenModel->isLoggedIn();
        if (!(isset($idLogged))) {
            $data['benevole'] = $this->Benevole->selectByMail($_POST['mailBen']);
            $benevole = $data['benevole'];

            if ($benevole == null) {
                $data['title'] = "connexion";
                $this->load->view('template/header', $data);
                $data['typeEvent'] = $this->Typeevent->selectAll();
                $this->load->view('template/navbar', $data);
                $this->load->view('benevole/connexion');
                $this->load->view('template/footer');
            } else {

                $idBenevole = $benevole[0]->idBen;
                if (!password_verify($_POST['mdpBen'], $benevole[0]->mdpBen)) {
                    $data['title'] = "connexion";
                    $this->load->view('template/header', $data);
                    $data['typeEvent'] = $this->Typeevent->selectAll();
                    $this->load->view('template/navbar', $data);
                    $this->load->view('benevole/connexion');
                    $this->load->view('template/footer');
                } else {

                    $cstrong = true;
                    $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                    $values = array(
                        'idUser' => $idBenevole,
                        'token' => $token
                    );
                    $this->input->set_cookie('LoginTokenBen', json_encode($values), (60 * 60 * 24 * 7), '', '/', '', null, true);
                    $this->CookieBenModel->setCookie($idBenevole, $token);

                    $data['title'] = 'bienvenue';
                    $this->index();
                }
            }
        }
    }

    public function deconnexion() {
        $this->load->model('CookieBenModel');
        $this->CookieBenModel->deleteCookie();
        redirect();
    }

    public function modifier() {

        $idLogged = $this->CookieBenModel->isLoggedIn();
        if ((isset($idLogged))) {

            $data['benevole'] = $this->Benevole->selectById($idLogged);
            $mdp = $data['benevole'][0]->mdpBen;
            $id = $data['benevole'][0]->idBen;
            $varmail = $data['benevole'][0]->mailBen;

            if ($varmail != $_POST['mailBen']) {
                $data['message'] = "erreur : Vous ne pouvez pas changer votre adresse email";
                $this->load->view('errors/erreur_formulaire', $data);
                $this->index();
            } else {
                if (isset($_POST['change_psw'])) {
                    if ($_POST['mdpBen'] == $_POST['mdp2Ben']) {
                        $psw = htmlspecialchars(crypt($_POST['mdpBen'], 'md5'));
                        $this->Organisateur->update_psw($idLogged, $psw);
                    } else {
                        redirect('Benevoles/profil');
                    }
                }
            }
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

            $this->Benevole->update($idLogged, $data);
            $data['message'] = "Votre profil benevole a été modifié avec succès";
            $data['title'] = "accueil";

            $this->load->view('template/header', $data);
            $this->load->view('benevole/navbarB');
            $this->load->view('errors/validation_formulaire', $data);
            $this->load->view('benevole/accueil');
            $this->load->view('template/footer');
        } else {
            $data['message'] = "erreur : Votre session a expiré, veuillez vous reconnecter";
            $this->load->view('errors/erreur_formulaire', $data);
            $this->load->view('benevole/connexion');
        }
    }


    public function participer($idEvent) {
        $idLogged = $this->CookieBenModel->isLoggedIn();
        if ((isset($idLogged))) {
            $this->load->model('participer');
            $participation = $this->participer->selectByKey($idEvent, $idLogged);
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
                redirect('Accueil/next_events');
            }
        } else {
            $idLogged = $this->CookieOrgaModel->isLoggedIn();
            if ((isset($idLogged))) {
                $data['message'] = "Vous ne pouvez pas vous inscrire";
                $this->load->view('errors/erreur_formulaire', $data);
                $data['title'] = 'connexion';
                $this->load->view('template/header', $data);
                $data['typeEvent'] = $this->Typeevent->selectAll();
                $this->load->view('organisateur/navbarO', $data);
                $this->load->view('organisateur/accueil');
                $this->load->view('template/footer');
            } else {
                $data['message'] = "erreur : session expirée";
                $this->load->view('errors/erreur_formulaire', $data);
                $data['title'] = 'connexion';
                $this->load->view('template/header', $data);
                $data['typeEvent'] = $this->Typeevent->selectAll();
                $this->load->view('template/navbar', $data);
                $this->load->view('benevole/connexion');
                $this->load->view('template/footer');
            }
        }
    }

    public function liste_participation() {
        $idLogged = $this->CookieBenModel->isLoggedIn();
        if ((isset($idLogged))) {
            $data['typeEvent'] = $this->Typeevent->selectAll();
            $data['idBen'] = $idLogged;
            $data['event'] = $this->Participer->selectEvent($idLogged);
            $data['title'] = 'Mes participations';
            $this->load->view('template/header', $data);
            $this->load->view('benevole/navbarB');
            $this->load->view('benevole/liste_event', $data);
            $this->load->view('template/footer');
        }
    }

}
