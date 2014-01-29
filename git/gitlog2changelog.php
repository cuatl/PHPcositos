<?php
   /*
   * Jorge Martínez Mauricio <gz@tar.mx>
   * crea un archivo ChangeLog (salida en pantalla) a partir de git-log.
   */
   setlocale(LC_ALL,'es_MX.utf-8');
   $cmd = "git --no-pager log --date=short";
   $cmd = `$cmd`;
   $datos = explode("Date: ",$cmd);
   $data = array();
   foreach($datos AS $k) {
      $v = explode("\n",$k);
      if(!preg_match("/([0-9]{4}\-)/",trim($v[0]))) continue;
      foreach($v AS $y=>$z) {
         $z=trim($z);
         if($y == 0||empty($z)) continue;
         if(preg_match("/^commit|Author:\s/",$z)) continue;
         $data[ trim($v[0]) ][] = $z;
      }
   }
   echo "# ChangeLog\n\n";
   foreach($data AS $k=>$v) {
      echo strftime("**%A %d de %B, %Y**",strtotime($k))."\n\n";
      foreach($v AS $j) {
         echo "* ".$j."\n";
      }
      echo "\n";
   }
?>

