const dialog = document.getElementById("dialog");
const jsCloseBtn = document.getElementById("js-close");

jsCloseBtn.onclick=(e) => {
  e.preventDefault();
  dialog.close();
};

function displayPartecipazione(row){
    dialog.showModal();
    $("#input-utente").val(row.nome_utente)
    console.log(row);
}