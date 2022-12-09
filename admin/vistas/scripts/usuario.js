var tabla;  

//Función que se ejecuta al inicio
function init() {

  $("#bloc_Accesos").addClass("menu-open bg-color-191f24");

  $("#mAccesos").addClass("active");

  $("#lUsuario").addClass("active");

  tbla_principal();

  // ══════════════════════════════════════ S E L E C T 2 ══════════════════════════════════════  

  //lista_select2("../ajax/usuario.php?op=select2Trabajador", '#trabajador', null);
  //lista_select2("../ajax/ajax_general.php?op=select2_cargo_trabajador", '#cargo_trabajador_trab', null);

  
  // ══════════════════════════════════════ G U A R D A R   F O R M ══════════════════════════════════════

  $("#guardar_registro_usuario").on("click", function (e) {  $("#submit-form-usuario").submit(); });

  // ══════════════════════════════════════ INITIALIZE SELECT2 ══════════════════════════════════════  

  //$("#tipo_usuario").select2({ theme: "bootstrap4", placeholder: "Selecione cargo", allowClear: true, });


  // restringimos la fecha para no elegir mañana
  no_select_tomorrow('#nacimiento_trab')
  
  // Formato para telefono
  $("[data-mask]").inputmask();   
}

function formatState (state) {
  //console.log(state);
  if (!state.id) { return state.text; }
  var baseUrl = state.title != '' ? `../dist/docs/trabajador/perfil/${state.title}`: '../dist/svg/user_default.svg'; 
  var onerror = `onerror="this.src='../dist/svg/user_default.svg';"`;
  var $state = $(`<span><img src="${baseUrl}" class="img-circle mr-2 w-25px" ${onerror} />${state.text}</span>`);
  return $state;
};
function formatStateBanco (state) {
  //console.log(state);
  if (!state.id) { return state.text; }
  var baseUrl = state.title != '' ? `../dist/docs/banco/logo/${state.title}`: '../dist/docs/banco/logo/logo-sin-banco.svg'; 
  var onerror = `onerror="this.src='../dist/docs/banco/logo/logo-sin-banco.svg';"`;
  var $state = $(`<span><img src="${baseUrl}" class="img-circle mr-2 w-25px" ${onerror} />${state.text}</span>`);
  return $state;
};


// abrimos el navegador de archivos
$("#foto1_i").click(function() { $('#foto1').trigger('click'); });
$("#foto1").change(function(e) { addImage(e,$("#foto1").attr("id"), ) });


function foto1_eliminar() {

	$("#foto1").val("");
	$("#foto1_i").attr("src", "../dist/img/default/img_defecto.png");
	$("#foto1_nombre").html("");
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

function permisos() {
  $("#permisos").html('<i class="fas fa-spinner fa-pulse fa-2x"></i>');
  //Permiso
  $.post(`../ajax/usuario.php?op=permisos&id=`, function (r) {

    r = JSON.parse(r); //console.log(r);

    if (r.status) { $("#permisos").html(r.data); } else { ver_errores(e); }
    //$("#permiso_4").rules('add', { required: true, messages: {  required: "Campo requerido" } });
    
  }).fail( function(e) { console.log(e); ver_errores(e); } );
}

function show_hide_form(flag) {
	if (flag == 1)	{		
		$("#mostrar-tabla").show();
    $("#mostrar-form").hide();
    $(".btn-regresar").hide();
    $(".btn-agregar").show();
	}	else	{
		$("#mostrar-tabla").hide();
    $("#mostrar-form").show();
    $(".btn-regresar").show();
    $(".btn-agregar").hide();
	}
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
      { extend: 'copyHtml5', footer: true, exportOptions: { columns: [0,1,2,3,4,5,6,7], } }, 
      { extend: 'excelHtml5', footer: true, exportOptions: { columns: [0,1,2,3,4,5,6,7], } }, 
      { extend: 'pdfHtml5', footer: false, exportOptions: { columns: [0,1,2,3,4,5,6,7], } } ,
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
          show_hide_form(1); limpiar_form_usuario(); 
          sw_success('Correcto!', "Usuario guardado correctamente." );
          $("#guardar_registro_usuario").html('Guardar Cambios').removeClass('disabled');
          $('#modal-agregar-usuario').modal('hide');
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
/*function eliminar1(idusuario, nombre) {
  
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
}*/

function eliminar(idusuario,nombre) {
  Swal.fire({
    title: "Está Seguro de  Eliminar a",
    html: `<del style="color: red;"></del>`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#28a745",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post("../ajax/usuario.php?op=eliminar", { idusuario: idusuario }, function (e) {
        Swal.fire("Desactivado!", "Tu registro ha sido desactivado.", "success");
        tabla.ajax.reload(null, false); 
      });
    }
  });
}

