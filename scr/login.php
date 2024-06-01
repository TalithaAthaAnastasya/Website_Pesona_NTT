<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="labuanbajo">
        <img src="nusapenida.jpg" alt="Gambar Nusa Penida">
      </div>

    <div class="container flex-container">
        <div class="form-container">

            <h4>MASUK</h4>
            <!-- Form login -->
            <form method="post" action="process_login.php" name="akun">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" name="submit">Masuk</button>
            </form>
            <div class="nothave">
            <p>Belum punya akun? <a href="register.php">Daftar</a></p>
                </div>
            
        </div>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2024 Web Oleh-Oleh. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
