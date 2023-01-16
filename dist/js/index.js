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

//let leftSide = document.querySelector(".left_side");

let leftSubSides = document.querySelectorAll(".left_sub_side");
leftSubSides.forEach(leftSubSide => {
    leftSubSide.style.height = 1/leftSubSides.length * 98 + "%";
    console.log(leftSubSide.style.height);
});
