// JavaScript pour ouvrir la modal lorsque le bouton est cliqué



// JavaScript pour intercepter la soumission du formulaire et effectuer l'appel AJAX
// JavaScript pour intercepter la soumission du formulaire et effectuer l'appel AJAX
// document.getElementById('country-form').addEventListener('submit', function(event) {
//     event.preventDefault(); // Empêcher la soumission par défaut
//
//     var form = event.target;
//     var formData = new FormData(form);
//
//     fetch(form.action, {
//         method: 'POST',
//         body: formData,
//         headers: {
//             'X-Requested-With': 'XMLHttpRequest'
//         }
//     })
//         .then(response => response.json())
//         .then(data => {
//             if (data.success) {
//                 // Fermer la modal
//                 var myModalEl = document.getElementById('add-country-modal');
//                 var modal = bootstrap.Modal.getInstance(myModalEl);
//                 modal.hide();
//
//                 // Ajouter la nouvelle ligne au tableau
//                 var tbody = document.getElementById('country-table-body');
//                 tbody.insertAdjacentHTML('beforeend', data.newRow);
//
//                 // Réinitialiser le formulaire
//                 form.reset();
//             } else {
//                 // Afficher les erreurs
//                 console.error(data.errors);
//                 alert('Failed to add country: ' + data.message);
//             }
//         })
//         .catch(error => {
//              console.error('Error:', error);
//         });
// });





jQuery(document).ready(function($) {


    jQuery(document).ready(function($) {
        $(".comment-form").submit(function(event) {
            event.preventDefault(); // stopping submitting
            var data = $(this).serializeArray();
            var url = $(this).attr('action');
            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                data: data
            })
                .done(function(response) {
                    if (response.data.success === true) {
                        console.log(response.data);
                        var myModalEl = document.getElementById('add-country-modal');
                        var modal = bootstrap.Modal.getInstance(myModalEl);
                        modal.hide();

                        $(this).trigger('reset');
                        var tbody = document.getElementById('country-table-body');
                        tbody.insertAdjacentHTML('afterbegin', response.data.newRow);

                        // on vide les champs
                        $('#custom-id').val('');
                    }
                })
                .fail(function() {
                    console.log("error");
                });

        });
    });

    // Soumettre le formulaire de mise à jour du pays
    $("#update-country-form").submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize();
        var updateUrl = "/country/ajax-update";

        // Envoyer une requête AJAX pour mettre à jour le pays
        $.ajax({
            url: updateUrl,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.data.success) {
                    console.log(response.data.id);
                    // Masquer la modale de mise à jour
                    $("#country-row-name-" + response.data.id).text(response.data.name);
                    $("#country-name1").val('');
                    $("#country-id-input").val('');
                    $("#update-country-modal").modal('hide');
                } else {
                    console.error(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

});





