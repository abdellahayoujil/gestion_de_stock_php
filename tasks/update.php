<?php 
require_once('../layout/header.php');

if(!$_GET['id']){
    header('Location:gestion.php');
}
$task_id = $_GET['id'];

$query = 'SELECT * FROM produit WHERE id = :task_id';

$stmt = $conn->prepare($query);

$stmt->bindParam(':task_id', $task_id, PDO::PARAM_INT);

$stmt->execute();

$task = $stmt->fetch(PDO::FETCH_ASSOC);

$title = $task['title'];
$date = $task['date'];
$body = $task['body'];
$done = $task['done'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'];
    $date = $_POST['date'];
    $body = $_POST['body'];
    $done = $_POST['done'] ?? 0;

require_once('../helpers/valide.php');

    if(!$errors){
        $query = "UPDATE produit SET title = :title , date = :date , body = :body , done = :done WHERE id = :task_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':task_id', $task_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':body', $body);
        $stmt->bindParam(':done', $done);
        $stmt->execute();
        header('Location:gestion.php');
    } 
}
?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-10 mx-auto">
            <?php if(isset($errors)): ?>
                <?php foreach($errors as $er):?>
                    <div class="alert alert-danger mx-5">
                    <?php echo $er?>
                    </div>
                <?php endforeach; ?> 
            <?php endif; ?>
            <div class="card">
                <div class="card-body">
                   <div class="row">
                    <div class="col-md-8 mx-auto">
                        <form method="POST">
                            <div class="mb-3">
                                <h1 align = "center" >Gestion de Stock</h1>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">modifier le titre de produit :</label>
                                <input type="text" class="form-control" name="title" id="titl" aria-describedby="text" value="<?php if(isset($title)) echo $title?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">modifier la date d'aujourd'hui et l'heure :</label>
                                <input type="datetime-local" class="form-control" name="date" id="date" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">modifier la description</label>
                                <textarea rows="5" class="form-control" name="body"  id="body"><?php if(isset($body)) echo $body?></textarea>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">valide c'est produit : </label>
                                <input type="checkbox" name="done" id="done"
                                    <?php if($done): ?> checked <?php endif; ?>
                                    value="1"
                                    class="form-check-input"
                                >
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary">sauvegarder</button>
                        </form>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>