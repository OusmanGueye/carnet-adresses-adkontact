<?php
use yii\widgets\LinkPager;

echo LinkPager::widget([
    'pagination' => $pagination,
    'options' => ['class' => 'pagination justify-content-center'], // Ajouter des classes Bootstrap pour styliser la pagination
    'linkOptions' => ['class' => 'page-link'], // Ajouter des classes Bootstrap pour les liens de pagination
    'prevPageCssClass' => 'page-item', // Ajouter des classes Bootstrap pour l'élément de la page précédente
    'nextPageCssClass' => 'page-item', // Ajouter des classes Bootstrap pour l'élément de la page suivante
    'pageCssClass' => 'page-item', // Ajouter des classes Bootstrap pour chaque élément de page
    'prevPageLabel' => 'Précédent', // Ajouter une étiquette pour le lien de la page précédente
    'nextPageLabel' => 'Suivant', // Ajouter une étiquette pour le lien de la page suivante
]);
