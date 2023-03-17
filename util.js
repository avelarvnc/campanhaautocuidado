function check_pass() {


    var pass = document.getElementById('senha');
    var passconfirm = document.getElementById('senhaconfirm');


    if (pass.value === passconfirm.value) 
    {
        document.getElementById('submit').disabled = false;
        document.getElementById('sysmessage').style.display = 'none';
        document.getElementById("submit").style.backgroundColor = '#D45E5E';
    } 
    else {
        document.getElementById('submit').disabled = true;
    }
}