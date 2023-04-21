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
            <th>id Famille</th>
            <th>id Statut UICN</th>
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
</main>