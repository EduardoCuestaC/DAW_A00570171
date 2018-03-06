function main() {
  $('.projects').hide();

  $('.projects-button').on('click', function() {
        $(this).next().toggle();
    if($(this).text() == "Ocultar Permisos")
        $(this).text("Ver Permisos");
    else
        $(this).text("Ocultar Permisos");
    });
}

$(document).ready(main);

addBookButton = document.getElementById("addBook");
if(addBookButton != null) {
    addBookButton.onclick = addBookInput;
}
var n = 0;
bookInputs = document.getElementsByClassName("book-input");

function addBookInput(){
    if(n < bookInputs.length){
        bookInputs[n].style.height = "86px";
        n = n+1;
        if( n >= bookInputs.length){
            addBookButton.style.display = "none";
        }
    }
}
