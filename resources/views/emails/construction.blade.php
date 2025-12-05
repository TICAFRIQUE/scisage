<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle demande de construction personnalisée</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            background: linear-gradient(135deg, #4a3c1d 0%, #6d5a2e 100%);
            color: white;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            margin: -30px -30px 30px -30px;
        }
        .content {
            color: #333;
        }
        .info-box {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #d4af37;
        }
        .project-description {
            background: #fff3cd;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #ffc107;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: #666;
            font-size: 14px;
        }
        .highlight {
            color: #d4af37;
            font-weight: bold;
        }
        .priority {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin: 20px 0;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🏗️ Nouvelle Demande de Construction</h1>
            <p>Projet Personnalisé</p>
        </div>
        
        <div class="priority">
            ⚡ PROJET PERSONNALISÉ - CONTACT PRIORITAIRE
        </div>
        
        <div class="content">
            <p>Bonjour,</p>
            
            <p>Une nouvelle demande de construction personnalisée vient d'être reçue. Ce client souhaite faire construire sa maison sur mesure.</p>
            
            <div class="info-box">
                <h3 style="color: #d4af37; margin-top: 0;">👤 Informations du client :</h3>
                <p><strong>Nom complet :</strong> {{ $data['nom'] }} {{ $data['prenom'] }}</p>
                <p><strong>Email :</strong> <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></p>
                <p><strong>Contact :</strong> <a href="tel:{{ $data['contact'] }}">{{ $data['contact'] }}</a></p>
                <p><strong>Ville de construction :</strong> {{ $data['ville'] }}</p>
                @if($data['budget_estime'])
                    <p><strong>Budget estimé :</strong> 
                        @switch($data['budget_estime'])
                            @case('moins_50m')
                                Moins de 50 millions FCFA
                                @break
                            @case('50m_100m')
                                50 - 100 millions FCFA
                                @break
                            @case('100m_200m')
                                100 - 200 millions FCFA
                                @break
                            @case('200m_plus')
                                Plus de 200 millions FCFA
                                @break
                            @case('discuter')
                                À discuter
                                @break
                            @default
                                {{ $data['budget_estime'] }}
                        @endswitch
                    </p>
                @endif
            </div>
            
            <div class="project-description">
                <h3 style="color: #856404; margin-top: 0;">🏠 Description du projet :</h3>
                <div style="background: white; padding: 15px; border-radius: 5px; font-style: italic;">
                    {{ $data['description_projet'] }}
                </div>
            </div>
            
            <div class="info-box">
                <h3 style="color: #d4af37; margin-top: 0;">⚡ Actions à entreprendre :</h3>
                <ul>
                    <li><strong>Immédiatement :</strong> Contacter le client par téléphone</li>
                    <li><strong>Dans les 24h :</strong> Planifier une rencontre sur site</li>
                    <li><strong>Sous 48h :</strong> Préparer une première esquisse et estimation</li>
                    <li><strong>Suivi :</strong> Proposer un rendez-vous avec l'architecte</li>
                </ul>
            </div>
            
            <p style="background: #e3f2fd; padding: 15px; border-radius: 5px; border-left: 4px solid #2196f3;">
                <strong>💡 Note :</strong> Les projets personnalisés nécessitent un accompagnement sur mesure. 
                Assurez-vous de bien comprendre les attentes du client avant de proposer des solutions.
            </p>
        </div>
        
        <div class="footer">
            <p>Email automatique - Système de gestion SCI SAGE</p>
            <p>{{ now()->format('d/m/Y à H:i') }}</p>
        </div>
    </div>
</body>
</html>