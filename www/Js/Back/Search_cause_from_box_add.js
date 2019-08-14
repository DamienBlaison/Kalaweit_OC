document.getElementById('search_cause').addEventListener('click', function(){ redirectionToCauseInfo() });


function redirectionToCauseInfo(){

    let id = document.getElementById('cau_id').value;

    document.location.href="/www/Kalaweit/asso_cause/get?cau_id="+id;

}
