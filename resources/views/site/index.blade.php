<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/estiloindex.css">
        <meta name="Autora" content="Amanda Oliveira Nascimento">
        <title>Framework Padawans</title>
        <link rel="icon" type="img/png" href="img/1.png" />
    </head>

    <body>
    <!-- CONTEÚDO DE AVISO -->
        <div class="aviso">
            <span>Confira informações sobre à COVID-19 </span><a href="https://coronavirus.saude.gov.br/" class="avisobotao"><b>SAIBA MAIS</b></a>
        </div>

    <!-- MENU --> 
    <div class="navbar">
        <a href="{{ route('index') }}"><img src="img/logo1.png" class="navlogo"></a>
        <a href="{{ route('media') }}">Media</a>
        <a href="{{ route('mediana') }}">Mediana</a>
        <a href="{{ route('descrepancia') }}">Descrepancia</a>
        <a href="{{ route('score') }}">Score</a>
        <a href="{{ route('percentil') }}">Percentil</a>

    </div >

</html>