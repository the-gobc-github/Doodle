<?php
use Core\Tools\Tools;

$days = array('Lundi', 'Mard', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimance');
$months = array('JAN', 'FEV', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec');
$year = date('Y');
$r = array();
$date = strtotime($year.'-01-01');
while(date('Y', $date) <= $year)
{
  $y = date('Y', $date);
  $m = date('n', $date);
  $d = date('j', $date);
  $w = str_replace('0', '7', date('w', $date));
  $r[$y][$m][$d] = $w;
  $date = strtotime(date('Y-m-d', $date).' + 1 DAY');
}
$dates = $r;
echo $dates;
$grouparray = array('1','2','3');
$tools = new Tools();
echo $tools->test();
?>
<div class="main">
<div class="menu">
<a href="#" class="active">Groups</a>
<?php foreach ($grouparray as $value) {
?>
<a href="#">Link <?php echo $value;?></a>
  <?php
  }
?>
