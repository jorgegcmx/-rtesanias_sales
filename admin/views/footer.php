
 </div><!-- /.container -->
    <!-- FOOTER -->
    <footer class="container">
      <p>
      <a class="navbar-brand" href="#">
          <img src="../../img/logo_pie.png" alt="ecologia" width="80px" higth="80px">
        </a>
      </p>
      <p class="float-right"><a href="#">Regresa al Inicio</a></p>
      <p>&copy; <?php echo date('Y-m-d'); ?> punto de venta <a href="#">@rtesanias</a> &middot; <a href="#"></a></p>
    </footer>
  </main>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>
  <script>
  window.jQuery || document.write('<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"><\/script>')
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script>
$('a.confirmacion').confirm({
    title: "Esta a punto de eliminar un registro!",
    content: "Esta seguro de eliminar el registro? esta acción no se podra reversar!",
    type: 'red',
});
$('a.confirmacion').confirm({
    buttons: {
        hey: function(){
            location.href = this.$target.attr('href');
        }
    }
});
</script>
</html>
