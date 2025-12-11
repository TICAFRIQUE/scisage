# 📧 Service Email - Documentation

## Configuration dans .env

Assurez-vous que votre fichier `.env` contient les configurations suivantes :

```env
# Configuration Mail
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=no-reply@scisage.com
MAIL_FROM_NAME="${APP_NAME}"

# Configuration Queue (pour l'envoi asynchrone)
QUEUE_CONNECTION=redis
```

## Utilisation du Service EmailService

Le service `EmailService` centralise tous les envois d'emails du projet.

### 1. Injection dans un contrôleur

```php
use App\Services\EmailService;

class VotreController extends Controller
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }
}
```

### 2. Méthodes disponibles

#### Envoyer un email de contact
```php
$data = [
    'nom' => 'John Doe',
    'email' => 'john@example.com',
    'contact' => '+225 07 XX XX XX XX',
    'sujet' => 'Demande d\'information',
    'message' => 'Votre message ici'
];

$this->emailService->sendContactMail($data);
```

#### Envoyer un email de souscription catalogue
```php
$data = [
    'portfolio' => $portfolio, // Instance du modèle Portfolio
    'nom' => 'Jane Doe',
    'email' => 'jane@example.com',
    'telephone' => '+225 07 XX XX XX XX',
    'adresse' => 'Abidjan, Cocody',
    'message' => 'Message optionnel'
];

$this->emailService->sendSouscriptionMail($data);
```

#### Envoyer un email de construction personnalisée
```php
$data = [
    'nom' => 'Jean',
    'prenom' => 'Dupont',
    'email' => 'jean.dupont@example.com',
    'contact' => '+225 07 XX XX XX XX',
    'telephone' => '+225 07 XX XX XX XX',
    'ville' => 'Abidjan',
    'description_projet' => 'Description détaillée du projet',
    'budget_estime' => '50-100 millions FCFA'
];

$this->emailService->sendConstructionMail($data);
```

#### Envoyer un email immédiatement (sans queue)
```php
use App\Mail\ContactMail;

$success = $this->emailService->sendNow(
    ContactMail::class,
    $data,
    'destinataire@example.com' // Optionnel, utilise le .env par défaut
);
```

#### Envoyer à plusieurs destinataires
```php
$recipients = ['admin1@scisage.com', 'admin2@scisage.com'];

$this->emailService->sendToMultiple(
    $recipients,
    ContactMail::class,
    $data
);
```

### 3. Vérifier la configuration
```php
$config = $this->emailService->checkEmailConfig();
// Retourne un array avec tous les paramètres mail
```

## Classes Mail disponibles

### ContactMail
- **Fichier**: `app/Mail/ContactMail.php`
- **Vue**: `resources/views/emails/contact.blade.php`
- **Usage**: Formulaire de contact général

### SouscriptionMail
- **Fichier**: `app/Mail/SouscriptionMail.php`
- **Vue**: `resources/views/emails/souscription.blade.php`
- **Usage**: Demande de souscription à une maison du catalogue

### ConstructionMail
- **Fichier**: `app/Mail/ConstructionMail.php`
- **Vue**: `resources/views/emails/construction.blade.php`
- **Usage**: Demande de construction personnalisée

## Commande Artisan pour tester

```bash
# Tester la configuration email
php artisan email:test

# Envoyer un email de test à une adresse spécifique
php artisan email:test votre@email.com
```

## Gestion de la Queue

Les emails sont envoyés en queue par défaut pour ne pas bloquer la requête HTTP.

### Démarrer le worker de queue (développement)
```bash
php artisan queue:work
```

### Démarrer le worker de queue (production)
```bash
php artisan queue:work redis --sleep=3 --tries=3 --daemon
```

### Voir les jobs en attente
```bash
php artisan queue:listen
```

### Voir les jobs échoués
```bash
php artisan queue:failed
```

### Retry un job échoué
```bash
php artisan queue:retry all
```

## Logs

Tous les envois d'emails sont loggés dans `storage/logs/laravel.log` :

```
[INFO] Email de contact envoyé avec succès
[INFO] Email de souscription catalogue envoyé avec succès
[ERROR] Erreur lors de l'envoi de l'email de contact
```

## Troubleshooting

### Les emails ne sont pas envoyés
1. Vérifiez la configuration dans `.env`
2. Vérifiez que le worker de queue tourne : `php artisan queue:work`
3. Consultez les logs : `storage/logs/laravel.log`

### Erreur SMTP
```bash
# Tester la connexion SMTP
php artisan email:test
```

### Queue bloquée
```bash
# Nettoyer la queue
php artisan queue:flush

# Redémarrer le worker
php artisan queue:restart
```

## Environnements

### Développement (Local)
- Utiliser Mailtrap ou MailHog
- `MAIL_MAILER=smtp`
- Les emails sont interceptés, pas envoyés réellement

### Production
- Utiliser un service SMTP réel (SendGrid, Amazon SES, etc.)
- Activer les logs
- Monitorer les queues

## Exemples d'intégration

### Dans un contrôleur
```php
public function store(Request $request, EmailService $emailService)
{
    // Validation
    $validated = $request->validate([...]);
    
    // Envoyer l'email
    $emailService->sendContactMail($validated);
    
    return response()->json(['success' => true]);
}
```

### Dans un Job
```php
use App\Services\EmailService;

class SendWelcomeEmail implements ShouldQueue
{
    public function handle(EmailService $emailService)
    {
        $emailService->sendContactMail($this->data);
    }
}
```

## Support

Pour toute question, consultez :
- Les logs : `storage/logs/laravel.log`
- La documentation Laravel : https://laravel.com/docs/mail
