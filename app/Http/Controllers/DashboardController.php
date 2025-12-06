<?php

class DashboardController {

    public function __construct()
    {
        // Jika perlu session (misal: cek login)
        // session_start();
    }

    public function index()
    {
        // Pastikan file view ada
        $viewPath = __DIR__ . '/../views/dashboard.php';

        if (!file_exists($viewPath)) {
            die("View dashboard.php tidak ditemukan pada folder views/");
        }

        // Panggil file view
        include $viewPath;
    }

}
