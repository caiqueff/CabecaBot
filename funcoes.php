<?php

function request($funcao, $parametros){
    global $link;
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $link."/".$funcao,
        CURLOPT_POST => TRUE,
        CURLOPT_POSTFIELDS => $parametros,
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_SSL_VERIFYHOST => FALSE,
        CURLOPT_RETURNTRANSFER => TRUE
    ));
    curl_exec($ch);
    curl_close($ch);
}

function isCommand($msg){
    if($msg[0] == "/")
        return TRUE;
    else
        return FALSE;
}

?>