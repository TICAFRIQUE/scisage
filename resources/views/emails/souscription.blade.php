<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle demande de souscription</title>
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
            background: linear-gradient(135deg, #d4af37 0%, #f4d03f 100%);
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🏠 Nouvelle Demande de Souscription</h1>
            <p>Catalogue Maisons de Rêves</p>
        </div>
        
        <div class="content">
            <p>Bonjour,</p>
            
            <p>Une nouvelle demande de souscription vient d'être reçue via le catalogue des maisons de rêves.</p>
            
            <div class="info-box">
                <h3 style="color: #d4af37; margin-top: 0;">🏠 Maison sélectionnée :</h3>
                <p><strong>{{ $data['portfolio']->libelle }}</strong></p>
                @if($data['portfolio']->prix)
                    <p><strong>Prix :</strong> {{ number_format($data['portfolio']->prix, 0, ',', ' ') }} FCFA</p>
                @endif
                @if($data['portfolio']->type)
                    <p><strong>Type :</strong> {{ $data['portfolio']->type }}</p>
                @endif
                @if($data['portfolio']->caracteristique)
                    <p><strong>Caractéristiques :</strong> {{ $data['portfolio']->caracteristique }}</p>
                @endif
            </div>
            
            <div class="info-box">
                <h3 style="color: #d4af37; margin-top: 0;">👤 Informations du client :</h3>
                <p><strong>Nom complet :</strong> {{ $data['nom'] }}</p>
                @if(!empty($data['email']))
                    <p><strong>Email :</strong> <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></p>
                @endif
                <p><strong>Téléphone :</strong> <a href="tel:{{ $data['telephone'] }}">{{ $data['telephone'] }}</a></p>
                @if(!empty($data['adresse']))
                    <p><strong>Adresse :</strong> {{ $data['adresse'] }}</p>
                @endif
            </div>
            
            @if(!empty($data['message']))
            <div class="info-box">
                <h3 style="color: #d4af37; margin-top: 0;">💬 Message du client :</h3>
                <p style="font-style: italic;">"{{ $data['message'] }}"</p>
            </div>
            @endif
            
            <p><strong>Prochaines étapes :</strong></p>
            <ul>
                <li>Contacter le client dans les 24 heures</li>
                <li>Planifier une rencontre pour finaliser le projet</li>
                <li>Préparer un devis détaillé</li>
            </ul>
        </div>
        
        <div class="footer">
            <p>Email automatique - Système de gestion SCISAGES</p>
            <p>{{ now()->format('d/m/Y à H:i') }}</p>
        </div>
    </div>
</body>
</html>