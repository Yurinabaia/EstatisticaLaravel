<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/estilotela1.css">
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

    <div class="conteudo">
        <div>
            <form action="{{ route('descrepancia') }}" method="GET">
                <input type="text" placeholder="Pesquisar" name="tabela">
                <input type="submit">
            </form>
        </div>
        <form action="{{ route('descrepancia') }}" method='GET'>

        <?php
     if(isset($_GET['numeroPercentir']) && isset($_GET['nAmostra']))
     {
         
         $numeroPercentir = $_GET['numeroPercentir'];
         $quantidaAmostra = $_GET['nAmostra'];

        $l = ($numeroPercentir / 100)*$quantidaAmostra;
        echo number_format($l,2);

     }
     else
     {      
         if(!empty($_GET['scoreTabela']))
            $tamanhoTabela = $_GET['scoreTabela'];
        echo "
        <br>
        <table border='1'>
            <tr>
                <td>Numero do percentil</td>
                <td>Tamanho da amostra</td>
            </tr>
            <tr>
                <td><input type='text' name='numeroPercentir'></td>
                <td><input type='text' name='nAmostra'></td>
            </tr>
        </table>
        " 
        ; 

    echo "</table> 
    <input type='submit'>
    </form>" ;


    echo(
    "  
    <div>
        <p class='h5'>
          <br>
        Abaixo mostra como é o PERCENTIL:
        <br>
        <img src='img/percentil.png'>
        <br>
        <br>
        <br>

        Regras do percentil 
        <br>
        <img src='img/percentil2.png'>

    </div>");
    }


        ?>

        <br> <a href="{{ route('index') }}" class="botao"><b>VOLTAR</b></a>
    </div>



</html>