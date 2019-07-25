<?php
class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {
        $this->user_s = $this->session->userdata('admin_logged_in');
        if (!empty($this->user_s)) {
            redirect('admin/dashboard');
        } else {

            if (!empty($_POST)) {
                $this->form_validation->set_rules('user_name', 'User_name', 'trim|required');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                if ($this->form_validation->run() == TRUE) {
                    $user_name = $_POST['user_name'];
                    $password = md5($_POST['password']);
                    $this->db->select("*");
                    $this->db->from('admin_login');
                    $this->db->where(array('user_name' => $user_name, 'password' => $password));
                    $query = $this->db->get();
                    $user = $query->row_array();
                    if (!empty($user)) {
                        $this->session->set_flashdata("sucess", "you are logged in ");
                        $this->session->set_userdata("admin_logged_in", $user);
                        redirect("admin/Dashboard", "refresh");
                    } else {
                        $this->session->set_flashdata("err", "Invalid Username and Password");
                        redirect("admin/login/index", "Refresh");
                    }
                } else {
                    $this->session->set_flashdata("err", "Username and Password Field is required");
                    redirect('admin/Login');
                }
            } else {
                $this->load->view('admin/login');
            }
        }
    }

    function logout() {
        $this->session->unset_userdata('admin_logged_in');
        redirect('admin/Login');
    }

}
?>
