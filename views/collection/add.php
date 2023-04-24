<main class='container'>
    <?php if (isset($flashmessage) && !is_null($flashmessage)) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $flashmessage; ?>
        </div>
    <?php } ?>
    <h2>
        <?php echo $_GET['name']; ?>
    </h2>
    <table class='table table-striped'>
        <thead>
            <th>Id</th>
            <th>Nom</th>
            <th>Taille</th>
            <th>Altitude</th>
            <th>id Famille</th>
            <th>Statut UICN</th>
            <th>Supprimer</th>
        </thead>
        <?php foreach ($especes as $espece) {
            echo "<tr>";
            echo "<td>$espece->id</td>";
            echo "<td>$espece->nomScientifique</td>";
            echo "<td>$espece->taille</td>";
            echo "<td>$espece->altitude</td>";
            echo "<td>$espece->idFamille</td>";
            echo "<td>$espece->idStatut</td>";
            echo "<td><a href='index.php?page=collection&action=deleteRow&idC=" . $_GET['id'] . "&idE=$espece->id'>Supprimer</a></td>";
            echo "</tr>";
        } ?>
    </table>
    <h2>Grenouilles</h2>
    <table class='table table-danger'>
        <thead class="table-info">
            <th>Nom</th>
            <th>Image</th>
            <th>Action</th>
        </thead>
        <?php foreach ($grenouilles as $grenouille) {
            $bool=false;
            foreach ($especes as $espece) {
                // test si l'espece est dans la collection
                if ($grenouille->id === $espece->id) {
                    $bool = true;
                }
            }
            if (!$bool) {
                echo "<tr>";
                echo "<td>$grenouille->nomScientifique</td>";
                echo "<td>$grenouille->image</td>";
                echo "<td><a href='index.php?page=collection&action=add&id=" . $_GET['id'] . "&name=" . $_GET['name'] . "&idGre=$grenouille->id'>Ajouter</a></td> ";
                echo "</tr>";
            }
        } ?>
    </table>
</main>