<?php
// Sertakan file koneksi.php
require_once 'koneksi.php';

// Mulai sesi
session_start();

// Ambil data dari form login
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

// Periksa apakah username dan password telah diisi
if (empty($username) || empty($password)) {
    echo "Username dan password harus diisi!";
    exit();
}

try {
    // Buat pernyataan SQL untuk memeriksa apakah pengguna dengan username tersebut ada dalam database
    $sql = "SELECT * FROM pengguna WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    // Periksa apakah ada baris hasil dari query
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Login berhasil
            // Mulai sesi dan simpan data pengguna di sesi
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; // Menyimpan peran pengguna dalam sesi

            // Arahkan pengguna ke halaman yang sesuai berdasarkan peran
            if ($user['role'] == 1) {
                header("Location: admin_dashboard.php"); // Arahkan ke admin_dashboard.php untuk admin
            } else {
                header("Location: akun.php"); // Arahkan ke akun.php untuk pengguna biasa
            }
            exit(); // Penting untuk menghentikan eksekusi setelah mengarahkan
        } else {
            // Password salah
            echo "Password salah!";
        }
    } else {
        // Username tidak ditemukan
        echo "Username atau password salah!";
    }
} catch (PDOException $e) {
    // Tangani kesalahan koneksi database
    die("Error: " . $e->getMessage());
}
?>
