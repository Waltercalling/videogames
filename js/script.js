jQuery(document).ready(function($) {
	//Check confirmation click for delete button
	$('.delete').on('click', function () {
		return confirm ('Voulez-vous vraiment supprimer ?');
	});

	//Check confirmation click for cancel button
	$('.cancel').on('click', function () {
		return confirm ('Voulez-vous vraiment quitter sans sauvegarder ?');
	});
});
