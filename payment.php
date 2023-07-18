<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();
    
    require_once("./Controler/controler.class.php");

    $unControleur = new Controleur();

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $totalPrice = 0;
    foreach ($_SESSION['cart'] as $item) {
        if (isset($item['price'])) {
            $totalPrice += $item['price'];
        }
    }

    //Si le formulaire de paiement a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cc_number = $_POST['cc_number'];
        $cc_expiry_month = $_POST['cc_expiry_month'];
        $cc_expiry_year = $_POST['cc_expiry_year'];
        $cc_cvv = $_POST['cc_cvv'];

        // Vérifier si les champs sont vides
        if (empty($cc_number) || empty($cc_expiry_month) || empty($cc_expiry_year) || empty($cc_cvv)) {
            echo "Veuillez remplir tous les champs du formulaire.";
        } else {
            // Vérifier les contraintes spécifiques pour chaque type de paiement
            if (strlen($cc_number) !== 16 || !is_numeric($cc_number)) {
                echo "Numéro de carte de crédit invalide.";
            } elseif (strlen($cc_cvv) !== 3 || !is_numeric($cc_cvv)) {
                echo "CVV invalide. Veuillez entrer les 3 chiffres au dos de votre carte.";
            } else {
                // Les données de paiement sont valides
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="./Vue/CSS/CSS.css" rel="stylesheet" />
    <link href="./Vue/CSS/payment.css" rel="stylesheet" />
</head>
<body>
    <?php require_once("vue/navbar.php"); ?>

    <main>
        <h1>Payment</h1>
        <p>Total Price: $<?= $totalPrice ?></p>

        <form method="POST" action="payment.php">
            <div class="form-group">
                <label for="cc_number">Credit Card Number</label>
                <input type="text" id="cc_number" name="cc_number">
            </div>
            <div class="form-group">
                <label for="cc_expiry_month">Expiry Date (MM/YY)</label>
                <div class="expiry-selects">
                    <select id="cc_expiry_month" name="cc_expiry_month">
                        <option value="" selected disabled>Month</option>
                        <?php
                            for ($i = 1; $i <= 12; $i++) {
                                $month = ($i < 10) ? '0' . $i : $i;
                                echo "<option value='$month'>$month</option>";
                            }
                        ?>
                    </select>
                    <select id="cc_expiry_year" name="cc_expiry_year">
                        <option value="" selected disabled>Year</option>
                        <?php
                            $currentYear = date('Y');
                            for ($i = $currentYear; $i <= $currentYear + 10; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="cc_cvv">CVV</label>
                <input type="text" id="cc_cvv" name="cc_cvv">
            </div>

            <button type="submit" class="pay-now">Pay Now</button>
        </form>
    </main>

    <footer>
        <p class="footerp">
            Author: Andre Khella and Ahmed Qejiou<br>
            © 2023 - YOURMARKET
        </p>
    </footer>
</body>
</html>
