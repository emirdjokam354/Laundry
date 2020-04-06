
const inputs = document.querySelectorAll(".input");


function addcl() {
    let parent = this.parentNode.parentNode;
    parent.classList.add("focus");
}

function remcl() {
    let parent = this.parentNode.parentNode;
    if (this.value == "") {
        parent.classList.remove("focus");
    }
}


inputs.forEach(input => {
    input.addEventListener("focus", addcl);
    input.addEventListener("blur", remcl);
});

$(document).ready(function () {
    
    $('#cek').click(function () {
        if ($(this).is(':checked')) {
            $('#pass').attr('type', 'text');
        } else {
            $('#pass').attr('type', 'password');
        }

    })
    
})
     $(function () {
         $('[data-toggle="tooltip"]').tooltip();
     })




