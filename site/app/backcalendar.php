<?p
switch ($GET['a']) {
	// ajouter une disponibilite sur une journee 
	// expect GET.day + GET.user + GET.group
	    case 'addevent':
	    if ($_GET['day'] != NULL && $_GET['userid'] != NULL && $_GET['group'] != NULL)
		{
				$day = $_GET['day'];
				$userid = $_GET['userid'];
				try {
							$res = $db->query('INSERT INTO days (day, userid, group) VALUES(:day, :userid, :group)', array(
									':day' => $day,
									':userid' => $userid,
									':group' => $group
											));
							
							header('Location: index.php?p=calendar');
					}
					catch(Exception $e)
					{
							die('Erreur : '.$e->getMessage());
					}
			}

        break;
    // supprimer une disponibilite sur une journee 
    // expect GET.day + GET.user
		case 'delete_ev':

						break;
	// obtenir un objet de toutes les disponilites d'un groupe 
	//	expect GET.groupid
		case 'get_elem':
			//to implement
						break;
}
?>
