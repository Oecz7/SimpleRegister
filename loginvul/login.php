<?php
$conectar = mysqli_connect('localhost', 'root', '');
        if (!$conectar){
            echo "No se pudo conectar con el servidor";
        }else {
            $base = mysqli_select_db($conectar,'login');
            if (!$base){
                echo "No se encontro la base de datos";
            }
        }
        //Variable declaration that let an SQL Injection atack
        $user = $_POST['user'];
        $password = $_POST['password'];

        //Variable declaration to prevent an SQL Injection atack
       // $user = $conectar -> real_escape_string(addslashes($_POST['user']));
        //$password = $conectar -> real_escape_string(addslashes($_POST['password']));

        $sql = "SELECT user, password FROM users WHERE user = '$user' AND password = '$password'";
        $ejecutar = $conectar -> query($sql);
        if ($ejecutar -> num_rows > 0)
        {
            header('Location: index.html?success=login');
        }
        else
        {
            header('Location: index.html?error=login');
        }
?>