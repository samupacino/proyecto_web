<div id="contenedor_menu">
    <div id="form_contenedor">
        <form class="font-monospace" id="form_ingreso_stock">
            <div class="mb-4">
                <h4 class="card-title text_titulo">Ingreso de stock de producto</h4>
            </div>

            <div class="col-md-4 mb-4">
            <label for="select_id_producto" class="form-label">Id de producto</label>
            <select id="select_id_producto" class="form-select" name="ID_PRODUCTO">

                <option selected>SELECCIONE</option>
                <?php
                    foreach($listar_producto as $producto){
                ?>    
                <option><?php echo $producto['idPRODUCTO']?></option> 
                <?php        
                    }
                ?>

            </select>
            </div>

            <div class="col-md-4 mb-4">
            <label for="select_nom_producto" class="form-label">Nombre producto</label>
            <select id="select_nom_producto" class="form-select" name="NOMBRE_PRODUCTO">

                <option selected>SELECCIONE</option>
                <?php
                    foreach($listar_producto as $producto){
                ?>    
                <option> <?php echo $producto['NOMBRE']?> </option> 
                <?php        
                    }
                ?>

            </select>
            </div>

            <div class="mb-2">
            <label for="cantidad_producto" class="form-label">Cantidad producto</label>
            <input type="text" class="form-control" id="cantidad_producto" name="CANTIDAD">
            </div>

            <div class="col-md-4 mb-4">
            <label for="proveedor" class="form-label">Nombre proveedor</label>
            <select id="proveedor" class="form-select" name="CLIENTE_PROVEEDOR">
            <option selected>SELECCIONE</option>

                <?php 
                foreach($lista_proveedor as $proveedor){
                ?>
                    <option><?php echo $proveedor['NOMBRES'] ?></option>
                <?php    
                }
                ?>
                
            </select>
            </div>

            <div class="col-md-4 mb-4">
            <label for="tipo_mov" class="form-label">Tipo movimiento</label>
                <select id="tipo_mov" class="form-select" name="TIPO_MOVIMIENTO">
                <option selected>INGRESO</option>
                </select>
            </div>

            <div class="mb-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-danger" id="cancelar_form">Cancelar</button>
            </div>

        </form>
    </div>
</div>
<script>
    window.addEventListener('load',function(){
        var limpiar_casillas = document.getElementById('cancelar_form');
        limpiar_casillas.addEventListener('click',function(){
            clear_inputs('form_ingreso_stock');
        });
    });
</script>