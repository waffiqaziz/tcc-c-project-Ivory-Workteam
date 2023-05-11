<?php

function callAPI($method, $url, $data)
{
  $curl = curl_init();
  switch ($method) {
    case "POST":
      curl_setopt($curl, CURLOPT_POST, 1);
      if ($data)
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      break;
    case "PUT":
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
      if ($data)
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      break;
    case "DEL":
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
      if ($data)
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      break;
    case "GET":
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
      if ($data)
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      break;
    default:
      if ($data)
        $url = sprintf("%s?%s", $url, http_build_query($data));
  }
  // OPTIONS:
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

  // EXECUTE:
  $result = curl_exec($curl);
  if (!$result) die("Connection Failure");
  curl_close($curl);

  $data = json_decode($result, true);
  // print_r($data); // test return file
  return $data;
}

$localhost = "http://localhost:3030/";

// credit https://weichie.com/blog/curl-api-calls-with-php/
