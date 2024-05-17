
const dialog = $("#dialog");
const jsCloseBtn = $("#js-close");

jsCloseBtn.addEventListener("click", (e) => {
  e.preventDefault();
  dialog.close();
});

function displayPartecipazione(value){
    dialog.showModal();

    console.log(value);
}