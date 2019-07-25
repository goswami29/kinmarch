<?php

class Setting extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user_s = $this->session->userdata('admin_logged_in');
        if (empty($user_s)) {
            redirect('admin');
        }
    }

    public function index() {
        $this->load->view('admin/setting');
    }

    public function changepassword() {
        $data = array();
        if (isset($_POST) && !empty($_POST)) {

            $this->form_validation->set_rules('oldPassword', 'Current Login Password', 'trim|required');
            $this->form_validation->set_rules('renewPassword', 'New Login Password', 'trim|required|matches[newPassword]');
            $this->form_validation->set_rules('newPassword', 'Confirm Login Password', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $admin = $this->session->userdata("admin_logged_in");
                $user_id = $admin['user_id'];
                $chk = $this->db->where('user_id', $user_id)->get('admin_login')->row_array();

                if ($chk['p'] == $_POST['oldPassword']) {

                    if ($_POST['newPassword'] == $_POST['renewPassword']) {
                        $data = array(
                            'p' => $_POST['newPassword'],
                            'password' => md5($_POST['newPassword'])
                        );
                        $this->db->where('user_id', $user_id)->update('admin_login', $data);
                        $this->session->set_flashdata('msg', 'Password Change Successfully. !!!');
                        redirect('admin/dashboard');
                    } else {
                        $this->session->set_flashdata('err', 'New Password and Re-type are not same');
                        redirect('admin/Setting');
                    }
                } else {
                    $this->session->set_flashdata('err', 'Current Password is Wrong');
                    redirect('admin/Setting');
                }
            } else {
                $this->session->set_flashdata('err', 'Invalid Data');
                redirect('admin/Setting'); 
            }
        } else {
            $this->session->set_flashdata('err', "No Data Present");
            redirect('admin/Setting');
        }
    }

}

?>
