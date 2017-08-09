<?php
if (isset($_SESSION['login'])) {
echo "<div class='menu-preferences'>
	<ul>
		<li><a href='index.php?p=backprefs&a=prf_friends'>Mes amis</a></li>
		<li><a href='index.php?p=backprefs&a=prf_groups'>Mes groupes</a></li>
		<li><a href='index.php?p=backprefs&a=prf_account'>Mon compte</a></li>
		<li><a href='index.php?p=backprefs&a=disconnect'>Deconnexion</a></li>
	</ul>
	</div>";
}
if (!isset($_SESSION['login'])) {
	$content = $user_form->form_connexion();
	echo $content;
}
?>
