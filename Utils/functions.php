<?php

function validateData($data, $type=""){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if($type === 'mail') {
        $data = filter_var($data, FILTER_VALIDATE_EMAIL);
    }
    return $data;
}