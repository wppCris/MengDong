<?php
function http_put_json($url, $jsonStr)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen($jsonStr)
        )
    );
    curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    return array($httpCode, $response);
}

date_default_timezone_set('prc');

$obj = $_POST;
/*$obj = array(
    'userID' => 1,
    'userName' => 'ert'
    );*/
echo json_encode($obj);

var_dump(http_put_json('http://59.173.200.101:28400/api/users/update', json_encode($obj)));
 ?>
