    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FICHE D'IVESTIGATION ET DE DECLARATION DES EVENEMENTS INDESIRABLES</title>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                max-width: 800px;
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
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }
            .grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 15px;
            }
            label {
                display: block;
                margin-bottom: 5px;
                font-weight: 500;
            }
            input[type="text"], input[type="date"], input[type="time"], textarea, select {
                width: 100%;
                padding: 8px;
                margin-bottom: 10px;
                border: 1px solid #bdc3c7;
                border-radius: 4px;
                box-sizing: border-box;
            }
            input[type="radio"], input[type="checkbox"] {
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
    </head>
    <body>
    <h1>FICHE D'IVESTIGATION ET DE DECLARATION DES EVENEMENTS INDESIRABLES</h1>
        
    <form action="submit.php" method="post">
            <div class="section">
                <label for="date">Date de l'événement:</label>
                <input type="date" id="date" name="date">
                
                <label for="time">Heure de l'événement:</label>
                <input type="time" id="time" name="time">
                
                <label for="end_time">Fin de l'évènement:</label>
                <input type="time" id="end_time" name="end_time">
                
                <label for="professional">Professionnel pour l'intervention:</label>
                <input type="text" id="professional" name="professional">
                
                <label for="order_number">N° Ordre Registre:</label>
                <input type="text" id="order_number" name="order_number">
                
                <fieldset>
                    <legend>Formation:</legend>
                    <label><input type="checkbox" name="formation" value="DG"> DG</label>
                    <label><input type="checkbox" name="formation" value="HS"> HS</label>
                    <label><input type="checkbox" name="formation" value="HME"> HME</label>
                    <label><input type="checkbox" name="formation" value="HMSSP"> HMSSP</label>
                    <label><input type="checkbox" name="formation" value="COHII"> COHII</label>
                </fieldset>
                
                <label for="service">Service concerné par l'incident:</label>
                <input type="text" id="service" name="service">
            </div>
            
            <div class="section">
                <h2>I. Déclarant</h2>
                <label for="declarant_name">Nom - Prénom du déclarant (obligatoire):</label>
                <input type="text" id="declarant_name" name="declarant_name" required>
                
                <label for="declarant_function">Fonction:</label>
                <input type="text" id="declarant_function" name="declarant_function">
            </div>
            
            <div class="section">
                <h2>II. Personnes impliquées</h2>
                <fieldset>
                    <legend>Usager:</legend>
                    <label for="user_name">Nom:</label>
                    <input type="text" id="user_name" name="user_name">
                    
                    <label for="user_ip">IP:</label>
                    <input type="text" id="user_ip" name="user_ip">
                    
                    <label>Sexe:</label>
                    <label><input type="radio" name="user_gender" value="M"> M</label>
                    <label><input type="radio" name="user_gender" value="F"> F</label>
                    
                    <label for="user_service">Service:</label>
                    <input type="text" id="user_service" name="user_service">
                </fieldset>
                
                <fieldset>
                    <legend>Personnel:</legend>
                    <label for="staff_name">Nom et Prénom:</label>
                    <input type="text" id="staff_name" name="staff_name">
                    
                    <label for="staff_service">Service:</label>
                    <input type="text" id="staff_service" name="staff_service">
                    
                    <label for="staff_function">Fonction:</label>
                    <input type="text" id="staff_function" name="staff_function">
                </fieldset>
            </div>
            
            <div class="section">
                <h2>III. Identification du thème de l'évènement indésirable</h2>
                <div class="grid">
                    <fieldset>
                        <legend>1. SOINS ET USAGERS</legend>
                        <h3>ACTES ET SOINS:</h3>
                        <label><input type="checkbox" name="event_types[]" value="Erreur identité usager"> Erreur identité usager</label>
                        <label><input type="checkbox" name="event_types[]" value="Information médicale (erreur de diagnostic)"> Information médicale (erreur de diagnostic)</label>
                        <label><input type="checkbox" name="event_types[]" value="Problème de recueil de consentement"> Problème de recueil de consentement</label>
                        <label><input type="checkbox" name="event_types[]" value="Problème de surveillance usager"> Problème de surveillance usager</label>
                        <label><input type="checkbox" name="event_types[]" value="Découverte d'un début d'escarre"> Découverte d'un début d'escarre</label>
                        <label><input type="checkbox" name="event_types[]" value="Retrait accidentel d'un matériel invasif"> Retrait accidentel d'un matériel invasif</label>
                        <label><input type="checkbox" name="event_types[]" value="Annulation d'acte après induction anesthésique"> Annulation d'acte après induction anesthésique</label>
                        <label><input type="checkbox" name="event_types[]" value="Ré-intervention non programmée"> Ré-intervention non programmée</label>
                        <label><input type="checkbox" name="event_types[]" value="Complication des actes diagnostiques"> Complication des actes diagnostiques</label>
                        <label><input type="checkbox" name="event_types[]" value="Complication des gestes thérapeutiques"> Complication des gestes thérapeutiques</label>
                        <label><input type="checkbox" name="event_types[]" value="Anesthésie"> Anesthésie</label>
                        <label><input type="checkbox" name="event_types[]" value="Urgence"> Urgence</label>
                        <label><input type="checkbox" name="event_types[]" value="reanimation"> Réanimation</label>
                        <label><input type="checkbox" name="event_types[]" value="gyneco_obstetrique"> Gynéco-obstétrique</label>
                        <label><input type="checkbox" name="event_types[]" value="chirurgie"> Chirurgie</label>
                        <label><input type="checkbox" name="event_types[]" value="medecine"> Médecine</label>
                        <label><input type="checkbox" name="event_types[]" value="pediatrie"> Pédiatrie</label>
                        <label><input type="checkbox" name="event_types[]" value="orientation_inadaptee"> Orientation usager inadaptée</label>
                        <label><input type="checkbox" name="event_types[]" value="medecin_indisponible"> Médecin indisponible en urgence</label>
                        <label><input type="checkbox" name="event_types[]" value="protocole_non_conforme"> Protocole non conforme, obsolète</label>
                        
                        <h3>RISQUE INFECTIEUX:</h3>
                        <label><input type="checkbox" name="event_types[]" value="situation_epidemique"> Situation épidémique</label>
                        <label><input type="checkbox" name="event_types[]" value="malade_contagieux_non_isole"> Malade contagieux à germe résistant non isolé</label>
                        <label><input type="checkbox" name="event_types[]" value="malade_contagieux_non_signale"> Malade contagieux à germe résistant non signalé</label>
                    </fieldset>
                    
                    <fieldset>
                        <legend>MEDICAMENTS:</legend>
                        <label><input type="checkbox" name="event_types[]" value="prescription_absente"> Prescription : absente, incomplète ou d'origine inconnue</label>
                        <label><input type="checkbox" name="event_types[]" value="prescription_incomprehensible"> Prescription non compréhensible (lisibilité)</label>
                        <label><input type="checkbox" name="event_types[]" value="dispensation_erreur"> Dispensation : erreur, manque</label>
                        <label><input type="checkbox" name="event_types[]" value="medicament_perime"> Médicament périmé</label>
                        <label><input type="checkbox" name="event_types[]" value="administration_erreur"> Administration : erreur, non-respect</label>
                        <label><input type="checkbox" name="event_types[]" value="probleme_communication"> Problème de communication lors de chargement de prestataires</label>
                        <label><input type="checkbox" name="event_types[]" value="absence_renseignements"> Absence de renseignements cliniques</label>
                        <label><input type="checkbox" name="event_types[]" value="probleme_delai"> Problème de délai de prise en charge</label>
                        <label><input type="checkbox" name="event_types[]" value="irradiation_intempestive"> Irradiation intempestive</label>
                    </fieldset>
                    
                    <fieldset>
                        <legend>2. SERVICES MEDICO-TECHNIQUE</legend>
                        <h3>MATERIELS ET DISPOSITIFS MEDICAUX:</h3>
                        <label><input type="checkbox" name="event_types[]" value="materiel_non_adapte"> Matériel non adapté ou dangereux</label>
                        <label><input type="checkbox" name="event_types[]" value="defaut_prise_en_charge"> Défaut de prise en charge d'un dysfonctionnement</label>
                        <label><input type="checkbox" name="event_types[]" value="panne"> Panne</label>
                        <label><input type="checkbox" name="event_types[]" value="fluide_vide"> Fluide/vide</label>
                        <label><input type="checkbox" name="event_types[]" value="incendie"> Incendie</label>
                        
                        <h3>EXAMENS BIOLOGIQUES:</h3>
                        <label><input type="checkbox" name="event_types[]" value="probleme_delai_resultats"> Problèmes de délai de retour des résultats</label>
                        <label><input type="checkbox" name="event_types[]" value="groupe_sanguin_probleme"> Groupe sanguin : problème(incompatibilité)</label>
                        <label><input type="checkbox" name="event_types[]" value="examen_non_realise"> Examen : non réalisé</label>
                        
                        <h3>EXAMENS IMAGERIE MEDICALE:</h3>
                        <label><input type="checkbox" name="event_types[]" value="demande_non_conforme"> Demande non conforme / incomplète</label>
                        <label><input type="checkbox" name="event_types[]" value="absence_renseignements_cliniques"> Absence de renseignements cliniques</label>
                        <label><input type="checkbox" name="event_types[]" value="probleme_pec_irradiation"> Problème de PEC irradiation intempestive</label>
                        <label><input type="checkbox" name="event_types[]" value="resultats_errones"> Résultats éronés mauvaise qualité des clichés</label>
                    </fieldset>
                    
                    <fieldset>
                        <legend>3. ADMISSION-HOTELLERIE ET LOGISTIQUE</legend>
                        <h3>VIE HOSPITALIERE:</h3>
                        <label><input type="checkbox" name="event_types[]" value="accueil"> Accueil</label>
                        <label><input type="checkbox" name="event_types[]" value="delai_attente"> Délai d'attente excessif pour l'usager</label>
                        <label><input type="checkbox" name="event_types[]" value="lit_hospitalisation"> Lit d'hospitalisation</label>
                        <label><input type="checkbox" name="event_types[]" value="agression_violence"> Agression / violence</label>
                        <label><input type="checkbox" name="event_types[]" value="refus_soins"> Refus de soins opposé par l'usager</label>
                        <label><input type="checkbox" name="event_types[]" value="sortie_contre_avis"> Sortie contre avis médical</label>
                        <label><input type="checkbox" name="event_types[]" value="sortie_sans_avis"> Sortie sans avis médical (fugue)</label>
                        
                        <h3>PRISE EN CHARGE HOTELIERE:</h3>
                        <label><input type="checkbox" name="event_types[]" value="repas_probleme"> Repas : quantité / qualité / souhait non respecté</label>
                        
                        <h3>ACCIDENT / INCIDENT:</h3>
                        <label><input type="checkbox" name="event_types[]" value="chute"> Chute</label>
                        <label><input type="checkbox" name="event_types[]" value="blessures"> Blessures (brûlure, coupure, piqûre)</label>
                        <label><input type="checkbox" name="event_types[]" value="suicide_tentative"> Suicide ou tentative /automutilation</label>
                    </fieldset>
                    
                    <fieldset>
                        <legend>4. VOL/DISPARITION/DEGRADATION</legend>
                        <label><input type="checkbox" name="event_types[]" value="degradation_materiel"> Dégradation de matériel/vandalisme</label>
                        <label><input type="checkbox" name="event_types[]" value="inondation_incendie"> Inondation, incendie</label>
                        <label><input type="checkbox" name="event_types[]" value="vol_disparition"> Vol – Disparition – Perte (à préciser)</label>
                        
                        <h3>COMMUNICATIONS:</h3>
                        <label><input type="checkbox" name="event_types[]" value="deficience_communication"> Déficience bip, téléphone, alarme</label>
                        <label><input type="checkbox" name="event_types[]" value="probleme_informatique"> Problème informatique</label>
                        <label><input type="checkbox" name="event_types[]" value="perte_dossier"> Perte du dossier ou d'une pièce du dossier</label>
                        
                        <h3>LOGISTIQUE:</h3>
                        <label><input type="checkbox" name="event_types[]" value="defaut_approvisionnement"> Défaut d'approvisionnement</label>
                        <label><input type="checkbox" name="event_types[]" value="defaut_tri"> Défaut tri/évacuation/traitement/Elimination</label>
                        <label><input type="checkbox" name="event_types[]" value="defaut_stockage"> Défaut stockage/archivage</label>
                        <label><input type="checkbox" name="event_types[]" value="defaut_transport"> Défaut transport</label>
                    </fieldset>
                </div>
                
                <label for="other_signalements">AUTRES SIGNALEMENTS en rapport avec RH, batiment, financier, système informatique:</label>
                <textarea id="other_signalements" name="other_signalements" rows="4"></textarea>
            </div>
            
            <div class="section">
                <h2>Causes de l'incident</h2>
                <fieldset>
                    <legend>Humain:</legend>
                    <label><input type="checkbox" name="cause" value="epuisement"> épuisement</label>
                    <label><input type="checkbox" name="cause" value="manque_formation"> manque formation</label>
                    <label><input type="checkbox" name="cause" value="communication"> communication</label>
                    <label><input type="checkbox" name="cause" value="charge_travail"> charge de travail</label>
                    <label><input type="checkbox" name="cause" value="posture_travail"> posture au travail</label>
                </fieldset>
                
                <fieldset>
                    <legend>Matériel:</legend>
                    <label><input type="checkbox" name="cause" value="maintenance"> maintenance</label>
                    <label><input type="checkbox" name="cause" value="obsolescence"> obsolescence</label>
                    <label><input type="checkbox" name="cause" value="defaillance_infrastructures"> défaillance infrastructures</label>
                    <label><input type="checkbox" name="cause" value="manipulation"> manipulation</label>
                    <label><input type="checkbox" name="cause" value="normes_securite"> normes de sécurité</label>
                </fieldset>
                
                <fieldset>
                    <legend>Financier:</legend>
                    <label><input type="checkbox" name="cause" value="flux_insuffisant"> Flux insuffisant</label>
                    <label><input type="checkbox" name="cause" value="controles"> contrôles</label>
                    <label><input type="checkbox" name="cause" value="planification_budgetaire"> planification budgétaire</label>
                    <label><input type="checkbox" name="cause" value="changement_eco_reglement"> changement éco/règlement inattendus</label>
                    <label><input type="checkbox" name="cause" value="perte_revenues"> Perte de revenues</label>
                    <label><input type="checkbox" name="cause" value="non_conformite_normes"> non-conformité aux normes</label>
                </fieldset>
                
                <label for="other_cause">Autre à préciser:</label>
                <textarea id="other_cause" name="other_cause" rows="4"></textarea>
            </div>
            
            <div class="section">
                <h2>Conséquences de l'incident</h2>
                <label><input type="checkbox" name="consequence" value="deces"> Décès</label>
                <label><input type="checkbox" name="consequence" value="incapacite"> Incapacité</label>
                <label><input type="checkbox" name="consequence" value="hospitalisation"> Hospitalisation ou Prolongation</label>
                <label><input type="checkbox" name="consequence" value="intervention_medico_chirurgicale"> Besoin d'intervention médicochirurgicale</label>
                <label><input type="checkbox" name="consequence" value="financier_administratif"> Financier et Administratif</label>
                <label><input type="checkbox" name="consequence" value="social"> Social</label>
                
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
        </form></body>
    </html>