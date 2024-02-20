<?php

namespace App\Livewire\Chat;

use App\Models\User;
use Livewire\Component;
use App\Models\Mensagem;
use Livewire\Attributes\On;
use App\Models\Chat as ModelChat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

use function Laravel\Prompts\alert;

class Chat extends Component
{
    public Collection $allChats;
    public Collection $chats;
    public ModelChat $chat;
    public Collection $users;
    public Collection $usersiC;
    public User $destinario;


    public bool $OpChat = false;
    public bool $OpCon = false;
    public bool $OpNew = false;
    public bool $searching = false;

    public ?string $mensagem;
    public ?int $user_id;
    public ?int $chat_id;
    public string $pesquisa = '';

    protected $rules = [
        'pesquisa' => 'sometimes|exists:users,name',
        'mensagem' => 'required|string|max:255',
        'user_id' => 'required',
        'chat_id' => 'required',
    ];

    protected $messages = [
        'pesquisa.required' => 'Por favor selecione para quem deseja mandar mensagem',
        'pesquisa.exists' => 'O nome que selecionou não corresponde com os nossos registos',
    ];


    #[On('IsSearching')]
    public function search()
    {
        $this->users = new Collection();
        $this->usersiC = new Collection();
        $this->searching = true;
        $added = false;
        $count = 0;
        $Serusers = User::where('name', 'LIKE', '%' .$this->pesquisa. '%')->get();

        
            foreach($this->chats as $chat)
            {
                $chatId = $chat->id;

                $useriC = User::whereHas('chats', function($query) use ($chatId)
                {
                    $query->where('chat_id', $chatId)->where('user_id','!=' ,Auth::user()->id);
                })->get()->first();

                $this->usersiC->add($useriC);
            }
        foreach($Serusers as $user)
        {
            if($user->id != Auth::user()->id)
            {
                $this->users->add($user);
            }
        }

        
        foreach($this->users as $user)
        {

            foreach($this->usersiC as $InChat)
            {
                
                if($user == $InChat)
                {
                    $this->users->forget($count);
                }
            }
            $count++;
        }

        
    }

    public function abrir() : void 
    {
        if($this->OpChat == true)
        {
            $this->OpChat = false;
        }
        else
        {
            $this->OpChat = true;    
        }
            
    }

    public function Back() : void
    {
        $this->OpCon = false;
        $this->OpNew = false;
        $this->reset(['pesquisa', 'chat', 'chats']);
        $this->resetValidation();
        $this->montar();
    }

    public function NovConv() : void
    {
        $this->OpCon = true;
        $this->OpNew = true;
       

    }

    public function enviar()
    {
        $this->user_id = Auth::user()->id;
        $this->chat_id = $this->chat->id;
        Mensagem::create($this->validate());

        $this->reset(['mensagem']);

    }



    public function checkMens():void
    {
        $this->chat = ModelChat::where('id', $this->chat->id)->get()->first();
    } 

    
    public function teste() 
    {
        dd($this->chat);
    }

    public function OpenCon(ModelChat $chat): void
    {
        $this->OpCon = true;

        $this->chat = $chat;
    }

    public function Criar() : void
    {

        $this->validateOnly('pesquisa');

        $this->destinario = User::where('name', $this->pesquisa)->get()->first();

        $proceed = true;
        foreach($this->usersiC as $user)
        {
            if($user->name == $this->destinario->name)
            {
                $proceed = false;
            }
        }

        if($proceed)
        {

            

            $this->chat = new ModelChat();
            $this->chat->save();
            $this->chat->users()->syncWithoutDetaching([$this->destinario->id, Auth::user()->id]);

            $this->OpNew = false;
            $this->reset(['pesquisa']);
            $this->resetValidation();
        }
    } 

    public function montar() : void
    {
        $hisChat = false;
        $hasOne = false;
        $this->chats = new Collection();

        $this->allChats = ModelChat::all();

        foreach($this->allChats as $chat)
        {
            $hisChat = false;
            foreach($chat->users as $user)
            {
                if($user->id == Auth::user()->id)
                {
                    $hisChat = true;
                }
            }

            if($hisChat == true)
            {
                $this->chats->prepend($chat);
            }
        }
    }


    public function mount() : void
    {
       $this->montar();
    }
    
    public function render()
    {
        return view('livewire.chat.chat');
    }
}
