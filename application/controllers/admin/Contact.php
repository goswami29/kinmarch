<?php

class Contact extends CI_Controller {

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
                        ->get('contact_us')->result_array();
        $this->load->view('admin/contactlist', $data);
    }

    public function addcontact() {
      $user_s = $this->session->userdata("admin_logged_in");
        $data['active'] = 1;
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('id', 'id', 'trim');
            
            $this->form_validation->set_rules('email_id1', 'email_id1', 'trim|required');
            $this->form_validation->set_rules('email_id2', 'email_id2', 'trim');
            $this->form_validation->set_rules('mobile_no2', 'mobile_no2', 'trim');
            $this->form_validation->set_rules('mobile_no', 'mobile_no', 'trim|required');
            $this->form_validation->set_rules('address', 'registered_address', 'trim|required');
            $this->form_validation->set_rules('facebook', 'facebook', 'trim');
            $this->form_validation->set_rules('instagram', 'instagram', 'trim');
            $this->form_validation->set_rules('twitter', 'twitter', 'trim');
            $this->form_validation->set_rules('linkedin', 'linkedin', 'trim');
            $this->form_validation->set_rules('google_plus', 'google plus', 'trim');
            if ($this->form_validation->run() == TRUE) {
                $data1 = array(
                    'email_id1' => $_POST['email_id1'],
                    'email_id2' => $_POST['email_id2'],
                    'mobile_no2' => $_POST['mobile_no2'],
                    'mobile_no' => $_POST['mobile_no'],
                    'address' => $_POST['address'],
                    'facebook' => $_POST['facebook'],
                    'instagram' => $_POST['instagram'],
                    'twitter' => $_POST['twitter'],
                    'google_plus' => $_POST['google_plus'],
                    'linkedin' => $_POST['linkedin']
                );
                if (isset($_POST['id']) && !empty($_POST['id'])) {
                    $data1['modify_date'] = date('Y-m-d h:i:s');
                    $data1['modify_by'] = $user_s['user_id'];
                    $this->Auth_model->update_data($data1, array('id' => $_POST['id']), 'contact_us');
                    $this->session->set_flashdata('msg', 'UPDATED SUCCESSFULLY !!!');
                }
                else {
                    $this->Auth_model->add_data($data1,'contact_us');
                    $this->session->set_flashdata('msg', 'ADDED SUCCESSFULLY !!!');
                    }
                redirect('admin/Contact');
            } else {
                $this->session->set_flashdata('err', 'All Filled is Required');
            }
        }
        $this->load->view('admin/contactform',$data);
    }

    public function edit($id) {
        $data = array();
        $data['active'] = 1;
        $where = array('id' => $id);
        $data['edit'] = $this->db->where($where)->get('contact_us')->row_array();
        $this->load->view('admin/contactform', $data);
    }

}

?>