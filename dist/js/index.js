let idScene = document.querySelector('input[name=idScene]');
 let idPartie = document.querySelector('input[name=idPartie]');

if(document.querySelector(".right_side")){
     let chat =document.querySelector(".right_side");
     chat.style.display="flex";
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

 }


    let profil = document.querySelector('a[href="#mon_profil"');
    let divProfil = document.createElement('div');
    divProfil.classList.add("profil");
    let div2 = document.createElement('div');
    let h2 = document.createElement('h2');
    h2.innerHTML="Mon Profil";
    let img = document.createElement('img');
    img.classList.add("accAvatar");
    img.classList.add("avatar");
    img.src = "./dist/images/avatar.png";
    let p = document.createElement('p');
    p.classList.add("nickname");
    let div3 = document.createElement('div');
    let a = document.createElement('a');
    a.href="./?action=del_user";
    a.innerText = "Supprimer mon compte";
    divProfil.style.backgroundColor= "white";
    divProfil.style.border ="solid";
    div2.append(h2);
    div2.append(img);
    div2.append(p);
    div3.append(a);
    divProfil.append(div2);
    divProfil.append(div3);
    profil.append(divProfil);
    /*=`<div class="profil">
        <div>
            <h2>Mon Profil</h2>
            <img class="accAvatar avatar" src="./dist/images/avatar.png" alt="">
            <p class="nickname"><?= $_SESSION['login']?></p>
        </div>
        <div>
            <a href="./?action=del_user">Supprimer mon compte</a>
        </div>
    </div>`;*/
    
    divProfil.style.display = "none";
    document.querySelector('a[href="#mon_profil"]').style.position = "relative";
    document.querySelector('a[href="#mon_profil"]').addEventListener('click',()=>{
        if(divProfil.style.display == "none"){
            divProfil.style.display= "block";
            divProfil.style.position= "absolute";
        }
        else{
            divProfil.style.display = "none"
        }
});


if(document.querySelector('.chatN') && document.querySelector('.chatP')){
    let chatN = document.querySelector('.chatN');
    chatN.style.display= "none";
    let messagesN = document.querySelector('.messagesChatN');
    messagesN.style.display= "none";
    let chatP = document.querySelector('.chatP');
    let messagesP = document.querySelector('.messagesChatP');

}

function swithTab(){
    if(chatN.style.display == "none"){
        chatN.style.display= "block";
        messagesN.style.display= "block";
        chatP.style.display= "none";
        messagesP.style.display= "none";
    }else{
        chatN.style.display= "none";
        messagesN.style.display= "none";
        chatP.style.display= "block";
        messagesP.style.display= "block";
    }
}

let leftSubSides = document.querySelectorAll(".left_sub_side");
leftSubSides.forEach(leftSubSide => {
    leftSubSide.style.height = 1/leftSubSides.length * 98 + "%";
    console.log(leftSubSide.style.height);
});

if(document.querySelector('#prevScene'))
document.querySelector('#prevScene').addEventListener('click',()=>{
    getPreviousScene();
});
if(document.querySelector('#nextScene'))
document.querySelector('#nextScene').addEventListener('click',()=>{
    getNextScene();
});

document.getElementById('messagerieP').addEventListener('submit', function(e) {
    e.preventDefault();
    sendMessageP();
});
document.getElementById('messagerieN').addEventListener('submit', function(e) {
    console.log(document.getElementById('messagerieN'));
    e.preventDefault();
    sendMessageN();
});


function getPreviousScene(){
    let formData = new FormData();
    formData.set('idScene',idScene.value);
    formData.set('idPartie',idPartie.value);
    fetch('./?action=getPreviousScene',{
        method: 'POST',
        mode: "same-origin",
        credentials: "same-origin",
        body: formData,
    }).then(function(response) {
       return response.text();
    }).then(function(res){
        res=JSON.parse(res);
        console.log(res);
        document.querySelector('h1').innerHTML=res.titre;
        idScene.value=res.idscene;
        idPartie.value=res.idpartie;
    }).catch((error)=>{
        console.error('Error:',error);
    });
}

function getNextScene(){
    
    let formData = new FormData();
    formData.set('idScene',idScene.value);
    formData.set('idPartie',idPartie.value);
    fetch('./?action=getNextScene',{
        method: 'POST',
        mode: "same-origin",
        credentials: "same-origin",
        body: formData,
    }).then(function(response) {
       return response.text();
    }).then(function(res){
        console.log(res);
        res=JSON.parse(res);
        document.querySelector('h1').innerHTML=res.titre;
        idScene.value=res.idscene;
        idPartie.value=res.idpartie;
    }).catch((error)=>{
        console.error('Error:',error);
    });
}
document.querySelector('a[href="#messagesN"]').addEventListener('click',()=>{
    swithTab();
})
document.querySelector('a[href="#messagesP"]').addEventListener('click',()=>{
    swithTab();
})
// Send message function
function sendMessageP() {
    let message = document.querySelector('#messageP').value;
    let image = document.querySelector('#imageP').value;
    console.log(message);
    let data = new FormData();
    data.set('message',message );
    data.set('image',image);
    data.set('idScene',idScene.value);
    // Use the fetch() API to send a POST request to the server
    fetch('./?action=sendChatP', {
        method: 'POST',
        mode: "same-origin",
        credentials: "same-origin",
        body:data,
    })
    .then(function(response) {
        console.log(response.json);
        document.querySelector('input[name="messageP"]').value = '';
        document.querySelector('input[name="messageP"]').focus();
    }).then((res)=>{
        console.log('Success:',res);
    }).catch((error)=>{
        console.error('Error:',error);
    });
    console.log(data);
}

function sendMessageN() {
    let message = document.querySelector('#messageN').value;
    let image = document.querySelector('#imageN').value;
    console.log(message);
    let data = new FormData();
    data.set('message',message );
    data.set('image',image);
    data.set('idScene',idScene.value);
    // Use the fetch() API to send a POST request to the server
    fetch('./?action=sendChatN', {
        method: 'POST',
        mode: "same-origin",
        credentials: "same-origin",
        body:data,
    })
    .then(function(response) {
        console.log(response.json);
        document.querySelector('input[name="messageN"]').value = '';
        document.querySelector('input[name="messageN"]').focus();
    }).then((res)=>{
        console.log('Success:',res);
    }).catch((error)=>{
        console.error('Error:',error);
    });
    console.log(data);
}

// Listen for new messages
setInterval(function() {
    let idChat = new FormData();
    idChat.set('idScene',idScene.value);
    fetch('./?action=chatP',{
        method:'POST',
        body : idChat,
    })
    .then(function(response) {
        return response.text();
    })
    .then(function(messages) {
        // Update the chat display with the new messages
        document.querySelector('.messagesChatP').innerHTML = messages;
    });
}, 1000);


setInterval(function() {
    let idChat = new FormData();
    idChat.set('idScene',idScene.value);
    fetch('./?action=chatN',{
        method:'POST',
        body : idChat,
    })
    .then(function(response) {
        return response.text();
    })
    .then(function(messages) {
        // Update the chat display with the new messages
        document.querySelector('.messagesChatN').innerHTML = messages;
    });
}, 1000);
