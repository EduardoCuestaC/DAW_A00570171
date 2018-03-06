<?php

    include("../partials/_header.html");
    include("../partials/_top_bar.html");


    //************************

    include("../html/visitors1.html");

    include("regexps.php");
    include("../queries/util.php");

    if(count($_POST)>0){
        if(!isset($_POST["visitante"]["genero"]) || !test($GENDER, $_POST["visitante"]["genero"]))
            $_POST["visitante"]["genero"] = null;
        if(!isset($_POST["visitante"]["gradoEstudios"]) || !test($SCHOOLING, $_POST["visitante"]["gradoEstudios"]))
            $_POST["visitante"]["gradoEstudios"] = null;
    }

    if(count($_POST)>0
        && (($_POST["visitante"]["idVisitante"] == null) || test($NUMBER, $_POST["visitante"]["idVisitante"]))
        && (($_POST["visitante"]["nombre"] == null) || test($NAME, $_POST["visitante"]["nombre"]))
        && (($_POST["visitante"]["apellidoPaterno"] == null) || test($NAME, $_POST["visitante"]["apellidoPaterno"]))
        && (($_POST["visitante"]["apellidoMaterno"] == null) || test($NAME, $_POST["visitante"]["apellidoMaterno"]))
        && (($_POST["visitante"]["fechaNacimiento"] == null) || test($DATE, $_POST["visitante"]["fechaNacimiento"]))
        && (($_POST["visitante"]["genero"] == null) || test($GENDER, $_POST["visitante"]["genero"]))
        && (($_POST["visitante"]["gradoEstudios"] == null) || test($SCHOOLING, $_POST["visitante"]["gradoEstudios"]))

        && (isset($_POST["actionTypeEntry"])) && (($_POST["actionTypeEntry"] == "search") || ($_POST["actionTypeEntry"] == "entry"))

    ){
        $nulls = 0;
        foreach($_POST["visitante"] as $key => $value){
            if($value != null)
                $info[$key] = htmlspecialchars($value);
            else{
                $info[$key] = "";
                if($key!="idVisitante")
                    $nulls++;
            }
        }
        if(isset($info)) {
            if ($_POST["actionTypeEntry"] == "search") {
                echo "<div class='row'><div class='col-12'><table class='table table-hover'>";
                echo buildTableData(queryVisitor(
                                        $info["idVisitante"],
                                        $info["nombre"],
                                        $info["apellidoPaterno"],
                                        $info["apellidoMaterno"],
                                        $info["fechaNacimiento"],
                                        $info["genero"],
                                        $info["gradoEstudios"]
                                        ));
                echo "</table></div></div>";


            } else if ($_POST["actionTypeEntry"] == "entry") {
                if($nulls == 0){
                    insertVisitor(
                        $info["nombre"],
                        $info["apellidoPaterno"],
                        $info["apellidoMaterno"],
                        $info["fechaNacimiento"],
                        $info["genero"],
                        $info["gradoEstudios"]);
                }
            }
        }
    }

    include("../html/visitors2.html");

    //************************


    include("../partials/_footer.html");