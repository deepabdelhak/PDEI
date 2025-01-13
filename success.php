<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soumission du formulaire réussie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f2ff;
            color: #003366;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #0066cc;
        }
        .btn {
            background-color: #0066cc;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #004c99;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Declaration soumis avec succès</h1>
        <p>Merci d'avoir soumis le formulaire de déclaration d'événement.</p>
        <button class="btn" onclick="retourDeclaration()">Retour à la page de déclaration</button>
    </div>

    <script>
        function retourDeclaration() {
            // Replace 'URL_OF_DECLARATION_PAGE' with the actual URL of your declaration page
            window.location.href = 'dec.php';
        }
    </script>
</body>
</html>