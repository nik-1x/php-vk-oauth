<?php
session_start();

define("APP_AUTH_ID", "ID ПРИЛОЖЕНИЯ");
define("APP_AUTH_SECRET", "СЕКРЕТНЫЙ КЛЮЧ ПРИЛОЖЕНИЯ");
define("APP_AUTH_TOKEN", "ТОКЕН ПРИЛОЖЕНИЯ");

define("APP_AUTH_REDIRECT", "http://localhost/auth.php");
define("APP_AUTH_OAUTH_1", "https://oauth.vk.com/access_token");
define("APP_AUTH_OAUTH_2", "https://oauth.vk.com/authorize");
define("APP_AUTH_AUTHORIZE_SUMM", 0); // СУММА, НАПРИМЕР 2 + 4 + 1024 + 8192 + 262144 + 4194304

// upload libraries

require_once "vk_module.php";
require_once "sessions.php";