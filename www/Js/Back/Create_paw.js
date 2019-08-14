function createPaw(){

    var elmt = document.getElementsByClassName("fa fa-paw");
    console.log(elmt);

    for (var i = 0; i < elmt.length; i++) {
        elmt[i].addEventListener("click", function(){document.location.href="/www/Kalaweit/asso_cause/add";});
    };

};

createPaw();
