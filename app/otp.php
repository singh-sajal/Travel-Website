<?php
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://control.msg91.com/api/v5/widget/verifyAccessToken',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "authkey": "441523ALp4I2Zjh8j67b053dbP1",
  "access-token": "{jwt_token_from_otp_widget}"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Accept: application/json',
  ),
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;
