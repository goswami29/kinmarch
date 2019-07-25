<?php

class Contactenquiry extends CI_Controller {

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
        $main_url = site_url('admin/Contactenquiry/index/');
        $url = array();
        $where = array();
        $data['name'] = '';
        $data['email'] = '';
        
        $this->db->select('*');
        if (isset($_GET['name']) && !empty($_GET['name'])) {
            $where['name LIKE'] = '%' . trim($_GET['name']) . '%';
            $data['name'] = $_GET['name'];
            $url[] = 'name=' . $_GET['name'];
        }
        if (isset($_GET['email']) && !empty($_GET['email'])) {
            $where['email LIKE'] = '%' . trim($_GET['email']) . '%';
            $data['email'] = $_GET['email'];
            $url[] = 'email=' . $_GET['email'];
        }
      
        $this->db->where($where);
        $num_rows = $this->db->get('contact_info')->num_rows();
        $page = (isset($_GET['page']) && !empty($_GET['page']) ? $_GET['page'] : 1);
        if (isset($_GET['per_page']) && !empty($_GET['per_page'])) {
            $per_page = $_GET['per_page'];
            $url[] = 'per_page=' . $per_page;
        } else {
            $per_page = 10;
        }
        $data['page'] = $page;
        $data['num_rows'] = $num_rows;
        $data['per_page'] = $per_page;
        $data['url'] = $main_url . '?' . implode('&', $url) . '&';

        $this->db->select("*");
        $this->db->where($where);
        $this->db->order_by('id', 'DESC');
        $data['list'] = $this->db->get('contact_info', $per_page, ($per_page * ($page - 1)))->result_array();
        $this->load->view('admin/contactenquiry', $data);

    }
}

?>
