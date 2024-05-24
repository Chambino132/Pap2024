<div class="">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Notas de Funcionarios') }} 
                </h2>
                <hr class="border-black w-36 dark:border-white">
                
                <div class="grid grid-cols-2">
                    @foreach ($notas as $nota)
                        <div class="flex py-4 pl-3 my-4 mr-2 border-2 dark:bg-gray-800 sm:rounded-lg">
                            <div class="w-3/4 py-8 text-center border-r-2">
                                <strong>Titulo: {{$nota->titulo}}</strong>
                                <div class="py-2">
                                    <i>"{{$nota->descricao}}"</i>
                                </div>
                                Autor: {{$nota->funcionario->user->name}}
                            </div>
                            <div class="content-center ml-4">
                                @if (Auth::user()->id == $nota->funcionario->user_id)
                                    <x-secondary-button>Arquivar</x-secondary-button>
                                    <x-danger-button class="w-3/5">Excluir</x-danger-button>
                                @else
                                    <x-secondary-button>Arquivar</x-secondary-button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
