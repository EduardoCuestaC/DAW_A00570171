
document.forms["form"]["name"].addEventListener("focus", showTips);
document.forms["form"]["name"].addEventListener("focusout", wrap);


function wrap(){
    hideTips();
    var v = document.forms["form"]["name"].value+"";
    if(v!=""){
        alert("hola, "+v);
    }
}
function hideTips(){
    document.getElementById("tips").innerText="";
}
function showTips(){
    document.getElementById("tips").innerText="Pon aquí tu nombre";
}

document.getElementById("toChangeStyle").addEventListener("mouseover", function(){
    document.getElementById("toChangeStyle").style.color = "blue";
    document.getElementById("toChangeStyle").style.textAlign = "right";
});

document.getElementById("toChangeStyle").addEventListener("mouseout", function(){
    document.getElementById("toChangeStyle").style.color = "black";
    document.getElementById("toChangeStyle").style.textAlign = "left";
});

setTimeout(function(){
    alert("hola");
}, 1000);

(function() {
    var state = false;

    var f = setInterval(function () {
        state = !state;
        updateBlink();
    }, 2000);

    document.getElementById("stopBlink").addEventListener("click", function() {
        clearInterval(f);
        document.getElementById("stopBlink").style.visibility="hidden";
    });

    function updateBlink() {
        var r = "";
        if (state)
            r = "parpadeo";
        else
            r = "";
        document.getElementById("blinking").innerText = r;
    }
})();