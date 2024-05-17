
const dialog = $("#dialog");
const jsCloseBtn = dialog.querySelector("#js-close");

jsCloseBtn.addEventListener("click", (e) => {
  e.preventDefault();
  dialog.close();
});

function displayPartecipazione(value){
    dialog.showModal();
    
    console.log(value);
}