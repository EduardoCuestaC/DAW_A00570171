var numBotellas = 0;
var numMochilas = 0;
var numLibretas = 0;

document.getElementById("botella").addEventListener("click", function(){
    numBotellas = document.getElementById("nbotellas").value;
    if(numBotellas>5){
        alert("esa cantidad excede el inventario");
        document.getElementById("nbotellas").value = 0;
        numBotellas = 0;
    }
    updateTotal();
});

document.getElementById("libreta").addEventListener("click", function(){
    numLibretas = document.getElementById("nlibretas").value;
    if(numLibretas>2){
        alert("esa cantidad excede el inventario");
        document.getElementById("nlibretas").value = 0;
        numLibretas = 0;
    }
    updateTotal();
});

document.getElementById("mochila").addEventListener("click", function(){
    numMochilas = document.getElementById("nmochilas").value;
    if(numMochilas>1){
        alert("esa cantidad excede el inventario");
        document.getElementById("nmochilas").value = 0;
        numMochilas = 0;
    }
    updateTotal();
});

function updateTotal(){
    document.getElementById("totalDisplay").innerText= "Total: "+(numMochilas*100+numLibretas*30+numBotellas*10)*1.16;
}
