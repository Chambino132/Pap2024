<div class="dark:text-white">
    <div wire:click="abrir" class="rounded-t-lg bg-gradient-to-r from-red-400 to-red-600 w-96 h-8 justify-between flex hover:bg-gradient-to-r hover:from-red-300 hover:to-red-500">
        <h3 class="m-1 ml-2"><strong>{{__('Chat')}}</strong></h3>
        @if($OpChat == false)
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up m-2    " viewBox="0 0 16 16">
            <path d="M3.204 11h9.592L8 5.519zm-.753-.659 4.796-5.48a1 1 0 0 1 1.506 0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 0 1-.753-1.659"/>
          </svg>  
        @else
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down m-2" viewBox="0 0 16 16">
            <path d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659"/>
          </svg>
        @endif
        
    </div>

    @if ($OpChat == true)
      <div wire:scroll class="bg-white dark:bg-gray-800 h-96 w-96 overflow-y-scroll ">
        
      @if ($OpCon == false)
        @foreach ($chats as $chat)
        <div class="mx-3 mb-2 mt-1 ">
          @foreach ($chat->users as $user)
                
              @if ($user->id != Auth::user()->id)
                <h1 class="text-lg"><strong>{{$user->name}}</strong></h1>
              @endif

          @endforeach
              <p class="truncate">{{$chat->mensagems->last()->mensagem}}</p> 
        </div>
        <hr>

      @endforeach
      <div wire:click='NovConv' class="rounded-full bg-gradient-to-r from-red-400 to-red-600 w-14 h-14 flex items-start fixed bottom-0 right-10 hover:bg-gradient-to-r hover:from-red-300 hover:to-red-500">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chat-right-text m-auto " viewBox="0 0 16 16">
        <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
        <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
      </svg></div>
      @else
        @if ($OpNew)
        <form wire:submit='Criar'>
          <div class="pt-2 pb-5">
            <x-text-input wire:model='destinatario' class="w-9/12" name="destinatario" placeholder="{{__('Insira um Destinatario')}}"></x-text-input>
            <x-input-error class="mt-2" :messages="$errors->get('destinatario')" />
        </div>
        <button type="submit">dfgdfg</button>
        </form>
        
        @else
            <div class="rounded-b-lg bg-gradient-to-r from-red-400 to-red-600 w-auto h-12 ">
              <h3 class="py-3 ml-2"><strong>Destinatario</strong> </h3>
            </div>      
        @endif
          
      @endif  
        
            

      </div>
    @endif
</div>