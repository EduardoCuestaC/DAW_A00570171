function writeBackButton(){
    document.write("<br><button onclick="+"location.reload()"+">volver al menú</button>");
}

function first(){
    var number =  prompt("escribe un número");
    document.write("<table border='2px'><thead><tr><td>número</td><td>cuadrado</td><td>cubo</td></tr></thead>");
    for(var i =1; i<=number;i++){
        document.write("<tr><td>"+i+"</td><td>"+Math.pow(i, 2)+"</td><td>"+Math.pow(i, 3)+"</td></tr>");
        console.log("hola");
    }
    document.write("</table>");
    writeBackButton();
}

function second(){
    var a = Math.floor(Math.random()*10);
    var b = Math.floor(Math.random()*10);
    var d = Date.now();
    var c = prompt("cuánto es "+a+" + "+b+" ?");
    if(c==a+b)
        document.write("correcto!");
    else
        document.write("incorrecto, la respuesta es "+(a+b)+"<br>");
    document.write((Date.now()-d)/1000+" segundos");
    writeBackButton();
}

function nullSafeLength(a){
    if(a==null)
        return 0;
    return a.length;
}

function third(){
    var inputString = prompt("escribe una secuencia de números.\n0.0, 0, 1, .5 y 0 5.5 .3 son ejemplos de secuencias válidas");
    //var matchedArray = inputString.match(/-?[0-9]*\.[0-9]+|-?[0-9]+/g);
    var rexp = /-?0*\.0+|-?0+/g;
    var nrexp = /-[0-9]*\.[0-9]+|-[0-9]+/g;
    var zeroArray = inputString.match(rexp);
    inputString = inputString.replace(rexp, "");
    var negArray = inputString.match(nrexp);
    inputString = inputString.replace(nrexp, "");
    var posArray = inputString.match(/[0-9]*\.[0-9]+|[0-9]+/g);

    var l = nullSafeLength;
    document.getElementById("output").innerText =  "encontrado: "+l(zeroArray)+" ceros, "+l(posArray)+" positivos, "+l(negArray)+" negativos.";
}

function getAverage(array){
    var avg = 0;
    for(var i = 0; i < array.length; i++){
        avg += array[i]/array.length;
    }
    return avg;
}

function captureArray(){
    var inputString = prompt("escribe una secuencia de números.\n0.0, 0, 1, .5 y 0 5.5 .3 son ejemplos de secuencias válidas");
    if(inputString == null)
        return [0];
    return inputString.match(/-?[0-9]*\.[0-9]+|-?[0-9]+/g);

}

function captureMatrix(){
    var mat = [];
    var n = prompt("¿cuántos arrays deseas promediar?");
    n = n.match(/[0-9]*\.[0-9]+|[0-9]+/);
    if(n[0]==null)
        return [[0]];
    for(var i = 0; i < n[0]; i++)
        mat.push(captureArray());
    return mat;
}

function fourth(){
    var m = captureMatrix();
    var newArray  = [];
    for(var i = 0; i < m.length; i++){
        newArray.push(getAverage(m[i]));
    }
    document.getElementById("output").innerText = "promedios: "+ newArray.toString().replace(',', ", ");
}

function fifth(){
    var text = prompt("escribe algo");
    if(text == null)
        return;
    document.getElementById("output").innerText = text.split("").reverse().toString().replace(/,/g, "");
}