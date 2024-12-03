<?php
session_start();
$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$randomKhodam = '';

if (!empty($name)) {
    $khodam = include('khodam.php');
    $hash = crc32($name);
    $index = $hash % count($khodam);
    $randomKhodam = $khodam[$index];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khodam Generator</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/9e9ad697fd.js" crossorigin="anonymous"></script>
    <style>
        .fade-in {
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
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
                background: url('img/bg-phone.png') no-repeat center center fixed;
                background-size: cover;
            }
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center">
    <div class="bg-white bg-opacity-60 p-8 rounded-lg shadow-lg max-w-md w-full fade-in">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Khodam Anda</h1>
        <p class="text-lg text-center text-gray-800">Nama: <strong><?php echo htmlspecialchars($name); ?></strong></p>
        <p class="text-lg text-center text-gray-800">Khodam: <strong><?php echo htmlspecialchars($randomKhodam); ?></strong></p>
        <div class="flex justify-center mt-6">
            <a href="index.php" class="bg-amber-500 text-white py-3 px-6 rounded-lg shadow-md hover:bg-amber-600 transition duration-300">Kembali</a>
        </div>
        <p class="text-center font-medium text-gray-700 mt-6"><a href="https://www.instagram.com/h.tarigannn_/"><i class="fa-brands fa-instagram"></i>&nbsp;h.tarigannn_</a></p>
    </div>
</body>

</html>