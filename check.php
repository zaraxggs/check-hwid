<?php


$hwid = $_GET["hwid"] ?? null;

if (!$hwid) {
    echo json_encode(["error" => "no hwid"]);
    exit;
}


$conn = new mysqli(
    $_ENV["DB_HOST"],
    $_ENV["DB_USER"],
    $_ENV["DB_PASS"],
    $_ENV["DB_NAME"],
    $_ENV["DB_PORT"]
);

if ($conn->connect_error) {
    echo json_encode(["error" => "db error"]);
    exit;
}


$stmt = $conn->prepare(
    "SELECT motivo FROM bans WHERE hwid_hash = ?"
);

$stmt->bind_param("s", $hwid);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    echo json_encode([
        "ban" => true,
        "motivo" => $row["motivo"]
    ]);
} else {
    echo json_encode([
        "ban" => false
    ]);
}

?>

