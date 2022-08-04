<?php
include __DIR__.'/Auth.php';
// namespace Helpers;
class Form {
    public $auth;
    public function __construct(){
        $this->auth = new Auth();
    }
    public function printForm($json){
        $html = '';
        $jsonFormatted = json_decode($json);
        if($this->auth->userLoggedIn()){
            $html = '<form>';
            foreach($jsonFormatted as $jsonFormatte){
                $allowRead = $this->auth->isAllowed($jsonFormatte->field_read_permission);
                $allowWrite = $this->auth->isAllowed($jsonFormatte->field_write_permission);
                /*
                    options
                this is used for additional attributes on the input
                */
                $attributes = ' ';
                foreach($jsonFormatte->options as $optionKey=>$optionValue){
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
                            '.($allowWrite==false?'disabled':'').' 
                            id="dynoform'.$jsonFormatte->field_id.'"
                            '.$attributes.'
                            >'.$jsonFormatte->default_value.'</textarea></div>';
                        }
                    break;
                    default:
                        # code...
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