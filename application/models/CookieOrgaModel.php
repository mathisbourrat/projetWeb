<?php
class CookieOrgaModel extends CI_Model
{
    public function setCookie($idOrga, $token)
    {
        $token = password_hash($token, PASSWORD_DEFAULT);
        $data = array(
            'idOrga' => $idOrga,
            'token' => $token
        );
        $this->db->insert('orgatokens', $data);
    }
    public function isLoggedIn()
    {
        $cookie = $this->input->cookie('LoginToken');
        $data = json_decode($cookie, true);
        
        if (isset($cookie)) {
            $token = $data['token'];
            $idOrga = $data['idOrga'];
            $query = $this->db->query('SELECT token FROM orgatokens WHERE idOrga = ?', $idOrga);
            $result = $query->result_array();
            foreach ($result as $t) {
                if (password_verify($token, $t['token'])) {
                    return $idOrga;
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
            $idOrga = $data['idOrga'];
            $query = $this->db->query('SELECT token FROM orgatokens WHERE idOrga = ?', $idOrga);
            $result = $query->result_array();
            foreach ($result as $t) {
                if (password_verify($token, $t['token'])) {
                    delete_cookie('LoginToken');
                    $this->db->delete('orgatokens', array('token' => $t['token']));
                }
            }
        }
    }
}

