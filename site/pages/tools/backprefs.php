<?php
	session_start();
	$a = $_GET['a'];
	switch($a) {

	case 'disconnect':
		unset($_SESSION['login']);
		include('../home.php');
		break;

	case 'prf_friends':
		 if (isset($_SESSION['login'])) {
			echo "<form class='form-horizontal' method='post' action='?p=backprefs&a=friend_search' class='search'>
				<fieldset>
				<div class='form-group'>
					<label class='control-label' for='friend'>Find your friends by entering their name :</label>
					<input type='text' name='friend' id='friend' size='30' />
				</div>
				</fieldset>
			</form>";
		 }
		 break;

	case 'friend_search':
		if (isset($_SESSION['login'])) {
			if (isset($_POST['friend'])) {
				$friend = $_POST['friend'];
				$statement = "SELECT * FROM `users` WHERE `login`='$friend'";
				$res = $db->query($statement);
				$member_id = 5;
				$friend_id = 7;
				try {
				$res2 = $db->query('INSERT INTO friends (member_id, friend_id) VALUES (:m, :f)', array(
								':m' => $member_id,
								':f' => $friend_id
								));
				}
				catch(Exception $e)
				{
						die('Erreur : '.$e->getMessage());
				}
			}
		}
		break;
}
?>
