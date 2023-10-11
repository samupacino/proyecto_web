<?php
    include'inc/head.php';
    include'inc/menu.php';
?>
    <div id="container_inicio">
    <div>
        <input type="submit" id="ACTUALIZAR" value="ACTUALIZAR TABLA  " class="btn btn-primary">
    </div>
        <div id="container_inicio_tabla">
            <table id="tabla_inicio" class="table table-hover">
                <thead>
                    <th>ID PRODUCTO</th>
                    <th>NOMBRE PRODUCTO</th>
                    <th>CANTIDAD</th>
                    <th>USUARIO</th>
                    <th>TIPO MOVIMIENTO</th>
                </thead>
                <tbody id="tabla_cisterna">
                <?php
                    foreach($listar_movimiento as $datos){
                ?>
                <tr>
                    <td><?php echo $datos['ID_PRODUCTO'];?></td>
                    <td><?php echo $datos['NOMBRE_PRODUCTO'];?></td>
                    <td><?php echo $datos['CANTIDAD'];?></td>
                    <td><?php echo $datos['CLIENTE_PROVEEDOR'];?></td>
                    <td><?php echo $datos['TIPO_MOVIMIENTO'];?></td>
                </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
<script>

    window.addEventListener('load',function(evento){
    
        var boton = document.getElementById('tabla_cisterna');
        boton.addEventListener('dblclick',function(evento){
           //console.log(boton.rows);
           //console.log(boton.getElementsByTagName("tr").item(0));
            for(var i = 0 ; i < boton.rows.length ; i++){
                var listar_nombres = boton.getElementsByTagName('tr')[i].getElementsByTagName('td').item(0).innerText;
                var indice_nombre = evento.target.parentElement.getElementsByTagName("td").item(0).innerText;
                if(listar_nombres == indice_nombre){
                    boton.deleteRow(i);
                }
            }
        });

        var ACTUALIZAR = document.getElementById('ACTUALIZAR');
        ACTUALIZAR.addEventListener('click',function(evento){

            var tabla = document.getElementById('tabla_cisterna');
            getCountRow = tabla.rows.length;

            for(var i = 0 ; i < getCountRow ; i++){
                tabla.deleteRow(0);
            }
            
            
            var ajax_datos = new XMLHttpRequest();
            ajax_datos.addEventListener('readystatechange',function(evento){

                if(evento.target.readyState != 4){
                    return;
                }

                if(evento.target.status >= 200 && evento.target.status < 300){
                    crear_body(JSON.parse(evento.target.responseText));
                }else{
            
                }

            });
            ajax_datos.open('GET','index.php?resumen&cargarnuevos');
            ajax_datos.send();
            
        });

        function crear_body(DATOS_JSON){

            var fragmento =  document.createDocumentFragment();
            var tabla_body = document.getElementById('tabla_cisterna');

            for(datos of DATOS_JSON){

                var fila = document.createElement('tr');

                var id = document.createElement('td');
                var nombre = document.createElement('td');
                var cantidad = document.createElement('td');
                var usuario = document.createElement('td');
                var movimiento = document.createElement('td');

                id.textContent = datos['ID_PRODUCTO'];
                nombre.textContent = datos['NOMBRE_PRODUCTO'];
                cantidad.textContent = datos['CANTIDAD'];
                usuario.textContent = datos['CLIENTE_PROVEEDOR'];
                movimiento.textContent = datos['TIPO_MOVIMIENTO'];

                fila.appendChild(id);
                fila.appendChild(nombre);
                fila.appendChild(cantidad);
                fila.appendChild(usuario);
                fila.appendChild(movimiento);
                fragmento.appendChild(fila);
            }
            tabla_body.appendChild(fragmento);
        }
        
    });
</script>
<?php
    include'inc/footer.php';
?>