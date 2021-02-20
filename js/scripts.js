
//Menu Main desplegable
$(document).ready(function(){
    $("#movMenu").click(function(){
        $("#navegadorMain").slideToggle("slow");
    });
});

//Menu Usuario desplegable
$(document).ready(function(){
    $("#userInfo").click(function(){
        $("#navegadorUser").slideToggle("slow");
    });
});

//login
$(document).ready(function(){
    $("#iniciarSesion").click(function(){
        $("#modal").fadeIn();
    });
});
$(document).ready(function(){
    $("#cerrrarLogin").click(function(){
        $("#modal").fadeOut();
    });
});

//VALIDACION
function validacion(){

    var todoOk = true;

    var formulario = document.getElementsByTagName("formRest");

    var datos = formRest.getElementsByTagName("input");

    var selects = formRest.getElementsByTagName("select");


    if (selects[0].value == ""){

        todoOk = false;

        selects[0].style.background = "#FDD4D4";

    }else{

        selects[0].style.background = "#ffffff";

    }

    if (datos[1].value == ""){

        todoOk = false;

        datos[1].style.background = "#FDD4D4";

    }else{

        datos[1].style.background = "#ffffff";

    }

    if (datos[2].value == 0){

        todoOk = false;

        datos[2].style.background = "#FDD4D4";

    }else{

        datos[2].style.background = "#ffffff";

    }

    if (datos[3].value == 0){

        todoOk = false;

        datos[3].style.background = "#FDD4D4";

    }else{

        datos[3].style.background = "#ffffff";

    }

    if (datos[4].value == 0){

        todoOk = false;

        datos[4].style.background = "#FDD4D4";

    }else{

        datos[4].style.background = "#ffffff";

    }

    if(todoOk){

        //document.getElementById('formRest').submit();
        alert("OK");
    }else{
        alert("Existen campos con datos erroneos");
    }

    //alert("Todo OK");
}
