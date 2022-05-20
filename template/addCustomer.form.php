<!-- Agregar Nuevos Clientes -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Agregar Nuevo Cliente</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <form action='../controller/customer.crud.php' method='post' class="needs-validation" novalidate>

                <div class="modal-body">
                    <div class="container-fluid">
                        
                        <div class="form-row">
                            <div class="col-md-6 mb-4">
                                <label for="validationCustom01">Nombre</label>
                                <input type="text" class="form-control" id="validationCustom01" name="fname" required>
                                <div class="invalid-feedback">
                                    Campo obligaorio.
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validationCustom02">Apellido</label>
                                <input type="text" class="form-control" id="validationCustom02" name="lname" required>
                                <div class="invalid-feedback">
                                    Campo obligaorio.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md mb-4">
                                <label for="validationCustom03">Email</label>
                                <input type="email" class="form-control" id="validationCustom03" name="email" required>
                                <div class="invalid-feedback">
                                    Campo obligaorio.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">                  
                            <div class="col-md mb-4">
                                <label for="validationCustom04">Direccion</label>
                                <input type="text" class="form-control" id="validationCustom04" name="address" required>
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