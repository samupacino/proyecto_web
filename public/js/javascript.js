
function clear_inputs(id_formulario){
  //'form_producto'
  var select = document.getElementById(id_formulario);
            
  for(var i = 0 ; i < select.elements.length ; i++){
      if(select.elements[i].tagName == 'INPUT'){
          select.elements[i].value = "";
      }else if(select.elements[i].tagName == 'SELECT'){
          select.elements[i].options[0].selected = true;
      }
  }
}

window.addEventListener('load',function(event){

//////////////////////////////////////////////
//GUARDAR_PROVEEDORES
if(document.getElementById('form_proveedor')){

  var formulario_proveedor = document.getElementById('form_proveedor');
  formulario_proveedor.addEventListener('submit',function(evento){
    var datos_proveedor = new FormData(document.getElementById('form_proveedor'));

    evento.preventDefault();
    registro_proveedor(datos_proveedor);
  });
}
function registro_proveedor(datos_proveedor){
  var ajax_registro_proveedor = new XMLHttpRequest();

  ajax_registro_proveedor.addEventListener('readystatechange',function(evento){
    if(evento.target.readyState != 4){
      return;
    }

    if(evento.target.status >= 200 && evento.target.status < 300){
      alert(JSON.parse(evento.target.responseText));
      clear_inputs('form_proveedor');
    }

  });
  ajax_registro_proveedor.open('POST','index.php?proveedor&GUARDAR_PROVEEDOR');
  ajax_registro_proveedor.send(datos_proveedor);

}


//////////////////////////////////////////////
//GUARDAR_CLIENTES

if(document.getElementById('form_cliente')){

  var formulario_cliente = document.getElementById('form_cliente');
  formulario_cliente.addEventListener('submit',function(evento){

    evento.preventDefault();
    var datos_clientes = new FormData(document.getElementById('form_cliente'));

    registro_clientes(datos_clientes);
  });
}
function registro_clientes(datos_clientes){

  var ajax_registro_clientes = new XMLHttpRequest();  
  /*for(datos of datos_clientes){
    console.log(datos);
  }*/
  ajax_registro_clientes.addEventListener('readystatechange',function(evento){

    if(evento.target.readyState != 4){
      return;
    }

    if(evento.target.status >= 200 && evento.target.status < 300){
      alert(JSON.parse(evento.target.responseText));
      clear_inputs('form_cliente');

    }else{

    }

  });
  ajax_registro_clientes.open('POST','index.php?clientes&GUARDAR_CLIENTE');
  ajax_registro_clientes.send(datos_clientes);
}
//////////////////////////////////////////////
ajax_registro_producto();//GUARDAR_PRODUCTO
function ajax_registro_producto(){


  if(document.getElementById('form_producto')){

    var form_producto = document.getElementById('form_producto');
   

    form_producto.addEventListener('submit',function(evento){
      evento.preventDefault();
      var datos_producto = new FormData(document.getElementById('form_producto'));
      registro_producto(datos_producto);
    });
 
  }

}

function registro_producto(datos_producto){
/*
  var select_unidad_medida = document.getElementById('unidad_medida');
  var valor = select_unidad_medida.options[select_unidad_medida.selectedIndex].value;
  datos_producto.set('unidad_medida',valor);

  var select_unidad_medida = document.getElementById('almacen_producto');
  var valor = select_unidad_medida.options[select_unidad_medida.selectedIndex].value;
  datos_producto.set('almacen_producto',valor);

  for (let obj of datos_producto) {
    console.log(obj);
  }*/


  var ajax_registrar = new XMLHttpRequest();
  ajax_registrar.addEventListener('readystatechange',function(evento){

    if(evento.target.readyState != 4){
      return;
    }
    if(evento.target.status >= 200 && evento.target.status < 300){
        alert(JSON.parse(evento.target.responseText));
        clear_inputs('form_producto');
    }else{

    }

  });
  ajax_registrar.open('POST','index.php?producto&GUARDAR_PRODUCTO');
  ajax_registrar.send(datos_producto);
}

//////////////////////////////////////////////


  ajax_registro_usuario();
  function ajax_registro_usuario(){

    if(document.getElementById('form_registre_usuario')){
      var submit_registro = document.getElementById('form_registre_usuario');

        submit_registro.addEventListener('submit',function(evento){
          var formulario = new FormData(document.getElementById('form_registre_usuario'));      
          evento.preventDefault();
          registro_ajax(formulario);
        });
    }
  }
  function registro_ajax(form){

    var ajax = new XMLHttpRequest();
    ajax.addEventListener('readystatechange',function(event){
      if(event.target.readyState !== 4){
        return;
      }
      if(event.target.status >= 200 && event.target.status < 300){
        alert(event.target.responseText);
        var click_login = document.getElementById('iniciar_login');
        limpiar_casillas();
        click_login.click();
        //location.reload();
      }else{
        alert(event.target.responseText);
        limpiar_casillas();
      }
    });
    ajax.open('POST','index.php?registro_usuario');
    ajax.send(form);
  }
  function limpiar_casillas(){
    var campos_formularios = document.getElementsByClassName('usuario');
    for(var i = 0 ; i < campos_formularios.length ; i++){
      campos_formularios[i].value = "";
    }
  }

////////////////////////////////////////////////////////////////////////////////////////
form_ingreso_stock();
function form_ingreso_stock(){
  if(document.getElementById('form_ingreso_stock')){

    var form_ingreso = document.getElementById('form_ingreso_stock');

    form_ingreso.addEventListener('submit',function(evento){

      var datos_form_ingreso = new FormData(document.getElementById('form_ingreso_stock'));
      
      evento.preventDefault();
      /*for(datos of datos_form_ingreso){
        console.log(datos);
      } */
      ajax_registro_ingreso(datos_form_ingreso);

    });
  }
}
function ajax_registro_ingreso(datos_form_ingreso){
  
  var ajax_form_ingreso = new XMLHttpRequest();

  ajax_form_ingreso.addEventListener('readystatechange',function(evento){

    if(evento.target.readyState != 4){
      return;
    }
    if(evento.target.status >= 200 && evento.target.status < 300){
      alert(JSON.parse(evento.target.responseText));
      clear_inputs('form_ingreso_stock');
    }else{

    }
  });
  ajax_form_ingreso.open('POST','index.php?ingreso&GUARDAR_INGRESO');
  ajax_form_ingreso.send(datos_form_ingreso);

}
/////////////////////////////////////////////////////////////////
registro_mov_salida();
function registro_mov_salida(){
  if(document.getElementById('form_salida_stock')){


    var form_salida_mov = document.getElementById('form_salida_stock');
    form_salida_mov.addEventListener('submit',function(evento){
      var datos_salida_mov = new FormData(document.getElementById('form_salida_stock'));

      evento.preventDefault();
      ajax_mov_salida(datos_salida_mov);
    });

  }
}
function ajax_mov_salida(datos_salida_mov){

  var ajax_ingreso = new XMLHttpRequest();
  ajax_ingreso.addEventListener('readystatechange',function(evento){

    if(evento.target.readyState != 4){
      return;
    }
    if(evento.target.status >= 200 && evento.target.status < 300){
      alert(evento.target.responseText);
      clear_inputs('form_salida_stock');
    }else{

    }

  });

  ajax_ingreso.open('POST','index.php?salida&GUARDAR_SALIDA');
  ajax_ingreso.send(datos_salida_mov);
}
////////////////////////////////////////////////////////////////////////////////////////
ingreso_mov_stock();
function ingreso_mov_stock(){

  if(document.getElementById('select_id_producto')){
    var select = document.getElementById('select_id_producto');
    var name_producto = document.getElementById('select_nom_producto');
    
    select.addEventListener('change',function(evento){
      name_producto.options[select.selectedIndex].selected = true;
    });
  }
}
////////////////////////////////////////////////////////////////////////////////////
salida_mov_stock();
function salida_mov_stock(){

  if(document.getElementById('salida_select_id')){
    var select = document.getElementById('salida_select_id');
    var name_producto = document.getElementById('salida_select_producto');
    
    select.addEventListener('change',function(evento){
      name_producto.options[select.selectedIndex].selected = true;
    });
  }
}


});
////////////////////////////////////////////////////

//////////////////////////////////////////////
$(document).ready(function () {
    $(".contenedor-formularios")
      .find("input, textarea")
      .on("keyup blur focus", function (e) {
        var $this = $(this),
          label = $this.prev("label");
  
        if (e.type === "keyup") {
          if ($this.val() === "") {
            label.removeClass("active highlight");
          } else {
            label.addClass("active highlight");
          }
        } else if (e.type === "blur") {
          if ($this.val() === "") {
            label.removeClass("active highlight");
          } else {
            label.removeClass("highlight");
          }
        } else if (e.type === "focus") {
          if ($this.val() === "") {
            label.removeClass("highlight");
          } else if ($this.val() !== "") {
            label.addClass("highlight");
          }
        }
      });
  
    $(".tab a").on("click", function (e) {
      e.preventDefault();
  
      $(this).parent().addClass("active");
      $(this).parent().siblings().removeClass("active");
  
      target = $(this).attr("href");
  
      $(".contenido-tab > div").not(target).hide();
  
      $(target).fadeIn(600);
    });
  });
//////////////////////////////////////////////////////////////////////////////