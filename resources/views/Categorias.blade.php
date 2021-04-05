<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <button id="btnModalCategoria" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Registrar
                </button>
                    <h2 class="mb-4">Categorías</h2>
                    <table  class="table table-bordered tabla_categorias" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
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
    <!--Modal Categoria save-->
    <div class="modal fade" id="modalCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form id="formCategoria">
                    @csrf

                    <!-- Name -->
                    <div class="form-group">
                        <!-- <x-label for="descripcion" :value="__('Descripción')" />
                        <x-input  id="descripcion" class="block mt-1 w-full @error('descripcion') is-invalid @enderror" type="text" name="descripcion" :value="old('descripcion')"   autofocus />
                        @error('descripcion')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror -->
                        <x-label for="descripcion" :value="__('Descripción')" />
                        <x-input  id="descripcion" class="block mt-1 w-full cambiar-entrada" type="text" name="descripcion"    autofocus />
                        <span class="text-danger error-text descripcion_err"></span>
                    </div>
                    
                    </div>
                    <div class="modal-footer">
                        <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4 btn-default" data-dismiss="modal">
                            {{ __('Cerrar') }}
                        </x-button>
                        <x-button type="submit" class="ml-4 btn-success btn-submit">
                            {{ __('Guardar') }}
                        </x-button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!--Modal Categoria update-->
    <div class="modal fade" id="modalCategoriaActualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form id="formCategoriaU">
                    @csrf
                    <div id="cuerpoCategoriaUpdate">
                    
                    </div>
                    
                    <div class="modal-footer">
                        <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4 btn-default" data-dismiss="modal">
                            {{ __('Cerrar') }}
                        </x-button>
                        <x-button type="submit" class="ml-4 btn-success btn-update-categoria">
                            {{ __('Guardar') }}
                        </x-button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>