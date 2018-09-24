<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 24/09/18
 * Time: 19:45
 */

$caminho = 'data/data.json';

$data = json_decode(file_get_contents($caminho), true);

if (isset($_POST['acao'])){
    $acao = $_POST['acao'];
} else {
    $acao = 'padrao';
}

switch ($acao){
    case 'fenotipos':

}