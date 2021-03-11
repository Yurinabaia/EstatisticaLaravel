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
        <a href="{{ route('regraS') }}">Regra De Sturges</a>

    </div >

    <div class="conteudo">
        <div>
            <form action="{{ route('regraS') }}" method="GET">
                <input type="text" placeholder="Pesquisar" name="tabela">
                <input type="submit">
            </form>
        </div>
        <form action="{{ route('regraS') }}" method='GET'>

        <?php
 if(isset($_GET['tempo0'])) 
    {
         $array = array();
        $i = 0;
        while (true) {
           if (isset($_GET['tempo'.$i])){
                $array[] = $_GET['tempo'.$i];
           }
           else 
           {
               break;
           }
           $i++;
        }
        sort($array);
        $result = array_unique($array);
        $amplitude = end($result) - $result[0];
        $quantidadDeLinhas = floor(1 + 3.322 *log10(count($array)));
        $amplitudeIntervalos  = $amplitude/$quantidadDeLinhas;
       // echo($amplitudeIntervalos."<br>");

        $proximoValor = 0;
        $frequencia = array();
        //echo (number_format($amplitudeIntervalos, 1, ',', ' '));
       // print_r($array);

        $a = 0;
        $result = $array[0];
        $aux = 0;
        $frequencia[] = $result;
        while ($a < $quantidadDeLinhas) {
            $aux = $result;
            $result += (number_format($amplitudeIntervalos, 1, '.', ' '));
            $frequencia[] = $result;
            $a++;
        }

    // print_r($frequencia);
        $contador = 0;
        $valoreFrequencia = 0;
        $feq = array();
        $i = 0;
        
        
        for($i = 0; $i < count($array); $i++) 
        {   
                if($array[$i] >= 4.7 && $array[$i] <  6.5 {
                    $valoreFrequencia++;
                }
                else 
                {   echo("<br>".$valoreFrequencia);
                    $contador++;
                    $valoreFrequencia = 1;
                }
        }


    
  // print_r($feq);
    
    }
    elseif (!empty($_GET['tabela'])) {
            $tamanhoTabela = $_GET['tabela'];
            echo "
            <table border='1'>
                <tr>
                    <td>Valores</td>
                </tr>";
            for ($i = 0; $i < $tamanhoTabela; $i++) { echo "<tr>
        <td><input type='text' name='tempo$i'></td>
    </tr>" ; 
    } 
    echo "</table> <input type='submit'></form>" ;
    } else 
    {

        
        echo( "  
    <p class='h5'>
        <p>USAR AS FORMULAS </p>
        <br>
        <p> MAX = MAIOR AMOSTRA </p>
        <br>
        <p> MIN = MENOR AMOSTRA </p>
        <br>
        <p> Calcula da amplituda A = máx - min </p>
        <br>
        <p> Quantidade de linhas da tabela = k= 1+3,322.log n -> k=8,37 (=== SENDO QUE N É A QUANTIDADE DE AMOSTRA QUE EU TENHO)
INTERVALO AK = A/K </p>
        <br>
        <p> O NUMERO DE TABELA DE LINHAS DA MINHA TABELA É O K QUE EU TENHO. </p>
        <br>

        <p> O INTERVALO VAI SER A QUANTIDADE DE VALORES QUE VOU SOMANDO.</p>

        <br>
        <p> NA CRIACAO DA TABELA O VALOR DA MINHA FREQUENCIA É PEGAR MINHA AMOSTRA E VER QUANTOS ITENS QUE EU ANDO DE UMA ATÉ A OUTRA
COM A AMPLITUDE
TIPO TABELA </p>
        <br>
        <br>
        <img src='img/regraS.png'>


        <br>
     ");
    }

        ?>

        
        <br> <a href="{{ route('index') }}" class="botao"><b>VOLTAR</b></a>
    </div>



</html>