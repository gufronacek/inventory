// var editModal = document.querySelector('#editModal');
// editModal.addEventListener("show.bs.modal", (event)=>{
//     debugger
//     var button = event.relatedTarget;
//     var id = button.getAttribute('data-idBarang');
//     var inputId = editModal.querySelector('input#id_barang')

//     inputId.value = id
// })

var editModal = document.getElementById('editModal')
editModal.addEventListener('show.modal', function (event) {
    debugger
    var button = event.relatedTarget
    var id = button.getAttribute('data-id')
    var inputID = editModal.querySelector('.modal-body input#id')
    inputID.value = id
});
editModal.addEventListener('show.bs.modal', function (event) {
    debugger
    var button = event.relatedTarget
    var id = button.getAttribute('data-id')
    var inputID = editModal.querySelector('.modal-body input#id')
    inputID.value = id
});