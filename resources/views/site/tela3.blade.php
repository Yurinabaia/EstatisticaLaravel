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
    if(isset($_GET['tempo0']))  
    {
        $media = 0;
        $i = 0;
        $descrpt = 0;
        while (true) {
           if (isset($_GET['tempo'.$i])){
                $media = $media + $_GET['tempo'.$i];
           }
           else 
           {
               break;
           }
           $i++;
        }
        $media = $media/$i;
        $i = 0;
        $discrepancia = 0;
        while (true) {
           if (isset($_GET['tempo'.$i])){
            
            $descrpt = $_GET['tempo'.$i]  - $media;
            $descrpt  = pow($descrpt,2);
            $discrepancia +=   $descrpt;
           }
           else 
           {
               break;
           }
           $i++;
        }   

        $discrepancia = $discrepancia/($i - 1);
        $discrepancia = sqrt($discrepancia);
        echo "<h3>Valor de discrepancia = ".number_format($discrepancia,2)."</h3>";

        echo("<br> <br><br><br><br>");
        $coeficienteVariacao = ($discrepancia/$media)*100;
        echo("<h3> valor de Coeficiente de variação = ".number_format($coeficienteVariacao,2). "</h3>");

        
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
    </tr>" ; } echo "</table> 
    <input type='submit'>
    </form>" ;
}else {
    echo(
    "  
    <div>
        <p class='h5'>
        Abaixo mostra como achar a discrepancia dos valores
        O X é a media.
        O S é a discrepancia;

        <img src='img/teste.png'>
        <br>
        Abaixo mostra como achar o COEFICIENTE DE VARIAÇÃO:

        <img src='img/teste2.png'>

        <br>

    </div>"
);
}
        ?>

        <br> <a href="index.php" class="botao"><b>VOLTAR</b></a>
    </div>



</html>