<?php
define('HEADER', 'Kinmarche');
define('FOOTER', 'Kinmarche');

function get_contact() {
    $CI = get_instance();
    $contact = $CI->db->where('id', 1)->get('contact_us')->row_array();
    return $contact;
}

function category_name($ids = '') {
    $CI = get_instance();
    $ids = explode(',', $ids);
    $temp = '';
    $category_name = $CI->db->select('id,name')->where('status', 1)->order_by('order', 'ASC')->get('category')->result_array();
    foreach ($category_name as $key => $val) {
        if (in_array($val['id'], $ids)) {
            $temp.=$val['name'] . '<br> ';
        }
    }
    return $temp;
}


// Working email 
function email_send($to = '', $sub = '', $msg = '', $cc = '', $bcc = '', $attach = '') {
    $from = 'noreply.digiinterface@gmail.com';
    $CI = get_instance();
    $CI->load->library('email');
    $CI->load->helper('email'); 

    $config = array();
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'ssl://smtp.googlemail.com';
    $config['smtp_port'] = '465';
    $config['smtp_user'] = 'noreply.digiinterface@gmail.com';
    $config['smtp_pass'] = 'Naren@123@';
    $config['charset'] = 'utf-8';
    $config['newline'] = "\r\n";
    $config['mailtype'] = 'html'; // text or html
    $config['validation'] = TRUE; // bool whether to validate email or not
    $CI->email->initialize($config);
    $CI->email->from($from, 'Kin Marche');
    $CI->email->to($to);
    $CI->email->subject($sub);
    $CI->email->message($msg);

    if ($attach != "") {
        $CI->email->attach($attach);
    }

    if ($cc != "") {
        $CI->email->cc($cc);
    }

//  $bcc[] = 'abcd@gmail.com';
    if ($bcc != "") {
        $CI->email->bcc($bcc);
    }
    $CI->email->send();
//    echo $CI->email->print_debugger();
//    exit();
    $CI->email->clear(TRUE);
    true;
}


// function email_send($to = '', $from = '', $sub = '', $msg = '', $cc = '', $bcc = '', $attach = '') {
//     $CI = get_instance();
//     //$smtp = get_data_where('email_config', array('active' => 1));
//     $CI->load->library('email');
//     $CI->load->helper('email'); 

//     $smtp = 1;
//     $config['protocol'] = 'smtp';
//     $config['smtp_host'] = 'digiinterface.com';
//     $config['smtp_port'] = '25';
//     $config['smtp_user'] = 'no-reply@digiinterface.com';
//     $config['smtp_pass'] = 'naren@123';
//     $config['charset'] = 'utf-8';
//     $config['newline'] = "\r\n";
//     $config['crlf'] = "\r\n";
//     $config['mailtype'] = 'html'; // text or html
//     $config['validation'] = TRUE; // bool whether to validate email or not
//     $CI->email->initialize($config);
//     $from = 'no-reply@digiinterface.com';
//     if (!empty($smtp[0]['bcc'])) {
//         $bcc[] = $smtp[0]['bcc'];
//     }

//     $from_name = 'Lifejodi';

//     if (empty($from)) {
//         $from = 'no-reply@digiinterface.com';
//     }
//     $CI = get_instance();
//     $CI->email->from($from, $from_name);
//     $CI->email->to($to);
//     $CI->email->subject($sub);
//     $CI->email->message($msg);

//     if ($attach != "") {
//         $CI->email->attach($attach);
//     }
//     if ($cc != "") {
//         $CI->email->cc($cc);
//     }
//     // $bcc[] = 'vijendra@goyalinfotech.com';
// //    $bcc[] = 'vijendrajs@gmail.com';

//     if (!empty($bcc)) {
//         $CI->email->bcc($bcc);
//     }


//     if ($smtp == 1) {
//         if ($CI->email->send()) {
// //            echo "Mail sent";
//         } else {
//             echo $CI->email->print_debugger();
// //            echo "Failled";
//         }
//     } else {
// //        echo "No SMTP";
//     }
//     $CI->email->clear();
// }



// function email_send($to = '', $from = '', $sub = '', $msg = '', $cc = '', $bcc = '', $attach = '') {
//     $CI = get_instance();
//     $smtp = array();
    
//     $CI->load->library('email');
//     $CI->load->helper('email');

//     //$smtp = get_data_where('email_config', array('active' => 1));
//     $smtp = $CI->db->where('active', 1)->get('email_config')->row_array();
   
//     $config = array();
//     $config['charset'] = 'utf-8';
//     $config['newline'] = "\r\n";
//     $config['mailtype'] = 'html'; // text or html
//     $config['validation'] = TRUE; // bool whether to validate email or not

//     if (count($smtp) == 0) {
//         $smtp = 1;
//         $from = 'noreply@godots.org';
//         $from_name = 'Ashwini Associates ';
//     } else {
//         $config['protocol'] = 'smtp';
//         $config['smtp_host'] = trim($smtp['Host']);
//         $config['smtp_port'] = trim($smtp['Port']);
//         $config['smtp_user'] = trim($smtp['Username']);
//         $config['smtp_pass'] = trim($smtp['Password']);
//         $from = $smtp['From'];
//         if (!empty($smtp['bcc'])) {
//             $bcc[] = $smtp['bcc'];
//         }
//         $from_name = $smtp['From_Name'];
//         $smtp = 1;
//     }
    
