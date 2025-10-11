<?php

namespace App\View\Components; // Ojo: esto es importante

use Illuminate\View\Component;

class Footer extends Component
{
    public function render()
    {
        // Esto le dice a Laravel dónde está la vista del footer
        return view('components.footer');
    }
}
