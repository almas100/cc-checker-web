<?php

#//////////[Webshare Rotating Proxy]//////////#



$Websharegay = rand(0,10);

$rp1 = array(

2 => 'aavyfqpi-'.$Websharegay.':tlu2ikvex41w',

//3 => 'hlqouiao-'.$Websharegay.':4x2owj7o9dbo',

//4 => 'Proxy Here',

); 

$rotate = $rp1[array_rand($rp1)];

$ch = curl_init('http://ipv4.webshare.io/');

curl_setopt_array($ch, [

CURLOPT_RETURNTRANSFER => true,

CURLOPT_PROXY => 'http://p.webshare.io:80',

CURLOPT_PROXYUSERPWD => $rotate,

CURLOPT_HTTPGET => true,

]);

$ip = curl_exec($ch);

curl_close($ch);

ob_flush(); 



echo '[ IP: '.$ip.' ] ';



?>