<?php

namespace App\Livewire\QrCode;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrModal extends ModalComponent
{
    public $link;
    
    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public function render()
    {
       
        $QrCode = QrCode::size(300)->generate($this->link);

        return view('livewire.qr-code.qr-modal', compact('QrCode'));
    }

    
}
