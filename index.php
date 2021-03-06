<?php
session_start();
require('partials/classes/Character.php');
require('partials/classes/CharacterChildren.php');
require('partials/classes/CharacterManager.php');
require('partials/classes/CombatLogs.php');
require('partials/classes/CombatLogsManager.php');
require('partials/connexion-bdd.php');

$charManager = new CharacterManager($bdd);
$logsManager = new CombatLogsManager($bdd);
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/styles.css">
	<title>Combat Gaymu</title>
    </head>


    <body>

	<body>
	    <?php require('partials/navbar.php'); ?>
	    <main>
		<section class="container-char-lists">
		    <?php if (isset($_SESSION['userId'])): ?>
			<div class="block-players d-flex justify-content-start align-items-center">
			    <div class="list-players">
				<h3>Mes personnages</h3>
				<div class="list-group">
				    <?php require('processing/create_list_characters_connected_user.php');?>
				</div>
			    </div>
			</div>

			<!-- <script src="assets/js/combat.js"></script> Pourquoi y a un script en plein milieu ? -->
		    <?php endif; ?>

		    <div class="block-players d-flex justify-content-start align-items-center">
			<div class="list-players">
			    
			    <?php if (isset($_SESSION['userId'])): ?>
				<h3>Choisi un personnage à attaquer</h3>
			    <?php endif; ?>
			    
			    <div class="list-group">

				<?php
				if (isset($_SESSION['userId'])) require('processing/create_list_all_character_exceptUser.php');
				else require('processing/create_list_all_character.php');
				?>

			    </div>
			</div>
		    </div>
		</section>

		<!-- 
		     ####    ##   #####  #####   ####  
		     #    #  #  #  #    # #    # #      
		     #      #    # #    # #    #  ####  
		     #      ###### #####  #    #      # 
		     #    # #    # #   #  #    # #    # 
		     ####  #    # #    # #####   ####  
		-->

		<section id="container-cards-and-log">
		    <div id="cards">
			<div id="attacker">

			</div>
			
			<div class="button-attack">
			    <button>
				<img alt="attaquer !" src="/assets/img/swords.png"/>
			    </button>
			</div>

			
			<div id="attacked">

			</div>
		    </div>
		</section>

		<section id="container-cards-and-log">
		    <div id="cards">
			<div id="attacker">
			    <!-- Filled with JS -->
			</div>

			<div class="button-attack">
			    <button>
				<img alt="attaquer !" src="/assets/img/swords.png" />
			    </button>
			</div>

			<div id="attacked">
			    <!-- Filled with JS -->
			</div>
		    </div>

		    <div id="combat-log">
			<!-- Filled with JS -->
		    </div>
		</section>
	    </main>

	    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	    <script src="assets/js/combat.js"></script>    
	    <script src="assets/js/script.js"></script>
	</body>
</html>
