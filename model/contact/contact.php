<div class="col-md-12 row--content--articles">
	<div class="panel panel-default">
		<div class="panel-body">
			<h3>Presentation du projet</h3>
			<h4 class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel orci dignissim lectus dapibus vestibulum. 
								Suspendisse non felis rhoncus velit sollicitudin condimentum nec quis nisi. Morbi malesuada porta elit, eget pulvinar sem ultrices in.
			</h4>
			<br>
			<form method="post" name="Form" action="" id="idform"><!--<form method="post" name="Form" action="" id="idform">-->
				<div class="row">
					<div class="col-md-6" id="divInputName">
						<input type="text" class="form-control inside-form-rewidth inside-form-background" id="InputName" placeholder="Votre Nom" name="inputName">
					</div>
					<div class="col-md-6">
						<input type="email" class="form-control inside-form-background" id="inputEmail" placeholder="Votre mail" name ="inputEmail">
					</div>
					<div class="col-md-12">
						<br>
						<div class="controls">
							<textarea id="inputMessage" name="inputMessage" class="form-control inside-form-background" placeholder="Votre message" rows="5"></textarea>
						</div>
						<div class="hidden-div">
							<p class="hidden-p arrow_box" id="msg-ok">
								Votre message a bien été envoyé, merci.
							</p>
							<p class="hidden-error arrow_box_error" id="msg-error">
								Erreur, le formulaire est incomplet.
							</p>											
						</div>
					</div>
				</div>
				<div class="hidden-submit-button">
					<input id="show" type="" class="custom-button" value="Valider"><!--<input id="show" type="submit" class="custom-button" value="Valider">-->
				</div>
			</form>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			
<script>
	// Display hidden box when submit
	$("#show").click(function(event){ 
		$a = document.forms["Form"]["inputName"];
		$b = document.forms["Form"]["inputEmail"];
		$c = document.forms["Form"]["inputMessage"];
			
		if ($a.value!=null && $a.value!="" && $b.value!=null && $b.value!="" && !($b.value.indexOf('@') === -1) && !($b.value.indexOf('.') === -1) && $c.value!=null && $c.value!=""){
			console.log($("#inputname").css);
			$("#msg-ok").show(400).delay(3000).hide(400); // qu'il disparaisse quand clic dans la box message
			$("divInputName").css("background-color", "yellow");
		}
		else{
			$("#msg-error").show(400).delay(3000).hide(400);
			event.preventDefault();
		}
	});
</script>