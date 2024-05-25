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

        $("#viewBtn").off("click").click((e) => {
            window.open("/app/mostrapartecipazione.php?codice=" + row.codice, "_blank");
        });

        $("#deleteBtn").off("click").click((e) => {

            if(confirm("Procedere con l'eliminazione della partecipazione "+row.codice+"?\nVerranno eliminate anche tutte le risposte della partecipazione")){
                $.ajax({
                    type: "POST",
                    url: "/app/util/deletePartecipazione.php",
                    data: {
                        "codice":row.codice
                    },
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

        $("#updateBtn").off("click").click((e) => {

            if(confirm("Procedere con l'aggiornamento della partecipazione "+row.codice+"?")){
                $.ajax({
                    type: "POST",
                    url: "/app/util/updatePartecipazione.php",
                    data: {
                        "codice":row.codice
                    },
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

function updateTitolo(inputElement, outputElement){
    $.ajax({
        type: "GET",
        url: "/app/util/getTitolo.php?codice="+$(inputElement).val(),
        success: (data) => {
            $(outputElement).val(data);
        },
        error: (data) => {
            //alert("ERRORE:\n" + data.responseText);
        }
    });
}