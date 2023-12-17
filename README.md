# UAS Pemrograman Web

Nama     : Dimas Saputra <br>
NIM      : 121140059 <br>
Kelas    : RA <br>
Link web : http://dimassaputra059.whf.bz/index.php <br>

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

1.1 Buatlah sebuah halaman web sederhana yang memanfaatkan JavaScript untuk melakukan manipulasi DOM.
1.2 Buatlah beberapa event untuk menghandle interaksi pada halaman web.

## Bagian 2: Server-side Programming

2.1 Implementasikan script PHP untuk mengelola data dari formulir pada Bagian 1 menggunakan variabel global seperti `$_POST` atau `$_GET`. Tampilkan hasil pengolahan data ke layar.
2.2  Buatlah sebuah objek PHP berbasis OOP yang memiliki minimal dua metode dan gunakan objek tersebut dalam skenario tertentu pada halaman web Anda.

## Bagian 3: Database Management

3.1 Buatlah sebuah tabel pada database MySQL.
3.2 Buatlah konfigurasi koneksi ke database MySQL pada file PHP. Pastikan koneksi berhasil dan dapat diakses.
3.3 Lakukan manipulasi data pada tabel database dengan menggunakan query SQL. Misalnya, tambah data, ambil data, atau update data.

## Bagian 4: State Management 

4.1  Buatlah skrip PHP yang menggunakan session untuk menyimpan dan mengelola state pengguna. Implementasikan logika yang memanfaatkan session.
4.2  Implementasikan pengelolaan state menggunakan cookie dan browser storage pada sisi client menggunakan JavaScript.

## Bagian Bonus: Hosting Aplikasi Web
1. Apa langkah-langkah yang Anda lakukan untuk meng-host aplikasi web Anda?
2. Pilih penyedia hosting web yang menurut Anda paling cocok untuk aplikasi web Anda. Berikan alasan Anda.
3. Bagaimana Anda memastikan keamanan aplikasi web yang Anda host?
4. Jelaskan konfigurasi server yang Anda terapkan untuk mendukung aplikasi web Anda.

Jawaban:
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
