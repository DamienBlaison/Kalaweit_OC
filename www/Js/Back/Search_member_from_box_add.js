document.getElementById('search_member').addEventListener('click', function(){ redirectionToMemberInfo() });


function redirectionToMemberInfo(){

    let id = document.getElementById('cli_id').value;

    document.location.href="/www/Kalaweit/member/get?cli_id="+id;

}
