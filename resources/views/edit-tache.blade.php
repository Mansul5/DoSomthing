
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer la tache</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
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
        form {
            max-width: 600px;
            margin: auto;
            border: 5px solid #ccc;
            border-radius : 10px;
            padding: 20px;
            background-color: orange;
            color: white;

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
    
    <h1>Editer la tache</h1>
    
    <form action="{{ route('tache.update', $tache->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="title">Titre de la tache:</label>
        <input type="text" id="title" name="title" value="{{ $tache->title }}" required>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ $tache->description }}</textarea>
        <br>
        <br>
        
        <label for="completed">Tache terminée</label>
        <input type="hidden" name="completed" value="0">
        <input type="checkbox" id="completed" name="completed" value="1" {{ $tache->completed ? 'checked' : '' }}>
        <br>
        <br>
        
        <label for="due_date">Date d'échéance: </label>
        <input type="date" id="due_date" name="due_date" value="{{ $tache->due_date }}">
        <br>        
        
        <button type="submit">Mettre à jour la tache</button>
    </form>
</body>
</html>