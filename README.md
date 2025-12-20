# Landing Page Plugin (local_depan)

Plugin ini membuat halaman depan/landing page yang menarik untuk Moodle Anda.

## Fitur

- **Halaman Landing Modern**: Desain responsif dengan hero section yang menarik
- **Multi-bahasa**: Dukungan bahasa Inggris dan Indonesia
- **Konfigurasi Mudah**: Pengaturan dapat disesuaikan melalui admin panel
- **Responsive Design**: Tampilan optimal di desktop, tablet, dan mobile
- **Redirect Otomatis**: Pengunjung yang belum login akan diarahkan ke landing page

## Fitur Landing Page

1. **Hero Section**: Bagian utama dengan judul, subjudul, dan call-to-action
2. **Features Section**: Menampilkan keunggulan platform
3. **Statistics Section**: Statistik jumlah kursus dan pengguna (untuk user yang sudah login)
4. **Courses Section**: Preview kursus yang tersedia

## Instalasi

1. Upload folder `depan` ke direktori `/local/` di instalasi Moodle Anda
2. Kunjungi halaman admin notifications untuk menginstall plugin
3. Atau jalankan: `php admin/cli/upgrade.php --non-interactive`

## Konfigurasi

Setelah instalasi, Anda dapat mengkonfigurasi plugin melalui:
**Site Administration > Plugins > Local plugins > Landing Page**

### Pengaturan yang tersedia:

- **Enable Landing Page**: Aktifkan/non-aktifkan landing page
- **Custom Welcome Title**: Judul utama pada hero section
- **Custom Welcome Subtitle**: Subjudul pada hero section  
- **Custom Hero Description**: Deskripsi pada hero section

## Cara Kerja

1. Ketika pengunjung yang belum login mengakses halaman utama Moodle
2. Plugin akan mengalihkan mereka ke `/local/depan/index.php`
3. Landing page akan menampilkan interface yang menarik dengan tombol login/register
4. User yang sudah login akan melihat halaman Moodle normal

## Kustomisasi

### CSS
Edit file `styles.css` untuk mengubah tampilan landing page.

### Bahasa
Tambahkan file bahasa baru di folder `lang/` untuk dukungan bahasa tambahan.

### Konten
Edit file `index.php` untuk mengubah struktur dan konten landing page.

## File Structure

```
local/depan/
├── version.php          # Plugin version info
├── lib.php             # Main plugin functions
├── settings.php        # Admin settings
├── index.php           # Landing page
├── styles.css          # CSS styling
├── lang/
│   ├── en/
│   │   └── local_depan.php    # English strings
│   └── id/
│       └── local_depan.php    # Indonesian strings
└── README.md           # Documentation
```

## Requirements

- Moodle 4.0+ (ditest pada Moodle 4.5)
- PHP 7.4+

## Support

Untuk bantuan dan pertanyaan, silakan hubungi developer atau buat issue di repository.

## License

GNU GPL v3 or later