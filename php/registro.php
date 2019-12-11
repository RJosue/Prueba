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
        <form class="form-horizontal mx-auto" action="insertar_usuario.php" method="POST">
            <div class="form-group">
                <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" placeholder="Introduzca su nombre" name="nombre" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="apellido">Apellido:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="apellido" placeholder="Introduzca su apellido" name="apellido" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="cedula">Cedula:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cedula" placeholder="Introduzca su cedula" name="cedula" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="correo">Correo:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="correo" placeholder="Introduzca su correo" name="correo" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="contraseña">Contraseña:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="contraseña" placeholder="Introduzca su contraseña" name="password" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="contraseña">Sexo:</label>
                <div class="col-sm-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="inlineRadio1" value="M" checked>
                        <label class="form-check-label" for="inlineRadio1">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="inlineRadio2" value="F">
                        <label class="form-check-label" for="inlineRadio2">Femenino</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="celular">Celular:</label>
                <div class="col-sm-10">
                    <input type="text" pattern="[0-9][0-9][0-9][0-9]-[0-9][0-9][0-9][0-9]" class="form-control" id="celular" placeholder="Introduzca su Celular ej: 8123-4567" name="celular">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="fechanacimineto">Fecha de Nacimineto:</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="fechanacimineto" placeholder="Fecha de nacimiento" name="fechanacimiento">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="intitucion">Intitución:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="intitucion" placeholder="Intitucion de donde proviene" name="institucion">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mx-3" style="width:250px; margin-right:60px; margin-buttom:25px;" name="submit">Enviar</button>
        </form>
        <!-- <form class="mx-auto">
            <h2 class="" style="margin-left:60px;">Registrarse</h2>
            <div class="container" style="width:55%">
                <div class="input-group mb-4 mx-auto" style="">
                    <div class="input-group-prepend">
                    </div>
                    <input type="text" aria-label="First name" class="form-control" placeholder="Nombre">
                    <input type="text" aria-label="Last name" class="form-control" placeholder="Apellido ">
                    <input type="text" aria-label="Last name" class="form-control" placeholder="Cedula ">
                    <input type="text" aria-label="Last name" class="form-control" placeholder="Correo ">
                </div>
                <div class="">

                    <div class="form-check-inline">

                        <label class="form-check-label" for="radio1">
                            <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>Masculino
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="radio2">
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">Femenino
                        </label>
                    </div>

                </div>

                <div class="input-group mb-4 mx-auto" style="">
                    <div class="input-group-text">
                        <span class="input-group-date">Fecha de Nacimiento</span>
                    </div>
                    <input type="date" aria-label="First name" class="form-control" placeholder="Nombre">
                </div>

                <div class="input-group mb-4 mx-auto" style=>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Celular</span>
                    </div>
                    <input type="phone" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="5555-5555">
                </div>


                <div class="input-group mb-4 mx-auto" style="">
                    <label class="input-group-text" for="inputGroupSelect01">Facultad</label>
                    <select class="custom-select" id="inputGroupSelect01" placeholder="elija un salon">

                        <option value="1">Sistemas Computacionles</option>
                        <option value="2">Ingenieria Civil</option>
                        <option value="3">Electrica</option>
                        <option value="4">Ciencias y Tecnologia</option>
                        <option value="5">Ingenieria Industrial</option>
                        <option value="6">Mecanica</option>

                    </select>
                </div>

                <div class="input-group mb-4 mx-auto" style="width:">
                    <label class="input-group-text" for="inputGroupSelect01">Carrera</label>
                    <select class="custom-select" id="inputGroupSelect01" placeholder="elija un salon">

                        <option value="1">Desarrollo de Software</option>
                        <option value="2">Ingenieria de Software</option>
                        <option value="3">Licenciatura en Redes</option>
                        <option value="4">Ingenieria en Sistemas Computacionales</option>
                        <option value="5">Ingenieria en sistemas de informacion</option>
                        <option value="6">Mecanica</option>

                    </select>
                </div>
                <div class="input-group mb-4 mx-auto" style="width:">
                    <label class="input-group-text" for="inputGroupSelect01">Nivel Curado</label>
                    <select class="custom-select" id="inputGroupSelect01" placeholder="elija un salon">

                        <option value="1">Primer</option>
                        <option value="2">Segundo</option>
                        <option value="3">Tercer</option>
                        <option value="4">Cuarto</option>
                        <option value="5">Quinto</option>


                    </select>
                </div>
                <br>
            </div>
            <br>
        </form> -->

    </div>







</body>
</html>

<?php
include '_footer.php';
?>