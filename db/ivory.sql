-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Des 2020 pada 06.09
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ivory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `deadline` date NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `projects`
--

INSERT INTO `projects` (`project_id`, `judul`, `deskripsi`, `deadline`, `status`, `created_at`) VALUES
(29, 'Website Baru', 'membuat website baru ', '2020-12-24', 0, '2020-12-13'),
(32, 'project baru', 'projet baru', '2020-12-17', 0, '2020-12-21'),
(36, '123123', '123123', '2020-12-30', 0, '2020-12-21'),
(38, '234234', '234234', '2020-12-24', 0, '2020-12-21'),
(39, '123123', '123123', '2020-12-23', 0, '2020-12-21'),
(40, 'TUGAS ERGONOMI', 'menganlisis postur tubuh', '2020-12-30', 0, '2020-12-25'),
(41, '12312312311', '123123', '2020-12-31', 0, '2020-12-25'),
(42, '414123', '1312314', '2020-12-26', 0, '2020-12-25'),
(43, 'test', 'test', '2020-12-30', 0, '2020-12-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sprint_child`
--

CREATE TABLE `sprint_child` (
  `child_id` int(11) NOT NULL,
  `child_judul` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sprint_child`
--

INSERT INTO `sprint_child` (`child_id`, `child_judul`, `parent_id`, `status`) VALUES
(70, 'Tambah fitur baru di landing page', 34, 1),
(71, 'Bug di Login', 35, 1),
(72, 'Sistem Login', 36, 0),
(76, 'latar belakang', 48, 1),
(77, 'bab`1', 48, 0),
(78, 'bab 2', 49, 1),
(79, '23232', 49, 0),
(80, '232', 49, 1),
(82, '3443', 49, 0),
(83, '343434', 49, 1),
(84, '343334', 49, 1),
(85, '3443434', 49, 1),
(86, '343434', 49, 0),
(87, '343434', 49, 0),
(90, '1231', 35, 1),
(91, '123123', 35, 1),
(92, '123123', 35, 1),
(93, '123213', 35, 1),
(94, '131232', 35, 0),
(95, '12313', 35, 0),
(96, '312312', 35, 0),
(97, '123123', 56, 0),
(98, '123123', 56, 1),
(99, '123123', 56, 1),
(100, '123123', 56, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sprint_parent`
--

CREATE TABLE `sprint_parent` (
  `parent_id` int(11) NOT NULL,
  `parent_judul` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sprint_parent`
--

INSERT INTO `sprint_parent` (`parent_id`, `parent_judul`, `project_id`) VALUES
(34, 'Sprint 1', 29),
(35, 'Backlog 1', 29),
(36, 'Done 1', 29),
(40, 'New...', 32),
(44, 'New...', 36),
(46, 'New...', 38),
(47, 'New...', 36),
(48, 'Minggu =1', 40),
(49, 'minggu 2', 40),
(50, 'minggu 3', 40),
(51, 'minggu 4', 40),
(52, '34343', 40),
(53, 'New...', 41),
(54, 'New...', 42),
(55, 'test 1', 29),
(56, '2434234324', 43),
(57, '123123123', 43),
(58, '123123123', 43);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `hobby` text NOT NULL,
  `skill` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `about`, `hobby`, `skill`) VALUES
(1, 'Annas adharuqudni', 'annas@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aku seorang manusia', 'makan', 'tidur'),
(2, 'gisa', 'gisa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aku cakep', 'tidur', 'makan es'),
(3, 'arip', 'arip@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', ''),
(4, 'friska', 'friska@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', ''),
(5, 'naufalll', 'naufal@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'awdasda', 'adawd', '123123'),
(8, 'wiwik', 'wiwik@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', ''),
(12, '123123', '3124@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', ''),
(15, 'frans', 'frans@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', ''),
(16, 'brandon', 'brando@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'nama saya brandon', 'makan', 'tidur'),
(17, 'nisa', 'nisa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', ''),
(18, 'annas1', 'annas1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'test', '123', 'blaaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `workspace`
--

CREATE TABLE `workspace` (
  `id_workspace` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `workspace`
--

INSERT INTO `workspace` (`id_workspace`, `user_id`, `project_id`, `role`) VALUES
(43, 1, 29, 0),
(44, 2, 29, 1),
(48, 16, 32, 0),
(49, 16, 29, 1),
(53, 16, 36, 0),
(55, 1, 38, 0),
(56, 5, 36, 0),
(57, 17, 40, 0),
(58, 1, 40, 1),
(59, 17, 41, 0),
(60, 17, 42, 0),
(61, 18, 43, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indeks untuk tabel `sprint_child`
--
ALTER TABLE `sprint_child`
  ADD PRIMARY KEY (`child_id`),
  ADD KEY `fk_parentid` (`parent_id`);

--
-- Indeks untuk tabel `sprint_parent`
--
ALTER TABLE `sprint_parent`
  ADD PRIMARY KEY (`parent_id`),
  ADD KEY `fk_projectid` (`project_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `workspace`
--
ALTER TABLE `workspace`
  ADD PRIMARY KEY (`id_workspace`),
  ADD KEY `fk_userid` (`user_id`),
  ADD KEY `fk_projectid` (`project_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `sprint_child`
--
ALTER TABLE `sprint_child`
  MODIFY `child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `sprint_parent`
--
ALTER TABLE `sprint_parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `workspace`
--
ALTER TABLE `workspace`
  MODIFY `id_workspace` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sprint_child`
--
ALTER TABLE `sprint_child`
  ADD CONSTRAINT `sprint_child_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `sprint_parent` (`parent_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sprint_parent`
--
ALTER TABLE `sprint_parent`
  ADD CONSTRAINT `sprint_parent_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `workspace`
--
ALTER TABLE `workspace`
  ADD CONSTRAINT `workspace_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `workspace_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
