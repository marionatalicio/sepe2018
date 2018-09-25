<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 24/09/18
 * Time: 21:27
 */

class Calculadora
{
    private $caracteristica;
    private $pai;
    private $mae;
    private $fam_pai;
    private $fam_mae;

    /**
     * Calculadora constructor.
     * @param $caracteristica
     * @param $pai
     * @param $mae
     * @param $fam_pai
     * @param $fam_mae
     */
    public function __construct($caracteristica, $pai, $mae, $fam_pai = [], $fam_mae = [])
    {
        $this->caracteristica = $caracteristica;
        $this->pai = $pai;
        $this->mae = $mae;
        $this->fam_pai = $fam_pai;
        $this->fam_mae = $fam_mae;
    }


    public function identifica(){}

    public function organiza_genotipo($a, $b){
        if (ctype_upper($a)){
            return $a . $b;
        } elseif ($b != '?') {
            return $b . $a;
        } else {
            return $a . $b;
        }
    }

    public function abre($str){
        $str = str_split($str);
        $n_str = [];
        foreach ($str as $s){
            if ($s == '?'){
                $n_str[] = 'A';
                $n_str[] = 'a';
            } else {
                $n_str[] = $s;
            }
        }

        return $n_str;
    }

    public function calcula_simples(){
        $mae = $this->abre($this->mae);
        $pai = $this->abre($this->pai);

        $list = [];

        foreach ($mae as $m){
            foreach ($pai as $p){
                $list[] = $this->organiza_genotipo($m, $p);
            }
        }

        $resul = [];

        foreach ($list as $li){
            $i = 0;
            $verifica = true;
            foreach ($list as $lii){
                if ($li == $lii){
                    $i++;
                }
            }

            foreach ($resul as $key => $value){
                if ($li == $value){
                    $verifica = false;
                }
            }


            if ($verifica){

                $resul[$li ] = $i/count($list);
            }
        }

        return $resul;
    }
}

$a = new Calculadora([], 'A?', 'Aa');

var_dump($a->calcula_simples());