<?php
//header('Content-Type: text/html; charset=utf-8');

function send_mail($from,$from_name,$to,$sub,$conts,$file=""){
	$charset="euc-kr";
	$boundary = md5(rand());
	$boundary_content = md5(rand());

	$mailheaders = "From: =?$charset?B?".base64_encode(iconv("utf-8","euc-kr",$from_name))."?= <{$from}>\r\n";
	$mailHeaders .= "X-Mailer: $from_name\r\n"; 
	$mailHeaders .= "Reply-To: $from\r\n";
	$mailHeaders .= "Return-Path: $from\r\n"; 
	$mailheaders .= "Content-Type: text/html; charset=$charset\r\n";
/**
    if ($file != "") {
        foreach ($file as $f) {
            $mailheaders .= "\r\n--{$boundary_content}\r\n";
            $mailheaders .= "Content-Type: APPLICATION/OCTET-STREAM; name=\"$f[name]\"\r\n";
            $mailheaders .= "Content-Transfer-Encoding: BASE64\r\n";
            $mailheaders .= "filename=\"$f[name]\"\r\n";

            $mailheaders .= "\r\n";
            $mailheaders .= chunk_split(base64_encode($f[data]));
            $mailheaders .= "\r\n";
        }
        $mailheaders .= "\r\n--{$boundary_content}--\r\n";
    }
*/
	$wcard =mail($to,$sub,$conts,$mailheaders);
	return $wcard;

}
$from="toys1975@nate.com";
$from_name="대명";
$to="toys1975@naver.com";
$sub="테스트입니다.";
$conts="test mail 테스트입니다.";
send_mail($from,$from_name,$to,$sub,$conts);
?>