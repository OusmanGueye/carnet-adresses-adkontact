<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $allPermissions yii\rbac\Permission[] */
/* @var $rolePermissions yii\rbac\Permission[] */
/* @var $roleName string */

?>

<div class="assign-role-form">
    <?php $form = ActiveForm::begin(['action' => ['user/assign-permissions'], 'id' => 'permissions-form']); ?>

    <?= Html::hiddenInput('role', $roleName) ?>

    <h4>Permissions</h4>
    <div class="row">
        <?php foreach ($allPermissions as $permission): ?>
            <div class="col-md-6">
                <div class="form-check">
                    <?= Html::checkbox('permissions[]', isset($rolePermissions[$permission->name]), [
                        'value' => $permission->name,
                        'class' => 'form-check-input',
                        'id' => 'permission-' . $permission->name
                    ]) ?>
                    <?= Html::label($permission->name, 'permission-' . $permission->name, ['class' => 'form-check-label']) ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="form-group mt-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("permissions-form").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            var formData = new FormData(this);
            var permissions = formData.getAll("permissions[]");
            var role = formData.get("role");

            console.log("Role:", role);
            console.log("Selected Permissions:", permissions);

            // Optionally, submit the form data using AJAX
            fetch(this.action, {
                method: "POST",
                body: formData,
            }).then(response => {
                return response.text();
            }).then(data => {
                console.log("Server Response:", data);
            }).catch(error => {
                console.error("Error submitting form:", error);
            });
        });
    });
</script>
