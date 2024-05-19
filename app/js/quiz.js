function displayQuiz(event, value){
    if (!event.target.tagName.toLowerCase() === 'a') {
        window.open("/app/mostraquiz.php?quiz="+value.codice, "_blank");
    }
}