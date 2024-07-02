<?php

namespace App\View\Components\Inputs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Date extends Component
{
    /**
     * Create a new component instance.
     */

     public $classes;
     public $inputClasses;
     public $value;
     public $id;
     public $name;
     public $col;
     public $colSm;
     public $colMd;
     public $colLg;
     public $colXl;
     public $label;
     public $maxlength;
     public $labelInline;
     public ?string $wireModel, $isWireModelLive, $required;
     public ?string $ph;
 
     public function __construct(
         $classes = '',
         $inputClasses = '',
         $value = '',
         $id = '',
         $name = '',
         $col = '',
         $colSm = '',
         $colMd = '',
         $colLg = '',
         $colXl = '',
         $label = '',
         $maxlength =  '10',
         $labelInline = null,
         ?string $wireModel = null,
         ?string $isWireModelLive = null,
         ?string $required = '',
         ?string $ph = ''
     ) {
         $this->classes = $classes;
         $this->inputClasses = $inputClasses;
         $this->value = $value;
         $this->id = $id;
         $this->name = $name;
         $this->col = $col;
         $this->colSm = $colSm;
         $this->colMd = $colMd;
         $this->colLg = $colLg;
         $this->colXl = $colXl;
         $this->label = $label;
         $this->maxlength = $maxlength;
         $this->labelInline = $labelInline;
         $this->wireModel = $wireModel;
         $this->isWireModelLive = $isWireModelLive;
         $this->required = $required;
         $this->ph = $ph;
 
         $this->setClasses();
     }
 
     private function setClasses()
     {
         $this->setWireModel();
     }
 
     private function setWireModel(): void
     {
         if (!$this->wireModel) return;
 
         $wireModel = $this->isWireModelLive
             ? 'wire:model.live=' . $this->name
             : 'wire:model=' . $this->name;
 
         $this->wireModel = $wireModel;
     }
 
     /**
      * Get the view / contents that represent the component.
      */
     public function render(): View|Closure|string
     {
         return view('components.inputs.date');
     }
}
