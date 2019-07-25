<?php

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user_s = $this->session->userdata('admin_logged_in');
        if (empty($user_s)) {
            redirect('admin');
        }
    }

    public function index() {
   
//                        $string = 'Colourless, odourless, inert and non-toxic                                                        Formulated from highly refined medicinal base oils                                               Reduces friction and wear';
//
//                            $new = '';
//                            $str = $string;
//                            $strlen = strlen( $str );
//                            for( $i = 0; $i <= $strlen; $i++ ) {
//                                $char = substr( $str, $i, 1 );
//                                if($char == ' '){
//                                    $first = $i;
//                                    $last = '';
//                                    $cnt = 0;
//                                    // $i++;
//                                    while(true){
//                                        if(substr( $str, $i, 1 ) == ' ')
//                                        {
//                                            $cnt++;
//                                            $i++;    
//                                        }else{
//                                            $i--;
//                                            break;
//                                        }
//                                        
//                                    }
//
//                                    if($cnt < 2){
//                                        $new .= ' ';
//                                    }else{
//                                        $new.= '@@@';
//                                    }
//                                }else{
//                                    if($char === '0000')
//                                    {
//                                        $new .= ' &deg; ';    
//                                    }else{
//                                        $new .= $char; 
//                                    }
//                                }
//
//                                
//                            }
//
//                            $arr = explode('@@@', $new);
//                            $qq = '<ul>';
//                            foreach($arr as $key => $val){
//                                $qq .= '<li>'.$val.'</li>';
//                            }
//                            $qq .= '</ul>'; 
//                            echo $qq;
//                            exit();
                            //echo $new;

        $this->load->view('admin/dashboard');
    }
}
?>
