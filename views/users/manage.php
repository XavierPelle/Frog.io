<main>
    <h2 class="d-flex justify-content-center">Vous êtes connecté en tant que <span onclick="visible()"> 
        <?php echo $_SESSION['pseudo'] ?></span>
    </h2>
    <div class="d-flex justify-content-center mt-5">
        <a class=" btn btn-danger mr-5" href="index.php?page=users&action=modifiate">Modifier</a>
        <a class="btn btn-danger" href="index.php?page=users&action=delete">Supprimer</a>
    </div>

    
    <div class='yes' style="visibility:hidden">
        <?php include_once('secret.php'); ?>
    </div>
    <script>
        function visible() {
            var x = document.getElementsByClassName('yes');
            if (x.style.visibility === 'hidden') {
                x.style.visibility = 'visible';
            } else {
                x.style.visibility = 'hidden';
            }
        }
    </script>
</main>