<?php 

	$auth = new GoogleAuth();
	$auth->logout();
  $_SESSION['nombreUsuario'] = "";
  $_SESSION['idUsuario'] = -1;
	//header('Location: index.php');
 ?>
<script>
 (function() { 
 	if( window.localStorage ) {
  		if( !localStorage.getItem('firstLoad') ) {
  			localStorage['firstLoad'] = true; window.location.reload();
  		} 
  		else 
    		localStorage.removeItem('firstLoad');
  	}
  })(); 
</script>

 <main role="main" class="container">

    <div class="starter-template">
        <h1>Hasta luego</h1>
        <p class="lead">Esperamos que hayas disfrutado de la página.</p>



    </div>
</main>
