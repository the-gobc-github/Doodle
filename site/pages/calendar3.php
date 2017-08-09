<?php
  $year = date('Y');
  $dates = $date->getAllDays($year);

?>

<div class="periods">
  <div class="year">
    <?php echo $year ?>
  </div>
  <div class="months">
    <ul >
      <?php foreach ($date->months as $id=>$m): ?>
        <li><a href="#" id="linkMonth<?php echo $id + 1?>"><?php echo utf8_encode($m)?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <?php $dates = current($dates);?>
  <?php foreach($dates as $m=>$days):?>
    <div class="month" id="month">
      <table>
        <thead>
          <tr>
            <?php foreach ($date->days as $d): ?>
              <th><?php echo substr($d, 0, 3); ?></th>
            <?php endforeach; ?>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php $end = end($days); foreach ($days as $d=>$w): ?>
              <?php if ($d == 1): ?>
                <td colspan="<?php echo $w-1; ?>"</td>
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
<?php endforeach;?>
</div>
<?php
include('../app/js/calendar.js');
 ?>
