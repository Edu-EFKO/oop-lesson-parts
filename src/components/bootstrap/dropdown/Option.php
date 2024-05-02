<?php

namespace app\bootstrap\dropdown;

use app\HtmlTag;

class Option extends HtmlTag
{
    public function __construct(string $value, string $text, bool $isSelected = false, bool $disabled = false)
    {
        $attributes = [
            "value=\"$value\""
        ];

        if ($isSelected === true) {
            $attributes[] = 'selected';
        }

        if ($disabled === true) {
            $attributes[] = 'disabled';
        }

        parent::__construct(
            null,
            null,
            $text,
            [],
            'option',
            $attributes,
        );
    }
}