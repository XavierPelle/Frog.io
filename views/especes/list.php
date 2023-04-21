<main class='container'>
    <h2>Espece</h2><a href="index.php?page=especes&action=create">Creer une espèce</a>
    <table class='table table-danger'>
        <thead class="table-info">
            <th>id</th>
            <th>nom</th>
            <th>nom vernaculaire</th>
            <th>taille</th>
            <th>altitude</th>
            <th>famille</th>
            <th>Statut Conservation</th>
            <th>action</th>
            <th>supprimer</th>
        </thead> <?php foreach ($especes as $grenouille) {
                        echo "<tr>";
                        echo "<td>$grenouille->id</td>";
                        echo "<td>$grenouille->nomScientifique</td>";
                        echo "<td>{$nom[$grenouille->id]}</td>";
                        echo "<td>$grenouille->taille</td>";
                        echo "<td>$grenouille->altitude</td>";
                        echo "<td>{$familles[$grenouille->id]}</td>"; 
                        echo "<td>{$statuts[$grenouille->id]}</td>"; 
                        echo '<td><a href="index.php?page=especes&action=update&id='.$grenouille->id.'">Modifier</a></td>';
                        echo '<td>
                        <form method="post" action="index.php?page=especes&action=delete" onsubmit="return confirm(\'Êtes-vous sûr de vouloir supprimer cette espèce?\');">
                            <input type="hidden" name="id" value="' . $grenouille->id . '">
                            <input type="submit" name="delete" value="Supprimer">
                        </form>
                        </td>';
                        echo "</tr>";
                    } ?>
    </table>
</main>
