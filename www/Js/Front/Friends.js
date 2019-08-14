<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=EUR"></script>

<script>

var sessionId = document.getElementById("connected").innerHTML;

paypal.Buttons({

    createOrder: function(data, actions) {
        console.log(data);
        console.log(actions);
        var liste, texte;
        liste = document.getElementById("gift-amount");
        /*texte = liste.options[liste.selectedIndex].value;*/
        texte = liste.value;

        return actions.order.create({
            purchase_units: [{
                reference_id : "Adhesion-"+sessionId,
                amount: {
                    value: texte
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
            alert('Transaction completed by ' + details.payer.name.given_name);
            console.log(details);

            var dataString = {

                "transaction" : details.purchase_units[0].reference_id,
                "amount": details.purchase_units[0].amount.value,
                "email" : details.payer["email_address"],
                "surname" : details.payer.name["surname"],
                "given_name" : details.payer.name["given_name"],
                "phone" : details.payer.phone.phone_number["national_number"],
                "payer_id" : details.payer["payer_id"]

            };

            var data2 = 'transaction='+dataString["transaction"]+'&amount='+dataString["amount"]+'&email='+dataString["email"]+'&surname='+dataString["surname"]+'&given_name='+dataString["given_name"]+'&phone='+dataString["phone"];

            console.log(details.purchase_units[0].reference_id);
            console.log(details.payer.name["given_name"]);
            console.log(data2);

            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/www/Insert_gift?'+data2);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    alert('Votre don a bien été enregistré, votre reçu sera disponible dès que nous aurrons la confirmation du paiement.');
                }
                else {
                    alert('Nous avons rencontrez un soucis , merci de renouveler votre don utlérieurement');
                }
            };
            xhr.send(dataString);

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

</script>
