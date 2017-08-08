<table class="calendar" align="center" border=1 cellpadding=2>

<tr>

<th>Lundi <th>Mardi <th>Mercredi <th>Jeudi <th>Vendredi <th>Samedi <th>Dimanche

</tr>

<?php

$Daylist = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
$today = getdate();
//stock date and day in vars :
$day = $today['weekday']; //index = 4
$date = $today['mday'];
// get day_idx thanks to day_array ['Monday','Tuesday',...]
$day_idx = array_keys($Daylist, $day);
$rest = $date % 8;
if ($date >= 8) 
{
	if ($day_idx[0] < $rest) {
		$first_day_idx = 7+($day_idx[0] - $rest);
	} 
	else {
		$first_day_idx = $day_idx[0] - $rest;
	}
} 
else {
	$first_day_idx = $day_idx[0] - $rest;
}
$cmt = 1;

for ($i = 1; $i <= 5;$i++) {
	echo "<tr>";
	for ($j = 1; $j <= 7; $j++) {
		echo "<td>";
		$x = ((($i - 1) * 7) + $j);
		if ($x <= 31 && $x > $first_day_idx) {
			echo $cmt;
			$cmt += 1;
		}
		echo "</td>";
	}
	echo "</tr>";
}


