<?php session_start();
//Conexion base de datos

$conn = mysqli_connect("bzuqqebz7dygx0fzwoft-mysql.services.clever-cloud.com", "u0mt1l3vyqfvwppr", "zU6ukR0FW40qXLFDKalV", "bzuqqebz7dygx0fzwoft") or die("database Error");
$getMesg= mysqli_real_escape_string($conn,$_POST['text']);


if (mysqli_connect_errno()) {
    printf("Conexion Fallida: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT respuestasbecas, linksbecas FROM preguntasbecas WHERE preguntabecas LIKE '%$getMesg%'";
$query2 = "SELECT respuestasorientacion, links FROM preguntasorientacion WHERE preguntaorientacion LIKE '%$getMesg%'";
$query3 = "SELECT respuestasidiomas, link FROM preguntasidiomas where preguntaidiomas like '%$getMesg%'";
$query4 = "SELECT respuestaderechos, link FROM preguntasderechosyobligaciones where preguntaderechos like '%$getMesg%'";
$query5 = "SELECT RespuestasTutoria, link FROM preguntastutoria where PreguntasTutoria like '%$getMesg%'";

if ($result = mysqli_query($conn, $query)) {
    while ($row = mysqli_fetch_assoc($result)) {
        printf ("%s %s\n", $row["respuestasbecas"], $row["linksbecas"]);
    }

    mysqli_free_result($result);
}
if($result = mysqli_query($conn, $query2)) {
    while ($row = mysqli_fetch_assoc($result)) {
        printf ("%s (%s)\n", $row["respuestasorientacion"],$row["links"]);
    }
    mysqli_free_result($result);
}
if($result = mysqli_query($conn, $query3)) {
    while ($row = mysqli_fetch_assoc($result)) {
        printf ("%s (%s)\n", $row["respuestasidiomas"],$row["link"]);
    }
    mysqli_free_result($result);
}
if($result = mysqli_query($conn, $query4)) {
    while ($row = mysqli_fetch_assoc($result)) {
        printf ("%s (%s)\n", $row["respuestaderechos"],$row["link"]);
    }
    mysqli_free_result($result);
}
if($result = mysqli_query($conn, $query5)) {
    while ($row = mysqli_fetch_assoc($result)) {
        printf ("%s %s\n", $row["RespuestasTutoria"],$row["link"]);
    }
    mysqli_free_result($result);
}


/* Cierra la conexion */
mysqli_close($conn);


?>