<?php 

function getAcceuil()
{
   $acceuil = '';
   return $acceuil;
}

function getPresentation()
{
   $acceuil = '';
   return $acceuil;
}

function getDonnees()
{
   $acceuil = '';
   return $acceuil;
}

function getContact()
{
   $acceuil = '';
   return $acceuil;
}

function getTopMenu() {
    $topMenu = 	'
    	<div class="col-md-12 row--header">
			<div class="col-md-7 col--centered" name="header">
				<nav class="navbar navbar-inverse">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>                        
						</button>
						<a class="navbar-brand" href="#"><img alt="Brand" src="img/logo.jpg" alt="Smiley face" class=""></a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav navbar-right">
							<li><a id ="goAcceuilFromTopMenu" href="'. getAcceuil() .'">Acceuil</a></li>
							<li><a id ="goPresentationFromTopMenu" href="'. getPresentation() .'">Présentation</a></li>
							<li><a id ="goDonneesFromTopMenu" href="'. getDonnees() .'">Données</a></li>
							<li><a id ="goContactFromTopMenu" href="'. getContact() .'">Contact</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>';
    echo $topMenu;
}

function getSideMenu(){
	$sideMenu = '	
		<div class="col-md-3  hidden-xs hidden-sm" name="secondary-menu">
			<ul class="nav nav-pills nav-stacked row--content--secondarymenu">
				<li role="empty"></li>
				<li role="presentation" class="active">ACCÈS DIRECT</li>
				<li role="presentation"><a id ="goAcceuilFromSideMenu" href="'. getAcceuil() .'"><img src="img/menu-home.png" alt="1"> Acceuil</a></li>
				<li role="presentation"><a id ="goPresentationFromSideMenu" href="'. getPresentation() .'"><img src="img/menu-prez.png" alt="1"> Présentation</a></li>
				<li role="presentation"><a id ="goDonneesFromSideMenu" href="'. getDonnees() .'"><img src="img/menu-datas.png" alt="1"> Données</a></li>
				<li role="presentation"><a id ="goContactFromSideMenu" href="'. getContact() .'"><img src="img/menu-rss.png" alt="1"> Contact</a></li>
			</ul>
		</div>';
	echo $sideMenu;	
}

?>

