<?php


namespace Libraries\Validator;

class Validator
{
    private $errors = [];
    private $request;

    public function __construct($requestObject)
    {
        $this->request = $requestObject;
    }

    public function Validate($array)
    {
        foreach ($array as $field => $rules) {
            $hasRequired = in_array('required', $rules);
    
            foreach ($rules as $rule) {
               
                if (!$hasRequired && empty($this->request->{$field})) {
                    continue;
                }
    
                
                if (strpos($field, ':') !== false) {
                    $fieldArray = explode(':', $field);
                    $arrayName = $fieldArray[0];
                    $key = $fieldArray[1];
                    if (isset($this->request->{$arrayName}[$key]) && !empty($this->request->{$arrayName}[$key])) {
                        if (strpos($rule, ':') !== false) {
                            list($ruleName, $ruleValue) = explode(':', $rule);
                            if ($error = $this->{$ruleName}($this->request->{$arrayName}[$key], $ruleValue)) {
                                $this->errors[array_keys($this->request->$arrayName, $this->request->{$arrayName}[$key])[0]] = $error;
                                break;
                            }
                        } else {
                            if ($error = $this->{$rule}($this->request->{$arrayName}[$key])) {
                                $this->errors[array_keys($this->request->$arrayName, $this->request->{$arrayName}[$key])[0]] = $error;
                                break;
                            }
                        }
                    }
                } else {
                    if (strpos($rule, ':') !== false) {
                        list($ruleName, $ruleValue) = explode(':', $rule);
                        if ($error = $this->{$ruleName}($field, $ruleValue)) {
                            $this->errors[$field] = $error;
                            break;
                        }
                    } else {
                        if ($error = $this->{$rule}($field)) {
                            $this->errors[$field] = $error;
                            break;
                        }
                    }
                }
            }
        }
        return $this;
    }
    

    public function hasError()
    {
        return count($this->errors) > 0;
    }

    public function setError($errorName, $value)
    {
        if (is_bool($value) && $value === false) {
            $this->errors[$errorName] = $value;
        }

        return true;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    private function required($field)
    {
        return (is_null($this->request->{$field}) || $this->request->{$field} === '');
    }

    private function minStr($field, $value)
    {
        return !is_null($this->request->{$field}) && strlen($this->request->{$field}) < $value;
    }

    private function maxStr($field, $value)
    {
        return !is_null($this->request->{$field}) && strlen($this->request->{$field}) > $value;
    }

    private function minNumberLenth($field, $count)
    {
        return strlen((string)$this->request->{$field}) < $count;
    }

    private function maxNumberLenth($field, $count)
    {
        return strlen((string)$this->request->{$field}) > $count;
    }

    private function maxNumber($field, $count)
    {
        return $this->request->{$field} > $count;
    }

    private function minNumber($field, $count)
    {
        return $this->request->{$field} < $count;
    }

    private function email($field)
    {
        return !filter_var($this->request->{$field}, FILTER_VALIDATE_EMAIL);
    }

    private function isNumberInt($field)
    {
        return !filter_var($this->request->{$field}, FILTER_VALIDATE_INT);
    }

    private function isNumberFloat($field)
    {
        return !filter_var($this->request->{$field}, FILTER_VALIDATE_FLOAT);
    }

    private function isNumber($field)
    {
        return !is_numeric($this->request->{$field});
    }

    private function maxFloatLenth($field, $count)
    {
        $num_decimals = strlen(substr(strrchr((string)$this->request->{$field}, "."), 1));
        return $num_decimals > $count;
    }

    private function minFloatLenth($field, $count)
    {
        $num_decimals = strlen(substr(strrchr((string)$this->request->{$field}, "."), 1));
        return $num_decimals < $count;
    }

    private function confirm($field)
    {
        $confirmField = $field . "_confirm";
        return is_null($this->request->{$confirmField}) || $this->request->{$confirmField} == '' || $this->request->{$field} !== $this->request->{$confirmField};
    }

    public function FileSuffix($field, $suffix)
    {
        $extension = pathinfo($field, PATHINFO_EXTENSION);
        return $extension !== $suffix;
    }

    public function fileMinSize($field, $KB_size)
    {
        $size = $this->ByteToKb($field);
        return $size < $KB_size;
    }

    public function fileMaxSize($field, $KB_size)
    {
        $size = $this->ByteToKb($field);
        return $size > $KB_size;
    }

    private function ByteToKb($size)
    {
        return round($size / 1024, 1);
    }

    public function checkCsrfToken($csrf_token)
    {
        $token = getCsrfToken();
        if ($token == $csrf_token) {
            deleteCsrfToken();
            return true;
        }
        return false;
    }
}
