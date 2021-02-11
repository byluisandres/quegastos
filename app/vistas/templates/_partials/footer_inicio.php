<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<!-- sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- Footer -->
<footer class="page-footer font-small mdb-color darken-4 position-absolute w-100">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">&copy; <?php echo date('Y'); ?> Copyright.
        Hecho por <a href="https://byluisandresdeveloper.website/" target="__blank">Luis Andrés Bolaños Yapo</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
<?php
/**
 * Separar la url para incluir los archivos de javascript en el que corresponda
 */
$url = $_SERVER["REQUEST_URI"];
$url = explode("/", $url);
?>
<?php if ($url[2] === "") : ?>
    <?php return; ?>
<?php endif; ?>
<?php if ($url[3] === "registro") : ?>
    <script src="../js/registro.js"></script>
    <script src="../js/mensajes.js"></script>
<?php endif; ?>



</body>

</html>