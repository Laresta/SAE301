<?php 

require_once "./Model/message.php";
require_once "./Model/user_model.php";
$con= bdd_connection();

switch ($action) {
    case "sendChat":

    
    echo $_POST['message'];
    // If a message was sent, save it to the database and broadcast it
        if (isset($_POST['message'])) { // mais ca voit pas le post message
            $message = $_POST['message'];
            // Save the message to a database...
            addMessageP($con,$message,1,null);
        }
        break;
    case 'chat':
    // Get all messages from the database
    $messages = getMessagesPFromDatabase($con,1);
    // Output the messages as a list
    echo '<ul>';
    foreach ($messages as $message) {
        $login=findLoginbyid($con,$message->idutilisateur)[0]->login;
        echo '<li>' .$login.":". $message->corps . '</li>';
    }
    echo '</ul>';
    
    break;
    
    default:
    break;
}

?>