<?php
session_start();
include('../db.php');



setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Boa_Vista');

if (isset($_POST['DelSen'])) {
    $id = base64_decode($_POST['IdSenha']);

    $sql = "SELECT * FROM passwords WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $deleteSql = "DELETE FROM passwords WHERE id = $id";
        if (mysqli_query($conn, $deleteSql)) {
            echo "Senha deletada com sucesso.";
            header("Location: ../index.php");
        } else {
            echo "Erro ao deletar a Senha: " . mysqli_error($conn);
        }

    } else {
        echo "Senha não localizada.";
        header("Location: ../index.php");
    }
}