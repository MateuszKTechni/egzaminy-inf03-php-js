-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2025 at 01:29 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hodowala`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rasy`
--

CREATE TABLE `rasy` (
  `id` int(11) NOT NULL,
  `rasy` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rasy`
--

INSERT INTO `rasy` (`id`, `rasy`) VALUES
(1, 'peruwianka'),
(2, 'szetlandzka'),
(3, 'texel'),
(4, 'lunkarya'),
(5, 'merino'),
(6, 'american'),
(7, 'crested'),
(8, 'rozetka abisyńs'),
(9, 'ridgeback'),
(10, 'teddy rex'),
(11, ' somali'),
(12, 'curly'),
(13, 'skinny');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `swinki`
--

CREATE TABLE `swinki` (
  `id` int(11) NOT NULL,
  `rasy_id` int(11) DEFAULT NULL,
  `data_ur` date DEFAULT NULL,
  `miot` varchar(10) DEFAULT NULL,
  `opis` text DEFAULT NULL,
  `imie` varchar(10) DEFAULT NULL,
  `cena` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `swinki`
--

INSERT INTO `swinki` (`id`, `rasy_id`, `data_ur`, `miot`, `opis`, `imie`, `cena`) VALUES
(1, 6, '2022-06-02', 'H4', 'Krótkowłosa American, biało brązowa z uroczymi ciemniejszymi włoskami, bardzo wesoła i żywiołowa, najładniejsza z miotu. Je ładnie i umie już pić z poidełka, lubi najbardziej natkę od pietruszki', 'Crejzy', 100),
(2, 6, '2022-06-02', 'H4', 'Krótkowłosa American, biało brązowa, jedno oczko jasnobrązowe. Spokojna i nieśmiała, lecz pewnie niebawem się rozkręci. Moja ulubiona - bo najmniejsza. Je ładnie i umie już pić z poidełka, lubi najbardziej koperek :-)', 'Biała', 95),
(3, 6, '2022-06-02', 'H4', 'Krótkowłosa American, cala brązowiutka z piękną białą łezką na czole i bialutkim noskiem! Nic tylko przytulić. Wesoła i żywiołowa, bardzo ciekawska. Je ładnie i umie już pić z poidełka, lubi najbardziej paprykę', 'Lucy', 120),
(4, 7, '2022-06-30', 'G3', 'Moje ulubione świnki morskie - Crested. Ta ma bardzo dużą biała łatkę na czole i widać że będzie niezła zawadiaka. Wesoła, często skacze i wesoło piszczy.  Je ładnie i umie już pić z poidełka, lubi najbardziej ogórki', 'Bąbelek', 150),
(5, 7, '2022-06-30', 'G3', 'Moje ulubione świnki morskie - Crested. Ta ma malutką i rozwianą plamkę na czole i jest bardziej wybarwiona brązem niż jej braciszek. Wesoła, ciekawska, ufna.  Je ładnie i umie już pić z poidełka, lubi najbardziej arbuzy', 'Lulu', 150),
(6, 1, '2022-06-02', 'I5', 'Piękna peruwianka. Biała z lekko płowymi włoskami na końcach. Jeszcze jej włoski są krótkie ale z czasem urosną na piękne długie włosy. Dostojna i spokojna, długo jej zabiera przyzwyczajenie się do właściciela. Je ładnie i umie już pić z poidełka, lubi najbardziej sałatę rzymską', 'Cindy', 200),
(7, 1, '2022-06-02', 'I5', 'Piękna peruwianka. Brązowa po jednej stronie i lekko czarna po drugiej. Wyjątkowe umaszczenie. Bardzo ufna i wesoła, cały czas podskakuje i wesoło piszczy. Cały czas głodna. Je ładnie i umie już pić z poidełka, lubi najbardziej jabłuszka', 'Wendy', 200),
(8, 1, '2022-06-02', 'I5', 'Piękna peruwianka. Czarno - biała. Zdecydowanie najładniejsza z miotu. Jeszcze jej włoski są krótkie ale z czasem urosną na piękne długie włosy. spokojna ale ufna. Je ładnie i umie już pić z poidełka, lubi najbardziej sianko', 'Mała', 250),
(9, 1, '2022-06-02', 'I5', 'Piękna peruwianka. Biała z lekko płowymi włoskami na końcach. Podobna do swojej siostry. Jeszcze jej włoski są krótkie ale z czasem urosną na piękne długie włosy. Dostojna i spokojna, długo jej zabiera przyzwyczajenie się do właściciela. Je ładnie i umie już pić z poidełka, lubi najbardziej sałatę rzymską', 'Lola', 200),
(10, 8, '2022-07-29', 'C4', 'Popularna rozetka abisyńska. Łatwa w pielęgnacji na sam początek. Wesoła. Jeszcze bardzo malutka, pije mleko matki - do sprzedania za miesiąc', 'Ed', 0),
(11, 8, '2022-07-29', 'C4', 'Popularna rozetka abisyńska. Łatwa w pielęgnacji na sam początek. śpioch straszny ale ufna. Jeszcze bardzo malutka, pije mleko matki - do sprzedania za miesiąc', 'Tikka', 0),
(12, 8, '2022-07-29', 'C4', 'Popularna rozetka abisyńska. Łatwa w pielęgnacji na sam początek. Spokojna i nieufna. Jeszcze bardzo malutka, pije mleko matki - do sprzedania za miesiąc', 'Frania', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `rasy`
--
ALTER TABLE `rasy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `swinki`
--
ALTER TABLE `swinki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rasy_id` (`rasy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rasy`
--
ALTER TABLE `rasy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `swinki`
--
ALTER TABLE `swinki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `swinki`
--
ALTER TABLE `swinki`
  ADD CONSTRAINT `swinki_ibfk_1` FOREIGN KEY (`rasy_id`) REFERENCES `rasy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
