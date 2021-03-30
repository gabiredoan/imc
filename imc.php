<?php
header("Content-type:text/html charset:utf8");

//var_dump($_POST);
$nome = "";
$peso= 0.00;
$altura = 0.00;
$imc = 0;
$saida = "";

if(isset($_POST["nome"]) && !empty($_POST["nome"]) && isset($_POST["peso"]) && !empty($_POST["peso"]) && isset($_POST["altura"]) && !empty($_POST["altura"])){
    $nome = $_POST["nome"];
    $peso = $_POST["peso"];
    $altura = $_POST["altura"];
}else{
    header("location:index.html");
}

$imc = $peso / pow($altura,2);
$imc = intval($imc);

if($imc > 40){
    $saida = "<span>IMC: {$imc} <br> Situação: Obesidade GRAVE</span>";
}else if($imc > 35 && $imc <= 45){
    $saida = "<span>IMC: {$imc}<br> Situação: Obesidade GRAU II</span>";
}else if($imc > 30 && $imc <= 35){
    $saida = "<span >IMC: {$imc}<br>Situação: Obesidade GRAU I</span>";
}else if($imc > 25 && $imc <= 30){
    $saida = "<span>IMC: {$imc}<br>Situação: Acima do peso</span>";
}else if($imc >= 19 && $imc < 25){
    $saida = "<span>IMC: {$imc}<br>Situação: Peso Normal</span>";
}else if($imc >= 16 && $imc <19){
    $saida = "<span>IMC: {$imc}<br>Situação: Abaixo do peso</span>";
}else if($imc < 16){
    $saida = "<span>IMC: {$imc}<br>Situação: Muito abaixo do peso</span>";
}else{
    $saida = "Nao foi possivel fazer o calculo de IMC";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>IMC</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<h1 style="font-size:50px;">Calculo IMC</h1>

<h3>
<?php echo
"Nome: {$nome}
<br>
Peso: {$peso}kg
<br>
Altura: {$altura}cm
<br><br>
Resultado: {$saida}"; ?>
</h3>

<form action="index.html" method="get">
    <button type="submit" class="btn btn-primary">Voltar</button>  
</form>
</body>
</html>