//     $CI->email->initialize($config);
//     $CI->email->from($from, $from_name);
//     $CI->email->to($to);
//     $CI->email->subject($sub);
//     $CI->email->message($msg);

//     if ($attach != "") {
//         $CI->email->attach($attach);
//     }
//     if ($cc != "") {
//         $CI->email->cc($cc);
//     }
//     //$bcc[] = 'vijendra@goyalinfotech.com';

//     if (!empty($bcc)) {
//         $CI->email->bcc($bcc);
//     }


//     if ($smtp == 1) {
//         if ($CI->email->send()) {
// //            echo "Mail sent";
//         } else {
// //            echo $CI->email->print_debugger();
// //            echo "Failled";
//         }
//     } else {
// //        echo "No SMTP";
//     }
//     $CI->email->clear(TRUE);
// }


function pagination($total, $per_page = 10, $page = 1, $url = '?') {
    $adjacents = "2";
    $page = ($page == 0 ? 1 : $page);
    $start = ($page - 1) * $per_page;
    $prev = $page - 1;
    $next = $page + 1;
    @$lastpage = ceil($total / $per_page);
    $lpm1 = $lastpage - 1;
    $pagination = '';
    if ($lastpage > 1) {
        $pagination .= '<div class="col-md-12"> <div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-10 col-xs-12" style="padding-top: 15px;">';
        $pagination .= "<ul class='pagination'>";
        $pagination .= "<li class='details' style='padding-top: 9px;margin-right: 5px;'><h5>Page $page of $lastpage</h5></li>";
        if ($lastpage < 7 + ($adjacents * 2)) {
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination.= "<li><a class='btn btn-primary current'>$counter</a></li>";
                else
                    $pagination.= "<li><a class='btn btn-default' href='{$url}page=$counter'>$counter</a></li>";
            }
        }
        elseif ($lastpage > 5 + ($adjacents * 2)) {
            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='btn btn-primary'>$counter</a></li>";
                    else
                        $pagination.= "<li><a class='btn btn-default' href='{$url}page=$counter'>$counter</a></li>";
                }
                $pagination.= "<li class='dot'>...</li>";
                $pagination.= "<li><a class='btn btn-default' href='{$url}page=$lpm1'>$lpm1</a></li>";
                $pagination.= "<li><a class='btn btn-default' href='{$url}page=$lastpage'>$lastpage</a></li>";
            }
            elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination.= "<li><a class='btn btn-default' href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a class='btn btn-default' href='{$url}page=2'>2</a></li>";
                $pagination.= "<li class='dot'>...</li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='btn btn-primary current'>$counter</a></li>";
                    else
                        $pagination.= "<li><a class='btn btn-default' href='{$url}page=$counter'>$counter</a></li>";
                }
                $pagination.= "<li class='dot'>..</li>";
                $pagination.= "<li><a class='btn btn-default' href='{$url}page=$lpm1'>$lpm1</a></li>";
                $pagination.= "<li><a class='btn btn-default' href='{$url}page=$lastpage'>$lastpage</a></li>";
            }
            else {
                $pagination.= "<li><a class='btn btn-default' href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a class='btn btn-default' href='{$url}page=2'>2</a></li>";
                $pagination.= "<li class='dot'>..</li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='btn btn-primary current'>$counter</a></li>";
                    else
                        $pagination.= "<li><a class='btn btn-default' href='{$url}page=$counter'>$counter</a></li>";
                }
            }
        }
        if ($page < $counter - 1) {
            $pagination.= "<li><a class='btn btn-deafult' href='{$url}page=$next'>Next</a></li>";
            $pagination.= "<li><a class='btn btn-deafult' href='{$url}page=$lastpage'>Last</a></li>";
        } else {
            $pagination.= "<li><a class='btn btn-inverse current'>Next</a></li>";
            $pagination.= "<li><a class='btn btn-inverse current'>Last</a></li>";
        }
        $pagination.= "</ul>";
        $pagination.= '</div>
                                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" style="float:left;margin-top: 20px;">
                                <form action="" method="get">
                                    <select name="per_page" id="per_page" class="form-control input-sm" style="width: 80px; float: right;" onchange="this.form.submit();">
                                        <option value="5" ' . ($per_page == '5' ? 'selected' : '') . '>5</option>
                                        <option value="10" ' . ($per_page == '10' ? 'selected' : '') . '>10</option>
                                        <option value="20" ' . ($per_page == '20' ? 'selected' : '') . '>20</option>
                                        <option value="50" ' . ($per_page == '50' ? 'selected' : '') . '>50</option>
                                        <option value="100" ' . ($per_page == '100' ? 'selected' : '') . '>100</option>
                                        <option value="All" ' . ($per_page == 'All' ? 'selected' : '') . '>All</option>
                                    </select>
                                    </form>
                                </div></div>
                            </div>';
    }
    return $pagination;
}

