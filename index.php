<?php

require_once "lib/config_load.php";

$data = session_check_token();
if ($data[0] == true) {
    echo json_encode($data[1]);
} else {
    switch ($data[1]) {
        case "empty token or uid":
            header("Location: /auth.php");
            break;
        case "Incorrect auth id":
            header("Location: /exit.php");
            break;
    }
}

