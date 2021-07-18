<?php

function vk_q($method, $vars) {
    try {
        $url = "https://api.vk.com/method/{$method}?".http_build_query($vars);
        $data = json_decode(file_get_contents($url), true);
        if(isset($data['error'])) {
            throw new Exception($data['error']['error_msg']);
        } else {
            return [true, $data['response']];
        }
    } catch (Exception $e) {
        return [false, $e->getMessage()];
    }
}

