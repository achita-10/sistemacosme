<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actividades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button id="btnModalActividad" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Registrar
                    </button>
                    <h2 class="mb-4">Actividades</h2>
                    <table  class="table table-bordered tabla_actividades" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fecha de Actividad</th>
                                <th>Descripción</th>
                                <th>Titulo</th>
                                <th>Categoría</th>
                                <th>Status</th>
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
    <div class="modal fade" id="modalActividad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar actividad </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form id="formActividad">
                    @csrf


                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="descripcion">Descripción</label>
                                <input  type="text" class="form-control cambiar-entrada " name="descripcion" id="descripcion">
                                <span class="text-danger error-text descripcion_err"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input  type="text" class="form-control cambiar-entrada" name="titulo" id="titulo" >
                                <span class="text-danger error-text titulo_err"></span>
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="categoria">Categoría</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    <option value="">Seleccione</option>
                                    <?php foreach($categorias as $key){ ?>
                                        <option value="<?php echo $key->id; ?>"><?php echo $key->Descripcion;?></option>
                                    <?php }?>
                                </select>
                                <span class="text-danger error-text categoria_err"></span>
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
                                <label for="fecha">Fecha</label>
                                <input  type="date" class="form-control cambiar-entrada" name="fecha" id="fecha" >
                                <span class="text-danger error-text fecha_err"></span>
                            </div>
                        </div>  
                    </div>
                    
            </div>       
                    <div class="modal-footer">
                        <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4 btn-default" data-dismiss="modal">
                            {{ __('Cerrar') }}
                        </x-button>
                        <x-button type="submit" class="ml-4 btn-success btn-submit-actividad">
                            {{ __('Guardar') }}
                        </x-button>
                        <x-button type="submit" class="ml-4 btn-success btn-update-actividad">
                            {{ __('Actualizar') }}
                        </x-button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    
</x-app-layout>