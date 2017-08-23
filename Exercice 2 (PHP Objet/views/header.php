<!doctype HTML>
<html>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<head>
    <title></title>
</head>
<body class="col-md-8">

  <div class="nav nav-tabs nav-justified">
    <li role="presentation" class="buttom"><?= HtmlHelper::link('Pages','Home','Accueil')?></li>
    <li role="presentation" ><?= HtmlHelper::link('Pages','about','A propos')?></li>
    <li role="presentation" class="disabled">Adresses : </li>
    <li role="presentation" ><?= HtmlHelper::link('Addresses','index','Index')?></li>
    <li role="presentation" ><?= HtmlHelper::link('Addresses','add','Créér')?></li>
  </div>
<hr>
