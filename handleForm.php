<?php 
error_reporting(0);
$json = json_decode(file_get_contents('test.json'));
$html = '<table border="1"><tbody>';
foreach($_POST as $key=>$value){
    //getting values
    foreach($value as $ke=> $valu){
        $html.='<tr>';
        $html.='<td>';
        $html.=$json[$ke]->field_label;
        $html.='</td>';
        $html.='<td>';
        $html.=$valu;
        $html.='</td>';
        $html.='</tr>';
    }
}
$html .= '</tbody></table>';
// print $html;
mail('qaiser@newrich.com','Inquiry',$html);
echo 'success';
?>