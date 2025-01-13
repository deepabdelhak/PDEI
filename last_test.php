<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incident Declaration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: space-between;
        }

        .section {
            border: 1px solid #000;
            padding: 10px;
            width: 33%;
            box-sizing: border-box;
        }

        .section label {
            font-weight: bold;
        }

        .section ul {
            list-style: none;
            padding: 0;
        }

        .section ul li {
            margin-bottom: 10px;
        }

        .other-info {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1>Fiche d'Investigation et de Déclaration des Événements Indésirables</h1>



    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
            color: #333;
        }

        h1 {
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: space-between;
        }

        .section {
            border: 1px solid #000;
            padding: 10px;
            width: 33%;
            box-sizing: border-box;
        }

        .section label {
            font-weight: bold;
        }

        .section ul {
            list-style: none;
            padding: 0;
        }

        .section ul li {
            margin-bottom: 10px;
        }

        .other-info {
            margin-top: 20px;
        }

        .investigation-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .investigation-form label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
            color: #0056b3;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }

        .form-row>div {
            width: 48%;
            margin-bottom: 10px;
        }

        .form-row input[type="text"],
        .form-row input[type="date"],
        .form-row input[type="time"],
        .form-row textarea {
            width: calc(100% - 10px);
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .form-row input[type="radio"],
        .form-row input[type="checkbox"] {
            margin-right: 6px;
        }

        .form-row textarea {
            resize: vertical;
        }

        .checkbox-group,
        .radio-group {
            display: flex;
            gap: 10px;
        }

        .checkbox-group label,
        .radio-group label {
            margin-bottom: 0;
            font-weight: normal;
            color: #333;
        }

        .form-row>div:last-child {
            width: 100%;
        }

        .submit-btn {
            text-align: center;
            margin-top: 20px;
        }

        .submit-btn input[type="submit"] {
            padding: 10px 20px;
            background-color: #0056b3;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-btn input[type="submit"]:hover {
            background-color: #003d80;
        }
    </style>
    </head>

    <body>


        <div class="form-row">
            <div>
                <label>Date de l'événement:</label>
                <input type="date" name="date_event">
            </div>
            <div>
                <label>Heure de l'événement:</label>
                <input type="time" name="time_event">
            </div>
            <div>
                <label>Fin de l'événement:</label>
                <input type="time" name="time_end_event">
            </div>
            <div>
                <label>Professionnel pour l'intervention:</label>
                <input type="text" name="professional_intervention">
            </div>
        </div>

        <div class="form-row">
            <div>
                <label>N° Ordre Registre:</label>
                <input type="text" name="order_register_number">
            </div>
            <div>
                <label>Service concerné par l'incident:</label>
                <input type="text" name="service_concerned">
            </div>
            <div>
                <label>Déclarant (Nom et Prénom):</label>
                <input type="text" name="declarant_name">
            </div>
            <div>
                <label>Fonction:</label>
                <input type="text" name="declarant_function">
            </div>
        </div>

        <div class="form-row">
            <div>
                <label>Usager:</label>
                <input type="text" name="usager">
            </div>
            <div>
                <label>IP:</label>
                <input type="text" name="ip">
            </div>
            <div>
                <label>Sexe:</label>
                <div class="radio-group">
                    <label><input type="radio" name="sexe" value="M"> M</label>
                    <label><input type="radio" name="sexe" value="F"> F</label>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div>
                <label>Service:</label>
                <input type="text" name="service">
            </div>
            <div>
                <label>Personnel (Nom et Prénom):</label>
                <input type="text" name="personnel_name">
            </div>
            <div>
                <label>Fonction:</label>
                <input type="text" name="personnel_function">
            </div>
        </div>

        <div class="form-row">
            <div>
                <label>Formation:</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" name="formation[]" value="DG"> DG</label>
                    <label><input type="checkbox" name="formation[]" value="HS"> HS</label>
                    <label><input type="checkbox" name="formation[]" value="HME"> HME</label>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div>
                <label>Personnes impliquées:</label>
                <input type="text" name="persons_involved">
            </div>
        </div>

        <div class="form-row">
            <div>
                <label>Identification du thème de l'événement indésirable:</label>
                <textarea name="theme_event" rows="3"></textarea>
            </div>
        </div>
        <div class="container">
            <!-- Section 1: Soins et Usagers -->
            <div class="section">
                <label>1. SOINS ET USAGERS</label>
                <ul>
                    <li>
                        <strong>ACTES ET SOINS :</strong><br>
                        <input type="checkbox" name="actes_soins[]" value="Erreur identité usager"> Erreur identité
                        usager<br>
                        <input type="checkbox" name="actes_soins[]" value="Information médicale (erreur de diagnostic)">
                        Information médicale (erreur de diagnostic)<br>
                        <input type="checkbox" name="actes_soins[]" value="Problème de recueil de consentement">
                        Problème de recueil de consentement<br>
                        <input type="checkbox" name="actes_soins[]" value="Problème de surveillance usager"> Problème de
                        surveillance usager<br>
                        <input type="checkbox" name="actes_soins[]" value="Découverte d’un début d’escarre"> Découverte
                        d’un début d’escarre<br>
                        <input type="checkbox" name="actes_soins[]" value="Retrait accidentel d’un matériel invasif">
                        Retrait accidentel d’un matériel invasif<br>
                        <input type="checkbox" name="actes_soins[]"
                            value="Annulation d’acte après induction anesthésique"> Annulation d’acte après induction
                        anesthésique<br>
                        <input type="checkbox" name="actes_soins[]" value="Ré-intervention non programmée">
                        Ré-intervention non programmée<br>
                        <input type="checkbox" name="actes_soins[]" value="Complication des actes diagnostiques">
                        Complication des actes diagnostiques<br>
                        <input type="checkbox" name="actes_soins[]" value="Complication des gestes thérapeutiques">
                        Complication des gestes thérapeutiques<br>
                        <input type="checkbox" name="actes_soins[]" value="Anesthésie"> Anesthésie<br>
                        <input type="checkbox" name="actes_soins[]" value="Urgence"> Urgence<br>
                        <input type="checkbox" name="actes_soins[]" value="Réanimation"> Réanimation<br>
                        <input type="checkbox" name="actes_soins[]" value="Gynéco-obstétrique"> Gynéco-obstétrique<br>
                        <input type="checkbox" name="actes_soins[]" value="Chirurgie"> Chirurgie<br>
                        <input type="checkbox" name="actes_soins[]" value="Médecine"> Médecine<br>
                        <input type="checkbox" name="actes_soins[]" value="Pédiatrie"> Pédiatrie<br>
                        <input type="checkbox" name="actes_soins[]" value="Orientation usager inadaptée"> Orientation
                        usager inadaptée<br>
                        <input type="checkbox" name="actes_soins[]" value="Médecin indisponible en urgence"> Médecin
                        indisponible en urgence<br>
                        <input type="checkbox" name="actes_soins[]" value="Protocole non conforme, obsolète"> Protocole
                        non conforme, obsolète<br>
                    </li>
                    <li>
                        <strong>RISQUE INFECTIEUX :</strong><br>
                        <input type="checkbox" name="risque_infectieux[]" value="Situation épidémique"> Situation
                        épidémique<br>
                        <input type="checkbox" name="risque_infectieux[]"
                            value="Malade contagieux à germe résistant non isolé"> Malade contagieux à germe résistant
                        non isolé<br>
                        <input type="checkbox" name="risque_infectieux[]"
                            value="Malade contagieux à germe résistant non signalé"> Malade contagieux à germe résistant
                        non signalé<br>
                    </li>
                    <li>
                        <strong>MEDICAMENTS :</strong><br>
                        <input type="checkbox" name="medicaments[]"
                            value="Prescription absente, incomplète ou d’origine inconnue"> Prescription absente,
                        incomplète ou d’origine inconnue<br>
                        <input type="checkbox" name="medicaments[]"
                            value="Prescription non compréhensible (illisibilité)"> Prescription non compréhensible
                        (illisibilité)<br>
                        <input type="checkbox" name="medicaments[]" value="Dispensation erreur, manque"> Dispensation
                        erreur, manque<br>
                        <input type="checkbox" name="medicaments[]" value="Médicament périmé"> Médicament périmé<br>
                        <input type="checkbox" name="medicaments[]" value="Administration erreur, non-respect">
                        Administration erreur, non-respect<br>
                        <input type="checkbox" name="medicaments[]" value="Absence de renseignements cliniques"> Absence
                        de renseignements cliniques<br>
                        <input type="checkbox" name="medicaments[]" value="Irradiation intempestive"> Irradiation
                        intempestive<br>
                        <input type="checkbox" name="medicaments[]"
                            value="Problème de communication lors de chargement de prestataires"> Problème de
                        communication lors de chargement de prestataires<br>
                        <input type="checkbox" name="medicaments[]" value="Problème de délai de prise en charge">
                        Problème de délai de prise en charge<br>
                    </li>
                    <li class="other-info">
                        <label>AUTRES SIGNALEMENTS en rapport avec RH, bâtiment, financier, système
                            informatique:</label><br>
                        <textarea name="autres_signalements_1" rows="3" cols="30"></textarea>
                    </li>
                </ul>
            </div>

            <!-- Section 2: Services Medico-Technique -->
            <div class="section">
                <label>2. SERVICES MEDICO-TECHNIQUE</label>
                <ul>

                    <li>
                        <strong>MATERIELS ET DISPOSITIFS MEDICAUX :</strong><br>
                        <input type="checkbox" name="materiels[]" value="Matériel non adapté ou dangereux"> Matériel non
                        adapté ou dangereux<br>
                        <input type="checkbox" name="materiels[]"
                            value="Défaut de prise en charge d’un dysfonctionnement"> Défaut de prise en charge d’un
                        dysfonctionnement<br>
                        <input type="checkbox" name="materiels[]" value="Panne"> Panne<br>
                        <input type="checkbox" name="materiels[]" value="Fluide/vide"> Fluide/vide<br>
                        <input type="checkbox" name="materiels[]" value="Incendie"> Incendie<br>
                    </li>
                    <li>
                        <strong>EXAMENS BIOLOGIQUES :</strong><br>
                        <input type="checkbox" name="examens_biologiques[]"
                            value="Problèmes de délai de retour des résultats"> Problèmes de délai de retour des
                        résultats<br>
                        <input type="checkbox" name="examens_biologiques[]"
                            value="Groupe sanguin problème (incompatibilité)"> Groupe sanguin problème
                        (incompatibilité)<br>
                        <input type="checkbox" name="examens_biologiques[]" value="Examen non réalisé"> Examen non
                        réalisé<br>
                    </li>
                    <li>
                        <strong>EXAMENS IMAGERIE MEDICALE :</strong><br>
                        <input type="checkbox" name="examens_imagerie[]" value="Demande non conforme/incomplète">
                        Demande non conforme/incomplète<br>
                        <input type="checkbox" name="examens_imagerie[]" value="Absence de renseignements cliniques">
                        Absence de renseignements cliniques<br>
                        <input type="checkbox" name="examens_imagerie[]" value="Problème de PEC"> Problème de PEC<br>
                        <input type="checkbox" name="examens_imagerie[]" value="Irradiation intempestive"> Irradiation
                        intempestive<br>
                    </li>

                </ul>
            </div>

            <!-- Section 3: Admission-Hôtellerie et Logistique -->
            <div class="section">
                <label>3. ADMISSION-HÔTELLERIE ET LOGISTIQUE</label>
                <ul>
                    <li>
                        <strong>VIE HOSPITALIÈRE :</strong><br>
                        <input type="checkbox" name="vie_hospitaliere[]" value="Accueil"> Accueil<br>
                        <input type="checkbox" name="vie_hospitaliere[]" value="Délai d’attente excessif pour l’usager">
                        Délai d’attente excessif pour l’usager<br>
                        <input type="checkbox" name="vie_hospitaliere[]" value="Lit d’hospitalisation"> Lit
                        d’hospitalisation<br>
                        <input type="checkbox" name="vie_hospitaliere[]" value="Agression/violence">
                        Agression/violence<br>
                        <input type="checkbox" name="vie_hospitaliere[]" value="Refus de soins opposé par l’usager">
                        Refus de soins opposé par l’usager<br>
                        <input type="checkbox" name="vie_hospitaliere[]" value="Sortie contre avis médical (fugue)">
                        Sortie contre avis médical (fugue)<br>
                        <input type="checkbox" name="vie_hospitaliere[]" value="Sortie sans avis médical (fugue)">
                        Sortie sans avis médical (fugue)<br>
                    </li>
                    <li>
                        <strong>PRISE EN CHARGE HÔTELIÈRE :</strong><br>
                        <input type="checkbox" name="prise_en_charge_hotel[]"
                            value="Repas quantité/qualité/souhait non respecté"> Repas quantité/qualité/souhait non
                        respecté<br>
                    </li>
                    <li>
                        <strong>ACCIDENT/INCIDENT :</strong><br>
                        <input type="checkbox" name="accident_incident[]" value="Chute"> Chute<br>
                        <input type="checkbox" name="accident_incident[]" value="Blessures (brûlure, coupure, piqûre)">
                        Blessures (brûlure, coupure, piqûre)<br>
                        <input type="checkbox" name="accident_incident[]" value="Suicide ou tentative/automutilation">
                        Suicide ou tentative/automutilation<br>
                    </li>

                    <li>
                        <strong>VOL/DISPARITION/DÉGRADATION</strong><br>
                        <input type="checkbox" name="vol_degradation[]" value="Dégradation de matériel/vandalisme">
                        Dégradation de matériel/vandalisme<br>
                        <input type="checkbox" name="vol_degradation[]" value="Inondation, incendie"> Inondation,
                        incendie<br>
                        <input type="checkbox" name="vol_degradation[]" value="Vol – Disparition – Perte (à préciser)">
                        Vol – Disparition – Perte (à préciser)<br>
                    </li>
                    <li>
                        <strong>COMMUNICATIONS :</strong><br>
                        <input type="checkbox" name="communications[]" value="Déficience bip, téléphone, alarme">
                        Déficience bip, téléphone, alarme<br>
                        <input type="checkbox" name="communications[]" value="Problème informatique"> Problème
                        informatique<br>
                    </li>
                    <li>
                        <strong>LOGISTIQUE :</strong><br>
                        <input type="checkbox" name="logistique[]" value="Défaut d’approvisionnement"> Défaut
                        d’approvisionnement<br>
                        <input type="checkbox" name="logistique[]" value="Défaut tri/évacuation/traitement/Élimination">
                        Défaut tri/évacuation/traitement/Élimination<br>
                        <input type="checkbox" name="logistique[]" value="Défaut stockage/archivage"> Défaut
                        stockage/archivage<br>
                        <input type="checkbox" name="logistique[]" value="Défaut transport"> Défaut transport<br>
                    </li>
                </ul>
            </div>


        </div>
        <div style="text-align: center; margin-top: 20px;">
            <input type="submit" value="Submit">
        </div>
        </form>
    </body>

</html>