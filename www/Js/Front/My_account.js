document.getElementById('info_btn').addEventListener('click', function(){

    if(document.getElementById('info_member').style.display == 'none'){
        document.getElementById('info_member').style.display = 'flex';
        document.getElementById('info_btn').value='Réduire';
    }
    else {
        document.getElementById('info_member').style.display = 'none';
        document.getElementById('info_btn').value='Modifier';
    }

});
