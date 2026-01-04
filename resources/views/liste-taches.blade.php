<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des taches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: radial-gradient(circle at center, #000000 0%, #1a1a1a 100%);
            min-height: 100vh;
            color: #ffffff;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #4ade80;
            font-size: 2.5rem;
            margin-bottom: 40px;
            text-shadow: 0 0 20px rgba(74, 222, 128, 0.3);
        }

        .task-list {
            list-style: none;
            padding: 0;
        }

        .task-item {
            background: rgba(64, 64, 64, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            position: relative;
        }

        .task-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
            border-color: rgba(74, 222, 128, 0.3);
        }

        .task-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .task-title {
            font-size: 1.3rem;
            color: #ffffff;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .task-description {
            color: #d1d5db;
            font-size: 1rem;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .status-completed {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }

        .status-in-progress {
            background: rgba(249, 115, 22, 0.2);
            color: #f97316;
            border: 1px solid rgba(249, 115, 22, 0.3);
        }

        .task-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .task-date {
            color: #9ca3af;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .task-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-edit {
            background: rgba(59, 130, 246, 0.2);
            color: #3b82f6;
            border: 1px solid rgba(59, 130, 246, 0.3);
        }

        .btn-edit:hover {
            background: rgba(59, 130, 246, 0.3);
            transform: translateY(-1px);
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .btn-delete:hover {
            background: rgba(239, 68, 68, 0.3);
            transform: translateY(-1px);
        }

        .empty-state {
            text-align: center;
            color: #9ca3af;
            font-size: 1.1rem;
            margin-top: 60px;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #4b5563;
        }

        /* Animation d'entrée */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .task-item {
            animation: fadeInUp 0.5s ease forwards;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 0 10px;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .task-item {
                padding: 20px;
            }
            
            .task-meta {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .task-actions {
                width: 100%;
            }
            
            .btn {
                flex: 1;
                justify-content: center;
            }
        }
    </style>
    
</head>
<body>
    
    <div class="container">
    <h1><i class="fas fa-tasks"></i> Liste des tâches</h1>
    
    @if($tache->count() > 0)
        <ul class="task-list">
            @foreach ($tache as $tache)
                <li class="task-item">
                    <div class="task-header">
                        <div>
                            <div class="task-title">{{ $tache->title }}</div>
                            <div class="task-description">{{ $tache->description }}</div>
                        </div>
                        @if ($tache->completed)
                            <span class="status-badge status-completed">
                                <i class="fas fa-check-circle"></i>
                                Terminée
                            </span>
                        @else
                            <span class="status-badge status-in-progress">
                                <i class="fas fa-clock"></i>
                                En cours
                            </span>
                        @endif
                    </div>
                    
                    <div class="task-meta">
                        <span class="task-date">
                            <i class="fas fa-calendar-alt"></i>
                            Créée le {{ $tache->created_at->format('d/m/Y à H:i') }}
                        </span>
                        <div class="task-actions">
                            <a href="{{ route('tache.edit', $tache->id) }}" class="btn btn-edit">
                                <i class="fas fa-edit"></i>
                                Éditer
                            </a>
                            <form action="{{ route('tache.destroy', $tache->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Supprimer cette tâche ?')">
                                    <i class="fas fa-trash"></i>
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <div class="empty-state">
            <i class="fas fa-clipboard-list"></i>
            <p>Aucune tâche pour le moment</p>
            <p><a href="{{ route('tache.create') }}" class="btn btn-edit">Créer votre première tâche</a></p>
        </div>
    @endif
</div>

</body>
</html>