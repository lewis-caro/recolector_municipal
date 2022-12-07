var tabla;  
var tabla1;  

//Función que se ejecuta al inicio
function init() {

  $("#bloc_Accesos").addClass("menu-open bg-color-191f24");
  $("#mAccesos").addClass("active");
  $("#lUsuario").addClass("active");

  tbla_principal();
  tbla_principal2();

  // ══════════════════════════════════════ G U A R D A R   F O R M ══════════════════════════════════════

  //$("#guardar_registro_reporte").on("click", function (e) {  $("#submit-form-reporte").submit(); });

  //lista_select2("../ajax/tareas_trabajador.php?op=select2TipoResiduo", '#idtipo_residuo', null);

  // restringimos la fecha_hoy para no elegir mañana
  no_select_tomorrow('#nacimiento_trab')

  $("#fecha_hoy").val(moment().format('YYYY-MM-DD')).attr('readonly', 'readonly');
  
  // Formato para telefono
  $("[data-mask]").inputmask();   
}

// abrimos el navegador de archivos
$("#doc1_i").click(function() {  $('#doc1').trigger('click'); });
$("#doc1").change(function(e) {  addImageApplication(e, $("#doc1").attr("id")) });

// Eliminamos el doc 1
function doc1_eliminar() {

	//$("#doc1").val("");

	$("#doc1_ver").html('<img src="../dist/svg/pdf_trasnparent.svg" alt="" width="50%" >');

	//$("#doc1_nombre").html("");
}

//Función limpiar
function limpiar_form_usuario() {

  $("#idtipo_residuo").val("");
  $("#descripcion").val(""); 
  $("#referencia").val("");
  $("#fecha_hoy").val("");    

  // Limpiamos las validaciones
  $(".form-control").removeClass('is-valid');
  $(".form-control").removeClass('is-invalid');
  $(".error.invalid-feedback").remove();
}


