let chat =document.querySelector(".right_side");
chat.style.display="none";
let chatBtn = document.querySelector('#chat');
chatBtn.onclick= function(){
    if (chat.style.display=="flex") {
        chat.style.display="none";
    } else {
        chat.style.display="flex";
    }
}
let closeChat = document.getElementById('close_chat');
closeChat.addEventListener('click',()=>{
    chat.style.display='none';
})

let leftSubSides = document.querySelectorAll(".left_sub_side");
leftSubSides.forEach(leftSubSide => {
    leftSubSide.style.height = 1/leftSubSides.length * 98 + "%";
    console.log(leftSubSide.style.height);
});



console.log(document.getElementById('messagerie'));
/*.addEventListener('submit', function(e) {
    e.preventDefault();
    sendMessage();
});*/

// Send message function
function sendMessage() {
    let message = document.querySelector('input[name="message"]').value;

    // Use the fetch() API to send a POST request to the server
    fetch('./?action=chat', {
        method: 'POST',
        body: JSON.stringify({ message: message })
    })
    .then(function(response) {
        // Clear the message input and focus it
        document.querySelector('input[name="message"]').value = '';
        document.querySelector('input[name="message"]').focus();
    });
}

// Listen for new messages
setInterval(function() {
    fetch('./?action=chat')
    .then(function(response) {
        return response.text();
    })
    .then(function(messages) {
        // Update the chat display with the new messages
        document.querySelector('#chat').innerHTML = messages;
    });
}, 1000);
