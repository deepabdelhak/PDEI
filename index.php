<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adverse Event Reporting Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 800px;
        }

        .form-section {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }

        .form-section h2 {
            margin-bottom: 10px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group textarea {
            height: 120px;
        }

        .form-inline {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .form-inline .form-group {
            flex: 1;
            min-width: calc(50% - 20px);
        }

        .checkbox-group {
            margin-bottom: 15px;
        }

        .checkbox-group h3 {
            margin-bottom: 5px;
            color: #666;
            font-weight: normal;
        }

        .checkbox-group label {
            display: inline-block;
            width: 30%;
            margin-bottom: 5px;
            font-weight: normal;
        }

        .checkbox-group input {
            margin-right: 5px;
        }

        .radio-group {
            display: flex;
            align-items: center;
        }

        .radio-group label {
            margin-right: 15px;
            font-weight: normal;
        }

        button {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Fiche d’investigation et de déclaration des événements indésirables</h1>

        <form action="submit_form.php" method="POST">
            <!-- General Information -->
            <div class="form-section">
                <h2>Informations Générales</h2>
                <div class="form-inline">
                    <div class="form-group">
                        <label for="event_date">Date de l'événement:</label>
                        <input type="date" id="event_date" name="event_date" required>
                    </div>
                    <div class="form-group">
                        <label for="event_time">Heure de l'événement:</label>
                        <input type="time" id="event_time" name="event_time" required>
                    </div>
                    <div class="form-group">
                        <label for="service">Service:</label>
                        <input type="text" id="service" name="service" required>
                    </div>
                </div>
            </div>

            <!-- Declarant Information -->
            <div class="form-section">
                <h2>Déclarant</h2>
                <div class="form-inline">
                    <div class="form-group">
                        <label for="declarant_name">Nom - Prénom du déclarant:</label>
                        <input type="text" id="declarant_name" name="declarant_name" required>
                    </div>
                    <div class="form-group">
                        <label for="declarant_function">Fonction:</label>
                        <input type="text" id="declarant_function" name="declarant_function" required>
                    </div>
                </div>
            </div>

            <!-- Involved Persons -->
            <div class="form-section">
                <h2>Personnes Impliquées</h2>
                <div class="form-inline">
                    <div class="form-group">
                        <label for="usager">Usager:</label>
                        <input type="text" id="usager" name="usager">
                    </div>
                    <div class="form-group">
                        <label for="usager_ip">IP:</label>
                        <input type="text" id="usager_ip" name="usager_ip">
                    </div>
                    <div class="form-group radio-group">
                        <label>Sexe:</label>
                        <input type="radio" id="sex_male" name="sex" value="M">
                        <label for="sex_male">M</label>
                        <input type="radio" id="sex_female" name="sex" value="F">
                        <label for="sex_female">F</label>
                    </div>
                    <div class="form-group">
                        <label for="usager_service">Service:</label>
                        <input type="text" id="usager_service" name="usager_service">
                    </div>
                </div>
            </div>

            <!-- Event Identification -->
            <div class="form-section">
                <h2>Identification de l'évènement indésirable</h2>
                <div class="checkbox-group">
                    <h3>Prise en charge de l’usager</h3>
                    <label><input type="checkbox" name="event_types[]" value="Accueil de l’usager"> Accueil de
                        l’usager</label>
                    <label><input type="checkbox" name="event_types[]" value="Activités de soins"> Activités de
                        soins</label>
                    <label><input type="checkbox" name="event_types[]" value="Dossier de l’usager"> Dossier de
                        l’usager</label>
                    <label><input type="checkbox" name="event_types[]" value="Problème d’identité"> Problème
                        d’identité</label>
                    <label><input type="checkbox" name="event_types[]" value="Droits de l’usager"> Droits de
                        l’usager</label>
                    <label><input type="checkbox" name="event_types[]" value="Biens de l’usager"> Biens de
                        l’usager</label>
                    <label><input type="checkbox" name="event_types[]" value="Chute de l’usager"> Chute de
                        l’usager</label>
                    <label><input type="checkbox" name="event_types[]" value="Contention/escarre">
                        Contention/escarre</label>
                    <label><input type="checkbox" name="event_types[]" value="Conduites suicidaires"> Conduites
                        suicidaires</label>
                    <label><input type="checkbox" name="event_types[]" value="SCAM/EVASION"> SCAM/EVASION</label>
                    <label><input type="checkbox" name="event_types[]" value="Femme/enfant victime de violence">
                        Femme/enfant victime de violence</label>
                    <label><input type="checkbox" name="event_types[]" value="AVP de masse (+ 4 pers)"> AVP de masse (+
                        4 pers)</label>
                </div>

                <div class="checkbox-group">
                    <h3>Activités logistiques</h3>
                    <label><input type="checkbox" name="event_types[]" value="Circuit du médicament"> Circuit du
                        médicament</label>
                    <label><input type="checkbox" name="event_types[]" value="Linge"> Linge</label>
                    <label><input type="checkbox" name="event_types[]" value="Restaurant"> Restaurant</label>
                    <label><input type="checkbox" name="event_types[]" value="Approvisionnements">
                        Approvisionnements</label>
                    <label><input type="checkbox" name="event_types[]" value="Transport"> Transport</label>
                    <label><input type="checkbox" name="event_types[]" value="Téléphonie/Informatique/réseau">
                        Téléphonie/Informatique/réseau</label>
                    <label><input type="checkbox" name="event_types[]" value="Locaux"> Locaux</label>
                    <label><input type="checkbox" name="event_types[]" value="Perte de matériel"> Perte de
                        matériel</label>
                    <label><input type="checkbox" name="event_types[]" value="Déchets"> Déchets</label>
                </div>

                <div class="checkbox-group">
                    <h3>Sécurité des Personnels des Locaux et des Tiers</h3>
                    <label><input type="checkbox" name="event_types[]" value="Agression physique"> Agression
                        physique</label>
                    <label><input type="checkbox" name="event_types[]" value="Agression verbale"> Agression verbale
                    </label>
                    <label><input type="checkbox" name="event_types[]" value="Hygiène"> Hygiène</label>
                    <label><input type="checkbox" name="event_types[]" value="Accident d'Exposition au Sang"> Accident
                        d'Exposition au Sang</label>
                    <label><input type="checkbox" name="event_types[]" value="Contamination"> Contamination</label>
                    <label><input type="checkbox" name="event_types[]" value="Produits toxiques"> Produits
                        toxiques</label>
                    <label><input type="checkbox" name="event_types[]" value="Gestes et postures"> Gestes et
                        postures</label>
                    <label><input type="checkbox" name="event_types[]" value="Accident de travail"> Accident de
                        travail</label>
                    <label><input type="checkbox" name="event_types[]" value="Incendie"> Incendie</label>
                    <label><input type="checkbox" name="event_types[]" value="Coupures d’eau/d’électricité"> Coupures
                        d’eau/d’électricité</label>
                    <label><input type="checkbox" name="event_types[]" value="Risque lié aux locaux"> Risque lié aux
                        locaux</label>
                    <label><input type="checkbox" name="event_types[]" value="Risque lié aux équipements"> Risque lié
                        aux équipements</label>
                    <label><input type="checkbox" name="event_types[]" value="Atteinte aux biens"> Atteinte aux
                        biens</label>
                    <label><input type="checkbox" name="event_types[]"
                            value="Risques liés à l’atteinte à l’image de marque"> Risques liés à l’atteinte à l’image
                        de marque</label>
                </div>
                <div class="checkbox-group">
                    <h3>Vigilances sanitaires</h3>
                    <label><input type="checkbox" name="event_types[]" value="Maladie à déclaration obligatoire">
                        Maladie à déclaration obligatoire</label>
                    <label><input type="checkbox" name="event_types[]" value="Infection nosocomiale"> Infection
                        nosocomiale</label>
                    <label><input type="checkbox" name="event_types[]" value="Déclaration des TIAC/ intoxication">
                        Déclaration des TIAC/ intoxication</label>
                    <label><input type="checkbox" name="event_types[]" value="Effets indésirables dus aux médicaments">
                        Effets indésirables dus aux médicaments</label>
                    <label><input type="checkbox" name="event_types[]" value="Risque lié à un Dispositif Médical">
                        Risque lié à un Dispositif Médical</label>
                </div>

                <div class="form-group">
                    <label for="other_event">Autre:</label>
                    <input type="text" id="other_event" name="other_event">
                </div>

                <div class="form-group">
                    <label for="event_description">Descriptif de l’évènement indésirable:</label>
                    <textarea id="event_description" name="event_description" required></textarea>
                </div>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>