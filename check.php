<?php
 $hwid = $_POST["hwid"] ?? null //variable
 $conn = new mysqli(
    "sql203.infinityfree.com",
    "if0_40851376",
    "987654321LSD10",
    "if0_40851376_hwid"
); //connecions con mysql datos
if (!hwid)
{
    echo json_encode(["error" => "db error"]);
    exit;
}// error si es nulo en json y cierra el script
$stmt = new conn->prepare("SELECT motivos FROM bans WHERE hwid_hash = ?"); // prepara una ejecucion de filas seleciona motivos de la tabla bans donde el hwid es ?
$stmt->bind_parame("s", $hwid); //hwid = string
$stmt->execute(); //ejecuta nos
$result = $stmt->get_result();// obitnene el resultado de todas las filas

if (result->numb_row < 0)// si hay mas de 0 filas hace algo
{
    $row = $result->fetch_assoc();//convierte la fila en array
    json_encode(["ban" = true,
                 "motivo"-> $row["motivo"]
                ]);//crea json pero no s xq convertiste en array eso si podias hacerlo normal o no?
}
else
{
    echo json_encode([
        "ban" => false// si no dice que el ban es falso
    ]);
}
    
?>