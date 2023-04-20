<main class='container'>
    <?php if (!is_null($flashmessage)) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $flashmessage; ?>
        </div>
    <?php } ?>
    <h2>Familles</h2>
    <a href="index.php?page=famille&action=create">Creer une Famille</a>
    <table class='table table-striped'>
        <thead class="thead-dark">
            <th>Nom Famille</th>
            <th>Action</th>
        </thead>
        <?php
        foreach ($familles as $famille) {
            echo "<tr>";
            // echo "<td><a class='text-black text-decoration-none' href='index.php?page=famille&id=$famille->id&action=details'>$famille->nomFamille</a></td>";
            echo "<td>$famille->nomFamille</td>";
            echo '<td><a href="index.php?page=famille&action=update&id=' . $famille->id . '">Modifier</a> <a href="index.php?page=famille&action=delete&id=' . $famille->id . '">Supprimer</a></td>';
            echo "</tr>";
        }
        ?>
    </table>
</main>