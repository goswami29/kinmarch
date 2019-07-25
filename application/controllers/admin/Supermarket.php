<?php

class Supermarket extends CI_Controller {

    function __construct() {
        parent::__construct();
        $user_s = $this->session->userdata('admin_logged_in');
        if (empty($user_s)) {
            redirect('admin');
        }
    }

    function index() {
        $data = array();
        $data['active'] = 8;
        $data['list'] = $this->db->select('*')
                    ->get('market')->result_array();
        $this->load->view('admin/marketlist', $data);
    }

    function add() {  
        $data = array();
        $data['active'] = 8;
        $user_s = $this->session->userdata("admin_logged_in");

        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('id', 'id', 'trim');
            $this->form_validation->set_rules('eng_title', 'English title', 'trim|required');
            $this->form_validation->set_rules('fr_title', 'French title', 'trim|required');
            $this->form_validation->set_rules('eng_description', 'English description', 'trim|required');
            $this->form_validation->set_rules('fr_description', 'French description', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/addmarket', $data);
            } 
            else
            {  
                $data1 = array('eng_title' => $_POST['eng_title'],
                        'fr_title' => $_POST['fr_title'],
                        'eng_description' => $_POST['eng_description'],
                        'fr_description' => $_POST['fr_description'],
                        'status' => $_POST['status']
                    );

                if (isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name'])) {
                    $config = array();
                    $config['upload_path'] = 'upload/supermarket/';
                    $config['allowed_types'] = '*';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload');
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('userfile')) {
                        echo $this->upload->display_errors();
                        exit();
                    } else {

                        $image_data = $this->upload->data();
                        $data1['image'] = $image_data['file_name'];
                    }
                }

                if (isset($_FILES['headerimg']['name']) && !empty($_FILES['headerimg']['name'])) {
                    $config = array();
                    $config['upload_path'] = 'upload/supermarket/';
                    $config['allowed_types'] = '*';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload');
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('headerimg')) {
                        echo $this->upload->display_errors();
                        exit();
                    } else {

                        $image_header = $this->upload->data();
                        $data1['headerimg'] = $image_header['file_name'];
                    }
                }
                

                $data1['modify_date'] = date('Y-m-d h:i:s');
                $data1['modify_by'] = $user_s['user_id'];
                if (isset($_POST['id']) && !empty($_POST['id'])) {
                    $this->Auth_model->update_data($data1, array('id' => $_POST['id']), 'market');
                    $this->session->set_flashdata('msg', 'UPDATED SUCCESSFULLY !!!');
                }
                redirect('admin/supermarket');
            }
        } else { 
            $this->load->view('admin/addmarket', $data);
        }
    }

    function edit($id) {
        $data = array();
        $data['active'] = 8;
        //$id = substr(base64_decode($_GET['id']), 6);
        $where = array('id' => $id);
        $data['edit'] = $this->db->where($where)->get('market')->row_array();
        $this->load->view('admin/addmarket', $data);
    }


}