// :::::::::::::::::::::::::::::::::::::::::::::::::::: S E C C I O N   T R A B A J A D O R  ::::::::::::::::::::::::::::::::::::::::::::::::::::
function limpiar_form_usuario() {

  $("#guardar_registro_usuario").html('Guardar Cambios').removeClass('disabled');

  $(".tooltip").removeClass("show").addClass("hidde");

 
  $("#zona").val("null").trigger("change");
  $("#tipo_persona").val("null").trigger("change");

  $("#dni").val(""); 
  $("#nombre_usuario").val(""); 
  $("#edad").val(""); 
  $("#telefono").val(""); 
  $("#email").val(""); 
  $("#direccion").val("");
  
  // Limpiamos las validaciones
  $(".form-control").removeClass('is-valid');
  $(".form-control").removeClass('is-invalid');
  $(".error.invalid-feedback").remove();
}


init();

// .....::::::::::::::::::::::::::::::::::::: V A L I D A T E   F O R M  :::::::::::::::::::::::::::::::::::::::..

$(function () {  

  $("#form-usuario").validate({
    //ignore: '.select2-input, .select2-focusser',
    rules: {
      dni: { required: true, minlength: 8, maxlength: 8 },
      nombre_usuario:  { required: true, minlength: 6, maxlength: 20 },
      edad:  { required: true },
      idtipo_persona:  { required: true},
      login:         { required: true, minlength: 6, maxlength: 100 },
      password:          { required:true},
      direccion:      { minlength: 5, maxlength: 70 },
      telefono:       { minlength: 8 },
      email: {required: true},
    },
    messages: {
      dni: { required: "MÍNIMO 8 caracteres.", },
      nombre_usuario:         { required: "Campo requerido.", minlength: "MÍNIMO 6 caracteres.", maxlength: "MÁXIMO 100 caracteres.", },
      edad:          { required: "Campo requerido.", },
      idtipo_persona:          { required: "Campo requerido.", },
      login:              { minlength: "Campo requerido.", },
      password:          { minlength: "Campo requerido.", },
      direccion :        { required: "Campo requerido.", },
      telefono:          { required: "Campo requerido.", },
      email:     { minlength: "MÍNIMO 10 caracteres.",  email: "Ingrese un coreo electronico válido.", minlength: "MÍNIMO 10 caracteres.", maxlength: "MÁXIMO 50 caracteres.", },
      
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

function marcar_todos_permiso() {
   
  if ($(`#marcar_todo`).is(':checked')) {
    $('.permiso').each(function(){ this.checked = true; });
    $('.marcar_todo').html('Desmarcar Todo');
  } else {
    $('.permiso').each(function(){ this.checked = false; });
    $('.marcar_todo').html('Marcar Todo');
  }  
}

function sueld_mensual(){

  var sueldo_mensual = $('#sueldo_mensual_trab').val()

  var sueldo_diario=(sueldo_mensual/30).toFixed(1);

  $("#sueldo_diario_trab").val(sueldo_diario);

}