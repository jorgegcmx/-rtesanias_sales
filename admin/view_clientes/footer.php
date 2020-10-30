 </div><!-- /.container -->
    <!-- FOOTER -->
    <footer class="container">
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
<script>  window.jQuery || document.write('<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"><\/script>')
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script>
    $('.confirmacion').click(function(e) {  
      e.preventDefault();
      Swal.fire({
      title: 'Esta seguro de eliminar el registro? esta acción no se podra reversar!',
      text: 'Continuar',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Aceptar',      
      cancelButtonText: "Cancelar",
     }).then(resultado => {
        if (resultado.value) {    
           const v = resultado.value
           console.log(v);           
            $( ".confirmacion" ).submit();
        } else {            
            return false;
           
        }
    });
});
</script>




<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        element2 = document.getElementById("content2");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
            element2.style.display='none';   
            document.getElementById("sucursal_1").disabled = false;
            document.getElementById("sucursal_2").disabled = true;         
        }
        else {
            element.style.display='none';
            element2.style.display='block'; 
            document.getElementById("sucursal_1").disabled = true;
            document.getElementById("sucursal_2").disabled = false;          
        }
    }

    function showContentVenta() {
        element = document.getElementById("contentventa"); 
        element2 = document.getElementById("contentimpuesto");  

        importesiniva = document.getElementById("importesiniva");
        importeconiva = document.getElementById("importeconiva");

        check = document.getElementById("tipo");
        if (check.checked) {
            check.value=1;
            element.style.display='block';
            element2.style.display='block';

            importeconiva.style.display='block';  
            importesiniva.style.display='none';  

            document.getElementById("rfc").required = true;  
            document.getElementById("cliente").required = true; 
            document.getElementById("email").required = true;      
        }
        else {
            check.value=0;
            element.style.display='none'; 
            element2.style.display='none'; 

            importeconiva.style.display='none';  
            importesiniva.style.display='block';
             
            document.getElementById("rfc").required = false; 
            document.getElementById("cliente").required = false; 
            document.getElementById("email").required = false;                  
        }
    }
    
</script>
<script>

    $('.formulario').submit(function(e) {        
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '../articulos/addpedido.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#divid").load(" #divid");
                //var jsonData = JSON.parse(response); 
                //console.log(jsonData);
                //location.href = 'vw_addpedidos.php';               
               
           }
       });
     });

     $('.formulario_inventario').submit(function(e) {        
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '../articulos/addinventario.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#divid_inventario").load(" #divid_inventario");         
           }
       });
     });

 
     $('.formulario_venta').submit(function(e) {        
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '../articulos/addcar.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#divid_venta").load(" #divid_venta");         
           }
       });
     });

     $('#formulario_barcode').submit(function(e) {        
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '../articulos/bar_action.php',
            data: $(this).serialize(),
            success: function(response)
            {
               /* let jsonData = JSON.parse(response); 
                //console.log(jsonData);              

                if(jsonData=='error'){
                    alert("Articulo sin existencia");                  
                }else{                
                
                }*/
                $('#codigo').val('');
                $("#divid_venta").load(" #divid_venta");
                                
                       
           }
       });
     });
</script>
</html>
