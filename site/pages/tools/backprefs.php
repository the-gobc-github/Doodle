<?php
session_start();
$a = $_GET['a'];
switch($a) {

	case 'friend_search':
		if (isset($_SESSION['login'])) {
			if (isset($_POST['friend'])) {
				$friend = $_POST['friend'];
				$member = $_SESSION['login'];
				$statement = "SELECT `id` FROM `users` WHERE `login`='$friend'";
				$statement2 = "SELECT `id` FROM `users` WHERE `login`='$member'";
				$res = $db->query($statement);
				$res2 = $db->query($statement2);
				$friend_id = intval(array_pop(array_values($res))->id);
				$member_id = intval(array_pop(array_values($res2))->id);
				try {
				$res3 = $db->query('INSERT INTO friends (member_id, friend_id) VALUES (:m, :f)', array(
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

	case 'create_grp':
		if (isset($_SESSION['login'])) {
			if (isset($_POST['group-name'])) {
				$member = $_SESSION['login'];
				$group = $_POST['group-name'];
				/* var_dump($member); */
				/* var_dump($group); */
				$statement = "SELECT `id` FROM `users` WHERE `login`='$member'";
				$res = $db->query($statement);
				$member_id = array_pop(array_values($res))->id;
				/* var_dump($member_id); */
				#create group
				$statement = "INSERT INTO `groups` (`name`,`admin`,`members`) VALUES (:n,:a,:m)";
				try {
				$res = $db->query($statement, array(':n' => $group,
					':a' => $member_id,
					':m' => $member_id . ','));
								}
				catch(Exception $e)
				{
						die('Erreur : '.$e->getMessage());
				}

				#get group id
				$statement2 = "SELECT `id` FROM `groups` WHERE `name`='$group' AND `admin`='$member_id'";
				try {
				$res2 = $db->query($statement2);
				}
				catch(Exception $e)
				{
						die('Erreur : '.$e->getMessage());
				}
				$group_id = array_pop(array_values($res2))->id;
				/* var_dump($group_id); */

				#add user association
				$statement = "SELECT `grouplist` FROM `users` WHERE `id`='$member_id'";
				try {
				$res = $db->query($statement);
				}
				catch(Exception $e)
				{
						die('Erreur : '.$e->getMessage());
				}
				$grouplist = array_pop(array_values($res))->grouplist;
				/* var_dump($grouplist); */

				$added_grp = $grouplist . $group_id . ',';
				/* var_dump($added_grp); */
				$statement = "UPDATE users SET grouplist = :a WHERE id='$member_id'";
				try {
				$res = $db->query($statement, array(':a' => $added_grp ));
				}
				catch(Exception $e)
				{
						die('Erreur : '.$e->getMessage());
				}

				unset($_GET);
				include('../pages/preferences.php');
			}
		}
	break;

	case 'add_friend':
		if (isset($_SESSION['login'])) {
			if ((isset($_POST['group-name'])) && (isset($_POST['add-friend']))) {
				$member = $_SESSION['login'];
				$group = $_POST['group-name'];
				$friend = $_POST['add-friend'];
				#
				#get member id
				$statement = "SELECT `id` FROM `users` WHERE `login`='$member'";
				$res = $db->query($statement);
				$member_id = array_pop(array_values($res))->id;
				#
				/* #get member groups */
				$statement = "SELECT `grouplist` FROM `users` WHERE `id`='$member_id'";
				$res = $db->query($statement);
				$grouplist = array_pop(array_values($res))->grouplist;
				var_dump($grouplist);

				$parts = explode(',', $grouplist);
				/* var_dump($parts); */
				$group_id = False;
				foreach($parts as $value) {
					$statement = "SELECT `admin` FROM `groups` WHERE `name`='$group' AND `id`='$value'";
					$res = $db->query($statement);
					$admin_id = array_pop(array_values($res))->admin;
					if ($admin_id == $member_id) {
					$group_id = $value;
						}
					}

				if ($group_id != False) {
					#get friend id
					$statement = "SELECT `id` FROM `users` WHERE `login`='$friend'";
					$res = $db->query($statement);
					$friend_id = array_pop(array_values($res))->id;
					#
					#add friend to group
					$statement = "SELECT `members` FROM `groups` WHERE `id`='$group_id'";
					$res = $db->query($statement);
					$mbrs_list = array_pop(array_values($res))->members;
					$all_mbrs = $mbrs_list . $friend_id . ',';

					$statement = "UPDATE groups SET members = :f WHERE id='$group_id'";
					try {
					$res = $db->query($statement, array(':f' => $all_mbrs ));
					}
					catch(Exception $e)
					{
							die('Erreur : '.$e->getMessage());
					}

				/* 	#add user association */
					$statement = "SELECT `grouplist` FROM `users` WHERE `id`='$friend_id'";
					$res = $db->query($statement);
					$grp_list = array_pop(array_values($res))->grouplist;
					$all_grps = $grp_list . $group_id . ',';

					$statement = "UPDATE users SET grouplist = :f WHERE id='$friend_id'";
					try {
					$res = $db->query($statement, array(':f' => $all_grps ));
					}
					catch(Exception $e)
					{
							die('Erreur : '.$e->getMessage());
					}

					/* unset($_GET); */
					/* include('../pages/tools/preferences'); */
				}
			else {
				echo 'Aucun de vos groupe ne possède ce nom';
			}
			}
		}

		break;

}
?>
