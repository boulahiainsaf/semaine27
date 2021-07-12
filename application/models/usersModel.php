<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class usersModel extends CI_Model
{
    public function user($login)
    {
        // Charge la librairie 'database'
        $this->load->database();

        // Exécute la requête
        $user = $this->db->query("SELECT us_login,us_password FROM users where us_login ='" . $login."'");

        // Récupération des résultats
      if ($user->run_rows()>0){
          return true;

      }else {
          return false;
      }

    }
    public function log($login)
    {
        // Charge la librairie 'database'
        $this->load->database();

        // Exécute la requête
        $user = $this->db->query("SELECT * FROM users where us_login ='".$login."'");

        $buser = $user->result();

        return $buser;
    }
    }

