<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message - Sci Sages</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background: linear-gradient(135deg, #3C2415 0%, #8B4513 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .email-header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
            font-size: 16px;
        }

        .email-body {
            padding: 40px 30px;
        }

        .client-info {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 30px;
            border-left: 4px solid #f6805d;
        }

        .info-row {
            display: flex;
            margin-bottom: 15px;
            align-items: center;
        }

        .info-label {
            font-weight: 600;
            color: #555;
            min-width: 120px;
            font-size: 14px;
        }

        .info-value {
            color: #333;
            font-size: 15px;
        }

        .message-section {
            background: #fff;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }

        .message-title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
            border-bottom: 2px solid #f6805d;
            padding-bottom: 8px;
        }

        .message-content {
            color: #555;
            line-height: 1.7;
            font-size: 15px;
        }

        .email-footer {
            background: #f8f9fa;
            padding: 25px 30px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }

        .footer-text {
            color: #666;
            font-size: 13px;
            margin: 0;
        }

        .highlight {
            color: #f6805d;
            font-weight: 600;
        }

        .urgent-badge {
            background: #f6805d;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>Nouveau message de contact</h1>
            <p> SCI SAGES , promoteur immobilier </p>
        </div>

        <!-- Body -->
        <div class="email-body">
            <p>Bonjour,</p>
            <p>Vous avez reçu un nouveau message de contact via votre site web. Voici les détails :</p>

            <!-- Informations client -->
            <div class="client-info">
                <div class="info-row">
                    <span class="info-label">👤 Nom :</span>
                    <span class="info-value">{{ $data['nom'] }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">✉️ Email :</span>
                    <span class="info-value">{{ $data['email'] }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">📞 Contact :</span>
                    <span class="info-value">{{ $data['contact'] }}</span>
                </div>
                @if (isset($data['sujet']) && !empty($data['sujet']))
                    <div class="info-row">
                        <span class="info-label">🎊 Sujet :</span>
                        <span class="info-value highlight">{{ $data['sujet'] }}</span>
                    </div>
                @endif
                {{-- <div class="info-row">
                    <span class="info-label">📅 Date de demande :</span>
                    <span class="info-value">{{ now()->format('d/m/Y à H:i') }}</span>
                </div> --}}
            </div>

            <!-- Message -->
            @if (isset($data['message']) && !empty($data['message']))
                <div class="message-section">
                    <div class="message-title">💬 Message du client</div>
                    <div class="message-content">{{ $data['message'] }}</div>
                </div>
            @endif

            {{-- <div class="urgent-badge">⚡ Action requise - Répondre sous 24h</div> --}}
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p class="footer-text">
                Cet email a été généré automatiquement depuis votre site web SCI SAGES.<br>
                Pensez à répondre rapidement pour maintenir votre excellent service client !
            </p>
        </div>
    </div>
</body>

</html>
