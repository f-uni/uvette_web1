const dialog = document.getElementById("dialog");
const jsCloseBtn = document.getElementById("js-close");

jsCloseBtn.onclick=(e) => {
  e.preventDefault();
  dialog.close();
};

function displayPartecipazione(value){
    dialog.showModal();

    console.log(value);
}