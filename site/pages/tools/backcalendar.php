<?php
$a = $_GET['a'];
switch ($a) {
// ajouter une disponibilite sur une journee 
// expect GET.day + GET.user + GET.group
	    case 'addevent':
	    if ($_GET['day'] != NULL && $_GET['userid'] != NULL && $_GET['group'] != NULL)
		{
				$day = $_GET['day'];
				$userid = $_GET['userid'];
				$group = $_GET['group'];
				try {
							$res = $db->query('INSERT INTO days (days, userid, groups) VALUES(:days, :userid, :groups)', array(
									':days' => $day,
									':userid' => $userid,
									':groups' => $group
											));
							echo "colin";							
							// header('Location: index.php?p=calendar&success=1');
					}
					catch(Exception $e)
					{
							die('Erreur : '.$e->getMessage());
					}
		}
        break;
// supprimer une disponibilite sur une journee 
// expect GET.day + GET.user
		case "delete":
			if ($_GET['id'] != NULL && $_GET['userid'] != NULL) 
			{
				$userid = $_GET['userid'];
				$id = $_GET['id']; 
				$statement = "DELETE FROM `days` WHERE `id`='$id' AND `userid`='$userid'";
    			$db->simple_query($statement);		
				echo "colin";
    		}
    		else {
    			echo "ERROR";
    		}
    		break;
// obtenir un objet de toutes les disponilites d'un groupe 
//	expect GET.groupid
		case "get_groups":
			if (isset($_SESSION['login'])) 
			{
				$userid = $_GET['userid'];
				$id = $_GET['id']; 
				$statement = "DELETE FROM `days` WHERE `id`='$id' AND `userid`='$userid'";
    			$db->simple_query($statement);		
				echo "colin";
    		}
    		else {
    			echo "ERROR";
    		}
						break;
}
?>
