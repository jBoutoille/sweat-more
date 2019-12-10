var getNotif = document.getElementById("notif");

function deleteNotif(){
    if(getNotif==null){
        // nothing
    }
    else if(getNotif.classList.contains("notification")){
        getNotif.style.transition = "all 1s";
        getNotif.style.transitionDelay = "display 1s";
        getNotif.style.display = "none";
    }   
}

setTimeout(deleteNotif,5000);