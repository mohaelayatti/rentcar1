window.onload = () => {
    let stripe = Stripe('pk_test_51I3UI7BZ9yl42W4Pp0WURT1qNcxamp9Lr9rzJ6atYuLPaeTnZjhZtAAaLaslNIagQXgl1uVkUvVjkeWpPXT3Nu9O00g07YM2Pg')
    let elements = stripe.elements()
    let redirect = 'http://localhost/gestionVente/public/index.php/success'

    let cardHolderName = document.getElementById("cardholder-name")
    let cardButton = document.getElementById('card-button')
    let clientSecret = cardButton.dataset.secret;
    var style = {
        base: {
            iconColor: '#666EE8',
            color: '#41225F',
            lineHeight: '40px',
            fontWeight: 300,
            fontFamily: 'Helvetica Neue',
            fontSize: '16px',
            '::placeholder': {
                color: '#CFD7E0',
            },
        },
    };

    let card = elements.create('card', {
        style: style
    });

    card.mount('#card-elements')
        // on gere les errors
    card.addEventListener("change", (event) => {
        let displayError = document.getElementById("card-errors");
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = "";
        }
    });

    // on gere le paiement
    cardButton.addEventListener("click", () => {
        stripe.handleCardPayment(
            clientSecret, card, {
                payment_method_data: {
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            }
        ).thein(function(result) {
            if (result.error) {
                document.getElementById("errors").innerText = result.error.message

            } else {
                document.location.href = redirect

            }
        })
    });
}