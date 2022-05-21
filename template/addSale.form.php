<!-- Registrar ventas -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Registrar Nueva Venta</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <form action='../controller/sale.crud.php' method='post' class="needs-validation" novalidate>

                <div class="modal-body">
                    <div class="container-fluid">
                        
                        <div class="form-row">
                            <div class="col-md mb-4">
                                <label for="validationCustom01">Cliente</label>

                                <select class="form-control selectpicker" data-live-search="true" name="uidCustomer" required>
                                    <?php
                                    foreach($listaClientes as $cli) {
                                    ?>
                                    <option value="<?php echo $cli->__GET('uid') ?>" data-tokens="<?php echo $cli->__GET('uid') ?>"> 
                                        UID: <B><?php echo $cli->__GET('uid') ?></B> | NOMBRE: <?php echo $cli->__GET('fname') ?> <?php echo $cli->__GET('lname') ?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Campo obligaorio.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md mb-4">
                                <label for="validationCustom02">Producto</label>

                                <select class="form-control selectpicker" data-live-search="true" name="uidProduct" required>
                                    <?php
                                    foreach($listaProductos as $prod) {
                                        if($prod->__GET('stock')>0){
                                    ?>
                                            <option value="<?php echo $prod->__GET('uid') ?>" data-tokens="<?php echo $prod->__GET('uid') ?>"> 
                                                REF: <?php echo $prod->__GET('refcode') ?> | STOCK: <?php echo $prod->__GET('stock')  ?> | PRECIO: $<?php echo $prod->__GET('price') ?>
                                            </option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Campo obligaorio.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md mb-4">
                                <label for="validationCustom013">Cantidad</label>
                                <input type="number" class="form-control" id="validationCustom013" name="nItems" required>
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