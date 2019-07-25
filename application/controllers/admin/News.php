<?php

class News extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user_s = $this->session->userdata('admin_logged_in');
        if (empty($user_s)) {
            redirect('admin');
        }
    }

    public function index() {
        $data = array();
        $data['active'] = 7;
        $data['list'] = $this->db->select('*')
                        ->where('deleteflag', '0')
                        ->order_by('orders', 'ASC')
                        ->get('news')->result_array();
        $this->load->view('admin/newslist', $data);

    }

    public function addnews() {
        $data['active'] = 7;
        $user_s = $this->session->userdata("admin_logged_in");
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('id', 'id', 'trim');
            $this->form_validation->set_rules('eng_title', 'English title', 'trim|required');
            $this->form_validation->set_rules('fr_title', 'French title', 'trim|required');
            $this->form_validation->set_rules('eng_description', 'English description', 'trim|required');
            $this->form_validation->set_rules('fr_description', 'French description', 'trim|required');
            if ($this->form_validation->run() == TRUE) {

                $slug1 = preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['eng_title']);
                $newSlug = strtolower($slug1);

                $data1 = array('eng_title' => $_POST['eng_title'],
                        'fr_title' => $_POST['fr_title'],
                        'slug' => $newSlug,
                        'eng_description' => $_POST['eng_description'],
                        'fr_description' => $_POST['fr_description'],
                        'status' => $_POST['status']
                    );

                if (isset($_FILES['eng_userfile']['name']) && !empty($_FILES['eng_userfile']['name'])) {
                    $config = array();
                    $config['upload_path'] = 'upload/news/';
                    $config['allowed_types'] = '*';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload');
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('eng_userfile')) {
                        echo $this->upload->display_errors();
                        exit();
                    } else {

                        $image_data = $this->upload->data();
                        $data1['eng_image'] = $image_data['file_name'];
                    }
                }

                if (isset($_FILES['fr_userfile']['name']) && !empty($_FILES['fr_userfile']['name'])) {
                    $config1 = array();
                    $config1['upload_path'] = 'upload/news/';
                    $config1['allowed_types'] = '*';
                    $config1['encrypt_name'] = TRUE;

                    $this->load->library('upload');
                    $this->upload->initialize($config1);

                    if (!$this->upload->do_upload('fr_userfile')) {
                        echo $this->upload->display_errors();
                        exit();
                    } else {

                        $image_data = $this->upload->data();
                        $data1['fr_image'] = $image_data['file_name'];
                    }
                }

                $data1['modify_date'] = date('Y-m-d h:i:s');
                $data1['modify_by'] = $user_s['user_id'];
                if (isset($_POST['id']) && !empty($_POST['id'])) {
                    $this->Auth_model->update_data($data1, array('id' => $_POST['id']), 'news');
                    $this->session->set_flashdata('msg', 'UPDATED SUCCESSFULLY !!!');
                } else {

                    $data1['add_date'] = date('Y-m-d h:i:s');
                    $data1['add_by'] = $user_s['user_id'];
                    $this->Auth_model->add_data($data1, 'news');
                    $this->session->set_flashdata('msg', 'ADDED SUCCESSFULLY !!!');
                }

                $this->load->view('admin/newsform', $data);

                redirect('admin/News');
            } else {
                $this->session->set_flashdata('err', 'All Filled is Required');
            }
        }

        $this->load->view('admin/newsform', $data);
    }

    public function edit($id) {
        $data = array();
        $data['active'] = 7;
        $where = array('id' => $id);
        $data['edit'] = $this->db->where($where)->get('news')->row_array();
   
        $this->load->view('admin/newsform', $data);
    }

    public function delete($id) {
        $data = array('deleteflag' => 1);
        $where = array('id' => $id);
        $this->db->where($where)->update('news', $data);
        echo json_encode('News Remove');
    }

    function organize() {
        $slider = $this->input->post('banners');
        $this->set_order($slider);
    }

    function set_order($slider) {
        foreach ($slider as $sequence => $id) {
            $data = array('orders' => $sequence);
            $this->db->where('id', $id);
            $this->db->update('news', $data);
        }
    }

}

?>