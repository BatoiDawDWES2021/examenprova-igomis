<?php


namespace BatoiPOP\exceptions;


class IsNotAnImageFile extends CheckFieldException
{
    /**
     * RequiredField constructor.
     */
    public function __construct($field)
    {
        parent::__construct($field," no és imatge");
    }
}