<?php


namespace BatoiPOP\exceptions;


class RequiredField extends CheckFieldException
{

    /**
     * RequiredField constructor.
     */
    public function __construct($field)
    {
        parent::__construct($field," és requirit");
    }
}