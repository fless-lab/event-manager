document.getElementById("bouton").addEventListener("click", function(){
    document.querySelector(".popup").Style.display = "flex";
})

document.querySelector(".fa-xmark").addEventListener("click", function(){
    document.querySelector(".popup").Style.display = "none";
})