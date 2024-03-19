<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESERVO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    $servername = 'localhost';
    $username = 'btssio';
    $password = 'btssio';
    $conn = new PDO("mysql:host=$servername;dbname=RESERVO", $username, $password);
?>
    <header>
        <h1>RESERVO®</h1>
    </header>

    <p class="texte">Veuillez choisir quelle(es) salle(s) à réserver :</p>
    <table class="salle" style="margin:auto;">
        <tbody style="align-items: center;">
            <tr>
                <th style="vertical-align: middle;">
                    <label>
                        <input type="checkbox" name="salle" value="CentreCulturel1">
                        <figure>
                            <figcaption style="text-align:center;">Centre Culturel 1</figcaption>
                            <img width="250px" height="250px" src="images/centreculturel1.webp" alt="CentreCulturel1">
                        </figure>
                    </label>
                </th>
                <th style="vertical-align: middle;">
                    <label>
                        <input type="checkbox" name="salle" value="CentreCulturel2">
                        <figure>
                            <figcaption style="text-align:center;">Centre Culturel 2</figcaption>
                            <img width="250px" height="250px" src="images/centreculturel2.jpeg" alt="CentreCulturel2">
                        </figure>
                    </label>
                </th>
                <th style="vertical-align: middle;">
                    <label>
                        <input type="checkbox" name="salle" value="Terrain">
                        <figure>
                            <figcaption style="text-align:center;">Terrain</figcaption>
                            <img width="250px" height="250px" src="images/terrain" alt="Terrain">
                        </figure>
                    </label>
                </th>
                <th style="vertical-align: middle;">
                    <label>
                        <input type="checkbox" name="salle" value="Preau">
                        <figure>
                            <figcaption style="text-align:center;">Préau</figcaption>
                            <img width="250px" height="250px" src="images/preau" alt="Preau">
                        </figure>
                    </label>
                </th>
                <th style="vertical-align: middle;">
                    <label>
                        <input type="checkbox" name="salle" value="Salle15">
                        <figure>
                            <figcaption style="text-align:center;">Salle 15</figcaption>
                            <img width="250px" height="250px" src="images/salle15.jpg" alt="Salle15">
                        </figure>
                    </label>
                </th>                
            </tr>
        </tbody>
    </table>

    <p class="texte">Quel équipement souhaitez-vous pour votre salle :</p>
    <table class="equipments">
        <thead>
            <tr>
                <th>Équipement</th>
                <th>Tarifs</th>
                <th>Quantité</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    Table
                </td>
                <td>10€</td>
                <td>
                    <input class="Quantite" type="number" name="TableQuantite" value="0" min="0" onchange="calculateTotal()">
                </td>
            </tr>
            <tr>
                <td>
                    Chaise
                </td>
                <td>5€</td>
                <td>
                    <input class="Quantite" type="number" name="ChaiseQuantite" value="0" min="0" onchange="calculateTotal()">
                </td>
            </tr>
            <tr>
                <td>
                    Matériel de sonorisation
                </td>
                <td>50€</td>
                <td>
                    <input class="Quantite" type="number" name="EquipementSonQuantite" value="0" min="0" onchange="calculateTotal()">
                </td>
            </tr>
            <tr>
                <td>
                    Chapiteau 3x3m
                </td>
                <td>100€</td>
                <td>
                    <input class="Quantite" type="number" name="Tente3x3Quantite" value="0" min="0" onchange="calculateTotal()">
                </td>
            </tr>
            <tr>
                <td>
                    Chapiteau 3x4m
                </td>
                <td>150€</td>
                <td>
                    <input class="Quantite" type="number" name="Tente3x4Quantite" value="0" min="0" onchange="calculateTotal()">
                </td>
            </tr>
            <tr>
                <td>
                    Chapiteau 3x6m
                </td>
                <td>200€</td>
                <td>
                    <input class="Quantite" type="number" name="Tente3x6Quantite" value="0" min="0" onchange="calculateTotal()">
                </td>
            </tr>
        </tbody>
    </table>

    <p class="texte">Veillez rentrer vos informations pour confirmer la réservation :</p>
    <form class="informations">
        <p>Nom : <input class="Reservation" type="text" name="Nom"></p>
        <br>
        <p>Prénom : <input class="Reservation" type="text" name="Prenom"></p>
        <br>
        <p>Email : <input class="Reservation" type="email" name="Adresse"></p>
        <br>
        <p>Numéro : <input class="Reservation" type="tel" name="Numero"></p>
        <br>
        <input class="Reserver" type="submit" id="Reserver" value="Réserver"></p>
</form>
    <footer><a href="mentions.php">Mentions Légales - ®</a></footer>
</body>
</html>

    <!--
    <h1 class="Total" id="totalPrice">Total : 0€</h1>
    <button class="Total" id="finaliserCommande" onclick="finaliserCommande()">Finaliser ma commande</button>

    <div id="recapitulatifCommande"></div>

    <script>
        function calculateTotal() {
            let totalPrice = 0;

            // Récupérer chaque input de quantité et calculer le total en fonction
            document.querySelectorAll('input[type="number"]').forEach(input => {
                const price = getPrice(input.name.replace('Quantite', ''));
                const quantity = parseInt(input.value);
                totalPrice += price * quantity;
            });

            // Mettre à jour le contenu du H1 avec le nouveau total
            document.getElementById('totalPrice').textContent = `Total : ${totalPrice}€`;
        }

        const quantityInputs = document.querySelectorAll('input[type="number"]');
        quantityInputs.forEach(input => {
            input.addEventListener('input', calculateTotal);
        });

        function getPrice(equipment) {
            switch (equipment) {
                case 'Table':
                    return 10;
                case 'Chaise':
                    return 5;
                case 'EquipementSon':
                    return 50;
                case 'Tente3x3':
                    return 100;
                case 'Tente3x4':
                    return 150;
                case 'Tente3x6':
                    return 200;
                default:
                    return 0;
            }
        }
            
            function finaliserCommande() {
                const recapitulatifDiv = document.getElementById('recapitulatifCommande');
                recapitulatifDiv.innerHTML = '';

                const sallesSelectionnees = [];
                document.querySelectorAll('input[name="salle"]:checked').forEach(input => {
                    sallesSelectionnees.push(input.value);
                });

                let totalPrice = 0; // Variable pour stocker le prix total
                let recapitulatif = "<h2>Récapitulatif de la commande :</h2>";
                recapitulatif += "<p>Salles sélectionnées : " + sallesSelectionnees.join(', ') + "</p>";
                recapitulatif += "<p>Équipements sélectionnés :</p><ul>";
                document.querySelectorAll('input[type="number"]').forEach(input => {
                    const equipmentName = input.name.replace('Quantite', '');
                    const quantity = parseInt(input.value);
                    const price = getPrice(equipmentName);
                    if (quantity > 0) {
                        recapitulatif += `<li>${equipmentName} : ${quantity} unité(s)</li>`;
                        totalPrice += price * quantity; // Ajouter le prix total de cet équipement à totalPrice
                    }
                });
                recapitulatif += "</ul>";
                recapitulatif += `<p><strong>Prix total de la commande : ${totalPrice}€</strong></p>`; // Afficher le prix total
                recapitulatifDiv.innerHTML = recapitulatif;
            }
    </script>
-->