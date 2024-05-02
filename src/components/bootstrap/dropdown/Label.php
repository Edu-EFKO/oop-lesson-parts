<?php

namespace app\bootstrap\dropdown;

use app\HtmlTag;

class Label extends HtmlTag
{
    public function __construct(
        string $for,
        string $text
    )
    {
        parent::__construct(
            null,
            'form-label',
            $text,
            [],
            'label',
            ["for=\"$for . '-select'\""]);
    }
}