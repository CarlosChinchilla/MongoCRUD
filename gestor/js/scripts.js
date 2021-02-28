
/*-----------------VALIDACION INSERTAR----------------*/

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

    if (isNaN(datos[2].value) || datos[2].value <= 0 || datos[2].value.length >= 3){

        todoOk = false;

        datos[2].style.background = "#FDD4D4";

    }else{

        datos[2].style.background = "#ffffff";

    }

    if (isNaN(datos[3].value) || datos[3].value <= 0 || datos[3].value.length >= 3){

        todoOk = false;

        datos[3].style.background = "#FDD4D4";

    }else{

        datos[3].style.background = "#ffffff";

    }

    if (isNaN(datos[4].value) || datos[4].value <= 0 || datos[4].value.length >= 3){

        todoOk = false;

        datos[4].style.background = "#FDD4D4";

    }else{

        datos[4].style.background = "#ffffff";

    }

    if(todoOk){

        //submit
        document.getElementById('formRest').submit();
        alert("Éxito: Fatui creado correctamente");

    }else{
        alert("Error: Existen campos con datos erroneos");
    }
}

/*-----------------VALIDACION EDITAR----------------*/

function validacionEditar(id){

    var todoOk = true;

    var formulario = document.getElementsByTagName("formRestEdit");

    var datos = formRestEdit.getElementsByTagName("input");

    var selects = formRestEdit.getElementsByTagName("select");


    if (selects[0].value == ""){

        todoOk = false;

        selects[0].style.background = "#FDD4D4";

    }else{

        selects[0].style.background = "#ffffff";

    }

    if(datos[0].value == 0){

        todoOk = false;

    }

    if (datos[1].value == "" || datos[1].value.length >= 15){

        todoOk = false;

        datos[1].style.background = "#FDD4D4";

    }else{

        datos[1].style.background = "#ffffff";

    }

    if (isNaN(datos[2].value) || datos[2].value <= 0 || datos[2].value.length >= 3){

        todoOk = false;

        datos[2].style.background = "#FDD4D4";

    }else{

        datos[2].style.background = "#ffffff";

    }

    if (isNaN(datos[3].value) || datos[3].value <= 0 || datos[3].value.length >= 3){

        todoOk = false;

        datos[3].style.background = "#FDD4D4";

    }else{

        datos[3].style.background = "#ffffff";

    }

    if (isNaN(datos[4].value) || datos[4].value <= 0 || datos[4].value.length >= 3){

        todoOk = false;

        datos[4].style.background = "#FDD4D4";

    }else{

        datos[4].style.background = "#ffffff";

    }

    if(todoOk){

        //submit
        document.getElementById('formRestEdit').submit();
        alert("Éxito: Fatui editado correctamente");

    }else{
        alert("Error: Existen campos con datos erroneos");
    }
}

/*----------------AJAX-----------------*/

function ajax() {
    try {
        req = new XMLHttpRequest();
    } catch(err1) {
        try {
            req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (err2) {
            try {
                req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (err3) {
                req = false;
            }
        }
    }
    return req;
}

//--------------Borrar fatui

var borrar = new ajax();
function borrarFatui(id) {

    if(confirm("¿Desea eliminar el Fatui seleccionado?")) {
        var myurl = 'gestor/llamadas/borrarFatui.php';
        myRand = parseInt(Math.random() * 999999999999999);
        //alert(id);
        modurl = myurl + '?rand=' + myRand + '&id=' + id;
        borrar.open("GET", modurl, true);
        borrar.onreadystatechange = borrarFatuiResponse;
        borrar.send(null);
    }
}

function borrarFatuiResponse() {

    if (borrar.readyState == 4) {
        if(borrar.status == 200) {

            var listaFatuis = borrar.responseText;

            document.getElementById('listaFatuis').innerHTML =  listaFatuis;
        }
    }
}

//--------------Buscar fatui

var buscar = new ajax();
function buscarFatui(busqueda) {

    var myurl = 'gestor/llamadas/buscarFatui.php';
    myRand = parseInt(Math.random() * 999999999999999);
    //alert(id);
    modurl = myurl + '?rand=' + myRand + '&busqueda=' + busqueda;
    buscar.open("GET", modurl, true);
    buscar.onreadystatechange = buscarFatuiResponse;
    buscar.send(null);

}

function buscarFatuiResponse() {

    if (buscar.readyState == 4) {
        if(buscar.status == 200) {

            var listaFatuis = buscar.responseText;

            document.getElementById('listaFatuis').innerHTML =  listaFatuis;
        }
    }
}

//--------------Editar fatui Ventana

var editar = new ajax();
function editarFatui(id) {

    var myurl = 'gestor/llamadas/editFatui.php';
    myRand = parseInt(Math.random() * 999999999999999);
    //alert(id);
    modurl = myurl + '?rand=' + myRand + '&id=' + id;
    editar.open("GET", modurl, true);
    editar.onreadystatechange = editFatuiResponse;
    editar.send(null);

}

function editFatuiResponse() {

    if (editar.readyState == 4) {
        if(editar.status == 200) {

            var editFatui = editar.responseText;

            document.getElementById('formRestEdit').innerHTML =  editFatui;
        }
    }
}

