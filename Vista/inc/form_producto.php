<div id="contenedor_menu">
<div id="form_contenedor">
    <form class="font-monospace">
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
        <label for="unidad_medida" class="form-label">Unidad medida</label>
        <select id="unidad_medida" class="form-select">
        <option selected>Choose...</option>
        <option>...</option>
        </select>
        </div>

        <div class="col-md-4 mb-4">
        <label for="almacen_producto" class="form-label">Almacen producto</label>
        <select id="almacen_producto" class="form-select">
        <option selected>Choose...</option>
        <option>...</option>
        </select>
        </div>

        <div class="mb-2">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-danger">Cancelar</button>
        </div>

    </form>
</div>
</div>