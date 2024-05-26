<?php


use yii\helpers\Html; ?>


<div class="sidenav">
    <div class="logo-container">
        <h1>AdKontact Group</h1>
    </div>
    <?php
    $currentUrl = Yii::$app->request->url;
    ?>
    <a href="#home" class="<?= $currentUrl == Yii::$app->homeUrl ? 'active' : '' ?>"><i class="fas fa-home"></i> Dashboard</a>
    <a href="<?= Yii::$app->urlManager->createUrl('country') ?>" class="<?= $currentUrl == Yii::$app->urlManager->createUrl('country') ? 'active' : '' ?>"><i class="fas fa-concierge-bell"></i> Pays</a>
    <a href="#clients" class="<?= $currentUrl == Yii::$app->urlManager->createUrl('clients') ? 'active' : '' ?>"><i class="fas fa-users"></i> Clients</a>
    <a href="#contact" class="<?= $currentUrl == Yii::$app->urlManager->createUrl('contact') ? 'active' : '' ?>"><i class="fas fa-envelope"></i> Contact</a>
</div>



<style>
    body {
        font-family: "Lato", sans-serif;
        margin: 0;
        padding: 0;
    }

    .sidenav {
        height: 100%;
        width: 240px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        overflow-x: hidden;
        padding-top: 20px;
        box-shadow: 2px 0 5px rgba(0,0,0,0.3);
        transition: width 0.3s;
    }

    .sidenav:hover {
        width: 260px;
    }

    .logo-container {
        padding: 20px;
        text-align: center;
    }

    .logo-container h1 {
        margin: 0;
        color: #fff;
        font-size: 24px;
    }

    .sidenav a {
        padding: 15px 20px;
        text-decoration: none;
        font-size: 18px;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        transition: background-color 0.3s, color 0.3s, padding-left 0.3s;
    }

    .sidenav a i {
        margin-right: 15px;
        font-size: 20px;
    }

    .sidenav a:hover {
        background-color: rgba(255, 255, 255, 0.2);
        color: #f1f1f1;
        padding-left: 25px;
    }

    .sidenav a.active {
        background-color: rgba(255, 255, 255, 0.2);
        color: #f1f1f1;
        padding-left: 25px;
        font-weight: bold; /* Texte en gras pour l'élément actif */
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 16px;}
    }


</style>