<?php
// application/controllers/ConnectUse.php

defined('BASEPATH') OR exit('No direct script access allowed');

class ConnectUse extends CI_Controller
{

    public function verefconnexion()
    {

        $this->load->helper('form', 'url');


        $this->load->library('form_validation');

        $this->form_validation->set_rules("login", "Référence", "required", array("required" => "Le %s doit être obligatoire."));
        $this->form_validation->set_rules("password", "Nom du produit", "required", array("required" => "Le %s doit être obligatoire."));

        if ($this->form_validation->run()) {
            $login = $this->input->post('login');
            $password = $this->input->post('password');
            $this->load->model('usersModel');
            $b = $this->usersModel->log($login);
            foreach ($b as $row)
                $buse['user'] = $b;
                if ($b != NULL) {
                    if (password_verify($password, $row->us_password)) {
                        if ($row->role == 1) {
                            $this->session->set_userdata('admine', $login);
                            $this->session->set_userdata('password', $password);
                            redirect("produits/liste");

                        } else {
                            $this->session->set_userdata('client', $login);
                            $this->session->set_userdata('password', $password);
                            redirect("produits/listeUser");
                        }
                    } else {
                        $this->session->set_flashdata('error', 'Le mots de passe est incorrect');
                        redirect("connectUse/PageConnect");
                    }

                } else {
                    $this->session->set_flashdata('error', 'ce logine ou mots de passe est incorrect');
                    redirect("connectUse/PageConnect");
                }

            }else {
            $this->load->view('haed');
            $this->load->view('connexion');
            $this->load->view('footer');
        }

    }
    public function PageConnect()
    {
        $this->load->helper('form', 'url');
        $this->load->view('haed');
        $this->load->view('connexion');
        $this->load->view('footer');

    }


    public function Contactt()
    {
        $this->load->view('haed');
        $this->load->view('contact');
        $this->load->view('footer');

    }

    public function acceuil()
    {
        $this->load->view('haed');
        $this->load->view('acceuil');
        $this->load->view('footer');

    }


    public function Connect_us()
    {
        $us_nom = $this->input->post('login');
        $us_password = $this->input->post('password');
        $this->load->model('ConnectModel');
        $bListe = $this->ConnectModel->Connect($us_nom);
        $bView['liste_categories'] = $bListe;
        $this->session->set_userdata('us_nom', "$us_nom");
        $this->session->set_userdata('password', "$us_password");
    }

    public function deconnect()
    {
        $this->load->view('haed');
        $this->load->view('deconnect');
        $this->load->view('footer');

    }



    public function inscri()
    {
        $this->load->view('haed');
        $this->load->view('inscription');
        $this->load->view('footer');

    }


}