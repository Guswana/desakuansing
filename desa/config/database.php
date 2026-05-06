<?php
// -------------------------------------------------------------------------
//
// Letakkan username, password dan database sebetulnya di file ini.
// File ini JANGAN di-commit ke GIT. TAMBAHKAN di .gitignore
// -------------------------------------------------------------------------

// Data Konfigurasi MySQL yang disesuaikan

$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = 'eyJpdiI6InBOaHFIU1JmT2hlMEdqRmdWbzc2NEE9PSIsInZhbHVlIjoiaVI4LytSZm4ydmhVcFRhc3YyRG1UZz09IiwibWFjIjoiMDg2N2E4ZTQ2MzRlOTc4ZmU3MzZlZTY5YmIxZWMxYzI3NzQ4MzkzNDU0YjEwOTUyMjI5NTZlMzg2NTI5ZTdmMiIsInRhZyI6IiJ9';
$db['default']['port']     = 3306;
$db['default']['database'] = 'perhentianluas_sicantik';
// $db['default']['database'] = 'desakuansing';
$db['default']['dbcollat'] = 'utf8_general_ci';

/*
| Untuk setting koneksi database 'Strict Mode'
| Sesuaikan dengan ketentuan hosting
*/
$db['default']['stricton'] = true;