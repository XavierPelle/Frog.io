<main class='container'>
    <?php if (!is_null($flashmessage)) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $flashmessage; ?>
        </div>
    <?php } ?>
    <h2 class="mb-4 d-flex justify-content-center mt-4 text-success ">Collections</h2>
    <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) { ?>
    <a href="index.php?page=collection&action=create" class="btn btn-primary mb-4">Créer une Collection</a>
    <?php }?>
    <div class="row">
        <?php
        foreach ($collections as $collection) {
            ?>
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $collection->nomCollection; ?></h5>

                        <p class="card-text">Id créateur: <?php echo $collection->idUsers; ?></p>
                        <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) { ?>
                        <a href='index.php?page=collection&id=<?php echo $collection->id; ?>&action=details&idUsers=<?php echo $collection->idUsers; ?>&name=<?php echo $collection->nomCollection; ?>' class="btn btn-info">Détails</a>
                        <?php }?>
                        <?php
                        if (isset($_SESSION['id']) && $_SESSION['id'] === $collection->idUsers) {
                        ?>
                            <a href="index.php?page=collection&action=update&id=<?php echo $collection->id; ?>" class="btn btn-warning">Modifier</a>
                            <a href="index.php?page=collection&action=delete&id=<?php echo $collection->id; ?>" class="btn btn-danger">Supprimer</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</main>
