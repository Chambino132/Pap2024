<div class="dark:text-white">
    <div wire:click="abrir" class="flex justify-between h-8 rounded-t-lg bg-gradient-to-r from-red-400 to-red-600 w-96 hover:bg-gradient-to-r hover:from-red-300 hover:to-red-500">
        <h3 class="m-1 ml-2"><strong>{{__('Chat')}}</strong></h3>
        @if($OpChat == false)
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="m-2 bi bi-caret-up " viewBox="0 0 16 16">
            <path d="M3.204 11h9.592L8 5.519zm-.753-.659 4.796-5.48a1 1 0 0 1 1.506 0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 0 1-.753-1.659"/>
          </svg>  
        @else
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="m-2 bi bi-caret-down" viewBox="0 0 16 16">
            <path d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659"/>
          </svg>
        @endif
        
    </div>
    
    @if ($OpChat == true)
    <div class="bg-white dark:bg-gray-800 h-96 w-96 ">
        
      @if ($OpCon == false)
      <div wire:click='NovConv' class="fixed flex items-start rounded-full bottom-2 bg-gradient-to-r from-red-400 to-red-600 w-14 h-14 right-10 hover:bg-gradient-to-r hover:from-red-300 hover:to-red-500">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="m-auto bi bi-chat-right-text " viewBox="0 0 16 16">
        <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
        <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
      </svg></div>
      <div id="conversas" class="overflow-y-scroll h-96 scrolls">
        @forelse ($chats as $chat)
        <div wire:click='OpenCon({{$chat->id}})' class="hover:bg-slate-200 dark:hover:bg-gray-900">
          <div class="px-2 pt-1 pb-2">
            @foreach ($chat->users as $user)   
                @if ($user->id != Auth::user()->id)
                  <h1 class="text-lg"><strong>{{$user->name}}</strong></h1>
                @endif
            @endforeach
            @if ($chat->mensagems->count() != 0)
                <p class="truncate">{{$chat->mensagems->last()->mensagem}}</p>
            @endif
          </div>
        </div>
        <hr>
        @empty
        <div class="px-2 mb-2">
          <h1 class="text-lg"><strong>WOW, Isto está bastante vazio</strong></h1>
          <p class="truncate">Vamos começar a mandar mensagens</p>
        </div>
        <hr> 
      @endforelse
    
      <div class="hover:bg-slate-200 dark:hover:bg-gray-900">
        <div wire:click='NovConv' class="flex justify-center p-2">
          <h1 class="text-lg"><strong>Criar Mensagem Nova</strong></h1>
          
        </div>
      </div>
      <hr> 
    </div>
      @else
        @if ($OpNew)
        <form wire:submit='Criar'>
          <div class="flex items-center px-3 pt-2">
            <x-text-input wire:model='pesquisa' wire:click="$dispatch('IsSearching')" wire:change="$dispatch('IsSearching')" autocomplete="off" list="destinatarios" class="w-9/12 h-10" name="user_id" placeholder="{{__('Insira um Destinatario')}}"></x-text-input>
            @if ($searching)
            <datalist id="destinatarios">
              @foreach ($users as $user)
              <option data-value="{{$user->id}}" value="{{$user->name}}"></option>
              @endforeach
          </datalist>
            @endif
            
            <button class="w-16 h-10 ml-2 rounded bg-gradient-to-r from-red-400 to-red-600" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="mx-auto bi bi-arrow-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
            </svg></button>
        </div>
        <x-input-error class="px-3 mt-2" :messages="$errors->get('pesquisa')" />
        
        </form>
        <div wire:click='Back' class="fixed flex items-start rounded-full bottom-2 bg-gradient-to-r from-gray-400 to-gray-600 w-14 h-14 right-10 hover:bg-gradient-to-r hover:from-gray-300 hover:to-gray-500">
          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="m-auto bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z"/>
            <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466"/>
          </svg></div>
        @else
          
            <div class="flex justify-between w-auto h-12 px-2 rounded-b-lg bg-gradient-to-r from-red-400 to-red-600">
              @foreach ($chat->users as $user)
                @if ($user->id != Auth::user()->id)
                <h3 class="py-3 ml-2"><strong>{{$user->name}}</strong> </h3>
                @endif
                
              @endforeach
              <div wire:click='Back' class="flex items-start w-10 h-10 rounded-full bg-gradient-to-r from-gray-400 to-gray-600 hover:bg-gradient-to-r hover:from-gray-300 hover:to-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="m-auto bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z"/>
                  <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466"/>
                </svg></div>
            </div> 
          <div wire:poll='checkMens' class="overflow-y-scroll h-56 scroll-auto" id="mensagens" x-ref="scrollToBottom"
          x-data="{ scroll: () => { $el.scrollTo(0, $el.scrollHeight); }}" 
          x-init="scroll()">
            @if ($chat->mensagems)
              @foreach ($chat->mensagems as $mensagem)
                  @if ($mensagem->user->id == Auth::user()->id)
                      <div class="w-8/12 h-auto p-2 my-2 ml-auto bg-red-500 border border-red-300 rounded-lg shadow-sm resize-none dark:border-red-700 dark:bg-red-900 dark:text-white  ">
                  @else
                  <div class="w-8/12 h-auto p-2 my-2 border border-gray-300 rounded-lg shadow-sm resize-none dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                  @endif
                  {{$mensagem->mensagem}}
                </div>
              @endforeach
            @endif
          </div>
            <div class="bottom-0 w-11/12 ml-4"> 
              <form wire:submit='enviar' id="enviar" name="enviar"> 
                <textarea  wire:model='mensagem' placeholder="Escreva aqui a sua Mensagem" class="w-full border-gray-300 rounded-md shadow-sm resize-none dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600" name="sendbutton" id="sendButton" ></textarea> 

                <button type="submit" class="flex justify-center w-full h-8 rounded-lg abs bg-gradient-to-r from-red-400 to-red-600 w-60 hover:bg-gradient-to-r hover:from-red-300 hover:to-red-500 h-9">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="my-auto bi bi-arrow-right-circle" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                </svg></button>
              </form>
            </div>
            
            
        @endif
        
      @endif  
        
            

      </div>
    @endif
</div>

@push('js')
  <script>

      Livewire.on('scrollDown', function () {
        alert('scroll to bottom');
      });
  </script>
@endpush

