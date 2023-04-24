<body style="height: 100%">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">Frog.io</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php?page=famille">Famille <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=collection">Collection</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=especes">Espece</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=statut">Info Statut</a>
            </li>
            <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) { ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=users&action=logged">Mon compte</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=users&action=logout">Se déconnecter</a>
              </li>
              </li> <?php  ?>
            <?php } else { ?>
              <li class="nav-item"><a class="nav-link" href="index.php?page=users&action=login">Se connecter</a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>