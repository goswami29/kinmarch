<?php

class Testimonial extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user_s = $this->session->userdata('admin_logged_in');
        if (empty($user_s)) {
            redirect('admin');
        }
    }

    public function index() {
        $data = array();
        $data['active'] = 3;
        $data['list'] = $this->db->select('*')
                        ->where('deleteflag', '0')
                        ->order_by('orders','ASC')
                        ->get('testimonial')->result_array();
        $this->load->view('admin/testimonial_list', $data);
    }

    public function addtestimonial() {
        $data['active'] = 3;
        $user_s = $this->session->userdata("admin_logged_in");
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('id', 'id', 'trim');
            $this->form_validation->set_rules('title', 'Client Name', 'trim|required');
            $this->form_validation->set_rules('eng_description', 'English description', 'trim|required');
            $this->form_validation->set_rules('fr_description', 'French description', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data1 = array('title' => $_POST['title'],
                    'sub_title' => $_POST['sub_title'],
                    'eng_description' => $_POST['eng_description'],
                    'fr_description' => $_POST['fr_description'],
                    'status' => $_POST['status']
                );

                if (isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name'])) {
                    $config1 = array();
                    $config1['upload_path'] = 'upload/testimonial/';
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
                $data1['modify_date'] = date('Y-m-d h:i:s');
                $data1['modify_by'] = $user_s['user_id'];
                if (isset($_POST['id']) && !empty($_POST['id'])) {
                    $this->Auth_model->update_data($data1, array('id' => $_POST['id']), 'testimonial');
                    $this->session->set_flashdata('msg', 'UPDATED SUCCESSFULLY !!!');
                } else {

                    $data1['add_date'] = date('Y-m-d h:i:s');
                    $data1['add_by'] = $user_s['user_id'];
                    $this->Auth_model->add_data($data1, 'testimonial');
                    $this->session->set_flashdata('msg', 'ADDED SUCCESSFULLY !!!');
                }

                $this->load->view('admin/testimonialform', $data);

                redirect('admin/testimonial');
            } else {
                $this->session->set_flashdata('err', 'All Filled is Required');
            }
        }

        $this->load->view('admin/testimonialform', $data);
    }

    public function edit($id) {
        $data = array();
        $data['active'] = 3;
        $where = array('id' => $id);
        $data['edit'] = $this->db->where($where)->get('testimonial')->row_array();
        $this->load->view('admin/testimonialform', $data);
    }

    public function delete($id) {
        $data = array('deleteflag' => 1);
        $where = array('id' => $id);
        $this->db->where($where)->update('testimonial', $data);
        //redirect('admin/testimonial');
        echo json_encode('Testimonial Removed');
    }

    function organize() {
        $slider = $this->input->post('banners');
        $this->set_order($slider);
    }

    function set_order($slider) {
        foreach ($slider as $sequence => $id) {
            $data = array('orders' => $sequence);
            $this->db->where('id', $id);
            $this->db->update('testimonial', $data);
        }
    }

}

?>