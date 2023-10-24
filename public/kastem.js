document.querySelectorAll('.modal-body').forEach(
    modal => {
        modal.addEventListener('keydown', function (e) {
            if (e.keyCode == '13' && modal.getAttribute('id') != 'not-prevent') {
                e.preventDefault();
            };
        })
    }
);

function scan(e) {
    window.location = 'scan/' + e.value;
};