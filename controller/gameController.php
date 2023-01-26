<?php 

require_once "./Model/message.php";
$con= bdd_connection();

switch ($action) {
    case 'chat':
    // If a message was sent, save it to the database and broadcast it
    if (isset($_POST['message'])) {
        $message = $_POST['message'];
        // Save the message to a database...
        addMessageP($con,$message,$idScene,$image=null);
        // Broadcast the message to other clients...
    }

    // Get all messages from the database
    $messages = getMessagesPFromDatabase($con);
    // Output the messages as a list
    echo '<ul>';
    foreach ($messages as $message) {
        echo '<li>' . $message . '</li>';
    }
    echo '</ul>';
    
    break;
    
    default:
    # code...
    break;
}

?>