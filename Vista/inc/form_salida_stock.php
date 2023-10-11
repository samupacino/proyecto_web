<div id="contenedor_menu">
<div id="form_contenedor">
    <form class="font-monospace" id="form_salida_stock">
        <div class="mb-4">
            <h4 class="card-title text_titulo">Salida de stock de producto</h4>
        </div>

        <div class="col-md-4 mb-4">
        <label for="salida_select_id" class="form-label">Id de producto</label>
        <select id="salida_select_id" class="form-select" name="ID_PRODUCTO">

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
        <label for="salida_select_producto" class="form-label">Nombre producto</label>
        <select id="salida_select_producto" class="form-select" name="NOMBRE_PRODUCTO">
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
        <label for="cliente" class="form-label">Nombre cliente</label>
        <select id="cliente" class="form-select" name="CLIENTE_PROVEEDOR">

            <option selected>SELECCIONE</option>        
            <?php
            foreach($lista_cliente as $cliente){
            ?>
            <option><?php echo $cliente['NOMBRES']?></option>
            <?php    
            }
            ?>
            
        </select>
        </div>

        <div class="col-md-4 mb-4">
        <label for="tipo_mov" class="form-label">Tipo movimiento</label>
        <select id="tipo_mov" class="form-select" name="TIPO_MOVIMIENTO">
        <option selected>SALIDA</option>
        </select>
        </div>

        <div class="mb-2">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-danger" id="cancela">Cancelar</button>
        </div>

    </form>
</div>
</div>

<script>
    window.addEventListener('load',function(){
        var limpiar_casillas = document.getElementById('cancela');
        limpiar_casillas.addEventListener('click',function(){
            clear_inputs('form_salida_stock');
        });
    });
</script>