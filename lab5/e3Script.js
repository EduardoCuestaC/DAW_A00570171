document.forms["form"]["submit"].addEventListener("click", function(){
    testName();
    testLastnames();
    testMail();
    testText();
    if(testName()&&testLastnames()&&testMail()&&testText())
        return false;
});


function testName(){
    var t = "Nombre inválido";
    var b = false;
    if(/^[A-ZÁÉÍÓÚ'][a-z'áéíóú]+$/.test(document.forms["form"]["name"].value)){
        t = "Nombre válido";
        b=true;
    }
    document.getElementById("nameLabel").innerText = t;
    return b;
}

function testLastnames(){
    var t = "Apellidos inválidos";
    var b = false;
    if(/^[A-ZÁÉÍÓÚ'][a-z'áéíóú]+\s[A-ZÁÉÍÓÚ'][a-z'áéíóú]*$/.test(document.forms["form"]["lastnames"].value) || /^[A-ZÁÉÍÓÚ'][a-z'áéíóú]+$/.test(document.forms["form"]["lastnames"].value)) {
        t = "Apellidos válidos";
        b = true;
    }
    document.getElementById("lastnamesLabel").innerText = t;
    return b;
}

function testMail(){
    var t = "correo electrónico inválido";
    var b = false;
    if(/^[A-Za-z0-9]+@[A-Za-z0-9]+\.[a-z]+$/.test(document.forms["form"]["mail"].value)){
        t = "correo electrónico válido";
        b = true;
    }
    document.getElementById("mailLabel").innerText = t;
    return b;
}

function testText(){
    var t = "¡Gracias por tu sugerencia!";
    var b = true;
        if(document.forms["form"]["text"].value==""){
            t = "El campo de sugerencias está vacío.";
            b = false;
        }
    document.getElementById("textLabel").innerText = t;
        return b;
}