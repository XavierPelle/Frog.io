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
    <a href="index.php?page=collection&action=add&id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name']; ?>">Edit Collection</a>
</main>