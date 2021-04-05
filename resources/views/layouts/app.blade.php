<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        
        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jquery-3.5.1.js') }}" ></script>
        <script src="{{ asset('js/popper.min.js') }}" ></script>
        <script src="{{asset('js/jquery.dataTables.min.js')}}" ></script>
        <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="{{ asset('js/script.js') }}" defer></script>
        <script type="text/javascript">
        $(document).ready(function() {
            //LLenar tabla categorias
            $('.tabla_categorias').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('categoria.lista') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'Descripcion', name: 'Descripcion'},
                    {data: 'Fecha', name: 'Fecha'},
                    {
                        data: 'action', 
                        name: 'action', 
                        orderable: true, 
                        searchable: true
                    },
                    
                ]
            });
            //LLenar tabla categorias
            $('.tabla_actividades').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('actividad.lista') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'Fecha', name: 'Fecha'},
                    {data: 'Descripcion', name: 'Descripcion'},
                    {data: 'Titulo', name: 'Titulo'},
                    {data: 'Categoria', name: 'Categoria'},
                    {data: 'Status', name: 'Status'},
                    {
                        data: 'action', 
                        name: 'action', 
                        orderable: true, 
                        searchable: true
                    },
                    
                ]
            });
            //LLenar tabla categorias
            $('.tabla_usuarios').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('usuario.lista') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'Telefono', name: 'Telefono'},
                    {
                        data: 'action', 
                        name: 'action', 
                        orderable: true, 
                        searchable: true
                    },
                    
                ]
            });
            $(".btn-submit").click(function(e){
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var descripcion = $("#descripcion").val();
                $.ajax({
                    url:"{{ route('categoria.save') }}",
                    type:'post',
                    dataType: 'json',
                    data: {_token:_token, descripcion:descripcion},
                }).done(function(respuesta){
                    if(respuesta.success==='Validado'){
                        Swal.fire(
                        'Categoría registrada',
                        '',
                        'success'
                        )
                        $("#modalCategoria").modal("hide");
                        // location.reload(true);
                        $('.tabla_categorias').DataTable().ajax.reload();
                        $("#formCategoria")[0].reset();
                    }else{
                        $.each( respuesta.error, function( key, value ) {
                            $('.'+key+'_err').text(value);
                        });
                    }
                }).fail(function(){
                    // swal('Error Obteniendo Datos Ajax','','error');
                }); 
            }); 
            $('.cambiar-entrada').on('keyup blur click',function(){
                $(this).parents('.form-group').find('.text-danger').html(" ");
            });
            var id;
            $('body').on('click', '#getEditarCategoria', function(e) {
                // e.preventDefault();
                $('.text-danger').html('');
                $('.text-danger').hide();
                id = $(this).data('id');
                $.ajax({
                    url: "{{ route('categoria.edit') }}",
                    method: 'GET',
                    data: {
                        id: id,
                    },
                    success: function(result) {
                        console.log(result);
                        $('#cuerpoCategoriaUpdate').html(result.html);
                        $("#modalCategoriaActualizar").modal("show");
                    }
                });
            });
            $('body').on('click', '#getEliminarCategoria', function(e) {
                // e.preventDefault();
                $('.text-danger').html('');
                $('.text-danger').hide();
                const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: '¿Desea eliminar la categoría?',
                text: "Da clic en Aceptar, o Cancelar para regresar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar!',
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    id = $(this).data('id');
                    $.ajax({
                        url: "{{ route('categoria.eliminar') }}",
                        method: 'GET',
                        data: {
                            id: id,
                        },
                        success: function(result) {
                            Swal.fire("Categoría eliminada","","success");
                            $('.tabla_categorias').DataTable().ajax.reload();
                        }
                    });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                   
                }
                })
            });
            $(".btn-update-categoria").click(function(e){
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var descripcion = $("#descripcionc").val();
                $.ajax({
                    url:"{{ route('categoria.update') }}",
                    type:'post',
                    dataType: 'json',
                    data: $('#formCategoriaU').serialize()+"&id="+id
                }).done(function(respuesta){
                    if(respuesta.success==='Validado'){
                        Swal.fire(
                        'Categoría actualizada',
                        '',
                        'success'
                        )
                        $("#modalCategoriaActualizar").modal("hide");
                        // location.reload(true);
                        $('.tabla_categorias').DataTable().ajax.reload();
                        $("#formCategoriaU")[0].reset();
                    }else{
                        $.each( respuesta.error, function( key, value ) {
                            $('.'+key+'_err').text(value);
                        });
                    }
                }).fail(function(){
                    // swal('Error Obteniendo Datos Ajax','','error');
                }); 
            }); 

            //Seccion de Actividades

            $(".btn-submit-actividad").click(function(e){
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                $.ajax({
                    url:"{{ route('actividad.save') }}",
                    type:'post',
                    dataType: 'json',
                    data: $('#formActividad').serialize(),
                }).done(function(respuesta){
                    if(respuesta.success==='Validado'){
                        Swal.fire(
                        'Actividad registrada',
                        '',
                        'success'
                        )
                        $("#modalActividad").modal("hide");
                        // location.reload(true);
                        $('.tabla_actividades').DataTable().ajax.reload();
                        $("#formActividad")[0].reset();
                    }else{
                        
                        $('.error-text').html('');
                        $.each( respuesta.error, function( key, value ) {
                            $('.'+key+'_err').text(value);
                        });
                    }
                }).fail(function(){
                    // swal('Error Obteniendo Datos Ajax','','error');
                }); 
            }); 
            $('body').on('click', '#getEditarActividad', function(e) {
                // e.preventDefault();
                $('.text-danger').html('');
                $('.text-danger').hide();
                id = $(this).data('id');
                $.ajax({
                    url: "{{ route('actividad.edit') }}",
                    method: 'GET',
                    data: {
                        id: id,
                    },
                    success: function(result) {
                        $("#descripcion").val(result.actividad.Descripcion);
                        $("#titulo").val(result.actividad.Titulo);
                        $("#categoria").val(result.actividad.Categoria);
                        $("#status").val(result.actividad.Status);
                        $("#fecha").val(result.actividad.Fecha);
                        $('.btn-submit-actividad').hide();
                        $('.btn-update-actividad').show();
                        $("#modalActividad").modal("show");
                    }
                });
            });
            $('body').on('click', '#getEliminarActividad', function(e) {
                // e.preventDefault();
                $('.text-danger').html('');
                $('.text-danger').hide();
                const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: '¿Desea eliminar la actividad?',
                text: "Da clic en Aceptar, o Cancelar para regresar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar!',
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    id = $(this).data('id');
                    $.ajax({
                        url: "{{ route('actividad.eliminar') }}",
                        method: 'GET',
                        data: {
                            id: id,
                        },
                        success: function(result) {
                            Swal.fire("Actividad eliminada","","success");
                            $('.tabla_actividades').DataTable().ajax.reload();
                        }
                    });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                   
                }
                })
            });
            $(".btn-update-actividad").click(function(e){
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                $.ajax({
                    url:"{{ route('actividad.update') }}",
                    type:'post',
                    dataType: 'json',
                    data: $('#formActividad').serialize()+"&id="+id
                }).done(function(respuesta){
                    if(respuesta.success==='Validado'){
                        Swal.fire(
                        'Actividad actualizada',
                        '',
                        'success'
                        )
                        $("#modalActividad").modal("hide");
                        // location.reload(true);
                        $('.tabla_actividades').DataTable().ajax.reload();
                        $("#formActividad")[0].reset();
                    }else{
                        $('.error-text').html('');
                        $.each( respuesta.error, function( key, value ) {
                            $('.'+key+'_err').text(value);
                            $('.'+key+'_err').css("display", "block");
                        });
                    }
                }).fail(function(){
                    // swal('Error Obteniendo Datos Ajax','','error');
                }); 
            }); 
            //Seccion de Usuarios

            // $(".btn-submit-user").click(function(e){
            //     e.preventDefault();
            //     var _token = $("input[name='_token']").val();
            //     $.ajax({
            //         url:"{{ route('register') }}",
            //         type:'post',
            //         dataType: 'json',
            //         data: $('#formUser').serialize(),
            //     }).done(function(respuesta){
            //         if(respuesta.success==='Validado'){
            //             Swal.fire(
            //             'Usuario registrado',
            //             '',
            //             'success'
            //             )
            //             $("#modalUser").modal("hide");
            //             location.reload(true);
            //             $("#formUser")[0].reset();
            //         }else{
                        
            //             $('.error-text').html('');
            //             $.each( respuesta.error, function( key, value ) {
            //                 $('.'+key+'_err').text(value);
            //             });
            //         }
            //     }).fail(function(){
            //         // swal('Error Obteniendo Datos Ajax','','error');
            //     }); 
            // });
            $('body').on('click', '#getEditUsuario', function(e) {
                // e.preventDefault();
                $('.text-danger').html('');
                $('.text-danger').hide();
                id = $(this).data('id');
                $.ajax({
                    url: "{{ route('usuario.edit') }}",
                    method: 'GET',
                    data: {
                        id: id,
                    },
                    success: function(result) {
                        $("#name").val(result.usuario.name);
                        $("#apellidos").val(result.usuario.Apellidos);
                        $("#edad").val(result.usuario.Edad);
                        $("#telefono").val(result.usuario.Telefono);
                        $("#email").val(result.usuario.email);
                        $("#status").val(result.usuario.Condicion);
                        $("#password").val(result.usuario.password);
                        $('.btn-update-usuario').show();
                        $("#modalUsuario").modal("show");
                    }
                });
            });
            $(".btn-update-usuario").click(function(e){
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                $.ajax({
                    url:"{{ route('usuario.update') }}",
                    type:'post',
                    dataType: 'json',
                    data: $('#formUsuario').serialize()+"&id="+id
                }).done(function(respuesta){
                    if(respuesta.success==='Validado'){
                        Swal.fire(
                        'Usuario actualizado',
                        '',
                        'success'
                        )
                        $("#modalUsuario").modal("hide");
                        location.reload(true);
                        $("#formUsuario")[0].reset();
                    }else{
                        $('.error-text').html('');
                        $.each( respuesta.error, function( key, value ) {
                            $('.'+key+'_err').text(value);
                            $('.'+key+'_err').css("display", "block");
                        });
                    }
                }).fail(function(){
                    // swal('Error Obteniendo Datos Ajax','','error');
                }); 
            }); 
        }); 
        </script>

    </body>
    
</html>
