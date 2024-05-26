// JavaScript pour ouvrir la modal lorsque le bouton est cliqué
document.getElementById('add-country-btn').addEventListener('click', function() {
    var myModal = new bootstrap.Modal(document.getElementById('add-country-modal'));
    myModal.show();
});

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
                    $('#comment-form input').val('');
                }
            })
            .fail(function() {
                console.log("error");
            });

    });
});

jQuery(document).ready(function($) {
    // Événement de clic sur le bouton de mise à jour
    $(".open-update-modal").click(function() {
        var countryNameValue = "Votre_Valeur";
        $('#country-name').val(countryNameValue);

        var countryId = $(this).data("country-id");
        var name =  $(this).data("name");

        console.log(document.getElementById('country-name'))

        document.getElementById('country-name').value = name

        $("#update-country-modal").modal("show");

        console.log(countryId)
        console.log(name)

        // Préparer l'URL pour récupérer les informations du pays
        var getUrl = 'country/get-country?id=' + countryId;

        $("#country-name").val("kdydfctjgvu");

        // Envoyer une requête AJAX pour récupérer les informations du pays
        $.ajax({
            url: getUrl,
            type: 'GET',
            dataType: 'json'
        }).done(async function(response) {
            // Afficher la modale de mise à jour
            //$("#update-country-modal").modal("show");

            // Attendre 100ms avant de modifier la valeur de #country-name
            await new Promise(resolve => setTimeout(resolve, 100));

            // Modifier directement la valeur de #country-name
            //$("#country-name").val("nom");
            console.log('Nouvelle valeur de #country-name:', $("#country-name").val());

        }).fail(function(xhr, status, error) {
            console.error(xhr.responseText);
        });


    });

    // Soumettre le formulaire de mise à jour du pays
    $("#update-country-form").submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize();
        var updateUrl = 'country/ajax-update';

        // Envoyer une requête AJAX pour mettre à jour le pays
        $.ajax({
            url: updateUrl,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Masquer la modale de mise à jour
                    $("#update-country-modal").modal("hide");

                    // Actualiser la liste des pays ou effectuer d'autres actions
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



