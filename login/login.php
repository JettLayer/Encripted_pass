<?php
$conn = new mysqli("localhost","root","","logdb");

if ($conn->connect_errno)
{
    echo "Conexion inexistente: (".$coon->connect_errno.")".$coon->connect_error;
}

$email = $_POST['txtmail'];
$password = $_POST['txtpassword'];

if(isset($_POST['btnregister']))
{
    $steel_password = password_hash($password,PASSWORD_DEFAULT);
    $queryregister = "INSERT INTO login(mail,password) values ('$email','$steel_password')";

if(mysqli_query($conn,$queryregister))
{
    echo "<script>alert('Usuario registrado: $email');window.local<script>";
}else{
    echo "Error: ".$queryregistrar."<br>".mysql_error($conn);
}
}

if(isset($_POST['btnlogin'])){
    $queryusuario = mysqli_query($conn,"SELECT * FROM login WHERE mail = '$email'");
    $nr = mysqli_num_rows($queryusuario);
    $buscarpassword = mysqli_fetch_array($queryusuario);

    if(($nr == 1)&&(password_verify($password,$buscarpassword['password']))){
        echo "Usuario de correo: $email";
    }
    else{
        echo"<script>alert('Email o contraseña incorreto'); window.location='index.html'</script>";
    }
}

?>