<?php 

require_once "./Model/message.php";
require_once "./Model/user_model.php";
$con= bdd_connection();
$idScene = $_POST['idScene'];
$idPers=null;
switch ($action) {
    case "sendChatP":
        if (isset($_POST['message'])) { 
            $message = $_POST['message'];
            /*$image = $_FILES['image']; 
            $imgContent =addslashes(file_get_contents($image['tmp_name']));*/
            // Save the message to a database...
            addMessagePr($con,$message,$idScene,$imgContent);
        }
        print("yoyo");
        break;
    case 'sendChatN':
        if (isset($_POST['message'])) { 
            $message = $_POST['message'];
            $idPers=null;
            // Save the message to a database...
            addMessagePu($con,$message,$idScene,$idPers,$image);
        }
        break;
    case "chatN":
    case 'chatP':
        // Get all messages from the database
        $messages = getMessagesPFromDatabase($con, $idScene);
     // Output the messages as a list
        echo '<ul>';
        foreach ($messages as $message) {
          $login=findLoginbyid($con,$message->idutilisateur)[0]->login;
           echo '<li>' .$login.":". $message->corps;
           if(isset($message->image))echo '<img src="data:image/jpeg;base64,'.base64_encode("$message->image").'" width="100%"/>'. '</li>';
        }
        echo '</ul>';
    
         break;
    
    default:
    break;
}

?>