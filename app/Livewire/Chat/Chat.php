<?php

namespace App\Livewire\Chat;

use App\Models\User;
use Livewire\Component;
use App\Models\Chat as ModelChat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;

class Chat extends Component
{
    public Collection $allChats;
    public Collection $chats;
    public ModelChat $chat;
    public Collection $users;
    public User $destinario;


    public bool $OpChat = false;
    public bool $OpCon = false;
    public bool $OpNew = false;
    public bool $searching = false;
    public string $pesquisa = '';

    protected $rules = [
        'pesquisa' => 'required|exists:users,name',
    ];

    protected $messages = [
        'pesquisa.required' => 'Por favor selecione para quem deseja mandar mensagem',
        'pesquisa.exists' => 'O nome que selecionou não corresponde com os nossos registos',
    ];


    #[On('IsSearching')]
    public function search()
    {
        $this->users = new Collection();
        $this->searching = true;
        $Serusers = User::where('name', 'LIKE', '%' .$this->pesquisa. '%')->get();

        
            foreach($this->chats as $chat)
            {
                $chatId = $chat->id;

                $userNiC = User::whereDoesntHave('chats', function($query) use ($chatId)
                {
                    $query->where('chat_id', $chatId);
                })->get();
            }
        foreach($Serusers as $user)
        {
            foreach($userNiC as $notIChat)
            {
                if($user->id != Auth::user()->id && $notIChat == $user)
                {

                    $this->users->add($user);
                }
            }
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

    public function teste() 
    {
        dd($this->chats);
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

        $this->chat = new ModelChat();
        $this->chat->save();
        $this->chat->users()->syncWithoutDetaching([$this->destinario->id, Auth::user()->id]);

        $this->OpNew = false;
        $this->reset(['pesquisa']);
        $this->resetValidation();
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
