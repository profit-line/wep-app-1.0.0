<?php

define('s' , DIRECTORY_SEPARATOR);
function dd($arr , $exit = 0)
{
    if (isset($arr) && !empty($arr)) {
        echo ('<pre>');
        var_dump($arr);
        echo ('</pre>');
    }
    if($exit === 1){
        exit;
    }   
}

function old($data, $key, $default = '') {
    return isset($data['requests'][$key]) ? $data['requests'][$key] : $default;
}

function old_checkbox($data, $key, $value = 1) {
    return (isset($data['requests'][$key]) && $data['requests'][$key] == $value) ? 'checked' : '';
}


function add_class_error($errData , $key)
{
    
    if (isset($errData['errors'][$key]) && $errData['errors'][$key] === true) {
        return 'is-invalid';
    } else {
        return '';
    }
}

function add_class($class){
    if(isset($class) && !empty($class) && !is_null($class)){
        return $class;
    }else{
        return '';
    }
}

function view_error($errData , $key, $msg = null)
{
    if (isset($errData['errors'][$key]) && $errData['errors'][$key] === true && $msg != null) {
        return $msg;
    } else {
     
        $path = APPROOT . s . 'config' . s . 'textError.json';
        $json = file_get_contents($path);
        $err = json_decode($json , 1);
   
        return $err[$key];
    }
    return false;
}

function generateToken(){
    return bin2hex(openssl_random_pseudo_bytes(32));
}


function checkList($list , $item){

    if(is_array($list) && !isEmpty($item)){

        $resulte = in_array($item , $list);
        if($resulte){
            return false;
        }else{
            return true;
        }

    }

    return true;

}


function isEmpty($value){
    if(isset($value)){
    $newValue = trim($value);
    if($newValue === ''){
        return true;
    }
    }
    return false;

}

function fileUpload($fileAddress , $destinationAddress){

    if(!isEmpty($fileAddress) && !isEmpty($destinationAddress)){
        
        if(file_exists($fileAddress)){
            if(move_uploaded_file($fileAddress, $destinationAddress)){
                
                return true;
            }else{
                return false;
            }
        }
    }
    return false;
}


function fileDelete($fileAddress){

    if(!isEmpty($fileAddress)){
        if(file_exists($fileAddress)){
            if(unlink($fileAddress)){
                return true;
            }else{
                return false;
            }
        }
    }
    return false;
}


function ipCheck(){
$ip = $_SERVER['REMOTE_ADDR'];

$url = "http://ipinfo.io/{$ip}/json?token=" . INFOIPAPI;
$response = file_get_contents($url);

$data = json_decode($response, true);
$country = $data['country'];

if ($country == 'TR' || $country == 'IR') {
    return true;
} else {
return false;    
}

}