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


    private function identifica(){}

    private function organiza_genotipo($a, $b){
        if (ctype_upper($a)){
            return $a . $b;
        } elseif ($b != '?') {
            return $b . $a;
        } else {
            return $a . $b;
        }
    }

    private function abre($str){
        $str = str_split($str);
        $n_str = [];
        foreach ($str as $key => $s){
            if ($s == '?'){
                if ($key == 0){
                    $n_str[] = 'A';
                    $n_str[] = 'a';
                } else {
                    $n_str[] = $n_str[0];
                }
                $n_str[] = 'A';
                $n_str[] = 'a';
            } else {
                $n_str[] = $s;
            }
        }

        return $n_str;
    }

    private function abre_feno($str){
        $str = str_split($str);
        $n_str = [];
        foreach ($str as $key => $s){
            if ($s == '?'){
                $n_str[] = $n_str[0] . 'a';
                $n_str[0] = $n_str[0] . 'A';
            } elseif ($key < 1) {
                $n_str[] = $s;
            } else{
                $n_str[0] .= $s;
            }
        }

        return $n_str;
    }

    public function calcula_simples(){
        $mae = $this->abre($this->mae[0]);
        $pai = $this->abre($this->pai[0]);

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

    public function retorna(){
        if (count($this->pai) == 1 and count($this->mae) == 1){
            if (strlen($this->pai[0]) == 2 and strlen($this->mae[0]) == 2 ){
                $calc = $this->calcula_simples();

                $list = [];

                foreach ($this->caracteristica as $carac){
                    $fenotipo  = $carac['feno'];
                    $genotipos = $carac['geno'];
                    $i = 0;
                    foreach ($genotipos as $geno){
                        foreach ($this->abre_feno($geno) as $g){
                            foreach ($calc as $key => $val){
                                if ($key == $g){
                                    $i += $val;
                                }
                            }
                        }
                    }
                    $list[$fenotipo] = round($i*100,1);
                }

                echo json_encode($list);
            }
        }
    }
}

/*$array = [
      [
          "feno" => "Sem Cova",
        "geno" => ["A?"]
      ],
        [
                "feno" => "Com Cova",
        'geno' => ["aa"]
      ]
    ];

$a = new Calculadora($array, ['AA'], ['aa']);

//var_dump($a->calcula_simples());
echo "\n";
$a->retorna();*/