<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 24/09/18
 * Time: 19:45
 */

$caminho = '../../data/data.json';
require_once '../model.php';
require_once 'Calculadora.php';

if (isset($_POST['acao'])){
    $acao = $_POST['acao'];
} else {
    $acao = 'padrao';
}
switch ($acao){
    case 'fenotipos':
        $list = [];
        foreach ($data as $key => $value){
            if ($key == $_POST['vals']){
                $list[] = $value['caracteristicas'];
            }
        }
        $list = $list[0];

        $vals = json_encode($list);
        header("Conten-type: application/json");
        echo $vals;
        break;

    case  'enviar':
        $mae = $_POST['vals']['mae'];
        $pai = $_POST['vals']['pai'];

        $calculadora = new Calculadora($data[$_POST['vals']['carac']]['caracteristicas'], $pai, $mae);
        header("Conten-type: application/json");
        $calculadora->retorna();
        break;

}