<?php

namespace App;

class Date{

  var $days = array('Lundi', 'Mard', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimance');
  var $months = array('Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre');

  function getAllDays($year){
      $r = array();
      $date = strtotime($year.'-01-01');
      while(date('Y', $date) <= $year)
      {
        $y = date('Y', $date);
        $m = date('n', $date);
        $d = date('j', $date);
        $w = str_replace('0', '7', date('w', $date));
        $r[$y][$m][$d] = $w;
        $date = strtotime(date('Y-m-d', $date).' +1 DAY');
      }
      return $r;
  }
}
?>
