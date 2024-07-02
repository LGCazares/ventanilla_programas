<?php

namespace App\View\Components\Inputs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Radio extends Component
{
    /**
     * Create a new component instance.
     */

    // Container
    public ?string $container__classes, $col, $colSm, $colMd, $colLg, $colXl, $containerClasses;

    // Label
    public ?string $label__classes, $label, $firstLabel, $lastLabel, $labelClasses, $firstValue, $lastValue;

    // Input: Radio
    public $value;
    public ?string $element__label__classes, $element__classes, $name, $wireModel, $isWireModelLive, $elementClasses;
    public bool $required;

    public function __construct(
        string $col = '12',
        ?string $colSm = null,
        string $colMd = '6',
        ?string $colLg = null,
        ?string $colXl = null,
        ?string $containerClasses = null,
        ?string $label = null,
        ?string $firstLabel = 'Si',
        ?string $lastLabel = 'No',
        ?string $labelClasses = null,
        $value = null,
        ?string $name = null,
        ?string $wireModel = null,
        ?string $isWireModelLive = null,
        ?string $elementClasses = null,
        bool $required = false,
        ?string $firstValue = null,
        ?string $lastValue = null,
    ) {
        $this->col = $col;
        $this->colSm = $colSm;
        $this->colMd = $colMd;
        $this->colLg = $colLg;
        $this->colXl = $colXl;
        $this->containerClasses = $containerClasses;
        $this->label = $label;
        $this->firstLabel = $firstLabel;
        $this->lastLabel = $lastLabel;
        $this->labelClasses = $labelClasses;
        $this->value = $value;
        $this->name = $name;
        $this->wireModel = $wireModel;
        $this->isWireModelLive = $isWireModelLive;
        $this->elementClasses = $elementClasses;
        $this->required = $required ?: false;
        $this->firstValue = $firstValue;
        $this->lastValue = $lastValue;

        $this->setClasses();
    }

    private function setClasses()
    {
        $this->setContainerClasses();
        $this->setLabelClasses();
        $this->setElementLabelClasses();
        $this->setElementClasses();
        $this->setWireModel();
    }

    private function setContainerClasses(): void
    {
        $container__classes = 'form-group';
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
    }

    private function setElementLabelClasses(): void
    {
        $element__label__classes = 'component__label component__label--radio';
        $this->element__label__classes = $element__label__classes;
    }

    private function setElementClasses(): void
    {
        $element__classes = 'form-control component component--radio ';
        $element__classes .= $this->elementClasses ?: '';
        $this->element__classes = $element__classes;
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
        return view('components.inputs.radio');
    }
}
