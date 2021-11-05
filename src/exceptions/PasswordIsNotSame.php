<?php


namespace BatoiPOP\exceptions;


class PasswordIsNotSame extends CheckFieldException
{
    /**
     * RequiredField constructor.
     */
    public function __construct($field)
    {
        parent::__construct($field," no coincideix");
    }
}