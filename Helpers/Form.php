<?php
include __DIR__.'/Auth.php';
// namespace Helpers;
class Form {
    public $auth;
    public $totalRadios = 0;
    public $totalChecks = 0;
    public function __construct(){
        $this->auth = new Auth();
    }
    public function printForm($json){
        $html = '';
        $jsonFormatted = json_decode($json);
        if($this->auth->userLoggedIn()){
            $html = '<form>';
            foreach($jsonFormatted as $jsonFormatteKey=>$jsonFormatte){
                $allowRead = $this->auth->isAllowed($jsonFormatte->field_read_permission);
                $allowWrite = $this->auth->isAllowed($jsonFormatte->field_write_permission);
                /*
                    options
                this is used for additional attributes on the input
                */
                $attributes = ' ';
                foreach($jsonFormatte->options as $optionKey=>$optionValue){
                    if($optionKey=='dropdownValues'){
                        continue;
                    }
                    $attributes.=$optionKey.'="'.$optionValue.'" ';
                }
                /*
                    field_name
                this object is used to determine which input to use
                */
                switch ($jsonFormatte->field_name) {
                    case 'text':
                        if($allowRead===true){
                            $html .= '<div class="mb-3">
                            <label for="dynoform'.$jsonFormatte->field_id.'" class="form-label">'.$jsonFormatte->field_label.'</label>
                            <input 
                            '.($allowWrite==false?'disabled':'').' 
                            type="text" 
                            name="text['.$jsonFormatteKey.']" 
                            value="'.$jsonFormatte->default_value.'" 
                            id="dynoform'.$jsonFormatte->field_id.'"
                            '.$attributes.'
                            /></div>';
                        }
                    break;
                    case 'textarea':
                        if($allowRead===true){
                            $html .= '<div class="mb-3">
                            <label for="dynoform'.$jsonFormatte->field_id.'" class="form-label">'.$jsonFormatte->field_label.'</label>
                            <textarea 
                            name="textarea['.$jsonFormatteKey.']" 
                            '.($allowWrite==false?'disabled':'').' 
                            id="dynoform'.$jsonFormatte->field_id.'"
                            '.$attributes.'
                            >'.$jsonFormatte->default_value.'</textarea></div>';
                        }
                    break;
                    case 'password':
                        if($allowRead===true){
                            $html .= '<div class="mb-3">
                            <label for="dynoform'.$jsonFormatte->field_id.'" class="form-label">'.$jsonFormatte->field_label.'</label>
                            <input 
                            '.($allowWrite==false?'disabled':'').' 
                            type="password" 
                            name="pass['.$jsonFormatteKey.']" 
                            value="'.$jsonFormatte->default_value.'" 
                            id="dynoform'.$jsonFormatte->field_id.'"
                            '.$attributes.'
                            /></div>';
                        }
                    break;
                    case 'select':
                        if($allowRead===true){
                            $options = '';
                            if(isset($jsonFormatte->options->dropdownValues)){
                                $dropdownValues = $jsonFormatte->options->dropdownValues;
                                foreach($dropdownValues as $dropdownValue){
                                    $options.='<option '.($jsonFormatte->default_value==$dropdownValue->id?'selected':'').' value="'.$dropdownValue->id.'">'.$dropdownValue->value.'</option>';
                                }
                            }
                            $html .= '<div class="mb-3">
                            <label for="dynoform'.$jsonFormatte->field_id.'" class="form-label">'.$jsonFormatte->field_label.'</label>
                            <select 
                            name="select['.$jsonFormatteKey.']" 
                            '.($allowWrite==false?'disabled':'').' 
                            id="dynoform'.$jsonFormatte->field_id.'"
                            '.$attributes.'
                            >
                            '.$options.'
                            </select>
                            </div>';
                        }
                    break;
                    case 'radio':
                        $this->totalRadios++;
                        if($allowRead===true){
                            $radios = '';
                            $radioId='dynoform'.$this->totalRadios.$jsonFormatte->field_id;
                            if(isset($jsonFormatte->options->dropdownValues)){
                                $dropdownValues = $jsonFormatte->options->dropdownValues;
                                $radioInside = 0;
                                foreach($dropdownValues as $dropdownValue){
                                    $radioInside++;
                                    $radios.='
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" 
                                        name="radios['.$jsonFormatteKey.']" 
                                        id="'.$radioId.$radioInside.'" value="'.$dropdownValue->value.'" '.($jsonFormatte->default_value==$dropdownValue->id?'checked':'').' 
                                        />
                                        <label class="form-check-label" for="'.$radioId.$radioInside.'">
                                        '.$dropdownValue->value.'
                                        </label>
                                    </div>
                                    ';
                                }
                            }
                            $html .= '<div class="mb-3">
                            <label for="'.$radioId.'" class="form-label">'.$jsonFormatte->field_label.'</label>
                            '.$radios.'
                            </div>';
                        }
                    break;
                    case 'checkbox':
                        $this->totalChecks++;
                        if($allowRead===true){
                            $radios = '';
                            $radioId='dynoform'.$this->totalChecks.$jsonFormatte->field_id;
                            if(isset($jsonFormatte->options->dropdownValues)){
                                $dropdownValues = $jsonFormatte->options->dropdownValues;
                                $radioInside = 0;
                                foreach($dropdownValues as $dropdownValue){
                                    $radioInside++;
                                    $valueChecks = explode('|', $jsonFormatte->default_value);
                                    $radios.='
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" 
                                        name="radios['.$jsonFormatteKey.']" 
                                        id="'.$radioId.$radioInside.'" value="'.$dropdownValue->value.'" 
                                        '.(in_array($dropdownValue->id, $valueChecks)?'checked':'').' />
                                        <label class="form-check-label" for="'.$radioId.$radioInside.'">
                                        '.$dropdownValue->value.'
                                        </label>
                                    </div>
                                    ';
                                }
                            }
                            $html .= '<div class="mb-3">
                            <label for="'.$radioId.'" class="form-label">'.$jsonFormatte->field_label.'</label>
                            '.$radios.'
                            </div>';
                        }
                    break;
                }
                // var_dump($jsonFormatte->field_name);
                // var_dump($jsonFormatte->field_label);
                // var_dump($jsonFormatte->field_id);
                // var_dump($jsonFormatte->field_read_permission);
                // var_dump($jsonFormatte->field_write_permission);
                // var_dump($jsonFormatte->default_value);
                // var_dump($jsonFormatte->options);
            }
            $html .= '</form>';
        }
        print $html;
    }
}

?>