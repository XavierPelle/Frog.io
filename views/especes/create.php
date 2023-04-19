<main>
<div class="container">
        <h1 class="my-3">Ajouter une espèce</h1>
        <form action="index.php?page=especes&action=<?php echo $action; echo (isset($id)) ? '&id='.$id : '';?>" method="POST">
            <div class="mb-3">
                <label for="nomScientifique" class="form-label">Nom scientifique</label>
                <input type="text" class="form-control" id="nomScientifique" name="nomScientifique">
            </div>
            <div class="mb-3">
                <label for="altitude" class="form-label">Altitude</label>
                <input type="number" class="form-control" id="altitude" name="altitude">
            </div>
            <div class="mb-3">
                <label for="taille" class="form-label">Taille (cm)</label>
                <input type="number" class="form-control" id="taille" name="taille">
            </div>
            <div class="mb-3">
                <label for="idStatut" class="form-label">Statut</label>
                <select class="form-select" id="idStatut" name="idStatut">
                <?php foreach ($especess as $esps):?>
                <option value=<?php echo $esps->id; ?> ><?php echo $esps->codeStatut;?> - <?php echo $esps->statut;?></option>
                <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="idFamille" class="form-label">Famille</label>
                <select class="form-select" id="idFamille" name="idFamille">
                <?php foreach ($especes as $esp):?>
                <option value=<?php echo $esp->id; ?> > <?php echo $esp->nomFamille;?></option>
                <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" class="form-control" id="image" name="image" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Ajouter l'espèce</button>
        </form>
    </div>
</main>