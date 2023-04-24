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
            echo '<div class="col-md-4 mb-4">';
            if ($espece->id === $col->especeEnValeur) {
                echo '<div class="card border border-warning border-3" style="width: 18rem;">';
            } else {
                echo '<div class="card" style="width: 18rem;">';
            }
        ?>
            <img src="<?php echo $espece->image; ?>" class="card-img-top" alt="" style="width: 100%; height: 200px; object-fit: cover;">
            <div class="card-body">
                <p class="card-text">Nom: <?php echo $espece->nomScientifique; ?></p>
                <p class="card-text">Taille: <?php echo $espece->taille; ?></p>
                <p class="card-text">Altitude: <?php echo $espece->altitude; ?></p>
                <p class="card-text">Famille: <?php echo $familles[$espece->id] ?></p>
                <p class="card-text">Statut UICN: <?php echo $statuts[$espece->id]; ?></p>
                <?php if (isset($_SESSION['id']) && $_SESSION['id'] == $_GET['idUsers']) { ?>
                    <a href='index.php?page=collection&action=deleteRow&idC=<?php echo $_GET['id']; ?>&idE=<?php echo $espece->id; ?>' class="btn btn-danger">Supprimer</a>
                    <a href='index.php?page=collection&action=valor&idC=<?php echo $_GET['id']; ?>&idE=<?php echo $espece->id; ?>' class="btn btn-info">Mettre en valeur</a>
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