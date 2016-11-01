<?php
////////////////////////////////////
// CORRIGIR
////////////////////////////////////
// $link se refere ao link com o token
////////////////////////////////////


function request($funcao, $parametros){
    global $link;
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $link.$funcao,
        CURLOPT_POST => TRUE,
        CURLOPT_POSTFIELDS => $parametros,
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_SSL_VERIFYHOST => FALSE,
		CURLOPT_RETURNTRANSFER => TRUE
    ));
	//$fp = fopen('telegram2.txt', 'a');
	//fwrite($fp, curl_exec($ch).'\n');
	//fclose($fp);
	curl_exec($ch);
    curl_close($ch);
}

?>