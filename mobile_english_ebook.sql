-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2020 pada 01.39
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobile_english_ebook`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_num` int(100) NOT NULL,
  `cover_img` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `harga` varchar(250) NOT NULL,
  `sinop` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `book`
--

INSERT INTO `book` (`book_id`, `book_num`, `cover_img`, `name`, `harga`, `sinop`) VALUES
(1, 0, 'cover grammar 4th.jpg', 'English Grammar And How To Use It 4th edition', '150000', '<p><strong><span style=\"font-size:small\">Buku ini diperuntukkan bagi siswa tingkat elementary, intermediate serta advanced</span> </strong></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:small\">Memuat semua pengetahuan grammar yang diperlukan bagi semua siswa pembelajar bahasa Inggris </span></li>\r\n	<li><span style=\"font-size:small\">Memberikan tuntunan bagaimana memecahkan persoalan tata bahasa Inggris secara mandiri&nbsp;</span></li>\r\n	<li><span style=\"font-size:small\">Topik disusun berdasarkan kadar kesulitan dan tingkat prioritas yang harus dipelajari&nbsp;</span></li>\r\n	<li><span style=\"font-size:small\">Latihan di akhir setiap unit yang akan mengasah dan mengevaluasi pengetahuan Anda&nbsp;</span></li>\r\n	<li><span style=\"font-size:small\">Kunci jawaban diberikan di halaman belakang buku&nbsp;</span></li>\r\n	<li><span style=\"font-size:small\">Penjelasan dalam bahasa Indonesia sehingga siswa dapat memahami setiap topik dengan lebih baik&nbsp;</span></li>\r\n	<li><span style=\"font-size:small\">Sebagai textbook mahasiswa jurusan bahasa Inggris dan yang ingin memperdalam bahasa Inggris&nbsp;</span></li>\r\n	<li><span style=\"font-size:small\">Dapat digunakan untuk belajar mandiri bagi semua siswa dewasa.</span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n'),
(2, 0, 'Cover.jpg', 'The Handbook Of How to Say It', '50000', '<p>Naturally</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `book_chapter`
--

CREATE TABLE `book_chapter` (
  `chapter_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `chapter` int(11) NOT NULL,
  `page` int(11) NOT NULL,
  `heading` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `book_chapter`
--

INSERT INTO `book_chapter` (`chapter_id`, `book_id`, `chapter`, `page`, `heading`, `content`) VALUES
(2, 1, 1, 1, 'BE: AM, IS, ARE', '<p style=\"text-align:justify\"><strong>A.&nbsp;&nbsp; &nbsp;KATA, FRASA, KALIMAT</strong>&nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\">(1) &nbsp;&nbsp; &nbsp;<strong>Kata (word)</strong> adalah sekumpulan huruf yang mengandung suatu arti.<br />\r\nContoh:&nbsp;<br />\r\n<strong>high, tall, house, room, books</strong></p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\">(2)&nbsp;&nbsp; &nbsp;<strong>Frasa (phrase)</strong> adalah satu atau sekelompok kata yang mengandung arti tetapi bukan kalimat. Jadi, kata sudah pasti adalah frasa, tetapi frasa belum tentu adalah kata.<br />\r\nContoh:&nbsp;<br />\r\n<strong>a high building, in the room, the big house, a pen, shoes, John</strong></p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\">(3) &nbsp;&nbsp; &nbsp;Kalimat (sentence) adalah sekelompok kata yang mempunyai subjek, predikat dan dapat berdiri sendiri.<br />\r\nContoh:&nbsp;<br />\r\n(a)&nbsp;&nbsp; &nbsp;<strong>I studied the history of Indonesia.</strong><br />\r\n(b)&nbsp;&nbsp; &nbsp;<strong>He likes swimming. &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</strong></p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\"><br />\r\n<strong>B.&nbsp;&nbsp; &nbsp;KONSEP DASAR KALIMAT BAHASA INGGRIS</strong><br />\r\n&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\"><strong>Kalimat bahasa Inggris harus mempunyai kata kerja utama.</strong> Tanpa kata kerja utama, kalimat bahasa Inggris adalah kalimat yang salah seperti dalam kalimat berikut:<br />\r\n(1)&nbsp;&nbsp; &nbsp;<s><strong>He smart.</strong></s> (Dia pintar.)<br />\r\n(2)&nbsp;&nbsp; &nbsp;<s><strong>He a student.</strong></s> (Dia seorang siswa.)<br />\r\n(3)&nbsp;&nbsp; &nbsp;<s><strong>He from Indonesia.</strong></s> (Dia dari Indonesia.)</p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\">Mengapa kalimat di atas salah?<br />\r\nKalimat di atas salah karena kalimat di atas tidak mempunyai kata kerja utama. Kalimat di atas seharusnya adalah:<br />\r\n(1)&nbsp;&nbsp; &nbsp;He <strong>is</strong> smart.<br />\r\n(2)&nbsp;&nbsp; &nbsp;He <strong>is</strong> a student.<br />\r\n(3)&nbsp;&nbsp; &nbsp;He<strong> is</strong> from Indonesia.</p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\">Kita menambahkan<strong> is</strong> pada kalimat di atas. <strong>Mengapa?</strong> Karena<strong> is</strong> adalah kata <strong>kerja bantu (helping verb)</strong>, yaitu kata kerja yang membantu kalimat bahasa Inggris yang tidak memiliki kata kerja utama.</p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\">Perhatikan kata ganti berikut yang menggunakan kata kerja bantu &nbsp;<strong>be (am, is, are).</strong><br />\r\n(1) &nbsp;I <strong>am</strong> smart.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (2) &nbsp;He <strong>is</strong> smart.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(5) &nbsp;You <strong>are</strong> smart.<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (3) &nbsp;She <strong>is</strong> smart.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (6) &nbsp;We <strong>are</strong> smart.&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (4) &nbsp;It <strong>is</strong> smart.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (7) &nbsp;They <strong>are</strong> smart.&nbsp;&nbsp;</p>\r\n</div>\r\n'),
(3, 1, 2, 1, 'THE SIMPLE PRESENT TENSE, ADVERBS OF FREQUENCY', '<p style=\"text-align:justify\"><strong>A.&nbsp;&nbsp; &nbsp;KALIMAT YANG MEMPUNYAI KATA KERJA UTAMA</strong></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\">Setelah kita mempelajari kalimat bahasa Inggris yang tidak mempunyai kata kerja utama, marilah kita pelajari kalimat bahasa Inggris yang mempunyai kata kerja utama. Untuk kalimat bahasa Inggris yang mempunyai kata kerja utama, kita langsung saja menggunakan kata kerja tersebut tanpa menggunakan kata kerja bantu.</p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Contoh:</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<div style=\"background-color:white; padding:5px\">\r\n<p style=\"text-align:justify\"><strong>I work in the morning</strong><em>.</em></p>\r\n\r\n<p style=\"text-align:justify\">Karena kata <strong>work</strong> adalah kata kerja utama, kita tidak menggunakan kata kerja bantu <strong>am</strong> untuk membuat kalimat tersebut. Jika kita menggunakan <strong>am</strong> untuk membuat kalimat, kalimatnya menjadi <strong><s>I am work in the morning</s> </strong>. Di dalam kalimat ini ada dua kata kerja, yaitu kata kerja bantu <strong>am</strong> dan kata kerja utama <strong>work</strong>. Hal ini tidak diperbolehkan. Sebelumnya, tentu kita harus tahu apa itu kata kerja. <strong>Kata kerja</strong> adalah kata yang menunjukkan suatu aksi, kejadian atau keadaan. Contoh kata kerja adalah: <strong>dance</strong>, <strong>look, play</strong>,<strong> read</strong>,<strong> study</strong>,<strong> write</strong></p>\r\n</div>\r\n</div>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nCara membentuk <strong>the simple present tense</strong>:<br />\r\n&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<table border=\"0\" cellpadding=\"20\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><strong>rumus</strong></td>\r\n			<td style=\"text-align:justify\"><strong>subject </strong>(<strong>I</strong>/<strong> we</strong>/<strong> you</strong>/<strong> they</strong>)<strong> + infinitive </strong>atau<br />\r\n			<strong>subject </strong>(<strong>he</strong>/<strong> she</strong>/<strong> it</strong>)<strong> + infinitive + s </strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><strong>Negative</strong>&nbsp;&nbsp;&nbsp;&nbsp;<br />\r\n			<strong>Statements:</strong>.</td>\r\n			<td>\r\n			<p style=\"text-align:justify\">I/ You/ We/ They <strong> do not</strong> work.<br />\r\n			He/ She/ It <strong> does not</strong> work</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><strong>Questions:</strong></td>\r\n			<td style=\"text-align:justify\"><strong>Do</strong> I/ you/ we/ they work?<br />\r\n			<strong>Does</strong> he/ she/ it work?</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><strong>Short Answers:</strong></td>\r\n			<td>\r\n			<p style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I/ you/ we/ they <strong> do</strong>.<br />\r\n			Yes&nbsp; <strong>{</strong>&nbsp; he/ she/ it <strong> does</strong>.</p>\r\n\r\n			<p style=\"text-align:justify\">No&nbsp;&nbsp; <strong>{</strong>&nbsp; I/ you/ we/ they <strong> do not</strong>/<strong>don&#39;t</strong>.<br />\r\n			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; he/ she/ it <strong> does not</strong>/<strong>doesn&#39;t</strong>.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">&nbsp;</td>\r\n			<td style=\"text-align:justify\">&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border-radius:10px; border:1px solid #000000; padding:5px 10px\">\r\n<p style=\"text-align:justify\"><strong>`do not&#39; </strong>dapat disingkat <strong>don&#39;t</strong>,<strong> </strong>dan<strong> does not </strong>disingkat <strong>doesn&#39;t</strong>.</p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\">Kata kerja dengan subjek <strong>he/ she/ it</strong> dalam kalimat di atas ditambah dengan huruf <strong>s</strong>. Mengapa demikian? Itu adalah satu aturan yang sudah disepakati oleh pemakai bahasa Inggris. Kalau begitu bagaimana kita mempelajarinya? Ya, hafalkan saja. Semua yang belajar bahasa Inggris hafal bahwa untuk subjek<strong> he</strong>/<strong> she</strong>/<strong> it</strong>, kita harus menambahkan huruf <strong>s</strong> pada kata kerjanya (untuk tata cara penambahan <strong>-s</strong>, lihat <strong>Appendix 1</strong>).</p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border-radius:10px; border:1px solid #000000; padding:5px 10px\">\r\n<p style=\"text-align:justify\">Kata kerja yang menggunakan subjek <strong>I</strong>/<strong> we</strong>/ <strong>you</strong>/ <strong>they </strong>dalam kalimat di atas tidak ditambahkan huruf <strong>s</strong> karena kita menambahkan huruf <strong>s</strong> hanya pada kata kerja yang subjeknya adalah:<br />\r\n<strong>he</strong>/<strong> she</strong>/<strong> it</strong> saja.</p>\r\n</div>\r\n'),
(4, 1, 3, 0, 'PRONOUNS: SUBJECT, POSSESSIVE, OBJECT, REFLEXIVE', ''),
(5, 1, 4, 0, 'HAVE, HAVE GOT, HAVE TO, HAVE GOT TO', ''),
(6, 1, 5, 0, 'THE PRESENT CONTINUOUS TENSE, THE SIMPLE PRESENT TENSE WITH NON-ACTION VERBS', ''),
(7, 2, 1, 1, 'rrt', '<div style=\"align-items:center; display:flex\">\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"soundPlayer\"><a class=\"sm2_button\" href=\"assets/audio/HowToSayIt/sample.ogg\" title=\"sample.ogg\">&nbsp;</a></div>\r\n\r\n<p>&nbsp;asajshakshak</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n'),
(9, 1, 1, 2, 'BE: AM, IS, ARE', '<div style=\"background:#eeeeee; border-radius:15px; border:1px solid #000000; padding:5px 10px\">\r\n<p style=\"text-align:justify\">(a)&nbsp;&nbsp; <strong>&lsquo;I&rsquo;</strong> dibantu oleh kata kerja bantu <strong>am</strong>.<br />\r\n(b)&nbsp;&nbsp; <strong>&lsquo;we&rsquo;, you, they</strong> dibantu oleh kata kerja bantu <strong>are</strong>.<br />\r\n(c)&nbsp;&nbsp; <strong>&lsquo;he&rsquo;, she, it</strong> dibantu oleh kata kerja bantu <strong>is</strong>.</p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\">Ada empat bentuk kalimat yang menggunakan <strong>kata kerja bantu &lsquo;be&rsquo;</strong> tanpa kata kerja utama.</p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\"><strong>(a)&nbsp;&nbsp; SUBJECT + BE + ADJECTIVE</strong><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contoh:<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (1)&nbsp;&nbsp; I <strong>am busy</strong>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (5)&nbsp;&nbsp; We <strong>are happy</strong>.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (2)&nbsp;&nbsp; He <strong>is</strong> <strong>smart</strong>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (6)&nbsp;&nbsp; You <strong>are wrong</strong>.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (3)&nbsp;&nbsp; She <strong>is beautiful</strong>.&nbsp; (7)&nbsp;&nbsp; They <strong>are naughty</strong>.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (4)&nbsp;&nbsp; It <strong>is right</strong>.</p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\">Kalimat di atas menggunakan <strong>am, is </strong>dan<strong> are (kata kerja bantu)</strong> karena <strong>I, he, she, it, we, you</strong> dan <strong>they</strong> adalah <strong>pronoun (kata ganti)</strong>, dan <strong>busy, smart, beautiful, right, happy, wrong</strong> dan <strong>naughty</strong> adalah <strong>adjective (kata sifat)</strong>.</p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\"><strong>(b)&nbsp;&nbsp; SUBJECT + BE + NOUN PHRASE</strong><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contoh:<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (1)&nbsp;&nbsp; I <strong>am a teacher</strong>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (5)&nbsp;&nbsp; We <strong>are doctors</strong>.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (2)&nbsp;&nbsp; He <strong>is a lawyer</strong>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (6)&nbsp;&nbsp; You <strong>are a sportsman</strong>.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (3)&nbsp;&nbsp; She <strong>is a student</strong>.&nbsp;&nbsp;&nbsp; (7)&nbsp;&nbsp; They <strong>are farmers</strong>.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (4)&nbsp;&nbsp; It <strong>is a book</strong>.</p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\">Kalimat di atas menggunakan kata <strong>kerja bantu &lsquo;am, is, are&rsquo;</strong> karena <strong>I, he, she, it, we, you</strong> dan <strong>they</strong> adalah <strong>pronoun (kata ganti)</strong>, dan <strong>a teacher, a lawyer, a student, a book, doctors, a sportsman</strong> dan <strong>farmers adalah noun phrase (frasa benda)</strong>.</p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\"><strong>(c)&nbsp;&nbsp; SUBJECT + BE + PREPOSITIONAL PHRASE/ADVERB OF PLACE</strong><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contoh:<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (1)&nbsp;&nbsp; I am <strong>from Sumatra</strong>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (5)&nbsp;&nbsp; We are <strong>at home</strong>.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (2)&nbsp;&nbsp; He is <strong>on the phone</strong>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (6)&nbsp;&nbsp; You are <strong>here</strong>.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (3)&nbsp;&nbsp; She is <strong>in the living-room</strong>.&nbsp;&nbsp;&nbsp; (7)&nbsp;&nbsp; They are <strong>at work</strong>.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (4)&nbsp;&nbsp; It is <strong>in the drawer</strong>.</p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\">Kalimat di atas menggunakan <strong>am, is, are (kata kerja bantu)</strong> karena <strong>I, he, she, it, we, you</strong> dan <strong>they</strong> adalah <strong>pronoun (kata ganti)</strong>, dan <strong>from Sumatra, on the phone, in the living-room, in the drawer, at home, at work</strong> adalah <strong>prepositional phrase</strong>, yaitu <strong>suatu frasa yang dimulai dengan kata depan (preposition) &lsquo;from, on, in, at&rsquo;</strong>, sedangkan <strong>here</strong> adalah <strong>adverb (kata keterangan)</strong>.</p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\">Beberapa contoh <strong>adverb of place</strong> adalah: <strong>there</strong> (di sana), <strong>here</strong> (di sini), <strong>upstairs</strong> (di atas), <strong>downstairs</strong> (di bawah), <strong>everywhere</strong> (di mana saja), <strong>abroad</strong> (di/ke luar negeri)</p>\r\n</div>\r\n'),
(10, 1, 1, 3, 'BE: AM, IS, ARE', '<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\"><strong>(d)&nbsp;&nbsp; SUBJECT + BE + PRONOUN</strong><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contoh:<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (1)&nbsp;&nbsp; It is <strong>hers</strong>.&nbsp;&nbsp;&nbsp; (4) It&rsquo;s <strong>him</strong>.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (2)&nbsp;&nbsp; It is <strong>mine</strong>.&nbsp;&nbsp; (5) They are <strong>yours</strong>.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (3)&nbsp;&nbsp; It&rsquo;s <strong>me</strong>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (6) She is <strong>mine</strong>.</p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\"><br />\r\n<strong>C. NOUNS (KATA BENDA)</strong>&nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\"><strong>&lsquo;nouns&rsquo;</strong> adalah kata benda, yaitu kata-kata yang memberi nama pada orang, benda, tempat atau ide.<br />\r\nContoh:<br />\r\n(a)&nbsp;&nbsp; <strong>coffee, girl, book, table, water</strong><br />\r\n(b)&nbsp;&nbsp; <strong>Mr. Johnson, Miss Lucy</strong><br />\r\n(c)&nbsp;&nbsp; <strong>freedom, justice, philosophy, democracy</strong><br />\r\n(d)&nbsp;&nbsp; <strong>Jakarta, Tokyo, hospital, factory, supermarket</strong></p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\"><br />\r\n<strong>D. ADJECTIVES (KATA SIFAT)</strong><br />\r\n&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\"><strong>&lsquo;adjectives&rsquo;</strong> adalah kata sifat, yaitu kata-kata yang menerangkan kata benda.<br />\r\nContoh:<br />\r\n<strong>beautiful, interesting, smart, busy, good, sophisticated, confused, surprising</strong></p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\"><br />\r\n<strong>E. PREPOSITIONS (KATA DEPAN)</strong><br />\r\n&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\"><strong>&lsquo;prepositions&rsquo;</strong> adalah kata depan, yaitu kata-kata seperti on, in, at, about yang digunakan bersama kata benda dan biasanya ditempatkan di depan kata benda.<br />\r\nContoh:<br />\r\n<strong>in the drawer, at home, at work, on the table, about women</strong></p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\"><br />\r\n<strong>F. NOUN PHRASES, PREPOSITIONAL PHRASES,ADJECTIVE PHRASES</strong><br />\r\n&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\">(1)&nbsp;&nbsp; <strong>&lsquo;noun phrases&rsquo;</strong> adalah frasa yang berfungsi sebagai kata benda.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contoh:<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>a book, hot coffee, water, a beautiful girl</strong><br />\r\n(2)&nbsp;&nbsp; <strong>&lsquo;prepositional phrases&rsquo;</strong> adalah frasa yang dimulai dengan preposisi.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contoh:<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>at work, at home, about the book, in the kitchen</strong><br />\r\n(3)&nbsp;&nbsp; <strong>&lsquo;adjective phrases&rsquo;</strong> adalah frasa yang berfungsi sebagai kata sifat.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contoh:<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>ten years old, blue, green, ready-made, new-born, absent-minded</strong></p>\r\n</div>\r\n'),
(11, 1, 1, 4, 'BE: AM, IS, ARE', '<p style=\"text-align:justify\"><strong>G. CARA MEMBENTUK KALIMAT TANYA DAN NEGATIF</strong><br />\r\n&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\">Untuk membentuk kalimat tanya, kita cukup memindahkan kata kerja bantu<br />\r\n<strong>be (am, is, are)</strong> ke depan subjek kalimat. Untuk membentuk kalimat negatif, kita cukup menambahkan <strong>not</strong> setelah kata kerja bantu <strong>be (am, is, are)</strong>.</p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nContoh:&nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I <strong>am</strong><br />\r\nStatements:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; He/ She/ It <strong>is</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>}</strong>&nbsp;&nbsp;&nbsp;&nbsp; smart.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; You/ We/ They <strong>are</strong></p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I <strong>am</strong><br />\r\nNegative statements:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; He/ She/ It <strong>is</strong> not&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>}&nbsp;&nbsp;&nbsp;&nbsp; </strong>smart.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; You/ We/ They <strong>are</strong></p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Am</strong> I<br />\r\nQuestions:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Is</strong> he/ she/ it&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>}&nbsp;&nbsp;&nbsp;&nbsp; </strong>smart?<br />\r\n<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Are</strong> you/ we/ they</p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I <strong>am</strong>.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Yes,&nbsp; <strong>{</strong>&nbsp;&nbsp;&nbsp;&nbsp; he/ she/ it <strong>is</strong>.<br />\r\nShort Answers:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; you/ we/ they <strong>are</strong>.<br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I <strong>am not</strong>.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No,&nbsp;&nbsp; <strong>{</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; he/ she/ it <strong>is not</strong>.<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; you/ we/ they <strong>are not</strong>.</p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nPerhatikan singkatan berikut:<br />\r\n&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\"><strong>I&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; +&nbsp; am&nbsp;&nbsp;&nbsp; &rarr; I&rsquo;m&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>| <strong>I&rsquo;m</strong> at home.<br />\r\n<strong>she&nbsp;&nbsp;&nbsp; +&nbsp; is&nbsp;&nbsp;&nbsp;&nbsp; &rarr; she&rsquo;s&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>| <strong>She&rsquo;s</strong> at home.<br />\r\n<strong>he&nbsp;&nbsp;&nbsp;&nbsp; +&nbsp;&nbsp; is&nbsp;&nbsp;&nbsp;&nbsp; &rarr; he&rsquo;s&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>| <strong>He&rsquo;s</strong> at home.<br />\r\n<strong>it&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; +&nbsp;&nbsp; is&nbsp;&nbsp;&nbsp;&nbsp; &rarr; it&rsquo;s&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>| <strong>It&rsquo;s</strong> at home.<br />\r\n<strong>you&nbsp;&nbsp;&nbsp; +&nbsp; are&nbsp;&nbsp;&nbsp; &rarr; you&rsquo;re&nbsp;&nbsp; </strong>| <strong>You&rsquo;re</strong> at home.<br />\r\n<strong>we&nbsp;&nbsp;&nbsp;&nbsp; +&nbsp; are&nbsp;&nbsp;&nbsp; &rarr; we&rsquo;re&nbsp;&nbsp;&nbsp; </strong>| <strong>We&rsquo;re</strong> at home.<br />\r\n<strong>they&nbsp;&nbsp; +&nbsp; are&nbsp;&nbsp;&nbsp; &rarr; they&rsquo;re&nbsp; </strong>| <strong>They&rsquo;re</strong> at home.<br />\r\n<strong>is&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; +&nbsp; not&nbsp;&nbsp;&nbsp; &rarr; isn&rsquo;t&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>| <strong>She isn&rsquo;t</strong> at home.<br />\r\n<strong>are&nbsp;&nbsp;&nbsp;&nbsp; +&nbsp; not&nbsp;&nbsp;&nbsp; &rarr; aren&rsquo;t&nbsp;&nbsp;&nbsp; </strong>| <strong>They aren&rsquo;t</strong> at home.</p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\">(1)&nbsp;&nbsp; Untuk kombinasi <strong>pronoun + be</strong> (kalimat positif) di akhir kalimat, kita tidak dapat menyingkatnya:<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contoh:<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (a)&nbsp;&nbsp; <strong>Yes, I am</strong>. (Bukan <s><strong>Yes, I&rsquo;m</strong></s>.)<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (b)&nbsp;&nbsp; <strong>Yes, she is</strong>. (Bukan <s><strong>Yes, she&rsquo;s</strong></s>)<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (c)&nbsp;&nbsp; <strong>&lsquo;am + not&rsquo;</strong> tidak dapat disingkat.<br />\r\n(2)&nbsp;&nbsp; Dalam bahasa Inggris non-standard, <strong>am not, is not</strong>, dan <strong>are not</strong> biasanya disingkat menjadi <strong>ain&rsquo;t.</strong></p>\r\n</div>\r\n'),
(12, 1, 2, 2, 'THE SIMPLE PRESENT TENSE, ADVERBS OF FREQUENCY', '<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\">Bagaimana dengan kalimat tanya dan kalimat negatif? Untuk membentuk<br />\r\nkalimat tanya, kita menggunakan kata kerja bantu <strong>do </strong>pada kalimat dengan subjek</p>\r\n\r\n<p style=\"text-align:justify\"><strong>I/ we/ you/ they</strong>, sedangkan kita menggunakan kata kerja bantu <strong>does </strong>jika subjek kalimat adalah<strong> he/ she/ it</strong>, dan kata kerja berubah kembali menjadi bentuk <strong>infinitive </strong>(tanpa s).</p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\">Kita menggunakan <strong>do not</strong> untuk membuat kalimat negatif jika subjek kalimatnya<strong> I/ we/ you/ they</strong> dan <strong>does not </strong>jika subjeknya adalah <strong>he/ she/ it.</strong></p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nKalimat-kalimat seperti yang kita bahas di atas disebut <strong>the simple present tense.</strong><br />\r\n&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border-radius:15px; border:1px solid #000000; padding:5px 10px\">\r\n<p style=\"text-align:justify\"><strong>&lsquo;the simple present tense&rsquo;</strong> adalah suatu kalimat yang perubahan kata kerjanya menyatakan kegiatan yang dilakukan sehari-hari, suatu kebiasaan, suatu kegiatan yang dilakukan secara teratur dan suatu kenyataan.</p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nKapan kita menggunakan kalimat di atas termasuk kalimat-kalimat yang kita pelajari di unit 1, yaitu kalimat-kalimat yang tidak mempunyai kata kerja utama?<br />\r\n&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<div style=\"background:#ffffff; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\">timeline</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"TIme line Image\" src=\"http://localhost/assets/images/book/timeline_how_to_say_it_unit2.jpeg\" style=\"margin:auto; padding:10px 10%\" /></p>\r\n</div>\r\n</div>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<table border=\"1\" cellpadding=\"20\" cellspacing=\"1\" style=\"background-color:white; width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><strong>&lsquo;the simple present tense&rsquo;</strong> digunakan untuk<br />\r\n			menyatakan:</td>\r\n			<td style=\"text-align:justify\">Keterangan</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><strong>(1)&nbsp;&nbsp; Kegiatan sehari-hari:</strong><br />\r\n			(a) He <strong>works </strong>at Hotel Indonesia.<br />\r\n			(b) She <strong>takes </strong>care of patients.<br />\r\n			(c) They <strong>go </strong>to the office by bus.</td>\r\n			<td>\r\n			<div class=\"Basic-Graphics-Frame\">\r\n			<p style=\"text-align:justify\">Kalimat ini menyatakan kegiatan sehari-hari yang kita lakukan dan akan kita lakukan terus karena kita belum tahu kapan kita akan berhenti melakukan kegiatan ini.</p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><strong>(2)&nbsp;&nbsp; Kebiasaan:</strong><br />\r\n			(a) He <strong>smokes</strong>.<br />\r\n			(b) He <strong>drinks </strong>coffee.<br />\r\n			(c) He <strong>sneezes </strong>almost every hour.</td>\r\n			<td>\r\n			<div class=\"Basic-Graphics-Frame\">\r\n			<p style=\"text-align:justify\">Kalimat ini menyatakan suatu kebiasaan atau dalam bahasa Inggris disebut <strong>habit</strong>.</p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><strong>(3)&nbsp;&nbsp; Kegiatan yang dilakukan secara teratur:</strong><br />\r\n			(a) She <strong>plays </strong>the piano at four o&rsquo;clock.<br />\r\n			(b) He<strong> visits </strong>his mother once a month.</td>\r\n			<td>\r\n			<div class=\"Basic-Graphics-Frame\">\r\n			<p style=\"text-align:justify\">Kalimat ini menyatakan suatu kegiatan yang dilakukan secara teratur.</p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><strong>(4)&nbsp;&nbsp; Suatu kenyataan:</strong><br />\r\n			(a) She<strong> is</strong> beautiful.<br />\r\n			(b) The sun <strong>sets</strong> in the west.</td>\r\n			<td style=\"text-align:justify\">Kalimat ini menyatakan suatu kenyataan yang masih berlaku sekarang.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nJadi, kalau kita ingin menyatakan keempat hal tersebut dalam bahasa Inggris, kita harus menggunakan kalimat<strong> the simple present tense.</strong><br />\r\n&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\">Kalau ada yang bertanya <strong>What do you do?</strong> Kita akan menjawab kalimat ini dengan<strong> I am a student</strong> karena yang ditanyakan adalah <strong>Apa yang Anda lakukan sehari-hari?</strong> Karena saya sehari-hari belajar sehingga jawaban saya adalah <strong>I am a student because I study regularly</strong>. Jika Anda adalah pekerja, jawaban Anda adalah<strong> I am an employee</strong>. Mengapa? <strong>Because I work everyday</strong>.</p>\r\n\r\n<p style=\"text-align:justify\">Jadi, kita perlu mengetahui konsep kalimat <strong>the simple present tense</strong> ini, dan kapan kita menggunakannya. Kalau tidak, kita akan selalu salah berbicara dalam bahasa Inggris. Hal ini adalah hal yang sangat mendasar yang harus kita kuasai untuk melangkah ke <strong>unit </strong>selanjutnya.</p>\r\n</div>\r\n'),
(13, 1, 2, 3, 'THE SIMPLE PRESENT TENSE, ADVERBS OF FREQUENCY', '<p style=\"text-align:justify\"><strong>B. ADVERBS OF FREQUENCY</strong></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\">Dalam bahasa Inggris kita mengenal juga kata keterangan yang disebut <strong>adverbs.</strong></p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\"><strong>&lsquo;adverbs&rsquo;</strong> adalah <strong>kata-kata yang menerangkan kata kerja, kata sifat, kata keterangan lainnya dan seluruh kalimat</strong>.</p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Di sini kita hanya akan membahas <strong>adverbs of frequency</strong>, yaitu kata keterangan yang menerangkan seberapa sering <strong>(how often)</strong> suatu kegiatan dilakukan, atau suatu keadaan terjadi.<br />\r\nContoh adverbs of frequency ini adalah:</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<table border=\"0\" cellpadding=\"15\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:justify\">(1)&nbsp;&nbsp; <strong>always</strong></td>\r\n			<td style=\"text-align:justify\">(selalu)</td>\r\n			<td style=\"text-align:justify\">berarti <strong>all of the time </strong></td>\r\n			<td style=\"text-align:justify\"><strong>100 %</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">(2)&nbsp;&nbsp; <strong>usually </strong></td>\r\n			<td style=\"text-align:justify\">(biasanya)</td>\r\n			<td style=\"text-align:justify\">berarti <strong>most of the time</strong></td>\r\n			<td style=\"text-align:justify\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">(3)&nbsp;&nbsp; <strong>often </strong></td>\r\n			<td style=\"text-align:justify\">(sering)</td>\r\n			<td style=\"text-align:justify\">berarti <strong>much of the time </strong></td>\r\n			<td style=\"text-align:justify\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">&nbsp;</td>\r\n			<td style=\"text-align:justify\">&nbsp;</td>\r\n			<td style=\"text-align:justify\">&nbsp;</td>\r\n			<td style=\"text-align:justify\"><strong>50 % </strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">(4)&nbsp;&nbsp; <strong>sometimes </strong></td>\r\n			<td style=\"text-align:justify\">(kadang-kadang)</td>\r\n			<td style=\"text-align:justify\">berarti <strong>some of the time </strong></td>\r\n			<td style=\"text-align:justify\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">(5)&nbsp;&nbsp; <strong>seldom </strong></td>\r\n			<td style=\"text-align:justify\">(jarang)</td>\r\n			<td style=\"text-align:justify\">berarti <strong>almost never </strong></td>\r\n			<td style=\"text-align:justify\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\">(6)&nbsp;&nbsp; <strong>never </strong></td>\r\n			<td style=\"text-align:justify\">(tidak pernah)</td>\r\n			<td style=\"text-align:justify\">berarti <strong>not at any time </strong></td>\r\n			<td style=\"text-align:justify\"><strong>0 %</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\">Persentase di sebelah kanan di atas menyatakan seberapa sering kegiatan tersebut dilaksanakan, atau seberapa sering sesuatu atau keadaan itu terjadi.</p>\r\n</div>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Perhatikan posisi adverbs of frequency dalam kalimat:</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\">(a) &lsquo;adverbs of frequency&rsquo; ditempatkan setelah kata kerja bantu &lsquo;be&rsquo;</p>\r\n\r\n<hr />\r\n<table border=\"0\" cellpadding=\"10\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:justify\">He</td>\r\n			<td style=\"text-align:justify\">+ is + <strong>{</strong></td>\r\n			<td style=\"text-align:justify\"><strong>always<br />\r\n			usually<br />\r\n			often<br />\r\n			sometimes<br />\r\n			seldom<br />\r\n			never</strong></td>\r\n			<td style=\"text-align:justify\"><strong>}</strong> early</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\">(b) <strong>&lsquo;adverbs of frequency&rsquo;</strong> ditempatkan di depan <strong>kata kerja utama</strong> dan <strong>setelah subyek</strong></p>\r\n\r\n<hr />\r\n<table border=\"0\" cellpadding=\"10\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:justify\">He + <strong>{</strong></td>\r\n			<td style=\"text-align:justify\"><strong>always<br />\r\n			usually<br />\r\n			often<br />\r\n			sometimes<br />\r\n			seldom<br />\r\n			never</strong></td>\r\n			<td style=\"text-align:justify\"><strong>}</strong> <strong>comes</strong> early</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">\r\n<p style=\"text-align:justify\"><strong>&lsquo;adverb of frequency&rsquo;</strong> ditempatkan setelah kata kerja bantu <strong>is</strong>, sedangkan dalam kalimat yang menggunakan kata kerja utama, posisi <strong>adverb of frequency</strong> ditempatkan sebelum kata kerja utama, dan tepat sesudah subyek kalimat.</p>\r\n</div>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `book_price`
--

CREATE TABLE `book_price` (
  `book_id` int(11) NOT NULL,
  `price` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `book_price`
--

INSERT INTO `book_price` (`book_id`, `price`) VALUES
(1, '150000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `book_trial`
--

CREATE TABLE `book_trial` (
  `item_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `book_trial`
--

INSERT INTO `book_trial` (`item_id`, `book_id`, `timestamp`) VALUES
(1, 1, '2020-02-28 12:13:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `site_article`
--

CREATE TABLE `site_article` (
  `article_id` int(11) NOT NULL,
  `banner` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `date` date DEFAULT NULL,
  `author` varchar(250) NOT NULL,
  `draf` int(1) NOT NULL,
  `post` int(1) NOT NULL,
  `views` bigint(20) NOT NULL,
  `category` varchar(250) NOT NULL,
  `for_member` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `site_article`
--

INSERT INTO `site_article` (`article_id`, `banner`, `title`, `content`, `date`, `author`, `draf`, `post`, `views`, `category`, `for_member`) VALUES
(9, '2020_03_02_88060_1583151052._large.jpg', 'COVID-19: Police impose limits on staple food purchases amid panic buying', '<p><span style=\"color:#e74c3c\">The National Police&rsquo;s food stability task force</span> has enforced a limit on the amount of staple foods available for purchase in a bid to ensure availability in the long term amid panic buying prompted by the COVID-19 outbreak.</p>\r\n\r\n<p>Rationing will be implemented for rice, sugar, vegetable oil and instant noodles, as reported by <a href=\"https://nasional.kompas.com/read/2020/03/17/14432831/ini-bahan-pokok-yang-pembeliannya-dibatasi-mulai-hari-ini\"><em>kompas.com</em></a>. The task force will limit every customer to a maximum of 10 kilograms of rice, 2 kg of sugar, 4 liters of vegetable oil and 2 boxes of instant noodles.</p>\r\n\r\n<p>The police issued a letter regarding the policy on Monday, and sent it to several business associations such as the Indonesian Retailers Association (Aprindo), the Jakarta office of the Market Sellers Cooperatives (Puskoppas) and the Indonesian Provincial Government Association (APPSI)</p>\r\n\r\n<p>&ldquo;We have issued a letter [regarding the rationing] to make sure nobody takes advantage of the situation,&rdquo; task force head Brig. Gen. Daniel Tahi Monang said on Tuesday, as quoted by <em>kompas.com</em>.</p>\r\n\r\n<p>Read also: <a href=\"https://www.thejakartapost.com/news/2020/03/09/government-expedites-imports-of-staple-needs-to-stabilize-prices.html\">Government expedites imports of staple needs to stabilize prices</a></p>\r\n\r\n<p>He added that the policy would take effect starting Tuesday and end when authorities declared the situation normal.</p>\r\n\r\n<p>The task force acknowledged the rise in staple food prices. &ldquo;The prices have increased somewhat due to rising demand after some panic buying,&rdquo; Daniel said.</p>\r\n\r\n<p>The police&rsquo;s task force, he went on to say, would make sure that the supply of staple foods remained sufficient. &ldquo;I urge the public not to panic buy,&rdquo; he added. (nal)</p>\r\n', '2020-03-18', 'Admin', 0, 1, 0, '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `site_info`
--

CREATE TABLE `site_info` (
  `id` int(11) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `site_info`
--

INSERT INTO `site_info` (`id`, `about`) VALUES
(1, '<p>Mobile English, Eplus dengan visi mencerdaskan kehidupan bangsa melalui bahasa Inggris dengan tagline your link to success adalah penerbit buku-buku pelajaran bahasa Inggris karya Robby Lou dan penyedia layanan kamus Inggris-Indonesia online yg diambil dari kamus Robby Lou&#39;s (Advanced) Learner&#39;s English-Indonesian Dictionary. Kamus ini adalah Learner&#39;s Dictionary, the dictionary that teaches grammar, yaitu kamus yg mengajarkan tata bahasa Inggris kepada penggunanya. Dengan memeriksa arti sebuah kata, pengguna kamus bisa juga menemukan contoh-contoh kalimat yg membuat pengguna mengerti bagaimana menggunakan sebuah kata dengan tata bahasa Inggris yg benar karena kamus kami berisi lebih dari 60.000 contoh kalimat beserta terjemahan dalam bahasa Indonesia. Kamus saat ini sedang dalam taraf soft-launching.</p>\r\n\r\n<p>Untuk bisa mengakses kamus kami, pengguna harus menjadi anggota dengan berlangganan selama setahun dengan mendapatkan password dari kami. Ada pun biaya berlangganan adalah:aaaa</p>\r\n\r\n<p>Rp150.000 per tahun untuk kamus (Standard) Robby Lou&#39;s Learner&#39;s English-Indonesian Dictionary) + pelajaran bahasa Inggris</p>\r\n\r\n<p>Apakah biaya berlangganan kamus kami sangat terjangkau?<br />\r\nOh, tentu sangat terjangkau karena kamus bisa diakses oleh anggota keluarga Anda asalkan mereka mengetahui passwordnya, tetapi penggunaannya harus one at a time (bergiliran). Jadi satu password dapat digunakan oleh seluruh anggota keluarga. Mari kita ciptakan keluarga pintar bahasa Inggris.</p>\r\n\r\n<p>Jika Anda mengalami kesulitan mendaftar secara online, hubungi kami di WA atau SMS 0815 1131 3838.</p>\r\n\r\n<p>&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `site_invitation`
--

CREATE TABLE `site_invitation` (
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `site_lead`
--

CREATE TABLE `site_lead` (
  `id_lead` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `site_lead`
--

INSERT INTO `site_lead` (`id_lead`, `title`, `content`) VALUES
(1, 'About Us', '<p>Kami bergerak dalam bidang kursus bahasa inggris dan penerbitan buku bahasa inggris fisik maupun online.</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `site_lesson`
--

CREATE TABLE `site_lesson` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `extend` text NOT NULL,
  `status` varchar(250) NOT NULL,
  `lesson_range` varchar(250) NOT NULL DEFAULT 'Member',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `site_lesson`
--

INSERT INTO `site_lesson` (`id`, `title`, `content`, `extend`, `status`, `lesson_range`, `date`) VALUES
(10, 'such', '<p><span style=\"font-family:Garamond; font-size:medium\"><strong><span style=\"color:#ff0000\">| such as</span> </strong><br />\r\n<span style=\"color:#ff0000\">(<strong>a</strong>)</span> <strong>misalnya</strong><br />\r\n(syn <span style=\"color:#0000ff\"><strong>for example</strong></span>)<br />\r\n<span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\">â–ª </span></span><span style=\"color:#0000ff\">risks such as flood and fire</span><br />\r\nrisiko2 seperti banjir dan kebakaran<br />\r\n<span style=\"color:#0000ff\">â–ª &lsquo;There are a lot of activities to do.&rsquo; &lsquo;Such as?&rsquo;</span><br />\r\n&ldquo;Banyak kegiatan2 yg utk dilakukan.&rdquo; &ldquo;Misalnya?&rdquo;<br />\r\n<span style=\"color:#ff0000\">(<strong>b</strong>)</span> <strong>seperti</strong><br />\r\n(syn <span style=\"color:#0000ff\"><strong>like</strong></span>)<br />\r\n<span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\">â–ª </span></span><span style=\"color:#0000ff\">Activities such as these are fun.</span><br />\r\nKegiatan2 seperti ini menyenangkan.</span></p>\r\n', '<p><span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff; font-size:x-large\"><strong>such</strong></span><br />\r\n/<span style=\"font-family:DictBats\">sVtS</span>/<br />\r\ndeterminer<br />\r\n<span style=\"color:#ff0000\"><strong>1</strong></span> <strong>demikian</strong><br />\r\n<span style=\"color:#0000ff\"><span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\"><span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\"><span style=\"font-family:Garamond; font-size:medium\"><span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\">â–ª </span></span></span></span></span></span></span>Such attitude is not good.</span><br />\r\nSikap yg demikian tidaklah baik.<br />\r\n<span style=\"color:#0000ff\">â–ª I&rsquo;ve never seen such a beautiful woman.</span><br />\r\nSaya belum pernah melihat wanita yg demikian cantik.<br />\r\n<span style=\"color:#000000\"><span style=\"color:#0000ff\">â–ª She was uneducated. such was our opinion.</span><br />\r\nDia tidak terpelajar. Demikianlah pendapat kami.<br />\r\n<span style=\"color:#0000ff\">â–ª What should we do in such a situation?</span><br />\r\nApa yg harus kita lakukan dl keadaan yg demikian?<br />\r\n<span style=\"color:#0000ff\">â–ª You definitely need a teacher, or some such person.</span><br />\r\nAnda pastinya membutuhkan seorg guru, atau org yg demiian.<br />\r\n<span style=\"color:#0000ff\">â–ª He said no such thing. &nbsp;</span><br />\r\nDia tidak mengatakan hal yg demikian.<br />\r\n<span style=\"color:#0000ff\">â–ª Living things need water and should be treated as such.</span><br />\r\nBenda hidup memerlukan air dan harus diperlakukan demikian.</span><br />\r\n<span style=\"color:#ff0000\"><strong>2</strong></span> <strong>begitu; sangat (digunakan utk penekanan)</strong><br />\r\n<span style=\"color:#0000ff\">I felt such a stupid person.</span><br />\r\nSaya merasa menjadi ssorg yg begitu bodoh.<br />\r\n<span style=\"color:#ff0000\"><strong>3</strong></span> <strong>(digunakan utk menunjukkan hasil dari suatu keadaan, perbuatan, dll.)</strong><br />\r\n<span style=\"color:#ff0000\">(<strong>a</strong>)</span> <span style=\"color:#0000ff\"><strong>such &hellip;that </strong></span><br />\r\n<strong>begitu/ sedemikian &hellip; sehingga</strong><br />\r\n<span style=\"color:#0000ff\"><span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\">â–ª </span></span>He was in such a hurry that he fell off his bicycle.</span><br />\r\nDia dl keadaan begitu ter-buru2 sehingga dia jatuh dari sep&eacute;danya.<br />\r\n<span style=\"color:#ff0000\">(<strong>b</strong>) <strong>be</strong> <strong>such that</strong>; <strong>be</strong> <strong>such as to inf</strong></span><br />\r\n<strong>sedemikian rupa sehingga</strong><br />\r\n<span style=\"color:#0000ff\"><span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\">â–ª </span></span>His intelligence was such that he graduated from senior high school at the age of 12.</span><br />\r\nKepintarannya dl keadaan sedemikian rupa sehingga dia lulus dari SMA di usia 12.<br />\r\n<span style=\"color:#0000ff\">â–ª His manner was&nbsp;<span style=\"font-family:Garamond; font-size:medium\">such</span> as to offed most of us.</span><br />\r\nPerilakunya sedemiian rupa sehingga membuat sebagian besar dari kami tersinggung.<br />\r\n<span style=\"color:#ff0000\">(<strong>c</strong>)</span>&nbsp;<span style=\"color:#ff0000\"><strong><span style=\"font-family:Garamond; font-size:medium\">such</span> a way</strong>/<strong>manner that;&nbsp;<span style=\"font-family:Garamond; font-size:medium\">such</span> a way</strong>/</span><strong><span style=\"color:#ff0000\">manner as to inf</span><br />\r\ndengan cara sedemikian rupa sehingga</strong><br />\r\n<span style=\"color:#0000ff\">â–ª Do it in&nbsp;<span style=\"font-family:Garamond; font-size:medium\">such</span> a way/manner that nobody will find out.</span><br />\r\nLakukanlah dengan cara yg sedemikian rupa sehingga tidak akan diketahui ol&eacute;h org lain.<br />\r\n<span style=\"color:#0000ff\">â–ª Do it in such a way/manner as to impress her.</span><br />\r\nLakukanlah dengan cara sedemikian rupa sehingga membuat dia terkesan.<br />\r\n<strong><span style=\"color:#ff0000\">â–  IDIOM </span><br />\r\n<span style=\"color:#ff0000\"><span style=\"color:#000000\"><span style=\"color:#ff0000\"><strong>| &hellip; and such </strong></span></span></span></strong><br />\r\n<span style=\"color:#ff0000\"><span style=\"color:#000000\">(</span></span><span style=\"color:#ff0000\"><span style=\"color:#000000\">lisan</span></span><span style=\"color:#ff0000\"><span style=\"color:#000000\">)</span></span><strong><span style=\"color:#ff0000\"><span style=\"color:#000000\"> dan yg sejenis<br />\r\n<span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\"><span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\">â–ª </span></span></span></span></span></span></strong><span style=\"color:#0000ff\">There will be french fries, fried chicken, burgers and such.</span><span style=\"color:#0000ff\"> </span><br />\r\n<strong><span style=\"color:#000000\">Akan ada kentang gor&eacute;ng, ayam gor&eacute;ng, burger, dan yg sejenisnya.</span><br />\r\n<span style=\"color:#ff0000\">| as such</span><br />\r\npersis seperti itu</strong><br />\r\n<span style=\"color:#0000ff\"><span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\">â–ª </span></span>There isn&rsquo;t a swimming pool as such, but they do have a small pool.</span><br />\r\nTidak ada kolam renang yg persis seperti itu, tetapi mer&eacute;ka m&eacute;mang memiliki sebuah kolam kecil.<br />\r\n<span style=\"color:#ff0000\"><strong>| such &hellip; as </strong></span>(juga <span style=\"color:#ff0000\"><strong>such as</strong></span>)<br />\r\n<strong>seperti; semacam</strong><br />\r\n<span style=\"color:#0000ff\"><span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\">â–ª </span></span>occupations such as drivers and teachers</span><br />\r\npekerjaan2 seperti supir2 dan guru2<br />\r\n<span style=\"color:#0000ff\">â–ª such attacks as bombings and suicides</span><br />\r\nserangan2 seperti serangan bom dan bunuh diri<br />\r\n<span style=\"color:#000000\"><span style=\"color:#ff0000\"><strong>| such &hellip; as</strong>/<strong>who</strong>/</span><strong><span style=\"color:#ff0000\">that</span> </strong><br />\r\ndigunakan utk menunjuk suatu kelompok<br />\r\n<span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\">â–ª </span></span><span style=\"color:#0000ff\">Such individuals who support this point of view should be respected.</span><br />\r\nOrg2 yg mendukung pandangan ini harus dihargai.</span><br />\r\n<span style=\"color:#ff0000\"><strong>| such of sb</strong>/</span><strong><span style=\"color:#ff0000\">sth as</span> </strong><br />\r\ndigunakan utk menunjuk suatu kelompok<br />\r\n<span style=\"font-family:Garamond; font-size:medium\"><strong><span style=\"color:#ff0000\">|</span></strong></span> <span style=\"color:#ff0000\"><strong>Such of you as wish to come earlier will be welcomed.</strong></span><br />\r\nMer&eacute;ka yg ingin datang lebih awal akan disambut baik.<br />\r\n<strong><span style=\"color:#ff0000\">| to such an extent </span></strong><span style=\"color:#ff0000\">/ </span><strong><span style=\"color:#ff0000\">a degree that</span><br />\r\nsampai ke tingkat yg demikian sehingga</strong><br />\r\n<span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#000000\"><span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\">â–ª </span></span></span></span><span style=\"color:#0000ff\">Her health was deterioting to such a degree that she could not stand up.</span><br />\r\nKes&eacute;hatannya terus memburuk sampai ke tingkat yg sedemikian rupa di mana dia tidak bisa berdiri.<br />\r\n<span style=\"color:#ff0000\"><strong>| there is no such thing</strong>/</span><strong><span style=\"color:#ff0000\">person</span></strong><br />\r\n<strong>tidak ada hal/org seperti itu</strong><br />\r\n<span style=\"color:#0000ff\"><span style=\"font-family:Garamond; font-size:medium\"><span style=\"font-family:Garamond; font-size:medium\"><span style=\"font-family:Garamond; font-size:medium\">â–ª </span></span></span>There is no such thing as a free lunch.</span><br />\r\n<span style=\"color:#000000\">Tidak ada hal seperti makan siang gratis.</span><br />\r\n<strong><span style=\"color:#ff0000\">| such as</span> </strong><br />\r\n<span style=\"color:#ff0000\">(<strong>a</strong>)</span> <strong>misalnya</strong><br />\r\n(syn <span style=\"color:#0000ff\"><strong>for example</strong></span>)<br />\r\n<span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\">â–ª </span></span><span style=\"color:#0000ff\">risks such as flood and fire</span><br />\r\nrisiko2 seperti banjir dan kebakaran<br />\r\n<span style=\"color:#0000ff\">â–ª &lsquo;There are a lot of activities to do.&rsquo; &lsquo;Such as?&rsquo;</span><br />\r\n&ldquo;Banyak kegiatan2 yg utk dilakukan.&rdquo; &ldquo;Misalnya?&rdquo;<br />\r\n<span style=\"color:#ff0000\">(<strong>b</strong>)</span> <strong>seperti</strong><br />\r\n(syn <span style=\"color:#0000ff\"><strong>like</strong></span>)<br />\r\n<span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\">â–ª </span></span><span style=\"color:#0000ff\">Activities such as these are fun.</span><br />\r\nKegiatan2 seperti ini menyenangkan.<br />\r\n<span style=\"color:#ff0000\"><strong>| such as it is&nbsp;</strong>/</span><strong><span style=\"color:#ff0000\">&nbsp;they are</span><br />\r\ndigunakan utk mengatakan bahwa sst itu berkualitas rendah atau tidak cukup</strong><br />\r\n<span style=\"color:#0000ff\"><span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\">â–ª </span></span>Breakfast, such as it is, is served until eleven.</span><br />\r\nMakan pagi seperti itu disajikan sampai jam sebelas.</span></p>\r\n', 'Active', 'All', '2020-02-29'),
(11, 'Speaking or This is she.', '<p><span style=\"color:#0000ff; font-family:Garamond; font-size:medium\"><span style=\"color:#000000\"><strong>Meminta berbicara dengan seseorang di telepon.</strong></span></span></p>\r\n\r\n<p><span style=\"color:#0000ff; font-family:Garamond; font-size:medium\"><span style=\"color:#ff0000\">1.</span> (UK) Hello, could I speak to Catherine?<br />\r\n<span style=\"color:#ff0000\">2.</span> (US) Hello could I speak with&nbsp; Catherine?</span></p>\r\n\r\n<p><span style=\"font-family:Garamond; font-size:medium\">Kita dapat menjawab:<br />\r\n<span style=\"color:#0000ff\">Speaking. (sedang bicara)</span></span></p>\r\n\r\n<p><span style=\"font-family:Garamond; font-size:medium\">Atau juga dalam American English:</span></p>\r\n\r\n<p><span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\">This is she.</span></span></p>\r\n', '<p><span style=\"color:#0000ff; font-family:Garamond; font-size:medium\"><span style=\"color:#000000\"><strong>Meminta berbicara dengan seseorang di telepon.</strong></span></span></p>\r\n\r\n<p><span style=\"color:#0000ff; font-family:Garamond; font-size:medium\"><span style=\"color:#ff0000\">1.</span> (UK) Hello, could I speak to Catherine?<br />\r\n<span style=\"color:#ff0000\">2.</span> (US) Hello could I speak with&nbsp; Catherine?</span></p>\r\n\r\n<p><span style=\"font-family:Garamond; font-size:medium\">Kita dapat menjawab:<br />\r\n<span style=\"color:#0000ff\">Speaking. (sedang bicara)</span></span></p>\r\n\r\n<p><span style=\"font-family:Garamond; font-size:medium\">Atau juga dalam American English:</span></p>\r\n\r\n<p><span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\">This is she.</span></span></p>\r\n', 'Active', 'All', '2020-03-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `site_package`
--

CREATE TABLE `site_package` (
  `pack_id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `site_package`
--

INSERT INTO `site_package` (`pack_id`, `nama`, `keterangan`, `harga`) VALUES
(11, 'Paket Grammar dan Kamus', '<ol>\r\n	<li>English Grammar and How To Use It, 4th Edition</li>\r\n	<li>Robby Lou&#39;s Learner&#39;s English-Indonesian Dictionary.</li>\r\n</ol>\r\n', 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `site_package_detail`
--

CREATE TABLE `site_package_detail` (
  `spd_id` int(11) NOT NULL,
  `pack_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `site_package_detail`
--

INSERT INTO `site_package_detail` (`spd_id`, `pack_id`, `book_id`) VALUES
(1, 11, 1),
(2, 11, 2),
(3, 11, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `site_sentence`
--

CREATE TABLE `site_sentence` (
  `sentence_id` int(11) NOT NULL,
  `sentence` varchar(250) DEFAULT NULL,
  `keyword` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `site_sentence`
--

INSERT INTO `site_sentence` (`sentence_id`, `sentence`, `keyword`) VALUES
(1, 'Never go to bed on an argument.', 'go'),
(2, 'Love makes the world go round.', 'go'),
(3, 'Let not the cobbler go beyond his last.', 'go'),
(4, 'Laws catch flies and let hornets go free.', 'go'),
(5, 'Never let the sun go down on your anger.', 'go');

-- --------------------------------------------------------

--
-- Struktur dari tabel `site_slider`
--

CREATE TABLE `site_slider` (
  `id_slider` int(11) NOT NULL,
  `img` varchar(250) NOT NULL,
  `caption` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `site_slider`
--

INSERT INTO `site_slider` (`id_slider`, `img`, `caption`) VALUES
(7, 'YR.png', 'Yama Raja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `site_wod`
--

CREATE TABLE `site_wod` (
  `word_id` int(11) NOT NULL,
  `word` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `word_range` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `content_extend` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `site_wod`
--

INSERT INTO `site_wod` (`word_id`, `word`, `status`, `word_range`, `content`, `content_extend`, `date`) VALUES
(27, 'sock', 'Active', 'All', '<p><span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff; font-size:x-large\"><strong>sock</strong>&sup1;</span><br />\r\n/<span style=\"font-family:DictBats\">sQk</span>; US<span style=\"font-family:DictBats\"> sA;k</span>/<br />\r\nnoun [countable]<br />\r\n<span style=\"color:#ff0000\"><strong>1</strong></span> <strong>kaus kaki</strong><br />\r\n<span style=\"color:#0000ff\"><span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\">â–ª</span> </span>a pair of knee-length socks</span><br />\r\nsepasang kaus kaki setinggi lutut<br />\r\n<span style=\"color:#ff0000\"><strong>2</strong></span> (informal)<br />\r\n<strong>pukulan keras</strong><br />\r\n<span style=\"color:#0000ff\"><span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\">â–ª</span> </span>give sb a sock in the stomach</span><br />\r\n<span style=\"color:#000000\">memberikan pukulan keras pada perut ssorg</span><br />\r\n<strong><span style=\"color:#ff0000\">â–  IDIOM </span><br />\r\n<span style=\"color:#ff0000\">| blow</span></strong><span style=\"color:#ff0000\">/</span><strong><span style=\"color:#ff0000\">knock your sock off</span><br />\r\n<span style=\"color:#000000\">mengejutkan atau mengesankan ssorg</span></strong><br />\r\n<strong><span style=\"color:#ff0000\">| put your sock in it</span> </strong><br />\r\n(UK, informal, kuno)<br />\r\n<strong><span style=\"color:#000000\">digunakan utk menyuruh ssorg utk berhenti berbidara atau utk tidak berisik</span></strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p><span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff; font-size:x-large\"><strong>sock</strong>&sup2;</span><br />\r\n/<span style=\"font-family:DictBats\">sQk</span>; US<span style=\"font-family:DictBats\"> sA;k</span>/<br />\r\nverb [+object] (informal)<br />\r\n<strong>memukul ssorg dengan keras</strong><br />\r\n<span style=\"color:#0000ff\"><span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\">â–ª</span> </span>She socked him in the stomach.</span><br />\r\nDia memukul perutnya dengan keras.<br />\r\n<span style=\"color:#0000ff\">â–ª (kiasan) The restaurant is socking customers with high prices.</span><br />\r\nR&eacute;storan itu mengenakan harga yg gila kepada langganannya.<br />\r\n<span style=\"color:#ff0000\"><strong>â–  IDIOM<br />\r\n| sock it to sb </strong></span><br />\r\n(informal, humor)<br />\r\n<strong>melakukan sst atau menyuruh ssorg melakukan sst dengan keras</strong><br />\r\n<strong><span style=\"color:#ff0000\">| pull your socks up</span></strong><br />\r\n&rarr; lihat <span style=\"color:#0000ff\"><strong>pull</strong>&sup1;</span><br />\r\n<strong><span style=\"color:#ff0000\">PHR v </span><br />\r\n<span style=\"color:#ff0000\">| sock sth away </span></strong>(US)<br />\r\n<strong>menabung dengan menempatkan uang di tempat yg aman</strong></span></p>\r\n', '2020-02-29'),
(28, 'gradual', 'Active', 'All', '<p><span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff; font-size:x-large\"><strong>grad&middot;ual</strong></span><br />\r\n/<span style=\"font-family:DictBats\">&#39;gr&amp;dZuJl</span>/<br />\r\nadjective<br />\r\n<span style=\"color:#ff0000\"><strong>1</strong></span> <span style=\"color:#000000\"><strong>pelan2; terjadi secara perlahan</strong> </span><br />\r\n(lawan <span style=\"color:#0000ff\"><strong>sudden</strong></span>)<br />\r\n<span style=\"font-family:Garamond; font-size:medium\"><span style=\"color:#0000ff\">?</span> </span><span style=\"color:#0000ff\">a gradual change/process</span><br />\r\nperubahan/pros&eacute;s yg terjadi secara perlahan<br />\r\n<span style=\"color:#0000ff\">?</span> </span><span style=\"font-family:Garamond\"><span style=\"font-size:medium\"><span style=\"color:#0000ff\">The progress is very gradual.</span><br />\r\nKemajuan itu terjadi secara perlahan.</span> </span></p>\r\n', '', '2020-03-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_token_auth`
--

CREATE TABLE `tbl_token_auth` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `selector_hash` varchar(255) NOT NULL,
  `is_expired` int(11) NOT NULL DEFAULT 0,
  `expiry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_token_auth`
--

INSERT INTO `tbl_token_auth` (`id`, `email`, `password_hash`, `selector_hash`, `is_expired`, `expiry_date`) VALUES
(35, 'iqbalhasandc200@gmail.com', '$2y$10$b2FGR7KeidHFXR5BPZQE0uyShakiTQiBuhNG2E4J69gOkbeLo0bTe', '$2y$10$tKTPZlpoKrY3O.f.qWauzOv2L8FFbcsgPNWnm58LxzEir2GryqSN.', 1, '2019-11-09 07:05:54'),
(36, 'iqbalhasandc200@gmail.com', '$2y$10$q9AbGurCwvCzlWE0cYfCTuqHPtSRFtNGWtbThMeCUcyI4ijPUPr9q', '$2y$10$VJGEh1DrXqQ5kIm78rjG.OjGG/VPTuqofs72px7s0OTkvkArhsNSG', 1, '2019-11-09 07:06:05'),
(37, 'iqbalhasandc200@gmail.com', '$2y$10$khKltuycu/eWzkxG7okpLuFZ5Rir6tDWoxn3dEBtqXFYnTVs4ewN2', '$2y$10$DOi36BKOZgYQJ.4YnBqpWegBSrA6PmAV1U1eJsViXNuIQMmBAp.JK', 1, '2019-11-09 07:09:31'),
(38, 'iqbalhasandc200@gmail.com', '$2y$10$3fYmMjnsDllA9lVgo6roCe6v2RIjjCy8P3FUJYSAIQEWKeSTyYbuu', '$2y$10$lIrgK3/q.oaJHFor1gA7GuW786db2GADbhlsb4ysdBsjHbjYhU2Ya', 1, '2019-11-09 07:13:11'),
(39, 'iqbalhasandc200@gmail.com', '$2y$10$xn9jzOfWaGiTgdKapLdLrOcIhFwq1WLh.o94ay2qDgUbut472FcC2', '$2y$10$1upTYMQKn1.rjqsWXoqhCuupqadWMLrin/tYRBPRJdZGIoCL7RWg.', 1, '2019-11-11 14:29:30'),
(40, 'iqbalhasandc200@gmail.com', '$2y$10$pQmtTfd.dRRoUbqjJT9ZfOLJjo64W0/OMAn.CwIjZPmpXhPkR.EQm', '$2y$10$mgpmsfe2v15AfeyaJrG.bu1hQixeXRj3Zr6qgS0QByikF2YSSVxsm', 1, '2019-11-11 14:29:42'),
(41, 'iqbalhasandc200@gmail.com', '$2y$10$KOz.4BzYyrY8h0D7Lbkm7u3QIIYo8B0J6hgSAlmH2v/yDBnbBxmqq', '$2y$10$sYg.wYXcrkyaX1RwZO2/vOmPSpT1OGbT4Bl/6ADz5z7AJ85Pq2YL.', 1, '2019-11-11 14:39:59'),
(42, 'iqbalhasandc200@gmail.com', '$2y$10$oD6uew5TmTMi8Nl/l.tue.cbRAk49K5cVZ08zYwzZAC91IIDtemyu', '$2y$10$kAsq4ZHE09P1npJTkKvKkOggBkP8Qu9kynlDQZQmsXRXRabn4Iaha', 1, '2019-11-11 14:40:03'),
(43, 'iqbalhasandc200@gmail.com', '$2y$10$cPZrMBs.LUro0bfdizzbGuq645L6CxluwN4EsYg2kcp0FIGp/CnjC', '$2y$10$Sv7y61f8FIlN4uCdu1eNJeyJ6YXWORSw8DvIuSHyyOX87GIYAhydC', 1, '2019-11-11 14:41:35'),
(44, 'iqbalhasandc200@gmail.com', '$2y$10$peJEzpCO8kN5MyJGC5N1d.MmaKxrAQXpzB/Wk6C6YFVgGKu7iYHhO', '$2y$10$F277wa/YvF5RtUmORPTtfuuOri0ZEAPqh4mqKhgIxHt6xAPivnGUm', 1, '2019-11-11 14:42:55'),
(45, 'iqbalhasandc200@gmail.com', '$2y$10$YWtGVBvaYUKPt49b558veOYzQmlz3v6P8GG8jKyULj8uFwdCTLiZy', '$2y$10$E6nzkR8IwTOpbUUp19UKNOVuE234Z52LbsfOykrm3DHGkPZ2udYg6', 1, '2019-11-11 14:43:07'),
(46, 'iqbalhasandc200@gmail.com', '$2y$10$UmHJWQXldSYKw3FR7k0T2OjvZkV/MU/nQw1YWGJDr/cnTUQn.Qy0m', '$2y$10$o7rsrcioKNjnrLBpjbOkvOrTPMfHkPbYV6.e6VXwd1h9cTOlaOKQa', 1, '2019-11-11 18:00:23'),
(47, 'iqbalhasandc200@gmail.com', '$2y$10$kLYSc04V/Ok6SfmfOYhUyuyuWLc1b3hnrgnUYpfnk4bnVaEtvtsya', '$2y$10$x2EgXTk34j/XOdlnIOk7GuDRaPbau2bp9NupXu71oYN34O1dWLDkm', 1, '2019-11-14 04:17:33'),
(48, 'iqbalhasandc200@gmail.com', '$2y$10$9SJIL4M8pSHvJ2IpKkiyPO.MBj7AQa54EEKtRjpANAydUEro.EfIW', '$2y$10$Z.Bo24FGAwTILtYL43SmCu9rtSpCDJdvHC4AWxtQ4tHutv6ckaiq2', 1, '2019-11-14 12:30:27'),
(49, 'iqbalhasandc200@gmail.com', '$2y$10$dBZpLkfJDqwvAwdO7z5NSuXxydc3lauwaSg7J1TY3j2CXCb2P8NdS', '$2y$10$HfbgBjXcUvGYCqd7nfnbKupdUm3B8odIfxCJqWZsxPgk6pg2B5uXe', 1, '2019-11-17 04:22:50'),
(50, 'iqbalhasandc200@gmail.com', '$2y$10$qE3Mh960cRpCk2.DiwtlJ.MtmOCN1jyjyzCjvaMQCur.xMQcum3wy', '$2y$10$vAWE177EQubTYE64L1tynuuiR2.B7SdjblfaB.5BOIJTfRxuDyUGy', 1, '2019-11-17 08:58:34'),
(51, 'iqbalhasandc200@gmail.com', '$2y$10$Lqkaklrm5YhrBUdTuV1u4.xwmrL6NlvRXelG4Ir.g69OtFkrr15NC', '$2y$10$kDfRVyd13BEPmJwIG/9CbOrdX6WOwhRfOvgjY0NWIlwpItir3Cc6u', 1, '2019-11-20 21:59:31'),
(52, 'iqbalhasandc200@gmail.com', '$2y$10$aE/lBjk3gAV7eTyNi/P2KeRUnTofQKdieOgb/s24mFAsLtgyySezS', '$2y$10$d5PsXZOrYVuqQiwUC331i.zvto2cOfw6kwtoC9U97OgnIOSIWi97C', 1, '2019-11-23 10:59:12'),
(53, 'iqbalhasandc200@gmail.com', '$2y$10$Jw3T4hFi3Q72tZhiw51by.zpOKp5XWgVwO2wvgOYsV6JuN/PhDQRK', '$2y$10$YevdtplGQYQVFcLgjzh.o.Ww3mYRY2ZmA9zhGMEdiOjBS8jpEuWFG', 1, '2019-11-23 13:07:43'),
(54, 'iqbalhasandc200@gmail.com', '$2y$10$bJoWr5yI5u5DzxA3l6WmVOvveYNADA2uoDFwJNgIL5F9rad76Ik4m', '$2y$10$2meyTNIeBw0oV2GiQFFkVeiCQdu355K5dhyDhFveGnUgKGWJebL0u', 1, '2019-12-01 15:22:56'),
(55, 'iqbalhasandc200@gmail.com', '$2y$10$MqxfVULGcbzsRmdCAIU7S.lXrh48wEVcuKuI5gtoFenXoNA1Ohqxu', '$2y$10$X4y0.PylZne1irpAQP.ATeeSm8yynQDBIjRhTlnIKHxwxgTY4HH/S', 1, '2019-12-01 15:24:03'),
(56, 'iqbalhasandc200@gmail.com', '$2y$10$M3rR2Mpt3iuUXkT8nrzHQOV6dY5J4ctX0fT2/1tCQvoHjUgjQ.IFu', '$2y$10$1reS5UCdvbHnVBifCy8CIu0O7l77kKv556YEyyTFajwKiKu2MKIAu', 1, '2019-12-01 15:25:13'),
(57, 'iqbalhasandc200@gmail.com', '$2y$10$aI8Nr68HpGL5MqKznLXTT.2Joj8plxjuieGdb5XJd8jeXJbO.6m4y', '$2y$10$GHV/7jiXBBk95Nh6WEn24.4LnDvQC/y18jw7.SpmDG8h42CQ6/F3C', 1, '2019-12-01 15:27:44'),
(58, 'iqbalhasandc200@gmail.com', '$2y$10$aFHE7VopH4rXIeO/LtCmm.zaACHy8z3bq76PZVDQkKGy9uvqQAHma', '$2y$10$REXHzdOVxKeWi34ZRaRc3uNW6zGInKyg3zGqlG1fHOLg36EGWjzvC', 1, '2019-12-02 17:03:47'),
(59, 'yunaya@gmail.com', '$2y$10$E3fiW.AhYxxMqGjjZiqqGuo59tr0WeQ3vx3HiobUn8nfSE99jOEWa', '$2y$10$RT7sf.ylzRHUvwiqtKfoI.b2wblNLIA6/b3eIDSLSr9XL5u08zova', 0, '2019-12-31 09:39:03'),
(60, 'iqbalhasandc200@gmail.com', '$2y$10$suSq.hgEZmVdG1fLJYnrqem7DG9nIo3s90OMp0JcIiDUagt4rnQ8u', '$2y$10$sWnGkhXvrhAK0faC0WufWOelmo8PfTvBMyP4S5X8uIxSYErJqA1hS', 1, '2019-12-02 17:04:19'),
(61, 'iqbalhasandc200@gmail.com', '$2y$10$m2n1d7aIPjHifBJ0plHvteMw462c21D7R3tJxsw5UrTbtc.JKvfQO', '$2y$10$yaXbvU6KVHU4ZnBHUSGCQOOdJf.W1WmU9hwOn7UxWvyfO1wnjFD7S', 1, '2019-12-02 17:04:20'),
(62, 'iqbalhasandc200@gmail.com', '$2y$10$1MuBy0cahRjXj0lX7FKts.nHIo/UVvrZcnAqCZok1Db6xF8DfjQfC', '$2y$10$K0dJo2ScgGkjeyc2TCPbmO6UuPMJO.QM4n1JjdL26AGu9if4D4owi', 1, '2020-02-26 16:42:32'),
(63, 'zx@gmail.com', '$2y$10$MkpZgMwSPydqsVYM.WM2zegf6b8RUZW6KqTVfcmJ31dmwfW.l7IlG', '$2y$10$d2gfVF3Ym5Lh169TQzg6CeAd80DG6VfUTWxbC9zd2f3E91esH2RdG', 0, '2020-02-03 13:43:45'),
(64, 'rea@gmail.com', '$2y$10$T7sh8XS9P0gn2tLBsfyB5u1q85VuPF3Dso7.TraUOVgv3KhiGyQuy', '$2y$10$weyFwrA1hnFDfDmhxrfRruJGKWGVh7RFdsiOp/4FJr2S4lAXcUsI.', 0, '2020-02-08 09:23:39'),
(65, 'iqbalhasandc200@gmail.com', '$2y$10$SDWtj0lzUWIj2i/2sYbDH.5BpSA.fJ8HDD3o5JK5dhJmRHfcZAs8.', '$2y$10$0D0MXl8aMY04WThdnKjIgO0HiTrEV4eo.4GvaU4vPuiy0T.x9Nd0.', 0, '2020-03-27 10:42:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `ssid` varchar(250) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `email` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(250) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `second_password` varchar(200) NOT NULL,
  `is_activated` tinyint(1) NOT NULL,
  `activation_code` varchar(16) DEFAULT NULL,
  `fpassword_key` varchar(250) NOT NULL,
  `trial` varchar(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `join_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `ssid`, `foto`, `firstname`, `lastname`, `email`, `alamat`, `kontak`, `password`, `second_password`, `is_activated`, `activation_code`, `fpassword_key`, `trial`, `is_active`, `join_on`) VALUES
(11, '7ph6cv6h51k1omlnktl0i0hksj', '', 'Iqbal', 'Hasan', 'iqbalhasandc200@gmail.com', 'Jln. Tanjung Pura Nomor 5, kalideres Jakarta Barat.', '081294236473', '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', '$2y$10$wLXkoBQtVc5eqfPJG9jIE.BqKmodJD9TEqTRX0WfBwRYyjHIQKmWy', 0, NULL, 'FV38jKOso8xAQgsG', '', 1, '2019-12-18'),
(12, '', '', 'herawati', 'naya', 'nayaya204@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', 'nayaya', 0, NULL, '', '', 0, '2019-12-19'),
(13, '', '', 'Roni', 'Ahmad', 'roni_aje@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', 'rona', 0, NULL, '', '', 0, '2019-12-19'),
(14, '', '', 'Dian ', 'Indah', 'dianindah330@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', 'diamond', 0, NULL, '', '', 0, '2019-12-19'),
(15, '', '', 'Rena', 'Yulia', 'yulia_r3n4@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', 'newpassword', 0, NULL, '', '', 0, '2019-12-22'),
(16, '', '', 'Agus', 'Harianto', 'ag_harianto@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', 'newpassword', 0, NULL, '', '', 0, '2019-12-22'),
(17, '', '', 'Agus', 'Harimurti', 'harimurti_agus@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', 'newpassword', 0, NULL, '', '', 1, '2019-12-22'),
(18, '', '', 'Agnes', 'Cha', 'agnes_cha201@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', 'newpassword', 0, NULL, '', '', 0, '2019-12-22'),
(19, '', '', 'charoline', 'diana', 'charoline_mail@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', 'newpassword', 0, NULL, '', '', 1, '2019-12-22'),
(20, '', '', 'Made', 'Bagus', 'bagus_md@yahoo.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', 'newpassword', 0, NULL, '', '', 1, '2019-12-22'),
(21, '', '', 'made', 'bagas', 'bagasmade39@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', 'newpassword', 0, NULL, '', '', 1, '2019-12-22'),
(22, '', '', 'Bima', 'Sakti', 'bimaunsat_12@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', 'newpassword', 0, NULL, '', '', 1, '2019-12-22'),
(23, '', '', 'prabowo', 'jokowi', 'prabowo_jokowi@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', 'erenjeager', 0, NULL, '', '', 1, '2019-12-27'),
(24, '', '', 'ira', 'nana', 'nana@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', 'eren', 0, NULL, '', '', 1, '2019-12-28'),
(25, 'bn9gofe6v2ggns59d8jeriaojg', '', 'zx', 'zxz', 'zx@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', 'eren', 0, NULL, '', '', 1, '2020-01-05'),
(26, '', '', 'raven', 'rave', 'ravenia@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', '$2y$10$JS9xqPA8e0/RApFj4ofQbuaFcTbx2p.nnqi.uWulDnAXcUTTQxTVK', 0, NULL, '', '', 1, '2020-01-05'),
(27, 'v94hhri76rdtkvoo90dcijlauj', '', 'yuna', 'ya', 'yunaya@gmail.com', '', '081294236473', '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', '', 0, '907a1a9a8ac91f6', '', '<br />\r\n<b>', 0, '0000-00-00'),
(28, 'cjde9236j5lib2ofiid2naerop', '', 'iqbal', 'hasan', 'bluexwhitedc100@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', '$2y$10$KCOtjhGKUfNu6RfEzQsfgujfJRwx1N8TCUQN6LOsvabw27R6PV5W2', 0, '812cf9aaf75ae89', '', '<br />\r\n<b>', 0, '0000-00-00'),
(29, '60sdni4f9dvog4u221k22u2d76', '', 'wqiueiuqwie', 'uiweqieuqio', 'rea@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', '', 0, 'a186439f6202520', '', '<br />\r\n<b>', 0, '0000-00-00'),
(30, 'rprq4ovaqilubhm97s35sn06ed', '', 'iqbal', 'rahman', 'rahman@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', '', 0, '92d44da0f929fac', '', '<br />\r\n<b>', 0, '0000-00-00'),
(31, '', '', 'ana', 'yuna', 'yuna@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', '$2y$10$p7EIdxctDVHhZvwiAQhGM.ujn9/N4/AG9m2BfRLgovdP.0sCv6u5q', 0, '03adc4708d5ac8f', '', '<br />\r\n<b>', 0, '0000-00-00'),
(32, '', '', 'a', 'b', 'b@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', '$2y$10$yTOBnN9CuB/V061Z.ZMsc.WeWE5jPbHogj48xD2aaWpSMbgjSlwtO', 0, '0dcf0a88574c316', '', '<br />\r\n<b>', 0, '0000-00-00'),
(33, 'c3aea4qtvpiraqart9cojtmp6f', '', 'hana', 'yuiga', 'hanna@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', '$2y$10$QbZCo0ZtwNnry4T26c0Aa.tFy4zOILVtUFCv/8c1.Lo0AdkNuQm0y', 0, 'ced9528b37d1b66', '', '<br />\r\n<b>', 0, '0000-00-00'),
(34, '', '', 'lona', 'ya', 'lonakawaidesu@gmail.com', '', NULL, '$2y$10$exPJhDUC3iQRM1YU5yP.P.MNH5khl9IKTEaujh2M6LhUiqWRw93NO', '$2y$10$b3nsV7MBerIcAI5Wq9cU2uoXY1.Cs9QLtN1u5uyTJcfbAHkbg/MLa', 0, '9e059fb47b55954', '', '1', 0, '0000-00-00'),
(35, '', '', 'yuna', 'ya', 'exa@gmail.com', '', NULL, '$2y$10$MoLyijXhFUvBvx6.0xbkd.QJwEViAgP12yDfu5bzGiYQwJpK2dTcC', '$2y$10$tV9Xo6uor0oqCBOIRkPKReMgfi5e/XiwaSrrbDbrUSz1aQo42tD4q', 0, 'a223be90eed9f20', '', '<br />\r\n<b>', 0, '0000-00-00'),
(36, '', '', 'Yui', 'deana', 'deana@gmail.com', '', '', '$2y$10$qUKJcNUGlT8Rh9dTXfkXAOQ6kzu9O4AH6eJOj1UfbpavgMoArxkCW', '$2y$10$ZKK.inUyENY0k4mlHSLNn.A5ctU01Qm12nV0pVYTarEYbAYzREbk6', 0, '1011d753acf996b', '', '1', 0, '0000-00-00'),
(37, '', '', 'rea', 'ayunda', 'reaya@gmail.com', '', NULL, '$2y$10$b4Xy5GufoUDYd1F2Ckh.O.x7uLiGry7ALBzc/AxkQQHj8GvxJpB9m', '$2y$10$LoH0jRX18jJgQgQDyGSBEeikT5XqU5c.9aEtJwRtoXhirJqbcG7Gm', 0, 'f9849cf66c0db47', '', '<br />\r\n<b>', 0, '0000-00-00'),
(38, '', '', 'dewa', '19', 'aero@gmail.com', '', NULL, '$2y$10$PDUOuo5PSLtxy354Drh4SeKIF44tII41WXfBnhTVcsizoxrnkIT1K', '$2y$10$dwJ5JNlBRQ2vm3XIPx8wbOx5fZ5zTei5qnefC11E1ez9Nm8ND.U3.', 0, 'd13e4faa523ff40', '', '1', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_book_catalog`
--

CREATE TABLE `users_book_catalog` (
  `catalog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_book_catalog`
--

INSERT INTO `users_book_catalog` (`catalog_id`, `user_id`, `book_id`, `timestamp`) VALUES
(12, 11, 1, '2020-02-15 02:40:24'),
(13, 11, 2, '2020-02-15 02:40:24'),
(14, 11, 3, '2020-02-15 02:40:24'),
(15, 36, 1, '2020-02-28 16:36:11'),
(16, 36, 2, '2020-02-28 16:36:11'),
(17, 36, 3, '2020-02-28 16:36:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_detail`
--

CREATE TABLE `users_detail` (
  `user_id` int(11) NOT NULL,
  `no_telepon` int(11) NOT NULL,
  `alamat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_order`
--

CREATE TABLE `users_order` (
  `Order_id` int(11) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Phone` varchar(250) NOT NULL,
  `Note` text NOT NULL,
  `Date` date NOT NULL,
  `pack_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Bank` varchar(250) NOT NULL,
  `Total` varchar(250) NOT NULL,
  `Status` varchar(250) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_order`
--

INSERT INTO `users_order` (`Order_id`, `Email`, `Phone`, `Note`, `Date`, `pack_id`, `user_id`, `Bank`, `Total`, `Status`) VALUES
(20, 'iqbalhasandc200@gmail.com', '081294236473', 'Siap', '2020-01-29', 11, 11, 'BCA', '150000', 'success'),
(21, 'iqbalhasandc200@gmail.com', '081294236473', 'Sesite', '2020-01-29', 11, 11, 'BCA', '150000', 'success'),
(22, 'iqbalhasandc200@gmail.com', '081294236473', '', '2020-01-01', 11, 11, 'BCA', '150000', 'success'),
(23, 'iqbalhasandc200@gmail.com', '081294236473', 'SASASA', '2020-02-11', 11, 11, 'BCA', '150000', 'on-hold'),
(24, 'iqbalhasandc200@gmail.com', '081294236473', '', '2020-02-11', 11, 11, 'BCA', '150000', 'on-hold'),
(25, 'iqbalhasandc200@gmail.com', '081294236473', 'sasasa', '2020-02-11', 11, 11, 'BCA', '150000', 'on-hold'),
(26, 'iqbalhasandc200@gmail.com', '081294236473', '', '2020-02-11', 11, 11, 'BCA', '150000', 'on-hold'),
(27, 'iqbalhasandc200@gmail.com', '081294236473', '', '2020-02-11', 11, 11, 'BCA', '150000', 'on-hold'),
(28, 'iqbalhasandc200@gmail.com', '081294236473', '', '2020-02-11', 11, 11, 'BCA', '150000', 'on-hold'),
(29, 'iqbalhasandc200@gmail.com', '081294236473', '', '2020-02-11', 11, 11, 'BCA', '150000', 'on-hold'),
(30, 'iqbalhasandc200@gmail.com', '081294236473', '', '2020-02-11', 11, 11, 'BCA', '150000', 'on-hold'),
(31, 'iqbalhasandc200@gmail.com', '081294236473', '', '2020-02-11', 11, 11, 'BCA', '150000', 'on-hold'),
(32, 'iqbalhasandc200@gmail.com', '081294236473', '', '2020-02-11', 11, 11, 'BCA', '150000', 'on-hold'),
(33, 'iqbalhasandc200@gmail.com', '081294236473', '', '2020-02-11', 11, 11, 'BCA', '150000', 'on-hold'),
(34, 'iqbalhasandc200@gmail.com', '081294236473', '', '2020-02-11', 11, 11, 'BCA', '150000', 'on-hold'),
(35, 'iqbalhasandc200@gmail.com', '081294236473', '', '2020-02-14', 11, 11, 'BCA', '150000', 'success'),
(36, 'iqbalhasandc200@gmail.com', '081294236473', '', '2020-02-15', 11, 11, 'BCA', '150000', 'on-hold'),
(37, 'exa@gmail.com', '', '', '2020-02-20', 11, 35, 'BCA', '150000', 'success'),
(38, 'deana@gmail.com', '', '', '2020-02-28', 11, 36, 'BCA', '150000', 'success');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_payment`
--

CREATE TABLE `user_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `bank` varchar(250) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `jumlah` int(100) NOT NULL,
  `pesan` text NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL,
  `dihapus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_payment`
--

INSERT INTO `user_payment` (`payment_id`, `order_id`, `nama`, `email`, `bank`, `tanggal_transfer`, `jumlah`, `pesan`, `date`, `status`, `dihapus`) VALUES
(16, 20, 'Iqbal', 'iqbalhasandc200@gmail.com', 'BCA', '2020-01-29', 150000, 'Huray			\r\n			', '2020-01-29', 0, 0),
(17, 21, 'Iqbal', 'iqbalhasandc200@gmail.com', 'BCA', '2020-01-29', 150000, 'sister noise', '2020-01-29', 0, 0),
(18, 22, 'iqbal', 'iqbalhasandc200@gmail.com', 'BCA', '2020-01-01', 150000, '				\r\n			', '2020-01-30', 0, 0),
(19, 35, 'Iqbal', 'iqbalhasandc200@gmail.com', 'BCA', '2020-02-14', 150000, 'Tolong cepat ya!', '2020-02-14', 0, 0),
(20, 20, 'iqbal', 'iqbalhasandc200@gmail.com', 'BCA', '2020-02-15', 150000, '				\r\n			', '2020-02-15', 0, 0),
(21, 37, 'yuna', 'exa@gmail.com', 'BCA', '2020-02-20', 150000, '				\r\n			', '2020-02-20', 0, 0),
(22, 38, 'Yui', 'deana@gmail.com', 'BCA', '2020-02-28', 150000, '				\r\n			', '2020-02-28', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_section_admin`
--

CREATE TABLE `user_section_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `role` varchar(200) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `usia` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `kontak` varchar(200) NOT NULL,
  `tanggal bergabung` date NOT NULL,
  `foto` varchar(250) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_section_admin`
--

INSERT INTO `user_section_admin` (`admin_id`, `admin_username`, `admin_password`, `nama`, `role`, `gender`, `usia`, `email`, `kontak`, `tanggal bergabung`, `foto`, `is_active`) VALUES
(1, 'admin', 'admin', 'Admin', 'Administrator', 'Laki-laki', '22', 'bluexwhitedc100@gmail.com', '081294236473', '0000-00-00', 'Lu-BGreenhorn.png', 1),
(3, 'iqbalhasan', 'erenjeager', 'Iqbal Hasan', 'Administrator', 'Laki-laki', '22', 'iqbalhasandc200@gmail.com', '081247483647', '2019-09-01', 'Iqbal.jpg', 1),
(10, 'example', 'exampleexa', 'example', 'Administrator', '', '', '', '', '2019-12-17', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indeks untuk tabel `book_chapter`
--
ALTER TABLE `book_chapter`
  ADD PRIMARY KEY (`chapter_id`);

--
-- Indeks untuk tabel `book_price`
--
ALTER TABLE `book_price`
  ADD KEY `book_price_ibfk_1` (`book_id`);

--
-- Indeks untuk tabel `book_trial`
--
ALTER TABLE `book_trial`
  ADD PRIMARY KEY (`item_id`);

--
-- Indeks untuk tabel `site_article`
--
ALTER TABLE `site_article`
  ADD PRIMARY KEY (`article_id`);

--
-- Indeks untuk tabel `site_info`
--
ALTER TABLE `site_info`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `site_lead`
--
ALTER TABLE `site_lead`
  ADD PRIMARY KEY (`id_lead`);

--
-- Indeks untuk tabel `site_lesson`
--
ALTER TABLE `site_lesson`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `site_package`
--
ALTER TABLE `site_package`
  ADD PRIMARY KEY (`pack_id`);

--
-- Indeks untuk tabel `site_package_detail`
--
ALTER TABLE `site_package_detail`
  ADD PRIMARY KEY (`spd_id`),
  ADD KEY `pack_id` (`pack_id`);

--
-- Indeks untuk tabel `site_sentence`
--
ALTER TABLE `site_sentence`
  ADD PRIMARY KEY (`sentence_id`);

--
-- Indeks untuk tabel `site_slider`
--
ALTER TABLE `site_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indeks untuk tabel `site_wod`
--
ALTER TABLE `site_wod`
  ADD PRIMARY KEY (`word_id`);

--
-- Indeks untuk tabel `tbl_token_auth`
--
ALTER TABLE `tbl_token_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `users_book_catalog`
--
ALTER TABLE `users_book_catalog`
  ADD PRIMARY KEY (`catalog_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users_order`
--
ALTER TABLE `users_order`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indeks untuk tabel `user_payment`
--
ALTER TABLE `user_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indeks untuk tabel `user_section_admin`
--
ALTER TABLE `user_section_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `book_chapter`
--
ALTER TABLE `book_chapter`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `site_lesson`
--
ALTER TABLE `site_lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `site_package`
--
ALTER TABLE `site_package`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `site_package_detail`
--
ALTER TABLE `site_package_detail`
  MODIFY `spd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `site_sentence`
--
ALTER TABLE `site_sentence`
  MODIFY `sentence_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `site_slider`
--
ALTER TABLE `site_slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `site_wod`
--
ALTER TABLE `site_wod`
  MODIFY `word_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tbl_token_auth`
--
ALTER TABLE `tbl_token_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `users_book_catalog`
--
ALTER TABLE `users_book_catalog`
  MODIFY `catalog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users_order`
--
ALTER TABLE `users_order`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user_section_admin`
--
ALTER TABLE `user_section_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
