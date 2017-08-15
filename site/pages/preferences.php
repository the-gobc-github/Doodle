<?php
if (isset($_SESSION['login'])) {
	if (!(isset($_GET['a']))) {
		echo "<div class='menu-preferences'>
			<ul>
				<li><a href='index.php?p=preferences&a=prf_friends'>Mes amis</a></li>
				<li><a href='index.php?p=preferences&a=prf_groups'>Mes groupes</a></li>
				<li><a href='index.php?p=preferences&a=disconnect'>Deconnexion</a></li>
			</ul>
			</div>";
	}

	$a = $_GET['a'];

	switch($a) {

		case 'prf_friends':
			echo "<form class='form-horizontal' method='post' action='?p=backprefs&a=friend_search' class='search'>
				<fieldset>
				<div class='form-group'>
					<label class='control-label' for='friend'>Find your friends by entering their name :</label>
					<input type='text' name='friend' id='friend' size='30' />
				</div>
				<div class='form-group'>
				<input class='btn-primary btn' type='submit' value='Valider' class='valider' />
				</div>
				</fieldset>
				</form>";
			break;

		case 'prf_groups':

			echo "<div class='submenu-prf_groups'>
			<ul>
				<li><a href='index.php?p=preferences&a=create_group'>Creer un groupe</a></li>
				<li><a href='index.php?p=preferences&a=mng_grp'>Gérer mes groupes</a></li>
			</ul>
			</div>";
			break;


		case 'create_group':

			echo "<form class='form-horizontal' method='post' action='?p=backprefs&a=create_grp' class='search'>
				<fieldset>
				<div class='form-group'>
					<label class='control-label' for='group-name'>Donnez un nom à votre groupe !</label>
					<input type='text' name='group-name' id='group-name' size='30' />
				</div>
				<div class='form-group'>
				<input class='btn-primary btn' type='submit' value='Valider' class='valider' />
				</div>
				</fieldset>
				</form>";
			break;

		case 'add_friend':

			echo "<form class='form-horizontal' method='post' action='?p=backprefs&a=add_friend' class='search'>
				<fieldset>
				<div class='form-group'>
					<label class='control-label' for=add-friend>Ajoutez un ami à votre groupe :</label>
					<input type='text' name='add-friend' id='add-friend' size='30' />
				</div>
				<div class='form-group'>
					<label class='control-label' for=group-name>Dans quel groupe ?:</label>
					<input type='text' name='group-name' id='group-name' size='30' />
				</div>
				<div class='form-group'>
				<input class='btn-primary btn' type='submit' value='Valider' class='valider' />
				</div>
				</fieldset>
				</form>";
			break;


	case 'mng_grp':
			echo "<div class='submenu-mng_grp'>
			<ul>
				<li><a href='index.php?p=preferences&a=add_friend'>Ajouter un membre</a></li>
				<li><a href='index.php?p=preferences&a=add_friend'>Créer un évenement</a></li>
				<li><a href='index.php?p=preferences&a=delete_mbr'>Supprimer un membre</a></li>
				<li><a href='index.php?p=preferences&a=delete_grp'>Supprimer un groupe</a></li>
				<li><a href='index.php?p=preferences&a=rename_grp'>Renommer un groupe</a></li>
				<li><a href='index.php?p=preferences&a=rename_grp'>Quitter un groupe</a></li>
			</ul>
			</div>";
			break;

	case 'delete_mbr':
		echo "<form class='form-horizontal' method='post' action='?p=backprefs&a=del_mbr' class='search'>
			<fieldset>
			<div class='form-group'>
				<label class='control-label' for=del-member>Supprimez un ami de l'un de vos groupe :</label>
				<input type='text' name='del-member' id='del-member' size='30' />
			</div>
			<div class='form-group'>
				<label class='control-label' for=group-name>Dans quel groupe ?:</label>
				<input type='text' name='group-name' id='group-name' size='30' />
			</div>
			<div class='form-group'>
			<input class='btn-primary btn' type='submit' value='Valider' class='valider' />
			</div>
			</fieldset>
			</form>";
			break;

	case 'delete_grp':

		echo "<form class='form-horizontal' method='post' action='?p=backprefs&a=del_grp' class='search'>
			<fieldset>
			<div class='form-group'>
				<label class='control-label' for='group-name'>Donnez le nom du groupe à supprimer !</label>
				<input type='text' name='group-name' id='group-name' size='30' />
			</div>
			<div class='form-group'>
			<input class='btn-primary btn' type='submit' value='Valider' class='valider' />
			</div>
			</fieldset>
			</form>";
		break;

	case 'disconnect':
			unset($_SESSION['login']);
			include('../home.php');
			break;

	}
}

else  {
	$content = $user_form->form_connexion();
	echo $content;
}
?>
