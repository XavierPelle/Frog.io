<main>
<div class="container">
    <h2>Connexion</h2>
    <form method="POST">
        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" class="form-control" id="pseudo" required>
        </div>
        <div class="form-group">
            <label for="pwd">Mot de passe</label>
            <input type="password" name="pwd" class="form-control" id="pwd" required>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
        <a href="index.php?page=users&action=add" class="btn btn-danger m-4">S'inscrire</a>
    </form>
</div>
</main>
