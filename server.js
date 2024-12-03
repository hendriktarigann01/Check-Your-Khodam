const express = require("express");
const path = require("path");
const bodyParser = require("body-parser");
const session = require("express-session");
const loadingRoute = require("./api/loading");
const processRoute = require("./api/process");

const app = express();
const PORT = 3000;

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
  res.sendFile(path.join(__dirname, "public", "index.html"));
});

// Static files untuk resources (misalnya CSS, JS, gambar)
app.use(express.static(path.join(__dirname, "public")));

// Routing
app.use("/api/loading", loadingRoute);
app.use("/respond", processRoute); // Menggunakan /respond untuk process.js

// Start server
app.listen(PORT, () => {
  console.log(`Server running on http://localhost:${PORT}`);
});
