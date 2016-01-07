<table class="table table-striped">
	<tbody class="searchable" id="autoInsert">

	<?php require '../bdd/bdd_rows.php'; ?>

	</tbody>
</table>

<div class="--pagination">
	<ul class="pagination pagination-lg pager" id="myPager">
	<?php
		$search = "";
		if(isset($_GET["search"])) {
			$search = $_GET["search"];
		}

		echo "<a href='index.php?p=1&search=". $search . "'>début</a>";
		for ($i=1;$i<=$nbPage;$i++){
			if ($i == $cPage){ 
				echo " $i |";
			}
			else {
				echo " <a href=\"index.php?p=$i&search=". $search ."\">$i</a> |";
			}
		}
		echo " <a href='index.php?p=1&search=". $search ."'>fin</a>";						 
	?>
	</ul>
</div>

<div id="dialog" class="dialog">	
	<div class="col-md-12">
		<div class="col-md-6">
			<img src="/quoala/img/pedokoala_small.jpg">
		</div>
		<div class="col-md-6">
			<h2 class="dialog-title"></h2>
			<p class="dialog-pays"></p>
			<p class="dialog-date"></p>
			<p class="dialog-infos"></p>
		</div>
	</div>
</div>	

<script>
	$(document).ready(function($) {

		$('#dialog').hide();

		$(".clickable-row").click(function() {

			$('.dialog-title').empty();
			$('.dialog-pays').empty();
			$('.dialog-pays').html('Chargement <img src="img/ajax-loader.gif">');
			$('.dialog-date').empty();
			$('.dialog-infos').empty();

			var currentRowId = $(this).children(":first").text()
	    	$( "#dialog" ).dialog({
		      	autoOpen: true,
		      	show: {
		      		effect: "slide",
		     		duration: 350
		    	},
		        hide: {
		        	effect: "fold",
		        	duration: 500
		      	},
		      	open: function( event, ui ) {
		      		$.ajax({
					  url: "/quoala/model/bdd/bdd_dialog.php",
					  data: {id: currentRowId, xhr: 1},
					  dataType: 'json'
					}).done(function(data) {
					 	$('.dialog-title').text(data[1]);
					 	$('.dialog-pays').text("Localisation : " + data[2]);
					 	$('.dialog-date').text("Date : " + data[3]);
					 	$('.dialog-infos').text("Infos : " + data[4]);
					});
		      	}
	    	});
	    	 
	    	// ---     
		});
	});


</script>					