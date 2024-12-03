const express = require("express");
const router = express.Router();

router.post("/", (req, res) => {
  const { name } = req.body;

  if (!name) {
    return res.status(400).json({ message: "Name is required" });
  }

  // Simpan nama di session
  req.session.name = name;

  // Redirect ke endpoint /respond
  res.redirect("/respond");
});

module.exports = router;
