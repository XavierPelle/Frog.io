    <body>
        <header>
            <nav>
                <ul>
                    <li>
                        <a href='index.php'>Accueil</a>
                    </li>
                    <li>
                        <a href='index.php?page=famille'>Famille</a>
                    </li>
                    <li>
                        <a href='index.php?page=collection'>Collection</a>
                    </li>
                    <li>
                        <a href='index.php?page=especes'>Espece</a>
                    </li>
                    <?php
                    if ($_SESSION['logged'] !== true) {
                        echo "
                        <li>
                            <a class='btn btn-warning'href='index.php?page=users&action=login'>Se connecter</a>
                        </li>
                        ";
                    }
                    if ($_SESSION['logged'] === true) {
                        echo "
                        <li>
                            <a href='index.php?page=users&action=logged'>Mon compte</a>
                        </li>
                        <li>
                            <a href='index.php?page=users&action=logout'>Se déconnecter</a>
                        </li>
                        ";
                    }
                    ?>
                </ul>
            </nav>
        </header>