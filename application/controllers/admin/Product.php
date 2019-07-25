<?php

class Product extends CI_Controller {

    function __construct() {
        parent::__construct();
        $user_s = $this->session->userdata('admin_logged_in');
        if (empty($user_s)) {
            redirect('admin');
        }
    }

    function index() {
        $data = array();
        $data['active'] = 1;
        $data['list'] = $this->db->select('*')
                ->get('product')->result_array();
        $this->load->view('admin/productlist', $data);
    }

    function addproduct() {  
        $data = array();
        $data['active'] = 1;
        $user_s = $this->session->userdata("admin_logged_in");

        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('id', 'id', 'trim');
            $this->form_validation->set_rules('eng_title', 'English title', 'trim|required');
            $this->form_validation->set_rules('fr_title', 'French title', 'trim|required');
            $this->form_validation->set_rules('eng_description', 'English description', 'trim|required');
            $this->form_validation->set_rules('fr_description', 'French description', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/productform', $data);
            } 
            else
            {  
                $data1 = array('eng_title' => $_POST['eng_title'],
                        'fr_title' => $_POST['fr_title'],
                        'eng_description' => $_POST['eng_description'],
                        'fr_description' => $_POST['fr_description'],
                        'status' => $_POST['status']
                    );

                $data1['modify_date'] = date('Y-m-d h:i:s');
                $data1['modify_by'] = $user_s['user_id'];
                if (isset($_POST['id']) && !empty($_POST['id'])) {
                    $this->Auth_model->update_data($data1, array('id' => $_POST['id']), 'product');
                    $this->session->set_flashdata('msg', 'UPDATED SUCCESSFULLY !!!');
                }
                redirect('admin/Product');
            }
        } else { 
            $this->load->view('admin/productform', $data);
        }
    }

    function edit($id) {
        $data = array();
        $data['active'] = 1;
        $where = array('id' => $id);
        $data['edit'] = $this->db->where($where)->get('product')->row_array();
        $this->load->view('admin/productform', $data);
    }


}
