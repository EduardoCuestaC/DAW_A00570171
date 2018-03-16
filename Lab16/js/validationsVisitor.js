
document.getElementById("visitante_form").onsubmit = validate;

function validate(event) {

    var idVisitante = document.getElementById("visitante_idVisitante").value;
    var nombre = document.getElementById("visitante_nombre").value;
    var apellidoPaterno = document.getElementById("visitante_apellidoPaterno").value;
    var apellidoMaterno = document.getElementById("visitante_apellidoMaterno").value;
    var fechaNacimiento = document.getElementById("visitante_fechaNacimiento").value;
    var gradoEstudios = document.getElementById("visitante_gradoEstudios").value;
    var genero = document.getElementById("visitante_genero").value;

    var passed = true;

    if(idVisitante != "" && !test(NUMBER, idVisitante)){
        document.getElementsByClassName("warning")[1].style.display = "inline-block";
        passed = false;
    }else{
        document.getElementsByClassName("warning")[1].style.display = "none";
    }

    if(nombre != "" && !test(NAME, nombre)){
        document.getElementsByClassName("warning")[2].style.display = "inline-block";
        passed = false;
    }else{
        document.getElementsByClassName("warning")[2].style.display = "none";
    }

    if(apellidoPaterno != "" && !test(NAME, apellidoPaterno)){
        document.getElementsByClassName("warning")[3].style.display = "inline-block";
        passed = false;
    }else{
        document.getElementsByClassName("warning")[3].style.display = "none";
    }

    if(apellidoMaterno != "" && !test(NAME, apellidoMaterno)){
        document.getElementsByClassName("warning")[4].style.display = "inline-block";
        passed = false;
    }else{
        document.getElementsByClassName("warning")[4].style.display = "none";
    }

    if(fechaNacimiento != "" && !test(DATE, fechaNacimiento)){
        document.getElementsByClassName("warning")[5].style.display = "inline-block";
        passed = false;
    }else{
        document.getElementsByClassName("warning")[5].style.display = "none";
    }

    if(gradoEstudios != "" && !test(SCHOOLING, gradoEstudios)){
        document.getElementsByClassName("warning")[6].style.display = "inline-block";
        passed = false;
    }else{
        document.getElementsByClassName("warning")[6].style.display = "none";
    }

    if(genero != "" && !test(GENDER, genero)){
        document.getElementsByClassName("warning")[7].style.display = "inline-block";
        passed = false;
    }else{
        document.getElementsByClassName("warning")[7].style.display = "none";
    }

    if(!passed){
        event.preventDefault();
    }

}

document.getElementById("registrarEntrada").onclick = function(event){
    var nombre = document.getElementById("visitante_nombre").value;
    var apellidoPaterno = document.getElementById("visitante_apellidoPaterno").value;
    var apellidoMaterno = document.getElementById("visitante_apellidoMaterno").value;
    var fechaNacimiento = document.getElementById("visitante_fechaNacimiento").value;
    var gradoEstudios = document.getElementById("visitante_gradoEstudios").value;
    var genero = document.getElementById("visitante_genero").value;

    var passed = true;

    if(nombre == "" || nombre == null){
        passed = false;
    }
    if(apellidoPaterno == "" || apellidoPaterno == null){
        passed = false;
    }
    if(apellidoMaterno == "" || apellidoMaterno == null){
        passed = false;
    }
    if(fechaNacimiento == "" || fechaNacimiento == null){
        passed = false;
    }
    if(gradoEstudios == "" || gradoEstudios == null){
        passed = false;
    }
    if(genero == "" || genero == null){
        passed = false;
    }


    if(!passed)
        document.getElementsByClassName("warning")[0].style.display = "inline-block";
    else
        document.getElementsByClassName("warning")[0].style.display = "none";
};



$("input").foreach(f(){

})

table{
    div{
        thea{

        }
        tbody{

        }
    }
}