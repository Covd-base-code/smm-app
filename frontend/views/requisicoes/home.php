<?php

/* @var $this yii\web\View */

use yii\bootstrap4\Html;

$this->title = 'SMM';
?>
<div class="site-index">

    <div class="row">
        <img src="<?= Yii::$app->request->baseUrl ?>/img/inicial-consultorio.png" width='500px' ; height='200' class="col-md-6 offset-md-6 mt-5">
    </div>


    <div class="jumbotron text-center bg-transparent mt-2 ">
        <h1 class="display-7 text-danger">Marque as Vacinações da sua empresa</h1>

        <p class="lead">Baixe e preencha o ficheiro de template excel abaixo</p>

        <p><a class="btn btn-lg btn-danger" download="template_vacinacao" href="<?= Yii::$app->request->baseUrl ?>/img/inicial-consultorio.png">Baixar template</a></p>
    </div>

    <div class="body-content">

        <div class="card-group">
            <div class="card ml-2">
                <h2 class="card-header bg-transparent text-danger" style="font-size: larger;">Passo 1</h2>
                <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                <div class="card-body">
                    <h5 class="card-title">Preencher o template</h5>
                    <p class="card-text">Baixe o template acima e faça o preenchimento com base na organização das colunas nele existentes.</p>
                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                </div>
            </div>
            <div class="card ml-2">
                <h2 class="card-header bg-transparent text-danger" style="font-size: larger;">Passo 2</h2>
                <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                <div class="card-body">
                    <h5 class="card-title">Cadastrar-se no sistema</h5>
                    <p class="card-text">Clique no botão <q>Registar</q> e preencha os dados necessários para poder terminar o cadastro.</p>
                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                </div>
            </div>
            <div class="card ml-2">
                <h2 class="card-header bg-transparent text-danger" style="font-size: larger;">Passo 3</h2>
                <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                <div class="card-body">
                    <h5 class="card-title">Agendar vacinações</h5>
                    <p class="card-text">Clique no botão <q>Entrar</q> e agende vacinações.</p>
                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-lg-4">
                <h2 class="card-header bg-transparent">Passo 1</h2>
    
                <p>Baixar .</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div> -->

    </div>
</div>