var tabla;  

//Función que se ejecuta al inicio
function init() {

  $("#bloc_Accesos").addClass("menu-open bg-color-191f24");

  $("#mAccesos").addClass("active");

  $("#lUsuario").addClass("active");

  lista_select2("ajax/registrar.php?op=select2Zona", '#idzona', null);

  // ══════════════════════════════════════ G U A R D A R   F O R M ══════════════════════════════════════

  //$("#guardar_registro_trabajador").on("click", function (e) {  $("#submit-form-trabajador").submit(); });
  
  // Formato para telefono
  //$("[data-mask]").inputmask();   
}

//Función limpiar
function limpiar_form_usuario() { 

  $("#num_documento_civ").val("");
  $("#nombre_civ").val("");
  $("#apellidos_civ").val("");
  $("#correo").val("");
  $("#celular").val("");
  $("#usuario").val("");
  $("#password").val("");  

  // Limpiamos las validaciones
  $(".form-control").removeClass('is-valid');
  $(".form-control").removeClass('is-invalid');
  $(".error.invalid-feedback").remove();
}

//Función para guardar o editar
function guardar_y_editar_civil(e) {
  // e.preventDefault(); //No se activará la acción predeterminada del evento
  var formData = new FormData($("#formulario-registro-civil")[0]);

  $.ajax({
    url: "ajax/registrar.php?op=guardar_y_editar_civil",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (e) { 
      try {
        e = JSON.parse(e); console.log(e);
        if (e.status == true) {
         console.log('registradooooo');
         limpiar_form_usuario();
         sw_success( "Éxito!!", "Acción ejecutada con éxito.", 7000);
        } else {
          ver_errores(d);
        }
      } catch (err) { console.log('Error: ', err.message); toastr.error('<h5 class="font-size-16px">Error temporal!!</h5> puede intentalo mas tarde, o comuniquese con <i><a href="tel:+51921305769" >921-305-769</a></i> ─ <i><a href="tel:+51921487276" >921-487-276</a></i>'); }             
    },
    xhr: function () {
      var xhr = new window.XMLHttpRequest();

      xhr.upload.addEventListener( "progress", function (evt) {

        if (evt.lengthComputable) {
          var prct = (evt.loaded / evt.total) * 100;
          prct = Math.round(prct);

          $("#barra_progress_usuario").css({ width: prct + "%", });

          $("#barra_progress_usuario").text(prct + "%");

        }
      }, false );

      return xhr;
    },
    beforeSend: function () {
      $("#guardar_registro").html('<i class="fas fa-spinner fa-pulse fa-lg"></i>').addClass('disabled');
      $("#div_barra_progress_usuario").show();
      $("#barra_progress_usuario").css({ width: "0%",  });
      $("#barra_progress_usuario").text("0%");
    },
    complete: function () {
      $("#div_barra_progress_usuario").hide();
      $("#barra_progress_usuario").css({ width: "0%", });
      $("#barra_progress_usuario").text("0%");
    },
    error: function (jqXhr) { /*ver_errores(jqXhr); */},
  });
}


init();

// .....::::::::::::::::::::::::::::::::::::: V A L I D A T E   F O R M  :::::::::::::::::::::::::::::::::::::::..

$(function () {

  $("#formulario-registro-civil").validate({
    ignore: '.select2-input, .select2-focusser',
    rules: {
      nombre_civ:    { required: true, minlength: 3, maxlength: 20 },
      apellidos_civ:  { required: true, minlength: 3, maxlength: 20 },
      correo:     { required: true, minlength: 3, maxlength: 20 },
      celular:    { required: true, minlength: 3, maxlength: 20 },
      usuario:      { required: true, minlength: 3, maxlength: 20 },
      password:   { required: true, minlength: 4, maxlength: 20 },
    },
    messages: {
      nombre_civ:    { required: "Este campo es requerido." },
      apellidos_civ:  { required: "Este campo es requerido." },
      correo:     { required: "Este campo es requerido." },
      celular:    { required: "Este campo es requerido." },
      usuario:      { required: "Este campo es requerido.", minlength: "MÍNIMO 4 caracteres.", maxlength: "MÁXIMO 20 caracteres.", },
      password:   { required: "Campo requerido.", minlength: "MÍNIMO 4 caracteres.", maxlength: "MÁXIMO 20 caracteres.", },
    },
    
    errorElement: "span",

    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error); 
    },

    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid").removeClass("is-valid"); 
    },

    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid").addClass("is-valid");              
    },

    submitHandler: function (e) {
      guardar_y_editar_civil(e);
    },
  });
  
});

// .....::::::::::::::::::::::::::::::::::::: F U N C I O N E S    A L T E R N A S  :::::::::::::::::::::::::::::::::::::::..

