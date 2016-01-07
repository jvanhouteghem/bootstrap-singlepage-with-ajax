<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/dialog.css">

<div class="col-md-12 row--content--articles">
	<div class="panel panel-default">
		<div class="panel-body">

            <h3>Présentation du projet</h3>
 						
			<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel orci dignissim lectus dapibus vestibulum. Suspendisse non felis rhoncus velit sollicitudin condimentum nec quis nisi.</h4>

            <?php echo "Filtre"; ?>

            <div class="col-md-12 --tableFilter">
				<form class="--search" id="targetinput"> 
					<input id="filter" type="text" class="form-control" placeholder="ex : koala australien">
				</form>
			</div>

			<div id="pagination"></div>

		</div>
	</div>
</div>

<script>
    // chargement de la pagination (+ ajax)
    $(document).ready(function($){

    	$("#pagination").load("/quoala/model/donnees/pagination.php"); //load initial records

    });

    // --------------
	//var inputValue = $('#filter').val();

	var delay = (function(){
	  var timer = 0;
	  return function(callback, ms){
	    clearTimeout (timer);
	    timer = setTimeout(callback, ms);
	  };
	})();

	$('#targetinput').keyup(function(event) {
		event.preventDefault();
	    delay(function(){
	    	// fonction apres attente
		 	$("#pagination").load("/quoala/model/donnees/pagination.php?search=" + $('#filter').val());
		 	// fin fonction
	    }, 800 );
	});

    // --------------

	/*$( "#targetinput" ).submit(function( event ) {
	//$( "#targetinput" ).keyup(function( event ) {
		var inputValue = $('#filter').val();
	 	//alert(inputValue);
	 	event.preventDefault();
	 	 $("#pagination").load("/quoala/model/donnees/pagination.php?search=" + inputValue);
	});*/  
		   
	//executes code below when user click on pagination links
	$("#pagination").on( "click", ".pagination a", function (e){
		e.preventDefault();
		
		// equivalent
		//$("#pagination").load("/quoala/model/donnees/pagination.php?p=" + $(this).text());

		$.get( "/quoala/model/donnees/pagination.php?p=" + $(this).text() + "&search=" + $('#filter').val(), function( data ) {
			$('#pagination').empty();
			//alert( data );
			$('#pagination').html(data);
		}); 		 
	});
</script>