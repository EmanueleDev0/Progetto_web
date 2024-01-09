const validation = new JustValidate("#registrazione"); //crea un'istanza dell'oggetto JustValidate, un modulo JavaScript che semplifica la validazione dei form HTML. Riporto l'id del form di registrazione

// Validazione client-side che invia messaggi di notifica

validation
    .addField("#nome", [
        {
            rule: "required",
            errorMessage: 'Il nome è richiesto.'
        }
    ])
    .addField("#cognome", [
        {
            rule: "required",
            errorMessage: 'Il cognome è richiesto.'
        }
    ])
    .addField("#email", [
        {
            rule: "required",
            errorMessage: 'Questo campo deve essere riempito.' 
        },
        {
            rule: "email",
            errorMessage: 'Inserire una email valida.'
        },
        {
            validator: (value) => () => {                                        // Controlla se una email è già in utilizzo nel DB.
                return fetch("controllo_mail.php?email=" + encodeURIComponent(value))
                       .then(function(response) {
                           return response.json();
                       })
                       .then(function(json) {
                           return json.available;
                       });
            },
            errorMessage: "L'email è già in uso."
        }
    ])
    .addField("#password", [
        {
            rule: "required",
            errorMessage: 'Questo campo deve essere riempito.'
        },
        {
            rule: "password",
            errorMessage: 'La password deve contenere almeno 8 caratteri e un numero.'
        }
    ])
    .addField("#conferma_password", [
        {
            validator: (value, fields) => {
                return value === fields["#password"].elem.value;
            },
            errorMessage: "Le password devono combaciare."
        }
    ])
    // Quando il form viene validato con successo, esegui la seguente azione
    .onSuccess((event) => {
        // Invia il form con l'id "registrazione"
        document.getElementById("registrazione").submit();
    });
