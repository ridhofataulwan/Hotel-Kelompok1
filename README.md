# DOKUMENTASI PROJECT

### Ex: edit controllerA.php - keterangan tambah function delete

## CRUD Items: Created - Untested

- Admin.php = nambah buat CRUD Items nya (Belum sama Image)
- itemsModel = (file baru) model items
- Data dummy belum ada, view blm ada blm bisa dicoba

## Update 0.0.1

Nonaktif login filter -> User tidak perlu login dahulu
Add dropdown menu untuk user pada homepage

### File Changed:

- Views/Pages/navbar.php = Nambah fitur buat ngecek status login filter
- App/Config/Filters.php = Nonaktif login filter
- App/Config/Routes.php = Set default route Admin::index
- App/Controllers/Admin.php = Benerin return view buat tiap-tiap user

## Update 0.0.2

Rename beberapa controller dan function
Nambah view buat profile user

## Update 0.0.3

- Bagian Profile sudah fix (error sudah diperbaiki)
- Bagian List Items sudah fix (join dihilangkan, sedikit perubahan pada ItemsModel untuk penyesuaian)
- Nambah dummy satu biji di bagian items dan items list (dummy juga di tabel customer buat tes method update profile) Harap update DB di lokal klean pake DB yang baru. (Folder Backup DB berisi database yang belum berisi dummy)
- Booking view done (Baru frontend belum di konek ke model)
- Remove beberapa menu navbar
- Remake view user profile

### File Added:

- View/Pages/Book/rooms.php = List room yang bisa dipesan
- View/Pages/Book/details.php = Untuk konfirmasi pemesanan

## Update 0.0.4

- Nambah view register
- Navbar sudah di fix posisinya

## Huge Update 0.0.5

HARAP BACKUP PROJECT YANG ADA DI DALAM LOKAL TERLEBIH DAHULU SEBELUM MELAKUKAN PULL!!
DEMI KESELAMATAN SEMUA UMAT :V

Jangan lupa update database!!!

### Fitur Yang Sudah Jadi

#### Customer

- Melakukan Login
- Melakukan Regist (Sudah bisa lagi)
- Melihat Profile
- Edit Profile
- Melakukan Booking
- Melihat Daftar Book yang Dilakukan Customer (View Masih Dasar, Belum Dibuat Yang BerStyle)

#### Admin

- Melakukan Login
- Dashboard: Melihat overall data (Total items, total admin, total customer, total booking)
- Admin: Menampilkan daftar Admin (Ada rencana untuk dapat menambah akun admin, entah jadi apa engga :v)
- Items: Create, Update, Delete Sudah bisa dilakukan (Masih ada bug didalamnya, akan dijelaskan di bawah), Read masih belum (bug akan dijelaskan di bawah)
- Booking: Menampilkan daftar booking, admin juga dapat merubah status booking customer (pending, ongoing, done)
- Customer: Menampilkan daftar customer yang terdaftar

### Bug dan Kekurangan Yang Masih Menghantui

#### -Pada customer kurang view untuk daftar booking yang dilakukan customer

#### -Pada admin, CRUD Items masih belum sempurna

- Create Items bisa dilakukan, namun routing masih default (namaController/method) (padahal sudah dibuatkan route baru), namun pada saat menggunakan route yang dibuat, asset pada tampilan tidak muncul. Route baru = Admin/items/add
- Update Items bisa dilakukan, namun menggunakan routing default maupun yang sudah dibuat, asset dari tampilan tetap tidak muncul. Route baru = Admin/items/edit
- Read Items (detail) belum dibuat karena permasalahan pada routing juga, route default maupun buatan asset tampilan tetap tidak muncul

#### -Apakah mau nambah fitur CRUD admin??

#### -Fitur untuk CRUD gambar tambahan setiap item masih belum dibuat

- Termasuk view untuk menampilkan banyak gambar untuk satu item juga belum ada
