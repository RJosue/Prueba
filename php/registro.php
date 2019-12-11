<?php
$titulo = "Agregar Curso";
include '_header.php';
?>
<html>

<head>


    <style type="text/css">
        .shadow {
            background-color: #f9f9f9;
            margin-top: 10x;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px 24px;
        }

        input[type=text] {}
    </style>
</head>

<body>
    <div class="container shadow mt-3">

        <br>
        <h2 class="text-center">Registrarse</h2>
        <form class="form-horizontal mx-auto" action="#">
            <div class="form-group">
                <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="nombre" placeholder="Introduzca su nombre" required">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="apellido">Apellido:</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="apellido" placeholder="Introduzca su apellido" required">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="cedula">Cedula:</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="cedula" placeholder="Introduzca su cedula" required">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="correo">Correo:</label>
                <div class="col-sm-12">
                    <input type="email" class="form-control" id="correo" placeholder="Introduzca su correo" required">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="contraseña">Contraseña:</label>
                <div class="col-sm-12">
                    <input type="password" class="form-control" id="contraseña" placeholder="Introduzca su contraseña" required">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="contraseña">Sexo:</label>
                <div class="col-sm-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Femenino</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="celular">Celular:</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="celular" placeholder="Introduzca su Celular">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="fechanacimineto">Fecha de Nacimineto:</label>
                <div class="col-sm-12">
                    <input type="date" class="form-control" id="fechanacimineto" placeholder="Enter password">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="intitucion">Intitución:</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="intitucion" placeholder="Intitucion de donde proviene">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mx-3" style="width:250px; margin-right:60px; margin-buttom:25px;">Enviar</button>
        </form>
     </div>
</body>
</html>

<?php
include '_footer.php';
?>