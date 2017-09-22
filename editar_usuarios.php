<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>

    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css"/>
</head>
<body>

    <!-- Content Section -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Editar Usuarios</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3>Registros:</h3>
                <div class="records_content"></div>
            </div>
        </div>
    </div>
    <!-- /Content Section -->

    <!-- Bootstrap Modals -->
    <!-- // Modal -->

    <!-- Modal - Update User details -->
    <div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Actualizar información del Usuario</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="update_nombre">Nombre</label>
                        <input type="text" id="update_nombre" placeholder="" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="update_apellido">Apellido</label>
                        <input type="text" id="update_apellido" placeholder="" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="update_tel_usuario">Telefono</label>
                        <input type="text" id="update_tel_usuario" placeholder="" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="update_correo_usuario">Correo</label>
                        <input type="text" id="update_correo_usuario" placeholder="" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="update_nom_usuario">Usuario</label>
                        <input type="text" id="update_nom_usuario" placeholder="" class="form-control"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Aceptar</button>
                    <input type="hidden" id="hidden_user_id">
                </div>
            </div>
        </div>
    </div>
    <!-- // Modal -->

    <!-- Jquery JS file -->
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap JS file -->
    <script type="text/javascript" src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>

    <!-- Custom JS file -->
    <script type="text/javascript" src="js/script.js"></script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-75591362-1', 'auto');
        ga('send', 'pageview');

    </script>
</body>
</html>
