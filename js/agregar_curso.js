$("#errorFoto").hide();
var num = 1;
var xnum = 1;
var ynum = 2;
$('#contenidocisco').hide();
$('#contenidodiplo').hide();
$('#contenidotech').hide();
$('#esctipo').change(function () {
    var combo = document.getElementById("esctipo");
    var selected = combo.options[combo.selectedIndex].value;
    if (selected == 3) {
        $('#ciscoClasificacion').removeProp("required");
        $('#contenidocisco').hide();
        $('#organizador').prop("required", true);
        $('#perfilIngreso').prop("required", true);
        $('#planContenido').prop("required", true);
        $('#planCosto').prop("required", true);
        $('#criteriosEvaluacion').prop("required", true);
        $('#contenidotech').hide();
        $('#contenidodiplo').show();
        $('#responsable').removeProp("required");
    } else {
        $('#contenidodiplo').hide()
        if (selected == 2) {
            $('#ciscoClasificacion').removeProp("required");
            $('#contenidocisco').hide();
            $('#organizador').removeProp("required");
            $('#perfilIngreso').removeProp("required");
            $('#planContenido').removeProp("required");
            $('#planCosto').removeProp("required");
            $('#criteriosEvaluacion').removeProp("required");
            $('#responsable').prop("required", true);
            $('#contenidotech').show();
        } else {
            $('#contenidotech').hide();
            if (selected == 1) {
                $('#contenidocisco').show();
                $('#ciscoClasificacion').prop("required", true);
                $('#responsable').removeProp("required");
                $('#organizador').removeProp("required");
                $('#perfilIngreso').removeProp("required");
                $('#planContenido').removeProp("required");
                $('#planCosto').removeProp("required");
                $('#criteriosEvaluacion').removeProp("required");
            } else {
                $('#responsable').removeProp("required");
                $('#contenidocisco').hide();
                $('#ciscoClasificacion').removeProp("required");
                $('#organizador').removeProp("required");
                $('#perfilIngreso').removeProp("required");
                $('#planContenido').removeProp("required");
                $('#planCosto').removeProp("required");
                $('#criteriosEvaluacion').removeProp("required");
            }
        }
    }
});

$('#modalidadch').click(function () {
    var combo = $('#modalidadch')[0].value();
    //alert(combo + "comobo");
})

function ValidacionProSal() {
    var combo1 = document.getElementById("escprofesor");
    var profesor = combo1.options[combo1.selectedIndex].value;
    var combo2 = document.getElementById("escsalon");
    var salon = combo2.options[combo2.selectedIndex].value;
    if (profesor != "" && salon != "") {
        $('#btninifin').removeAttr("disabled");
        $('#11').removeAttr("disabled");
        $('#21').removeAttr("disabled");

    }
}

function ValidacionFecha(horaini, horafinal) {
    var ini = '#' + horaini;
    var fin = '#' + horafinal;
    var hrini = $(ini).val();
    var hrfin = $(fin).val();
    var combo1 = document.getElementById("escsalon");
    var salon = combo1.options[combo1.selectedIndex].value;
    var combo2 = document.getElementById("escprofesor");
    var profesor = combo2.options[combo2.selectedIndex].value;
    if (hrini == "" || hrfin == "") { } else {
        if (hrini < hrfin) {
            $('#escprofesor').attr("disabled", true);
            $('#escsalon').attr("disabled", true);
            var validacion = false;
            for (a = 1; a <= num; a++) {
                var inix = '#1' + a;
                var finx = '#2' + a;
                var xhrini = $(inix).val();
                var xhrfin = $(finx).val();
                if (ini != inix && fin != finx) {
                    if (hrini < xhrfin && hrfin > xhrini) { // >< (hrini < xhrfin && hrfin > xhrini)
                        setTimeout(function () {
                            $(ini).val("");
                            $(fin).val("");
                        }, 1000);
                        alert("Este registro no se puede insertar.")
                    } else {
                        $.ajax({
                            method: "POST",
                            url: "../php/verificarFecha.php",
                            data: {
                                "fechaInicial": hrini,
                                "fechaFinal": hrfin,
                                "salon": salon,
                                "profesor": profesor
                            },
                            success: function (response) {
                                console.log(response);
                                if (response == "profesor") {
                                    $(ini).val("");
                                    $(fin).val("");
                                    alert("El profesor ya cuenta con clase en el fecha introducida");
                                } else {
                                    if (response == "salon") {
                                        $(ini).val("");
                                        $(fin).val("");
                                        alert("El salon que selecciono está siendo ocupado en la hora introducida");
                                    } else {
                                        if (response == "profesorsalon") {
                                            $(ini).val("");
                                            $(fin).val("");
                                            alert("El profesor y salon que selecciono no estan disponible en la fecha seleccionada");
                                        }
                                    }
                                }
                            }
                        });
                    }
                } else {

                    $.ajax({
                        method: "POST",
                        url: "../php/verificarFecha.php",
                        data: {
                            "fechaInicial": hrini,
                            "fechaFinal": hrfin,
                            "salon": salon,
                            "profesor": profesor
                        },
                        success: function (response) {
                            console.log(response);
                            if (response == "profesor") {
                                $(ini).val("");
                                $(fin).val("");
                                alert("El profesor ya cuenta con clase en el fecha introducida");
                            } else {
                                if (response == "salon") {
                                    $(ini).val("");
                                    $(fin).val("");
                                    alert("El salon que selecciono está siendo ocupado en la hora introducida");
                                } else {
                                    if (response == "profesorsalon") {
                                        $(ini).val("");
                                        $(fin).val("");
                                        alert("El profesor y salon que selecciono no estan disponible en la fecha seleccionada");
                                    }
                                }
                            }
                        }
                    });
                }
            }

        } else {
            alert("Complete los datos con horas validas");
            setTimeout(function () {
                $('#' + horafinal).val("")
                $('#' + horaini).val("");
            }, 500);
        }
    }
}

