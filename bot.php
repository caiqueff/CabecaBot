<?php

require "config.php";
require "funcoes.php";

$dados = json_decode(file_get_contents('php://input'), true);
$link = "https://api.telegram.org/bot".$token;

?>