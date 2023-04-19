

    <main class='container'>
        <h2>Grenouilles</h2><a href="index.php?page=especes&action=create">Creer une Grenouille</a>
        <table class='table table-danger'>
            <thead class="table-info">
                <th>id</th>
                <th>nom</th>
                <th>taille</th>
                <th>altitude</th>
                <th>id_famille</th>
                <th>id_statut_conservation</th>
            </thead> <?php foreach ($especes as $grenouille) {
                            echo "<tr>";
                            echo "<td>$grenouille->id</td>";
                            echo "<td>$grenouille->nomScientifique</td>";
                            echo "<td>$grenouille->taille</td>";
                            echo "<td>$grenouille->altitude</td>";
                            echo "<td>$grenouille->idFamille</td>";
                            echo "<td>$grenouille->idStatut</td>";
                            echo "</tr>";
                        } ?>
        </table>
    </main>



