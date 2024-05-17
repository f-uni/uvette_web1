const dialog = document.getElementById("UDdialog");
const createDialog = document.getElementById("Cdialog");

$("#js-close").onclick=(e) => {
  e.preventDefault();
  dialog.close();
};

$("#js-close-create").onclick=(e) => {
    e.preventDefault();
    createDialog.close();
};

$("#create").onclick=(e) => {
    createDialog.showModal();
};

function displayPartecipazione(row){
    dialog.showModal();
    $("#input-utente").val(row.utente);
    $("#input-titolo-quiz").val(row.titolo);
    $("#input-quiz").val(row.quiz);
    $("#input-data").val(row.data);
    console.log(row);
}