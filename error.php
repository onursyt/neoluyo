<?php
require 'inc/_global/config.php';
require 'inc/_global/views/page_start.php';
require 'inc/_global/token.php';
require 'inc/_global/user.php';
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	$ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
	$ip = $_SERVER['REMOTE_ADDR'];
}
$date = time();
$ua = $_SERVER['HTTP_USER_AGENT'];
$code = $_SERVER['REDIRECT_STATUS'];
$codes = array(
	400 => 400,
	401 => 401,
	403 => 403,
	404 => 404,
	500 => 500,
	503 => 503
);
$source_url = 'http'.((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 's' : '').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$stmt = $conn->prepare("INSERT INTO errors (username, requestedURL, statusCode, ip, date, userAgent) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisis", $username, $source_url, $codes[$code], $ip, $date, $ua);
if ($source_url != "https://cdn.discordapp.com/attachments/1054458492007764039/1056699564645691402/favicon.ico"){
	$stmt->execute();	
}

if (empty($username)){header("Location: https://tavsancik.net/giris.jsp");exit();}

if (array_key_exists($code, $codes) && is_numeric($code)) {
	header("Location: https://tavsancik.net/$codes[$code].jsp");
} else {
	die('Bilinmeyen Durum Kodu: $codes[$code]');
}
?>