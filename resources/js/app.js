require('./bootstrap');

import 'bootstrap';

import Swal from 'sweetalert2';

import $ from 'jquery';
window.$ = window.jQuery = $;

window.Swal =Swal;

$(".swal-submit").click(function(e) {
    e.preventDefault();
    e.target.form.checkValidity();
    e.target.form.reportValidity();
    if(e.target.form.checkValidity()){
        Swal.fire({
            title: $(e.target).data().title,
            text: $(e.target).data().text,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText:"Cancel"
        }).then(function(result) {
            if (result.value) {
                e.target.form.submit();
            }
        })
    }
});