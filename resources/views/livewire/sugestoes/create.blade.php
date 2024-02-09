<div>
    
    <div wire:click="abrir" class="rounded-t-lg bg-gradient-to-r from-red-400 to-red-600 w-60 h-8 justify-between flex hover:bg-gradient-to-r hover:from-red-300 hover:to-red-500">
        <h3 class="m-1 ml-2"><strong>{{__('Deixe aqui a sua Opinião')}}</strong></h3>
        @if($sugestao == false)
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up m-2    " viewBox="0 0 16 16">
            <path d="M3.204 11h9.592L8 5.519zm-.753-.659 4.796-5.48a1 1 0 0 1 1.506 0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 0 1-.753-1.659"/>
          </svg>  
        @else
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down m-2" viewBox="0 0 16 16">
            <path d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659"/>
          </svg>
        @endif
        
    </div>
    @if ($sugestao == true)
    <div class="h-auto bg-white dark:bg-gray-800 pb-2">
        <div class="mx-2">
            <form wire:submit='guardar'>
              <div class="pt-2 pb-5">
                <x-text-input wire:model='titulo' name="titulo" placeholder="{{__('Insira um Titulo')}}"></x-text-input>
                <x-input-error class="mt-2" :messages="$errors->get('titulo')" />
            </div>
            <div class="pb-5">
                <textarea wire:model='descricao' class="resize-none border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="descricao" id="" cols="22" rows="7" placeholder="{{__('Descreva a sua sugestão')}}"></textarea>
                <x-input-error class="mt-2" :messages="$errors->get('descricao')" />
            </div>
            <button type="submit" class="rounded-lg bg-gradient-to-r from-red-400 to-red-600 w-60 h-8 flex justify-center hover:bg-gradient-to-r hover:from-red-300 hover:to-red-500 h-9 w-full">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right-circle my-auto" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
              </svg></button>    
            </form>
        </div>
    </div>
    @endif
</div>