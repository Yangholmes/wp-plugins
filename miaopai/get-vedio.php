<?php
/**
 * Get Bing Photo Everytime
 */

// require http request class
require_once('yang-class-http-request.php');


// $url = 'http://t.cn/RKWlCcU'; 

$url = $_GET['url'];

$request = new yang_HTTP_request("$url"); // 
$request->set_header([]);
$raw_response = $request->request('GET'); // $raw_response is json string

// echo $raw_response;

// echo "\n================>>\n";

preg_match('/The document has moved <A HREF=\"(.+?)\">/', $raw_response, $matchs);

// echo json_encode($matchs);

// echo "\n================>>\n";

$redirectory = $matchs[1];

$url = $redirectory; 

$request->set_url($url);
$request->set_header([]);
$raw_response = $request->request('GET'); // $raw_response is json string

// echo $raw_response;

$raw_response = urldecode($raw_response);

// echo $raw_response;

// echo "\n================>>\n";

preg_match('/flashvars=\"list=(.+?)\"/', $raw_response, $matchs);

// echo json_encode($matchs);

// echo "\n================>>\n";

$video_url = $matchs[1];

echo $video_url;

// echo "\n================>>\n";