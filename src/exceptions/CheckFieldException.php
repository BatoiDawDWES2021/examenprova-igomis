<?php


namespace BatoiPOP\exceptions;


abstract class CheckFieldException extends \Exception
{
    protected $field;
    /**
     * RequiredField constructor.
     * @param string $message
     */
    public function __construct(string $field,string $message)
    {
        $this->field = $field;
        parent::__construct($field.$message);
    }

    public function getField(){
        return $this->field;
    }
}