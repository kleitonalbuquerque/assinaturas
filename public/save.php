<?php

// Get the incoming image data
$image = $_POST["image"];

// Remove image/jpeg from left side of image data
// and get the remaining part
$image = explode(";", $image)[1];

// Remove base64 from left side of image data
// and get the remaining part
$image = explode(",", $image)[1];

// Replace all spaces with plus sign (helpful for larger images)
$image = str_replace(" ", "+", $image);

// Convert back from base64
$image = base64_decode($image);

$name = uniqid(date('HisYmd')) . ".jpg";

// Save the image as filename.jpeg
file_put_contents("uploads/assets/images/emails/".$name, $image);

$system = "". 
// $img = "assets/images/emails/" . $name;
$img = $name;

$url = "http://" . $_SERVER['SERVER_NAME'];
if (isset($_SERVER['SERVER_PORT'])) {
	$url .= ':' . $_SERVER['SERVER_PORT'];
}
$url .= '/'.$system;

// Sending response back to client
echo $img;
