<table class="calendar" align="center" border=1 cellpadding=2>

<tr>

<th>Lundi <th>Mardi <th>Mercredi <th>Jeudi <th>Vendredi <th>Samedi <th>Dimanche

</tr>

<?php

for ($i = 1; $i <= 5;$i++) {
	echo "<tr>";
	for ($j = 1; $j <= 7; $j++) {
		echo "<td>";
		$x = ((($i - 1) * 7) + $j);
		if ($x <= 31) {
			echo $x;
		}
		echo "</td>";
	}
	echo "</tr>";
}

$today = getdate();
print_r($today);

$Monthlist = array("Janvier",
	"Février",
	"Mars",
	"Avril",
	"Mai",
	"Juin",
	"Juillet",
	"Août",
	"Septembre",
	"Octobre",
	"Novembre",
	"Décembre");

?>

<a href="index.php?p=backcalendar&day=1&userid=1&group=1">COLIN</a>>