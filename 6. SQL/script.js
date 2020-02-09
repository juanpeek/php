let card = document.getElementsByClassName("card-custom");

function selected() {
    if(this.classList.contains("cardSelected")){
        this.classList.remove("cardSelected");
    }else{
        this.classList.add("cardSelected");
    }
};

for (var i = 0; i < card.length; i++) {
    card[i].addEventListener('click', selected);
}

//Para evitar el parapadeo tras cargar el css en firefox
$(document).ready( function() {
    $(".container").css("display","block");
});