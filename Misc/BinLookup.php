<?php
#//////////[Bin Lookup]//////////#

$bin = substr($cc, 0, 6);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://bins.su/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'Accept-Language: en-US,en;q=0.9',
'Content-Type: application/x-www-form-urlencoded',
'Host: bins.su',
'Origin: http://bins.su',
'Referer: http://bins.su/',
'User-Agent: '.$ua.'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=searchbins&bins='.$bin.'&bank=&country=');
$result = curl_exec($ch);
$bine = GetStr($result, '<td>Bank</td></tr><tr><td>','</td>');
$country = GetStr($result,'<td>'.$bine.'</td><td>','</td>');
$vendor = GetStr($result,'<td>'.$country.'</td><td>','</td>');
$type = GetStr($result,'<td>'.$vendor.'</td><td>','</td>');
$level = GetStr($result,'<td>'.$type.'</td><td>', '</td>');
$bank = GetStr($result,'<td>'.$level.'</td><td>', '</td>');
$flag = getFlags($country);
if(empty($level)){
  $level = "N/A";
}
if(empty($country)){
$country = "N/A";
}
if(empty($bank)){
$bank = "N/A";
}
if(empty($vendor)){
$vendor = "N/A";
}
if(empty($type)){
$type = "N/A";
}

?>