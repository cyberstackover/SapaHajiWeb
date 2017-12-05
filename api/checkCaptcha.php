    <?php
    header('Access-Control-Allow-Origin: *');
error_reporting(E_ALL ^ E_DEPRECATED);
    session_start();

    if(isset($_REQUEST['code']))
    {
        echo json_encode(strtolower($_REQUEST['code']) == strtolower($_SESSION['captcha']));
    }
    else
    {
        echo 0; // no code
    }
    ?>
