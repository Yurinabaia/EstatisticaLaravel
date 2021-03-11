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
         $populacao = array();
        $i = 0;
        while (true) {
           if (isset($_GET['tempo'.$i])){
                $populacao[] = $_GET['tempo'.$i];
           }
           else 
           {
               break;
           }
           $i++;
        }
        sort($populacao);
        $result = array_unique($populacao);
        $amplitude = end($result) - $result[0];
        //echo($amplitude."<br>");
        $quantidadDeLinhas = floor(1 + 3.322 *log10(count($populacao)));
        $amplitudeIntervalos  = $amplitude/$quantidadDeLinhas;
        //echo $amplitudeIntervalos;
        $proximoValor = 0;
        $frequencia = array();
        //echo (number_format($amplitudeIntervalos, 1, ',', ' '));
        //print_r($populacao);
        $a = 0;
        $result = $populacao[0];
        $aux = 0;
        $frequencia[] = $result;
        while ($a < $quantidadDeLinhas) {
            $aux = $result;
            $result += (number_format($amplitudeIntervalos, 1, '.', ' '));
            $frequencia[] = $result;
            $a++;
        }
        //print_r($frequencia);
        $contador = 0;
        $valoreFrequencia = 0;
        $a = 0;
        $feq = array();
        for ($j=0; $j < count($frequencia) -1; $j++) {
            for ($i= $a; $i < count($populacao); $i++) { 
                if($populacao[$i] >=$frequencia[$j] && $populacao[$i] < $frequencia[$j+1]) {
                    $valoreFrequencia++;
                    $a++;
                }
            }
            $feq[] = $valoreFrequencia;
            $valoreFrequencia = 0; 
        }
        //print_r($feq);
        $totalFeq = array_sum($feq);
        $porcentagem = array();
        $porcentagemAcumulada = array();
        $frequenceAcumulada = array();
        for ($i=0; $i < count($feq); $i++) { 
            $porcentagem[] = ($feq[$i]/$totalFeq)*100;
            if($i == 0)
            {
                $porcentagemAcumulada[] = $porcentagem[0];
                $frequenceAcumulada[] = $feq[0]; 
            }
            else 
            {
                $porcentagemAcumulada[] = $porcentagem[$i] +  $porcentagemAcumulada[$i-1];
                $frequenceAcumulada[] = $feq[$i] + $frequenceAcumulada[$i-1]; 
            }

        }
        echo (" 
                <table border='1'>
                    <tr>
                        <td> Tempo </td>
                        <td> Frequencencia </td>
                        <td> Porcentagem </td>
                        <td> Frequencia Acumulada </td>
                        <td> Porcentagem Acumulada </td>
                    </tr>");
        
                    for ($i=0; $i < count($frequencia)-1; $i++) { 
                        echo ("
                        <tr>
                            <td> $frequencia[$i] |--- ". $frequencia[$i +1]."  </td>
                            <td> $feq[$i]</td>
                            <td> $porcentagem[$i]</td>
                            <td> $frequenceAcumulada[$i]</td>
                            <td> $porcentagemAcumulada[$i]</td>
                        <tr>
                        ");
                    }
                    echo ("
                        <tr>
                            <td>Total </td>
                            <td>$totalFeq </td>
                            <td> 100 </td>
                            <td> --- </td>
                            <td> --- </td>
                        <tr>
                    </table>");


                   

        
        
        
    
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