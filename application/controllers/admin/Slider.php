<?php
//        $this->db->_protect_identifiers=false;
class Slider extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user_s = $this->session->userdata("admin_logged_in");
        if (empty($user_s)) {
            redirect('admin');
        }
    }

    public function index() {
        $data = array();
        $data['active'] = 1;
        $data['list'] = $this->db->select('*')
                        ->where('deleteflag', '0')
                        ->order_by('orders', 'asc')
                        ->get('slider')->result_array();
        //print_r($this->db->last_query($data['list']));exit();
        $this->load->view('admin/sliderlist', $data);
    }

    public function addslider() {
        $data = array();
        $data['active'] = 1;
        $user_s = $this->session->userdata("admin_logged_in");

        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('id', 'id', 'trim');
            $this->form_validation->set_rules('eng_title1', 'English title1', 'trim|required');
            $this->form_validation->set_rules('fr_title1', 'French title1', 'trim|required');
            $this->form_validation->set_rules('eng_title2', 'English sub title', 'trim|required');
            $this->form_validation->set_rules('fr_title2', 'French sub title', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data1 = array('eng_title1' => $_POST['eng_title1'],
                               'fr_title1' => $_POST['fr_title1'],
                               'eng_title2' => $_POST['eng_title2'],
                               'fr_title2' => $_POST['fr_title2']
                            );
                 
                if (isset($_FILES['userfile1']['name']) && !empty($_FILES['userfile1']['name'])) {
                    $config1 = array();
                    $config1['upload_path'] = 'upload/slider/';
                    $config1['allowed_types'] = '*';

                    $this->load->library('upload');
                    $this->upload->initialize($config1);

                    if (!$this->upload->do_upload('userfile1')) {
                        echo $this->upload->display_errors();
                        exit();
                    } else {

                        $image_data = $this->upload->data();
                        $data1['image1'] = $image_data['file_name'];
                    }
                }
                    $data1['modify_date'] = date('Y-m-d h:i:s');
                    $data1['modify_by'] = $user_s['user_id'];
                if (isset($_POST['id']) && !empty($_POST['id'])) {
                    $this->Auth_model->update_data($data1, array('id' => $_POST['id']), 'slider');
                    $this->session->set_flashdata('msg', 'UPDATED SUCCESSFULLY !!!');
                } else {
                    $data1['add_date'] = date('Y-m-d h:i:s');
                    $data1['add_by'] = $user_s['user_id'];
                    $this->Auth_model->add_data($data1, 'slider');
                    $this->session->set_flashdata('msg', 'ADDED SUCCESSFULLY !!!');
                }


                $this->load->view('admin/sliderform', $data);

                redirect('admin/Slider');
            } else {
                $this->session->set_flashdata('err', 'ALL FIELD IS REQUIRED');
            }
        } else {
            $this->load->view('admin/sliderform', $data);
        }
    }

        public function delete($id) {
        $data = array('deleteflag' => 1);
        $where = array('id' => $id);
        $this->db->where($where)->update('slider', $data);

        //redirect('admin/Slider');
         echo json_encode('Slider Remove');
    }

    public function status() {
        if (isset($_POST)) {
            $data = array('status' => $_POST['value'],);
            $this->db->where('id', $_POST['id'])->update('slider', $data);
            echo json_encode("1");
        }
    }

    public function edit($id) {
        $data = array();
        $data['active'] = 1;

        $where = array('id' => $id);
        $data['edit'] = $this->db->where($where)->get('slider')->row_array();
        $this->load->view('admin/sliderform', $data);
    }

    function organize() {
        $slider = $this->input->post('banners');
        $this->set_order($slider);
    }

    function set_order($slider) {
        foreach ($slider as $sequence => $id) {
            $data = array('orders' => $sequence);
            $this->db->where('id', $id);
            $this->db->update('slider', $data);
        }
    }

}
