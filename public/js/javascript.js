//////////////////////////////////////////////


window.addEventListener('load',function(event){

//ajax_registro_usuario();
  function ajax_registro_usuario(){

    var submit_registro = document.getElementById('form_registre_usuario');

      submit_registro.addEventListener('submit',function(evento){
        var formulario = new FormData(document.getElementById('form_registre_usuario'));      
        evento.preventDefault();
        registro_ajax(formulario);
      });
    
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




});


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