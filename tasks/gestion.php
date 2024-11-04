<?php require_once('../layout/footer.php');?>
<?php 
require_once('../layout/header.php');

$query = $conn->prepare("SELECT * FROM produit");
        $query->execute();
        $tasks = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <div class="row my-4">
            <div class="col-md-10 mx-auto">
                <div class="my-3">
                    <a href="create.php" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                            <th scope="col">id</th>
                            <th scope="col">titre de produit</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Date et heure d'ajout</th>
                            <th scope="col-md-10">description</th>
                            <th scope="col">valide</th>
                            <th scope="col">m/s</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <?php if(isset($tasks)): ?>
                                    <?php foreach($tasks as $task):?>
                                        <tr>
                                            <td scope="col"><?php echo $task['id']?></td>
                                            <td scope="col"><?php echo $task['title']?></td>
                                            <td scope="col"><?php echo "0"?></td>
                                            <td scope="col"><?php echo $task['date']?></td>
                                            <td scope="col"><?php echo $task['body']?></td>
                                            <td scope="col">
                                                <?php if($task['done']): ?>
                                                    <span class="badge bg-success p-2">valide</span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger p-2">invalider...</span>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td scope="col">
                                                <a href="update.php?id=<?php echo $task['id']; ?>" class="btn btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="delete.php?id=<?php echo $task['id']; ?>" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?> 
                                <?php endif; ?>
                            
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php require_once('../layout/footer.php');?>
