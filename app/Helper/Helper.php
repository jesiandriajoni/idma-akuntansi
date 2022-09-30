<?php
function formatRp($angka){
    $rupiah ="Rp ".number_format($angka,0,',','.');
    return $rupiah;
}

function figureRomawi($angka)
    {
     $index = intval($angka)-1;
     $result = '';


     $array = array("I","II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
    //  foreach($arrat as $roman => $value){
    //   $matches = intval($angka/$value);
    //   $result .= str_repeat($roman,$matches);
    //   $angka = $angka % $value;
    //  }
     return $array[$index];
    }

    function kurung($angka,$format){
        if($angka < 0){
            return "( ". str_replace('-','',$format) ." )";
        }
        return $format;
    }
?>
