<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $_SESSION['name'] = $name;
    header("Location: process.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading...</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        .spinner {
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-top: 4px solid #6366F1;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Custom Background */
        body {
            background: url('img/bg.png') no-repeat center center fixed;
            background-size: cover;
        }

        @media (max-width: 1024px) {
            body {
                background-size: contain;
            }
        }

        @media (max-width: 768px) {
            body {
                background: url('img/bg-mobile.png') no-repeat center center fixed;
                background-size: cover;
            }
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center">
    <div class="flex flex-col items-center">
        <div class="spinner mb-4"></div>
        <p class="text-white text-lg">Memproses data...</p>
    </div>
</body>

</html>