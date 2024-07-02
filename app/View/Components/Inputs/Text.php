<?php

namespace App\View\Components\Inputs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Text extends Component
{
    /**
     * Create a new component instance.
     */

    // Container
    public ?string $container__classes, $col, $colSm, $colMd, $colLg, $colXl, $containerClasses;

    // Label
    public ?string $label__classes, $label, $labelClasses, $tooltipClasses, $tooltip, $tooltip__classes;

    // Input
    public $value;
    public ?string $element__classes, $name, $id, $wireModel, $isWireModelLive, $type, $elementClasses, $placeholder, $pattern;
    public ?int $minlength, $maxlength;
    public bool $required, $isDataList, $readonly, $disabled;
    public $posfijo, $posfijo__classes;

    // Descriptive List
    public string $descriptive_list__classes, $term__classes, $description__classes;


    public function __construct(
        string $col = '12',
        ?string $colSm = null,
        string $colMd = '6',
        ?string $colLg = null,
        ?string $colXl = null,
        ?string $containerClasses = null,
        ?string $label = null,
        ?string $labelClasses = null,
        $value = null,
        ?string $name = null,
        ?string $wireModel = null,
        ?string $isWireModelLive = null,
        ?string $type = null,
        ?string $tooltip = null,
        ?string $tooltipClasses = null,
        ?string $elementClasses = null,
        ?string $placeholder = 'Ingrese',
        ?string $pattern = null,
        ?int $minlength = null,
        ?int $maxlength = null,
        bool $required = false,
        bool $isDataList = false,
        bool $readonly = false,
        bool $disabled = false,
        ?string $posfijo = null,
        ?string $id = null,
    ) {
        $this->col = $col;
        $this->colSm = $colSm;
        $this->colMd = $colMd;
        $this->colLg = $colLg;
        $this->colXl = $colXl;
        $this->containerClasses = $containerClasses;
        $this->label = $label;
        $this->labelClasses = $labelClasses;
        $this->value = $value;
        $this->name = $name;
        $this->wireModel = $wireModel;
        $this->isWireModelLive = $isWireModelLive;
        $this->type = $type;
        $this->tooltip = $tooltip;
        $this->tooltipClasses = $tooltipClasses;
        $this->elementClasses = $elementClasses;
        $this->placeholder = $placeholder;
        $this->pattern = $pattern;
        $this->minlength = $minlength;
        $this->maxlength = $maxlength;
        $this->required = $required ?: false;
        $this->isDataList = $isDataList ?: false;
        $this->readonly = $readonly ?: false;
        $this->disabled = $disabled ?: false;
        $this->posfijo = $posfijo;
        $this->id = $id;
        
        $this->setClasses();
    }


    private function setClasses()
    {
        $this->setContainerClasses();
        $this->setLabelClasses();
        $this->setElementClasses();
        $this->setDescriptiveListClasses();
        $this->setPosfijoClasses();
        $this->setWireModel();
    }


    private function setContainerClasses(): void
    {
        $container__classes = 'form-group form-group-component';
        $container__classes .= $this->col ? ' col-' . $this->col : ' col';
        $container__classes .= $this->colSm ? ' col-sm-' . $this->colSm : '';
        $container__classes .= $this->colMd ? ' col-md-' . $this->colMd : '';
        $container__classes .= $this->colLg ? ' col-lg-' . $this->colLg : '';
        $container__classes .= $this->colXl ? ' col-xl-' . $this->colXl : '';
        $container__classes .= $this->containerClasses ? ' ' . $this->containerClasses : '';

        $this->container__classes = $container__classes;
    }


    private function setLabelClasses(): void
    {
        $label__classes = 'component__label ';
        $label__classes .= $this->labelClasses ?: '';
        $label__classes .= $this->required ? ' required' : '';
        $this->label__classes = $label__classes;

        $tooltip__classes = 'fas fa-info-circle ml-1';
        //$tooltip__classes .= $this->tooltipClasses ?: '';
        $this->tooltip__classes = $tooltip__classes;
    }


    private function setElementClasses(): void
    {
        $element__classes = 'form-control component component--text ';
        $element__classes .= $this->elementClasses ?: '';

        $this->element__classes = $element__classes;
    }


    private function setDescriptiveListClasses(): void
    {
        $descriptive_list__classes = 'dl';

        $this->descriptive_list__classes = $descriptive_list__classes;

        $term__classes = 'dt ';
        $term__classes .= $this->required ? ' required' : '';

        $this->term__classes = $term__classes;

        $description__classes = 'dd';

        $this->description__classes = $description__classes;
    }


    private function setPosfijoClasses(): void
    {
        $posfijo__classes = 'component__posfijo ';
        $this->posfijo__classes = $posfijo__classes;
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
        return view('components.inputs.text');
    }
}
