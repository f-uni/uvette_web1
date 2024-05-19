function displayQuiz(event, value){
    if (event.target.tagName === 'a') {
        return;
    }
    window.open("/app/mostraquiz.php?quiz="+value.codice, "_blank");
}