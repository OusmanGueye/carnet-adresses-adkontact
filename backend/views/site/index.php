<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index mt-4" style="font-size: medium">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3 col-12">
                <div class="card text-center">
                    <div class="card-body py-1">
                        <div class="badge-circle badge-circle-lg badge-circle-light-secondary mx-auto mb-50">
                            <i class="fas fa-address-book" style="color: #eec66c;"></i>
                        </div>
                        <div class="text-muted line-ellipsis">Contact Total</div>
                        <h3 class="mb-0 font-weight-bold"><?= $totalContacts ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-12">
                <div class="card text-center">
                    <div class="card-body py-1">
                        <div class="badge-circle badge-circle-lg badge-circle-light-secondary mx-auto mb-50">
                            <i class="fas fa-user" style="color: #e56cee;"></i>
                        </div>
                        <div class="text-muted line-ellipsis">Utilisateur Total</div>
                        <h3 class="mb-0 font-weight-bold">  <?= $totalUsers ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-12">
                <div class="card text-center">
                    <div class="card-body py-1">
                        <div class="badge-circle badge-circle-lg badge-circle-light-secondary mx-auto mb-50">
                            <i class="fas fa-user" style="color: #6cee6e;"></i>
                        </div>
                        <div class="text-muted line-ellipsis">Pays Total</div>
                        <h3 class="mb-0 font-weight-bold"> <?= $totalCountries ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        Résumé d'activité récente
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        L'utilisateur Jean a ajouté un nouveau contact
                        <span class="badge bg-primary">Nouveau</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        L'utilisateur Claire a modifié les détails d'un contact existant
                        <span class="badge bg-info">Modifié</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        L'utilisateur Marc a supprimé un contact
                        <span class="badge bg-danger">Supprimé</span>
                    </a>
                    <!-- Ajoutez d'autres éléments de liste pour d'autres événements récents -->
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Résumé d'activité récente</h3>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="list-group">
                                <?php
                                $fakeActivities = [
                                    ['description' => 'L\'utilisateur Jean a ajouté un nouveau contact.', 'time' => 'Il y a 1 heure'],
                                    ['description' => 'L\'utilisateur Ousmane a supprimer un contact', 'time' => 'Il y a 3 heures'],
                                    ['description' => 'Le système a été mis à jour vers la version 2.0.', 'time' => 'Il y a 4 heures'],
                                    ['description' => 'Un message a été reçu de la part de Marie.', 'time' => 'Il y a 15 heures'],
                                ];

                                foreach ($fakeActivities as $activity): ?>
                                    <div class="list-group-item ">
                                        <p><?= $activity['description'] ?></p>
                                        <small class="text-muted"><?= $activity['time'] ?></small>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

