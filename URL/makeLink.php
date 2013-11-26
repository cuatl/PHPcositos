<?php
/*
* crea un enlace a partir de un texto,
* makeLink(cadena);
* ejemplo:
* echo makeLink('El atún está muy caro, habrá que comer camarones cuando sea tiempo aún.');
* # devuelve: el-atun-esta-muy-caro-habra-que-comer-camarones-cuando-sea-tiempo-aun
*/
function makeLink() {
   @$txt=func_get_arg(0);
   if(empty($txt)) return null; // viene vacío?
   $clean = iconv('UTF-8', 'ASCII//TRANSLIT', strip_tags($txt));
   $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
   $clean = strtolower(trim($clean, '-'));
   $clean = preg_replace("/[\/_|+ -]+/",'-', $clean);
   return $clean;
}
?>
