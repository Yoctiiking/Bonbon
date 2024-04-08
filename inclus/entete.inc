<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>M. BONBON</title>
    <link rel="shortcut icon" href="./images/bonbon.ico" type="image/x-icon" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/style.css" />
    <script src="./js/script.js"></script>
  </head>

  <body onload="AfficherDate()">
    <div class="container">
      <div class="row card">
        <img
          src="./images/bonbon2.png"
          class="card-img-top p-0"
          style="width: 100%"
          alt="Des bonbons"
        />
        <div class="card-body bonbonBg">
          <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
              <a class="navbar-brand text-light" href="./index.php"
                >M. Bonbon</a
              >
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a
                    class="nav-link active text-light"
                    aria-current="page"
                    href="./produit.php"
                    >Nos Produits</a
                  >
                  <a class="nav-link text-light" href="./rejoindre.php">Nous rejoindre</a>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </div>
      <div class="text-center" id="date"></div>
      <div class="row p-3 mt-1 bordure" style="text-align: justify;">