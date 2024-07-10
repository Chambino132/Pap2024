<?php

namespace App\Livewire\Chat;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Mensagem;
use Livewire\Attributes\On;
use App\Models\Chat as ModelChat;
use function Laravel\Prompts\alert;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;

class Chat extends Component
{
    public Collection $allChats;
    public Collection $chats;
    public Collection $chatsNA;
    public ModelChat $chat;
    public Collection $users;
    public Collection $usersiC;
    public Collection $unsorted;
    public User $destinario;


    public bool $OpChat = false;
    public bool $OpCon = false;
    public bool $OpNew = false;
    public bool $searching = false;
    public bool $adFun = false;

    public string $erro;

    public ?string $mensagem;
    public ?int $user_id;
    public ?int $chat_id;
    public string $pesquisa = '';

    protected $rules = [
        'mensagem' => 'required|string|max:255',
        'user_id' => 'required',
        'chat_id' => 'required',
    ];

    protected $messages = [
        'mensagem.required' => 'Por favor escreva a sua mensagem antes de enviar'
    ];

    // #[On('IsSearching')]
    // public function search()
    // {
    //     $this->users = new Collection();
    //     $this->usersiC = new Collection();
    //     $this->searching = true;
    //     $added = false;
    //     $count = 0;
    //     $Serusers = User::where('name', 'LIKE', '%' . $this->pesquisa . '%')
    //                       ->whereNot('utype', 'PorConfirmar')
    //                       ->get();

    //     foreach ($this->chats as $chat) 
    //     {
    //         $chatId = $chat->id;

    //         $useriC = User::whereHas('chats', function ($query) use ($chatId) {
    //             $query->where('chat_id', $chatId)->where('user_id', '!=', Auth::user()->id);
    //         })->get()->first();

    //         $this->usersiC->add($useriC);
    //     }
    //     foreach ($Serusers as $user) 
    //     {
    //         if ($user->id != Auth::user()->id) {
    //             $this->users->add($user);
    //         }
    //     }

    //     foreach ($this->users as $user) 
    //     {
    //         foreach ($this->usersiC as $InChat) 
    //         {
    //             if ($user == $InChat) 
    //             {
    //                 $this->users->forget($count);
    //             }
    //         }
    //         $count++;
    //     }
    // }

    public function abrir(): void
    {
        if ($this->OpChat == true) 
        {
            $this->OpChat = false;
        } else {
            $this->OpChat = true;
        }
    }

    public function Back(): void
    {
        $this->OpCon = false;
        $this->OpNew = false;
        $this->reset(['pesquisa', 'chat', 'chats']);
        $this->resetValidation();
        $this->montar();
    }

    public function NovConv(): void
    {
        $this->OpCon = true;
        $this->OpNew = true;
    }

    public function enviar()
    {
        $now = Carbon::now();
        $this->user_id = Auth::user()->id;
        $this->chat_id = $this->chat->id;
        Mensagem::create($this->validate());
        $this->chat->update(['lastMensagem' => $now]);

        $this->reset(['mensagem', 'OpChat']);

        $this->dispatch('NewMessage');
    }

    #[On('NewMessage')]
    public function KeepOpen(): void
    {
        $this->OpChat = true;
    }

    public function resetVAl(): void
    {
        $this->resetValidation();
    }

    public function checkMens(): void
    {
        if ($this->OpCon) {
            $this->chat = ModelChat::where('id', $this->chat->id)->get()->first();

            foreach($this->chat->mensagems as $mensagem)
            {
                if ($mensagem->user_id != Auth::user()->id) 
                {
                    $mensagem->estado = 'Lida';
                    $mensagem->save();
                }
            }
        }
    }
    public function getChats()
    {
        $this->montar();
        $this->OpChat = true;
    }


    public function OpenCon(ModelChat $chat): void
    {
        $this->OpCon = true;
        $this->chat = $chat;

        foreach($this->chat->mensagems as $mensagem)
        {
            if ($mensagem->user_id != Auth::user()->id) 
            {
                $mensagem->estado = 'Lida';
                $mensagem->save();
            }
        }
    }

    public function Criar(): void
    {
        $this->chat = new ModelChat();
        $this->chat->save();
        $this->chat->users()->syncWithoutDetaching([Auth::user()->id]);
        $this->OpCon = true;
    }

    public function Atender()
    {
        $this->chat->estado = 'Atendido';
        $this->chat->users()->syncWithoutDetaching([Auth::user()->id]);
        $this->chat->save();
    }

    public function montar(): void
    {
        if(Auth::user()->utype == 'Funcionario' || Auth::user()->utype == 'Admin')
        {
            $this->adFun = true;
        }

        $hisChat = false;
        $hasOne = false;
        $this->chats = new Collection();
        $this->unsorted = new Collection();
        $this->allChats = ModelChat::all();

        foreach ($this->allChats as $chat) {
            $hisChat = false;
            foreach ($chat->users as $user) {
                if ($user->id == Auth::user()->id) {
                    $hisChat = true;
                }
            }

            if ($hisChat == true) {
                $this->unsorted->prepend($chat);
            }
        }

        $this->chats = $this->unsorted->sortByDesc('lastMensagem');

        if(Auth::user()->utype == 'Funcionario' ||  Auth::user()->utype == 'Admin')
        {
            $this->chatsNA = ModelChat::where('estado', '=', 'naoAtendido')->get();
        }
    }


    public function mount(): void
    {
        $this->montar();
    }

    public function render()
    {
        return view('livewire.chat.chat');
    }
}
