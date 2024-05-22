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
    createDialog.showModal();
});



$("#confirmBtn").click((e) => {
    $.ajax({
        type: "POST",
        url: "/app/util/insertPartecipazione.php",
        data: $("#insertForm").serialize(),
        success: (data) => {
            alert(data);
            window.location.reload();
        },
        error: (data) => {
            alert("ERRORE:\n" + data.responseText);
        }
    });
});


function displayPartecipazione(event, row) {
    let tagA = event.target.tagName.toLowerCase() === 'a';
    if (!tagA) {
        $("#input-utente").val(row.utente);
        $("#input-titolo-quiz").val(row.titolo);
        $("#input-quiz").val(row.quiz);
        $("#input-data").val(row.data);

        $("#viewBtn").click((e) => {
            window.open("/app/mostrapartecipazione.php?codice=" + row.codice, "_blank");
        });

        $("#deleteBtn").click((e) => {
            var myFormData = new FormData();
            myFormData.append('codice', row.codice);

            if(confirm("Procedere con l'eliminazione della partecipazione "+row.codice+"?\nVerranno eliminate anche tutte le risposte della partecipazione")){
                $.ajax({
                    type: "POST",
                    url: "/app/util/deletePartecipazione.php",
                    data: myFormData,
                    success: (data) => {
                        alert(data);
                        window.location.reload();
                    },
                    error: (data) => {
                        alert(data.responseText);
                    }
                });
            }
            
        });

        dialog.showModal();
    }


}