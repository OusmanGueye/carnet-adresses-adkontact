<?php


use yii\helpers\Html; ?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">AdKontact <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= Yii::$app->urlManager->createUrl('site/index') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Sécurité
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Authorization</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Permission:</h6>
                <a class="collapse-item" href="/user/liste-role">Rôle</a>
                <!--                        <a class="collapse-item" href="cards.html">Permission</a>-->
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <!--            <li class="nav-item">-->
    <!--                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"-->
    <!--                   aria-expanded="true" aria-controls="collapseUtilities">-->
    <!--                    <i class="fas fa-fw fa-wrench"></i>-->
    <!--                    <span>Utilities</span>-->
    <!--                </a>-->
    <!--                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"-->
    <!--                     data-parent="#accordionSidebar">-->
    <!--                    <div class="bg-white py-2 collapse-inner rounded">-->
    <!--                        <h6 class="collapse-header">Custom Utilities:</h6>-->
    <!--                        <a class="collapse-item" href="utilities-color.html">Colors</a>-->
    <!--                        <a class="collapse-item" href="utilities-border.html">Borders</a>-->
    <!--                        <a class="collapse-item" href="utilities-animation.html">Animations</a>-->
    <!--                        <a class="collapse-item" href="utilities-other.html">Other</a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </li>-->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <!--            <li class="nav-item">-->
    <!--                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"-->
    <!--                   aria-expanded="true" aria-controls="collapsePages">-->
    <!--                    <i class="fas fa-fw fa-folder"></i>-->
    <!--                    <span>Pages</span>-->
    <!--                </a>-->
    <!--                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">-->
    <!--                    <div class="bg-white py-2 collapse-inner rounded">-->
    <!--                        <h6 class="collapse-header">Login Screens:</h6>-->
    <!--                        <a class="collapse-item" href="login.html">Login</a>-->
    <!--                        <a class="collapse-item" href="register.html">Register</a>-->
    <!--                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>-->
    <!--                        <div class="collapse-divider"></div>-->
    <!--                        <h6 class="collapse-header">Other Pages:</h6>-->
    <!--                        <a class="collapse-item" href="404.html">404 Page</a>-->
    <!--                        <a class="collapse-item" href="blank.html">Blank Page</a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </li>-->

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= Yii::$app->urlManager->createUrl('user') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Utilisateur</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="country">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Pays</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="contact">
            <i class="fas fa-fw fa-table"></i>
            <span>Contact</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <!--            <div class="sidebar-card d-none d-lg-flex">-->
    <!--                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">-->
    <!--                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>-->
    <!--                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>-->
    <!--            </div>-->

</ul>


<!--<div class="sidenav">-->
<!--    <div class="logo-container">-->
<!--        <h1>AdKontact Group</h1>-->
<!--    </div>-->
<!--    --><?php
//    $currentUrl = Yii::$app->request->url;
//    ?>
<!--    <a href="--><?php //= Yii::$app->urlManager->createUrl('site/index') ?><!--" class="--><?php //= $currentUrl == Yii::$app->urlManager->createUrl('site/index') ? 'active' : '' ?><!--"><i class="fas fa-home"></i> Dashboard</a>-->
<!--    <a href="/user/liste-role" class="--><?php //= $currentUrl == Yii::$app->urlManager->createUrl('create-role') ? 'active' : '' ?><!--"><i class="fas fa-user-tag"></i> Rôle</a>-->
<!--    <a href="/user" class="--><?php //= $currentUrl == Yii::$app->urlManager->createUrl('user') ? 'active' : '' ?><!--"><i class="fas fa-user"></i> Utilisateur</a>-->
<!--    <a href="--><?php //= Yii::$app->urlManager->createUrl('country') ?><!--" class="--><?php //= $currentUrl == Yii::$app->urlManager->createUrl('country') ? 'active' : '' ?><!--"><i class="fas fa-flag"></i> Pays</a>-->
<!--    <a href="--><?php //= Yii::$app->urlManager->createUrl('contact') ?><!--" class="--><?php //= $currentUrl == Yii::$app->urlManager->createUrl('contact') ? 'active' : '' ?><!--"><i class="fas fa-address-book"></i> Contact</a>-->
<!--</div>-->



<!--<style>-->
<!--    body {-->
<!--        font-family: "Lato", sans-serif;-->
<!--        margin: 0;-->
<!--        padding: 0;-->
<!--    }-->
<!---->
<!--    .sidenav {-->
<!--        height: 100%;-->
<!--        width: 240px;-->
<!--        position: fixed;-->
<!--        z-index: 1;-->
<!--        top: 0;-->
<!--        left: 0;-->
<!--        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);-->
<!--        overflow-x: hidden;-->
<!--        padding-top: 20px;-->
<!--        box-shadow: 2px 0 5px rgba(0,0,0,0.3);-->
<!--        transition: width 0.3s;-->
<!--    }-->
<!---->
<!--    .sidenav:hover {-->
<!--        width: 260px;-->
<!--    }-->
<!---->
<!--    .logo-container {-->
<!--        padding: 20px;-->
<!--        text-align: center;-->
<!--    }-->
<!---->
<!--    .logo-container h1 {-->
<!--        margin: 0;-->
<!--        color: #fff;-->
<!--        font-size: 24px;-->
<!--    }-->
<!---->
<!--    .sidenav a {-->
<!--        padding: 15px 20px;-->
<!--        text-decoration: none;-->
<!--        font-size: 18px;-->
<!--        color: #ffffff;-->
<!--        display: flex;-->
<!--        align-items: center;-->
<!--        justify-content: flex-start;-->
<!--        transition: background-color 0.3s, color 0.3s, padding-left 0.3s;-->
<!--    }-->
<!---->
<!--    .sidenav a i {-->
<!--        margin-right: 15px;-->
<!--        font-size: 20px;-->
<!--    }-->
<!---->
<!--    .sidenav a:hover {-->
<!--        background-color: rgba(255, 255, 255, 0.2);-->
<!--        color: #f1f1f1;-->
<!--        padding-left: 25px;-->
<!--    }-->
<!---->
<!--    .sidenav a.active {-->
<!--        background-color: rgba(255, 255, 255, 0.2);-->
<!--        color: #f1f1f1;-->
<!--        padding-left: 25px;-->
<!--        font-weight: bold; /* Texte en gras pour l'élément actif */-->
<!--    }-->
<!---->
<!--    @media screen and (max-height: 450px) {-->
<!--        .sidenav {padding-top: 15px;}-->
<!--        .sidenav a {font-size: 16px;}-->
<!--    }-->
<!---->
<!---->
<!--</style>-->