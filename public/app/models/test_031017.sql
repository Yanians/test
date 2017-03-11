-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2017 at 03:19 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(1) NOT NULL,
  `timeremaining` varchar(8) NOT NULL DEFAULT '00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `user_id`, `subject_id`, `topic_id`, `question_id`, `answer`, `timeremaining`) VALUES
(1, 1, 1, 1, 1, 'C', '00:00:00'),
(2, 2, 2, 1, 2, 'B', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guidelines`
--

CREATE TABLE `guidelines` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject_toPass` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guidelines`
--

INSERT INTO `guidelines` (`id`, `user_id`, `subject_toPass`, `date`) VALUES
(1, 1, 6, '2017-02-24 16:23:46'),
(2, 1, 5, '2017-02-24 16:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `user_id`, `name`, `content`, `date`) VALUES
(1, 1, 'title', 'wewew', '2017-02-24 13:20:19');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `choice_a` text NOT NULL,
  `choice_b` text NOT NULL,
  `choice_c` text NOT NULL,
  `choice_d` text NOT NULL,
  `answer` varchar(1) NOT NULL DEFAULT 'A',
  `reference` varchar(1000) NOT NULL DEFAULT 'https://www.google.com.ph'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `topic_id`, `question`, `choice_a`, `choice_b`, `choice_c`, `choice_d`, `answer`, `reference`) VALUES
(1, 1, 'The Uniform Commercial Code provides for a warranty against infringement. Its primary purpose is to protect the buyer of goods from infringement of the rights of third parties. This warranty', 'Only applies if the sale is between merchants.', 'Must be expressly stated in the contract or the Statute of Frauds will prevent its enforceability.', 'Protects the seller if the buyer finishes specificiations which result in an infringement.', 'Cannot be disclaimed.', 'C', 'https://www.efficientlearning.com/cpa/resources/pop-quiz/reg-questions/'),
(2, 1, 'The mailbox rule generally makes acceptance of an offer effective at the time the acceptance is dispatched. The mailbox rule does not apply if', 'Both the offeror and offeree are merchants.', 'The offer proposes a sale of real estate.', 'The offer provides that an acceptance shall not be effective until actually received.', 'The duration of the offer is not in excess of 3 months.', 'C', 'https://www.efficientlearning.com/cpa/resources/pop-quiz/reg-questions/'),
(3, 1, 'Which of the following terms best describes the relationship between a corporation and the CPA it hires to audit corporate books?', 'Employer and employee.', 'Employer and independent contractor.', 'Master and servant.', 'Employer and principal.', 'B', 'https://www.efficientlearning.com/cpa/resources/pop-quiz/reg-questions/'),
(4, 1, 'Blue is a holder of a check which was originally drawn by Rush and made payable to Silk. Silk properly endorsed the check to Field. Field had the check certified by the drawee bank and then endorsed the check to Blue. As a result', 'Field is discharged from liability.', 'Rush alone is discharged from liability.', 'The drawee bank becomes primarily liable and both Silk and Rush are discharged.', 'Rush is secondarily liable.', 'C', 'https://www.efficientlearning.com/cpa/resources/pop-quiz/reg-questions/'),
(5, 1, 'Ott and Bane agreed to act as cosureties on an $80,000 loan that Cread Bank made to Dash. Ott and Bane are each liable for the entire $80,000 loan. Subsequently, Cread released Ott from liability without Bane?s consent and without reserving its rights against Bane. If Dash subsequently defaults, Cread will be entitled to collect a maximum of', '$0 from Bane.', '$0 from Dash.', '$40,000 from Bane.', '$40,000 from Dash.', 'C', 'https://www.efficientlearning.com/cpa/resources/pop-quiz/reg-questions/'),
(6, 2, 'Which of the following items should be included in an auditor?s report for financial statements prepared in conformity with another comprehensive basis of accounting (OCBOA)?', 'A sentence stating that the auditor is responsible for the financial statements.', 'A title that includes the word ?independent?.', 'The signature of the company controller.', 'A paragraph stating that the audit was conducted in accordance with OCBOA.', 'B', 'https://www.efficientlearning.com/cpa/resources/pop-quiz/reg-questions/'),
(7, 2, 'When reporting on financial statements prepared on the same basis of accounting as that used for income tax purposes, the auditor should include in the report a paragraph that', 'States that the income tax basis of accounting is a basis of accounting other than generally accepted accounting principles.', 'Justifies the use of the income tax basis of accounting.', 'Emphasizes that the financial statements are not intended to have been audited in accordance with generally accepted auditing standards.', 'Refers to the authoritative pronouncements that explain the income tax basis of accounting being used.', 'A', 'https://www.efficientlearning.com/cpa/resources/pop-quiz/reg-questions/'),
(8, 2, 'When an auditor reports on financial statements prepared on an entity?s income tax basis, the auditor?s report should', 'Disclaim an opinion on whether the statements were examined in accordance with generally accepted auditing standards.', 'Not express an opinion on whether the statements are presented in conformity with the comprehensive basis of accounting used.', 'Include an explanation of how the results of operations differ from the cash receipts and disbursements basis of accounting.', 'State that the basis of presentation is a comprehensive basis of accounting other than GAAP.', 'D', 'https://www.efficientlearning.com/cpa/resources/pop-quiz/reg-questions/'),
(9, 2, 'An entity prepares its financial statements on its income tax basis. A description of how that basis differs from GAAP should be included in the', 'Notes to the financial statements.', 'Auditor?s engagement letter.', 'Management representation letter.', 'Introductory paragraph of the auditor?s report.', 'A', 'https://www.efficientlearning.com/cpa/resources/pop-quiz/reg-questions/'),
(10, 2, 'An auditor?s special report on financial statements prepared in conformity with the cash basis of accounting should include a separate explanatory paragraph after the opinion paragraph that', 'Justifies the reasons for departing from generally accepted accounting principles.', 'States whether the financial statements are fairly presented in conformity with another basis of accounting.', 'Refers to the note to the financial statements that describes the basis of accounting.', 'Explains how the results of operations differ from financial statements prepared in conformity with generally accepted accounting principles.', 'C', 'https://www.efficientlearning.com/cpa/resources/pop-quiz/reg-questions/');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `timeduration` varchar(50) NOT NULL DEFAULT '30',
  `passingrate` int(11) NOT NULL DEFAULT '50',
  `attempt` int(11) NOT NULL DEFAULT '0',
  `items` int(11) NOT NULL DEFAULT '50'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `description`, `timeduration`, `passingrate`, `attempt`, `items`) VALUES
(1, 'Advanced Financial Accounting and Reporting', 'Advanced Financial Accounting and Reporting', '30', 50, 1, 70),
(2, 'Auditing', 'Auditing', '40', 60, 1, 70),
(3, 'Financial Accounting and Reporting', 'Financial Accounting and Reporting', '60', 50, 1, 70),
(4, 'Management Advisory Services', 'Management Advisory Services', '70', 89, 1, 50),
(5, 'Regulatory Framework for Business Transactions', 'Regulatory Framework for Business Transactions', '30', 50, 1, 50),
(6, 'Taxation', 'Taxation', '30', 50, 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id`, `subject_id`, `name`, `date`) VALUES
(1, 1, 'Partnership Accounting', '2017-02-10 16:22:36'),
(2, 1, 'Corporate Liquidation', '2017-02-24 12:11:16'),
(3, 1, 'Joint Arrangements (PFRS 11)', '2017-02-24 05:53:57'),
(4, 1, 'Revenue Recognition', '2017-03-05 13:20:57'),
(5, 1, 'Accounting for Home Office, Branch and Agency Transactions', '2017-03-05 13:20:57'),
(6, 1, 'Accounting for Business Combination (PFRS 3)', '2017-03-05 13:20:57'),
(7, 1, 'Separate Financial Statement (PAS 27)', '2017-03-05 13:20:57'),
(8, 1, 'Consolidated Financial Statements (PFRS 10)', '2017-03-05 13:20:57'),
(9, 1, 'Foreign Currency Transactions', '2017-03-05 13:20:57'),
(10, 1, 'Translation of Foreign Currency Financial Statements (PAS 21/PAS 29)', '2017-03-05 13:20:57'),
(11, 1, 'Not - for - profit organizations', '2017-03-05 13:20:57'),
(12, 1, 'Government Accounting - General Fund', '2017-03-05 13:20:57'),
(13, 1, 'Other special Topics (Basic knowledge)', '2017-03-05 13:20:57'),
(14, 1, 'Cost Accounting', '2017-03-05 13:20:57'),
(15, 2, 'Fundamentals of Auditing and Assurance Services', '2017-03-05 14:15:59'),
(16, 2, 'The Financial Statements Audit -Client Acceptance, Audit Planning, Supervision and Monitoring', '2017-03-05 14:15:59'),
(17, 2, 'Understanding the Entity and its Environment Including its Internal Control and Assessing the Risks of Material\r\nMisstatement\r\n', '2017-03-05 14:15:59'),
(18, 2, 'Audit Objectives, Procedures, Evidences and Documentation', '2017-03-05 14:15:59'),
(19, 2, 'Completing the Audit/ Post-Audit Responsibilities', '2017-03-05 14:15:59'),
(20, 2, 'Reports on Audited Financial Statements', '2017-03-05 14:15:59'),
(21, 2, 'Auditing in a Computerized Information Systems (CIS) Environment', '2017-03-05 14:15:59'),
(22, 2, 'Other Assurance and Non-assurance Services', '2017-03-05 14:15:59'),
(23, 2, 'Evidence Accumulation and Evaluation – Substantive Tests of Transactions and Balances', '2017-03-05 14:15:59'),
(24, 3, 'Development of Financial Reporting Framework and Standard-Setting Bodies, Regulation of the\r\nAccountancy Profession', '2017-03-05 14:34:44'),
(25, 3, 'Accounting Process', '2017-03-05 14:34:44'),
(26, 3, 'Conceptual Framework', '2017-03-05 14:34:44'),
(27, 3, 'Presentation of Financial Statements ( IAS 1, IAS 8, IAS 10, IAS 7, IFRS 5, IAS 33, IAS 18 / IFRS 15)', '2017-03-05 14:34:44'),
(28, 3, 'Assets', '2017-03-05 14:34:44'),
(29, 3, 'Liabilities (IFRIC 1, IAS 32, IAS 39/ IFRS 9, IFRS 7, IAS 37)', '2017-03-05 14:34:44'),
(30, 3, 'Equity', '2017-03-05 14:34:44'),
(31, 3, 'Other Topics', '2017-03-05 14:34:44'),
(32, 3, 'Interim Reporting (IAS 34)', '2017-03-05 14:34:44'),
(33, 3, 'IFRS for Small and Medium Sized Entities', '2017-03-05 14:34:44'),
(34, 3, 'Cash to Accrual', '2017-03-05 14:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isadmin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstname`, `lastname`, `createdat`, `isadmin`) VALUES
(1, 'admin@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 'admin', 'admin', '2017-02-04 19:03:07', 1),
(2, 'student@gmail.com', '5e5545d38a68148a2d5bd5ec9a89e327', 'student', 'studentweew', '2017-02-04 19:03:07', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guidelines`
--
ALTER TABLE `guidelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guidelines`
--
ALTER TABLE `guidelines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
