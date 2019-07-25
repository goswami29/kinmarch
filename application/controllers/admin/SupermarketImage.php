<?php

class SupermarketImage extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user_s = $this->session->userdata('admin_logged_in');
        if (empty($user_s)) {
            redirect('admin');
        }
    }

    public function index() {
        $data = array();
        $data['active'] = 1;
        $data['list'] = $this->db->select('*')
                        ->where('deleteflag', '0')
                        ->order_by('orders','ASC')
                        ->get('supermarketimage')->result_array();
        $this->load->view('admin/supermarketImageList', $data);
    }

    public function addimage() {
        $data['active'] = 1;
        $user_s = $this->session->userdata("admin_logged_in");
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('id', 'id', 'trim');
            $this->form_validation->set_rules('eng_title', 'English Title', 'trim|required');
            $this->form_validation->set_rules('fr_title', 'French Title', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data1 = array('eng_title' => $_POST['eng_title'],
                            'fr_title' => $_POST['fr_title'],
                            'eng_subtitle' => $_POST['eng_subtitle'],
                            'fr_subtitle' => $_POST['fr_subtitle'],
                            'status' => $_POST['status']
                        );

                if (isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name'])) {
                    $config1 = array();
                    $config1['upload_path'] = 'upload/supermarket/';
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
                    $this->Auth_model->update_data($data1, array('id' => $_POST['id']), 'supermarketimage');
                    $this->session->set_flashdata('msg', 'UPDATED SUCCESSFULLY !!!');
                } else {
                    $data1['add_date'] = date('Y-m-d h:i:s');
                    $this->Auth_model->add_data($data1, 'supermarketimage');
                    $this->session->set_flashdata('msg', 'ADDED SUCCESSFULLY !!!');
                }
                redirect('admin/SupermarketImage');
            } else {
                $data['error'] = strip_tags(validation_errors());
                $this->load->view('admin/supermarketImageform', $data);
           }
        } else{
            $this->load->view('admin/supermarketImageform', $data);
        }
       
    }

    public function edit($id) {
        $data = array();
        $data['active'] = 1;
        $where = array('id' => $id);
        $data['edit'] = $this->db->where($where)->get('supermarketimage')->row_array();
        $this->load->view('admin/supermarketImageform', $data);
    }

    public function delete($id) {
        $data = array('deleteflag' => 1);
        $where = array('id' => $id);
        $this->db->where($where)->update('supermarketimage', $data);
        echo json_encode('Image Removed');
    }

    function organize() {
        $slider = $this->input->post('banners');
        $this->set_order($slider);
    }

    function set_order($slider) {
        foreach ($slider as $sequence => $id) {
            $data = array('orders' => $sequence);
            $this->db->where('id', $id);
            $this->db->update('supermarketimage', $data);
        }
    }

}

?>