# UAS Pemrograman Web

Nama     : Dimas Saputra <br>
NIM      : 121140059 <br>
Kelas    : RA <br>
Link web : http://dimassaputra059.whf.bz/index.php

## Web Inventory Barang

Web Inventory Barang adalah sebuah aplikasi berbasis web yang dirancang untuk membantu dalam manajemen stok dan pencatatan barang di suatu organisasi. Tujuan utama dari aplikasi ini adalah memberikan pengguna alat yang efisien untuk melacak, mengelola, dan memantau persediaan barang dengan mudah.
Fitur yang tersedia yaitu:
1. Penambahan barang
2. Melihat barang yang tersedia
3. Menambah/Mengurangi stok barang
4. Mencari barang

## Cara menggunakan Web

1. Login: Pengguna harus melakukan login menggunakan akun yang telah terdaftar.
2. Buat Akun: Pengguna harus membuat akun jika belum pernah membuat akun.
3. Dashborad: Pengguna dapat melihat dan mencari barang.
4. Input Barang: Pengguna dapat menambahkan barang.
5. Stok Barang: Pengguna dapat menambahkan atau mengurangi stok barang.

## Bagian 1: Client-side Programming

1.1 Buatlah sebuah halaman web sederhana yang memanfaatkan JavaScript untuk melakukan manipulasi DOM. <br>
1.2 Buatlah beberapa event untuk menghandle interaksi pada halaman web. <br>

Jawaban: <br>
1.1 Untuk file yang mengimplementasikan manipulasi DOM terdapat pada file : inputBarang.php. <br>
1.2 Untuk event yang menghandle interaksi ada pada file : index.php, login.php, buatAkun.php, dan inputBarang.php. Untuk file index.php, login.php, dan buatAkun.php berisi event pertama untuk alert (harus login terlebih dahulu), serta untuk file inputBarang.php berisi event kedua agar bisa menginputkan lainnya agar bisa mengisi dengan text dan event ketiga agar ketika memasukkan harga dan jumlah barang hanya bisa menginputkan angka.

## Bagian 2: Server-side Programming

2.1 Implementasikan script PHP untuk mengelola data dari formulir pada Bagian 1 menggunakan variabel global seperti `$_POST` atau `$_GET`. Tampilkan hasil pengolahan data ke layar. <br>
2.2  Buatlah sebuah objek PHP berbasis OOP yang memiliki minimal dua metode dan gunakan objek tersebut dalam skenario tertentu pada halaman web Anda. <br>

Jawaban: <br>
2.1 Untuk file yang mengimplementasikan script PHP untuk metode POST yaitu : login.php, inputBarang.php, dan buatAkun.php, sedangkan untuk file yang mengimplementasikan untuk metode GET yaitu : dashboard.php. <br>
2.2 Untuk file yang menerapkan OOP pada PHP yaitu : dashboard.php, database.php, dan inventory.php.

## Bagian 3: Database Management

3.1 Buatlah sebuah tabel pada database MySQL. <br>
3.2 Buatlah konfigurasi koneksi ke database MySQL pada file PHP. Pastikan koneksi berhasil dan dapat diakses. <br>
3.3 Lakukan manipulasi data pada tabel database dengan menggunakan query SQL. Misalnya, tambah data, ambil data, atau update data. <br>

Jawaban: <br>
3.1 Untuk langkah-langkah membuat database yaitu pertama membuat database di phpmyadmin, kemudian membuat file database.sql yang berisi CREATE TABLE users dan barang, selanjutnya import database.sql ke database di phpmyadmin. <br>
3.2 Untuk konfigurasi koneksi ada pada file koneksi.php dan database.php (khusus untuk OOP), dengan berisi host, username, password, dan nama database. <br>
3.3 Untuk file yang menerapkan manipulasi data pada tabel database yaitu : untuk tambah data file inputBarang.php dan buatAkun.php, untuk ambil data file login.php, stokBarang.php, dan inventory.php, serta untuk update data file stokBarang.php. <br>

## Bagian 4: State Management 

4.1  Buatlah skrip PHP yang menggunakan session untuk menyimpan dan mengelola state pengguna. Implementasikan logika yang memanfaatkan session. <br>
4.2  Implementasikan pengelolaan state menggunakan cookie dan browser storage pada sisi client menggunakan JavaScript. <br>

Jawaban: <br>
4.1 Implementasi session digunakan pada seluruh file php kecuali untuk OOP, pada awal code dimulai session_start(); untuk memulai session, untuk masuk ke session diharuskan untuk login terlebih dahulu pada login, untuk ingin mengakhiri session maka klik tombol logout. <br>
4.2 Implementasi pengelolaan state menggunakan cookie pada file index.php, dapat dilakukan dengan menyimpan dan membaca data di cookie. Cookie adalah small piece of data yang disimpan di sisi klien (browser) dan dapat digunakan untuk menyimpan informasi seperti preferensi pengguna, data sesi, atau state aplikasi.

## Bagian Bonus: Hosting Aplikasi Web
1. Apa langkah-langkah yang Anda lakukan untuk meng-host aplikasi web Anda?
2. Pilih penyedia hosting web yang menurut Anda paling cocok untuk aplikasi web Anda. Berikan alasan Anda.
3. Bagaimana Anda memastikan keamanan aplikasi web yang Anda host?
4. Jelaskan konfigurasi server yang Anda terapkan untuk mendukung aplikasi web Anda.

Jawaban: <br>
1. Langkah-langkah untuk meng-host aplikasi web di web hosting:
   - Membuat akun pada web hosting (membuat akun dan membuat domain web).
   - Menunggu web untuk dibuat oleh web hosting.
   - Setelah web dibuat masuk ke control panel untuk setting web.
   - Membuat database dan meng-import database.sql untuk membuat 2 table yaitu users dan barang.
   - Upload semua code php, css, dan sql pada file manager, dengan nama file homepage yaitu index.php.
   - Web berhasil dibuat.

2. Web hosting yang digunakan yaitu GoogieHost, karena web hosting ini bisa digunakan secara gratis dan bisa melakukan manipulasi sql.

3. Untuk memastikan keamanan aplikasi web bisa menggunakan SSL Certificates, namun karena slot yang terbatas harus menunggu untuk mendapatkan SSLnya.

4. Untuk konfigurasi server bisa dilakukan pada web hosting, tapi karena menggunakan web hosting gratis diberikan spesifikasi server yaitu
   - Disk Space = 1000 MB
   - Bandwitch = 100 GB
   - E-mails = 2
   - FTP Account = 2
   - Databases = 1
