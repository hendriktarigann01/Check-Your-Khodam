const express = require("express");
const path = require("path");
const bodyParser = require("body-parser");
const session = require("express-session");
const loadingRoute = require("./loading");
const processRoute = require("./process");

const app = express();
const PORT = process.env.PORT || 3000; // Menentukan port secara dinamis

// Middleware
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// Simulasi session
app.use(
  session({
    secret: "your-secret-key",
    resave: false,
    saveUninitialized: true,
  })
);

// Default route untuk halaman utama
app.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "../public", "index.html"));
});

// Static files untuk resources (misalnya CSS, JS, gambar)
app.use(express.static(path.join(__dirname, "../public")));

// Routing
app.use("/api/loading", loadingRoute);
app.use("/respond", processRoute);

// Start server dan log port
app.listen(PORT, () => {
  console.log(`Server running on http://localhost:${PORT}`);
});

module.exports = app; // Export express app untuk digunakan oleh Vercel
