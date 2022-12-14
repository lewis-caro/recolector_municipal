var tabla;  

//Función que se ejecuta al inicio
function init() {

  $("#bloc_Accesos").addClass("menu-open bg-color-191f24");

  $("#mAccesos").addClass("active");

  $("#lUsuario").addClass("active");

  tbla_principal();
  
  // ══════════════════════════════════════ G U A R D A R   F O R M ══════════════════════════════════════

  $("#guardar_registro_trabajador").on("click", function (e) {  $("#submit-form-trabajador").submit(); });

  
  // Formato para telefono
  $("[data-mask]").inputmask();   
}



//Función limpiar
function limpiar_form_usuario() {
  $("#guardar_registro").html('Guardar Cambios').removeClass('disabled');
  // Agregamos la validacion
  $("#trabajador").rules('add', { required: true, messages: {  required: "Campo requerido" } });  
  $("#password").rules('add', { required: true, messages: {  required: "Campo requerido" } });

  //Select2 trabajador
  lista_select2("../ajax/usuario.php?op=select2Trabajador", '#trabajador', null);

  $("#idusuario").val("");
  $("#trabajador_c").html("Trabajador"); 
  $("#cargo").val("").trigger("change");
  $("#login").val("");
  $("#password").val("");
  $("#password-old").val(""); 
  
  $(".modal-title").html("Agregar usuario");    

  // Limpiamos las validaciones
  $(".form-control").removeClass('is-valid');
  $(".form-control").removeClass('is-invalid');
  $(".error.invalid-feedback").remove();
}


//Función Listar
function tbla_principal() {

  tabla = $('#tabla-usuarios').dataTable({
    responsive: true,
    lengthMenu: [[ -1, 5, 10, 25, 75, 100, 200,], ["Todos", 5, 10, 25, 75, 100, 200, ]],//mostramos el menú de registros a revisar
    aProcessing: true,//Activamos el procesamiento del datatables
    aServerSide: true,//Paginación y filtrado realizados por el servidor
    dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
    buttons: [
      { extend: 'copyHtml5', footer: true, exportOptions: { columns: [0,2,3,4,5], } }, 
      { extend: 'excelHtml5', footer: true, exportOptions: { columns: [0,2,3,4,5], } }, 
      { extend: 'pdfHtml5', footer: false, exportOptions: { columns: [0,2,3,4,5], } } ,
    ],
    ajax:{
      url: '../ajax/usuario.php?op=tbla_principal',
      type : "get",
      dataType : "json",						
      error: function(e){        
        console.log(e.responseText); ver_errores(e);
      }
    },
    createdRow: function (row, data, ixdex) {
      // columna: 0
      if (data[0] != '') { $("td", row).eq(0).addClass("text-center"); }
      // columna: 1
      if (data[1] != '') { $("td", row).eq(1).addClass("text-center"); }
    },
    language: {
      lengthMenu: "_MENU_",
      buttons: { copyTitle: "Tabla Copiada", copySuccess: { _: "%d líneas copiadas", 1: "1 línea copiada", }, },
      sLoadingRecords: '<i class="fas fa-spinner fa-pulse fa-lg"></i> Cargando datos...'
    },
    bDestroy: true,
    iDisplayLength: 10,//Paginación
    order: [[ 0, "asc" ]],//Ordenar (columna,orden)
    columnDefs: [ 
      //{ targets: [6], render: $.fn.dataTable.render.moment('YYYY-MM-DD', 'DD/MM/YYYY'), },
      //{ targets: [12], visible: false, searchable: false },
    ],
  }).DataTable();
}

