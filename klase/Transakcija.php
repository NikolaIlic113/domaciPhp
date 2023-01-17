<?php

class Transakcija
{
    public $id;
    public $datum;
    public $tip;
    public $valuta;
    public $iznos;
    public $clan_id;



    function __construct($id, $datum, $tip, $valuta, $iznos, $clan_id)
    {
        $this->id = $id;
        $this->datum = $datum;
        $this->tip = $tip;
        $this->valuta = $valuta;
        $this->iznos = $iznos;
        $this->clan_id = $clan_id;
    }


    
}