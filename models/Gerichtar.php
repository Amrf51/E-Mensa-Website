<?php

class GerichtAR extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'gericht';
    protected function preisIntern(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(
            get: fn ($value) => number_format($value, 2),
        );
    }

    protected function preisExtern(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(
            get: fn ($value) => number_format($value, 2),
        );
    }
    protected function vegan(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(
            set: function ($value) {
                $v = strtolower(str_replace(' ', '', $value));
                if ($v == 'ja' || $v == 'yes')
                    return true;
                else if ($v == 'nein' || $v == 'no')
                    return false;
                return false;
            }
        );
    }

    protected function vegetarisch(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(
            set: function ($value) {
                $v = strtolower(str_replace(' ', '', $value));
                if ($v == 'ja' || $v == 'yes')
                    return true;
                else if ($v == 'nein' || $v == 'no')
                    return false;
                return false;
            }
        );
    }
}

