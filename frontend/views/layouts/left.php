<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <!-- <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div> -->

        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['/gii']],
                    ['label' => 'Empresas', 'icon' => 'file-code-o', 'url' => '', 'items' => [
                        ['label' => 'Criar', 'icon' => 'file-code-o', 'url' => ['/empresa/create'],],
                        ['label' => 'Listar', 'icon' => 'far fa-list-alt', 'url' => ['/empresa/index'],],
                    ],],
                    ['label' => 'Salas', 'icon' => 'file-code-o', 'url' => ['/sala/index']],
                    // ['label' => 'Listas', 'icon' => 'far fa-list-alt', 'url' => ['/lista/index']],
                    // ['label' => 'Empresas', 'icon' => 'file-code-o', 'url' => ['/empresa/index']],

                    // ['label' => 'Usuarios', 'icon' => 'file-code-o', 'url' => ['/gii']], 

                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Agendamentos',
                        'icon' => 'far fa-list-alt',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Requisitar', 'icon' => 'file-code-o', 'url' => ['/agendamentos/create'],],
                            ['label' => 'Requisições', 'icon' => 'dashboard', 'url' => ['/agendamentos/index'],],
                            ['label' => 'Listas', 'icon' => 'far fa-list-alt', 'url' => ['/paciente/create'],],
                            [
                                'label' => 'Impressoes',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => ['/paciente/index'],],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>