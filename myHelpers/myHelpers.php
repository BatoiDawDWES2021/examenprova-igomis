<?php
use BatoiPOP\exceptions\RequiredField;
use BatoiPOP\exceptions\IsNotAnImageFile;
use BatoiPOP\exceptions\NotNumericField;
use BatoiPOP\exceptions\NoFitField;
use BatoiPOP\exceptions\FailedLoadingFile;

function dd(...$variable){
     foreach ($variable as $var){
         var_dump($var);
         echo "<br/>";
     }
     die();
}

function isPost(){
    return ($_SERVER["REQUEST_METHOD"] === "POST");
}

function loadView($vista,$params=[]){
    extract($params);
    if (isPost()) {
        extract($_POST,EXTR_PREFIX_ALL,'old');
    }
    require_once($_SERVER['DOCUMENT_ROOT'].'/../views/'."$vista.view.php");
}

function loadTemplate($vista,$params=[]){
    return loadView($vista,$params);
}

function isValidClass($nomCamp,$errors){
    if (!isset($errors)) {
        return '';
    }
    if (isset($errors[$nomCamp])) {
        return 'is-invalid';
    }
    return 'is-valid';
}

function showError($nomCamp,$errors){
    if (!isset($errors)) {
        return '';
    }
    if (isset($errors[$nomCamp])) {
        return "<div class='invalid-feedback'>$errors[$nomCamp]</div>";
    }
    return "<div class='valid-feedback'>All correct</div>";
}

function saveFile($nomcamp,$type,$directori){
    if ($_FILES[$nomcamp]['type'] == $type){
        $nomFitxer = "/$directori/".$_FILES[$nomcamp]["name"];
        try {
            move_uploaded_file($_FILES[$nomcamp]["tmp_name"], $_SERVER['DOCUMENT_ROOT'].$nomFitxer);
        } catch (Exception $e){
            throw new FailedLoadingFile($nomcamp,$e->getMessage());
        }
        return $nomFitxer;
    }
    throw new IsNotAnImageFile($nomcamp);
}

function cfsr(){
    if (parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) != $_SERVER['HTTP_HOST']) die('Anti-CSRF');
    return true;
}

function isRequired($nomCamp){
    if (!empty($_POST[$nomCamp])) {
        return trim(htmlspecialchars($_POST[$nomCamp]));
    }
    throw new RequiredField($nomCamp);
}

function isBetween($nomCamp,$min=-99999999,$max=9999999){
    if (!empty($_POST[$nomCamp]) && is_numeric($_POST[$nomCamp])) {
        if ($_POST[$nomCamp]<$min || $_POST[$nomCamp]> $max){
            throw new NoFitField($nomCamp);
        }
        else {
            return $_POST[$nomCamp];
        }
    }
    throw new NotNumericField($nomCamp);
}

function isSame($a,$b){
    if ($a === $b) return true;
    throw new \BatoiPOP\exceptions\PasswordIsNotSame();
}

function insert($table,$fields) {
    $fieldsValue = implode(" , :",array_keys($fields));
    $fieldsName = implode(",",array_keys($fields));
    $sentence = "insert into %s (%s) values (:%s )";
    return sprintf($sentence,$table,$fieldsName,$fieldsValue);
}

function update($table,$fields,$primaryKey) {
    $fieldsValue = implode(" , :",array_keys($fields));
    $fieldsName = implode(",",array_keys($fields));
    $sentence = "UPDATE $table SET ";
    foreach ($fields as $key => $value){
        $sentence .= "$key = :$key,";
    }
    $sentence = trim($sentence,',');
    $sentence .= " WHERE $primaryKey = :id";
    return $sentence;
}


