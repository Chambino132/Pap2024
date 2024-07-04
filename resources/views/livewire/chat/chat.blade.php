<div class="dark:text-white">
  
    <div wire:click="abrir" class="flex justify-between h-8 rounded-t-lg bg-gradient-to-r from-red-400 to-red-600 w-96 hover:bg-gradient-to-r hover:from-red-300 hover:to-red-500">
        <h3 class="m-1 ml-2"><strong>{{__('Suporte')}}</strong></h3>
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
      @if (Auth::user()->utype == 'Cliente') 
        <div wire:click='Criar' class="fixed flex items-start rounded-full bottom-2 bg-gradient-to-r from-red-400 to-red-600 w-14 h-14 right-10 hover:bg-gradient-to-r hover:from-red-300 hover:to-red-500">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="m-auto bi bi-chat-right-text " viewBox="0 0 16 16">
          <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
          <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
        </svg></div>
      @endif
      <div wire:poll='getChats' id="conversas" class="overflow-y-scroll h-96 scrolls">
      @if ($adFun)    
        <div>
          <h1 class="py-5 text-xl text-center">Chats Não Atendidos</h1>
          <hr>
          @forelse ($chatsNA as $chat)
            <div wire:click='OpenCon({{$chat->id}})' class="hover:bg-slate-200 dark:hover:bg-gray-900">
              <div class="px-2 pt-1 pb-2">
                @foreach ($chat->users as $user)   
                    <div class="flex justify-between ">
                      <h1 class="text-lg"><strong>{{$user->name}}</strong></h1>
                      <p class="mt-1">{{$chat->lastMensagem}}</p>
                    </div>
                @endforeach
                @if ($chat->mensagems->count() != 0)
                    <p class="truncate">{{$chat->mensagems->last()->mensagem}}</p>
                @endif
              </div>
            </div>
            <hr>
          @empty
          <div class="px-2 mb-2">
            <h1 class="text-lg"><strong>Sem mensagens</strong></h1>
            <p class="truncate">Quando um cliente tiver duvidas irá aparecer aqui</p>
          </div>
          <hr>
          @endforelse
        </div>
      @endif
      
        @if ($adFun)    
        <div>
          <h1 class="py-5 text-xl text-center">Chats Atendidos</h1>
          <hr>
        </div>
      @endif
        @forelse ($chats as $chat)
        @php
          $count = 0;
        @endphp
        <div wire:click='OpenCon({{$chat->id}})' class="hover:bg-slate-200 dark:hover:bg-gray-900">
          <div class="px-2 pt-1 pb-2">
            @foreach ($chat->users as $user)   
              @if ($loop->last && $loop->first)
                <div class="flex justify-between ">
                  <h1 class="text-lg"><strong>Á Espera de Atendimento</strong></h1>
                  <p class="mt-1">{{$chat->lastMensagem}}</p>
                </div>          
              @endif
              @if ($user->id != Auth::user()->id)
                <div class="flex justify-between ">
                  <h1 class="text-lg"><strong>{{$user->name}}</strong></h1>
                  <p class="mt-1">{{$chat->lastMensagem}}</p>
                </div>
              @endif
            @endforeach
            
            @if ($chat->mensagems->count() != 0)
            @foreach ($chat->mensagems as $mensagem)
            
                @if ($mensagem->estado == 'Entrege')
                    @php
                        $count++;
                    @endphp
                @endif
            @endforeach
                @if ($chat->mensagems->last()->user_id == Auth::user()->id)
                  <p class="truncate">Eu: {{$chat->mensagems->last()->mensagem}}</p>
                @else
                  @if ($chat->mensagems->last()->estado == 'Entrege')
                  <div class="flex justify-between">
                    <p class="truncate"><strong>{{$chat->mensagems->last()->mensagem}}</strong></p>
                    <div class="w-6 px-2 bg-red-600 rounded-full">
                      <p ><strong>{{$count}}</strong> </p>
                    </div>
                  </div>
                  @else
                    <p class="truncate">{{$chat->mensagems->last()->mensagem}}</p>
                  @endif
                @endif
            @endif
          </div>
        </div>
        <hr>
        @empty
        @if (Auth::user()->utype == 'Cliente')
        <div class="px-2 mb-2">
          <h1 class="text-lg"><strong>Sem mensagens</strong></h1>
          <p class="truncate">Utilize o chat de suporte para esclarecer duvidas</p>
        </div>
        @else
        <div class="px-2 mb-2">
          <h1 class="text-lg"><strong>Sem mensagens</strong></h1>
          <p>Aqui irão aparecer as mensagens que optar por responder</p>
        </div>
        @endif
        <hr> 
      @endforelse
      @if (Auth::user()->utype == 'Cliente') 
      <div class="hover:bg-slate-200 dark:hover:bg-gray-900">
        <div wire:click='Criar' class="flex justify-center p-2">
          <h1 class="text-lg"><strong>Criar Mensagem Nova</strong></h1>
          @endif
        </div>
      </div>
      <hr> 
    </div>
      @else
        {{-- <div wire:click='Back' class="fixed flex items-start rounded-full bottom-2 bg-gradient-to-r from-gray-400 to-gray-600 w-14 h-14 right-10 hover:bg-gradient-to-r hover:from-gray-300 hover:to-gray-500">
          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="m-auto bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z"/>
            <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466"/>
          </svg></div>
           --}}
            <div class="flex justify-between w-auto h-12 px-2 rounded-b-lg bg-gradient-to-r from-red-400 to-red-600">
              @foreach ($chat->users as $user)
                @if ($user->id != Auth::user()->id)
                  <h3 class="py-3 ml-2"><strong>{{$user->name}}</strong> </h3>
                @elseif ($loop->last && $loop->first)
                    <h3 class="py-3 ml-2"><strong>Á Espera de Atendimento</strong></h3>
                @endif
                
              @endforeach
              <div wire:click='Back' class="flex items-start w-10 h-10 rounded-full bg-gradient-to-r from-gray-400 to-gray-600 hover:bg-gradient-to-r hover:from-gray-300 hover:to-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="m-auto bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z"/>
                  <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466"/>
                </svg></div>
            </div> 
          <div wire:poll='checkMens' class="h-56 overflow-y-scroll scroll-auto" id="mensagens" x-ref="scrollToBottom"
          x-data="{ scroll: () => { $el.scrollTo(0, $el.scrollHeight); }}" 
          x-init="scroll()">
            @if ($chat->mensagems)
              @foreach ($chat->mensagems as $mensagem)
                  @if ($mensagem->user->utype == Auth::user()->utype)
                      <div class="relative flex justify-between w-8/12 h-auto p-2 my-2 ml-auto bg-red-500 border border-red-300 rounded-lg shadow-sm resize-none dark:border-red-700 dark:bg-red-900 dark:text-white">
                        {{$mensagem->mensagem}}
                        @if ($mensagem->estado == 'Lida')
                        <div class="absolute text-teal-400 bottom-1 right-2">
                        
                        @else
                        <div class="pt-4 text-gray-600">
                        @endif
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z"/>
                          </svg>
                        </div>
                      </div>
                  @else
                  <div class="w-8/12 h-auto p-2 my-2 border border-gray-300 rounded-lg shadow-sm resize-none dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                    {{$mensagem->mensagem}}
                </div>
                  @endif
                  
              @endforeach
            @endif
              <x-input-error wire:poll='resetVAl' style="margin-top: 150px" class="self-center ml-4 bottom-10" :messages="$errors->get('mensagem')"/>
          </div>
          
            <div class="w-11/12 ml-4 "> 
              @if ($adFun && $chat->estado == 'naoAtendido')
              <button wire:click="Atender" class="flex justify-center w-full h-16 py-5 mt-5 rounded-lg abs bg-gradient-to-r from-red-400 to-red-600 w-60 hover:bg-gradient-to-r hover:from-red-300 hover:to-red-500"><strong>Atender Cliente</strong></button>
              @else
                <form  wire:submit='enviar' id="enviar" name="enviar"> 
                  
                  <textarea wire:keydown.enter='enviar' wire:model='mensagem' placeholder="Escreva aqui a sua Mensagem" class="w-full border-gray-300 rounded-md shadow-sm resize-none dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600" name="mensagem" id="mensagem"></textarea>
                  
                <button type="submit" class="flex justify-center w-full rounded-lg abs bg-gradient-to-r from-red-400 to-red-600 w-60 hover:bg-gradient-to-r hover:from-red-300 hover:to-red-500 h-9">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="my-auto bi bi-arrow-right-circle" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                </svg></button>
                
              </form>
              @endif

            </div>
            
  
        
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

