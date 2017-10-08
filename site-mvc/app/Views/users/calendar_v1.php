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
/* echo $dates; */
$grouparray = array('1','2','3');
$tools = new Tools();
/* echo $tools->test(); */
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

 </div>
 <div class="calendar">
 <div class="periods">
 <div class="year">
   <?php echo $year ?>
 </div>
 <div class="months">
   <ul class="pagination pagination-lg">
     <?php foreach ($months as $id=>$m): ?>
       <li><a href="#" id="linkMonth<?php echo $id + 1?>"><?php echo utf8_encode($m)?></a></li>
     <?php endforeach; ?>
   </ul>
 </div>
 <?php $dates = current($dates);?>
 <?php foreach($dates as $m=>$days):?>
   <div class="month" id="month<?php echo $m?>">
     <table class="table table-bordered">
       <thead>
         <tr >
           <?php foreach ($date->days as $d): ?>
             <th class="table-active"><?php echo substr($d, 0, 3); ?></th>
           <?php endforeach; ?>
         </tr>
       </thead>
       <tbody>
         <tr>
           <?php $end = end($days); foreach ($days as $d=>$w): ?>
             <?php if ($d == 1): ?>
               <td  colspan="<?php echo $w-1; ?>"</td>
             <?php endif; ?>
             <td>
               <div class="relative">
                 <?php echo$d; ?>
               </div>
             </td>
             <?php if ($w == 7): ?>
         <tr/><tr>
             <?php endif; ?>
         <?php endforeach; ?>
         <?php if ($end != 7): ?>
           <td colspan="<?php echo 7-$end?>"></td>
         <?php endif; ?>
         </tr>
       </tbody>
     </table>
   </div>
<?php endforeach;
include('../public/js/calendar.js');

?>
</div>
</div>
</div>
