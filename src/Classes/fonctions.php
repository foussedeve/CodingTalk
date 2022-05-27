<?php 

/**
 * use bootstarp 5.1.x  andt fontawsone icon to format flash messages.To use this function include bootstrap an fontawsone
 * @param $message sting flash message to format
 * @param $mgsType string  options to choise {warning,infos}
 * @param $htmlClasses string html classes to format messages
 * @return string html 
 */
function formatMgs($message, $mgsType,$htmlClasses=null){
    $type=[
        "warning"=>"fa-exclamation-triangle",
        "infos"=>"fa-info-circle"
    ];
    $typeMsg=isset($type[$mgsType])?$type[$mgsType]:null;

    $htmlStart = '<div class="alert alert-success alert-dismissible fade show '.$htmlClasses.'" id="errors" role="alert"><i class="fas '.$typeMsg.' " style="font-style:italic;font-size:18px;margin-right:8px;"></i>';
    $htmlStart .=$message;
    $htmlEnd = ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button></div>';
    $htmlStart .=$htmlEnd;
    return $htmlStart;

}

function formatArrayMgs($messages, $mgsType,$htmlClasses=null){
    $type=[
        "warning"=>"fa-exclamation-triangle",
        "infos"=>"fa-info-circle"
    ];
    
    $typeMsg=isset($type[$mgsType])?$type[$mgsType]:null;

    $htmlStart = '<div class="alert alert-success alert-dismissible fade show '.$htmlClasses.'" id="errors" role="alert"><i class="fas '.$typeMsg.' " style="font-style:italic;font-size:18px;margin-right:8px;"></i>';
   
    foreach($messages as $message ){
        $htmlStart .=$message."</br>";
    }
    $htmlEnd = ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button></div>';
    $htmlStart .=$htmlEnd;
    return $htmlStart;

}