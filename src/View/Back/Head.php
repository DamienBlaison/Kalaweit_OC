<?php $adminlte =  '/vendor/almasaeed2010/adminlte';

$bdd = new \Manager\Connexion();
$bdd = $bdd->getBdd();

if (!isset($_SESSION["user_login"])){ header("Location:/www/Kalaweit/app_connexion/log_in");};

if ( (new \Manager\Users($bdd))->get_id_from_Login($_SESSION['user_login']) == false){header("Location:/www/Kalaweit/app_connexion/log_in");}

$user = (new \Manager\Users($bdd))->get_id_from_Login($_SESSION['user_login']);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Kalaweit Administration</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="icon" type="image/png" href="/Img/favicon-96.png">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo $adminlte ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $adminlte ?>/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo $adminlte ?>/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $adminlte ?>/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo $adminlte ?>/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo $adminlte ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="<?php echo $adminlte ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link  href="/vendor/Croppie-2.6-2.4/croppie.css" rel="stylesheet">


    <link rel="stylesheet" href="/Css/perso.css">

</head>

<body class="hold-transition skin-blue sidebar-mini" style="min-height:auto;">
    <div class="wrapper" style="height: auto; min-height:2000px;">
        <aside class="main-sidebar" id="main_sidebar">
            <section class="sidebar" style="min-height: 100%; height:100%;">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo '/Img/Avatar/'.$user['user_avatar'] ?>" id="return" class="img-circle" alt="User Image" onclick="">
                    </div>

                    <div class="pull-left info">
                        <p><?php echo $user['user_first_name'].' '.$user['user_last_name'] ?></p>
                        <a href="/www/Kalaweit/app_connexion/log_out" id="log_out"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <ul class="sidebar-menu tree" data-widget="tree">
                    <li class="header">MENU
                    </li>

                    <form action="/www/Kalaweit/member/list/1" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="cli_lastname" class="form-control" placeholder="Rechercher un membre">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <form action="/www/Kalaweit/asso_cause/list/1" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="cau_name" class="form-control" placeholder="Rechercher un gibbon">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <li class=" active ">

                        <a href="/www/Kalaweit/dashboard/get">

                            <i class="fa fa-home"></i> <span>Accueil</span>

                        </a>
                    </li>

                    <li class=" treeview " style="border-left:3px solid #3c8dbc;">

                        <a href="#">
                            <i class="fa fa-users"></i> <span>Membres</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu ">
                            <li><a href="/www/Kalaweit/member/add"><i class="fa fa-user-plus"></i> Ajouter un membre</a></li>
                            <li><a href="/www/Kalaweit/member/list/1"><i class="fa fa-users"></i> Liste des membres</a></li>
                        </ul>
                    </li>
                    <li class=" treeview" style="border-left:3px solid #3c8dbc; ">
                        <a href="#"><i class="fa  fa-paw"></i> <span>Animaux</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <li><a href="/www/Kalaweit/asso_cause/add"><i class="fa  fa-plus-square"></i> Ajouter un animal</a></li>
                            <li><a href="/www/Kalaweit/asso_cause/list/1"><i class="fa  fa-folder-open"></i> Tous les animaux</a></li>
                            <li><a href="/www/Kalaweit/asso_cause/list/1?actd_8=oui"><i class="fa fa-home"></i> Les animaux à adopter</a></li>
                            <li><a href="/www/Kalaweit/asso_cause/list/1?actd_7=2"><i class="fa fa-ambulance"></i> Les animaux morts</a></li>
                            <li><a href="/www/Kalaweit/asso_cause/list/1?actd_9=non"><i class="fa  fa-tree"></i> Les animaux libérés</a></li>
                        </ul>
                    </li>
                    <li class=" treeview " style="border-left:3px solid #3c8dbc;" >
                        <a href="#"><i class="fa  fa-euro"></i> <span>Adhésion</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <li><a href="/www/Kalaweit/asso_adhesion/add"><i class="fa  fa-plus-square"></i> Ajouter une adhésion</a></li>
                            <li><a href="/www/Kalaweit/asso_adhesion/list/1"><i class="fa  fa-folder-open"></i> Toutes les adhésions</a></li>

                        </ul>
                    </li>
                    <li class=" treeview " style="border-left:3px solid #3c8dbc; ">
                        <a href="#"><i class="fa  fa-gift"></i> <span>Les dons Amis</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <li><a href="/www/Kalaweit/asso_donation_asso/add"><i class="fa  fa-plus-square"></i> Ajouter un don</a></li>
                            <li><a href="/www/Kalaweit/asso_donation_asso/list/1"><i class="fa  fa-folder-open"></i> Tous les dons</a></li>
                        </ul>
                    </li>
                    <li class=" treeview " style="border-left:3px solid #3c8dbc; ">
                        <a href="#"><i class="fa  fa-gift"></i> <span>Les dons animaux</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <li><a href="/www/Kalaweit/asso_donation/add"><i class="fa  fa-plus-square"></i> Ajouter un don</a></li>
                            <li><a href="/www/Kalaweit/asso_donation/list/1"><i class="fa  fa-folder-open"></i> Tous les dons</a></li>
                        </ul>
                    </li>

                    <li class=" treeview " style="border-left:3px solid #3c8dbc; ">
                        <a href="#"><i class="fa  fa-gift"></i> <span>Les dons Foret</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <li><a href="/www/Kalaweit/asso_donation_forest/add"><i class="fa  fa-plus-square"></i> Ajouter un don</a></li>
                            <li><a href="/www/Kalaweit/asso_donation_forest/list/1"><i class="fa  fa-folder-open"></i> Tous les dons</a></li>
                        </ul>
                    </li>
                    <li class=" treeview " style="border-left:3px solid #3c8dbc;">
                        <a href="#"><i class="fa  fa-gift"></i> <span>Les dons Dulan</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <li><a href="/www/Kalaweit/asso_donation_dulan/add"><i class="fa  fa-plus-square"></i> Ajouter un don</a></li>
                            <li><a href="/www/Kalaweit/asso_donation_dulan/list/1"><i class="fa  fa-folder-open"></i> Tous les dons</a></li>
                        </ul>
                    </li>
                    <li class=" treeview " style="border-left:3px solid #3c8dbc;">
                        <a href="#"><i class="fa fa-download"></i> <span>Importation de données</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <li><a href="/www/Import_Excel/import_excel"><i class="fa fa-download"></i> Import Hello Asso</a></li>
                        </ul>
                    </li>
                    <li class=" treeview " style="border-left:3px solid #3c8dbc; ">
                        <a href="#"><i class="fa  fa-bar-chart"></i> <span>Statistique</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <li class="treeview"><a href="#"><i class="fa fa-thumbs-up"></i> Recapitulatif des dons <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                <ul class="treeview-menu">
                                    <li><a href="/www/Kalaweit/Annual_report/list?y=<?php echo date("Y") ?>"><i class="fa fa-circle-o"></i> Rapport Annuel</a></li>
                                    <li><a href="/www/Kalaweit/Monthly_report/list?y=<?php echo date("Y") ?>&m=<?php echo date("m") ?>"><i class="fa fa-circle-o"></i> Rapport Mensuel</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> ZZ

                    <li class=" treeview" style="border-left:3px solid #3c8dbc; ">
                        <a href="#"><i class="fa  fa-euro"></i> <span>Paiements et reçus</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <!--<li class="treeview"><a href="#"><i class="fa  fa-eur"></i> Gestion des paiements <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                            <ul class="treeview-menu">
                            <li><a href="monthly_deduction"><i class="fa fa-circle-o"></i> Les prélèvements mensuels</a></li>
                            <li><a href="payment_history"><i class="fa fa-circle-o"></i> Historique des prélèvements</a></li>
                        </ul>
                    </li>-->
                    <li class="treeview"><a href="index3.html"><i class="fa fa-file-text"></i> Reçus Fiscaux <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <li><a href="/www/Kalaweit/Receipt_annual_dashboard/dashboard"><i class="fa fa-circle-o"></i> Génération des reçus</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <?php if($_SESSION["role"] == '1'){?>
                <li class=" treeview" style="border-left:3px solid #3c8dbc; ">
                    <a href="#"><i class="fa  fa-cog"></i> <span>Administration</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li class="treeview"><a href="#"><i class="fa  fa-users"></i> Gestion des utilisateurs <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                            <ul class="treeview-menu">
                                <li><a href="/www/Kalaweit/users/add"><i class="fa fa-plus"></i> Ajouter un utilisateur</a></li>
                                <li><a href="/www/Kalaweit/users/list/1"><i class="fa fa-edit"></i> Modifier un utilisateur</a></li>
                            </ul>
                        </li>
                        <li><a href="/www/Kalaweit/maintenance/update"><i class="fa fa-wrench"></i>Maintenance</a>
                        </li>
                    </ul>
                </li>
                <?php
            } ?>
        </ul>
    </section>
</aside>
<div class="content-wrapper row" action="" method="post" style="min-height: 1100px;">





    <div class="" id="box-menu-mobile">
        <div class="box-header with-border">
            <h3 id="h3-menu-mobile" class="box-title">Kalaweit Administration</h3>
            <div class="box-tools pull-right">
                <button id="show-menu" type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-bars"></i></button>
            </div>
        </div>




    </div>
