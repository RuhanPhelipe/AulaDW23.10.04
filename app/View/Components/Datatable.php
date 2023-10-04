<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Datatable extends Component
{
    public $title;
    public $crud;
    public $header;
    public $data;
    public $hide;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $crud, $header, $data, $hide)
    {
        $this->title = $title;
        $this->crud = $crud;
        $this->header = $header;
        $this->header = $header;
        $this->data = $data;
        $this->hide = $hide;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.datatable');
    }
}
