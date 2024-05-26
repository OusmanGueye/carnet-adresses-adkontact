<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index mt-4">
    <h1><?= $this->title ?></h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        Cras justo odio
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                    <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                    <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                    <a href="#" class="list-group-item list-group-item-action">Vestibulum at eros</a>
                </div>
                <?=
                 "Web Path: " . Yii::getAlias('@web'); ?>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Dashboard</h3>
                    </div>
                    <div class="card-body">
                        <p>Congratulations! You have successfully created your Yii-powered application.</p>

                        <p>You may change the content of this page by modifying the following two files:</p>
                        <ul>
                            <li>View file: <code><?= __FILE__; ?></code></li>
                            <li>Layout file: <code><?= $this->context->layout; ?></code></li>
                        </ul>

                        <div class="alert alert-success">
                            <h4>Get started with Yii</h4>
                            <p>Yii encourages best practices in programming and allows you to develop applications quite easily.</p>
                        </div>

                        <h3>Useful Links</h3>
                        <ul>
                            <li><a href="https://www.yiiframework.com/doc/guide/2.0/en/start-installation">Yii Documentation</a></li>
                            <li><a href="https://www.yiiframework.com/extensions/">Yii Extensions</a></li>
                            <li><a href="http://www.yiiframework.com/forum/">Yii Forum</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Dashboard</h3>
        </div>
        <div class="card-body">
            <p>Congratulations! You have successfully created your Yii-powered application.</p>

            <p>You may change the content of this page by modifying the following two files:</p>
            <ul>
                <li>View file: <code><?= __FILE__; ?></code></li>
                <li>Layout file: <code><?= $this->context->layout; ?></code></li>
            </ul>

            <div class="alert alert-success">
                <h4>Get started with Yii</h4>
                <p>Yii encourages best practices in programming and allows you to develop applications quite easily.</p>
            </div>

            <h3>Useful Links</h3>
            <ul>
                <li><a href="https://www.yiiframework.com/doc/guide/2.0/en/start-installation">Yii Documentation</a></li>
                <li><a href="https://www.yiiframework.com/extensions/">Yii Extensions</a></li>
                <li><a href="http://www.yiiframework.com/forum/">Yii Forum</a></li>
            </ul>
        </div>
    </div>
</div>
