let chat =document.querySelector(".right_side");
chat.style.display="none";
let chatBtn = document.querySelector('#chat');
chatBtn.onclick= function(){
    chat.style.display="flex";
}