<!-- Editar Clientes -->
<div class="modal fade" id="edit_<?php echo $cli->__GET('uid'); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Editar Cliente</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <form action='../controller/customer.crud.php' method='post' class="needs-validation2" >
                
                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="form-row">
                            <input type='hidden' name='uid' value="<?php echo $cli->__GET('uid'); ?>">

                            <div class="col-md-6 mb-4">
                                <label for="validationCustom05">Nombre</label>
                                <input type="text" class="form-control" id="validationCustom05" name="fname" value="<?php echo $cli->__GET('fname'); ?>" required>
                                <div class="invalid-feedback">
                                    Campo obligaorio.
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validationCustom06>">Apellido</label>
                                <input type="text" class="form-control" id="validationCustom06" name="lname" value="<?php echo $cli->__GET('lname'); ?>" required>
                                <div class="invalid-feedback">
                                    Campo obligaorio.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md mb-4">
                                <label for="validationCustom07">Email</label>
                                <input type="email" class="form-control" id="validationCustom07" name="email" value="<?php echo $cli->__GET('email'); ?>" required>
                                <div class="invalid-feedback">
                                    Campo obligaorio.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md mb-4">
                                <label for="validationCustom08">Direccion</label>
                                <input type="text" class="form-control" id="validationCustom08" name="address" value="<?php echo $cli->__GET('address'); ?>" required>
                                <div class="invalid-feedback">
                                    Campo obligaorio.
                                </div>
                            </div>
                        </div>
                        <input type='hidden' class="form-control"  name='edit' value='edit'>                        
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-success" type="submit"><i class="bi bi-save-fill"> </i>Editar Registro</button>
                </div>
            </form>
            
            

        </div>
    </div>
</div>

