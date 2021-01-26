<!-- jquey y booststrapJS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- sidenav-responsive -->
<script src="js/sidenav-responsive.js"></script>

<?php
/**
 * Separar la url para incluir los archivos de javascript en el que corresponda
 */
$url = $_SERVER["REQUEST_URI"];
$url = explode("/", $url);
?>
<?php if ($url[2] === "dashboard") : ?>
    <!-- CharstJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/locales-all.min.js"></script>
    <!-- InicioJS -->
    <script src="js/dashboard.js"></script>
    <!-- mensajes -->
    <script src="js/mensajes.js"></script>

<?php endif; ?>
<!-- Footer -->
<footer class="page-footer font-small">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">&copy; Copyright <?php echo date("Y") ?>
        QuéGastos. Hecho por<a href="https://byluisandresdeveloper.website/" target="__blank"> byLuisAndrés</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
</body>

</html>