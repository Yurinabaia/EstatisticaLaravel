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
        <form action="{{ route('score') }}" method='GET'>

        <?php
     if(isset($_GET['menorOuMaior']) && isset($_GET['media']) && isset($_GET['descrepancia']) )  {
         
         $menorOuMaior = $_GET['menorOuMaior'];
         $media = $_GET['media'];
         $descrepancia = $_GET['descrepancia'];

        $z = ($menorOuMaior - $media)/$descrepancia;
        echo number_format($z,2);

     }
     else
     {      
         if(!empty($_GET['scoreTabela']))
            $tamanhoTabela = $_GET['scoreTabela'];
        echo "
        <table border='1'>
            <tr>
                <td>Menor ou maior AMOSTRA</td>
                <td>Media</td>
                <td>Descrepancia</td>
            </tr>
            <tr>
                <td><input type='text' name='menorOuMaior'></td>
                <td><input type='text' name='media'></td>
                <td><input type='text' name='descrepancia'></td>
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
        Abaixo mostra como o score:
        <br>

        <b> Para calcuar o maior score pegar o X que vale a maior da amostra </b>

        <br>

        <b> Para calcular o menor score pegar o X que vale o menor da amostra <b>
        <br>

        <b> O X com barra acima é a media <b>
        <br>

        <b> O S é a descrepancia <b>

        <br>
        <br>
        <br>
        <img src='img/score.png'>
        <br>
        <br>
        <br>

        Abaixo mostra como achar a discrepancia dos valores
        O X é a media.
        O S é a discrepancia;
        <img src='img/teste.png'>      

    </div>");
    }



   
        ?>

        <br> <a href="{{ route('index') }}" class="botao"><b>VOLTAR</b></a>
    </div>



</html>