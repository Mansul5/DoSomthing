
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 20px;
            background: 
        radial-gradient(circle at center,rgb(170, 26, 26) 0%, #1a1a1a 100%),
        repeating-linear-gradient(
            45deg,
            transparent,
            transparent 50px,
            rgba(255,255,255,0.02) 50px,
            rgba(255,255,255,0.02) 51px
        );
        min-height: 100vh;
            color: white;
        }
        h1 {
            text-align: center;
            color: #4ade80;
            font-size: 2.5rem;
            margin-bottom: 40px;
            text-shadow: 0 0 20px rgba(74, 222, 128, 0.3);
        }
        p {
            text-align: center;
            font-size: 1.2em;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
            border: 5px solid #ccc;
            padding: 20px;
            background-color: #333;
            border-radius: 4px;
            color: white;
             backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3)
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"],
        textarea,
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            border: 2px solid red;
            background-color: white;
            color: black;

        }
        button {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Bienvenue dans votre gestionnaire de tache</h1>
    <p>Pour commencer, vous pouvez créer une nouvelle tâche <br> en remplissant le formulaire ci-dessous.</p>
    <br><br>
    
   <form action="/store" method="POST">
        @csrf
        <label for="title">Titre de la tache:</label>
        <input type="text" id="title" name="title" required>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
        <br>
        <br>
        <label for="completed">Tache terminée</label>
        <input type="hidden" name="completed" value="0">
        <input type="checkbox" id="completed" value="1" name="completed">
        <br>
        <br>
         <label for="due_date">Date d'échéance: </label>
        <input type="date" id="due_date" name="due_date">
        <br>        
        <button type="submit">Ajouter une tache</button>
    </form> 
</body>
</html>
