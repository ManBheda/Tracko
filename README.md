# Tracko — Track the Changes

**Tracko** is a PHP & MySQL web application for **real-time vehicle / truck tracking and condition monitoring**. It shows live location on a map, speed, and temperature & humidity readings, with separate dashboards for customers, drivers and personal users.

## ✨ Features

- 🗺️ **Live map tracking** with Leaflet
- 🚚 **Route requests** — request and view routes for a vehicle
- ⏱️ **Speedometer** view of current vehicle speed
- 🌡️ **Temperature & humidity monitoring** of the cargo
- 📱 **Device management** — register and view tracking devices
- 👥 **Role-based dashboards** — customer, driver and personal user
- 🔐 **Login & session-based authentication**
- 📧 **Email notifications** via PHPMailer
- 📝 Records & history view of tracked data

## 🛠️ Tech Stack

- **Backend:** PHP, MySQL (mysqli)
- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Maps:** Leaflet
- **Email:** PHPMailer

## 🚀 Getting Started (local, XAMPP/WAMP)

1. Clone the repo into your web root (e.g. `htdocs/`):
   ```bash
   git clone https://github.com/ManBheda/Tracko.git
   ```
2. Start **Apache** and **MySQL**.
3. Create a MySQL database and import your tables.
4. Update the database settings in `connection.php` (host, user, password, database name).
5. Configure SMTP settings for PHPMailer if you want email notifications.
6. Open `http://localhost/Tracko/` in your browser.

> ⚠️ Never commit real database or SMTP passwords. Keep them in a local config / `.env` file that is listed in `.gitignore`.

## 📁 Key Files

| File | Purpose |
|---|---|
| `index.php` | Landing page |
| `plogin.php`, `authentication.php` | Login & authentication |
| `cdash.php` / `pdash.php` / `driver.php` | Customer, personal & driver dashboards |
| `map.php`, `req_route.php` | Map view & route requests |
| `speed.php` | Speedometer |
| `temp_hum.php` | Temperature & humidity |
| `devices.php`, `cdevices.php` | Device management |
| `record.php`, `recordview.php` | Tracking records |
| `connection.php` | Database connection |

## 👤 Author

**Man Bheda** — Web Developer & Digital Marketing / SEO Manager
🌐 [manbheda.site](https://www.manbheda.site/) · 💼 [LinkedIn](https://www.linkedin.com/in/man-bheda) · 🐦 [@ManBheda](https://x.com/ManBheda)
