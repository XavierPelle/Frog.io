<main class='container'>
            <h2><?php echo $_GET['name'];?></h2>
            <table class='table table-striped'>
                <thead class="thead-dark">
                    <th>Nom Collection</th>
                    <th>Id createur</th>
                    <th>Action</th>
                </thead>
            <?php
                foreach ($collections as $collection){
                    echo "<tr>";
                    echo "<td><a class='text-black text-decoration-none' href='index.php?page=collection&id=$collection->id&action=details'>$collection->nomCollection</a></td>";
                    echo "<td>$collection->idUsers</td>";
                    echo '<td><a href="index.php?page=collection&action=update&id='.$collection->id.'">Modifier</a></td>';
                    echo "</tr>";
                }
            ?>
            </table>
</main>