const db = require("./db");
const config = require("../config");
const helper = require("../helper");

async function getDriverData(license_number) {
  const rows = await db.query(
    `SELECT first_name, middle_name, last_name, email, licence_no FROM drivers_drivers WHERE driver_status = 'current' and licence_no = ?`,
    [license_number]
  );

  const data = helper.emptyOrRows(rows);

  return {
    data,
  };
}

module.exports = {
  getDriverData,
};
