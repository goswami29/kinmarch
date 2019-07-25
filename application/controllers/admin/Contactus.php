<?php

class Contactus extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user_s = $this->session->userdata('admin_logged_in');
        if (empty($user_s)) {
            redirect('admin');
        }
    }

    public function index() {
        $data = array();
        $data['active'] = 4;
        $data['list'] = $this->db->select('*')
                        ->where('deleteflag', '0')
                        ->order_by('orders','ASC')
                        ->get('contact')->result_array();
        $this->load->view('admin/contactuslist', $data);
    }

    public function addcontact() {
        $data['active'] = 4;
        $user_s = $this->session->userdata("admin_logged_in");
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('id', 'id', 'trim');
            $this->form_validation->set_rules('title', 'title', 'trim|required');
            $this->form_validation->set_rules('description', 'description', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data1 = array('title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'status' => $_POST['status']
                );

                $data1['modify_date'] = date('Y-m-d h:i:s');
                $data1['modify_by'] = $user_s['user_id'];
                if (isset($_POST['id']) && !empty($_POST['id'])) {
                    $this->Auth_model->update_data($data1, array('id' => $_POST['id']), 'contact');
                    $this->session->set_flashdata('msg', 'UPDATED SUCCESSFULLY !!!');
                } else {

                    $data1['add_date'] = date('Y-m-d h:i:s');
                    $data1['add_by'] = $user_s['user_id'];
                    $this->Auth_model->add_data($data1, 'contact');
                    $this->session->set_flashdata('msg', 'ADDED SUCCESSFULLY !!!');
                }

                $this->load->view('admin/contactusform', $data);

                redirect('admin/contactus');
            } else {
                $this->session->set_flashdata('err', 'All Filled is Required');
            }
        }

        $this->load->view('admin/contactusform', $data);
    }

    public function edit($id) {
        $data = array();
        $data['active'] = 4;
        $where = array('id' => $id);
        $data['edit'] = $this->db->where($where)->get('contact')->row_array();
        $this->load->view('admin/contactusform', $data);
    }

    public function delete($id) {
        $data = array('deleteflag' => 1);
        $where = array('id' => $id);
        $this->db->where($where)->update('contact', $data);
        echo json_encode('Contact Removed');
    }

    function organize() {
        $slider = $this->input->post('banners');
        $this->set_order($slider);
    }

    function set_order($slider) {
        foreach ($slider as $sequence => $id) {
            $data = array('orders' => $sequence);
            $this->db->where('id', $id);
            $this->db->update('contact', $data);
        }
    }

}

?>