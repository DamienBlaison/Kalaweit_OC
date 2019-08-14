var sessionId = document.getElementById("connected").innerHTML;

var amount_donation = document.getElementById("gift-amount").value;
var cau_id = location.search;

function verif(amount_donation){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            var data = JSON.parse(this.responseText);
            var checkOpenGift = data.again;

            if (document.getElementById('gift-amount').value > checkOpenGift){
                alert('Vous ne pouvez plus donner que '+data.again+' € pour ce gibbon');
                document.getElementById("gift-amount").value = data.again;

            }

        }
    };

    let cauId = location.search;

    let url = "/www/Kalaweit/Ajax_get/gift_current_year"+cauId;

    xhttp.open("GET", url, true);
    xhttp.send();
}

document.getElementById('gift-amount').addEventListener('input', function (){verif();});

function insertTempGift(){

    var amount_temp = '&amount='+document.getElementById('gift-amount').value;
    var url_temp = '/www/Insert_gift?transaction=gift_one_shot_gibbon-'+sessionId+'-'+(location.search.replace('?cau_id=',''))+amount_temp;

    var xhr1 = new XMLHttpRequest();

    xhr1.onload = function() {

        document.getElementById('paypal-button-container').style.display='none';

        if (xhr1.readyState == 4 && xhr1.status === 200) {

            answer = JSON.parse(xhr1.responseText);

        }

        else {

            alert('L\'Enregistrement du don à échoué.  Erreur : ' + xhr1.status);
        }
    };

    xhr1.open('GET', url_temp, false); //false car besoin d'une requete synchrone pour récupérer le don_id

    xhr1.send();

    return answer.don_id

};

//setInterval(function(){verif()}, 100);

paypal.Buttons(
    {
        createOrder: function(data, actions) {

            let donId = insertTempGift();

            var amount_donation = document.getElementById("gift-amount").value;

            return actions.order.create(

                {
                    purchase_units: [{
                        reference_id : "gift_one_shot_gibbon-"+donId,
                        amount: {
                            value: amount_donation
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {

                return actions.order.capture().then(function(details) {

                    var dataString = {

                        "transaction" : details.purchase_units[0].reference_id,
                        "amount": details.purchase_units[0].amount.value,
                        "email" : details.payer["email_address"],
                        "surname" : details.payer.name["surname"],
                        "given_name" : details.payer.name["given_name"],
                        "phone" : details.payer.phone.phone_number["national_number"],
                        "payer_id" : details.payer["payer_id"]

                    };

                    var donId = dataString["transaction"].replace("gift_one_shot_gibbon-", "");

                    var xhr2 = new XMLHttpRequest();
                    var url2 = '/www/Validate_gift_gibbon?don_id='+donId;

                    xhr2.open('GET', url2);

                    xhr2.onload = function() {
                        if (xhr2.status === 200) {

                            alert('Votre paiement à bien été enregistré, votre reçu sera disponible dans votre espace personnel dès l\'encaissement du virement Paypal');

                            document.location.href='/www/Gibbon_gallery/1';

                        }
                        else {

                            alert('Un soucis est apparu lors de l\'enregistrement de votre don , erreur : ' + xhr2.status);
                        }
                    };
                    xhr2.send(dataString);

                    return fetch('__DIR__."/../paypal-transaction-complete"', {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            orderID: data.orderID
                        })
                    });
                });
            }
        }).render('#paypal-button-container');
