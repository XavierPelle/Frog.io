<main class='container'>
            <h2>Collections</h2>
            <a href="index.php?page=collection&action=create">Creer une Collection</a>
            <table class='table table-striped'>
                <thead class="thead-dark">
                    <th>Nom Collection</th>
                    <th>Action</th>
                </thead>
            <?php
                foreach ($collections as $collection){
                    echo "<tr>";
                    echo "<td><a class='text-black text-decoration-none' href='index.php?page=collection&id=$collection->id&action=details'>$collection->nomFamille</a></td>";
                    echo "<td>$collection->createur</td>";
                    echo '<td><a href="index.php?page=collection&action=update&id='.$collection->id.'">Modifier</a></td>';
                    echo "</tr>";
                }
            ?>
            </table>
        </main>