<?php

class BewertungAR extends \Illuminate\Database\Eloquent\Model {
    protected $table = "bewertung";
    public $timestamps = false;

    protected $fillable = ["Hervorgehoben"];
    protected $primaryKey = "id";
}
