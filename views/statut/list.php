<main class='container'>
    <h2 class="d-flex justify-content-center text-success mt-3 mb-3">Statuts</h2>
    <table class='table table-striped'>
        <thead class="thead-dark">
            <th>Nom Statut</th>
            <th>Icone Statut</th>
            <th>Code Statut</th>
            <th>Description Statut</th>
        </thead>
        <?php
        foreach ($statuts as $statut) {
            echo "<tr>";
            echo "<td>$statut->statut</td>";
            echo "<td>$statut->iconeStatut</td>";
            echo "<td>$statut->codeStatut</td>";
            echo "<td>$statut->descriptionStatut</td>";
            echo "</tr>";
        }
        ?>
    </table>
</main>