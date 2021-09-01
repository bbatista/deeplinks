<?php

function get_os() {
	$userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
	if (strpos($userAgent, "ipod") || strpos($userAgent, "iphone") || strpos($userAgent, "ipad")) {
		return "ios";
	} elseif(strpos($userAgent, "android")) {
		return "android";
	}
	return "other";
}

function urls($os) {
	if ($os == "ios") return "vnd.youtube://www.youtube.com/watch?v=99lf8u_ks6k";
	if ($os == "android") return "intent://www.youtube.com/watch?v=99lf8u_ks6k#Intent;package=com.google.android.youtube;scheme=https;end";
	return "https://youtu.be/99lf8u_ks6k";
}

$sendTo = urls(get_os());
header ("Location: {$sendTo}");
exit();