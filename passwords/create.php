<?php
include("../db.php");
session_start();


if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $user_id = $_SESSION['id']; // Obtém o id do usuário da sessão
} else {
    // Se a variável de sessão 'id' não estiver definida ou estiver vazia, redireciona para a página de login
    header("Location: ../users/login.php");
    exit(); // Certifica-se de que o código não será executado após o redirecionamento
}

// Verifica se o formulário foi enviado
if (isset($_POST['Enviar'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insere os dados na tabela de senhas
    $sql = "INSERT INTO passwords (email, password, user_id) VALUES ('$email', '$password', '$user_id')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Redireciona para a página inicial após o cadastro bem-sucedido
        header("Location: ../index.php");
        exit(); // Certifica-se de que o código não será executado após o redirecionamento
    } else {
        // Se houver algum erro na execução da consulta SQL, exibe uma mensagem de erro
        $errorMsg = 'Error ' . mysqli_error($conn);
        echo $errorMsg;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Locker - Adicionar Senha</title>
    <!-- Seus links CSS -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <!-- Seus links JavaScript -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <!-- Seu estilo CSS principal -->
    <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>
    <main id="main" class="main">


        <!-- Formulário de Inserção -->
        <section class="section">
            <div class="row">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Cadastro de Senha</h5>




                            <form method="POST" action="" enctype="multipart/form-data">

                                <div class="row mb-3">
                                    <label class="col-sm-1 col-form-label">Email</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control email" name="email" placeholder="Email">
                                    </div>
                                    <label style="text-align: right" class="col-sm-2 col-form-label">Senha</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control password" name="password"
                                            placeholder="Senha">
                                    </div>
                                </div>
                                <div class="row mb-3">

                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <!-- <button class="btn btn-primary" name="enviar" type="submit">Cadastrar</button>
                <a href="index.php"><input type="button" value="Voltar" class="btn btn-primary"></a> -->
                                        <button type="submit" name="Enviar" class="btn btn-primary">Cadastrar</button>

                                        <a href="../index.php"><input type="button" value="Voltar"
                                                class="btn btn-primary"></a>
                                    </div>
                                </div>

                        </div>

                        </form>
                    </div>
                </div>

            </div>


            </div>
            </div>
            </div>
            </div>
            <script src="<?php echo $url ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
            <script src="<?php echo $url ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="<?php echo $url ?>assets/vendor/chart.js/chart.umd.js"></script>
            <script src="<?php echo $url ?>assets/vendor/echarts/echarts.min.js"></script>
            <script src="<?php echo $url ?>assets/vendor/quill/quill.min.js"></script>
            <script src="<?php echo $url ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
            <script src="<?php echo $url ?>assets/vendor/tinymce/tinymce.min.js"></script>
            <script src="<?php echo $url ?>assets/vendor/php-email-form/validate.js"></script>

            <!-- Template Main JS File -->
            <script src="<?php echo $url ?>assets/js/main.js"></script>


    </main>
</body>

</html>