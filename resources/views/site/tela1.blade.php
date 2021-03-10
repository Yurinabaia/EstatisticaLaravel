<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/estilotela1.css">
    <title>Framework Padawans</title>
    <link rel="icon" type="img/png" href="img/1.png" />
</head>

<body>
    <!-- CONTEÚDO DE AVISO -->
    <div class="aviso">
        <span>Confira informações sobre à COVID-19 </span><a href="https://coronavirus.saude.gov.br/"
            class="avisobotao"><b>SAIBA MAIS</b></a>
    </div>

    <!-- MENU -->
    <div class="navbar">
        <a href="{{ route('index') }}"><img src="img/logo1.png" class="navlogo"></a>
        <a href="{{ route('media') }}">Media</a>
        <a href="{{ route('mediana') }}">Mediana</a>
        <a href="{{ route('descrepancia') }}">Descrepancia</a>
        <a href="{{ route('score') }}">Score</a>
        <a href="{{ route('percentil') }}">Percentil</a>
        <a href="{{ route('regraS') }}">Regra De Sturges</a>

    </div >


    <div class="conteudo">

        <div>
            <form action="{{ route('media') }}" method="GET">
                <input type="text" placeholder="Digite a quantidade ta bela" name="tabela">
                <input type="submit">
            </form>
        </div>
        <form action="{{ route('media') }}" method='GET'>


    <?php
    if(isset($_GET['tempo0']) && isset($_GET['frequencia0'])) 
    {
        $vetor = array();
        $tempo1 = 0;
        $frenquencia = 0;
        $valorTotal = 0;
        $totalFrequencia = 0;
        $i = 0;
        while(true){ 
            if(isset($_GET['tempo'.$i]) && isset($_GET['frequencia'.$i])) 
            {
                $val = explode(";", $_GET['tempo'.$i]);
                $vetor[] = ((double)$val[0] + (double)$val[1])/2;
                $totalFrequencia += (int)$_GET['frequencia'.$i];
            }
            else {
                break;
            }
            $i++;
        }
        $i = 0;
        foreach ($vetor as $key => $teste) {
            $valorTotal += $teste * $_GET['frequencia'.$i];
        $i++;
        }
        $valorTotal =  $valorTotal/$totalFrequencia;
        echo $valorTotal;
    }
    elseif (
        !empty($_GET['tabela'])) {
            $tamanhoTabela = $_GET['tabela'];
            echo "
            <table border='1'>
                <tr>
                    <td>Tempo</td>
                    <td>Frequencia</td>
                </tr>";
                for ($i = 0; $i < $tamanhoTabela; $i++) { echo "<tr>
        <td><input type='text' name='tempo$i'></td>
        <td><input type='text' name='frequencia$i'></td>
    </tr>" ; } echo "</table> 
    <input type='submit'>
    </form>" ;
    
    } else 
    {

        
        echo( "  
    <div>
        <p class='h5'>
        Para calcular a media desta forma usar o seguinte parametros
        <br>
        Somar o valor de inicio ate o valor final de cada linha
        assim:
        <br>
        Tempo      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     Frequencia
        <br>
        4,5 |- 5,1  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   2
        <br>
        5,1 |- 9.2  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   5
        <br>
        9,2 |- 10,5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   15
        <br>

        somar os valores: (4,5 + 5,1)/2 = 4,85
        <br>
        somar os valores: (5,1 + 9,2)/2 = 7,5
        <br>
        somar os valores: ( 9,2 + 10,5)/2 = 9,85
        <br>
        Cada um dessa linhas você vai ter que multiplicar  com  a frequencia
        <br>
        media = <u>(4,85 x 2) + (7,5 x 5) + (9,85 x15)</u>
        <br>
                        quantidade de linhas = 3
                 
       
        </p>

    </div>
     ");
    }
    ?> 
    
        <br> <a href="{{ route('index') }}" class="botao"><b>VOLTAR</b></a>
    </div>



</html>
