<main>
<div class="container">
        <h1 class="my-3">
            <?php echo ($action == 'update') ? "Modifier une espèce" : "Ajouter une espèce"; ?>
        </h1>
        <form action="index.php?page=especes&action=<?php echo $action; echo (isset($id)) ? '&id='.$id : '';?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nomScientifique" class="form-label">Nom scientifique</label>
                <input type="text" class="form-control" id="nomScientifique" name="nomScientifique" value="<?php echo (isset($modifesp)) ? $modifesp->nomScientifique : '';?>">
            </div>
            <div class="mb-3" id="inputNom">
                <label for="nomVernaculaire" class="form-label">Nom vernaculaire</label>
                <?php 
                foreach ($noms as $nom) {
                    echo "<input type='text' class='form-control' name='nomVernaculaire' value='$nom->nom'><br>";
                }
                ?>
                <script>
                    function addInput() {
                        document.getElementById('inputNom').innerHTML += "<input type='text' class='form-control' name='nomVernaculaire'><br>"
                    }
                </script>
                <a href="#" onclick="addInput()">Add name</a>
            </div>
            <div class="mb-3">
                <label for="altitude" class="form-label">Altitude</label>
                <input type="number" class="form-control" id="altitude" name="altitude" value="<?php echo (isset($modifesp)) ? $modifesp->altitude : '';?>">
            </div>
            <div class="mb-3">
                <label for="taille" class="form-label">Taille (cm)</label>
                <input type="number" class="form-control" id="taille" name="taille" value="<?php echo (isset($modifesp)) ? $modifesp->taille : '';?>">
            </div>
            <div class="mb-3">
                <label for="idStatut" class="form-label">Statut</label>
                <select class="form-select" id="idStatut" name="idStatut">
                <?php foreach ($especess as $esps):?>
                    <option value="<?php echo $esps->id; ?>"<?php echo (isset($modifesp) && $modifesp->idStatut === $esps->id)? 'selected':''?>><?php echo $esps->codeStatut;?> - <?php echo $esps->statut;?></option>
                <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="idFamille" class="form-label">Famille</label>
                <select class="form-select" id="idFamille" name="idFamille">
                <?php foreach ($especes as $esp):?>      
                    <option value="<?php echo $esp->id; ?>"<?php echo (isset($modifesp) && $modifesp->idFamille === $esp->id)? 'selected':''?>><?php echo $esp->nomFamille;?></option>
                <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/jpeg,image/png">
            </div>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">
                <?php echo ($action == 'update') ? "Modifier l'espèce" : "Ajouter l'espèce"; ?>
            </button>

        </form>
    </div>
</main>