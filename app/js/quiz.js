function displayQuiz(event, value){
    console.log(event.target);
    if (event.target.tagName.toLowerCase() === 'a') {
        console.log("catch a")
        return;
    }
    window.open("/app/mostraquiz.php?quiz="+value.codice, "_blank");
}