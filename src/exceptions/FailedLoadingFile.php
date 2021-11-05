<?php


namespace BatoiPOP\exceptions;


class FailedLoadingFile extends CheckFieldException
{
    /**
     * RequiredField constructor.
     */
    public function __construct($field,$message)
    {
        parent::__construct($field,": ".$message);
    }
}