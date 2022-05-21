<!-- Editar Registros -->
<div class="modal fade" id="edit_<?php echo $prod->__GET('uid'); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Editar Producto</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <form action='../controller/product.crud.php' method='post' class="needs-validation" >

                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="form-row">
                            <input type='hidden' name='uid' value="<?php echo $prod->__GET('uid'); ?>">

                            <div class="col-md-6 mb-4">
                                <label for="validationCustom01">Nombre</label>
                                <input type="text" class="form-control" id="validationCustom01" name="pname" value="<?php echo $prod->__GET('pname'); ?>" required>
                                <div class="invalid-feedback">
                                    Campo obligaorio.
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validationCustom02">Referencia</label>
                                <input type="text" class="form-control" id="validationCustom02" name="refcode" value="<?php echo $prod->__GET('refcode'); ?>" required>
                                <div class="invalid-feedback">
                                    Campo obligaorio.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-4">
                                <label for="validationCustom02">Precio ($COP)</label>
                                <input type="number" class="form-control" id="validationCustom03" name="price" value="<?php echo $prod->__GET('price'); ?>" required>
                                <div class="invalid-feedback">
                                    Campo obligaorio.
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-4">
                                <label for="validationCustom05">Stock</label>
                                <input type="number" class="form-control" id="validationCustom04" name="stock" value="<?php echo $prod->__GET('stock'); ?>" required>
                                <div class="invalid-feedback">
                                    Campo obligaorio.
                                </div>
                            </div>
                        </div>
                        <input type='hidden' name='edit' value='edit'>                        
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