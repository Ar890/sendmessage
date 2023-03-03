<html>

<head>
    <title>Formulaire de contact</title>
    <meta charset="utf-8">
    <style>
        form {
            width: 80%;
            margin: 0 auto;
        }
        label {
            display: inline-block;
            width: 100px;
            text-align: right;
            font-family: sans-serif;
        }

        input,
        textarea {
            display: inline-block;
            width: 100%;
            margin-bottom: 10px;
            font-family: sans-serif;
            border-radius: 0px;
            box-shadow: none;
            border: 1px solid #ccc;
            background-color: #bbb;
        }

        textarea {
            height: 150px;
        }

        input[type="submit"] {
            width: 100%;
            font-family: sans-serif;
            padding: 10px;
            border-radius: 5px;
            background-color: #333;
        }

        select {
            display: inline-block;
            width: 100%;
            margin-bottom: 10px;
            font-family: sans-serif;
            border-radius: 5px;
            box-shadow: none;
            border: 1px solid #ccc;
            background-color: #bbb;
        }

        .infos {
            background-color: #876543;
            color: #fff;
            padding: 10px;
            font-family: sans-serif;
            text-align: center;
        }
    </style>
</head>

<body>
    <form method="post">
        <p>
            <label for="sujet">Sujet :</label>
            <select name="sujet" id="sujet">
                <option value="infos">Informations</option>
                <option value="dispo">Disponibilitée</option>
                <option value="tarifs">Tarifs</option>
                <option value="visite">Visite</option>
                <option value="autre precisé en dessous">Autre (A Presciser dans le message)</option>
            </select>
        </p>
        <p>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" placeholder="Votre nom" />
        </p>
        <p>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" placeholder="Votre adresse email" />
        </p>
        <p>
            <label for="message">Message :</label>
            <textarea name="message" id="message" placeholder="Message"></textarea>
        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </form>

    <?php //traitement du formulaire
    if (!empty($_POST)) {
        $sujet = $_POST['sujet'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $destinataire = 'arthdlf@gmail.com';
        $contenu = '<html><head><title>Titre du message</title></head><body>';
        $contenu .= '<p>Bonjour, vous avez reçu un message à partir de votre site web.</p>';
        $contenu .= '<p><strong>Sujet</strong>: ' . $sujet . '</p>';
        $contenu .= '<p><strong>Nom</strong>: ' . $nom . '</p>';
        $contenu .= '<p><strong>Email</strong>: ' . $email . '</p>';
        $contenu .= '<p><strong>Message</strong>: ' . $message . '</p>';
        $contenu .= '</body></html>'; // Contenu du message de l'email (en XHTML)
        // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
        $headers = 'MIME-Version: 1.0' . "\r";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r";
        // En-têtes additionnels
        $headers .= 'To: Patricia et remi <' . $destinataire . '>' . "\r";
        $headers .= 'From: <' . $email . '>' . "\r";
        // Envoi du mail
        mail($destinataire, $sujet, $contenu, $headers); // Fonction principale qui envoi l'email
        echo '<p class="infos">Votre message a bien été envoyé.</p>';
    } else {
        echo '<p class="infos">Merci de remplir le formulaire.</p>';
    }
    ?>
</body>

</html>
