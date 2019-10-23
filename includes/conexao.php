<?php
    //definindo local, usuário e senha (XAMPP)
    //localhost = 127.0.0.1
    $conn = mysqli_connect('localhost', 'root', '');
    //selecionando a base de dados
    $banco = mysqli_select_db($conn, 'sistemaemp');
    //definindo o tipo de charset
    mysqli_set_charset($conn, 'utf8');
?>