<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Diário de Bordo | Sua Anotação</title>

    <!-- Bootstrap core CSS -->
    <link href="views/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="views/css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <?php require 'sidebar.php'; ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="index.php" class="btn btn-secondary">Página Inicial</a>
                        <hr>
                    </div>
                </div>
                
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <h2 class="text-center text-secondary">Sua Anotação</h2>
                        <div class="text-center">
                            <small>Nesta opção, você também pode editar e modificar a sua anotação.</small>
                        </div>
                        <hr>
                        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                            <input type="hidden" name="id" value="<?php echo $verNota['idNotas']; ?>">
                            <input type="text" name="tituloNota" placeholder="Título" class="form-control mb-2" value="<?php echo $verNota['titulo']; ?>">
                            <textarea name="nota" class="form-control mb-2" placeholder="Detalhes" style="min-height: 100vh;"><?php echo $verNota['notas']; ?></textarea>
                            <?php if (!empty($errores)): ?>
                                <div class="alert alert-danger"><?php echo $errores; ?></div>
                            <?php endif; ?>
                            <button type="submit" class="btn btn-success">Salvar Alterações</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo RUTA; ?>/views/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo RUTA; ?>/views/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
