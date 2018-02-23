<?php
    $matches = 1;
    include("partials/_header.html");
    include("partials/_top_bar.html");
    include("html/visitors1.html");
    include("regexps.php");

    if(count($_POST)>0){
        if(!isset($_POST["user"]["gender"]) || !test($GENDER, $_POST["user"]["gender"]))
            $_POST["user"]["gender"] = null;
        if(!isset($_POST["user"]["schooling"]) || !test($SCHOOLING, $_POST["user"]["schooling"]))
            $_POST["user"]["schooling"] = null;
    }

    if(count($_POST)>0
        && (($_POST["user"]["id"] == null) || test($NUMBER, $_POST["user"]["id"]))
        && (($_POST["user"]["name"] == null) || test($NAME, $_POST["user"]["name"]))
        && (($_POST["user"]["paternal"] == null) || test($NAME, $_POST["user"]["paternal"]))
        && (($_POST["user"]["maternal"] == null) || test($NAME, $_POST["user"]["maternal"]))
        && (($_POST["user"]["birth"] == null) || test($DATE, $_POST["user"]["birth"]))
        && (($_POST["user"]["gender"] == null) || test($GENDER, $_POST["user"]["gender"]))
        && (($_POST["user"]["schooling"] == null) || test($SCHOOLING, $_POST["user"]["schooling"]))
    ){
        $userInfo = $_POST["user"];
        $nullCounter = 0;
        foreach($userInfo as $key => $value){
            if($value != null)
                $value = htmlspecialchars($value);
            else
                $nullCounter++;
        }
        if($nullCounter<count($userInfo)){





            echo "<div class=\"row text-center\">
                <div class=\"col-sm-12\">
                    <table class=\"table table-hover\" id=\"userTable\">
                        <thead>
                            <tr>
                                <td>Nombre</td>
                                <td>Fecha de nacimiento</td>
                                <td>Género</td>
                                <td>Escolaridad</td>
                            </tr>
                        </thead>
                        <tbody>";
            for($i=0;$i<$matches;$i++){
                echo "  <tr>
                        <td>".$userInfo["name"]." ".$userInfo["paternal"]." ".$userInfo["maternal"]."</td>
                        <td>".$userInfo["birth"]."</td>
                        <td>".$userInfo["gender"]."</td>
                        <td>".$userInfo["schooling"]."</td>
                    </tr>";
            }
            echo "</tbody></table></div></div>";





        }
    }
    include("html/visitors2.html");
    include("partials/_footer.html");

