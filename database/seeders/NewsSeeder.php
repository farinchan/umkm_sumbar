<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsComment;
use App\Models\NewsViewer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        NewsCategory::create([
            'name' => 'Berita',
            'slug' => 'berita',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        NewsCategory::create([
            'name' => 'Pengumuman',
            'slug' => 'pengumuman',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        NewsCategory::create([
            'name' => 'Acara',
            'slug' => 'acara',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        News::create([
            'news_categories_id' => 1,
            'title' => 'UMP Sumbar 2024 Resmi Naik 2,52 Persen Menjadi Rp2,81 Juta',
            'slug' => 'ump-sumbar-2024-resmi-naik-252-persen-menjadi-rp281-juta',
            'content' => '<p>Pemerintah Provinsi (Pemprov) Sumatera Barat (Sumbar) telah menetapkan Upah Minimum Provinsi atau UMP 2024 menjadi Rp2,81 juta (Rp2.811.449). Gubernur Sumbar Mahyeldi, mengatakan penetapan upah minimum provinsi 2024 mengacu pada Peraturan Pemerintah (PP) 51/2023 tentang Pengupahan dan ditetapkan melalui SK Gubernur Nomor : 562-768-2023 tertanggal 20 November 2023, tanggal 20 November 2023. <br>
                    Penetapan UMP tahun 2024 tersebut menurut gubernur juga telah melewati proses sesuai aturan yang berlaku, salah satunya pembahasan dalam rapat Dewan Pengupahan setempat. Mahyeldi mengatakan jumlah tersebut lebih besar 2,52 persen dibandingkan dengan UMP Sumbar Tahun 2023 lalu yang berada di angka Rp 2,74 juta.  <br>
                    "Nilainya naik dari sebelumnya 2,74 juta rupiah menjadi 2,81 juta rupiah. Persentasenya naik 2,52 persen. Kenaikan UMP Sumbar itu sebelumnya sudah melalui kesepakatan bersama, termasuk perwakilan perusahaan dan serikat pekerja," kata Gubernur, Senin (20/11). <br>
                    Meskipun secara nilai tidak terlalu besar, dengan adanya kenaikan UMP itu, gubernur berharap bisa memberikan dampak yang positif bagi perekonomian masyarakat. Sementara itu Kepala Dinas Tenaga Kerja dan Transmigrasi Sumbar, Nizam Ul Muluk, menyebut kenaikan UMP Sumbar pada 2024 itu sekitar Rp68.973 atau 2,52 persen dari UMP tahun 2023. <br>
                    Nizam menjelaskan, secara umum ada tiga variabel yang mempengaruhi besaran penetapan UMP 2024 yaitu pertumbuhan ekonomi, tingkat Inflasi, dan koefisien alpha (berkisar dari 0,10 - 0,30). “Besaran alpha tersebut sangat ditentukan oleh tingkat besaran upah dan tingkat besaran penyerapan tenaga kerja,” ungkap Nizam. <br>
                    Sebelumnya rapat penetapan UMP itu digelar Kamis (16/11/2023) melibatkan Dewan Pengupahan Provinsi Sumbar dengan jumlah keanggotaan sebanyak 15 orang terdiri dari Dinas Tenaga Kerja dan Transmigrasi, Dinas Koperasi dan UMKM, Dinas Perindag, BPS, perguruan tinggi, Apindo dan Serikat Pekerja.(doa/Diskominfotik Sumbar)</p>',
            'image' => 'news_placeholder.jpg',
            'user_id' => 1,
            'meta_title' => 'UMP Sumbar 2024 Resmi Naik 2,52 Persen Menjadi Rp2,81 Juta',
            'meta_description' => 'Pemerintah Provinsi (Pemprov) Sumatera Barat (Sumbar) telah menetapkan Upah Minimum Provinsi atau UMP 2024 menjadi Rp2,81 juta (Rp2.811.449). Gubernur Sumbar Mahyeldi, mengatakan penetapan upah minimum provinsi 2024 mengacu pada Peraturan Pemerintah (PP) 51/2023 tentang Pengupahan dan ditetapkan melalui SK Gubernur Nomor : 562-768-2023 tertanggal 20 November 2023, tanggal 20 November 2023.',
            'meta_keyword' => 'berita, sumbar, ump, 2024',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        News::create([
            'news_categories_id' => 1,
            'title' => 'Tingkatkan Perekonomian Masyarakat, Pemprov Sumbar Resmikan Warung Posko Pangan 2023',
            'slug' => 'tingkatkan-perekonomian-masyarakat-pemprov-sumbar-resmikan-warung-posko-pangan-2023',
            'content' => '<p>Dalam rangka meningkatkan perekonomian masyarakat serta menekan laju inflasi, Pemerintah Provinsi Sumatera Barat melalui Dinas Koperasi dan Usaha Mikro Kecil dan Menengah (UMKM) meresmikan warung posko pangan di Muaro Penjalinan Padang, Selasa (10/10/23).
                    Turut hadir dalam peresmian secara live streaming Kementerian Perekonomian, Induk Koperasi Wanita Pengusaha Indonesia (Inkowapi), Sahabat Usaha Rakyat (Sahara) serta Kamar Dagang dan Industri (Kadin) seluruh Kabupaten/Kota di Indonesia.
                    Kepala Dinas Koperasi dan UMKM Provinsi Sumatera Barat, Endrizal, saat meresmikan warung posko pangan memberikan dukungan penuh program ini dan berharap agar menjadi awal untuk kemajuan masyarakat yang memiliki atau baru mau merintis usaha.
                    Menurut Endrizal, Sumatera Barat saat ini telah mencetak kurang lebih 100.000 enterpreneur mulai dari usaha mikro, hingga usaha besar serta yang menjadi target dari program ini, selanjutnya dibina dan diarahkan dalam kegiatan warung posko pangan agar dapat meningkatkan perekonomian masyarakat. 
                    "Posko pangan ini diharapkan dapat meningkatkan kesejahteraan para UMKM seperti pemilik warung agar memudahkan masyarakat memenuhi kebutuhan pangan karena di posko pangan ini terdapat sepuluh komoditi pangan utama seperti beras, minyak goreng, gula dan lainnya dengan harga terjangkau," papar Endrizal.
                    Lebih lanjut Derliati, sebagai Kepala Bidang Pengawasan Koperasi dan UMKM menambahkan bahwa Dinas Koperasi dan UMKM siap memberikan pelatihan kepada para Enterpreneur seputar marketing hingga melakukan pengawasan mengenai kendala yang terjadi di lapangan.
                    “Kegiatan seperti ini harus diawasi agar berjalan tertib dan tersistem agar mengalami peningkatan, terlebih yang menjadi target sasaran program ini adalah untuk memaksimalkan usaha masyarakat," ucap Derliati.
                    Kedepannya warung posko pangan akan didirikan di beberapa nagari, kota dan kabupaten yang ada di Sumatera Barat untuk memberdayakan perekonomian masyarakat serta mengurangi laju inflasi (RYH/PJ/DiskominfotikSumbar)</p>',
            'image' => 'news_placeholder.jpg',
            'user_id' => 1,
            'meta_title' => 'Tingkatkan Perekonomian Masyarakat, Pemprov Sumbar Resmikan Warung Posko Pangan 2023',
            'meta_description' => 'Dalam rangka meningkatkan perekonomian masyarakat serta menekan laju inflasi, Pemerintah Provinsi Sumatera Barat melalui Dinas Koperasi dan Usaha Mikro Kecil dan Menengah (UMKM) meresmikan warung posko pangan di Muaro Penjalinan Padang',
            'meta_keyword' => 'berita, sumbar, warung posko pangan, 2023',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        News::factory(5)->create();

        NewsComment::create([
            'news_id' => 1,
            'user_id' => 4,
            'comment' => 'Komentar pertama dapat apa bang?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        NewsComment::create([
            'news_id' => 1,
            'user_id' => 5,
            'comment' => 'gokil bang, mantap bang, lanjutkan bang, semangat bang, semoga sukses bang, I love you bang',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        NewsComment::create([
            'news_id' => 1,
            'user_id' => 6,
            'comment' => 'saya tidak setuju dengan pendapat bang di atas, saya rasa bang tidak benar, saya rasa bang tidak tepat, saya rasa bang tidak adil, saya rasa bang tidak bijak',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        NewsComment::create([
            'news_id' => 2,
            'user_id' => 4,
            'comment' => 'Komentar pertama dapat apa bang?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        NewsComment::create([
            'news_id' => 2,
            'user_id' => 7,
            'comment' => 'saya selalu setuju dengan pendapat bang, kalo semua lelaki seperti bang, dunia ini pasti damai, saya cinta bang, saya sayang',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
