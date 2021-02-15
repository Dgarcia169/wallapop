$(document).ready(function(){
    renderLoader()
    var table = $('#dtCategorias').DataTable({
        "dom"        : 'Bfrtip',
        "serverSide" : true,
        "ajax"       : URL_BASE + "/api/categorias",
        "columns"    : 
        [
            { data: "id"},
            { data: "categoria"},
            {
                data: "categoria",
                render: function() {
                    return  '<a id="editB" href="#" <i style="font-size:25px;" class="fa fa-pencil-square-o"></i></a>' 
                }
            }
        ],
        "buttons": [
            {
                text: 'Nuevo',
                action: renderCreate
            }
        ],
        "fnInitComplete": function (oSettings, json) {
            closeLoader()
        }
    });
    
    /* ===================================================================================================================
    ================================================= CREAR CATEGORIA ====================================================
    =================================================================================================================== */

    function renderCreate() {
        Swal.fire({
          title: '<strong>Crear categoria</strong>',
          html:
            '<form name="formCrear" class="mt25">' +
                '<div class="form-group row">' +
                    '<label class="col-3 col-form-label">Nombre</label>' +
                    '<div class="col-9">' +
                        '<input class="form-control" type="text" name="categoria" id="categoria" />' +
                    '</div>' +
                '</div>' +
            '</form>',
          showCloseButton: true,
          showCancelButton: true,
          focusConfirm: false,
          confirmButtonText:
            'Crear Categoria',
          cancelButtonText:
            'Cancelar',
        }).then((result) => {
              if (result.isConfirmed) {
                var data = 
                {
                    categoria: $('#categoria').val()
                }
                
                post(JSON.stringify(data)) 
              }
        })
    }
    
    async function post(bodyPut){
        renderLoader()
        
        fetch(URL_BASE + "/api/categorias/create", {
                            method: 'POST',
                            headers: {
                              'Content-Type': 'application/json'
                            },
                            body: bodyPut,
                        }
                        ).then(response => {
                               closeLoader()
                               
                               if(response.ok) {
                                   renderDialogValid("Se ha creado la categoria", "Cerrar", () => {
                                       table.ajax.reload();
                                   })
                               } else {
                                   renderDialogFail("No se ha podido crear la categoria")
                               }
                        }).catch(() => {
                              console.log("ERROR")
                         })
    }
    
    /* ===================================================================================================================
    ================================================ EDITAR USUARIO ======================================================
    =================================================================================================================== */
    
    $('#dtCategorias tbody').on('click', '#editB', function () {
        // Cojo el valor de la la fila que clicko: https://datatables.net/examples/ajax/null_data_source.html //
        var categoria = table.row( $(this).parents('tr') ).data();

        Swal.fire({
          title: '<strong>Editar categoria</strong>',
          html:
            '<form name="formEditar" class="mt25">' +
                '<div class="form-group row">' +
                    '<label class="col-3 col-form-label">Nombre</label>' +
                    '<div class="col-9">' +
                        '<input class="form-control" type="text" name="categoria" id="categoria" value="' + categoria.categoria + '"/>' +
                    '</div>' +
                '</div>' +
            '</form>',
          showCloseButton: true,
          showCancelButton: true,
          focusConfirm: false,
          confirmButtonText:
            'Editar Categoria',
          cancelButtonText:
            'Cancelar',
        }).then((result) => {
              if (result.isConfirmed) {
                
                var data = 
                {
                    id:         categoria.id,
                    categoria:  $('#categoria').val(),
                }
                
                put(JSON.stringify(data))
              }
        })
    });
    
    async function put(bodyPut){
        renderLoader()
        
        fetch(URL_BASE + "/api/categorias/edit", {
                            method: 'PUT',
                            headers: {
                              'Content-Type': 'application/json'
                            },
                            body: bodyPut,
                        }
                        ).then(response => {
                               closeLoader()
                               
                               if(response.ok) {
                                   renderDialogValid("Se ha editado la categoria", "Cerrar", () => {
                                       table.ajax.reload();
                                   })
                               } else {
                                   renderDialogFail("No se ha podido editar la categoria")
                               }
                        }).catch(() => {
                              console.log("ERROR")
                         })
    }
})