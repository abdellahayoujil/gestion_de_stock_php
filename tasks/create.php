<?php require_once('../layout/header.php');


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
                        <div class="my-3">
                            <a href="gestion.php" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                        <form method="POST">
                            <div class="mb-3">
                                <h1 align = "center" >Gestion de Stock</h1>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">titre de produit :</label>
                                <input type="text" class="form-control" name="title" id="titl" aria-describedby="text" value="<?php if(isset($title)) echo $title?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">la date d'aujourd'hui et l'heure :</label>
                                <input type="datetime-local" class="form-control" name="date" id="date" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">description</label>
                                <textarea rows="5" class="form-control" name="body"  id="body"><?php if(isset($body)) echo $body?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">ajouter</button>
                        </form>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>