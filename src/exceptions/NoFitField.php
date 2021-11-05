<?php


namespace BatoiPOP\exceptions;


class NoFitField extends CheckFieldException
{
    /**
     * RequiredField constructor.
     */
    public function __construct($field)
    {
        parent::__construct($field," no és entre els paràmetres requerits");
    }
}