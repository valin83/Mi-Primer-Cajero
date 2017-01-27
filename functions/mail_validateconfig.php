<?php

/**
 *  This function is going to help us filter out bad email from the good one
 *      and it makes sure the email enter is in the format of as@as.com
 * 
 * @param type $str
 * @return type
 */

    function checkEmail($str) {
	return preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $str);
}
    
/**
 *  This is a send email function that will help us send email to the registered users.
 * 
 * @param type $from
 * @param type $to
 * @param type $subject
 * @param type $body
 */
    
    function send_mail($from,$to,$subject,$body){
        
	$headers = '';
	$headers .= "From: $from\n";
	$headers .= "Reply-to: $from\n";
	$headers .= "Return-Path: $from\n";
	$headers .= "Message-ID: <" . md5(uniqid(time())) . "@" . $_SERVER['SERVER_NAME'] . ">\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Date: " . date('r', time()) . "\n";

	mail($to,$subject,$body,$headers);
}

/**
 * This function is used to just display out forms. We are going
 *  to use another function to validate our user input.
 */
function login(){
    //The login_view.php file created in the views folder
    $data['main_content'] = 'login_view';
    $this -> load -> view('template_view', $data);
}
/**
function validate(){
    /*
     * Make sure that the fields are not empty using the build in form validation
     */
  /*  
    $this -> form_validation -> set_rules('username', 'Username', 'trim|required');
    $this -> form_validation -> set_rules('password', 'Password', 'trim|required')
}*/

?>

