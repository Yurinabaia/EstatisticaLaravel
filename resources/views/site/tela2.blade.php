<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/estilotela1.css">
    <meta name="Autora" content="Amanda Oliveira Nascimento">

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
            <form action="{{ route('mediana') }}" method="GET">
                <input type="text" placeholder="Digite a quantidade DO N" name="tabela">
                <input type="submit">
            </form>
        </div>
        
        <form action="{{ route('mediana') }}" method='GET'>

        <?php
        if (isset($_GET['val0'])){
            $i = 0;
        $tamnho = 0;
        $par1 = 0;
        $par2 = 0;
        $valor1 = 0;
        $valor2 = 0;
        $x = 0;

        while (true) {
            if(isset($_GET['val'.$i])){
                $tamnho++;
            }
            else{
                break;
            }
            $i++;
        }
        if($tamnho %2 == 0) 
        {
            $par1 = $tamnho/2;
            $par2 = ($tamnho+2)/2;
            $par1 = $par1 - 1;
            $par2 = $par2 - 1;
           $valor1 = (double)$_GET['val'.$par1];
            $valor2 = (double)$_GET['val'.$par2];
            $x = ($valor1 + $valor2 )/2;
        }
        else 
        {
            $par1 = ($tamnho +1)/2;
            $par1 = $par1 - 1;
            $x = $_GET['val'.$par1];
        }
        echo($x);
    
    } elseif(!empty($_GET['tabela']))
    {   
        
        $tamanhoTabela = $_GET['tabela'];
            echo "
            <table border='1'>
                <tr>
                    <td>Valores</td>
                </tr>";
                for ($i = 0; $i < $tamanhoTabela; $i++) { echo "<tr>
        <td><input type='text' name='val$i'></td>
    </tr>" ; } echo "</table> 
    <input type='submit'>
    </form>" ;
    }
    else 
    {
        echo( "  
    <div>
        <p class='h5'>
        A mediana é simples
        <br>
        Pegar a quantidade da lista que você possuir.
        <br>
        Se a quantidade da lista for par 
        usar a formular:
        <br>
       posicaoA = (quantidade + 1)/2;
       <br>
        posicaoB = (quantidade)/2;
        <br>
        vai na sua lista e encontre o valor correspondete a sua posicaoA e posicaoB;
        <br>
        x = posicaoA;
        <br>
        y = posicaoB;
        <br>
        MEDIANA = (x + y)/2;
        <br>
        <p>
        
        <p class='h5'>
            Se a quantidade for impar
            <br>
            Use essa formular
            <br>
            posicaoImpar = (quantidade + 1)/2;
            <br>
            encontre na lista a posicaoImpar e vc encontra o resultado da mediana
            <br>
            MEDIANA = posicaoImpar;
        </p>

    </div>
     ");
    }
        ?>

        <br> <a href="{{ route('index') }}" class="botao"><b>VOLTAR</b></a>

    
    </div>



</html>