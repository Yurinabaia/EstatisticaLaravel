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
                <input type="file" placeholder="Pesquisar" name="tabela">
                <input type="submit">
            </form>
        </div>
        <form action="{{ route('regraS') }}" method='GET'>

<?php

 if(!empty($_GET['tabela'])) 
    {
       
        $populacao = array();
        $arquivo = fopen('teste.txt','r');
        if ($arquivo == false) die('Não foi possível abrir o arquivo.');
        while(true) {
            $linha = fgets($arquivo);
            if ($linha==null) break;
            //echo $linha;
            $split = explode(" ",$linha);
            foreach ($split as $key => $value) {
                $populacao[] = (double) str_replace(",",".",$value);
            }
        }
        fclose($arquivo);
        sort($populacao);
        //print_r($populacao);
        
        $amplitude = end($populacao) - $populacao[0];
        //echo($amplitude."<br>");
        
        $quantidadDeLinhas = floor(1 + 3.322 *log10(count($populacao)));
        $amplitudeIntervalos  = $amplitude/$quantidadDeLinhas;
        //echo "<br>".$quantidadDeLinhas."<br>";
        $proximoValor = 0;
        $tempo = array();
        //echo (number_format($amplitudeIntervalos, 0, ',', ' '));
        //print_r($populacao);
        $a = 0;
        $result = $populacao[0];
        $aux = 0;
        $tempo[] = $result;
        while ($a < $quantidadDeLinhas) {
            $aux = $result;
            $result += (number_format($amplitudeIntervalos, 1, '.', ' '));
            $tempo[] = $result;
            $a++;
        }
        //print_r($tempo);
        if(end($tempo) < end($populacao)) {
            $tempo[count($tempo) -1] = end($populacao);
        }

        $contador = 0;
        $valoreFrequencia = 0;
        $a = 0;
        $feq = array();
        
        for ($j=0; $j < count($tempo) -1; $j++) {
            for ($i= $a; $i < count($populacao); $i++) { 
                if($populacao[$i] >=$tempo[$j] && $populacao[$i] < $tempo[$j+1]) {
                    $valoreFrequencia++;
                    $a++;
                }
                if($j == count($tempo)- 2 &&  $populacao[$i] >= $tempo[$j+1]){
                    $valoreFrequencia++;
                }
            }
            $feq[] = $valoreFrequencia;
            $valoreFrequencia = 0; 
        }
       /*
        if(end($tempo) < end($populacao)) {
            $tempo[count($tempo) -1] = end($populacao);
            //$x = end($populacao) - (array_sum($feq) - end($tempo));
           
            echo("<br>aaa".$x."<br>");
        }*/
        
        //print_r($tempo);


        $totalFeq = array_sum($feq);
        //echo $totalFeq;
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
        
                    for ($i=0; $i < count($tempo)-1; $i++) { 
                        echo ("
                        <tr>
                            <td> $tempo[$i] |--- ". $tempo[$i +1]."  </td>
                            <td> $feq[$i]</td>
                            <td> $porcentagem[$i]%</td>
                            <td> $frequenceAcumulada[$i]</td>
                            <td> $porcentagemAcumulada[$i]%</td>
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
     else 
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