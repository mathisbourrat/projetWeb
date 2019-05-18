<?php
class CookieBenModel extends CI_Model
{
    public function setCookie($idUser, $token)
    {
        $token = password_hash($token, PASSWORD_DEFAULT);
        $data = array(
            'idUser' => $idUser,
            'token' => $token
        );
        $this->db->insert('usertokens', $data);
    }
    public function isLoggedIn()
    {
        $cookie = $this->input->cookie('LoginToken');
        $data = json_decode($cookie, true);
        
        if (isset($cookie)) {
            $token = $data['token'];
            $idUser = $data['idUser'];
            $query = $this->db->query('SELECT token FROM usertokens WHERE idUser = ?', $idUser);
            $result = $query->result_array();
            foreach ($result as $t) {
                if (password_verify($token, $t['token'])) {
                    return $idUser;
                } else {
                    //DO NOTHING
                }
            }
            return false;
        }
    }
    public function deleteCookie()
    {
        $cookie = $this->input->cookie('LoginToken');
        $data = json_decode($cookie, true);
        if (isset($cookie)) {
            $token = $data['token'];
            $idUser = $data['idUser'];
            $query = $this->db->query('SELECT token FROM usertokens WHERE idUser = ?', $idUser);
            $result = $query->result_array();
            foreach ($result as $t) {
                if (password_verify($token, $t['token'])) {
                    delete_cookie('LoginToken');
                    $this->db->delete('usertokens', array('token' => $t['token']));
                }
            }
        }
    }
}

