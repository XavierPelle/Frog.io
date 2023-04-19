        <main class='container'>
            <h2>Familles</h2><a href="index.php?page=famille&action=create">Creer une Famille</a>
            <table class='table table-striped'>
                <thead class="thead-dark">
                    <th>Nom Famille</th>
                    <th>Action</th>
                </thead>
            <?php
                foreach ($familles as $famille){
                    echo "<tr>";
                    echo "<td><a class='text-black text-decoration-none' href='index.php?page=familles&idFamille=$famille->idFamille&action=details'>$famille->nomFamille</a></td>";
                    echo '<td><a href="index.php?page=famille&action=update&idFamille='.$famille->idFamille.'">Modifier</a></td>';
                    echo "</tr>";
                }
            ?>
            </table>
        </main>