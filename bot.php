<?php

require "config.php";
require "funcoes.php";

$dados = json_decode(file_get_contents('php://input'), true);
$link = "https://api.telegram.org/bot".$token;

$msg = $dados['message']['text'];

if((stristr($msg, $nome) || $dados['message']['chat']['type'] == "private") && !isCommand($msg)){

    //    Entra no IF se:
    //    (O nome for citado num grupo ou a mensagem vier do chat privado) e (a mensagem não for um comando)

    $resp = file_get_contents('http://www.ed.conpet.gov.br/cgi-bin/bot_gateway.cgi?server=bot.insite.com.br:8085&pure=1&msg='.rawurlencode(str_replace($nome,'Ed',strtolower($msg))));

    $params = array(
            'chat_id' => $dados['message']['chat']['id'],
            'text'   => str_replace('Ed', ucfirst($nome), strip_tags($resp)),
            'reply_to_message_id' => $dados['message']['message_id']
    );

    request("sendMessage", $params);
}

?>