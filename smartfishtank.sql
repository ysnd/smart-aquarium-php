-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 05:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartfishtank`
--

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` varchar(16) NOT NULL,
  `board` varchar(50) DEFAULT NULL,
  `suhu` float DEFAULT NULL,
  `status_baca_suhu` varchar(10) DEFAULT NULL,
  `lampu` varchar(5) DEFAULT NULL,
  `heater` varchar(5) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `board`, `suhu`, `status_baca_suhu`, `lampu`, `heater`, `time`, `date`) VALUES
('0z0l7H7hY3', 'ESP32_1', 30.25, 'Success', 'OFF', 'OFF', '15:40:14', '2024-01-11'),
('11sLYxrBev', 'ESP32_1', 27.62, 'Success', 'OFF', 'OFF', '15:34:29', '2024-01-11'),
('1H3hlzlghW', 'ESP32_1', 33.25, 'Success', 'OFF', 'OFF', '15:44:39', '2024-01-11'),
('1vffRMgErj', 'ESP32_1', 27.5, 'Success', 'OFF', 'OFF', '15:35:28', '2024-01-11'),
('25vnP4qKXA', 'ESP32_1', 27.37, 'Success', 'OFF', 'OFF', '15:37:20', '2024-01-11'),
('2AADiDcvA8', 'ESP32_1', 32.63, 'Success', 'OFF', 'OFF', '15:41:33', '2024-01-11'),
('2CdHfs5Cs1', 'ESP32_1', 32.19, 'Success', 'OFF', 'OFF', '15:41:51', '2024-01-11'),
('2FDyTRyWNL', 'ESP32_1', 27.37, 'Success', 'OFF', 'OFF', '15:38:01', '2024-01-11'),
('365FKtntUg', 'ESP32_1', 27.69, 'Success', 'OFF', 'OFF', '15:34:17', '2024-01-11'),
('39HacfJ5co', 'ESP32_1', 27.56, 'Success', 'OFF', 'OFF', '15:35:10', '2024-01-11'),
('3JsJ8NkLwW', 'ESP32_1', 28, 'Success', 'OFF', 'OFF', '15:39:50', '2024-01-11'),
('47jfz9ErmN', 'ESP32_1', 31.31, 'Success', 'OFF', 'OFF', '15:42:40', '2024-01-11'),
('4aUfEuF0KX', 'ESP32_1', 34.13, 'Success', 'OFF', 'OFF', '15:44:08', '2024-01-11'),
('4yu7cjderD', 'ESP32_1', 27.56, 'Success', 'OFF', 'OFF', '15:34:59', '2024-01-11'),
('63zK5XrmEV', 'ESP32_1', 33.94, 'Success', 'OFF', 'OFF', '15:44:02', '2024-01-11'),
('6SnKJnQVY9', 'ESP32_1', 27.62, 'Success', 'OFF', 'OFF', '15:00:15', '2024-01-11'),
('8ojgU8C9uq', 'ESP32_1', 27.75, 'Success', 'OFF', 'OFF', '15:33:52', '2024-01-11'),
('91NnbPhWf2', 'ESP32_1', 27.37, 'Success', 'OFF', 'OFF', '15:38:54', '2024-01-11'),
('91iiaLhj0F', 'ESP32_1', 31, 'Success', 'OFF', 'OFF', '15:43:09', '2024-01-11'),
('99w9wa688U', 'ESP32_1', 32.19, 'Success', 'OFF', 'OFF', '15:40:56', '2024-01-11'),
('9HviG9oQSj', 'ESP32_1', 30.94, 'Success', 'OFF', 'ON', '15:43:21', '2024-01-11'),
('9OtlY2KEMf', 'ESP32_1', 27.37, 'Success', 'OFF', 'OFF', '15:39:26', '2024-01-11'),
('9bWSVjWWG8', 'ESP32_1', 27.5, 'Success', 'OFF', 'OFF', '15:35:16', '2024-01-11'),
('9g5IijPf6h', 'ESP32_1', 27.69, 'Success', 'OFF', 'OFF', '15:33:58', '2024-01-11'),
('ATGRHP8ept', 'ESP32_1', 32.31, 'Success', 'OFF', 'OFF', '15:41:45', '2024-01-11'),
('AWRQDSKekD', 'ESP32_1', 27.44, 'Success', 'OFF', 'OFF', '15:36:44', '2024-01-11'),
('AaSBb9QTFM', 'ESP32_1', 27.31, 'Success', 'OFF', 'ON', '15:39:32', '2024-01-11'),
('ArjCDKkcs8', 'ESP32_1', 27.69, 'Success', 'OFF', 'OFF', '15:34:23', '2024-01-11'),
('BG4KCzLFh0', 'ESP32_1', 31.12, 'Success', 'OFF', 'OFF', '15:42:58', '2024-01-11'),
('BURZ5zmdqB', 'ESP32_1', 33.25, 'Success', 'OFF', 'ON', '15:43:51', '2024-01-11'),
('BeZkOSfNyY', 'ESP32_1', 27.56, 'Success', 'OFF', 'OFF', '15:35:22', '2024-01-11'),
('BhfeaJElrI', 'ESP32_1', 27.31, 'Success', 'OFF', 'OFF', '15:39:44', '2024-01-11'),
('Bm09F28AQg', 'ESP32_1', 27.37, 'Success', 'OFF', 'OFF', '15:37:08', '2024-01-11'),
('CFIdVlbsKD', 'ESP32_1', 32.81, 'Success', 'OFF', 'OFF', '15:44:57', '2024-01-11'),
('CeIn1v2r1M', 'ESP32_1', 32.94, 'Success', 'OFF', 'OFF', '15:41:14', '2024-01-11'),
('CqQL2wFE93', 'ESP32_1', 28.87, 'Success', 'OFF', 'OFF', '15:09:37', '2024-01-11'),
('DeGWtY9SoJ', 'ESP32_1', 27.62, 'Success', 'OFF', 'OFF', '15:00:38', '2024-01-11'),
('ENY5kMfitR', 'ESP32_1', 27.81, 'Success', 'OFF', 'OFF', '15:02:03', '2024-01-11'),
('FCYhRLYpV0', 'ESP32_1', 27.37, 'Success', 'ON', 'OFF', '15:38:43', '2024-01-11'),
('FJFFjjsXN3', 'ESP32_1', 27.5, 'Success', 'OFF', 'OFF', '14:59:30', '2024-01-11'),
('GA6NoXd4t6', 'ESP32_1', 27.87, 'Success', 'OFF', 'OFF', '15:02:20', '2024-01-11'),
('GCJsq7NsqX', 'ESP32_1', 27.31, 'Success', 'OFF', 'ON', '15:39:38', '2024-01-11'),
('GV1MEiAp7V', 'ESP32_1', 27.81, 'Success', 'OFF', 'OFF', '15:01:51', '2024-01-11'),
('HQd8SXQ05a', 'ESP32_1', 34.06, 'Success', 'OFF', 'OFF', '15:44:15', '2024-01-11'),
('IeuLUBNoar', 'ESP32_1', 27.31, 'Success', 'OFF', 'OFF', '15:39:08', '2024-01-11'),
('JMcQay0tq6', 'ESP32_1', 27.75, 'Success', 'OFF', 'OFF', '15:34:04', '2024-01-11'),
('JqDNzEL2EC', 'ESP32_1', 27.69, 'Success', 'OFF', 'OFF', '15:01:20', '2024-01-11'),
('KB32MELrSV', 'ESP32_1', 27.37, 'Success', 'OFF', 'OFF', '15:37:44', '2024-01-11'),
('LIa1IKlcng', 'ESP32_1', 32.94, 'Success', 'OFF', 'OFF', '15:44:51', '2024-01-11'),
('LdW0jgK5wP', 'ESP32_1', 27.87, 'Success', 'OFF', 'OFF', '15:02:37', '2024-01-11'),
('M693jAR1Pm', 'ESP32_1', 27.5, 'Success', 'OFF', 'OFF', '14:59:55', '2024-01-11'),
('MqJO7hzzaJ', 'ESP32_1', 29.94, 'Success', 'OFF', 'OFF', '15:40:08', '2024-01-11'),
('MxswHVPdVb', 'ESP32_1', 27.44, 'Success', 'OFF', 'OFF', '15:36:33', '2024-01-11'),
('NYC5ND1gJm', 'ESP32_1', 31.5, 'Success', 'OFF', 'ON', '15:43:39', '2024-01-11'),
('Ns81DK4ORB', 'ESP32_1', 32.75, 'Success', 'OFF', 'OFF', '15:41:02', '2024-01-11'),
('OvfcrOkqKR', 'ESP32_1', 33.69, 'Success', 'OFF', 'OFF', '15:43:57', '2024-01-11'),
('PbfRIRMzKY', 'ESP32_1', 27.87, 'Success', 'OFF', 'OFF', '15:02:32', '2024-01-11'),
('Q0Gul91VI1', 'ESP32_1', 27.44, 'Success', 'OFF', 'OFF', '15:36:20', '2024-01-11'),
('Q5c8cJBt4p', 'ESP32_1', 27.69, 'Success', 'ON', 'OFF', '15:01:02', '2024-01-11'),
('QFMkNpskRg', 'ESP32_1', 27.31, 'Success', 'OFF', 'OFF', '15:39:14', '2024-01-11'),
('QjnwgTQlRD', 'ESP32_1', 33.06, 'Success', 'OFF', 'OFF', '15:44:45', '2024-01-11'),
('QmhgyEDTez', 'ESP32_1', 27.37, 'Success', 'OFF', 'OFF', '15:38:25', '2024-01-11'),
('QqQdquASrn', 'ESP32_1', 31.69, 'Success', 'OFF', 'OFF', '15:42:16', '2024-01-11'),
('RWoe2eS0YR', 'ESP32_1', 32.63, 'Success', 'OFF', 'ON', '15:43:45', '2024-01-11'),
('RkGOnnXW1g', 'ESP32_1', 27.94, 'Success', 'OFF', 'OFF', '15:02:54', '2024-01-11'),
('T4RWJr8UV1', 'ESP32_1', 27.56, 'Success', 'OFF', 'OFF', '15:00:10', '2024-01-11'),
('T6lU3ALcx5', 'ESP32_1', 31.62, 'Success', 'OFF', 'OFF', '15:42:22', '2024-01-11'),
('To4SjYSXzJ', 'ESP32_1', 27.62, 'Success', 'OFF', 'OFF', '15:34:35', '2024-01-11'),
('UB1WMSzNgp', 'ESP32_1', 27.69, 'Success', 'ON', 'OFF', '15:00:50', '2024-01-11'),
('UBRdKW4yzA', 'ESP32_1', 31.12, 'Success', 'OFF', 'OFF', '15:40:20', '2024-01-11'),
('UUFgQaNlhv', 'ESP32_1', 31.12, 'Success', 'OFF', 'OFF', '15:43:04', '2024-01-11'),
('Ux3dL0nQSB', 'ESP32_1', 31.31, 'Success', 'OFF', 'OFF', '15:40:38', '2024-01-11'),
('WLPM5LoUVi', 'ESP32_1', 27.31, 'Success', 'OFF', 'OFF', '15:38:13', '2024-01-11'),
('WlnbwKaZao', 'ESP32_1', 27.5, 'Success', 'OFF', 'OFF', '15:35:51', '2024-01-11'),
('Wt2h6LYZ2K', 'ESP32_1', 31.19, 'Success', 'OFF', 'OFF', '15:40:50', '2024-01-11'),
('X1Bure04F7', 'ESP32_1', 28.75, 'Success', 'OFF', 'OFF', '15:09:19', '2024-01-11'),
('XL73CRwRLz', 'ESP32_1', 27.5, 'Success', 'OFF', 'OFF', '15:36:14', '2024-01-11'),
('XThaaEr8Fj', 'ESP32_1', 27.37, 'Success', 'OFF', 'OFF', '15:38:07', '2024-01-11'),
('XcLFJK425N', 'ESP32_1', 33.63, 'Success', 'OFF', 'OFF', '15:44:27', '2024-01-11'),
('YT6GDOM4k6', 'ESP32_1', 27.5, 'Success', 'OFF', 'OFF', '15:35:39', '2024-01-11'),
('YZMF57PZrX', 'ESP32_1', 28.81, 'Success', 'OFF', 'OFF', '15:09:31', '2024-01-11'),
('ZXs54CDYK6', 'ESP32_1', 27.5, 'Success', 'OFF', 'OFF', '15:36:03', '2024-01-11'),
('ZzFm1cj3hI', 'ESP32_1', 27.81, 'Success', 'OFF', 'OFF', '15:02:09', '2024-01-11'),
('aMBttIb4XQ', 'ESP32_1', 32.44, 'Success', 'OFF', 'OFF', '15:41:39', '2024-01-11'),
('amI7Q2zjDL', 'ESP32_1', 27.44, 'Success', 'OFF', 'OFF', '15:37:14', '2024-01-11'),
('ars4xuKjYy', 'ESP32_1', 33, 'Success', 'OFF', 'OFF', '15:41:08', '2024-01-11'),
('bNE2Ib9qdX', 'ESP32_1', 27.87, 'Success', 'OFF', 'OFF', '15:02:15', '2024-01-11'),
('bZ7v9xHejE', 'ESP32_1', 31.19, 'Success', 'OFF', 'OFF', '15:42:52', '2024-01-11'),
('bd404n3yKO', 'ESP32_1', 27.56, 'Success', 'OFF', 'OFF', '15:34:41', '2024-01-11'),
('cBYJOA4aUK', 'ESP32_1', 27.56, 'Success', 'OFF', 'OFF', '15:35:04', '2024-01-11'),
('cIl4oNA8CK', 'ESP32_1', 27.44, 'Success', 'OFF', 'OFF', '15:37:02', '2024-01-11'),
('cgewxeLZ69', 'ESP32_1', 27.62, 'Success', 'OFF', 'OFF', '15:00:30', '2024-01-11'),
('cjlWFQaQk9', 'ESP32_1', 27.44, 'Success', 'OFF', 'OFF', '15:37:32', '2024-01-11'),
('cm312T4Xnf', 'ESP32_1', 27.37, 'Success', 'OFF', 'OFF', '15:37:55', '2024-01-11'),
('dLbTPBxW5A', 'ESP32_1', 27.37, 'Success', 'OFF', 'OFF', '15:38:31', '2024-01-11'),
('ddboVklCQs', 'ESP32_1', 27.5, 'Success', 'OFF', 'OFF', '14:59:41', '2024-01-11'),
('e3piusAe8h', 'ESP32_1', 31.44, 'Success', 'OFF', 'OFF', '15:42:34', '2024-01-11'),
('eHuoBKtdUE', 'ESP32_1', 31.94, 'Success', 'OFF', 'OFF', '15:42:03', '2024-01-11'),
('eP27D44KKl', 'ESP32_1', 27.44, 'Success', 'OFF', 'OFF', '15:36:38', '2024-01-11'),
('eZTII1IKCC', 'ESP32_1', 27.37, 'Success', 'OFF', 'OFF', '15:38:19', '2024-01-11'),
('emW4jdVSfY', 'ESP32_1', 32.06, 'Success', 'OFF', 'OFF', '15:41:57', '2024-01-11'),
('f2QE3IS1B9', 'ESP32_1', 27.62, 'Success', 'ON', 'OFF', '15:00:44', '2024-01-11'),
('fnv8MHLdUe', 'ESP32_1', 31.25, 'Success', 'OFF', 'OFF', '15:42:46', '2024-01-11'),
('fzgbCzNJfT', 'ESP32_1', 32.38, 'Success', 'OFF', 'OFF', '15:45:15', '2024-01-11'),
('gMw1DGD4VY', 'ESP32_1', 27.56, 'Success', 'OFF', 'OFF', '14:59:48', '2024-01-11'),
('gPqeRBhARU', 'ESP32_1', 30.81, 'Success', 'OFF', 'ON', '15:43:33', '2024-01-11'),
('gaV9H2NTCM', 'ESP32_1', 27.62, 'Success', 'OFF', 'OFF', '15:00:21', '2024-01-11'),
('gbulBMdkjp', 'ESP32_1', 27.44, 'Success', 'OFF', 'OFF', '15:37:50', '2024-01-11'),
('gk67SWmOiK', 'ESP32_1', 25, 'Success', 'OFF', 'OFF', '15:43:15', '2024-01-11'),
('gvzqKJrffG', 'ESP32_1', 31.25, 'Success', 'OFF', 'OFF', '15:40:44', '2024-01-11'),
('hKosei207x', 'ESP32_1', 32.5, 'Success', 'OFF', 'OFF', '15:45:09', '2024-01-11'),
('jgrxsXnFBY', 'ESP32_1', 33.44, 'Success', 'OFF', 'OFF', '15:44:33', '2024-01-11'),
('jixlI7aBa0', 'ESP32_1', 27.5, 'Success', 'OFF', 'OFF', '15:36:09', '2024-01-11'),
('jmoSRu40F1', 'ESP32_1', 32.25, 'Success', 'OFF', 'OFF', '15:45:21', '2024-01-11'),
('kN2zkKGWG9', 'ESP32_1', 27.5, 'Success', 'OFF', 'OFF', '15:36:27', '2024-01-11'),
('kgK0Cjz7n2', 'ESP32_1', 33.88, 'Success', 'OFF', 'OFF', '15:44:21', '2024-01-11'),
('kgNSa1c5ff', 'ESP32_1', 27.5, 'Success', 'OFF', 'OFF', '15:35:34', '2024-01-11'),
('lXgPhwrdfO', 'ESP32_1', 32.69, 'Success', 'OFF', 'OFF', '15:41:27', '2024-01-11'),
('lsfpc192kf', 'ESP32_1', 29.12, 'Success', 'OFF', 'OFF', '15:39:56', '2024-01-11'),
('n9jor2TIOR', 'ESP32_1', 27.44, 'Success', 'OFF', 'OFF', '15:37:38', '2024-01-11'),
('nRAMdFbCOx', 'ESP32_1', 28.81, 'Success', 'OFF', 'OFF', '15:09:25', '2024-01-11'),
('o6etlMK2Yp', 'ESP32_1', 27.81, 'Success', 'OFF', 'OFF', '15:02:26', '2024-01-11'),
('o7ZSG5iuTf', 'ESP32_1', 27.31, 'Success', 'ON', 'OFF', '15:38:49', '2024-01-11'),
('oJieMATtJM', 'ESP32_1', 27.44, 'Success', 'OFF', 'OFF', '15:36:50', '2024-01-11'),
('oXfKyn0AmD', 'ESP32_1', 31.5, 'Success', 'OFF', 'OFF', '15:42:28', '2024-01-11'),
('pU0Nhd11MB', 'ESP32_1', 27.44, 'Success', 'OFF', 'OFF', '14:59:36', '2024-01-11'),
('q0mv7VV7C5', 'ESP32_1', 27.37, 'Success', 'OFF', 'OFF', '15:37:26', '2024-01-11'),
('qTkv1BoILQ', 'ESP32_1', 27.75, 'Success', 'OFF', 'ON', '15:01:43', '2024-01-11'),
('qbJdxz1sU3', 'ESP32_1', 30.81, 'Success', 'OFF', 'ON', '15:43:27', '2024-01-11'),
('qc9Jzfhueu', 'ESP32_1', 32.88, 'Success', 'OFF', 'OFF', '15:41:20', '2024-01-11'),
('rQTDu9wCn7', 'ESP32_1', 31.25, 'Success', 'OFF', 'OFF', '15:40:26', '2024-01-11'),
('rX7jNW97IA', 'ESP32_1', 27.62, 'Success', 'OFF', 'OFF', '15:34:10', '2024-01-11'),
('skem1UbVa8', 'ESP32_1', 27.44, 'Success', 'OFF', 'OFF', '15:36:56', '2024-01-11'),
('tAq3vWLKFL', 'ESP32_1', 27.75, 'Success', 'OFF', 'OFF', '15:01:44', '2024-01-11'),
('tIXNps32UX', 'ESP32_1', 27.31, 'Success', 'OFF', 'OFF', '15:39:01', '2024-01-11'),
('tP9lXIMJTz', 'ESP32_1', 32.25, 'Success', 'OFF', 'OFF', '15:45:27', '2024-01-11'),
('v4MgZzNukR', 'ESP32_1', 27.37, 'Success', 'OFF', 'OFF', '15:38:37', '2024-01-11'),
('vBarBx06go', 'ESP32_1', 27.5, 'Success', 'OFF', 'OFF', '15:35:57', '2024-01-11'),
('vwyy3obWwV', 'ESP32_1', 27.56, 'Success', 'OFF', 'OFF', '15:34:53', '2024-01-11'),
('w36aCKkwGa', 'ESP32_1', 27.69, 'Success', 'ON', 'OFF', '15:00:56', '2024-01-11'),
('wMFoOMjK2h', 'ESP32_1', 27.31, 'Success', 'OFF', 'OFF', '15:39:19', '2024-01-11'),
('xbxx4pJ5Mu', 'ESP32_1', 31.31, 'Success', 'OFF', 'OFF', '15:40:32', '2024-01-11'),
('xfoPvOMYEy', 'ESP32_1', 27.56, 'Success', 'OFF', 'OFF', '15:34:47', '2024-01-11'),
('xoOHzcW5dO', 'ESP32_1', 32.69, 'Success', 'OFF', 'OFF', '15:45:03', '2024-01-11'),
('xy4DOWdBUj', 'ESP32_1', 27.5, 'Success', 'OFF', 'OFF', '15:35:45', '2024-01-11'),
('yKo1ktdpEx', 'ESP32_1', 27.81, 'Success', 'OFF', 'OFF', '15:01:57', '2024-01-11'),
('yWqthwsU86', 'ESP32_1', 27.56, 'Success', 'ON', 'OFF', '15:00:03', '2024-01-11'),
('zPnMGgxXeX', 'ESP32_1', 27.94, 'Success', 'OFF', 'OFF', '15:02:48', '2024-01-11'),
('zsG5n79PXR', 'ESP32_1', 29.63, 'Success', 'OFF', 'OFF', '15:40:02', '2024-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `updatedata`
--

CREATE TABLE `updatedata` (
  `id` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `suhu` float(10,2) NOT NULL,
  `status_baca_suhu` varchar(255) NOT NULL,
  `lampu` varchar(225) NOT NULL,
  `heater` varchar(225) NOT NULL,
  `pakan` varchar(255) NOT NULL DEFAULT 'OFF',
  `low_threshold` decimal(5,2) DEFAULT 0.00,
  `high_threshold` decimal(5,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `updatedata`
--

INSERT INTO `updatedata` (`id`, `time`, `date`, `suhu`, `status_baca_suhu`, `lampu`, `heater`, `pakan`, `low_threshold`, `high_threshold`) VALUES
('ESP32_1', '15:45:27', '2024-01-11', 32.25, 'Success', 'OFF', 'OFF', 'OFF', 28.00, 33.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `dob`) VALUES
(1, 'admin', 'admin@smartfishtank.com', 'admin', '$2y$10$ATARzX9hN5inYa2l3PWaQeWM.gOY9iSIu8y9QxNSMNsduA.rTN.fG', '1992-02-01'),
(2, 'asep', 'asepkasep@asep.com', 'asep', '$2y$10$nbLW5VKErq5xwsCD60XLZuug2nFz1AmAPr30V7a2qxR0zxzRWjvIy', '0111-11-11'),
(3, 'tes', 'tes@gmail.com', '1', '$2y$10$yQpvSwoB49//EkxDX3VCHO80PpF/RA0oRnm2xaQLAfl3IEsd1kmYi', '0001-11-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updatedata`
--
ALTER TABLE `updatedata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
