<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * The alert message.
     *
     * @var string
     */
    public $message;

    /**
     * The alert type.
     *
     * @var string
     */
    public $type;

    /**
     * The alert dimisssable option.
     *
     * @var string
     */
    public $dimissable;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $type, string $message, bool $dimissable = false)
    {
        $this->message = $message;
        $this->type = $type;
        $this->dimissable = $dimissable;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
