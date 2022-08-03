<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);
include 'connect.php';

function send_mail($from,$from_name,$to,$sub,$conts,$file=""){
	$charset="euc-kr";
	$boundary = md5(rand());
	$boundary_content = md5(rand());

	$mailheaders = "From: =?$charset?B?".base64_encode(iconv("utf-8","euc-kr",$from_name))."?= <{$from}>\r\n";
	$mailHeaders .= "X-Mailer: $from_name\r\n"; 
	$mailHeaders .= "Reply-To: $from\r\n";
	$mailHeaders .= "Return-Path: $from\r\n"; 
	$mailheaders .= "Content-Type: text/html; charset=$charset\r\n";

	$wcard =mail($to,$sub,$conts,$mailheaders);
	return $wcard;

}

extract($_REQUEST);

$job_title 		= implode(" / ",$_POST['product']);

$first_name 	= $_POST['first_name'];
$last_name 		= $_POST['last_name'];
$email 			= $_POST['email'];
$phone 			= $_POST['phone'];
$country_list 	= $_POST['country_list'];
$city_list 		= $_POST['city_list'];
$gender 		= $_POST['gender'];
$address 		= $_POST['address'];
$position_list 	= $_POST['position_list'];
$add_info 		= $_POST['add_info'];
$upload 		= $_FILES['file_upload']['name'];
$upload_tmp		= $_FILES['file_upload']['tmp_name'];
$upload_size	= $_FILES['file_upload']['size'];
// etc


/**
 * For mail fuction
 */
$to = 'ucoder.git@gmail.com'; // change here

$subject = '대명아임레디'; // change here
$from = 'noreply@noreply.com'; // change here

$from_name = '대명아임레디';
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';
$message .= '<p style="color:#080;font-size:18px;">You are register for '.$job_title.'</p>';
$message .= '<h1 style="color:#f40;">Hi '.$first_name.'!</h1>';
$message .= '<p style="color:#080;font-size:16px;">Last Name: '.$last_name.'</p>';
$message .= '<p style="color:#080;font-size:16px;">Email: '.$email.'</p>';
$message .= '<p style="color:#080;font-size:16px;">Phone: '.$phone.'</p>';
$message .= '<p style="color:#080;font-size:16px;">Country: '.$country_list.'</p>';
$message .= '<p style="color:#080;font-size:16px;">City: '.$city_list.'</p>';
$message .= '<p style="color:#080;font-size:16px;">Gender: '.$gender.'</p>';
$message .= '<p style="color:#080;font-size:16px;">Address: '.$address.'</p>';
$message .= '<p style="color:#080;font-size:16px;">Position: '.$position_list.'</p>';
$message .= '<p style="color:#080;font-size:16px;">Additional Info: '.$add_info.'</p>';
$message .= '</body></html>';
 
// Sending email

	
	//data insert
	//extract($_REQUEST);

	$sql="INSERT INTO job_application SET job_title='$job_title', first_name='$first_name', last_name='$last_name', email='$email', phone='$phone', country_list='$country_list', city_list='$city_list', gender='$gender', address='$address', position_list='$position_list', add_info='$add_info', resume='$filename', created='$created'";

	if($obj->sql_insert($sql)){

		//mail
		//if (mail($to, $subject, $message, $headers)) {
		if(send_mail($from,$from_name,$to,$subject,$message)){
			echo '귀하의 이메일은 보내졌습니다.';
		} else {
			echo '이메일을 보낼 수 없습니다. 다시 시도해주세요.';
		}
		// echo 'Data inserted';
		header('location:complete.php');
	}
	
