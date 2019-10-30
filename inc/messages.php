<?php  
	if (isset($_SESSION['messUpdate']) && !empty($_SESSION['messUpdate'])){
		switch($_SESSION['message']){
			case 1:
				echo'<div class="alert alert-danger alert-dismissible fade show w-75 mx-auto my-2" role="alert">
  					<strong>Attention un problème est survenu.</strong> <br /> 
  					Message du problème rencontré ... 
	  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    				<span aria-hidden="true">&times;</span>
	  					</button>
					</div>';
				session_unset();
			break;
			case 2:
				echo'<div class="alert alert-warning alert-dismissible fade show w-75 mx-auto my-2" role="alert">
  					<strong>Attention requise.</strong> <br /> 
  					Une fonction a été réalisée pas pas en totalité.
	  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    				<span aria-hidden="true">&times;</span>
	  					</button>
					</div>';
				session_unset();
			break;
		}
			case 3:
				echo'<div class="alert alert-success alert-dismissible fade show w-75 mx-auto my-2" role="alert">
  					<strong>Modification reussie.</strong> <br /> 
  					Les modifications ont été enregistré avec succès.
	  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    				<span aria-hidden="true">&times;</span>
	  					</button>
					</div>';
				session_unset();
			break;
		}
	}
?>