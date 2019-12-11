function cambio(id, rol) {
    if (! $("#" + id + rol).prop('checked')){
        datos ={
            "estado": 0,
            "id": id,
            "rol": rol
        }
    }
    else{
        datos = {
            "estado": 1,
            "id": id,
            "rol": rol
        }
    }
    $.ajax({
        method: "POST",
        url: "../php/cambio_rol.php",
        data: datos,
        success: function (response) {
            if (response == "insertado"){
                alert("Rol habilitado");
            }
            else{
                alert("Rol desabilitado")
            }
        }
    });
    
}