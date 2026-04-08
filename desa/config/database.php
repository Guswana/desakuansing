<?php
// -------------------------------------------------------------------------
//
// Letakkan username, password dan database sebetulnya di file ini.
// File ini JANGAN di-commit ke GIT. TAMBAHKAN di .gitignore
// -------------------------------------------------------------------------

// Data Konfigurasi MySQL yang disesuaikan

$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = 'eyJpdiI6ImNZSjlnQkJVc3lBdVZ1UzBLM1ZySEE9PSIsInZhbHVlIjoidEh0SzR1UDVPWEdKWHNlYkVoUk9WQT09IiwibWFjIjoiMGIzNGVhYzhhYjMwMTFlMTM2NWYzZTQzNTc1MDdkOTQxMGNjZGRlNzkzMmU5ODhhOTAzMTEyOTU2MGExNTEwZSIsInRhZyI6IiJ9';
$db['default']['port']     = 3306;
$db['default']['database'] = 'desakuansing';
$db['default']['dbcollat'] = 'utf8_general_ci';

/*
| Untuk setting koneksi database 'Strict Mode'
| Sesuaikan dengan ketentuan hosting
*/
$db['default']['stricton'] = true;