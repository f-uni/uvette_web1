const dialog = document.getElementById("UDdialog");
const createDialog = document.getElementById("Cdialog");

$("#js-close").click((e) => {
  e.preventDefault();
  dialog.close();
});

$("#js-close-create").click((e) => {
    e.preventDefault();
    createDialog.close();
})

$("#create-btn").click((e) => {
    console.log("click")
    createDialog.showModal();
});

$("#confirmBtn").click((e)=>{
    $.ajax({
        type: "POST",
        url: "/app/util/insertPartecipazione.php",
        data: $("#insertForm").serialize(),
        success: (data)=>{
            console.log(data);
        },
        error: (data)=>{
            console.log(data);
        }
      });
});

$("#insertForm").submit((e)=>{
    e.preventDefault();
});

function displayPartecipazione(event, row){

    dialog.showModal();
    $("#input-utente").val(row.utente);
    $("#input-titolo-quiz").val(row.titolo);
    $("#input-quiz").val(row.quiz);
    $("#input-data").val(row.data);
    console.log(row);
}