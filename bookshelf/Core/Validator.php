<?php
namespace Core;
class Validator{
  public static function textVal(string $value, int $min = 1,float $max = INF):bool
  {
    $length=strlen(trim($value));
    return $length >=$min && $length <= $max;
  }
  public static function numberVal(string $value, int $minLength, int $maxLength, bool $allowZero=true):bool
  {
    if (!ctype_digit($value)){
      return false;
    }
    $length=strlen(trim($value));
    if ($length < $minLength || $length > $maxLength){
      return false;
    }
    if (!$allowZero && $value[0]=='0'){
      return false;
    }
    return true;
  }

  public static function emailVal(string $value):bool
  {
    return filter_var($value,FILTER_VALIDATE_EMAIL)!==false;
  }

}
