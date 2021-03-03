<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title><?=  $page_title ?></title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/vendors/vendors.min.css') ;?>">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/css/vertical-menu-nav-dark-template/materialize.css') ;?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/css/vertical-menu-nav-dark-template/style.css') ;?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/css/pages/login.css') ;?>">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/css/custom/custom.css') ;?>">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu preload-transitions 1-column login-bg   blank-page blank-page" data-open="click" data-menu="vertical-dark-menu" data-col="1-column">
   

 <!-- BEGIN: Header-->
 <?php 
    // teste pour afficher le menu de l'admin ou pas
 if($aff_menu){ 
     ?>

 <header class="page-topbar" id="header">
        <div class="navbar navbar-fixed">
            <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-purple-deep-orange gradient-shadow">
                <div class="nav-wrapper">
                    <div class="header-search-wrapper hide-on-med-and-down">
                        
                        <ul class="search-list collection display-none"></ul>
                    </div>
                    <ul class="navbar-list right">
                     
                        <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="<?php echo base_url('app-assets/images/avatar/avatar-7.png');?>" alt="avatar"><i></i></span></a></li>
                  
                    </ul>
                   
                 
                    <!-- profile-dropdown-->
                    <ul class="dropdown-content" id="profile-dropdown">
                        <li><a class="grey-text text-darken-1" href="user-profile-page.html"><i class="material-icons">person_outline</i> Profile</a></li>
                  
                        <li class="divider"></li>
                 
                        <li><a class="grey-text text-darken-1" href="Accueil/logout"><i class="material-icons">keyboard_tab</i> Logout</a></li>
                    </ul>
                </div>
            
            </nav>
        </div>
    </header>
    <!-- END: Header-->
   


    <!-- BEGIN: SideNav-->
    <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light navbar-full sidenav-active-rounded">
        <div class="brand-sidebar">
            <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><img src="<?php echo base_url('app-assets/images/logo/materialize-logo.png');?>" alt="materialize logo" /><span class="logo-text hide-on-med-and-down">Materialize</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
        </div>
        <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
            
            <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">face</i><span class="menu-title" data-i18n="User">Utilisateur</span><span class="badge badge pill purple float-right mr-10">3</span></a>
                <div class="collapsible-body">
                    <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                        <li><a href="page-users-list.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="List">Lister</span></a> <!--  class="active"  si le lien est actif -->
                        </li>
                        
                        <li><a href="page-users-edit.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Edit">Ajouter</span></a>
                        </li>
                    </ul>
                </div>
            </li>
           
        </ul>
        <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
    </aside>
    <!-- END: SideNav-->

<?php } ?>