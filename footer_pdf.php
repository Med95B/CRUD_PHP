<footer class="container-fluid bg-dark text-light pt-4">
        <div class="row">
            <div class="col-md-3">
                <h5>FOOTER CONTENT</h5>
                <p>welcome to our web site !</p>
            </div>
            <div class="col-md-3 mb-3">
                <h5>LINKS</h5>
                <div class="d-flex flex-column">
                    <a href="#" class="text-decoration-none text-light">Lorem, ipsum dolor.</a>
                    <a href="#" class="text-decoration-none text-light">Lorem, ipsum dolor.</a>
                    <a href="#" class="text-decoration-none text-light">Lorem, ipsum dolor.</a>
                </div>
            </div>
            <div class="col-md-3">
                <h5>LINKS</h5>
                <div class="d-flex flex-column">
                    <a href="Formulaire.php" class="text-decoration-none text-light">Formulaire</a>
                    <a href="Backend.php" class="text-decoration-none text-light">Backend</a>
                    <a href="Details.php" class="text-decoration-none text-light">Details</a>
                    <a href="PDF.php" class="text-decoration-none text-light">PDF</a>
                    <a href="statistiques.php" class="text-decoration-none text-light">Statistiques</a>
                </div>
            </div>
            <div class="col-md-3">
                <?php  echo @ "<a href='pdf_code.php?nom={$_GET['nom']}&sexe={$_GET['sexe']}&tel={$_GET['tel']}
                    &specialite={$_GET['specialite']}&edition={$_GET['edition']}&qrcode={$_GET['qrcode']}' class='btn btn-success col-md-6'>Imprimer</a>"
                    ?>
            </div>
        </div>
    </footer>