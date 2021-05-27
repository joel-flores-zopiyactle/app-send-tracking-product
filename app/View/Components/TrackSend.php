<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TrackSend extends Component
{
    public $trackingSend;
    public $product;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($trackingSend, $product)
    {
        $this->trackingSend = $trackingSend;
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.track-send');
    }
}
