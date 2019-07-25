<?php

class Aboutus extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user_s = $this->session->userdata('admin_logged_in');
        if (empty($user_s)) {
            redirect('admin');
        }
    }

    public function index() {
        $data = array();
        $data['active'] = 2;
        $data['list'] = $this->db->select('*')
                        ->where('deleteflag', '0')
                        ->order_by('orders','ASC')
                        ->get('aboutus')->result_array();
        $this->load->view('admin/aboutuslist', $data);
    }

    public function addaboutus() {
        $data['active'] = 2;
        $user_s = $this->session->userdata("admin_logged_in");
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('id', 'id', 'trim');
            $this->form_validation->set_rules('eng_title', 'English title', 'trim|required');
            $this->form_validation->set_rules('fr_title', 'French title', 'trim|required');
            $this->form_validation->set_rules('eng_description', 'English description', 'trim|required');
            $this->form_validation->set_rules('fr_description', 'French description', 'trim|required');
            if ($this->form_validation->run() == TRUE) {

                $aboutImages = isset($_POST['product_images']) && !empty($_POST['product_images']) ? implode(',', $_POST['product_images']) : "";

                $data1 = array('eng_title' => $_POST['eng_title'],
                    'fr_title' => $_POST['fr_title'],
                    'eng_description' => $_POST['eng_description'],
                    'fr_description' => $_POST['fr_description'],
                    'images' => $aboutImages ,
                    'status' => $_POST['status']
                );
                if (isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name'])) {
                    $config1 = array();
                    $config1['upload_path'] = 'upload/aboutus/';
                    $config1['allowed_types'] = '*';

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
                    $data1['modify_by'] = $user_s['user_id'];
                    $this->Auth_model->update_data($data1, array('id' => $_POST['id']), 'aboutus');
                    $this->session->set_flashdata('msg', 'UPDATED SUCCESSFULLY !!!');
                } else {
                    $this->Auth_model->add_data($data1, 'aboutus');
                    $this->session->set_flashdata('msg', 'ADDED SUCCESSFULLY !!!');
                }

                $this->load->view('admin/aboutusform', $data);

                redirect('admin/Aboutus');
            } else {
                $this->session->set_flashdata('err', 'All Filled is Required');
            }
        }
        $this->load->view('admin/aboutusform');
    }

    public function edit($id) {
        $data['active'] = 2;
        $where = array('id' => $id);
        $data['edit'] = $this->db->where($where)->get('aboutus')->row_array();
        $this->load->view('admin/aboutusform', $data);
    }

    public function delete($id) {
        $data = array('deleteflag' => 1);
        $where = array('id' => $id);
        $this->db->where($where)->update('aboutus', $data);
        echo json_encode('Record Removed');
    }

    function organize() {
        $slider = $this->input->post('banners');
        $this->set_order($slider);
    }

    function set_order($slider) {
        foreach ($slider as $sequence => $id) {
            $data = array('orders' => $sequence);
            $this->db->where('id', $id);
            $this->db->update('aboutus', $data);
        }
    }


    // Image Upload function 

    
    function upload_images() {
        if (isset($_FILES) && !empty($_FILES)) {
            $cnt = count($_FILES);
            $_FILES['hotel_image_file'] = array();
            for ($i = 0; $i < $cnt; $i++) {
                $_FILES['product_image_file']['name'][$i] = $_FILES[$i]['name'];
                $_FILES['product_image_file']['type'][$i] = $_FILES[$i]['type'];
                $_FILES['product_image_file']['tmp_name'][$i] = $_FILES[$i]['tmp_name'];
                $_FILES['product_image_file']['error'][$i] = $_FILES[$i]['error'];
                $_FILES['product_image_file']['size'][$i] = $_FILES[$i]['size'];
            }
        }
        $path = 'upload/aboutus';
        $files = $_FILES['product_image_file'];
        $title = "";
        $images = array();
        $images = $this->upload_files_to_folder($path, $title, $files);
        echo json_encode($images);
    }


    function upload_files_to_folder($path, $title, $files) {
        $return = array();
        $config = array(
            'upload_path' => $path,
            'allowed_types' => '*',
            'overwrite' => 1,
            'remove_spaces' => TRUE,
            'encrypt_name' => TRUE
        );

        $this->load->library('upload', $config);
        $images = array();
        $msg = array();
        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name'] = $files['name'][$key];
            $_FILES['images[]']['type'] = $files['type'][$key];
            $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['images[]']['error'] = $files['error'][$key];
            $_FILES['images[]']['size'] = $files['size'][$key];

            $fileName = time() . '_' . str_replace(' ', '_', $image);
            $config['file_name'] = $fileName;
            $this->upload->initialize($config);
            if ($this->upload->do_upload('images[]')) {
                $file_info = $this->upload->data();
                $images[] = $file_info['file_name'];
                $status = 1;
            } else {
                $status = 0;
                $msg[] = $this->upload->display_errors();
            }
        }
        $return['status'] = $status;
        $return['msg'] = $msg;
        $return['image'] = $images;
        return $return;
    }
    
}

?>
