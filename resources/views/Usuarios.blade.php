<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Registro</a>
                    <h2 class="mb-4">Usuarios</h2>
                    <table  class="table table-bordered tabla_usuarios" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
     <!--Modal Actividad save / update-->
     <div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar usuario </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form id="formUsuario">
                    @csrf


                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="name">Nombre</label>
                                <input  type="text" class="form-control cambiar-entrada " name="name" id="name">
                                <span class="text-danger error-text name_err"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="apellidos">Apellidos</label>
                                <input  type="text" class="form-control cambiar-entrada " name="apellidos" id="apellidos">
                                <span class="text-danger error-text apellidos_err"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edad">Edad</label>
                                <input  type="text" class="form-control cambiar-entrada" name="edad" id="edad" >
                                <span class="text-danger error-text edad_err"></span>
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input  type="text" class="form-control cambiar-entrada" name="telefono" id="telefono" >
                                <span class="text-danger error-text telefono_err"></span>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Correo</label>
                                <input  type="email" class="form-control cambiar-entrada" name="email" id="email" >
                                <span class="text-danger error-text email_err"></span>
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                        <option value="">Seleccione</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                </select>
                                <span class="text-danger error-text status_err"></span>
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input  type="password" class="form-control cambiar-entrada" name="password" id="password" >
                                <span class="text-danger error-text password_err"></span>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_confirmation">Confirmar password</label>
                                <input  type="password" class="form-control cambiar-entrada" name="password_confirmation" id="password_confirmation" >
                                <span class="text-danger error-text password_confirmation_err"></span>
                            </div>
                        </div>  
                    </div>
                    
            </div>       
                    <div class="modal-footer">
                        <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4 btn-default" data-dismiss="modal">
                            {{ __('Cerrar') }}
                        </x-button>
                        <x-button type="submit" class="ml-4 btn-success btn-update-usuario">
                            {{ __('Actualizar') }}
                        </x-button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
