<main>
    <!-- Still in test -->
    <h2>Grenouilles</h2>
    <table class='table table-danger'>
        <thead class="table-info">
            <th>Nom</th>
            <th>Image</th>
        </thead>
        <?php foreach ($especes as $grenouille) {
            echo "<tr>";
            echo "<td>$grenouille->nomScientifique</td>";
            // echo "<td>$grenouille->image</td>";
            echo "<td><a href=''>Ajouter</a></td> ";
            echo "</tr>";
        } ?>
    </table>
</main>