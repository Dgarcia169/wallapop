$(document).ready(function(){
    renderLoader()
    var table = $('#dtProductos').DataTable({
        "dom"        : 'Bfrtip',
        "serverSide" : true,
        "ajax"       : URL_BASE + "/api/productos",
        "columns"    : 
        [
            { data: "id" },
            { data: "iduser" },
            { data: "idcategoria" },
            { data: "nombre" },
            { data: "descripcion" },
            { data: "uso" },
            { data: "precio" },
            { data: "fecha" },
            { data: "estado" },
            { 
                data: "foto" ,
                render: getImg,
            },
            {
                data: "estado",
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
    })
    
    /* ===================================================================================================================
    ================================================= CREAR PRODUCTO =====================================================
    =================================================================================================================== */

    async function renderCreate() {
        var imageCrear
        renderLoader()
        var usuarios = await getItem("usuarios")
        var usuariosSelect = generateSelect(usuarios)
        var categorias = await getItem("categorias")
        var categoriasSelect = generateSelect(categorias)
        closeLoader()
        
        Swal.fire({
          title: '<strong>Crear producto</strong>',
          html:
            '<form name="formCrear" class="mt25">' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Nombre</label>' +
                    '<div class="col-8">' +
                        '<input class="form-control" type="text" name="nombre" id="nombre" />' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Vendedor</label>' +
                    '<div class="col-8">' +
                        '<select name="vendedor" id="vendedor">' +
                          usuariosSelect  +
                        '</select>' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Categoria</label>' +
                    '<div class="col-8">' +
                        '<select name="categoria" id="categoria">' +
                          categoriasSelect  +
                        '</select>' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Descripcion</label>' +
                    '<div class="col-8">' +
                        '<input class="form-control" type="text" name="descripcion" id="descripcion" />' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Uso</label>' +
                    '<div class="col-8">' +
                        '<input class="form-control" type="text" name="uso" id="uso" />' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Precio</label>' +
                    '<div class="col-8">' +
                        '<input class="form-control" type="number" min="1" step="0.01" name="precio" id="precio" />' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Fecha</label>' +
                    '<div class="col-8">' +
                        '<input class="form-control" type="date" name="fecha" id="fecha" />' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Estado</label>' +
                    '<div class="col-8">' +
                        '<input class="form-control" type="text" name="estado" id="estado" />' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Foto</label>' +
                    '<div class="col-8">' +
                        '<img src="'+ ASSETS +'/assets/images/default_producto.png "id="createImage" ></img><br>' +
                        '<span>Clicka para elegir una foto</span>' +
                        '<input class="form-control" type="file" name="foto" id="foto" />' +
                    '</div>' +
                '</div>' +
            '</form>',
          showCloseButton: true,
          showCancelButton: true,
          focusConfirm: false,
          confirmButtonText:
            'Crear Producto',
          cancelButtonText:
            'Cancelar',
        }).then((result) => {
              if (result.isConfirmed) {
                var formData = new FormData();
                formData.append("iduser",      $( "#vendedor option:selected" ).val())
                formData.append("idcategoria", $( "#categoria option:selected" ).val())
                formData.append("nombre",      $('#nombre').val())
                formData.append("descripcion", $('#descripcion').val())
                formData.append("uso",         $('#uso').val())
                formData.append("precio",      $('#precio').val())
                formData.append("fecha",       $('#fecha').val())
                formData.append("estado",      $('#estado').val())
                formData.append("foto",        imageCrear)
                
                post(formData)
              }
        })
        
        $("#foto").on('change', function(){
          var input = document.getElementById('foto').files
          imageCrear = readURL(input, "createImage")
        })
    }
    
    function generateSelect(object) {
        var select = ""
        for (var i = 0; i < object.length; i++) {
            if(object[i].name != null)
                select += '<option value="'+ object[i].id +'">' + object[i].id + ' - ' + object[i].name + '</option>'
            else
                select += '<option value="'+ object[i].id +'">' + object[i].id + ' - ' + object[i].categoria + '</option>'
        }
        
        return select
    }
    
    async function post(bodyPut){
        renderLoader()
        
        fetch(URL_BASE + "/api/productos/create", {
                            method: 'POST',
                            body: bodyPut,
                        }
                        ).then(response => {
                               closeLoader()
                               
                               if(response.ok) {
                                   renderDialogValid("Se ha creado el producto", "Cerrar", () => {
                                       table.ajax.reload();
                                   })
                               } else {
                                   renderDialogFail("No se ha podido crear el producto")
                               }
                        }).catch(() => {
                              renderDialogFail("Ha habido algun error en el servidor")
                         })
    }
    
    /* ===================================================================================================================
    ================================================ EDITAR PRODUCTO =====================================================
    =================================================================================================================== */
    
    $('#dtProductos tbody').on('click', '#editB', async function () {
        // Cojo el valor de la la fila que clicko: https://datatables.net/examples/ajax/null_data_source.html //
        var producto = table.row( $(this).parents('tr') ).data();
        renderLoader()
        var usuarios = await getItem("usuarios")              //ID Vendedor
        var usuariosSelectEdit = generateSelectEdit(usuarios, producto.iduser)
        var categorias = await getItem("categorias")
        var categoriasSelectEdit = generateSelectEdit(categorias, producto.idcategoria)
        var imagenEdit = checkIfHasImage(producto.foto)
        closeLoader()
        
        var imageEdit
                
        Swal.fire({
          title: '<strong>Editar producto</strong>',
          html:
            '<form name="formEditar" class="mt25">' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Nombre</label>' +
                    '<div class="col-8">' +
                        '<input class="form-control" type="text" name="nombre" id="nombre" value="' + producto.nombre + '"/>' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Vendedor</label>' +
                    '<div class="col-8">' +
                        '<select name="vendedor" id="vendedor">' +
                          usuariosSelectEdit  +
                        '</select>' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Vendedor</label>' +
                    '<div class="col-8">' +
                        '<select name="categorias" id="categorias">' +
                          categoriasSelectEdit  +
                        '</select>' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Descripcion</label>' +
                    '<div class="col-8">' +
                        '<input class="form-control" type="text" name="descripcion" id="descripcion" value="' + producto.descripcion + '" />' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Uso</label>' +
                    '<div class="col-8">' +
                        '<input class="form-control" type="text" name="uso" id="uso" value="' + producto.uso + '"/>' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Precio</label>' +
                    '<div class="col-8">' +
                        '<input class="form-control" type="number" min="1" step="0.01" name="precio" id="precio" value="' + producto.precio + '"/>' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Fecha</label>' +
                    '<div class="col-8">' +
                        '<input class="form-control" type="date" name="fecha" id="fecha" value="' + producto.fecha + '" />' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Estado</label>' +
                    '<div class="col-8">' +
                        '<input class="form-control" type="text" name="estado" id="estado" value="' + producto.estado + '" />' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Foto</label>' +
                    '<div class="col-8">' +
                        '<img src="'+ imagenEdit +'" alt="No image" id="editImage" /><br>' +
                        '<span>Clicka para elegir una foto</span>' +
                        '<input class="form-control" type="file" name="foto" id="foto" value="' + producto.foto + '" />' +
                    '</div>' +
                '</div>' +
            '</form>',
          showCloseButton: true,
          showCancelButton: true,
          focusConfirm: false,
          confirmButtonText:
            'Editar Usuario',
          cancelButtonText:
            'Cancelar',
        }).then((result) => {
              if (result.isConfirmed) {
                if(imageEdit == null) {
                    imageEdit = producto.foto
                }
                
                var formData = new FormData();
                formData.append("id",          producto.id)
                formData.append('_method', 'put');
                formData.append("iduser",      $( "#vendedor option:selected" ).val())
                formData.append("idcategoria", $( "#categorias option:selected" ).val())
                formData.append("nombre",      $('#nombre').val())
                formData.append("descripcion", $('#descripcion').val())
                formData.append("uso",         $('#uso').val())
                formData.append("precio",      $('#precio').val())
                formData.append("fecha",       $('#fecha').val())
                formData.append("estado",      $('#estado').val())
                formData.append("foto",        imageEdit)
                
                put(formData)
              }
        })
        
        $("#foto").on('change', function(){
          var input = document.getElementById('foto').files
          imageEdit = readURL(input, "editImage")
        })
        
        
        function generateSelectEdit(object, idObject) {
            var select = ""
            var isSelected = false
            for (var i = 0; i < object.length; i++) {
                isSelected = object[i].id == idObject ? true: false
                if(!isSelected) {
                    if(object[i].name != null)
                        select += '<option value="'+ object[i].id +'">' + object[i].id + ' - ' + object[i].name + '</option>'
                    else
                        select += '<option value="'+ object[i].id +'">' + object[i].id + ' - ' + object[i].categoria + '</option>'
                } else {
                    if(object[i].name != null)
                        select += '<option value="'+ object[i].id +'" selected>' + object[i].id + ' - ' + object[i].name + '</option>'
                    else
                        select += '<option value="'+ object[i].id +'" selected>' + object[i].id + ' - ' + object[i].categoria + '</option>'
                }

                isSelected = false
            }
            
            return select
        }
        
        function checkIfHasImage(image) {
            if(image != null) {
                return 'data:image/png;base64, ' + image
            }
            
            return  ASSETS +'/assets/images/default_producto.png'
        }
        
        
        async function put(bodyPut){
            renderLoader()
            
            fetch(URL_BASE + "/api/productos/edit", {
                                method: 'POST',
                                body: bodyPut,
                            }
                            ).then(response => {
                                   closeLoader()
                                   
                                   if(response.ok) {
                                       renderDialogValid("Se ha editado el producto", "Cerrar", () => {
                                           table.ajax.reload();
                                       })
                                   } else {
                                       renderDialogFail("No se ha podido editar el producto")
                                   }
                            }).catch(() => {
                                  renderDialogFail("Ha habido algun error en el servidor")
                             })
        }
    });
    
    /* ===================================================================================================================
    ================================================ OTRAS FUNCIONES =====================================================
    =================================================================================================================== */
    
    async function getItem(route) {
        var response = await fetch(URL_BASE + "/api/"+ route +"/get")
        response = await response.json()
        if(response != null ){
            return response[1]
        }

        return []
    }
    
    function getImg(data) {
        if(data != null) {
            return '<img src="data:image/png;base64,' + data + '" alt="No image" class="datatable-image" />'
        }
        
        return '<img src="'+ ASSETS +'/assets/images/default_producto.png" id="default_image" ></img>'
    }
    
    function readURL(input, id) {
      if (input && input[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#' + id)
                .attr('src', e.target.result)
            };
        reader.readAsDataURL(input[0]);
        return input[0]
      }
    }
})