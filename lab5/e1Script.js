function f(){
    var x = document.forms["form"]["pass"].value;
    var alertString;
    if(!(x.length>7&&/[0-9]+/.test(x)&&/[a-z]+/.test(x)&&/[A-Z]+/.test(x)&&(x.replace(/[0-9a-zA-Z]/g,"").length>0))){
        document.getElementById("label").innerText="La contraseña debe tener al menos ocho caracteres, y contener al menos un número, una mayúscula, una minúscula y un caracter especial.";
        return false;
    }
    document.getElementById("label").innerText="Contraseña válida";
    if(x!=document.forms["form"]["pass2"].value){
        document.getElementById("label2").innerText="Las contraseñas no son iguales";
        return false;
    }
    document.getElementById("label2").innerText="Las contraseñas son iguales";
    alert("La contraseña se ha registrado");
}

document.forms["form"]["button"].addEventListener("mousedown",function(){
    document.forms["form"]["pass"].type="text";
});
document.forms["form"]["button"].addEventListener("mouseout",function(){
    document.forms["form"]["pass"].type="password";
});
document.forms["form"]["button"].addEventListener("mouseup",function(){
    document.forms["form"]["pass"].type="password";
});

document.forms["form"]["button2"].addEventListener("mousedown",function(){
    document.forms["form"]["pass2"].type="text";
});
document.forms["form"]["button2"].addEventListener("mouseout",function(){
    document.forms["form"]["pass2"].type="password";
});
document.forms["form"]["button2"].addEventListener("mouseup",function(){
    document.forms["form"]["pass2"].type="password";
});


document.forms["form"]["submit"].addEventListener("click",f);
