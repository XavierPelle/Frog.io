<main class='container'>
    <h2>
        <?php echo $_GET['name']; ?>
    </h2>
    <table class='table table-striped'>
        <thead>
            <th>id</th>
            <th>nom</th>
            <th>taille</th>
            <th>altitude</th>
            <th>id_famille</th>
            <th>id_statut_conservation</th>
        </thead>
        <?php foreach ($especes as $espece) {
            echo "<tr>";
            echo "<td>$espece->id</td>";
            echo "<td>$espece->nomScientifique</td>";
            echo "<td>$espece->taille</td>";
            echo "<td>$espece->altitude</td>";
            echo "<td>$espece->idFamille</td>";
            echo "<td>$espece->idStatut</td>";
            echo "</tr>";
        } ?>
    </table>
    <!-- Still in test -->
    <h2>Grenouilles</h2>
    <table class='table table-danger'>
        <thead class="table-info">
            <th>Nom</th>
            <th>Image</th>
            <th>Action</th>
        </thead>
        <?php foreach ($grenouilles as $grenouille) {
            echo "<tr>";
            echo "<td>$grenouille->nomScientifique</td>";
            echo "<td>$grenouille->image</td>";
            echo "<td><a href='index.php?page=collection&action=add&id=".$_GET['id']."'>Ajouter</a></td> ";
            echo "</tr>";
        } ?>
    </table>
</main>