
function check_submit(){

    if (document.getElementById('file_import').files.length == 1){
        document.getElementById('Importer').disabled = "";
    } else {
        document.getElementById('Importer').disabled = 'disabled' ;
    };

};

function majConfig(){

    let cli_id_hello_asso = document.getElementById('cli_id_hello_asso').value;

    let don_mnt = document.getElementById('config_don_mnt').value;

    let don_ts = document.getElementById('config_don_ts').value;

    let cau_id = document.getElementById('config_cau_id').value;

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            alert("Fichier de configuration de l'import Hello Asso mise à jour");

        }
    }

    var url = '/www/Kalaweit/maj_config_import/maj_config_import_hello_asso?cli_id_hello_asso='+cli_id_hello_asso+'&don_ts='+don_ts+'&don_mnt='+don_mnt+'&cau_id='+cau_id;

    console.log(url);

    xhttp.open("GET", url, true);
    xhttp.send();

};

document.getElementById('config_save').addEventListener('click', function(){majConfig()});

function loadDoc() {

  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {

    if (this.readyState == 4 && this.status == 200) {

    let response = JSON.parse(this.responseText);

    if (response.ko != ''){ document.getElementById('table_result_import_ko').innerHTML = response.ko; }
    else {
        document.getElementById('Aucun_rattachement_trouvé').innerHTML = '';
        document.getElementById('Aucun_rattachement_trouvé').className = '';
    }

    document.getElementById('table_result_import_ok').innerHTML = response.ok;

    }

  };

  xhttp.open("POST", "/www/Import_Excel/import_excel_ajax", true);
  xhttp.send();

};

setInterval(function () {
    check_submit();
    loadDoc();

}, 1000);

var statusConfig = 0;

var config = document.getElementsByClassName('config') ;

function hideConfig(){

    for(var i = 0 ; i < config.length ; i++ ){
        config[i].style.display = 'none';
    };

    statusConfig = 0;

}

function showConfig(){

    for(var i = 0 ; i < config.length ; i++ ){
        config[i].style.display = 'block';
    };

    statusConfig = 1;

}

function Config(){

    if(statusConfig == 0){showConfig()} else {hideConfig()}

}


hideConfig();

document.getElementById('config').addEventListener('click', function(){Config()});



function integrationBdd(){

    var xhttp = new XMLHttpRequest();


    xhttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {

          alert("Base de données mise à jour");

      }

  };

    console.log(arrayInsert);


    xhttp.open("POST", "/www/Import_Excel/integration_bdd", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(JSON.stringify({"data":arrayInsert}));

}

document.getElementById('import_run').addEventListener('click', function(){integrationBdd()});
