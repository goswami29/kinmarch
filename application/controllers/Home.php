<?php

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->first_uri = $this->uri->segment(1);
    }

    public function index() {

        $data['active'] = 1;

        $data['sliders'] = $this->db->select('*')
                            ->where('status', 1)
                            ->where('deleteflag', 0)
                            ->order_by('orders ASC')
                            ->get('slider')->result();

        $data['welcome'] = $this->db->select('*')
                            ->limit('1')
                            ->where('status', 1)
                            ->get('welcome')->row();

        $data['product'] = $this->db->select('*')
                            ->limit('1')
                            ->where('status', 1)
                            ->get('product')->row();
                            
        $data['categories'] = $this->db->select('eng_name,fr_name,slug,image')
                            ->where('status', 1)
                            ->where('deleteflag', 0)
                            ->where('display_home_page', 1)
                            ->order_by('order ASC')
                            ->get('category')->result();

        $data['newsevent'] = $this->db->select('*')
                            ->where('status', 1)
                            ->where('deleteflag', 0)
                            ->order_by('id desc')
                            ->limit('3')
                            ->get('news')->result();
    
        $data['testimonials'] = $this->db->select('*')
                            ->where('status', 1)
                            ->where('deleteflag', 0)
                            ->order_by('orders ASC')
                            ->get('testimonial')->result();

        $data['brands'] = $this->db->select('eng_title,fr_title,image')
                            ->where('status', 1)
                            ->where('deleteflag', 0)
                            ->order_by('orders ASC')
                            ->get('brand')->result();

        $data['supermarketImage'] = $this->db->select('eng_title,fr_title,image, eng_subtitle,fr_subtitle')
                            ->where('status', 1)
                            ->where('deleteflag', 0)
                            ->order_by('orders ASC')
                            ->limit('2')
                            ->get('supermarketimage')->result();
//print_r($data['supermarketImage']); die();
        $this->load->view('website/index', $data);

    }

    public function about(){

        $data['active'] = 2;
        $data['aboutus'] = $this->db->select('eng_title,fr_title,eng_description,fr_description, images')
                            ->where('status', 1)
                            ->where('deleteflag', 0)
                            ->where('orders', 0)
                            ->get('aboutus')->row();

        $data['vision'] = $this->db->select('eng_title,fr_title,eng_description,fr_description')
                            ->where('status', 1)
                            ->where('deleteflag', 0)
                            ->where('orders', 1)
                            ->get('aboutus')->row();

        $data['mission'] = $this->db->select('eng_title,fr_title,eng_description,fr_description')
                            ->where('status', 1)
                            ->where('deleteflag', 0)
                            ->where('orders', 2)
                            ->get('aboutus')->row();

        $data['expertise'] = $this->db->select('eng_title,fr_title,eng_description,fr_description')
                            ->where('status', 1)
                            ->where('deleteflag', 0)
                            ->where('orders', 3)
                            ->get('aboutus')->row();
                            
        //print_r($data['aboutus']); die();
        $this->load->view('website/about', $data);
    }

    public function products(){

        $data['active'] = 3;
        $data['products'] = $this->db->select('eng_name,fr_name,slug,image')
                            ->where('status', 1)
                            ->where('deleteflag', 0)
                            ->order_by('order ASC')
                            ->get('category')->result();
        $this->load->view('website/products', $data);
    }
    
    public function product_Details(){
        $data['active'] = 3;
        $slug = $this->uri->segment(3);
        $data['productDetail'] = $this->db->select('*')
                            ->where('slug', $slug)
                            ->get('category')->row();
        //echo "<pre>";   
        //print_r($data['productDetail']); die();
        $this->load->view('website/product_details', $data);
    }

    public function supermarket(){

        $data['active'] = 4;
        $data['supermarket'] = $this->db->select('*')
                            ->limit('1')
                            ->where('status', 1)
                            ->get('market')->row();
        //echo "<pre>";   
        //print_r($data['supermarket']); die();
        $this->load->view('website/supermarket', $data);
    } 

    public function ourshop(){

        $data['active'] = 5;
        $data['shops'] = $this->db->select('*')
                            ->where('status', 1)
                            ->where('deleteflag', 0)
                            ->order_by('orders ASC')
                            ->get('shops')->result();

        $data['headerImg'] = $this->db->select('*')
                            ->limit('1')
                            ->where('status', 1)
                            ->get('storeimage')->row();

        $this->load->view('website/our_shops', $data);
    }

    public function news_Details(){
        $data['active'] = 3;
        $slug = $this->uri->segment(3);
        $data['newsDetail'] = $this->db->select('*')
                            ->where('slug', $slug)
                            ->get('news')->row();
      
        $this->load->view('website/news_details', $data);
    }

    public function client_survey(){

        $data = array();
        $data['active'] = 6;
        $lang = $this->first_uri;

        if (isset($_POST) && !empty($_POST)) {

            $this->form_validation->set_rules('name', 'name', 'trim|required');
            $this->form_validation->set_rules('email', 'email', 'trim|required');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required');
            $this->form_validation->set_rules('card_number', 'card number', 'trim|required');
            $this->form_validation->set_rules('message', 'message', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                $this->load->view('website/client_survey', $data);
            } else {
               
                $name = $_POST['name'];
                $card_number = $_POST['card_number'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $message = $_POST['message'];

                $data1['name'] = $_POST['name'];
                $data1['email'] = $_POST['email'];
                $data1['phone'] = $_POST['phone'];
                $data1['card_number'] = $_POST['card_number'];
                $data1['message'] = $_POST['message'];
                $data1['add_date'] = date('y-m-d H:i:s');

                $this->db->insert('customer_survey', $data1);
                $this->session->set_flashdata('msg', 'FORM SUBMITTED SUCCESSFULLY !!!');

                $reviewsDetails = array("SHOP" =>  $_POST['store'],
                        "Parking and shopping carts are available and accessible" =>  $_POST['client_enquiry_option_1'],
                        "The opening hours are convenient in" => $_POST['client_enquiry_option_2'],
                        "The Store Layout is designed to simplify shopping. The atmosphere and decoration are seductive." => $_POST['client_enquiry_option_3'],
                        "The staff is friendly, courteous and knowledgeable" => $_POST['client_enquiry_option_4'],
                        "The shelves are well stocked and maintained" => $_POST['client_enquiry_option_5'],
                        "Labels placed on shelves clearly identify product prices" => $_POST['client_enquiry_option_6'],
                        "Posters are well presented to the point products and promotions" => $_POST['client_enquiry_option_7'],
                        "The products sold are of the highest quality" => $_POST['client_enquiry_option_8'],
                        "The products are always fresh and alternated" => $_POST['client_enquiry_option_9'],
                        "The food and toilet facilities are clean and well maintained" => $_POST['client_enquiry_option_10'],
                        "The food has a sufficient number of cashiers in all the time" => $_POST['client_enquiry_option_11'],
                        "The cashiers express gratitude and say thank you for buying at the end of my purchases" => $_POST['client_enquiry_option_12'],
                        "Promotional Offers are attractive and well advertised" => $_POST['client_enquiry_option_13'],
                        "Inner food posters draw attention to promotions, imported products and new arrivals" => $_POST['client_enquiry_option_14'],
                        "KIN MARCHE advertisements encourage me to visit food" => $_POST['client_enquiry_option_15'],
                        "Overall, I am satisfied with the food" => $_POST['client_enquiry_option_16']
                );

                $mail_data2 = array("Name" => $name,
                                    "Email ID" => $email,
                                    "Phone No." => $phone,
                                    "Card number" => $card_number,
                                    "Message" => $message
                            );

                $to = 'bharat.digiinterface@gmail.com';
                $data['reviews'] = $reviewsDetails;
                $data['list'] = $mail_data2;
                $mail_body = $this->load->view('mail_template/customer_survey_email', $data, TRUE); //Welcome email
               
                $resp = email_send($to, 'Customer Survey', $mail_body, '', '', '');
            }

            redirect($lang.'/client-survey', $data);

        } else {
            $this->load->view('website/client_survey', $data);
        }
    }

    public function contact_us()
    {
        $data = array();
        $data['active'] = 7;
        $lang = $this->first_uri;

        $data['contacts'] = $this->db->select('title,description')
                        ->where('status', 1)
                        ->where('deleteflag', 0)
                        ->order_by('orders ASC')
                        ->get('contact')->result();

        if (isset($_POST) && !empty($_POST)) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('mobile_no', 'Mobile number', 'trim|required');
            $this->form_validation->set_rules('message', 'Message', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                $this->load->view('website/contact_us', $data);
            } else {
               
                $insert['name'] = $_POST['name'];
                $insert['email'] = $_POST['email'];
                $insert['mobile_no'] = $_POST['mobile_no'];
                $insert['message'] = $_POST['message'];
                $insert['ip'] = $_SERVER['REMOTE_ADDR'];
                $insert['add_date'] = date('y-m-d H:i:s');

                $this->db->insert('contact_info', $insert);
                $this->session->set_flashdata('msg', 'FORM SUBMITTED SUCCESSFULLY !!!');

                $mail_data = array("Name" => $_POST['name'],
                        "Email ID" => $_POST['email'],
                        "Mobile No." => $_POST['mobile_no'],
                        "Message" => $_POST['message']
                    );
                $to = 'bharat.digiinterface@gmail.com';
                $data['list'] = $mail_data;
                $mail_body = $this->load->view('mail_template/contact_email', $data, TRUE); //Welcome email
               
                $resp = email_send($to, 'Contact Enquiry', $mail_body, '', '', '');
            }

            redirect($lang.'/contact-us', $data);

        } else {
            $this->load->view('website/contact_us', $data);
        }

    }  
    

}

