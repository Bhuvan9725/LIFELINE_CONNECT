-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2024 at 02:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lifeline`
--

-- --------------------------------------------------------

--
-- Table structure for table `donation_camps`
--

CREATE TABLE `donation_camps` (
  `id` int(11) NOT NULL,
  `camp_name` varchar(100) NOT NULL,
  `organizer` varchar(100) NOT NULL,
  `location` varchar(150) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation_camps`
--

INSERT INTO `donation_camps` (`id`, `camp_name`, `organizer`, `location`, `start_time`, `end_time`, `start_date`, `end_date`, `contact_person`, `phone`, `email`, `registration_date`) VALUES
(1, 'CHEYUTHA  BLOOD DRIVE CAMPAIGN', 'CHEYUTHA FOUNDATION', 'KAKINADA,JAGANNADHAPURAM', '09:00:00', '15:01:00', '2024-11-16', '2024-11-23', 'BHUVANA SHANKAR', '7396076389', 'tiramsettibhuvanashankar@gmail.com', '2024-09-29 16:54:24'),
(2, 'SANKALPAM BLOOD DRIVE', 'SANKALPAM TRUST', 'KAKINADA,UPPADA', '01:15:00', '13:21:00', '2024-11-12', '2024-11-15', 'JAGANNADHAM', '9949621683', 'jagannadhamtiramsetti@gmail.com', '2024-09-29 18:04:27'),
(6, 'SURYA FOUNDATION  BLOOD DONATION DRIVE', 'SURYA TRUST', 'KAKINADA,TURANGI', '09:00:00', '16:00:00', '2024-11-04', '2024-11-09', 'SHANTI', '6305425595', 'shanti@gmail.com', '2024-09-29 18:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` int(11) NOT NULL,
  `donarname` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `bloodGroup` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') NOT NULL,
  `contactNumber` bigint(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `lastDonation` date DEFAULT NULL,
  `consent` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `donarname`, `dob`, `gender`, `bloodGroup`, `contactNumber`, `email`, `state`, `district`, `city`, `lastDonation`, `consent`) VALUES
(1, 'BHUVANA SHANKAR', '2005-08-24', 'male', 'O+', 7396076389, 'tiramsettibhuvanashankar@gmail.com', 'ANDHRA PRADESH', 'kakinada', 'kakinada', '0000-00-00', 1),
(7, 'leela', '2004-09-02', 'male', 'A+', 9949621683, 'leela@gmail.com', 'ANDHRA PRADESH', 'WEST GODAVARI', 'KAKINADA', '2024-03-09', 1),
(11, 'dhanush', '2004-08-02', 'male', 'B+', 123456789, 'dhanush@gmail.com', 'ANDHRA PRADESH', 'SRIKAKULAM', 'SAM', '2024-06-08', 1),
(12, 'VIKAS', '2007-03-09', 'male', 'B+', 6300764552, 'kanithivikas2@gmail.com', 'ANDHRA PRADESH', 'SRIKAKULAM', 'KOTABOMMALI', '2024-04-12', 1),
(13, 'PAVITRA', '2005-08-03', 'female', 'AB+', 9949928144, 'sarveshyerukola@gmail.com', 'ANDHRA PRADESH', 'SRIKAKULAM', 'SOMPETA', '0000-00-00', 1),
(22, 'SHANTHI ', '2001-12-10', 'female', 'A+', 6305425595, 'shantitiramsetti@gmail.com', 'ANDHRA PRADESH', 'EAST GODAVARI', 'UPPADA', '2022-06-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hdetails`
--

CREATE TABLE `hdetails` (
  `Id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `Disname` varchar(25) NOT NULL,
  `phnum` varchar(10) NOT NULL,
  `email` varchar(35) NOT NULL,
  `category` varchar(15) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hdetails`
--

INSERT INTO `hdetails` (`Id`, `name`, `addr`, `Disname`, `phnum`, `email`, `category`, `type`) VALUES
(8, 'Area Hospital Rampachodavaram', 'Area Hospital Rampachodavaram,Rampachodavaram,Dist.Alluri Sitharama Ra', 'Alluri Sitharama Raju', '9493052941', 'chc.rampachodavaram@gmail.com', 'Govt.', 'Campus Stock'),
(9, 'BSU CHC Addatheegala', 'Addatheegala,Dist.Alluri Sitharama Raju', 'Alluri Sitharama Raju', '8919913204', 'mochcaddatheegala@gmail.com', 'Govt.', 'Campus Stock'),
(10, 'BSU CHC Chituru', 'Chituru,Dist.Alluri Sitharama Raju', 'Alluri Sitharama Raju', '9949756081', 'ahchintoor@gmail.com', 'Govt.', 'Campus Stock'),
(11, 'District Hospital Blood Centre', 'DH Paderu,Paderu,Dist.Alluri sitharama Raju', 'Alluri Sitharama Raju', '8500635226', 'areahospitalpaderu@gmail.com', 'Govt.', 'Campus Stock'),
(12, 'Area Hospital Blood Center Nar', 'Area Hospital Narsipatnam,Near POlice Station,Chintapalli road,Narsipa', 'Anakapalli', '9618473874', 'ahnrpmbloodcenter@gmail.com', 'Govt.', 'Campus Stock'),
(13, 'BSU CHC Chodavaram', 'Chodavaram,Chodaravaram,Dist.Anakapalli', 'Anakapalli', '9493426494', 'mp.chc.cdvm@gmail.com', 'Govt.', 'Campus Stock'),
(14, 'District Hospital Blood Center', 'Poolbagh Road,Anakapalli,Dist.Anakapalli', 'Anakapalli', '7396324362', 'bloodbank.ahakp@gmail.com', 'Govt.', 'Campus Stock'),
(15, 'BSU CHC Koutarautla', 'Kotarautla,Kotarautla,Dist.Anakapalli', 'Anakapalli', '8825805299', 'dcskotauatla@gmail.com', 'Govt.', 'Campus Stock'),
(16, 'Area Hospital Blood Center Gun', 'M/S APVVP Area Hospital Center,Guntakal,Ananatapuramu District,Dist.An', 'Anantapur', '9160100310', 'bloodbankahgtl@gmail.com', 'Govt.', 'Campus Stock'),
(17, 'BSU AH Madakasira', 'Madakasira,Dist.Anantapur', 'Anantapur', '9491420599', 'chcmadakasira123@gmail.com', 'Govt.', 'Campus Stock'),
(18, 'BSU AH Rayadurgam', 'Rayadurgam,Dist.Anantapur', 'Anantapur', '7799589414', 'bccrayadurg@gmail.com', 'Govt.', 'Campus Stock'),
(19, 'BSU AH Tadipatri', 'Tadipatri,Dist.Anantapur', 'Anantapur', '8008553754', 'chctadipatri@gmail.com', 'Govt.', 'Campus Stock'),
(20, 'BSU AH Pileru ', 'Pileru,PILERU,Dist.Annamayya', 'Annamayya', '9966916365', 'mochcpileru@gmail.com', 'Govt.', 'Campus Stock'),
(21, 'BSU AH Rajampeta', 'Rajampeta,Dist.Annamayya', 'Annamayya', '9490151211', 'Ahrajampeta@gmail.com', 'Govt.', 'Campus Stock'),
(22, 'District Hospital Blood Center', 'Madanapalle,Dist.Annamayya', 'Annamayya', '7981322876', 'ircsbbmpl2009@gmail.com', 'Govt.', 'Campus Stock'),
(23, 'Madanapalli Voluntary Blood Ce', 'Madanapalli Voluntary Blood Centre D.No,14/180,2nd Floor,CTM Road,Mada', 'Annamayya', '9246999571', 'mplbloodbankv@gmail.com', 'Charitable/Vol', 'Campus Stock'),
(24, 'Aapadbandhu Blood Bank', 'DNO 21-1-190,1st Floor,Chirala Prakasam A.P,Chirala,Dist.Bapatla', 'Bapatla', '9121976191', 'aapadbandhubbchirala@gmail.com', 'Charitable/Vol', 'Campus Stock'),
(25, 'Area Hospital Blood Center Bap', 'Area Hospital 13th Ward,Satyanarayanapuram,Bapatla,Dist.Bapatla', 'Bapatla', '992708498', 'bapatlabloodbank@gmail.com', 'Govt.', 'Campus Stock'),
(26, 'Area Hospital Blood Center Chi', 'Old building,room no-0,Wood nahar,Chirala,Dist.Bapatla', 'Bapatla', '897858292', 'bloodbankchirala@gmail.com', 'Govt.', 'Campus Stock'),
(27, 'BSc CHC Marturu', 'Marturu,Dist.Bapatla', 'Bapatla', '9603169960', 'apvchcmarturu@gmail.com', 'Govt.', 'Campus Stock'),
(28, 'District Hospital Blood Center', '1st Floor,District Head Quarter Hospital Premises,Dist.Chittoor', 'Chittoor', '996623459', 'bloodbankctr1@gmail.com', 'Govt.', 'Campus Stock'),
(29, 'Idian Red Cross Society Blood ', 'District Govt Head Quarters,Hospital Campus,Dist.Chittoor', 'Chittoor', '8572220287', 'ircsbbchittoor@gmail.com', 'Red Cross', 'Campus Stock'),
(30, 'BSu CHC Venkatagiri Kota', 'Venkatagiri Kota.Dist.Chittoor', 'Chittoor', '9966775379', 'apvvpchcvkota@gmail.com', 'Govt.', 'Campus Stock'),
(31, 'Pes Blood Center', 'PES Medical College And Hospital,Nalgampally,Kuppam,Dist.Chittoor', 'Chittoor', '9918323741', 'Bloodbank@pesimsr.pes.edu', 'Private', 'Campus Stock'),
(32, 'BSU CHC Gokavaram', 'Gokavaram,Dist.East Godavari', 'East Godavari', '7989627021', 'gokavaramchc@gmail.com', 'Govt.', 'Campus Stock'),
(33, 'BSU CHC Prathipadu', 'Prithipadu,Dist.East Godavari', 'East Godavari', '9885969921', 'chcprathipadu5@gmail.com', 'Govt.', 'Campus Stock'),
(34, 'Satya Surya Voluntary Blood Ce', 'D.NO 46-1-3,Nandam GAniraju Junction,TTD Road,Danavaipeta,Rajamahendra', 'East Godavari', '8500960088', 'satyasuryabloodbankrjy@gmail.com', 'Charitable/Vol', 'Campus Stock'),
(35, 'GSL Trust Blood Centre', 'C/o Gauthami Scan Center,46-13-31,First Floor,Near Gandhi Park,Danavai', 'East Godavari', '992031493', 'swatantrabbrjy@gmail.com', 'Charitable/Vol', 'Campus Stock'),
(36, 'Alluri Sitha Rama Raju Academy', 'Ground Floor,Hospital Block, NH5,Eluru,Dist.Eluru', 'Eluru', '7382626282', 'asrambloodbank@gmail.com', 'Charitable/Vol', 'Campus Stock'),
(37, 'Area Hospital Blood Center Jan', 'C/o MNM Area Hospital,Jangareddygudem,Dist.Eluru', 'Eluru', '9490287612', 'Bloodbankahjrg@gmail.com', 'Govt.', 'Campus Stock'),
(38, 'BSU CHC Buttaigudem', 'Buttaigudem,Dist.Eluru', 'Eluru', '9398633459', 'chcbtg@gmail.com', 'Govt.', 'Campus Stock'),
(39, 'Good Samaritan Blood Center', 'H.No. 13-1/1,Good Samaritan Cancer and General Hospital,Vangayagudem,D', 'Eluru', '9908083907', 'Samaritaneluru@gmail.com', 'Private', 'Campus Stock'),
(40, 'Aapadbandhu Blood Center', 'D.No.12-12-22&23,1st&3rd Floor,Above KAsturi Surgicals,Old Club Road,K', 'Guntur', '9502698123', 'aapadbandhubbgnt@gmail.com', 'Charitable/Vol', 'Campus Stock'),
(41, 'All India Institute Of Medical', 'IPD Block ,Ground Floor,AIIMS Mangalagiri,Dist.Guntur', 'Guntur', '9440106689', 'chaitanya.ihbt@aiimsmangalagiri.edu', 'Govt.', 'Campus Stock'),
(42, 'BSU Amaravathi', 'Amaravathi,Dist.Guntur', 'Guntur', '9848363931', 'moamaravathi@yahoo.com', 'Govt.', 'Campus Stock'),
(43, 'BSU Ponnur', 'Ponnur,Dist.Guntur', 'Guntur', '8688806674', 'gntchcponnurofficial@gmail.com', 'Govt.', 'Campus Stock'),
(44, 'Akshya Blood Centre, Kakinada', '6-1-44/1,2nd Floor,Polishetty Plaza,Jawahar Street,Suryaraopet,Dist.Ka', 'Kakinada', '9989789761', 'Akshayabloodcenterkkd@gmail.com', 'Charitable/Vol', 'Campus Stock'),
(45, 'Area Hospital Blood Bank Tuni', 'Govt Area Hospital Blood Bank,Tuni,East Godavari,Dist.Kakinada', 'Kakinada', '8854252333', 'tunibloodbank@yahoo.com', 'Govt.', 'Campus Stock'),
(46, 'BSU CHC Peddaputam,Dist.Kakina', 'Peddapuram,Dist.Kakinada', 'Kakinada', '9490939158', 'bscdcspeddapuram@gmail.com', 'Govt.', 'Campus Stock'),
(47, 'BSU CHC Pithapuram', 'Pithapuram,Dist.Kakinda', 'Kakinada', '6305060209', 'ghptpr@gmail.com', 'Govt.', 'Campus Stock'),
(48, 'Area Hospital Blood Centre Ama', 'Area Hospital Blood Center,Area Hospital(Government),Ground Floor,AH,A', 'Konaseema', '9505152234', 'bloodbankahamp@gmail.com', 'Govt.', 'Campus Stock'),
(49, 'Area Hospital Blood Centre Ram', 'AH Ramachandrapuram,Dist.Konaseema', 'Konaseema', '9848257592', 'ah_rcpm@yahoo.co.in', 'Govt.', 'Campus Stock'),
(50, 'Area Hospital Centre Razole', 'GOVT Hospital CHC Razole,Dist.Konaseema', 'Konaseema', '8008553463', 'ahbloodbankrzl@gmail.com', 'Govt.', 'Campus Stock'),
(51, 'BSU CHC Mandapeta', 'Mandapeta,Dist.Konaseema', 'Konaseema', '9849639629', 'governmenthospital_mandapeta@yahoo.', 'Govt.', 'Campus Stock'),
(52, 'Aayush Hospitals Blood Bank', 'D.No.48-13-3,3A,Ring Road,Sri Ramachandra Nagar,Vijayawada,Dist.Krishn', 'Krishna', '8498061186', 'padma.parvataneni@gmail.com', 'Private', 'Campus Stock'),
(53, 'Area Hospital Blood Center Gud', 'Area Hospital Premises,1st Floor,Opp.Head Post Office,Gudivada,Dist.Kr', 'Krishna', '9885254371', 'areahospital.gudivada@gmail.com', 'Govt.', 'Campus Stock'),
(54, 'Aruna Blood Bank', 'SBI BAzar Branch Building,2nd Floor Ramanaidupeta,Machilipatnam,Dist.K', 'Krishna', '9989715552', 'Rajkumar.rayana@gmail.com', 'Charitable/Vol', 'Campus Stock'),
(55, 'BSC-Avvanigadda', 'The Community Health Centre at Area Hospital,Avvanigadda,Dist.Krishna', 'Krishna', '9908209045', 'moavanigadda@gmail.com', 'Govt.', 'Campus Stock'),
(56, 'Adp Voluntary Blood Center', 'D.No. 19/417-1,2nd Floor,Balajis Complex,Opp.Muncipal School,M.M.Road,', 'Kurnool', '9550939235', 'adpbloodcentre@gmail.com', 'Charitable/Vol', 'Campus Stock'),
(57, 'Akshya Blood Centre', '46/87-1 to 5,3rd Floor,Hotel Sasya Complex,Budhawarpet,Dist.Kurnool', 'Kurnool', '9494444180', 'akshayabloodbank81@gmail.com', 'Private', 'Campus Stock'),
(58, 'Indian Red Cross Society Blood', 'Indian Red Cross Society Blood Bank,DMHO CAmpus,Opp Ravi Theatre,Dist.', 'Kurnool', '8440211777', 'ircsbloodbankknl@gmail.com', 'Red Cross', 'Campus Stock'),
(59, 'Kurnool Blood Centre', '43/101,4th Floor,OppMuncipal Office,Apoorva plza,Dist.Kurnool', 'Kurnool', '7337225255', 'kurnoolbloodbank@gmail.com', 'Charitable/Vol', 'Campus Stock'),
(62, 'Government General Hospital Bl', 'First Floor,Government General Hospital Premises,Nandyal,Dist.Nandyal', 'Nandyal', '9985240946', 'bbdhnandyal@gmail.com', 'Govt.', 'Campus Stock'),
(63, 'Nandyal Blood Centre', 'D.No.21-125/a1-1,2nd Floor,Frontside,Beside Sri Sai Multispeciality Ho', 'Nandyal', '7386477466', 'nandyalbloodcentre@gmail.com', 'Charitable/Vol', 'Campus Stock'),
(64, 'Santhiram Medical College And ', 'SHAFA Educational Society,NH-18,Dist.Nandyal', 'Nandyal', '9849645547', 'srmcbloodbank@gmail.com', 'Private', 'Campus Stock'),
(65, 'Vijaya Blood Centre', '25/570,2nd Floor,Vijaya Hospital,Srinivasa Nagar,Dist.Nandyal', 'Nandyal', '94917878', 'Vijayabloodbank786@gmail.com', 'Private', 'Campus Stock'),
(66, 'American Cancer Care Blood Cen', 'D.No. 29-13-41/1,Near Pushpa Hotel Bus Stop, Kaleswara Rao,Raod,Suryar', 'NTR', '8003104108', 'acc.bloodbank2023@gmail.com', 'Private', 'Campus Stock'),
(67, 'Andhra Hospital Blood Bank', '16-72/1,2nd Floor,Opp High School,Gollapudi,Vijayawada,Dist.NTR', 'NTR', '9989557555', 'andhrahospitalsbvpm@hotmail.com', 'Private', 'Campus Stock'),
(68, 'ANU Blood Center Vijayawada', 'D.No. 161/2B &161/2C,B1,Near D Mart,Enikapadu Vijayawada,Dist.NTR', 'NTR', '8121553344', 'anubloodcentres@gmail.com', 'Private', 'Campus Stock'),
(69, 'Chaitanya Blood Centre', 'D.no. 40-9/1-26,Vasavya Complex,1st Floor,Vasavya Nagar,Vijayawada,Dis', 'NTR', '9246289777', '', 'Private', 'Campus Stock'),
(70, 'Aapadbandhu Blood Bank Vinukon', 'D.no.27-172. 1st Floor, Lawyer Street,Kothapet,Vinukonda,Palnadu,Dist.', 'Palnadu', '8309929900', 'Aapadbadhubbvnk@gmail.com', 'Charitable/Vol', 'Campus Stock'),
(71, 'Area Hospital Blood Center Nar', 'Area Hospital Premises,First Floor,Palnadu Road,Narasaraopet-1,Dist.Pa', 'Palnadu', '9849040434', 'nrtbloodbankircs@gmail.com', 'Govt.', 'Campus Stock'),
(72, 'BSU Gurazala', 'Gurazala ,Dist.Palnadu', 'Palnadu', '7993861416', 'gntchcgurazala99@gmail.com', 'Govt.', 'Campus Stock'),
(73, 'CPT Blood Centre', 'D.No.06-351/1,1st Floor Modern Complex,CN Road, Chilaluripet,Dist.Paln', 'Palnadu', '9132389389', 'cptbloodcentre@gmail.com', 'Private', 'Campus Stock'),
(74, 'BSC-Kurupam', 'Kurupam,Dist.Parvathipuram Manyam', 'Parvathipuram Manyam', '9701937121', 'chckurupam@gmail.com', 'Govt.', 'Campus Stock'),
(75, 'BSC-Palakonda BSU', 'APPVVP AH Palakonda,Srinivasa Nagar,Palakonda,Dist.Parvathipuram Manya', 'Parvathipuram Manyam', '9949900694', 'ahpalakonda@gmail.com', 'Govt.', 'Campus Stock'),
(76, 'BSC Seethampeta', 'Seethampeta,Dist.Parvathipuram Manyam', 'Parvathipuram Manyam', '9652679484', 'seethampetschc@gmail.com', 'Govt.', 'Campus Stock'),
(77, 'District Hospital Blood Center', 'Near Gundlakamma Bridge,Cumbum Road, MArkapur,Dist.Prakasam', 'Prakasam', '9963229506', 'bloodbankmarkapur@gmail.com', 'Govt.', 'Campus Stock'),
(78, 'Dr Jawahara Blood  Center', 'D.No. 2/59/A,5th Floor,Near RTC Bus Stop,Main Road Chimakurthy,Dist.Pr', 'Prakasam', '8431219999', 'drjawaharbloodcenter@gmail.com', 'Private', 'Campus Stock'),
(79, 'Goverment General Hospital Blo', 'Ramnagar,Ongole,Dist.Prakasam', 'Prakasam', '9000991884', 'bloodbankrimsongole@gmail.com', 'Govt.', 'Campus Stock'),
(80, 'Indian Red Cross Society Ongol', '57-1-29 to 31,Railway Station Road,Ongole,Dist.Prakasam', 'Prakasam', '9849337298', 'ircsongole@gmail.com', 'Red Cross', 'Campus Stock'),
(81, 'BSC - Budithi BSU', 'CHC-Budithi,Govt Hospital, Saravakota Mandal,Srikakulam(Rural),Dist.Sr', 'Srikakulam', '9704105170', 'budithichc@gmail.com', 'Govt.', 'Campus Stock'),
(82, 'BSC-Ichapuram BSU', 'CHC-Itchapuram,Govt Hospital,Itchapuram,Dist.Srikakulam', 'Srikakulam', '9502224224', 'chcichapuram@gmail.com', 'Govt.', ''),
(83, 'BSC-Narasannapeta Makivalasa B', 'CHC Narasannapeta,Makivalasa,Dist.Srikakulam', 'Srikakulam', '9492421202', 'narasannapetachc@gmail.com', 'Govt.', 'Campus Stock'),
(84, 'BSC-Sompeta BSU', 'CHC-Sompeta,Govt Hospital,Dist.Srikakulam', 'Srikakulam', '9440398029', 'chcsompeta@gmail.com', 'Govt.', 'Campus Stock'),
(85, 'ACSR Government General Hospit', 'Government Head Quarter Hospital Premises,1st Floor,Nellore,Dist.Sri P', 'Sri Potti Sriramulu Nello', '8309777410', 'acsrgmcnlr@gmail.com', 'Govt.', 'Campus Stock'),
(86, 'Apollo Speciality Hospitals Ne', '16/111/1133,Muthukur Road,Pinakini Nagar,Nellore,Dist.Sri Potti Sriram', 'Sri Potti Sriramulu Nello', '7989523405', 'rajasekhar_m@apollohospitals.com', 'Private', 'Campus Stock'),
(87, 'Area Hospital Blood Centre Kan', '1st Floor, Near NTR Statue,Pamur Road,Kandakur,Dist.Sri Potti Sriramul', 'Sri Potti Sriramulu Nello', '9000592604', 'sramarao045@gmail.com', 'Govt.', 'Campus Stock'),
(88, 'Area Hos[pital Blood Centre Ka', 'Kavali ,S.P.S.R,Nellore,Dist.Sri Potti Sriramuku Nellore', 'Sri Potti Sriramulu Nello', '8328360573', 'areahospitalbloodcentrekavali@gmail', 'Govt.', 'Campus Stock'),
(89, 'Area Hospital Blood Centre Kad', 'APVVP Govt, Area Hospital,Ground Floor, Kadiri,Anantapur,Dist.Sri Sath', 'Sri Sathya Sai', '773081023', 'bbahkadiri@gmail.com', 'Govt.', 'Campus Stock'),
(90, 'Deepu Blood Centre Hindupur', 'D.No 4-5-687/7-1,Lepakshi,Chaitanya Nagar,Hindupur,Dist.Sri Sathya Sai', 'Sri Sathya Sai', '6303569024', 'deepubloodcenterhdp@gmail.com', 'Charitable/Vol', 'Campus Stock'),
(91, 'District Hospital Blood Centre', 'Blood Bank,District Hospital,Hindupur,Dist.Sri Sathya Sai', 'Sri Sathya Sai', '8556225900', 'bbapvvphup@gmsail.com', 'Govt.', 'Campus Stock'),
(92, 'Rural Development Trust Hospit', 'Kadiri Road Bathalapalli,Dist.Sri Sathya Sai', 'Sri Sathya Sai', '855924259', 'rdtbloodbank@gmail.com', 'Private', 'Campus Stock'),
(93, 'Area Hospital Blood Centre Gud', 'Hospital Road,Gudur,Dist.Tirupati', 'Tirupati', '8985750552', 'bbahgudur@gmail.com', 'Govt.', 'Campus Stock'),
(94, 'Aswini Hospital Blood Centre', 'Ground Floor,Aswini Hospital Premises,TTD,Tirumala,Dist.Tirupati', 'Tirupati', '9000497028', 'bbahttdtml@gmail.com', 'Private', 'Campus Stock'),
(95, 'Blood Centre Central Hospital ', 'BIRRD(T) Hospital,First Floor,KT Road,Tirupati,Dist.Tirupati', 'Tirupati', '9676567969', 'ttdcentralhospital@gmail.com', 'Charitable/Vol', 'Campus Stock'),
(96, 'BSU AH Srikalahasti', 'Srikalahasti,Dist.Tirupati', 'Tirupati', '7995400298', 'areahospitalsrikalahasthi@yahoo.co.', 'Govt.', 'Campus Stock'),
(97, 'Amma Blood Centre', 'D.No. 11-4-11/1,Kailash Nagar,Kanithi Road,Gajuwaka,Dist.Visakhapatnam', 'Visakhapatnam', '8328098871', 'glikiran21@gmail.com', 'Charitable/Vol', 'Campus Stock'),
(98, 'Anil Neerukunda Hospital Blood', 'Sangivalasa,Bheemunipatnam,Visakhapatnam,Dist.Visakhapatnam', 'Visakhapatnam', '8008901273', 'anhbb2017@gmail.com', 'Private', 'Campus Stock'),
(99, 'Apollo Hospital Chinagadhili', 'D.No.18-516/2/1,3rd Floor,Health city,Arilova,DETTO,Chinagadhili,Dist.', 'Visakhapatnam', '9849949202', 'kunamukundarao@gmail.com', 'Private', 'Campus Stock'),
(100, 'As Raja  Voluntary Blood Centr', 'D.No. 10-50-11/5,1st Floor,Virasi Centre,Waltair Main Road,Visakhapatn', 'Visakhapatnam', '9849792925', 'asrajavbloodbank@gmail.com', 'Charitable/Vol', 'Campus Stock'),
(101, 'Bobbili Blood Centre', 'D.No. 11-65&66,1st Floor, Vyshnav Street,Bobbili,Dist.Vizianagaram', 'Vizianagaram', '9700175677', 'bobbiliblodcentre@gmail.com', 'Charitable/Vol', 'Campus Stock'),
(102, 'BSC-Bhogapuram BSU', 'CHC Bhogapuram,Dist.Vizianagaram', 'Vizianagaram', '7032543350', 'chcbhogapuram@gmail.com', 'Govt.', 'Campus Stock'),
(103, 'BSC-Bobbili BSU', 'CHC Bobbili,Muncipal Office,Dist.Vizianagaram', 'Vizianagaram', '9490731462', 'chappasudhakar@gmail.com', 'Govt.', 'Campus Stock'),
(104, 'BSC-Cheepurpalli BSU', 'Cheepurupalli,Dist.Vizianagaram', 'Vizianagaram', '9441057916', 'chcchepurpalli@gmail.com', 'Govt.', 'Campus Stock'),
(105, 'A.S.N. Raju Charitable Trust B', '24-1-1,RKPLAZA,JP Road,Bhimavaram,Dist.West Godavari', 'West Godavari', '9666001234', 'asnrajucharitabletrust@gmail.com', 'Charitable/Vol', 'Campus Stock'),
(106, 'BSU DH Tanuku', 'West Godavari,Tanuku,Dist.West Godavari', 'West Godavari', '9704751819', 'areahospitaltanuku@gmail.com', 'Govt.', 'Campus Stock'),
(107, 'Area Hospital Blood Centre Pul', 'Area Hospital Premises,Muddanoor Road, Pulivendula,PULIVENDULA,Dist.Y.', 'Y.S.R', '9966509364', 'pulivendulabb2007@gmail.com', 'Govt.', 'Campus Stock'),
(108, 'Boga Parvathamma Memorial Dona', 'D.No.3/217-218,1st floor Chriestian Line East,Revenueward-3YSR', 'Y.S.R.', '9246398893', 'bogaparvathamma@yahoo.com', 'Private', 'Campus Stock'),
(109, 'Bruhada Blood Center', '21-648-1,2ND Floor,PRASAD TOWERS,OLD MUNICIPAL OFFICE ROAD,OPP RAMESH ', 'Y.S.R.', '9177791860', 'bruhadabloodbank@gmail.com', 'Private', 'Campus Stock'),
(110, 'BSC-BADVEL BSU', 'BADVEL', 'Y.S.R.', '0', 'NULL@GMAIL.COM', 'Govt.', 'Campus Stock');

-- --------------------------------------------------------

--
-- Table structure for table `requestb`
--

CREATE TABLE `requestb` (
  `Id` int(10) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `hname` varchar(30) NOT NULL,
  `btype` varchar(5) NOT NULL,
  `unit` int(10) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(5) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requestb`
--

INSERT INTO `requestb` (`Id`, `pname`, `hname`, `btype`, `unit`, `phno`, `email`, `age`, `reason`, `city`, `status`) VALUES
(1, 'satya sai', 'apollo hospitals', 'AB+', 5, '9573663179', 'leelasatya@gmail.com', 18, 'i had a accident so, i want the blood within the 48 hours.so, please quickly contacy the hospital', NULL, 'accepted'),
(2, 'BHUVANA SHANKAR', 'MEDICOVER ', 'O+', 3, '7396076389', 'tiramsettibhuvanashankar@gmail.com', 17, 'car hiited', NULL, 'rejected'),
(3, 'HEMA LATHA', 'MOTHER & CHILD HOSPITAL', 'B+', 4, '6305425595', 'hema@gmail.com', 18, 'car hiited', 'UPPADA', 'accepted'),
(4, 'shanti', 'MEDICOVER ', 'O-', 5, '9949621683', 'shanti@gmail.com', 19, 'head injury', 'KAKINADA', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `created_at`) VALUES
(1, 'bhuvan', '$2y$10$Y2C37bUgjg0CY2ejtfaFce940sLzm3k.PeuqBOmcxXzSvQytASBp6', 'BHUVANASHANKAR', '2024-09-15 12:14:31'),
(2, 'pavitra', '$2y$10$0PWhOvTUpZkPR39PybHZWe4T2kwm7kpOEzWS9Eh1X8NBUpYrIjATq', 'PAVITRA', '2024-10-03 14:40:26'),
(3, 'vikas', '$2y$10$n9VNZQAXFCna5HsOD2cxkuJ8duldHwhxiGHzCjpMAQ/T4l9Sfn3Ou', 'VIKAS', '2024-10-03 14:40:49'),
(4, 'dhanush', '$2y$10$679.eaRLi8alYJbE7kCN1eyUzk3SIADRgb..P/6Fn1g3/ic8PpJEi', 'DHANUSH', '2024-10-03 14:41:14'),
(5, 'satya', '$2y$10$OH48d4LelatXC3nAzv.NBukf.EMs0XZQLy7S3BfygQXG3XpnVeviq', 'SATYA', '2024-10-03 14:42:12'),
(6, 'padma', '$2y$10$6eKTxqjTwCJYN1QwykWYZeBHjYebsshYI3hPEBvD9agiO.C4lN2V6', 'PADMA', '2024-10-03 14:42:55'),
(7, 'bhaskar', '$2y$10$vJDTclCIQepqyzzKrxPgPek9UmiFYtR2hBbvSsbqsBjQQerl11y8C', 'BHASKAR', '2024-10-03 14:44:51'),
(8, 'akshay', '$2y$10$5zWKW5RyxpkRLHJbLbe99u/vejVpsC6wHB34BSBqXSfh4GKFy0TZK', 'AKSHAY', '2024-10-03 14:45:22'),
(9, 'lifeline', '$2y$10$QQQ8ZCFv/T4u.3NsDK8EluRSFnbo5liSDCo58HfDSSV8cRU1p1sDm', 'LIFELINE CONNECT', '2024-11-06 02:21:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donation_camps`
--
ALTER TABLE `donation_camps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contactNumber` (`contactNumber`) USING BTREE;

--
-- Indexes for table `hdetails`
--
ALTER TABLE `hdetails`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `requestb`
--
ALTER TABLE `requestb`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donation_camps`
--
ALTER TABLE `donation_camps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `hdetails`
--
ALTER TABLE `hdetails`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `requestb`
--
ALTER TABLE `requestb`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
