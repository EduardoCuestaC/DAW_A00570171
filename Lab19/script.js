document.getElementById("searchbar").onkeyup= function(){
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState === XMLHttpRequest.DONE && r.status === 200) {
            var sugs = document.getElementById("suggestions");
            if(document.getElementById("searchbar").value.length > 0){
                sugs.innerHTML = r.responseText;
                var items  = sugs.getElementsByTagName("li");
                if(items != null)
                    for(var i = 0; i<items.length; i++){
                       items[i].classList.add("suggestionItem");
                       items[i].onclick = function(){
                            document.getElementById("searchbar").value = this.innerHTML;
                        }

                    }
            }
            else
                sugs.innerHTML = "";
        }
    };
    r.open("POST", "process.php");
    r.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    var s = document.getElementById("searchbar").value;
    r.send("search="+encodeURIComponent(s));
};

document.getElementById("searchbar").onkeypress = function(event){
    if(event.keyCode == 13){ //user presses enter
        event.preventDefault();
    }
};

document.getElementById("searchButton").onclick = function(event){
    event.preventDefault();
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState === XMLHttpRequest.DONE && r.status === 200) {
            if(document.getElementById("searchbar").value.length > 0){
                alert(r.responseText);
                if(document.getElementById("lastSearches").innerText == "")
                    document.getElementById("lastSearches").innerHTML = "<h4>Últimas búsquedas:</h4>";
                document.getElementById("lastSearches").innerHTML += document.getElementById("searchbar").value+" ("+r.responseText+")<br>";
            }
            else
                sugs.innerHTML = "";
        }
    };
    r.open("POST", "process.php");
    r.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    var s = document.getElementById("searchbar").value;
    r.send("search="+encodeURIComponent(s)+"&searched=true");
};