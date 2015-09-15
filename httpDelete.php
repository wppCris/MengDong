<?php
function http_delete_json($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    return array($httpCode, $response);
}

date_default_timezone_set('prc');

$obj = $_POST;
echo json_encode($obj);

$temp = 'http://59.173.200.101:28400/api/users/delete/'.$obj['userID'];
echo $temp;
var_dump(http_delete_json($temp));
 ?>
