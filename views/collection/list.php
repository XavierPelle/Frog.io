<main class='container'>
    <?php if (!is_null($flashmessage)) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $flashmessage; ?>
        </div>
    <?php } ?>
    <h2>Collections</h2>
    <a href="index.php?page=collection&action=create">Creer une Collection</a>
    <table class='table table-striped'>
        <thead class="thead-dark">
            <th>Nom Collection</th>
            <th>Id createur</th>
            <th>Action</th>
        </thead>
        <?php
        foreach ($collections as $collection) {
            echo "<tr>";
            echo "<td><a class='text-black text-decoration-none' href='index.php?page=collection&id=$collection->id&action=details&name=$collection->nomCollection'>$collection->nomCollection</a></td>";
            echo "<td>$collection->idUsers</td>";
            echo '<td><a href="index.php?page=collection&action=update&id=' . $collection->id . '">Modifier</a> <a href="index.php?page=collection&action=delete&id=' . $collection->id . '">Supprimer</a></td>';
            echo "</tr>";
        }
        ?>
    </table>
</main>