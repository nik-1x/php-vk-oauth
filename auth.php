<?php
require_once("lib/config_load.php");

if (isset($_SESSION['token']) and isset($_SESSION['uid'])) {
    header("Location: /");
    exit;
}

try {
    if (isset($_GET['state']) and $_GET['state'] == "confirmation" and isset($_GET['code'])) {
        $code = $_GET['code'];
        $query_params = [ "client_id" => APP_AUTH_ID, "client_secret" => APP_AUTH_SECRET, "redirect_uri" => APP_AUTH_REDIRECT, "code" => $code  ];
        $data = json_decode(file_get_contents(APP_AUTH_OAUTH_1 . "?" . http_build_query($query_params)), true);
        if (!isset($data['error'])) {
            $_SESSION['token'] = $data['access_token'];
            $_SESSION['uid'] = $data['user_id'];
            header("Location: /");
        } else {
            header("Location: /exit.php");
        }
    } else {
        $query_params = ["client_id" => APP_AUTH_ID, "redirect_uri" => APP_AUTH_REDIRECT, "display" => "popup", "scope" => APP_AUTH_AUTHORIZE_SUMM, "response_type" => "code", "state" => "confirmation"];
        header("Location: " . APP_AUTH_OAUTH_2 . "?" . http_build_query($query_params));
    }
} catch (Exception $e) {
    header("Location: /exit.php");
}

