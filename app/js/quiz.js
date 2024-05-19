function displayQuiz(event, value){
    console.log(event.target);
    if (event.target.tagName === 'a') {
        return;
    }
    window.open("/app/mostraquiz.php?quiz="+value.codice, "_blank");
}