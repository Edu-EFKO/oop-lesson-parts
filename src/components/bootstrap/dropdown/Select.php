<?php

namespace app\bootstrap\dropdown;

use app\HtmlTag;

class Select extends HtmlTag
{
    private array $list;

    private string|null $selectedValue;

    private string|null $default;

    public function __construct(
        string     $for,
        array      $list,
        string     $default = null,
        string|int $selectedValue = null,
        array      $styles = [],
    )
    {
        parent::__construct(
            $for . '-select',
            'form-select',
            '',
            $styles,
            'select',
            [
                "name=\"$for\"",
                'aria-required="true"'
            ]
        );

        $this->list = $list;
        $this->default = $default;
        $this->selectedValue = $selectedValue;
    }

    public function render(): string
    {
        if ($this->default !== null) {
            $this->addInnerTag(new Option(
                '',
                $this->default,
                true,
                true,
            ));
        }

        foreach ($this->list as $value) {

            $text = $value;

            if (is_string($value) === true) {
                $text = mb_convert_case($value, MB_CASE_TITLE, 'UTF-8');
            }

            if (is_numeric($value) === true) {
                $value = (string) $value;
            }

            $option = new Option(
                $value,
                $text,
                $value === $this->selectedValue,
            );

            $this->addInnerTag($option);
        }

        return parent::render();
    }
}