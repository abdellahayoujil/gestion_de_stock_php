<?php require_once('../database/db.php');

if(!$_GET['id']){
    header('Location:gestion.php');
}
$task_id = $_GET['id'];

$query = "DELETE FROM produit WHERE id = :task_id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':task_id', $task_id, PDO::PARAM_INT);

if($stmt->execute()) header('Location:gestion.php');
    

?>