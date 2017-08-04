<table class="calendar" align="center" border=1 cellpadding=2>

<tr>

<th>Sun <th>Mon <th>Tue <th>Wed <th>Thu <th>Fri <th>Sat

</tr>

<?php

// for ($i = 1; $i <= 5;$i++) {
// 	echo "<tr>";
// 	for ($j = 1; $j <= 7; $j++) {
// 		echo "<td>";
// 		$x = ((($i - 1) * 7) + $j);
// 		if ($x <= 31) {
// 			echo $x;
// 		}
// 		echo "</td>";
// 	}
// 	echo "</tr>";
// }

$today = getdate();
print_r($today);


?>