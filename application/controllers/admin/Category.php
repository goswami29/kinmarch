<?php

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user_s = $this->session->userdata("admin_logged_in");
        if (empty($user_s)) {
            redirect('admin');
        }
    }

    public function index() {
        $data = array();
        $data['active'] = 6;
        $data['list'] = $this->db->select('*')
                    ->where('deleteflag', '0')
                    ->order_by('id', 'asc')
                    ->get('category')->result_array();
        $this->load->view('admin/categorylist', $data);
    }

    public function addcategory() {
        $data = array();
        $data['active'] = 6;
        $user_s = $this->session->userdata("admin_logged_in");

        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('id', 'id', 'trim');
            $this->form_validation->set_rules('eng_name', 'English Name', 'trim|required');
            $this->form_validation->set_rules('fr_name', 'French Name', 'trim|required');
            $this->form_validation->set_rules('eng_description', 'English description', 'trim|required');
            $this->form_validation->set_rules('fr_description', 'French description', 'trim|required');
            if ($this->form_validation->run() == TRUE) {

                $slug1 = preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['eng_name']);
                $newSlug = strtolower($slug1);

                $data1 = array('eng_name' => $_POST['eng_name'],
                    'fr_name' => $_POST['fr_name'],
                    'eng_description' => $_POST['eng_description'],
                    'fr_description' => $_POST['fr_description'], 
                    'slug' => $newSlug,
                    'display_home_page' => $_POST['display_home_page'],
                    'status' => $_POST['status'],
                    'order' => $_POST['order']
                );
                if (isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name'])) {
                    $config1 = array();
                    $config1['upload_path'] = 'upload/category/';
                    $config1['allowed_types'] = '*';

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
                $data1['modify_date'] = date('Y-m-d h:i:s');
                $data1['modify_by'] = $user_s['user_id'];
                if (isset($_POST['id']) && !empty($_POST['id'])) {
                    $this->Auth_model->update_data($data1, array('id' => $_POST['id']), 'category');
                    $this->session->set_flashdata('msg', 'UPDATED SUCCESSFULLY !!!');
                } else {
                    $data1['add_date'] = date('Y-m-d h:i:s');
                    $data1['add_by'] = $user_s['user_id'];
                    $this->Auth_model->add_data($data1, 'category');
                    $this->session->set_flashdata('msg', 'ADDED SUCCESSFULLY !!!');
                }

                $this->load->view('admin/categoryform', $data);

                redirect('admin/Category');
            } else {
                $this->session->set_flashdata('err', 'ALL FIELD IS REQUIRED');
            }
        } 
        $this->load->view('admin/categoryform', $data);
    }

    public function delete($id) {
        $data = array('deleteflag' => 1);
        $where = array('id' => $id);
        $this->db->where($where)->update('category', $data);

        echo json_encode('Category Remove');
        //redirect('admin/Category');
    }

    public function edit($id) {
        $data = array();
        $data['active'] = 6;

        $where = array('id' => $id);
        $data['edit'] = $this->db->where($where)->get('category')->row_array();
        $this->load->view('admin/categoryform', $data);
    }

    // function organize() {
    //     $slider = $this->input->post('banners');
    //     $this->set_order($slider);
    // }

    // function set_order($slider) {
    //     foreach ($slider as $sequence => $id) {
    //         $data = array('orders' => $sequence);
    //         $this->db->where('id', $id);
    //         $this->db->update('category', $data);
    //     }
    // }

}
