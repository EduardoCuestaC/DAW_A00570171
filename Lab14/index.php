<?php
require_once "util.php";
require_once "queries.php";
echo "todas las notas:";
getNotes();
echo "las notas del usuario pedropp:";
getNotesByUser("pedropp");
echo "la nota con el id 2:";
getNotesByID("2");
echo "todas las notas y sus autores:";
getAllNotesAndAuthors();
include("preguntas.html");
