const dialog = document.getElementById("dialog");
const jsCloseBtn = document.getElementById("js-close");

jsCloseBtn.onclick=(e) => {
  e.preventDefault();
  dialog.close();
};

function displayPartecipazione(row){
    dialog.showModal();
    $("#input-utente").val(row.utente)
    $("#input-titolo-quiz").val(row.titolo)
    $("#input-quiz").val(row.quiz)
    
    console.log(row);
}