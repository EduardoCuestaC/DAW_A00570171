<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <p>
        Phpinfo muestra información sobre el estado del PHP que se está ejecutando, permitiendo a quien use el comando conocer
        la versión, extensiones, versión del sistema operativo, información del servidor, opciones de compilación, rutas y configuraciones.
        Suele utilizarse para revisar las opciones de configuración y parámetros de un sistema. También sirve para acceder a las
        variables superglobales de PHP: GET (para recolectar datos desde formas y URLs),
        POST (para pasar variables y recolectar datos de formas),
        Server (con información acerca de los scripts en el servidor y sus rutas), Cookie (para pasar variables desde cookies http)
        y Request (con toda la información de get, post y cookie).
    </p>
    <p>

    </p>
    <p>
        Un archivo con la extensión .php está comprendido por una serie de etiquetas HTML y scripts que se ejecutan en un servidor.
        El servidor lee el archivo .php y ejecuta las instrucciones que contiene para luego enviar el resultado en formato HTML.
        De este modo, el código que produce lo que ve el cliente no puede ser accedido desde fuera del servidor.
    </p>
    <h5>Fuentes:</h5>
    <p>HTML.net. Lesson 1: What is PHP.<a href="http://html.net/tutorials/php/lesson1.php">URL</a>.</p>
    <p>PHP.net. Phpinfo. <a href="http://php.net/manual/es/function.phpinfo.php">URL</a>.</p>
    <p>PHP.net. Phpinfo. <a href=http://php.net/manual/es/language.variables.superglobals.php>URL</a>.</p>

    <h3>Ejercicios:</h3>
    <form method="post">
        arreglo (números separados por comas): <input type="text" name="st">
        <br>
        número: <input type="number" name="n">
        <button type="submit">Enviar</button>
    </form>

<?php
/**
 * Created by PhpStorm.
 * User: A00570171
 * Date: 08/02/2018
 * Time: 09:13 AM
 */
function promedio($arr){
    $acum = 0;
    $ul = count($arr);
    for ($i = 0; $i < $ul; $i++) {
        $acum += $arr[$i];
    }
    return $acum/$ul;
}

function mediana($arr){
    $ul = count($arr);
    if($ul%2==0){
        return ($arr[$ul/2-1]+$arr[$ul/2])/2;
    }
    return $arr[ceil($ul/2-1)];
}

function sortMinMax($arr){
    $narr = $arr;
    sort($narr);
    return $narr;
}

function sortMaxMin($arr){
    $narr = $arr;
    sort($narr);
    $narr = array_reverse($narr);
    return $narr;
}

function printList($arr){
    $ul = count($arr);
    echo "<ul>";
    for ($i = 0; $i < $ul; $i++) {
        echo "<li>$arr[$i]</li>";
    }
    echo "</ul>";
}

function squares($n){
    $narr = array();
    for($i=0;$i<=$n;$i++){
        array_push($narr, $i**2);
    }
    return $narr;
}

function cubes($n){
    $narr = array();
    for($i=0;$i<=$n;$i++){
        array_push($narr, $i**3);
    }
    return $narr;
}

function tableSC($n){
    $as = squares($n);
    $ac = cubes($n);
    echo "<table border='2'><thead><tr><td>Cuadrados de 0<=n<=$n</td><td>Cubos de 0<=n<=$n</td></tr></thead><tbody>";
    for($i=0;$i<$n;$i++){
        echo "<tr><td>$as[$i]</td><td>$ac[$i]</td></tr>";
    }
    echo "</tbody></table>";
}


abstract class Animal{
    protected $weight;
    public function __construct($weight){
        $this->weight = $weight;
    }
    protected abstract function reportInfo();
    public function speak(){
        echo "soy un animal";
    }
}

class Dog extends Animal{
    private $color;
    public function __construct($weight, $color){
        //no se llama automáticamente
        parent::__construct($weight);
        $this->color = $color;
    }
    public function reportInfo(){
        echo "peso $this->weight kg y soy de color $this->color. guau";
    }
}

if(count($_POST)>0){
    $tarr = explode(",", str_replace(" ", "", $_POST["st"]));
    echo "array inicial: <br>";
    printList($tarr);
    echo "<br>promedio: "."<ul><li>".promedio($tarr)."</li></ul>";
    echo "<br>mediana: "."<ul><li>".mediana($tarr)."</li></ul>";
    echo "<br>de mayor a menor: <br>";
    printList(sortMaxMin($tarr));
    echo "<br>de menor a mayor: <br>";
    printList(sortMinMax($tarr));
    $n=$_POST["n"];
    tableSC($n);
}
echo "<br><br>";
$dog1 = new Dog(20, "negro");
echo "<h3>Ejercicio extra (herencia de clases en php):</h3><br>";
$dog1->speak();
echo "<br>";
$dog1->reportInfo();

?>
</body>
</html>