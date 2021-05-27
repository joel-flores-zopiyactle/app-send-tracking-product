<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableDetailsSend extends Component
{
    public $sends;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($sends)
    {
        $this->sends = $sends;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.table-details-send');
    }
}
