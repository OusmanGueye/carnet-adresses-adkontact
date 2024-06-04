<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>


<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Contacts</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalContacts ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-contact-card fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Utilisateur</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalUsers ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
<!--    <div class="col-xl-3 col-md-6 mb-4">-->
<!--        <div class="card border-left-info shadow h-100 py-2">-->
<!--            <div class="card-body">-->
<!--                <div class="row no-gutters align-items-center">-->
<!--                    <div class="col mr-2">-->
<!--                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks-->
<!--                        </div>-->
<!--                        <div class="row no-gutters align-items-center">-->
<!--                            <div class="col-auto">-->
<!--                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>-->
<!--                            </div>-->
<!--                            <div class="col">-->
<!--                                <div class="progress progress-sm mr-2">-->
<!--                                    <div class="progress-bar bg-info" role="progressbar"-->
<!--                                         style="width: 50%" aria-valuenow="50" aria-valuemin="0"-->
<!--                                         aria-valuemax="100"></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-auto">-->
<!--                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pays</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalCountries ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-flag fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Activite</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                         aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"> Sources</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                         aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                    <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                    <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                </div>
            </div>
        </div>
    </div>
</div>


<!--<div class="site-index mt-4" style="font-size: medium">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-sm-6 col-md-3 col-12">-->
<!--                <div class="card text-center">-->
<!--                    <div class="card-body py-1">-->
<!--                        <div class="badge-circle badge-circle-lg badge-circle-light-secondary mx-auto mb-50">-->
<!--                            <i class="fas fa-address-book" style="color: #eec66c;"></i>-->
<!--                        </div>-->
<!--                        <div class="text-muted line-ellipsis">Contact Total</div>-->
<!--                        <h3 class="mb-0 font-weight-bold">--><?php //= $totalContacts ?><!--</h3>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-6 col-md-3 col-12">-->
<!--                <div class="card text-center">-->
<!--                    <div class="card-body py-1">-->
<!--                        <div class="badge-circle badge-circle-lg badge-circle-light-secondary mx-auto mb-50">-->
<!--                            <i class="fas fa-user" style="color: #e56cee;"></i>-->
<!--                        </div>-->
<!--                        <div class="text-muted line-ellipsis">Utilisateur Total</div>-->
<!--                        <h3 class="mb-0 font-weight-bold">  --><?php //= $totalUsers ?><!--</h3>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-6 col-md-3 col-12">-->
<!--                <div class="card text-center">-->
<!--                    <div class="card-body py-1">-->
<!--                        <div class="badge-circle badge-circle-lg badge-circle-light-secondary mx-auto mb-50">-->
<!--                            <i class="fas fa-user" style="color: #6cee6e;"></i>-->
<!--                        </div>-->
<!--                        <div class="text-muted line-ellipsis">Pays Total</div>-->
<!--                        <h3 class="mb-0 font-weight-bold"> --><?php //= $totalCountries ?><!--</h3>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row mt-4">-->
<!--            <div class="col-lg-3">-->
<!--                <div class="list-group">-->
<!--                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">-->
<!--                        Résumé d'activité récente-->
<!--                    </a>-->
<!--                    <a href="#" class="list-group-item list-group-item-action">-->
<!--                        L'utilisateur Jean a ajouté un nouveau contact-->
<!--                        <span class="badge bg-primary">Nouveau</span>-->
<!--                    </a>-->
<!--                    <a href="#" class="list-group-item list-group-item-action">-->
<!--                        L'utilisateur Claire a modifié les détails d'un contact existant-->
<!--                        <span class="badge bg-info">Modifié</span>-->
<!--                    </a>-->
<!--                    <a href="#" class="list-group-item list-group-item-action">-->
<!--                        L'utilisateur Marc a supprimé un contact-->
<!--                        <span class="badge bg-danger">Supprimé</span>-->
<!--                    </a>-->
<!--                    <!-- Ajoutez d'autres éléments de liste pour d'autres événements récents -->-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-9">-->
<!--                <div class="card">-->
<!--                    <div class="card-header">-->
<!--                        <h3 class="card-title mb-0">Résumé d'activité récente</h3>-->
<!--                    </div>-->
<!--                    <div class="card-body">-->
<!--                        <div>-->
<!--                            <div class="list-group">-->
<!--                                --><?php
//                                $fakeActivities = [
//                                    ['description' => 'L\'utilisateur Jean a ajouté un nouveau contact.', 'time' => 'Il y a 1 heure'],
//                                    ['description' => 'L\'utilisateur Ousmane a supprimer un contact', 'time' => 'Il y a 3 heures'],
//                                    ['description' => 'Le système a été mis à jour vers la version 2.0.', 'time' => 'Il y a 4 heures'],
//                                    ['description' => 'Un message a été reçu de la part de Marie.', 'time' => 'Il y a 15 heures'],
//                                ];
//
//                                foreach ($fakeActivities as $activity): ?>
<!--                                    <div class="list-group-item ">-->
<!--                                        <p>--><?php //= $activity['description'] ?><!--</p>-->
<!--                                        <small class="text-muted">--><?php //= $activity['time'] ?><!--</small>-->
<!--                                    </div>-->
<!--                                --><?php //endforeach; ?>
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

