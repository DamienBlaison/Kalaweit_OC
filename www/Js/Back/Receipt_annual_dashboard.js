function generateReceipt(){

    var xhttp = new XMLHttpRequest();

    xhttp.open("GET", "/www/Kalaweit/Receipt_annual_dashboard/run", true);
    xhttp.send();

}

document.getElementById('receipt_generator').addEventListener('click', function(){ generateReceipt();});

function majProgressReceiptGeneration(){

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            console.log(this.responseText);

            document.getElementById("Receipt_annual_generation_progress").style.width = this.responseText +'%';
            document.getElementById("Receipt_annual_generation_progress").ariaValuenow = this.responseText ;
        }
    };

    xhttp.open("GET", "/www/Kalaweit/Progress/Receipt_annual_generation_progress", true);
    xhttp.send();

}

setInterval(majProgressReceiptGeneration, 500);