//Función Listar
function tbla_principal() {

  tabla = $('#tabla-tareas-trabajador').dataTable({
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
      url: '../ajax/tareas_trabajador.php?op=tbla_principal',
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

//Tabla de listas hechas
function tbla_principal2() {

  tabla1 = $('#tabla-tareas-trabajador2').dataTable({
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
      url: '../ajax/tareas_trabajador.php?op=tbla_principal2',
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
/*function guardar_y_editar_reporte(e) {
  // e.preventDefault(); //No se activará la acción predeterminada del evento
  var formData = new FormData($("#form-reporte")[0]);

  $.ajax({
    url: "../ajax/reporte_civil.php?op=guardar_y_editar_reporte",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (e) { 
      try {
        e = JSON.parse(e); console.log(e);
        if (e.status == true) {
          tabla.ajax.reload(null, false);
          limpiar_form_usuario(); 
          sw_success('Correcto!', "Usuario guardado correctamente." );
          $("#guardar_registro_reporte").html('Guardar Cambios').removeClass('disabled');
          $('#modal-agregar-reporte').modal('hide');
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

          $("#barra_progress").css({ width: prct + "%", });

          $("#barra_progress").text(prct + "%");

        }
      }, false );

      return xhr;
    },
    beforeSend: function () {
      $("#guardar_registro_reporte").html('<i class="fas fa-spinner fa-pulse fa-lg"></i>').addClass('disabled');
      $("#barra_progress_div").show();
      $("#barra_progress").css({ width: "0%",  });
      $("#barra_progress").text("0%");
    },
    complete: function () {
      $("#barra_progress_div").hide();
      $("#barra_progress").css({ width: "0%", });
      $("#barra_progress").text("0%");
    },
    error: function (jqXhr) { ver_errores(jqXhr); },
  });
}*/

/*function cargar(idreporte) {

  $('#modal-agregar-reporte').modal('show');
  
  $(".tooltip").removeClass("show").addClass("hidde");
  $(".trabajador-name").html(`<i class="fas fa-spinner fa-pulse fa-2x"></i>`);  

  
  limpiar_form_usuario();  


  $.post("../ajax/reporte_civil.php?op=mostrar", { idreporte: idreporte }, function (data) {

    data = JSON.parse(data);  console.log(data); 

    $("#idreporte").val(data.data.idreporte);
    $("#idtipo_residuo").val(data.data.idtipo_residuo);
    $("#descripcion").val(data.data.descripcion);
    $("#referencia").val(data.data.referencia);
    $("#doc1").val(data.data.doc1);
    $("#fecha_hoy").val(data.data.fecha);

    $("#cargando-1-fomulario").show();
    $("#cargando-2-fomulario").hide();    

  }).fail( function(e) { console.log(e); ver_errores(e); } );

  //Permiso
  $.post(`../ajax/usuario.php?op=permisos&id=${idreporte}`, function (r) {

    r = JSON.parse(r); console.log(r);

    if (r.status) { $("#permisos").html(r.data); } else { ver_errores(e); }
    //$("#permiso_4").rules('add', { required: true, messages: {  required: "Campo requerido" } });
    
  }).fail( function(e) { console.log(e); ver_errores(e); } );
}*/

//Función para desactivar registros
// function borrar(idreporte, nombre) {
  
//   crud_eliminar_papelera(
//     "../ajax/reporte_civil.php?op=desactivar",
//     "../ajax/reporte_civil.php?op=borrar", 
//     idreporte, 
//     "!Elija una opción¡", 
//     `<b class="text-danger"><del>${nombre}</del></b><br> 
//       En <b>papelera</b> encontrará este registro!<br> 
//       Al <b>eliminar</b> no tendrá acceso a recuperar este registro!`,

//     function(){ sw_success('♻️ Papelera! ♻️', "Tu registro ha sido reciclado." ) }, 
//     function(){ sw_success('Eliminado!', 'Tu registro ha sido Eliminado.' ) }, 
//     function(){ tabla.ajax.reload(null, false) },
//     false, 
//     false, 
//     false,
//     false
//   );
// }

//Traemos del ajax line 56 y eliminamos el reporte

function borrar(idreporte,nombre) {
  Swal.fire({
    title: "¿Ya realizaste esta tarea?",
    html: `<del style="color: blue;"></del>`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#28a745",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, ya lo hice!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post("../ajax/tareas_trabajador.php?op=desactivar", { idreporte: idreporte }, function (e) {
        Swal.fire("Desactivado!", "Tu registro ha sido desactivado.", "success");
        tabla.ajax.reload(null, false); 
        tabla1.ajax.reload(null, false); 
      });
    }
  });
}

//Recuperamos nuestra tarea
function recuperar(idreporte,nombre) {
  Swal.fire({
    title: "¿Desea recuperar esta tarea?",
    html: `<del style="color: blue;"></del>`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#28a745",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, recuperar!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post("../ajax/tareas_trabajador.php?op=recuperar", { idreporte: idreporte }, function (e) {
        Swal.fire("Desactivado!", "Tu registro ha sido desactivado.", "success");
        tabla.ajax.reload(null, false); 
        tabla1.ajax.reload(null, false); 
      });
    }
  });
}
        
init();

// .....::::::::::::::::::::::::::::::::::::: V A L I D A T E   F O R M  :::::::::::::::::::::::::::::::::::::::..

$(function () {

  /*$("#form-reporte").validate({
    rules: {
      
      idtipo_residuo:  { required: true },
      descripcion: {  minlength: 3, maxlength: 45 },
      referencia:  { required: true, minlength: 3, maxlength: 300 },
      fecha_hoy:  { required: true},
    },
    messages: {
      idtipo_residuo:    { required: "Este campo es requerido." },
      descripcion: { minlength: "MÍNIMO 4 caracteres.", maxlength: "MÁXIMO 45 caracteres.", },
      referencia:    { required: "Este campo es requerido.", minlength: "MÍNIMO 4 caracteres.", maxlength: "MÁXIMO 300 caracteres.", },
      fecha_hoy: { required: "Campo requerido." },
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
      guardar_y_editar_reporte(e);
    },
  });*/
  
});

// .....::::::::::::::::::::::::::::::::::::: F U N C I O N E S    A L T E R N A S  :::::::::::::::::::::::::::::::::::::::..
