
# GOMOVE ID

Tutor nih bos.

### Clone Project
```
git clone https://github.com/Raybrilliant/client_gomoveid.git .
```
### Update Project
```
composer update
```
### Ubah .env.example
Hapus .example sehingga menjadi .env setelah itu ubah isi dari .env seperti berikut 

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gomoveid
DB_USERNAME=root
DB_PASSWORD=
```
Secara default password XAMPP adalah kosong namun jika kalian pernah mengganti password tersebut maka gunakan password yang baru.

### Jalankan server XAMPP
Jalankan XAMPP dengan menekan tombol seperti gambar dibawah 

![](https://idcloudhost.com/wp-content/uploads/2020/03/Cara-Menggunakan-XAMPP-untuk-Menjalankan-PHP-MySQL-17.png)

### Jalankan Migrate

```
php artisan migrate
```
Ketika ada pesan buat database baru ? pilih yes
### Update Project
```
php artisan key:generate
```
### Jalankan Project

```
php artisan serve
```


## !!! Attention !!!
Sampai tahap sini aplikasi sudah bisa digunakan namun belum terdapat akun admin dikarenakan admin tidak bisa mendaftar melalui web maka diperlukan cara khusus untuk mendaftarkan admin. seperti langkah dibawah

### Masuk ke PHPMyAdmin
masuk kedalam PHPMyAdmin dengan menekan tombol admin pada MySQL

![](https://skillforge.com/wp-content/uploads/2018/12/xamppadminbtn.png)

### Masuk ke menu SQL
Pilih **gomoveid** Masuk kedalam menu SQL seperti gambar berikut

*Fokus pada warna merah dan kuning*

![](https://wpengine.com/wp-content/uploads/2018/02/database_phpmyadmin_run_query-1024x302.png)

Lalu masukan kode SQL dibawah
```sql
INSERT INTO `users` (`id`, `nama`, `email`, `password`, `no_hp`, `alamat`, `role`, `created_at`, `updated_at`) VALUES ('1', 'Admin', 'admin@mail.com', '12345', '0812322121', NULL, '1', NULL, NULL);
```
Setelah itu tekan tombol **GO**

### Login
| Email | Password     |
| :-------- | :------- | 
| admin@mail.com | 12345 | 