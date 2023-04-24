<main>
    <h2 class="d-flex justify-content-center">Vous êtes connecté en tant que <?php echo $_SESSION['pseudo'] ?> </h2>
    <div class="d-flex justify-content-center mt-5">
    <a class=" btn btn-danger mr-5" href="index.php?page=users&action=modifiate">Modifier</a>
    <a class="btn btn-danger" href="index.php?page=users&action=delete">Supprimer</a>
    </div>
</main>