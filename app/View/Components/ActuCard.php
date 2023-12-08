<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActuCard extends Component {
    public $lien;

    public $titre;

    public $description;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $lien,
        $titre,
        $description
    ) {
        $this->lien = $lien;
        $this->titre = $titre;
        $this->description = $description;
    }

    private function sliceDescription() {
        $decoded_description = html_entity_decode((string)$this->description);
        $decoded_description = explode(' ', $decoded_description);
        $decoded_description = array_slice($decoded_description, 0, 30);
        $decoded_description = implode(' ', $decoded_description);

        return $decoded_description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        $this->sliceDescription();
        return view('components.actu-card');
    }
}
