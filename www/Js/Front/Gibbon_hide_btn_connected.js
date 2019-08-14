function hide_btn_1(){

    if (document.getElementById("donation_mnt").innerHTML >= 280){

        document.getElementById("remove_make_gift").removeChild(document.getElementById("make_gift"));
        var donationClosed = document.createElement('button');
        donationClosed.innerHTML = "Don cloturé";
        donationClosed.className = "make_gift";
        document.getElementById("remove_make_gift").appendChild(donationClosed);
    };
}

function hide_btn_2(){

    if (document.getElementById("donation_mnt").innerHTML >= 280){

        document.getElementById("remove_make_gift2").removeChild(document.getElementById("make_gift2"));
    };
}

hide_btn_1();
hide_btn_2();
