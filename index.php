<!DOCTYPE html>
<html lang="pt-br">
<?php
include("db.php");
session_start();
include("protect.php");

$user_id = $_SESSION["id"];
?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Locker</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Suas Senhas</h5>
                        <a class="btn btn-outline-danger" href="logout.php"><strong>Logout</strong></a>
                        <a href="passwords/create.php" class="btn btn-success">Adicionar senha</a>

                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">Nº</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Senha</th>                                                                      
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $num_aut = 1;

                                // Selecionar os registros da tabela passwords
                                $sql = "SELECT * FROM passwords WHERE user_id = '$user_id'";
                                $result = mysqli_query($conn, $sql);

                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $num_aut; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['email']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['password']; ?>
                                            </td>                                            
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <form action="passwords/edit.php" method="POST"
                                                        enctype="multipart/form-data">
                                                        <input type="hidden" class="form-control" name="IdSenha"
                                                            value="<?php echo base64_encode($row['id']); ?>">
                                                        <button type="submit" name="EditSen" class="btn btn-info"><i
                                                                class="bx bxs-pencil"></i></button>
                                                    </form>
                                                    <form id="formDeletar<?php echo $row['id']; ?>" action="passwords/delete.php"
                                                        method="POST" enctype="multipart/form-data"
                                                        onsubmit="return confirmarDelecao()">
                                                        <input type="hidden" class="form-control" name="IdSenha"
                                                            value="<?php echo base64_encode($row['id']); ?>">
                                                        <button type="submit" name="DelSen" class="btn btn-danger"><i
                                                                class="bx bxs-trash"></i></button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                        <?php
                                        $num_aut++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmarDelecao() {
            return confirm('Tem certeza que deseja deletar este registro?');
        }
    </script>

    <!-- Vendor JS Files -->
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
</body>

</html>