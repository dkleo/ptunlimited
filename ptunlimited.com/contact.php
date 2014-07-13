<?php
function clean_string($string) {
	$string = ereg_replace(' +', ' ', trim($string));
	return preg_replace("/[<>]/", '_', $string);
}
        
$to ='"Physical Therapy Unlimited" <PhysicalTherapyUnlimited@gmail.com>';
$subject = 'Website Message';


$body = "\n";


$body .= "Name: " . clean_string($HTTP_POST_VARS['cf_name']) . "\n";
$body .= 'Email: ' . clean_string($HTTP_POST_VARS['cf_email']) . "\n";
$body .= 'Comments: ' . clean_string($HTTP_POST_VARS['cf_message']) . "\n";
$xheaders = 'From: "PTU Website" <site@ptunlimited.com>' . "\r\n" . 'bcc: bsteve@panix.com';
mail($to, $subject, $body, $xheaders);

//echo "okay";
$status = 'ok';
header("Location: /thankyou.html");
?>