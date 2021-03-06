
/*-----------------VALIDACION INSERTAR----------------*/

function validacion(){

    var todoOk = true;

    var formulario = document.getElementsByTagName("formRest");

    var datos = formRest.getElementsByTagName("input");

    var selects = formRest.getElementsByTagName("select");

    var file = document.getElementById("file-name");


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

    if (datos[5].value == ""){

        todoOk = false;

        file.style.background = "#FDD4D4";

    }else{

        file.style.background = "#ffffff";

    }

    if(todoOk){

        //submit
        document.getElementById('formRest').submit();
        alert("Éxito: Fatui creado correctamente");

    }else{
        alert("Error: Existen campos con datos erroneos o vacíos");
    }
}

/*-----------------VALIDACION EDITAR----------------*/

function validacionEditar(id){

    var todoOk = true;

    var formulario = document.getElementsByTagName("formRestEdit");

    var datos = formRestEdit.getElementsByTagName("input");

    var selects = formRestEdit.getElementsByTagName("select");

    var file = document.getElementById("file-name");

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
        alert("Error: Existen campos con datos erroneos o vacíos");
    }
}

/*-----------------ARCHIVOS-------------------*/

function uploadFile(target) {
    document.getElementById("file-name").innerHTML = target.files[0].name;
}

function validacionFile(campo,n) {

    var filebox = document.getElementsByClassName("file-box");

    if (!(imagenValida.test(campo.value))){

        filebox[n].style.background = "#FDD4D4";

    }else{

        filebox[n].style.background = "#D6FDDF";

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
function borrarFatui(id,carpeta,imagen,idUsu) {

    if(confirm("¿Desea eliminar el Fatui seleccionado?")) {
        var myurl = 'gestor/llamadas/borrarFatui.php';
        myRand = parseInt(Math.random() * 999999999999999);
        //alert(id);
        modurl = myurl + '?rand=' + myRand + '&id=' + id + '&carpeta=' + carpeta + '&imagen=' + imagen + '&idUsu=' + idUsu;
        borrar.open("GET", modurl, true);
        borrar.onreadystatechange = borrarFatuiResponse;
        borrar.send(null);
    }
}

function borrarFatuiResponse() {

    if (borrar.readyState == 4) {
        if(borrar.status == 200) {

            var listaFatuis = borrar.responseText;

            document.getElementById('listaMisFatuis').innerHTML =  listaFatuis;
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

//--------------Buscar fatui ID usu

var buscarIdUsu = new ajax();
function buscarFatuiIdUsu(busqueda) {

    var myurl = 'gestor/llamadas/buscarFatuiIdUsu.php';
    myRand = parseInt(Math.random() * 999999999999999);
    //alert(id);
    modurl = myurl + '?rand=' + myRand + '&busqueda=' + busqueda;
    buscarIdUsu.open("GET", modurl, true);
    buscarIdUsu.onreadystatechange = buscarFatuiIdUsuResponse;
    buscarIdUsu.send(null);

}

function buscarFatuiIdUsuResponse() {

    if (buscarIdUsu.readyState == 4) {
        if(buscarIdUsu.status == 200) {

            var listaFatuis = buscarIdUsu.responseText;

            document.getElementById('listaMisFatuis').innerHTML =  listaFatuis;
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

$(document).ready(function() {

    $("#busqueda").keypress(function(event) {
        if (event.which === 13) {
            buscarFatui(document.getElementById('busqueda').value);
        }
    });

    $("#mibusqueda").on('keypress', function (e) {
        if (e.which == 13) {
            buscarFatuiIdUsu(document.getElementById('mibusqueda').value);
        }
    });
});

/*-----------------VALIDACION REGISTRO----------------*/

function validacionRegistro(){

    var todoOk = true;

    var formulario = document.getElementsByTagName("reg");

    var datos = reg.getElementsByTagName("input");

    var Vemail=/^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/;

    //nombre
    if (datos[1].value == "" || datos[1].value.length >= 15){

        todoOk = false;

        datos[1].style.background = "#FDD4D4";

    }else{

        datos[1].style.background = "#ffffff";

    }

    //email
    if (datos[2].value == "" || Vemail.test(datos[2].value)==false){

        todoOk = false;

        datos[2].style.background = "#FDD4D4";

    }else{

        datos[2].style.background = "#ffffff";

    }

    //password
    if (datos[3].value == "" || datos[3].value.length >= 15){

        todoOk = false;

        datos[3].style.background = "#FDD4D4";

    }else{

        datos[3].style.background = "#ffffff";

    }

    //rep password
    if (datos[3].value != datos[4].value){

        todoOk = false;

        datos[4].style.background = "#FDD4D4";

    }else{

        datos[4].style.background = "#ffffff";

    }

    if(todoOk){

        //submit
        document.getElementById('reg').submit();

    }else{
        alert("Error: Existen campos con datos erroneos o vacíos");
    }
}

/*-----------------VALIDACION REGISTRO----------------*/

function validacionLogin(){

    var todoOk = true;

    var formulario = document.getElementsByTagName("login");

    var datos = login.getElementsByTagName("input");

    var Vemail=/^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/;


    //email
    if (datos[1].value == "" || Vemail.test(datos[1].value)==false){

        todoOk = false;

        datos[1].style.background = "#FDD4D4";

    }else{

        datos[1].style.background = "#ffffff";

    }

    //password
    if (datos[2].value == "" || datos[2].value.length >= 15){

        todoOk = false;

        datos[2].style.background = "#FDD4D4";

    }else{

        datos[2].style.background = "#ffffff";

    }

    if(todoOk){

        //submit
        document.getElementById('login').submit();

    }else{
        alert("Error: Datos incorrecto");
    }
}