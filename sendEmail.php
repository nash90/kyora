<?php

$data = json_decode(file_get_contents('php://input'), true);
if(isset($data)) {

$adminMail = "info@kiyora-inc.jp";
$to = $data['mailaddress'];
$phonenumber = $data['phonenumber'];
$companyname = $data['companyname'];
$companyaddress = $data['companyaddress'];
$name = $data['name'];
$snsaccount = $data['snsaccount'];
$message = $data['message'];

$subject = "応募完了しました。";

$body = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<div>
<p>
<b>会社名</b><br>
{{companyname}}<br>
<br>
<b>会社住所</b><br>
{{companyaddress}}<br>
<br>
<b>名前</b><br>
{{name}}<br>
<br>
<b>メールアドレス</b><br>
{{mailaddress}}<br>
<br>
<b>電話番号</b><br>
{{phonenumber}}<br>
<br>
<b>SNSアカウント</b><br>
{{snsaccount}}<br>
<br>
<b>応募動機</b><br>
{{message}}<br>
<br>
<br>
</p>
</div>
</body>
</html>
";

$body = str_replace("{{companyname}}", $companyname, $body);
$body = str_replace("{{companyaddress}}", $companyaddress, $body);
$body = str_replace("{{name}}", $name, $body);
$body = str_replace("{{mailaddress}}", $to, $body);
$body = str_replace("{{phonenumber}}", $phonenumber, $body);
$body = str_replace("{{snsaccount}}", $snsaccount, $body);
$body = str_replace("{{message}}", $message, $body);

$body_customer = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>
この度は「ベジエグリーン酵素スムージー無料トライアル企業キャンペーン」<br>
にご応募いただき、誠にありがとうございました。<br>
<br>
下記内容のご応募が完了しましたので、ご連絡させていただきます。<br>
<br>
ご応募内容<br>
<br>
<b>会社名</b><br>
{{companyname}}<br>
<br>
<b>会社住所</b><br>
{{companyaddress}}<br>
<br>
<b>名前</b><br>
{{name}}<br>
<br>
<b>メールアドレス</b><br>
{{mailaddress}}<br>
<br>
<b>電話番号</b><br>
{{phonenumber}}<br>
<br>
<b>SNSアカウント</b><br>
{{snsaccount}}<br>
<br>
<b>応募動機</b><br>
{{message}}<br>
<br>
<br>
応募者の中から抽選を行い、当選された方のみ本キャンペーンにご参加いただきます。<br>
なお、当選のご連絡は、11月上旬に当選者に対してメールまたは電話にてご連絡いたします。<br>
選考から漏れた方へのご連絡はいたしません。また、抽選過程に関するお問い合わせ、<br>
当落についてのお問い合わせには対応いたしかねますので、あらかじめご了承ください。<br>
<br>
ベジエグリーン酵素スムージー無料トライアル企業キャンペーン窓口<br>
株式会社KIYORA<br>
渋谷区恵比寿南1-14-10福隆ビル4階　<br>
03-6412-5055（受付時間：10:00～17:00／土・日・祝日除く）<br>
info@kiyora-inc.jp（受付時間：24時間）<br>
<br>
今後とも、ベジエ（ vegie ）をご愛顧頂けますよう、お願い申し上げます。<br>
</p>
</body>
</html>
";

$body_customer = str_replace("{{companyname}}", $companyname, $body_customer);
$body_customer = str_replace("{{companyaddress}}", $companyaddress, $body_customer);
$body_customer = str_replace("{{name}}", $name, $body_customer);
$body_customer = str_replace("{{mailaddress}}", $to, $body_customer);
$body_customer = str_replace("{{phonenumber}}", $phonenumber, $body_customer);
$body_customer = str_replace("{{snsaccount}}", $snsaccount, $body_customer);
$body_customer = str_replace("{{message}}", $message, $body_customer);

//print_r($body);
//exit;

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@kiyora-inc.jp>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($adminMail,$subject,$body,$headers);
mail($to,$subject,$body_customer,$headers);
}
?>