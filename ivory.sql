-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2020 pada 07.35
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
(30, 'asdawd', 'asdasd', '2020-12-17', 0, '2020-12-20'),
(32, 'project baru', 'projet baru', '2020-12-17', 0, '2020-12-21'),
(36, '123123', '123123', '2020-12-30', 0, '2020-12-21'),
(38, '234234', '234234', '2020-12-24', 0, '2020-12-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sprint_child`
--

CREATE TABLE `sprint_child` (
  `child_id` int(11) NOT NULL,
  `child_judul` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sprint_child`
--

INSERT INTO `sprint_child` (`child_id`, `child_judul`, `parent_id`) VALUES
(70, 'Tambah fitur baru di landing page', 34),
(71, 'Bug di Login', 35),
(72, 'Sistem Login', 36);

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
(37, 'New...', 30),
(40, 'New...', 32),
(44, 'New...', 36),
(46, 'New...', 38);

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
(16, 'brandon', 'brando@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'nama saya brandon', 'makan', 'tidur');

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
(45, 5, 30, 0),
(48, 16, 32, 0),
(49, 16, 29, 1),
(53, 16, 36, 0),
(55, 1, 38, 0);

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
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `sprint_child`
--
ALTER TABLE `sprint_child`
  MODIFY `child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `sprint_parent`
--
ALTER TABLE `sprint_parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `workspace`
--
ALTER TABLE `workspace`
  MODIFY `id_workspace` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

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
