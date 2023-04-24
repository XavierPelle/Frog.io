<main class='container'>
    <?php if (!is_null($flashmessage)) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $flashmessage; ?>
        </div>
    <?php } ?>
    <h2 class="mb-4 d-flex justify-content-center mt-3 mb-3 text-success">
        <?php echo $_GET['name']; ?>
    </h2>
    <div class="row">
        <?php foreach ($especes as $espece) { 
            if ($espece->id === $col->especeEnValeur) {
                echo '<div class="col-md-4 mb-4 border prio">';
            }else {
                echo '<div class="col-md-4 mb-4">';
            }
            ?>
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $espece->image; ?>" class="card-img-top" alt="" style="width: 100%; height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <p class="card-text">Nom: <?php echo $espece->nomScientifique; ?></p>
                        <p class="card-text">Taille: <?php echo $espece->taille; ?></p>
                        <p class="card-text">Altitude: <?php echo $espece->altitude; ?></p>
                        <p class="card-text">ID Famille: <?php echo $espece->idFamille; ?></p>
                        <p class="card-text">ID Statut UICN: <?php echo $espece->idStatut; ?></p>
                        <?php if (isset($_SESSION['id']) && $_SESSION['id'] == $_GET['idUsers']) { ?>
                            <a href='index.php?page=collection&action=deleteRow&idC=<?php echo $_GET['id']; ?>&idE=<?php echo $espece->id; ?>' class="btn btn-danger">Supprimer</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php if (isset($_SESSION['id']) && $_SESSION['id'] == $_GET['idUsers']) { ?>
        <a href="index.php?page=collection&action=add&id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name']; ?>" class="btn btn-primary mt-4">Éditer la Collection</a>
    <?php } ?>
</main>
