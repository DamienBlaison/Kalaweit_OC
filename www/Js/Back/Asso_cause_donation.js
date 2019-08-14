function go_next(target_next,nb_result){

    let current_page_next = document.getElementById('current_'+ target_next).textContent;

    let current_nb_page_next = document.getElementById('nb_'+ target_next).textContent;

    if (Number(current_page_next) < Number(current_nb_page_next)) {

        //let start_next = Number(Number(current_page_next)* Number(nb_result));
        let start_next = Number(current_page_next)+1;


        document.getElementById('current_'+target_next).textContent = Number(current_page_next) + 1;

        var    xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                document.getElementById('table_'+ target_next).innerHTML = this.responseText;

            }
        };

        let search_next = window.location.search;

        let cau_id_next = search_next.replace("?cau_id=", "");

        let url_next = '/www/Kalaweit/ajax_get/'+target_next+'?cau_id='+cau_id_next+'&p='+start_next+'&nb_by_page='+nb_result;

        xhttp.open("GET", url_next, true);

        xhttp.send();

    };

};

function go_previous(target,nb_result_by_page){

    let current_page_previous = document.getElementById('current_' + target).textContent;

    let current_nb_page_previous = document.getElementById('nb_' + target).textContent;

    if (document.getElementById('current_'+ target).textContent > 1) {

        //let start_previous = ((Number(current_page_previous) - 1) * Number(nb_result_by_page))- Number(nb_result_by_page);

        let start_previous = Number(current_page_previous) - 1;

        document.getElementById('current_'+ target).textContent = document.getElementById('current_'+ target).textContent - 1;

        var    xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                document.getElementById('table_'+ target).innerHTML = this.responseText;

            }
        };

        let search_previous = window.location.search;

        let cau_id_previous = search_previous.replace("?cau_id=", "");

        let url_previous = '/www/Kalaweit/ajax_get/'+target+'?cau_id='+cau_id_previous+'&p='+start_previous+'&nb_by_page='+ nb_result_by_page;

        xhttp.open("GET", url_previous, true);

        xhttp.send();

    };

};


document.getElementById('next_asso_cause_donation').addEventListener('click', function () {go_next("asso_cause_donation",10);});
document.getElementById('previous_asso_cause_donation').addEventListener('click', function () {go_previous("asso_cause_donation",10);});
