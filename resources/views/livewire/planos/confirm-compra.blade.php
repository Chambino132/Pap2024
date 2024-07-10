<div class="py-12 ">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-lg">O utilizador <strong>{{$cliente->user->name}}</strong>  comprou o plano <strong>{{$plano->nome}}</strong></h2>
                <h2 class="mt-2 text-md">Confirme que recebeu o pagamento de <strong>{{$plano->preco}}€</strong> e clique no botão</h2>

                <button wire:click='confirmar' class="inline-flex items-center px-4 py-2 mt-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">Confirmar Compra</button>
            </div>
        </div>
    </div>
</div>
