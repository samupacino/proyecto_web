<div class="container-xl">
    <div id="contenedor_cliente">
    <div class="mb-4">
        <h4 class="card-title text_titulo">REGISTRO DE PROVEEDOR</h4>
    </div>
    <form action="" id="form_proveedor">
        <table class="table table-striped">
            <tbody>

                <tr>
                    <td>Nombres</td>
                    <td>
                        <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" name="NOMBRES">
                    </td>
                </tr>

                <tr>
                    <td>Apellido paterno</td>
                    <td>
                        <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" name="APELLIDO_PATERNO">
                    </td>
                </tr>

                <tr>
                    <td>Apellido materno</td>
                    <td>
                        <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" name="APELLIDO_MATERNO">
                    </td>
                </tr>

                <tr>
                    <td>Direccion</td>
                    <td>
                        <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" name="DIRECCION">
                    </td>
                </tr>

                <tr>
                    <td>Telefono</td>
                    <td>
                        <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" name="TELEFONO">
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>
                        <input class="form-control form-control-sm" type="email" aria-label=".form-control-sm example" name="EMAIL">
                    </td>
                </tr>

                <tr>
                    <td>Documento</td>
                    <td>
                        <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" name="TIPO_DOCUMENTO">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-danger" id="cancel_proveedor">Cancelar</button>
                    </td>
                </tr>

            </tbody>
        </table>
    </form>
    </div>
</div>
<script>
    window.addEventListener('load',function(){
        var limpiar_casillas = document.getElementById('cancel_proveedor');
        limpiar_casillas.addEventListener('click',function(){
            clear_inputs('form_proveedor');
        });
    });
</script>