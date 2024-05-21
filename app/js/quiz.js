function displayQuiz(event, value){
    let tagA=event.target.tagName.toLowerCase() === 'a';
    if (!tagA) {
        window.open("/app/mostraquiz.php?quiz="+value.codice, "_blank");
    }
}