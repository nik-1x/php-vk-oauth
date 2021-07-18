<?php

function session_check_token()
{
    if (isset($_SESSION['token']) and isset($_SESSION['uid'])) {
        if (gettype($_SESSION['token']) == "string") {
            if (strlen($_SESSION['token']) == 85) {

                $token = $_SESSION['token'];
                $secure_checkToken = vk_q("secure.checkToken", ["token" => $token, "v" => 5.131, "access_token" => APP_AUTH_TOKEN]);

                if ($secure_checkToken == "User authorization failed: invalid access_token (4).") {
                    return [false, $secure_checkToken];
                } elseif ($secure_checkToken[1]["success"] == 1) {

                    $data = vk_q("users.get", [ "v" => 5.103, "access_token" => $token ]);
                    $data_id = $data[1][0]['id'];
                    $data_name = $data[1][0]['first_name'];
                    $data_surname = $data[1][0]['last_name'];

                    if ($data_id == $_SESSION['uid']) {
                        return [true, ["token" => $token, "uid" => $data_id, "first_name" => $data_name, "last_name" => $data_surname]];
                    } else return [false, "Incorrect auth id"];

                } else return [false, "Unknown"];

            } else return [false, "incorrect token length"];
        } else return [false, "incorrect token value type"];
    } else return [false, "empty token or uid"];
}

