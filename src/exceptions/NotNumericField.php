<?php


namespace BatoiPOP\exceptions;


class NotNumericField extends CheckFieldException
{
    /**
     * RequiredField constructor.
     */
    public function __construct($field)
    {
        parent::__construct($field," no és un número");
    }
}