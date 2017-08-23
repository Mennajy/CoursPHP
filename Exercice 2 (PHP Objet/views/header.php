<!doctype HTML>
<html>
<head>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title></title>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Pouletto2000</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><?= HtmlHelper::link('pages', 'home', 'Accueil')?></li>
        <li><?= HtmlHelper::link('pages', 'about', 'A propos')?></li>
        <li><?= HtmlHelper::link('dirigeants', 'index', 'Liste Dirigeants')?></li>
        <li><?= HtmlHelper::link('dirigeants', 'add', 'Créer Dirigeants')?></li>
        <li><?= HtmlHelper::link('employes', 'index', 'Liste Employes')?></li>
        <li><?= HtmlHelper::link('employes', 'add', 'Créer Employes')?></li>
        <li><?= HtmlHelper::link('fermes', 'index', 'Liste Fermes')?></li>
        <li><?= HtmlHelper::link('fermes', 'add', 'Créer Fermes')?></li>
        <li><?= HtmlHelper::link('poulets', 'index', 'Liste Poulets')?></li>
        <li><?= HtmlHelper::link('poulets', 'add', 'Créer Poulets')?></li>
        </li>
      </ul>
    </div>
  </div>
</nav>
</head>
<body>
<hr>
