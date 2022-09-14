<?php
include('db.php');
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;


$conexion=mysqli_connect("localhost","root"," ","loggin");

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);
$cargo=mysqli_fetch_array($resultado);

if($filas){
  if($cargo['id_cargo']==1){
    header("location:administrador.php");
  }elseif($cargo['id_cargo']==2){
    header("location:cliente.php");
  }

}else{
    ?>
    <?php
    include("index.html");

  ?>
  <h1 class="bad">ERROR DE AUTENTICACIÓN</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
