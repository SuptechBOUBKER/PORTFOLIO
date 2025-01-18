<?php
// Vérifie si le formulaire a été soumis
/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $nom = htmlspecialchars(trim($_POST['nom']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validation des données
    if (empty($nom) || empty($email) || empty($message)) {
        echo "Tous les champs sont obligatoires.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Adresse email invalide.";
        exit;
    }

    // Connexion à la base de données
    $servername = "localhost";
    $username = "root"; // Remplacez par votre utilisateur MySQL
    $password = ""; // Remplacez par votre mot de passe MySQL
    $dbname = "cv"; // Remplacez par le nom de votre base de données

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifie la connexion
    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    // Vérifier si l'email existe déjà dans la base de données
    $checkEmail = $conn->prepare("SELECT id FROM contacts WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $checkEmail->store_result();

    if ($checkEmail->num_rows > 0) {
        // L'email existe déjà, afficher un message d'erreur
        echo "Cet email a déjà été utilisé pour envoyer un message.";
        $checkEmail->close();
        $conn->close();
        exit;
    }

    // Préparation et exécution de la requête SQL pour insérer les nouvelles données
    $stmt = $conn->prepare("INSERT INTO contacts (nom, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nom, $email, $message);

    if ($stmt->execute()) {
        echo "Message enregistré avec succès !";
    } else {
        echo "Erreur : " . $stmt->error;
    }

    // Ferme la connexion
    $stmt->close();
    $conn->close();
} else {
    header("Location: formulaire.html"); // Redirige vers le formulaire si la méthode n'est pas POST
}*/

/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars(trim($_POST['nom']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validation des données
    if (empty($nom) || empty($email) || empty($message)) {
        echo "Tous les champs sont obligatoires.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Adresse email invalide.";
        exit;
    }

    // Connexion à la base de données
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "cv";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    // Insertion des données dans la base
    $stmt = $conn->prepare("INSERT INTO contacts (nom, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nom, $email, $message);

    if ($stmt->execute()) {
        echo "Message enregistré avec succès !";

        // Envoi de l'email
        $to = "cheyoukheboubker@gmail.com"; // Remplacez par votre adresse email
        $subject = "Nouveau message de $nom";
        $body = "Nom : $nom\nEmail : $email\n\nMessage :\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            echo "Un email a été envoyé avec les détails.";
        } else {
            echo "Erreur lors de l'envoi de l'email.";
        }
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: formulaire.html");
}*/

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$host = 'localhost';      // Adresse de votre serveur MySQL
$dbname = 'cv';     // Nom de votre base de données
$username = 'root'; // Nom d'utilisateur MySQL
$password = ''; // Mot de passe MySQL

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars(trim($_POST['nom']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (empty($nom) || empty($email) || empty($message)) {
        echo "Tous les champs sont obligatoires.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Adresse email invalide.";
        exit;
    }

    // Insertion des données dans la base de données (table contacts)
    $sql = "INSERT INTO contacts (nom, email, message) VALUES (:nom, :email, :message)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);

    try {
        $stmt->execute();
        echo "Bien :";
    } catch (PDOException $e) {
        echo "**" . $e->getMessage();
    }

    $mail = new PHPMailer(true);

    try {
        // Configuration SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'cheyoukhb@gmail.com'; 
        $mail->Password = 'qbfc qymh bqkv sshl'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Destinataires
        $mail->setFrom('cheyoukhb@gmail.com', 'Nom du site');
        $mail->addAddress('cheyoukhb@gmail.com'); 

        // Contenu
        $mail->isHTML(true);
        $mail->Subject = "Nouveau message de $nom";
        $mail->Body = "<strong>Nom :</strong> $nom<br><strong>Email :</strong> $email<br><strong>Message :</strong><br>$message";

        $mail->send();
        echo "Message envoyé avec succès !";
    } catch (Exception $e) {    
        echo "Erreur lors de l'envoi du message : {$mail->ErrorInfo}";
    }
}

?>
