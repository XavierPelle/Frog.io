<main class='container'>
    <?php
    if (!is_null($flashmessage)) { ?>
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
            echo "<tr>
                <td><a class='text-black text-decoration-none' href='index.php?page=collection&id=$collection->id&action=details&idUsers=$collection->idUsers&name=$collection->nomCollection'>$collection->nomCollection</a></td>
                <td>";
                // Horrible niveau opti
                foreach ($users as $user) {
                    if ($user->id === $collection->idUsers) {
                        echo $user->pseudo;
                    }
                }
                echo "</td>";
                if (isset($_SESSION['id']) && $_SESSION['id'] === $collection->idUsers) {
                echo '<td><a href="index.php?page=collection&action=update&id=' . $collection->id . '">Modifier</a> <a href="index.php?page=collection&action=delete&id=' . $collection->id . '">Supprimer</a></td>';
                } else{
                    echo '<td></td>';
                }
            echo "</tr>";
        }
        ?>
    </table>
</main>