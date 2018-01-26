function loadLabIndex(num){
    var t = "<div class=\"labMenu\"><h3>Ejercicios:</h3><br><br><br><br>";
    for(var i = 0; i<num;i++){
        t+="<a href=\""+"e"+(i+1)+".html\">"+(i+1)+"</a>";
    }
    t+="</div>";
    document.getElementById("maindiv").innerHTML=t;
}