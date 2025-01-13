<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FICHE D'INVESTIGATION ET DE DECLARATION DES EVENEMENTS INDESIRABLES</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f4f8;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }

        h2 {
            color: #2980b9;
            border-bottom: 1px solid #bdc3c7;
            padding-bottom: 5px;
        }

        .section {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(30%, 1fr));
            gap: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 5px;
        }

        fieldset {
            border: 1px solid #bdc3c7;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 20px;
        }

        legend {
            font-weight: bold;
            color: #2c3e50;
            padding: 0 5px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        @media (max-width: 600px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <style>
        .compact-section {
            font-size: 12px;
            line-height: 1.2;
        }

        .compact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 8px;
        }

        .compact-section label {
            display: block;
            margin-bottom: 2px;
            font-size: 11px;
        }

        .compact-section input[type="date"],
        .compact-section input[type="time"],
        .compact-section input[type="text"],
        .compact-section select {
            width: 100%;
            padding: 3px;
            font-size: 11px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .compact-section fieldset {
            border: 1px solid #ccc;
            border-radius: 3px;
            padding: 5px;
            margin-bottom: 8px;
        }

        .compact-section legend {
            font-size: 12px;
            font-weight: bold;
            padding: 0 3px;
        }

        .compact-section .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .compact-section .checkbox-group label {
            flex: 1 0 auto;
            white-space: nowrap;
        }

        .compact-section h2 {
            font-size: 14px;
            margin: 10px 0 5px;
        }
    </style>

</head>

<body>
    <h1>FICHE D'INVESTIGATION ET DE DECLARATION DES EVENEMENTS INDESIRABLES</h1>

    <form action="./submit.php" method="post">

        <div class="compact-section">
            <div class="compact-grid">
                <div>
                    <label for="date">Date de l'événement:</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div>
                    <label for="time">Heure de l'événement:</label>
                    <input type="time" id="time" name="time" required>
                </div>
                <div>
                    <label for="end_time">Fin de l'évènement:</label>
                    <input type="time" id="end_time" name="end_time" required>
                </div>
                <!-- <div>
                    <label for="professional">Professionnel:</label>
                    <input type="text" id="professional" name="professional">
                </div>
                <div>
                    <label for="order_number">N° Ordre Registre:</label>
                    <input type="text" id="order_number" name="order_number">
                </div> -->
            </div>

            <!-- <fieldset>
                <legend>Formation:</legend>
                <div class="checkbox-group">
                    <label><input type="checkbox" name="formation[]" value="DG"> DG</label>
                    <label><input type="checkbox" name="formation[]" value="HS"> HS</label>
                    <label><input type="checkbox" name="formation[]" value="HME"> HME</label>
                    <label><input type="checkbox" name="formation[]" value="HMSSP"> HMSSP</label>
                    <label><input type="checkbox" name="formation[]" value="COHII"> COHII</label>
                </div>
            </fieldset>

            <div>
                <label for="service">Service concerné:</label>
                <input type="text" id="service" name="service">
            </div> -->

            <!-- <h2>I. Déclarant</h2>
            <div class="compact-grid">
                <div>
                    <label for="declarant_name">Nom - Prénom (obligatoire):</label>
                    <input type="text" id="declarant_name" name="declarant_name" required>
                </div>
                <div>
                    <label for="declarant_function">Fonction:</label>
                    <input type="text" id="declarant_function" name="declarant_function">
                </div>
            </div> -->

            <h2>II. Personnes impliquées</h2>
            <div>
                <label for="person_type">Type de personne impliquée:</label>
                <select id="person_type" name="person_type" onchange="toggleForms()">
                    <option value="">Sélectionnez...</option>
                    <option value="usager">Usager</option>
                    <option value="personnel">Personnel</option>
                </select>
            </div>

            <div id="usager_form" style="display:none;">
                <fieldset>
                    <legend>Usager:</legend>
                    <div class="compact-grid">
                        <div>
                            <label for="user_name">Nom:</label>
                            <input type="text" id="user_name" name="user_name">
                        </div>
                        <div>
                            <label for="user_ip">IP:</label>
                            <input type="text" id="user_ip" name="user_ip">
                        </div>
                        <div>
                            <label>Sexe:</label>
                            <div>
                                <label><input type="radio" name="user_gender" value="M"> M</label>
                                <label><input type="radio" name="user_gender" value="F"> F</label>
                            </div>
                        </div>
                        <div>
                            <label for="user_service">Service:</label>
                            <input type="text" id="user_service" name="user_service">
                        </div>
                    </div>
                </fieldset>
            </div>

            <div id="personnel_form" style="display:none;">
                <fieldset>
                    <legend>Personnel:</legend>
                    <div class="compact-grid">
                        <div>
                            <label for="staff_name">Nom et Prénom:</label>
                            <input type="text" id="staff_name" name="staff_name">
                        </div>
                        <div>
                            <label for="staff_service">Service:</label>
                            <input type="text" id="staff_service" name="staff_service">6366
                        </div>
                        <div>
                            <label for="staff_function">Fonction:</label>
                            <input type="text" id="staff_function" name="staff_function">
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>



        <div class="section">
            <h2>Identification du thème de l'évènement indésirable</h2>
            <div class="grid">
                <fieldset>
                    <legend>1. SOINS ET USAGERS</legend>
                    <h5>ACTES ET SOINS:</h5>
                    <label><input type="checkbox" name="event_types[]" value="Erreur identité usager"> Erreur identité
                        usager</label>
                    <label><input type="checkbox" name="event_types[]"
                            value="Information médicale (erreur de diagnostic)"> Information médicale (erreur de
                        diagnostic)</label>
                    <label><input type="checkbox" name="event_types[]" value="Problème de recueil de consentement">
                        Problème de recueil de consentement</label>
                    <label><input type="checkbox" name="event_types[]" value="Problème de surveillance usager"> Problème
                        de surveillance usager</label>
                    <label><input type="checkbox" name="event_types[]" value="Découverte d'un début d'escarre">
                        Découverte d'un début d'escarre</label>
                    <label><input type="checkbox" name="event_types[]" value="Retrait accidentel d'un matériel invasif">
                        Retrait accidentel d'un matériel invasif</label>
                    <label><input type="checkbox" name="event_types[]"
                            value="Annulation d'acte après induction anesthésique"> Annulation d'acte après induction
                        anesthésique</label>
                    <label><input type="checkbox" name="event_types[]" value="Ré-intervention non programmée">
                        Ré-intervention non programmée</label>
                    <label><input type="checkbox" name="event_types[]" value="Complication des actes diagnostiques">
                        Complication des actes diagnostiques</label>
                    <label><input type="checkbox" name="event_types[]" value="Complication des gestes thérapeutiques">
                        Complication des gestes thérapeutiques</label>
                    <label><input type="checkbox" name="event_types[]" value="Anesthésie"> Anesthésie</label>
                    <label><input type="checkbox" name="event_types[]" value="Urgence"> Urgence</label>
                    <label><input type="checkbox" name="event_types[]" value="Réanimation"> Réanimation</label>
                    <label><input type="checkbox" name="event_types[]" value="Gynéco-obstétrique">
                        Gynéco-obstétrique</label>
                    <label><input type="checkbox" name="event_types[]" value="Chirurgie"> Chirurgie</label>
                    <label><input type="checkbox" name="event_types[]" value="Médecine"> Médecine</label>
                    <label><input type="checkbox" name="event_types[]" value="Pédiatrie"> Pédiatrie</label>
                    <label><input type="checkbox" name="event_types[]" value="Orientation usager inadaptée"> Orientation
                        usager inadaptée</label>
                    <label><input type="checkbox" name="event_types[]" value="Médecin indisponible en urgence"> Médecin
                        indisponible en urgence</label>
                    <label><input type="checkbox" name="event_types[]" value="Protocole non
                        conforme, obsolète"> Protocole non
                        conforme, obsolète</label>

                    <h5>RISQUE INFECTIEUX:</h5>
                    <label><input type="checkbox" name="event_types[]" value="Situation épidémique"> Situation
                        épidémique</label>
                    <label><input type="checkbox" name="event_types[]"
                            value="Malade contagieux à germe résistant non isolé"> Malade contagieux à germe résistant
                        non isolé</label>
                    <label><input type="checkbox" name="event_types[]"
                            value="Malade contagieux à germe résistant non signalé"> Malade
                        contagieux à germe résistant non signalé</label>


                    <h5>MEDICAMENTS</h5>
                    <label><input type="checkbox" name="event_types[]"
                            value="Prescription : absente, incomplète ou d'origine inconnue"> Prescription :
                        absente, incomplète ou d'origine inconnue</label>
                    <label><input type="checkbox" name="event_types[]"
                            value="Prescription non compréhensible (lisibilité)">
                        Prescription non compréhensible (lisibilité)</label>
                    <label><input type="checkbox" name="event_types[]" value="Dispensation : erreur, manque">
                        Dispensation :
                        erreur, manque</label>
                    <label><input type="checkbox" name="event_types[]" value="Médicament périmé"> Médicament
                        périmé</label>
                    <label><input type="checkbox" name="event_types[]" value="Administration : erreur, non-respect">
                        Administration :
                        erreur, non-respect</label>
                    <label><input type="checkbox" name="event_types[]"
                            value="Problème de communication lors de chargement de prestataires"> Problème de
                        communication lors de chargement de prestataires</label>
                    <label><input type="checkbox" name="event_types[]" value="Absence de renseignements cliniques">
                        Absence de
                        renseignements cliniques</label>
                    <label><input type="checkbox" name="event_types[]" value="Problème de délai de prise en charge">
                        Problème de délai de
                        prise en charge</label>
                    <label><input type="checkbox" name="event_types[]" value="Irradiation intempestive"> Irradiation
                        intempestive</label>
                </fieldset>



                <fieldset>
                    <legend>2. SERVICES MEDICO-TECHNIQUE</legend>
                    <h5>MATERIELS ET DISPOSITIFS MEDICAUX:</h5>
                    <label><input type="checkbox" name="event_types[]" value="Matériel non adapté ou dangereux">
                        Matériel non adapté
                        ou dangereux</label>
                    <label><input type="checkbox" name="event_types[]"
                            value="Défaut de prise en charge d'un dysfonctionnement"> Défaut de prise
                        en charge d'un dysfonctionnement</label>
                    <label><input type="checkbox" name="event_types[]" value="panne"> Panne</label>
                    <label><input type="checkbox" name="event_types[]" value="fluide/vide"> Fluide/vide</label>
                    <label><input type="checkbox" name="event_types[]" value="incendie"> Incendie</label>

                    <h5>EXAMENS BIOLOGIQUES:</h5>
                    <label><input type="checkbox" name="event_types[]"
                            value="Problèmes de délai de retour des résultats"> Problèmes de
                        délai de retour des résultats</label>
                    <label><input type="checkbox" name="event_types[]"
                            value="Groupe sanguin : problème(incompatibilité)"> Groupe sanguin :
                        problème(incompatibilité)</label>
                    <label><input type="checkbox" name="event_types[]" value="Examen : non réalisé"> Examen : non
                        réalisé</label>

                    <h5>EXAMENS IMAGERIE MEDICALE:</h5>
                    <label><input type="checkbox" name="event_types[]" value="Demande non conforme / incomplète">
                        Demande non
                        conforme / incomplète</label>
                    <label><input type="checkbox" name="event_types[]" value="Absence de renseignements cliniques">
                        Absence
                        de renseignements cliniques</label>
                    <label><input type="checkbox" name="event_types[]" value="Problème de PEC irradiation intempestive">
                        Problème de PEC
                        irradiation intempestive</label>
                    <label><input type="checkbox" name="event_types[]"
                            value="Résultats éronés mauvaise qualité des clichés"> Résultats éronés
                        mauvaise qualité des clichés</label>
                </fieldset>

                <fieldset>
                    <legend>3. ADMISSION-HOTELLERIE ET LOGISTIQUE</legend>
                    <h5>VIE HOSPITALIERE:</h5>
                    <label><input type="checkbox" name="event_types[]" value="Accueil"> Accueil</label>
                    <label><input type="checkbox" name="event_types[]" value="Délai d'attente excessif pour l'usager">
                        Délai d'attente excessif
                        pour l'usager</label>
                    <label><input type="checkbox" name="event_types[]" value="Lit d'hospitalisation"> Lit
                        d'hospitalisation</label>
                    <label><input type="checkbox" name="event_types[]" value="agressionAgression / violence_violence">
                        Agression /
                        violence</label>
                    <label><input type="checkbox" name="event_types[]" value="Refus de soins opposé par l'usager"> Refus
                        de soins opposé par
                        l'usager</label>
                    <label><input type="checkbox" name="event_types[]" value="Sortie contre avis médical"> Sortie contre
                        avis
                        médical</label>
                    <label><input type="checkbox" name="event_types[]" value="Sortie sans avis médical (fugue)"> Sortie
                        sans avis
                        médical (fugue)</label>

                    <h5>PRISE EN CHARGE HOTELIERE:</h5>
                    <label><input type="checkbox" name="event_types[]"
                            value="Repas : quantité / qualité / souhait non respecté"> Repas : quantité /
                        qualité / souhait non respecté</label>

                    <h5>ACCIDENT / INCIDENT:</h5>
                    <label><input type="checkbox" name="event_types[]" value="chute"> Chute</label>
                    <label><input type="checkbox" name="event_types[]" value="Blessures (brûlure, coupure, piqûre)">
                        Blessures (brûlure, coupure,
                        piqûre)</label>
                    <label><input type="checkbox" name="event_types[]" value="Suicide ou tentative /automutilation">
                        Suicide ou tentative
                        /automutilation</label>


                    <h5>VOL/DISPARITION/DEGRADATION</h5>
                    <label><input type="checkbox" name="event_types[]" value="Dégradation de matériel/vandalisme">
                        Dégradation de
                        matériel/vandalisme</label>
                    <label><input type="checkbox" name="event_types[]" value="Inondation, incendie"> Inondation,
                        incendie</label>
                    <label><input type="checkbox" name="event_types[]" value="Vol – Disparition – Perte (à préciser)">
                        Vol – Disparition –
                        Perte (à préciser)</label>

                    <h5>COMMUNICATIONS:</h5>
                    <label><input type="checkbox" name="event_types[]" value="Déficience bip, téléphone, alarme">
                        Déficience bip,
                        téléphone, alarme</label>
                    <label><input type="checkbox" name="event_types[]" value="Problème informatique"> Problème
                        informatique</label>
                    <label><input type="checkbox" name="event_types[]"
                            value="Perte du dossier ou d'une pièce du dossier"> Perte du dossier ou d'une
                        pièce du dossier</label>

                    <h5>LOGISTIQUE:</h5>
                    <label><input type="checkbox" name="event_types[]" value="Défaut d'approvisionnement"> Défaut
                        d'approvisionnement</label>
                    <label><input type="checkbox" name="event_types[]"
                            value="Défaut tri/évacuation/traitement/Elimination"> Défaut
                        tri/évacuation/traitement/Elimination</label>
                    <label><input type="checkbox" name="event_types[]" value="Défaut stockage/archivage"> Défaut
                        stockage/archivage</label>
                    <label><input type="checkbox" name="event_types[]" value="Défaut transport"> Défaut
                        transport</label>
                </fieldset>


            </div>

            <label for="other_signalements">AUTRES SIGNALEMENTS en rapport avec RH, batiment, financier,
                systèmeinformatique:</label>
            <!-- HTML dropdown -->
            <!-- Keep your original dropdown but update the name attribute -->
            <!-- <div>
                <label for="">Identification du thème de l'évènement indésirable:</label>
                <select id="event_type" name="event_type" required>
                    <option value="">Sélectionnez...</option>
                    <option value="SOINS ET USAGERS">SOINS ET USAGERS</option>
                    <option value="SERVICES MEDICO-TECHNIQUE">SERVICES MEDICO-TECHNIQUE</option>
                    <option value="ADMISSION-HOTELLERIE ET LOGISTIQUE">ADMISSION-HOTELLERIE ET LOGISTIQUE</option>
                </select>
            </div> -->
            <textarea id="other_signalements" name="other_signalements" rows="4"></textarea>
        </div>

        <style>
            .causes-section {
                font-size: 12px;
                line-height: 1.2;
            }

            .causes-section h2 {
                font-size: 14px;
                margin-bottom: 10px;
            }

            .causes-container {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
            }

            .causes-fieldset {
                flex: 1;
                min-width: 200px;
                border: 1px solid #ccc;
                border-radius: 4px;
                padding: 5px;
            }

            .causes-fieldset legend {
                font-weight: bold;
                font-size: 12px;
                padding: 0 5px;
            }

            .checkbox-item {
                flex: 1 0 45%;
                white-space: nowrap;
                font-size: 11px;
            }

            .other-cause {
                width: 100%;
                margin-top: 10px;
            }

            .other-cause label {
                display: block;
                margin-bottom: 3px;
            }

            .other-cause textarea {
                width: 100%;
                height: 40px;
                padding: 3px;
                font-size: 11px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }
        </style>

        <div class="section">
            <h2>Causes de l'incident</h2>
            <div class="causes-container">
                <fieldset class="causes-fieldset">
                    <legend>Humain</legend>
                    <div class="checkbox-container">
                        <label class="checkbox-item"><input type="checkbox" name="cause[]" value="épuisement">
                            épuisement</label>
                        <label class="checkbox-item"><input type="checkbox" name="cause[]" value="manque formation">
                            manque formation</label>
                        <label class="checkbox-item"><input type="checkbox" name="cause[]" value="communication">
                            communication</label>
                        <label class="checkbox-item"><input type="checkbox" name="cause[]" value="charge de travail">
                            charge de travail</label>
                        <label class="checkbox-item"><input type="checkbox" name="cause[]" value="posture au travail">
                            posture au travail</label>
                    </div>
                </fieldset>

                <fieldset class="causes-fieldset">
                    <legend>Matériel</legend>
                    <div class="checkbox-container">
                        <label class="checkbox-item"><input type="checkbox" name="cause[]" value="maintenance">
                            maintenance</label>
                        <label class="checkbox-item"><input type="checkbox" name="cause[]" value="obsolescence">
                            obsolescence</label>
                        <label class="checkbox-item"><input type="checkbox" name="cause[]"
                                value="défaillance infrastructures"> défaillance infrastructures</label>
                        <label class="checkbox-item"><input type="checkbox" name="cause[]" value="manipulation">
                            manipulation</label>
                        <label class="checkbox-item"><input type="checkbox" name="cause[]" value="normes de sécurité">
                            normes de sécurité</label>
                    </div>
                </fieldset>

                <fieldset class="causes-fieldset">
                    <legend>Financier</legend>
                    <div class="checkbox-container">
                        <label class="checkbox-item"><input type="checkbox" name="cause[]" value="Flux insuffisant">
                            Flux insuffisant</label>
                        <label class="checkbox-item"><input type="checkbox" name="cause[]" value="contrôles">
                            contrôles</label>
                        <label class="checkbox-item"><input type="checkbox" name="cause[]"
                                value="planification budgétaire"> planification budgétaire</label>
                        <label class="checkbox-item"><input type="checkbox" name="cause[]"
                                value="changement éco/règlement"> changement éco/règlement</label>
                        <label class="checkbox-item"><input type="checkbox" name="cause[]" value="Perte de revenues">
                            Perte
                            de revenues</label>
                        <label class="checkbox-item"><input type="checkbox" name="cause[]"
                                value="non-conformité aux normes"> non-conformité aux normes</label>
                    </div>
                </fieldset>
            </div>

            <div class="other-cause">
                <label for="other_cause">Autre à préciser:</label>
                <textarea id="other_cause" name="other_cause"></textarea>
            </div>
        </div>

        <div class="section">
            <h2>Conséquences de l'incident</h2>
            <label><input type="checkbox" name="consequence[]" value="Décès"> Décès</label>
            <label><input type="checkbox" name="consequence[]" value="Incapacité"> Incapacité</label>
            <label><input type="checkbox" name="consequence[]" value="Hospitalisation ou Prolongation"> Hospitalisation
                ou Prolongation</label>
            <label><input type="checkbox" name="consequence[]" value="Besoin d'intervention médicochirurgicale"> Besoin
                d'intervention médicochirurgicale</label>
            <label><input type="checkbox" name="consequence[]" value="Financier et Administratif"> Financier et
                Administratif</label>
            <label><input type="checkbox" name="consequence[]" value="Social"> Social</label>

            <label for="other_consequence">Autre:</label>
            <textarea id="other_consequence" name="other_consequence" rows="4"></textarea>
        </div>

        <div class="section">
            <label>Déclaration d'accident:
                <input type="radio" name="declaration_accident" value="oui"> OUI
                <input type="radio" name="declaration_accident" value="non"> NON
            </label>

            <label>Dépôt de plainte:
                <input type="radio" name="depot_plainte" value="oui"> OUI
                <input type="radio" name="depot_plainte" value="non"> NON
            </label>
        </div>

        <input type="submit" value="Soumettre">
    </form>
</body>
<script>
    function toggleForms() {
        var selectedValue = document.getElementById('person_type').value;

        // Show/hide the forms
        document.getElementById('usager_form').style.display = selectedValue === 'usager' ? 'block' : 'none';
        document.getElementById('personnel_form').style.display = selectedValue === 'personnel' ? 'block' : 'none';

        // Set required fields
        document.getElementById('user_service').required = selectedValue === 'usager';
        document.getElementById('staff_service').required = selectedValue === 'personnel';
        document.getElementById('staff_function').required = selectedValue === 'personnel';
        document.getElementById('staff_name').required = selectedValue === 'personnel';
    }
</script>
</html>