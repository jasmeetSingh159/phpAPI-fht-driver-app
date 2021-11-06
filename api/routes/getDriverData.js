const express = require("express");
const router = express.Router();
const driverData = require("../services/getDriverData");

/* GET programming languages. */
router.get("/", async function (req, res, next) {
  try {
    res.json(await driverData.getMultiple(req.query.license_number));
  } catch (err) {
    console.error(`Error while getting programming languages `, err.message);
    next(err);
  }
});

module.exports = router;
