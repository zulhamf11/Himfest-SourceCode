# HIMFEST Website

## Cara menjalankan dan mengedit project dari perangkat masing-masing.

1. Download dan install [XAMPP](https://www.apachefriends.org/xampp-files/8.0.3/xampp-windows-x64-8.0.3-0-VS16-installer.exe).
2. Buka XAMPP dan nyalakan apache server dan mysql.
3. Buka "localhost/phpmyadmin" di browser lalu buat database dengan nama _himfest_.
4. Download dan install [Node](https://nodejs.org/dist/v14.16.0/node-v14.16.0-x64.msi)
5. Download dan install [Git](https://git-scm.com/download/win).
6. Buka git bash lalu [clone](https://medium.com/@sarascahya/cara-clone-sebuah-repository-di-github-aa633c3260aa) project ini.
7. Setelah proses clone selesai, jalankan perintah `cd HIMFEST-Web/` pada git bash untuk masuk ke folder project.
8. Download dan install [composer](https://getcomposer.org/Composer-Setup.exe) lalu jalankan perintah `composer install && npm install && npm run dev`.
9. Jalankan perintah `cp .env.example .env` pada git bash untuk membuat file .env.
10. Jalankan perintah `php artisan migrate && php artisan db:seed && php artisan key:generate && php artisan serve` pada git bash.
11. Buka website pada "localhost:8000" di browser.
12. Untuk mengedit, download dan install [vscode](https://code.visualstudio.com/download), lalu jalankan perintah `code .` pada git bash.
