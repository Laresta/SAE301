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



document.getElementById('messagerie').addEventListener('submit', function(e) {
    e.preventDefault();
    sendMessage();
});

// Send message function
function sendMessage() {
    let message = document.querySelector('#message').value;
    let data = new FormData();
    data.set('message',message );
    // Use the fetch() API to send a POST request to the server
    fetch('./?action=sendChat', {
        method: 'POST',
        mode: "same-origin",
        credentials: "same-origin",
        body:data,
    })
    .then(function(response) {
        console.log(response.json);
        document.querySelector('input[name="message"]').value = '';
        document.querySelector('input[name="message"]').focus();
    }).then((res)=>{
        console.log('Success:',res);
    }).catch((error)=>{
        console.error('Error:',error);
    });
    console.log(data);
}

// Listen for new messages
setInterval(function() {
    fetch('./?action=chat')
    .then(function(response) {
        return response.text();
    })
    .then(function(messages) {
        // Update the chat display with the new messages
        document.querySelector('.messagesChat').innerHTML = messages;
    });
}, 1000);
