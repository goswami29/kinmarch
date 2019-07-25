<?php

class Ourshops extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user_s = $this->session->userdata('admin_logged_in');
        if (empty($user_s)) {
            redirect('admin');
        }
    }

    public function index() {
        $data = array();
        $data['active'] = 5;
        $data['list'] = $this->db->select('*')
                        ->where('deleteflag', '0')
                        ->order_by('orders','ASC')
                        ->get('shops')->result_array();
        $this->load->view('admin/shopslist', $data);
    }

    public function addshop() {
        $data['active'] = 5;
        $user_s = $this->session->userdata("admin_logged_in");
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('id', 'id', 'trim');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('eng_address', 'English Address', 'trim|required');
            $this->form_validation->set_rules('fr_address', 'French Address', 'trim|required');
            $this->form_validation->set_rules('map', 'Map', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data1 = array('email' => $_POST['email'],
                            'eng_address' => $_POST['eng_address'],
                            'fr_address' => $_POST['fr_address'],
                            'map' => $_POST['map'],
                            'status' => $_POST['status']
                        );

                $data1['modify_date'] = date('Y-m-d h:i:s');
                $data1['modify_by'] = $user_s['user_id'];
                if (isset($_POST['id']) && !empty($_POST['id'])) {
                    $this->Auth_model->update_data($data1, array('id' => $_POST['id']), 'shops');
                    $this->session->set_flashdata('msg', 'UPDATED SUCCESSFULLY !!!');
                } else {

                    $data1['add_date'] = date('Y-m-d h:i:s');
                    $data1['add_by'] = $user_s['user_id'];
                    $this->Auth_model->add_data($data1, 'shops');
                    $this->session->set_flashdata('msg', 'ADDED SUCCESSFULLY !!!');
                }

                $this->load->view('admin/shopform', $data);

                redirect('admin/ourshops');
            } else {
                $this->session->set_flashdata('err', 'All Filled is Required');
            }
        }

        $this->load->view('admin/shopform', $data);
    }

    public function edit($id) {
        $data = array();
        $data['active'] = 5;
        $where = array('id' => $id);
        $data['edit'] = $this->db->where($where)->get('shops')->row_array();
        $this->load->view('admin/shopform', $data);
    }

    public function delete($id) {
        $data = array('deleteflag' => 1);
        $where = array('id' => $id);
        $this->db->where($where)->update('shops', $data);
        echo json_encode('Shop Address Removed');
    }

    function organize() {
        $slider = $this->input->post('banners');
        $this->set_order($slider);
    }

    function set_order($slider) {
        foreach ($slider as $sequence => $id) {
            $data = array('orders' => $sequence);
            $this->db->where('id', $id);
            $this->db->update('shops', $data);
        }
    }

}

?>