<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <h1 class="text-center mb-4">Changement d'information</h1>
                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="champ" class="form-label">Champ à modifier :</label>
                                <select name="champ" id="champ" class="form-select">
                                    <option value="mail">Mail</option>
                                    <option value="pseudo">Pseudo</option>
                                    <option value="pwd">Mot de passe</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="change" class="form-label">Nouvelle valeur :</label>
                                <input type="text" name="change" id="change" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