function AgregrarHorario() {
    var combo1 = document.getElementById("escprofesor");
    var selectedpro = combo1.options[combo1.selectedIndex].value;
    var combo2 = document.getElementById("escsalon");
    var selectedsalon = combo2.options[combo2.selectedIndex].value;
    if ((selectedpro != "") && (selectedsalon != "")) {
        $('#escprofesor').attr("disabled", true);
        $('#escsalon').attr("disabled", true);
        var horaInicial = $('#1' + num).val();
        var horaFinal = $('#2' + num).val();
        if (horaInicial == "" && horaFinal == "") {
            alert("Complete los campos de hora de inicio y final");
        } else {
            if (horaInicial < horaFinal) {
                num += 1;
                $('#diviniciofin').append(NuevaHoraInicioFin(num));
            } else {
                alert("Complete los datos con horas validas");
            }
        }
    } else {
        alert("Complete los campos de Profesor y escoger fecha");
    }
}

function NuevaHoraInicioFin(num) {
    return '<div class="row my-2" style="margin-left:0px;" id="divfechas' + num + '">' +
        '<div class=" col-sm-5">' +
        '<input type="datetime-local" class="form-control" id="1' + num + '"  name="fechaini[]" onchange="ValidacionFecha()" required>' +
        '</div>' +
        '<div class="col-sm-5">' +
        '<input type="datetime-local" class="form-control" id="2' + num + '"  name="fechafin[]" onchange="ValidacionFecha(1' + num + ',2' + num + ')" required>' +
        '</div>' +
        '</div>'
}
// lo del radiobutton
$('input[type="radio"]').click(function () {
    if ($(this).attr("value") == "0") {
        $("#contenidocosto").hide('slow');
        $('#contenidopago').val("");
        $('#contenidopago').removeProp("required")
    }
    if ($(this).attr("value") == "1") {
        $('#contenidopago').val("");
        $("#contenidocosto").show('slow');
        $('#contenidopago').prop("required", true)

    }
});

function liberar() {
    $('#escprofesor').removeAttr("disabled");
    $('#escsalon').removeAttr("disabled");
}


$("#foto").focusout(function () {
    var foto = $("#foto")[0].files[0]
    console.log(foto);
    console.log(foto.name);
    if ((foto.type == "image/png") || (foto.type == "image/jpeg") || (foto.type == "image/pjpeg") || (foto.type == "image/jpg")) {
        $("#errorFoto").hide();
    } else {
        $("#foto").focus();
        $("#errorFoto").show();
        $("#errorFoto").css("color", "red");
        $("#errorFoto").html(function () {
            return "Formato de imagen invalido";
        });
        $("#foto").val("");

    }
})

$("#planContenido").focusout(function () {
    var file = $("#planContenido")[0].files[0]
    if (file.type == "application/pdf") {
        $("#errorPlanContenido").hide();
    } else {
        $("#planContenido").focus();
        $("#errorPlanContenido").show();
        $("#errorPlanContenido").css("color", "red");
        $("#errorPlanContenido").html(function () {
            return "Formato de archivo invalido";
        });
        $("#planContenido").val("");

    }
})
$("#planCosto").focusout(function () {
    var file = $("#planCosto")[0].files[0]
    if (file.type == "application/pdf") {
        $("#errorPlanCosto").hide();
    } else {
        $("#planCosto").focus();
        $("#errorPlanCosto").show();
        $("#errorPlanCosto").css("color", "red");
        $("#errorPlanCosto").html(function () {
            return "Formato de archivo invalido";
        });
        $("#planCosto").val("");
    }
})