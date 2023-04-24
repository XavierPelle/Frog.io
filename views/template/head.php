<!DOCTYPE html>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo (isset($_GET['page'])) ? $_GET['page'] : 'Bienvenue'; ?></title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
        <script type="text/javascript" src="assets/bootstrap/js/bootstrap.bundle.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
                .navbar {
                transition: all 0.3s ease;
                background-color: transparent;
                }

                .navbar.scrolled {
                background-color: rgba(0, 0, 0, 0.8);
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }

                .navbar-brand {
                font-weight: bold;
                font-size: 1.5rem;
                }

                .nav-link {
                font-weight: bold;
                }
                .fixed-navbar-bottom {
                bottom: 0;
                width: 100%;
                z-index: 1030;
                }
                main{
                        min-height: 66.9vh;
                }
        </style>
</head>
