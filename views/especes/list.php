<main class="container">
    <h1 class="d-flex justify-content-center h1">Espece</h1>
    <a class="btn btn-success m-3" href="index.php?page=especes&action=create">Creer une espèce</a>
    <div class="row">
        <?php foreach ($especes as $espece) { ?>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                <div class="card">
                    <img src="<?= $espece->image ?>" class="card-img-top" alt="" style="max-width: 300px; max-height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $espece->nomScientifique ?></h5>
                        <p class="card-text"><?= $nom[$espece->id] ?></p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Taille:</strong> <?= $espece->taille ?></li>
                            <li class="list-group-item"><strong>Altitude:</strong> <?= $espece->altitude ?></li>
                            <li class="list-group-item"><strong>Famille:</strong> <?= $familles[$espece->id] ?></li>
                            <li class="list-group-item"><strong>Statut Conservation:</strong> <?= $statuts[$espece->id] ?></li>
                        </ul>
                        <a href="index.php?page=especes&action=update&id=<?= $espece->id ?>" class="btn btn-primary">Modifier</a>
                        <form method="post" action="index.php?page=especes&action=delete" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette espèce?');" class="d-inline-block">
                            <input type="hidden" name="id" value="<?= $espece->id ?>">
                            <button type="submit" name="delete" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</main>
