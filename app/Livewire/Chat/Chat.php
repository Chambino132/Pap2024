<?php

namespace App\Livewire\Chat;

use App\Models\Chat as ModelChat;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{
    public Collection $allChats;
    public Collection $chats;

    public bool $OpChat = false;
    public bool $OpCon = false;
    public bool $OpNew = false;

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

    public function NovConv() : void
    {
        $this->OpCon = true;
        $this->OpNew = true;
    }

    public function Criar() : void
    {
        $this->OpNew = false;
    } 


    public function mount() : void
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
    
    public function render()
    {
        return view('livewire.chat.chat');
    }
}
