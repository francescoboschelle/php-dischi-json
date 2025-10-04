<?php
    $json_text = file_get_contents("./discs.json");

    $discs = json_decode($json_text, true);
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Dischi JSON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body> 
    <div class="container">
        <div class="text-center">
            <h1>Dischi</h1>
            <p>Esplora i nostri dischi o aggiungine di nuovi</p>
        </div>
        <hr>

        <section>
            <div class="row">
                <?php
                   foreach($discs as $disc) {
                ?>
                    <div class="col-4 g-2">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo $disc['cover_url'] ?>" alt="<?php echo $disc['title'] ?>" />
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $disc['title'] ?></h4>
                                <p class="card-text"><?php echo $disc['artist'] ?></p>
                                <p class="card-text fw-bold"><?php echo $disc['published_year'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php
                   }
                ?>
            </div>
        </section>

        <hr>
        <section class="mb-5">
            <div class="text-center">
                <h2>Inserisci un nuovo disco</h2>
            </div>
                <form action="server.php" method="post">
                    <div class="row mb-3 g-3">
                        <div class="col-4">
                            <label for="titleInput" class="form-label">Titolo</label>
                            <input
                                type="text"
                                class="form-control"
                                name="title"
                                id="titleInput"
                                placeholder="Inserisci il titolo..."
                                required
                            />
                        </div>
                        <div class="col-4">
                            <label for="artistInput" class="form-label">Artista</label>
                            <input
                                type="text"
                                class="form-control"
                                name="artist"
                                id="artistInput"
                                placeholder="Inserisci l'artista..."
                                required
                            />
                        </div>
                        <div class="col-4">
                            <label for="coverUrlInput" class="form-label">URL della cover</label>
                            <input
                                type="text"
                                class="form-control"
                                name="cover-url"
                                id="coverUrlInput"
                                placeholder="Inserisci l'url..."
                                required
                            />
                        </div>
                        <div class="col-6">
                            <label for="publishedYearInput" class="form-label">Anno di pubblicazione</label>
                            <input
                                type="number"
                                class="form-control"
                                name="published-year"
                                id="publishedYearInput"
                                placeholder="Inserisci l'anno di pubblicazione..."
                                required
                            />
                        </div>
                        <div class="col-6">
                            <label for="genreInput" class="form-label">Genere</label>
                            <input
                                type="text"
                                class="form-control"
                                name="genre"
                                id="genreInput"
                                placeholder="Inserisci il genere..."
                                required
                            />
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Invia
                    </button>
                </form>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>