function url_title1($str, $separator = '-', $lowercase = FALSE) {
    if ($separator == 'dash') {
        $separator = '-';
    } else if ($separator == 'underscore') {
        $separator = '_';
    }

    $q_separator = preg_quote($separator);

    $trans = array(
        '&.+?;' => '',
        '[^a-z0-9 _-]' => '',
        '\s+' => $separator,
        '(' . $q_separator . ')+' => $separator
    );

    $str = strip_tags($str);

    foreach ($trans as $key => $val) {
        $str = preg_replace("#" . $key . "#i", $val, $str);
    }

    if ($lowercase === TRUE) {
        $str = strtolower($str);
    }
    return trim($str, $separator);
}

function adminEmail() {
    $data = array();
    $data[] = 'sandeep.digiinterface@gmail.com';
    return $data;
}

function get_categories() {
    $CI = get_instance();
    $categories = $CI->db->select('eng_name,fr_name,slug')->where('status', 1)->where('deleteflag', 0)->order_by('order ASC')->get('category')->result();
    return $categories;
}

function limitTextWords($content = false, $limit = false, $stripTags = false, $ellipsis = false) 
{
    if ($content && $limit) {
        $content = ($stripTags ? strip_tags($content) : $content);
        $content = explode(' ', $content, $limit+1);
        array_pop($content);
        if ($ellipsis) {
            array_push($content, '...');
        }
        $content = implode(' ', $content);
    }
    return $content;
}

function email_send_core($to = '', $from = '', $sub = '', $msg = '', $cc = '', $bcc = '', $attach = '') {
    $CI = get_instance();
    $config['charset'] = 'utf-8';
    $config['newline'] = "\r\n";
    $config['mailtype'] = 'html'; // text or html
    $config['validation'] = TRUE; // bool whether to validate email or not

    $setting = getSetting();
    if ($setting['use_smtp'] == '1') {
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = $setting['Host'];
        $config['smtp_port'] = $setting['Port'];
        $config['smtp_user'] = $setting['Username'];
        $config['smtp_pass'] = $setting['Password'];
    }
    $from_email = $setting['From'];
    $from_name = $setting['From_Name'];
    //Load email library 
    $CI->load->library('email');
    $CI->email->initialize($config);
    $CI->email->from($from_email, $from_name);
    $CI->email->to($to);
    if ($cc != "") {
        $CI->email->cc($cc);
    }
    if ($bcc != "") {
        $CI->email->bcc($bcc);
    }
    if ($attach != "") {
        $CI->email->attach($attach);
    }
    $CI->email->subject($sub);
    $CI->email->message($msg);

    //Send mail 
    if ($CI->email->send()) {
//        echo 'sent';
    } else {
//        echo 'not sent';
    }
}



function php_email_send($to = '', $sub = '', $msg = '', $cc = '', $bcc = '', $attach = '', $email_config = 1) {
    $send = 0;
    $CI = get_instance();
    $CI->load->library('phpmailer');
    $email_config = get_data_where("setting", array('active' => '1', "email_config_id" => $email_config));

    $mail = new PHPMailer();
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->IsHTML(true);

    $mail->SMTPAuth = true;
    if (!empty($email_config[0]['SMTPSecure'])) {
        $mail->SMTPSecure = $email_config[0]['SMTPSecure'];
    }

//                        $mail->SMTPDebug = 2;
    $mail->Host = $email_config[0]['Host']; // sets the SMTP server
    $mail->Port = $email_config[0]['Port'];                    // set the SMTP port for the GMAIL server
    $mail->Username = $email_config[0]['Username']; // SMTP account username
    $mail->Password = $email_config[0]['Password'];        // SMTP account password
    $mail->SetFrom($email_config[0]['From'], $email_config[0]['From_Name']);


    $mail->Subject = $sub;
    $mail->Body = $msg;

    if (is_array($cc)) {
        if (!empty($cc)) {
            foreach ($cc as $val) {
                $mail->AddCC($val['id'], $val['val']);
            }
        }
    } elseif ($cc != '') {
        $mail->AddCC($cc, "");
    }
    if (is_array($bcc)) {
        if (!empty($bcc)) {
            foreach ($bcc as $val) {
                $mail->AddBCC($val['id'], $val['val']);
            }
        }
    } elseif ($bcc != '') {
        $mail->AddBCC($bcc, "");
    }
    if ($attach != "") {
        $mail->AddAttachment($attach);
    }

    if (is_array($to)) {
        if (!empty($to)) {
            foreach ($to as $val) {
                $mail->AddAddress($val['id'], $val['val']);
            }
            $send = 1;
        }
    } elseif ($to != '') {
        $mail->AddAddress($to, "");
        $send = 1;
    } else {
        $send = 0;
    }
    if ($send == 1) {
        if (!$mail->Send()) {
            return "Mailer Error: " . $mail->ErrorInfo;
        } else {
            return "Mail sent successfully";
        }
    } else {
        return "Error reciepent not found";
    }
}