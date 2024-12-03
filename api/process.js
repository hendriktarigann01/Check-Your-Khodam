const express = require("express");
const router = express.Router();
const khodam = require("../data/khodam");

router.get("/", (req, res) => {
  const name = req.session.name || "";
  let randomKhodam = "Tidak ditemukan";

  if (name) {
    // Ambil elemen secara acak dari array khodam
    const randomIndex = Math.floor(Math.random() * khodam.length); // Ambil indeks acak
    randomKhodam = khodam[randomIndex];
  }

  res.send(`
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Khodam Generator</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body {
                background: url('/img/bg.png') no-repeat center center fixed;
                background-size: cover;
            }
        </style>
    </head>
    <body class="min-h-screen flex items-center justify-center">
        <div class="bg-white bg-opacity-60 p-8 rounded-lg shadow-lg max-w-md w-full">
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Khodam Anda</h1>
            <p class="text-lg text-center text-gray-800">Nama: <strong>${name}</strong></p>
            <p class="text-lg text-center text-gray-800">Khodam: <strong>${randomKhodam}</strong></p>
            <div class="flex justify-center mt-6">
                <a href="/" class="bg-amber-500 text-white py-3 px-6 rounded-lg shadow-md hover:bg-amber-600 transition duration-300">Kembali</a>
            </div>
        </div>
    </body>
    </html>
  `);
});

module.exports = router;
