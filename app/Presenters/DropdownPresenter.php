<?php

namespace App\Presenters;

use Illuminate\Support\Collection;

class DropdownPresenter
{
    public function convertToOptions(Collection $collection, $optionLabelField, $optionValueField)
    {
        return $collection->map(function($item) use ($optionLabelField, $optionValueField) {
            $obj = new \stdClass();
            $obj->label = $item->$optionLabelField;
            $obj->value = $item->$optionValueField;

            return $obj;
        });
    }
}