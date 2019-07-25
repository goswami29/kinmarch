<?php

class StoreImage extends CI_Controller {

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
                    ->get('storeimage')->result_array();
        $this->load->view('admin/StoreImagelist', $data);
    }

    function addImage() {  
        $data = array();
        $data['active'] = 1;
        $user_s = $this->session->userdata("admin_logged_in");

        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('id', 'id', 'trim');
            if (empty($_FILES['userfile']['name']))
            {
                $this->form_validation->set_rules('userfile', 'Store Header Image', 'required');
            }
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/StoreImageform', $data);
            } 
            else
            {  
                $data1 = array(
                    'status' => $_POST['status']
                );
                if (isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name'])) {
                    $config1 = array();
                    $config1['upload_path'] = 'upload/store/';
                    $config1['allowed_types'] = '*';
                    $config1['encrypt_name'] = TRUE;

                    $this->load->library('upload');
                    $this->upload->initialize($config1);

                    if (!$this->upload->do_upload('userfile')) {
                        echo $this->upload->display_errors();
                        exit();
                    } else {
                        $image_data = $this->upload->data();
                        $data1['image'] = $image_data['file_name'];
                    }
                }

                if (isset($_POST['id']) && !empty($_POST['id'])) {
                    $data1['modify_date'] = date('Y-m-d h:i:s');
                    $this->Auth_model->update_data($data1, array('id' => $_POST['id']), 'storeimage');
                    $this->session->set_flashdata('msg', 'UPDATED SUCCESSFULLY !!!');
                } else {
                    $data1['add_date'] = date('Y-m-d h:i:s');
                    $this->Auth_model->add_data($data1, 'storeimage');
                    $this->session->set_flashdata('msg', 'ADDED SUCCESSFULLY !!!');
                }
                redirect('admin/StoreImage');
            }
        } else { 
            $this->load->view('admin/StoreImageform', $data);
        }
    }

    function edit($id) {
        $data = array();
        $data['active'] = 1;
        $where = array('id' => $id);
        $data['edit'] = $this->db->where($where)->get('storeimage')->row_array();
        $this->load->view('admin/StoreImageform', $data);
    }


}
