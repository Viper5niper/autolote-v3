<?php

function delete_files($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!delete_files($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }

    }

    return rmdir($dir);
}

function upload_global($file, $folder,$name = null){ 

    $file_type = $file->getClientOriginalExtension(); 
    $folder = $folder; 
    $destinationPath = public_path().$folder; 
    $destinationPathThumb = public_path().$folder.'thumb';
    $name != null ? $filename = $name. '.' . $file_type : $filename = uniqid().'_'.time() . '.' . $file_type;
    $url = $folder.'/'.$filename; 

    if ($file->move($destinationPath.'/' , $filename)) { 
        return $filename; 
    } 
}

function toUppercase($fields){
        
    foreach($fields as $key => $field){
        $fields[$key] = mb_strtoupper($field, 'UTF-8');
    }

    return $fields;
}

