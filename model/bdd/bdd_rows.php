<?php
	// --- nbre de pages
	$conn = new PDO('mysql:host=localhost;dbname=animal;charset=utf8', 'root', '');

	if(isset($_GET["search"])) {
		$searchb = $_GET["search"];
		$sql = 'SELECT count(*) as somme from quoala where pays like "' . $searchb .'%" or espece like"' . $searchb .'%" or id like"' . $searchb .'%" or lastdate like"' . $searchb .'%"';
	}
	else{
		$sql = 'SELECT count(*) as somme from quoala' ;
	}
																	 
	$q = $conn->query($sql);
	$q->setFetchMode(PDO::FETCH_ASSOC);

	$nbArt = "";
	while ($tmpgkcl = $q->fetch()){
		$nbArt = htmlspecialchars($tmpgkcl['somme']);
	}
	// --- row
	$perPage = 6;
	$nbPage = ceil($nbArt/$perPage);									 
	// regarde si la var existe dans l'url
	if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPage){
		$cPage = $_GET['p'];
	}
	else {
		$cPage = 1;
	}
	$conn = new PDO('mysql:host=localhost;dbname=animal;charset=utf8', 'root', '');

	if(isset($_GET["search"])) {
		$searchc = $_GET["search"];
		$sql = 'SELECT id, espece, pays, DATE_FORMAT(lastdate,\'%d-%m-%Y\') as lastdate from quoala where pays like "' . $searchc .'%" or espece like"' . $searchc .'%" or id like"' . $searchc .'%" or lastdate like"' . $searchc .'%" LIMIT '.(($cPage-1)*$perPage).','.$perPage;
	}
	else{
		$sql = 'SELECT id, espece, pays, DATE_FORMAT(lastdate,\'%d-%m-%Y\') as lastdate from quoala LIMIT '.(($cPage-1)*$perPage).','.$perPage;
	} 

	$q = $conn->query($sql);
	$q->setFetchMode(PDO::FETCH_ASSOC);  

	while ($r = $q->fetch()){
		echo '<tr class ="clickable-row">'.'<td>'.htmlspecialchars($r['id']).'<td>'.htmlspecialchars($r['espece']).'</td>'.'<td>'.htmlspecialchars($r['pays']).'</td>'.'<td>'.htmlspecialchars($r['lastdate']).'</td>'.'</tr>';
	}
								 
?>