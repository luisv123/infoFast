	<?php 

		include '../plantillas/inicio.php';

	?>
<br><br><br><br>
<div id="users">
	<h1 style="text-align: center;"><i class="fas fa-spinner fa-pulse"></i></h1>
	<button onclick="iniciar()"></button>
</div>

	<script>
		function iniciar(){
				
				var varse = new XMLHttpRequest();
				varse.onreadystatechange = function(){
					if(varse.readyState == 4 && varse.status == 200){
						document.getElementById('users').innerHTML = varse.responseText;
					}
				}
			
			varse.open("GET", "us1.php", true);
			varse.send()	

			}
	</script>

	<?php

		include '../plantillas/final.php';

	?>