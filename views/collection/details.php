<main class='container'>
    <?php if (!is_null($flashmessage)) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $flashmessage; ?>
        </div>
    <?php } ?>
    <h2>
        <?php echo $_GET['name']; ?>
    </h2>
    <table class='table table-striped'>
        <thead>
            <th>id</th>
            <th>nom</th>
            <th>taille</th>
            <th>altitude</th>
            <th>id Famille</th>
            <th>id Statut UICN</th>
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
    <a href="index.php?page=collection&action=add&id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name']; ?>">Edit
        Collection</a>
</main>