<div class="month">
  <ul>
  <li class="prev"><a class='slide' href ='index.php?p=calendar/show&a=prev&m=<?php echo $variables['month'];?>&y=<?php echo $variables['year'];?>'>&#10094</a></li>
  <li class="next"><a class='slide' href ='index.php?p=calendar/show&a=next&m=<?php echo $variables['month'];?>&y=<?php echo $variables['year'];?>'>&#10095</a></li>
    <li>
      <br>
	  <?php echo $variables['month'];?><br>
      <span style="font-size:18px"><?php echo $variables['year'];?></span>
    </li>
  </ul>
</div>
<?php echo $variables['weekdays'];?>
<?php echo $variables['calendar'];?>

