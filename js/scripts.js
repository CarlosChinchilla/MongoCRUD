
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