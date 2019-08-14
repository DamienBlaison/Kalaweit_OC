function createUser(){

    var elmt = document.getElementsByClassName("fa fa-user");
    console.log(elmt);

    for (var i = 0; i < elmt.length; i++) {
        elmt[i].addEventListener("click", function(){document.location.href="/www/Kalaweit/member/add";});
    };
};

createUser();
