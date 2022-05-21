<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Agregar Nuevo Producto</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <form action='../controller/product.crud.php' method='post' class="needs-validation" novalidate>

                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="form-row">
                            <div class="col-md-6 mb-4">
                                <label for="validationCustom01">Nombre</label>
                                <input type="text" class="form-control" id="validationCustom01" name="pname" required>
                                <div class="invalid-feedback">
                                    Campo obligaorio.
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validationCustom02">Referencia</label>
                                <input type="text" class="form-control" id="validationCustom02" name="refcode" required>
                                <div class="invalid-feedback">
                                    Campo obligaorio.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-4">
                                <label for="validationCustom02">Precio ($COP)</label>
                                <input type="number" class="form-control" id="validationCustom03" name="price" required>
                                <div class="invalid-feedback">
                                    Campo obligaorio.
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-4">
                                <label for="validationCustom05">Stock</label>
                                <input type="number" class="form-control" id="validationCustom04" name="stock" required>
                                <div class="invalid-feedback">
                                    Campo obligaorio.
                                </div>
                            </div>
                        </div>
                        <input type='hidden' name='add' value='add'>                        
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-success" type="submit"><i class="bi bi-save-fill"> </i>Guardar Registro</button>
                </div>
            </form>

            <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
                });
            }, false);
            })();
            </script>

        </div>
    </div>
</div>