<?php

use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $roles yii\rbac\Role[] */

$this->title = 'Liste des Rôles';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="role-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Créer un Rôle', ['create-role'], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Nom du Rôle</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($roles as $role): ?>
            <tr>
                <td><?= Html::encode($role->name) ?></td>
                <td><?= Html::encode($role->description) ?></td>
                <td>
                    <?= Html::a('Modifier', ['user/update-role', 'name' => $role->name], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Supprimer', ['user/delete-role', 'name' => $role->name], [
                        'class' => 'btn btn-danger',
                        'id' => 'delete-button'
                    ]) ?>
                    <?= Html::button('Gérer les Permissions', [
                        'class' => 'btn btn-primary manage-permissions-button',
                        'data-role' => $role->name,
                    ]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <?php
    Modal::begin([
        'title' => '<h2>Gérer les Permissions</h2>',
        'id' => 'manage-permissions-modal',
        'size' => 'modal-lg',
    ]);

    echo '<div id="manage-permissions-modal-content"></div>';

    Modal::end();
    ?>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var buttons = document.querySelectorAll('.manage-permissions-button');
        var saveButton = document.getElementById('save-permissions1-btn');
        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                var role = button.getAttribute('data-role');
                var modalContent = document.getElementById('manage-permissions-modal-content');
                var url = '<?= Url::to(['user/manage-permissions']) ?>';

                // Clear modal content before loading new data
                modalContent.innerHTML = '';

                // Fetch permissions data via AJAX
                fetch(url + '?role=' + role)
                    .then(response => response.text())
                    .then(data => {
                        modalContent.innerHTML = data;
                        $('#manage-permissions-modal').modal('show'); // Show the modal
                    })
                    .catch(error => console.error('Error loading permissions:', error));
            });
        });


    });
</script>

