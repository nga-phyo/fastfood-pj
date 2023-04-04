
<?php 

    function redirect($url){

        header("Location: $url");
        die();
    }

    function dd($data){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die();
    }
?>