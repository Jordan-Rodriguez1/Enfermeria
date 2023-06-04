        
		<footer class="footer"">
            <div class="footer__block block no-margin-bottom">
                <div class="container-fluid text-center">
					<br>
                    <p class="no-margin-bottom"><?php echo date("Y"); ?> &copy; Derechos Reservados.</p>
                </div>
            </div>
        </footer>

        <!-- JavaScript files-->
        <script src="<?php echo base_url(); ?>Assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>Assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>Assets/js/Funciones.js"></script>
        <script src="<?php echo base_url(); ?>Assets/js/chartjs.min.js"></script>
        <script src="<?php echo base_url(); ?>Assets/js/all.min.js"></script>
        <script src="<?php echo base_url(); ?>Assets/js/front.js"></script>
        <script src="<?php echo base_url(); ?>Assets/js/sweetalert2@9.js"></script>
        <script src="<?php echo base_url(); ?>Assets/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>Assets/DataTables/DataTables-1.10.21/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function() {
                $('#Table').DataTable({
        			language: {
        				"decimal": "",
        				"emptyTable": "No hay datos",
        				"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
        				"infoEmpty": "Mostrando 0 a 0 de 0 registros",
        				"infoFiltered": "(Filtro de _MAX_ total registros)",
        				"infoPostFix": "",
        				"thousands": ",",
        				"lengthMenu": "Mostrar _MENU_ registros",
        				"loadingRecords": "Cargando...",
        				"processing": "Procesando...",
        				"search": "Buscar:",
        				"zeroRecords": "No se encontraron coincidencias",
        				"paginate": {
        					"first": "Primero",
        					"last": "Ultimo",
        					"next": "Próximo",
        					"previous": "Anterior"
        				},
        				"aria": {
        					"sortAscending": ": Activar orden de columna ascendente",
        					"sortDescending": ": Activar orden de columna desendente"
        				}
        			}
        		});
            });
            $(document).ready(function() {
                $('#Table2').DataTable({
        			language: {
        				"decimal": "",
        				"emptyTable": "No hay datos",
        				"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
        				"infoEmpty": "Mostrando 0 a 0 de 0 registros",
        				"infoFiltered": "(Filtro de _MAX_ total registros)",
        				"infoPostFix": "",
        				"thousands": ",",
        				"lengthMenu": "Mostrar _MENU_ registros",
        				"loadingRecords": "Cargando...",
        				"processing": "Procesando...",
        				"search": "Buscar:",
        				"zeroRecords": "No se encontraron coincidencias",
        				"paginate": {
        					"first": "Primero",
        					"last": "Ultimo",
        					"next": "Próximo",
        					"previous": "Anterior"
        				},
        				"aria": {
        					"sortAscending": ": Activar orden de columna ascendente",
        					"sortDescending": ": Activar orden de columna desendente"
        				}
        			}
        		});
            });
            $(document).ready(function() {
                $('#Table3').DataTable({
        			language: {
        				"decimal": "",
        				"emptyTable": "No hay datos",
        				"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
        				"infoEmpty": "Mostrando 0 a 0 de 0 registros",
        				"infoFiltered": "(Filtro de _MAX_ total registros)",
        				"infoPostFix": "",
        				"thousands": ",",
        				"lengthMenu": "Mostrar _MENU_ registros",
        				"loadingRecords": "Cargando...",
        				"processing": "Procesando...",
        				"search": "Buscar:",
        				"zeroRecords": "No se encontraron coincidencias",
        				"paginate": {
        					"first": "Primero",
        					"last": "Ultimo",
        					"next": "Próximo",
        					"previous": "Anterior"
        				},
        				"aria": {
        					"sortAscending": ": Activar orden de columna ascendente",
        					"sortDescending": ": Activar orden de columna desendente"
        				}
        			}
        		});
            });
            // Add the following code if you want the name of the file appear on select
            $(".custom-file-input").on("change", function() {
              var fileName = $(this).val().split("\\").pop();
              $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        </script>
    </body>
</html>