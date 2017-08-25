<?php
use Studio321\Classes\HtmlHelper;
?>
<!doctype HTML>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css"
          integrity="sha384-dNpIIXE8U05kAbPhy3G1cz+yZmTzA6CY8Vg/u2L9xRnHjJiAK76m2BIEaSEV+/aU" crossorigin="anonymous">
    <title></title>
    <style>
        .navbar-default .navbar-nav > li > a.noClick {
            color: black;
            cursor: default;
        }

        .navbar-default .navbar-nav > li > a {
            padding-right: 2px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><?= HtmlHelper::link('pages', 'home', 'Accueil') ?></li>
            <li><?= HtmlHelper::link('pages', 'about', 'A propos') ?></li>

            <li><a class="noClick">Adresses :</a></li>
            <li><?= HtmlHelper::link('addresses', 'index', '<i class="fa fa-list"></i>') ?></li>
            <li><?= HtmlHelper::link('addresses', 'add', '<i class="fa fa-plus"></i>') ?></li>

            <li><a class="noClick">Dirigeants :</a></li>
            <li><?= HtmlHelper::link('leaders', 'index', '<i class="fa fa-list"></i>') ?></li>
            <li><?= HtmlHelper::link('leaders', 'add', '<i class="fa fa-plus"></i>') ?></li>

            <li><a class="noClick">Fermes :</a></li>
            <li><?= HtmlHelper::link('farms', 'index', '<i class="fa fa-list"></i>') ?></li>
            <li><?= HtmlHelper::link('farms', 'add', '<i class="fa fa-plus"></i>') ?></li>

            <li><a class="noClick">Employés :</a></li>
            <li><?= HtmlHelper::link('employees', 'index', '<i class="fa fa-list"></i>') ?></li>
            <li><?= HtmlHelper::link('employees', 'add', '<i class="fa fa-plus"></i>') ?></li>

            <li><a class="noClick">Poulets :</a></li>
            <li><?= HtmlHelper::link('chickens', 'index', '<i class="fa fa-list"></i>') ?></li>
            <li><?= HtmlHelper::link('chickens', 'add', '<i class="fa fa-plus"></i>') ?></li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
