<?php

require "config.php";
require "funcoes.php";

$dados = json_decode(file_get_contents('php://input'), true);
$link = "https://api.telegram.org/bot".$token;

$msg = $dados['message']['text'];

////// Ele só responde quando citado na mensagem
if(stristr($msg, $nome)){
    $resp = file_get_contents('http://ed.conpet.gov.br:8085/?msg='.rawurlencode(str_replace($nome,'Ed',strtolower($msg))));

    $params = array(
            'chat_id' => $dados['message']['chat']['id'],
            'text'   => str_replace('Ed', ucfirst($nome), strip_tags($resp)),
            'reply_to_message_id' => $dados['message']['message_id']
    );

    request("sendMessage", $params);
}

?>