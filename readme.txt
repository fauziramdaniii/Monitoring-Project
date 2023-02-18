cara menjalankan
1. git clone project
2. buat database db_project_fauzi
3. copy file .envexample dan ubah yang copy jadi (.env)
4. ubah databasenya menjadi db_project_fauzi
5. kemudian php artisan:migrate untuk generate datanya
6. lalu jalankan php artisan serve

jujur cara deployment nya masih belum sempurna
1. Menonton Youtube tentang Laravel
2. Mempelajari Dokumentasi Laravel
3. Create Project Laravel ternyata harus ada composer 
4. Install Composer karena memang belum pernah lagi bermain di Laravel
5. Mempelajari konsep MVC yang berjalan di Laravel 
6. Kadang bertanya-tanya ada fitur apa saja yang disediakan Laravel (Tentunya Memanfaatkan ChatGpt)
7. Mempelajari Studi Kasus
8. Deployement Studi Kasus, Pengerjaan dimulai dari controller, model terakhir di view 
9. Ternyata ada Metode Routing yang terpisah (New Experince)
10. Masih belum dapet dan terbayang di View ketika mengimplentasikan template, tapi overAll bisa di handle
    dengan bertanya di ChatGpt yang penting paham alurnya bagaimana
11. Fitur Search yang diminta masih belum bisa jalan (baru view dan controller) karena memang saat ini masih 
    belum bisa menguasai pemrograman javasript/ajax
12. overAll kebanyakan Searching dan Survive sebisa mungkin sesuai dengan soal dan studi kasus yang diberikan
13. Copas 70%, ngetik 30%
14. masih perlu di bentuk kembali agar pengkodean yang dilakukan rapih serta sesuai dengan kaidah
    bahasa pemrograman yang di pakai dan untuk UI nya maaf masih belum sama persis tapi All Fitur sudah ada
    hanya posisi yang beda.
15. git inshaallah udah dikuasai tapi belum expert banget.


nitip
    php artisan tinker

    DB::table('tb_m_client')->delete();

    DB::statement('ALTER TABLE tb_m_client AUTO_INCREMENT = 1');

    DB::table('tb_m_client')->insert([
        ['client_name' => 'NEC', 'client_address' => 'Jakarta'],
        ['client_name' => 'TAM', 'client_address' => 'Jakarta'],
        ['client_name' => 'TUA', 'client_address' => 'Bandung'],
    ]);

    DB::table('tb_m_project')->insert([
        ['project_name' => 'WMS', 'client_id' => 1, 'project_start' => '2022-07-28', 'project_end' => '2022-08-28', 'project_status' => 'OPEN'],
        ['project_name' => 'FILMS', 'client_id' => 2, 'project_start' => '2022-06-01', 'project_end' => '2022-08-31', 'project_status' => 'DOING'],
        ['project_name' => 'DOC', 'client_id' => 2, 'project_start' => '2022-01-01', 'project_end' => '2022-04-30', 'project_status' => 'DONE'],
        ['project_name' => 'POS', 'client_id' => 3, 'project_start' => '2022-05-01', 'project_end' => '2022-08-31', 'project_status' => 'DOING'],
    ]);
