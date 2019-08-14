document.getElementById("make_gift2").addEventListener("click", function(){show_gift();});
document.getElementById("make_gift").addEventListener("click", function(){show_gift2();});

function show_gift(){
    document.getElementById("block_gift").className = 'animated bounceInUp';
};

function show_gift2(){

    document.getElementById("make_gift2").scrollIntoView({behavior:'smooth'});

    setTimeout( show_gift(), 3000);

};
