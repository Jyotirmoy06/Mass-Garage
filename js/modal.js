
var body = document.getElementsByTagName('body');
var modal = document.querySelector('.bg-modal');
// modal.style.height = document.body.scrollHeight + 'px';
function show_workiz() {
    
    var base_url = window.location.origin;
    // var win = window.open('https://www.massgaragedoorsexpert.com/booking.php', '_blank');
    var win = window.open(base_url+'/booking.php', '_self');
    // location.href('https://www.massgaragedoorsexpert.com/booking.php');
    console.log('show');
    if (win) {
        //Browser has allowed it to be opened
        win.focus();
    } else {
        //Browser has blocked it
        console.log('Please allow popups for this website');

        document.querySelector('.bg-modal').style.display = "flex";
        console.log('show');
        window.scrollTo(0, 0)
        modal.addEventListener('click', function (evt) {
            hide_workiz()
        });
    }
    
}



function hide_workiz() {
    console.log('hide');
    document.querySelector('.bg-modal').style.display = "none";
    modal.removeEventListener('click', function (evt) {

        hide_workiz()
    });
}



