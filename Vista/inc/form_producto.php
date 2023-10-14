<div id="contenedor_menu">
<div id="form_contenedor">
    <form class="font-monospace" id="form_producto">
        <div class="mb-4">
            <h4 class="card-title text_titulo">Nuevo Producto</h4>
        </div>

        <div class="mb-2">
        <label for="id_producto" class="form-label">Id producto</label>
        <input type="text" class="form-control" id="id_producto" name="id_producto">
        </div>

        <div class="mb-2">
        <label for="nombre_producto" class="form-label">Nombre producto</label>
        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto">
        </div>

        <div class="mb-2">
        <label for="marca_producto" class="form-label">Marca producto</label>
        <input type="text" class="form-control" id="marca_producto" name="marca_producto">
        </div>

        <div class="col-md-4 mb-4">
        <label for="unidad_medida" class="form-label" >Unidad medida</label>
        <select id="unidad_medida" class="form-select" name="unidad_medida">
        <option selected value="">SELECCIONE</option>
        <option value="KILOGRAMO">KILOGRAMO</option>
        <option value="CANTIDAD">CANTIDAD</option>
        <option value="BOLSA">BOLSA</option>
        </select>
        </div>

        

        <div class="col-md-4 mb-4">
        <label for="almacen_producto" class="form-label">Almacen producto</label>
        <select id="almacen_producto" class="form-select" name="almacen_producto">
        <option value="" selected>SELECCIONE</option>
        <option value="ALMACEN_1">ALMACEN_1</option>
        <option value="ALMACEN_2">ALMACEN_2</option>
        </select>
        </div>

        <div class="mb-2">
        <button type="submit" class="btn btn-primary" name="GUARDAR_PRODUCTO">Guardar</button>
        <button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
        </div>

    </form>
</div>
</div>

<script>
    window.addEventListener('load',function(event){
    
        var cancelar = document.getElementById('cancelar');
        cancelar.addEventListener('click',function(){

            clear_inputs('form_producto');
/*
            var select = document.getElementById('form_producto');
            
            for(var i = 0 ; i < select.elements.length ; i++){
                if(select.elements[i].tagName == 'INPUT'){
                    select.elements[i].value = "";
                }else if(select.elements[i].tagName == 'SELECT'){
                    select.elements[i].options[0].selected = true;
                }
            }
            */

        });
    });
</script>