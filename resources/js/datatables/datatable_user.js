$(document).ready(function(){
    renderLoader()
    var table = $('#dtUsuarios').DataTable({
        "dom"        : 'Bfrtip',
        "serverSide" : true,
        "ajax"       : URL_BASE + "/api/usuarios",
        "columns"    : 
        [
            { data: "id"},
            { data: "name"},
            { data: "email"},
            { data: "admin"},
            {
                data: "admin",
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
    ================================================= CREAR USUARIO ======================================================
    =================================================================================================================== */
    
    function validateEmail(inputText){
        var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        
        if(inputText.match(mailformat))
        {
            return true;
        }
        else
        {
            renderDialogFail("Tiene que tener un formato de email")
            return false;
        }
    }

    function renderCreate() {
        Swal.fire({
          title: '<strong>Crear usuario</strong>',
          html:
            '<form name="formCrear" class="mt25">' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Nombre</label>' +
                    '<div class="col-8">' +
                        '<input class="form-control" type="text" name="name" id="name" />' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Pass</label>' +
                    '<div class="col-8">' +
                        '<input class="form-control" type="password" name="password" id="password" />' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Check Pass</label>' +
                    '<div class="col-8">' +
                        '<input class="form-control" type="password" name="conf_password" id="conf_password" />' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Email</label>' +
                    '<div class="col-8">' +
                        '<input class="form-control" type="text" name="email" id="email" />' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Admin</label>' +
                    '<div class="col-8 radio-inline my-radio-flex-style mt10">' +
                        '<label class="radio radio-solid">' +
                            '<input type="radio" name="admin" value=1 /> Si' +
                            '<span></span>' +
                        '</label>' +
                        '<label class="radio radio-solid">' +
                            '<input type="radio" name="admin" value=0 checked /> No' +
                            '<span></span>' +
                        '</label>' +
                    '</div>' +
                '</div>' +
            '</form>',
          showCloseButton: true,
          showCancelButton: true,
          focusConfirm: false,
          confirmButtonText:
            'Crear Usuario',
          cancelButtonText:
            'Cancelar',
        }).then((result) => {
              if (result.isConfirmed) {
                var nameValue  = $('#name').val();
                var emailValue = $('#email').val();
                var adminValue = $("input[name='admin']:checked").val();
                var contraseña = $('#password').val();
                var confContraseña = $('#conf_password').val();
                
                var data = 
                {
                    name:     nameValue,
                    email:    emailValue,
                    admin:    adminValue,
                    password: contraseña
                }
                
                if (contraseña.localeCompare(confContraseña) == 0) {
                    if(validateEmail(emailValue)) {
                        post(JSON.stringify(data)) 
                    } 
                } else {
                    renderDialogFail("Las contraseñas deben coincidir")
                }
              }
        })
    }
    
    async function post(bodyPut){
        renderLoader()
        
        fetch(URL_BASE + "/api/usuarios/create", {
                            method: 'POST',
                            headers: {
                              'Content-Type': 'application/json'
                            },
                            body: bodyPut,
                        }
                        ).then(response => {
                               closeLoader()
                               
                               if(response.ok) {
                                   renderDialogValid("Se ha creado el usuario", "Cerrar", () => {
                                       table.ajax.reload();
                                   })
                               } else {
                                   renderDialogFail("No se ha podido crear el usuario")
                               }
                        }).catch(() => {
                              console.log("ERROR")
                         })
    }
    
    
    /* ===================================================================================================================
    ================================================ EDITAR USUARIO ======================================================
    =================================================================================================================== */
    
    $('#dtUsuarios tbody').on('click', '#editB', function () {
        // Cojo el valor de la la fila que clicko: https://datatables.net/examples/ajax/null_data_source.html //
        var user = table.row( $(this).parents('tr') ).data();
        var yesChecked = user.admin == 1 ? "checked" : ""
        var noChecked  = user.admin == 0 ? "checked" : ""

        Swal.fire({
          title: '<strong>Editar usuario</strong>',
          html:
            '<form name="formEditar" class="mt25">' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Nombre</label>' +
                    '<div class="col-8">' +
                        '<input class="form-control" type="text" name="name" id="name" value="' + user.name + '"/>' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Email</label>' +
                    '<div class="col-8">' +
                        '<input class="form-control" type="text" name="email" id="email" value="' + user.email + '"/>' +
                    '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                    '<label class="col-4 col-form-label f15">Admin</label>' +
                    '<div class="col-8 radio-inline my-radio-flex-style mt10">' +
                        '<label class="radio radio-solid">' +
                            '<input type="radio" name="admin" value=1 ' + yesChecked + '/> Si' +
                            '<span></span>' +
                        '</label>' +
                        '<label class="radio radio-solid">' +
                            '<input type="radio" name="admin" value=0 ' + noChecked + '/> No' +
                            '<span></span>' +
                        '</label>' +
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
                var id         = user.id;
                var nameValue  = $('#name').val();
                var emailValue = $('#email').val();
                var adminValue = $("input[name='admin']:checked").val();
                
                var data = 
                {
                    id:    id,
                    name:  nameValue,
                    email: emailValue,
                    admin: adminValue,
                }
                
                if(validateEmail(emailValue)) {
                    put(JSON.stringify(data))
                }
              }
        })
    });
    
    async function put(bodyPut){
        renderLoader()
        
        fetch(URL_BASE + "/api/usuarios/edit", {
                            method: 'PUT',
                            headers: {
                              'Content-Type': 'application/json'
                            },
                            body: bodyPut,
                        }
                        ).then(response => {
                               closeLoader()
                               
                               if(response.ok) {
                                   renderDialogValid("Se ha editado el usuario", "Cerrar", () => {
                                       table.ajax.reload();
                                   })
                               } else {
                                   renderDialogFail("No se ha podido editar el usuario")
                               }
                        }).catch(() => {
                              console.log("ERROR")
                         })
    }
})