//Función para guardar o editar
function guardar_y_editar_usuario(e) {
  // e.preventDefault(); //No se activará la acción predeterminada del evento
  var formData = new FormData($("#form-usuario")[0]);

  $.ajax({
    url: "../ajax/usuario.php?op=guardar_y_editar_usuario",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (e) { 
      try {
        e = JSON.parse(e); console.log(e);
        if (e.status == true) {
          tabla.ajax.reload(null, false);
          show_hide_form(1); limpiar_form_usuario(); sw_success('Correcto!', "Usuario guardado correctamente." );
          $("#guardar_registro").html('Guardar Cambios').removeClass('disabled');
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
    error: function (jqXhr) { ver_errores(jqXhr); },
  });
}

function mostrar(idusuario) {
  $(".tooltip").removeClass("show").addClass("hidde");
  $(".trabajador-name").html(`<i class="fas fa-spinner fa-pulse fa-2x"></i>`);  

  limpiar_form_usuario();  

  $(".modal-title").html("Editar usuario");
  $("#trabajador").val("").trigger("change"); 
  $("#trabajador_c").html(`Trabajador <b class="text-danger">(Selecione nuevo) </b>`);
  $("#cargando-1-fomulario").hide();
  $("#cargando-2-fomulario").show();

  // Removemos la validacion
  $("#trabajador").rules('remove', 'required');
  $("#password").rules('remove', 'required');

  show_hide_form(2);

  $("#permisos").html('<i class="fas fa-spinner fa-pulse fa-2x"></i>');

  $.post("../ajax/usuario.php?op=mostrar", { idusuario: idusuario }, function (data, status) {

    data = JSON.parse(data);  console.log(data); 

    $(".trabajador-name").html(` <i class="fas fa-users-cog text-primary"></i> <b class="texto-parpadeante font-size-20px">${data.data.nombres}</b> `);    

    $("#trabajador_old").val(data.data.idtrabajador);
    $("#cargo").val(data.data.cargo).trigger("change");
    $("#login").val(data.data.login);
    $("#password-old").val(data.data.password);
    $("#idusuario").val(data.data.idusuario);

    $("#cargando-1-fomulario").show();
    $("#cargando-2-fomulario").hide();    

  }).fail( function(e) { console.log(e); ver_errores(e); } );

  //Permiso
  $.post(`../ajax/usuario.php?op=permisos&id=${idusuario}`, function (r) {

    r = JSON.parse(r); console.log(r);

    if (r.status) { $("#permisos").html(r.data); } else { ver_errores(e); }
    //$("#permiso_4").rules('add', { required: true, messages: {  required: "Campo requerido" } });
    
  }).fail( function(e) { console.log(e); ver_errores(e); } );
}

//Función para desactivar registros
function eliminar(idusuario, nombre) {
  
  crud_eliminar_papelera(
    "../ajax/usuario.php?op=desactivar",
    "../ajax/usuario.php?op=eliminar", 
    idusuario, 
    "!Elija una opción¡", 
    `<b class="text-danger"><del>${nombre}</del></b> <br> En <b>papelera</b> encontrará este registro! <br> Al <b>eliminar</b> no tendrá acceso a recuperar este registro!`, 
    function(){ sw_success('♻️ Papelera! ♻️', "Tu registro ha sido reciclado." ) }, 
    function(){ sw_success('Eliminado!', 'Tu registro ha sido Eliminado.' ) }, 
    function(){ tabla.ajax.reload(null, false) },
    false, 
    false, 
    false,
    false
  );
}



init();

// .....::::::::::::::::::::::::::::::::::::: V A L I D A T E   F O R M  :::::::::::::::::::::::::::::::::::::::..

$(function () {

  $("#form-usuario").validate({
    ignore: '.select2-input, .select2-focusser',
    rules: {
      login:    { required: true, minlength: 3, maxlength: 20 },
      password: { required: true, minlength: 4, maxlength: 20 },
      cargo:    { required: true },
    },
    messages: {
      login:    { required: "Este campo es requerido.", minlength: "MÍNIMO 4 caracteres.", maxlength: "MÁXIMO 20 caracteres.", },
      password: { equired: "Campo requerido.", minlength: "MÍNIMO 4 caracteres.", maxlength: "MÁXIMO 20 caracteres.", },
      cargo:    { required: "Campo requerido." },
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
      guardar_y_editar_usuario(e);
    },
  });
  
});

// .....::::::::::::::::::::::::::::::::::::: F U N C I O N E S    A L T E R N A S  :::::::::::::::::::::::::::::::::::::::..
