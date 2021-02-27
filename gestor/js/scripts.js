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

    if (datos[1].value == "" || datos[1].value.length >= 15){

        todoOk = false;

        datos[1].style.background = "#FDD4D4";

    }else{

        datos[1].style.background = "#ffffff";

    }

    if (isNaN(datos[2].value) || datos[2].value >= 0 || datos[2].value.length >= 3){

        todoOk = false;

        datos[2].style.background = "#FDD4D4";

    }else{

        datos[2].style.background = "#ffffff";

    }

    if (isNaN(datos[3].value) || datos[3].value >= 0 || datos[3].value.length >= 3){

        todoOk = false;

        datos[3].style.background = "#FDD4D4";

    }else{

        datos[3].style.background = "#ffffff";

    }

    if (isNaN(datos[4].value) || datos[4].value >= 0 || datos[4].value.length >= 3){

        todoOk = false;

        datos[4].style.background = "#FDD4D4";

    }else{

        datos[4].style.background = "#ffffff";

    }

    if(todoOk){

        //submit
        document.getElementById('formRest').submit();

    }else{
        alert("Existen campos con datos erroneos");
    }
}