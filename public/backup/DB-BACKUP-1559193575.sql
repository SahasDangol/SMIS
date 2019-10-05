DROP TABLE IF EXISTS about_institutes;

CREATE TABLE `about_institutes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `about_institutes_post_by_foreign` (`post_by`),
  KEY `about_institutes_verified_by_foreign` (`verified_by`),
  CONSTRAINT `about_institutes_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `about_institutes_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS academics_years;

CREATE TABLE `academics_years` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `session` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_status` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `academics_years_post_by_foreign` (`post_by`),
  KEY `academics_years_verified_by_foreign` (`verified_by`),
  CONSTRAINT `academics_years_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `academics_years_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO academics_years VALUES('1','2076-2077','2076','','1','1','1','0','','1','','2019-05-23 03:06:43','2019-05-23 03:06:43','0');



DROP TABLE IF EXISTS bank_accounts;

CREATE TABLE `bank_accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` decimal(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `bank_accounts_post_by_foreign` (`post_by`),
  KEY `bank_accounts_verified_by_foreign` (`verified_by`),
  CONSTRAINT `bank_accounts_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `bank_accounts_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS chart_of_accounts;

CREATE TABLE `chart_of_accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `chart_of_accounts_post_by_foreign` (`post_by`),
  KEY `chart_of_accounts_verified_by_foreign` (`verified_by`),
  CONSTRAINT `chart_of_accounts_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `chart_of_accounts_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS class_days;

CREATE TABLE `class_days` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `day` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `class_days_post_by_foreign` (`post_by`),
  KEY `class_days_verified_by_foreign` (`verified_by`),
  CONSTRAINT `class_days_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `class_days_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS classrooms;

CREATE TABLE `classrooms` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `class_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_status` tinyint(1) NOT NULL DEFAULT '0',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `classrooms_post_by_foreign` (`post_by`),
  KEY `classrooms_verified_by_foreign` (`verified_by`),
  CONSTRAINT `classrooms_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `classrooms_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO classrooms VALUES('1','One','0','','1','1','0','','1','','2019-05-23 05:10:58','2019-05-23 05:10:58','0');
INSERT INTO classrooms VALUES('2','Two','0','','1','1','0','','1','','2019-05-29 06:38:49','2019-05-29 06:38:49','0');



DROP TABLE IF EXISTS complains;

CREATE TABLE `complains` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` int(11) DEFAULT NULL,
  `complain_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taken_action` text COLLATE utf8mb4_unicode_ci,
  `note` text COLLATE utf8mb4_unicode_ci,
  `attach_document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `complains_post_by_foreign` (`post_by`),
  KEY `complains_verified_by_foreign` (`verified_by`),
  CONSTRAINT `complains_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `complains_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS contents;

CREATE TABLE `contents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `contents_post_by_foreign` (`post_by`),
  KEY `contents_verified_by_foreign` (`verified_by`),
  CONSTRAINT `contents_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `contents_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS copy_of_invoices;

CREATE TABLE `copy_of_invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `session_id` int(10) unsigned NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `previous_dues` decimal(8,2) NOT NULL DEFAULT '0.00',
  `total` decimal(8,2) NOT NULL,
  `paid` decimal(8,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `balance` decimal(8,2) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `copy_of_invoices_post_by_foreign` (`post_by`),
  KEY `copy_of_invoices_verified_by_foreign` (`verified_by`),
  CONSTRAINT `copy_of_invoices_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `copy_of_invoices_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS departments;

CREATE TABLE `departments` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `departments_name_unique` (`name`),
  KEY `departments_post_by_foreign` (`post_by`),
  KEY `departments_verified_by_foreign` (`verified_by`),
  CONSTRAINT `departments_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `departments_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO departments VALUES('1','Academics','1','','1','0','','1','','','','0');
INSERT INTO departments VALUES('2','Account','1','','1','0','','1','','','','0');
INSERT INTO departments VALUES('3','Exam','1','','1','0','','1','','','','0');
INSERT INTO departments VALUES('4','Sports','1','','1','0','','1','','','','0');
INSERT INTO departments VALUES('5','Library','1','','1','0','','1','','','','0');



DROP TABLE IF EXISTS designations;

CREATE TABLE `designations` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `designations_name_unique` (`name`),
  KEY `designations_post_by_foreign` (`post_by`),
  KEY `designations_verified_by_foreign` (`verified_by`),
  CONSTRAINT `designations_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `designations_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO designations VALUES('1','Principal','1','','1','0','','1','','','','0');
INSERT INTO designations VALUES('2','Teacher','1','','1','0','','1','','','','0');
INSERT INTO designations VALUES('3','Accountant','1','','1','0','','1','','','','0');
INSERT INTO designations VALUES('4','Receptionist','1','','1','0','','1','','','','0');
INSERT INTO designations VALUES('5','Lab Incharge','1','','1','0','','1','','','','0');
INSERT INTO designations VALUES('6','Sports Teacher','1','','1','0','','1','','','','0');
INSERT INTO designations VALUES('7','Peon','1','','1','0','','1','','','','0');
INSERT INTO designations VALUES('8','Gardener','1','','1','0','','1','','','','0');
INSERT INTO designations VALUES('9','Driver','1','','1','0','','1','','','','0');
INSERT INTO designations VALUES('10','Admin','1','','1','0','','1','','','','0');



DROP TABLE IF EXISTS enquiries;

CREATE TABLE `enquiries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` tinyint(3) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `enquiries_session_id_foreign` (`session_id`),
  KEY `enquiries_post_by_foreign` (`post_by`),
  KEY `enquiries_verified_by_foreign` (`verified_by`),
  CONSTRAINT `enquiries_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `enquiries_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `academics_years` (`id`),
  CONSTRAINT `enquiries_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO enquiries VALUES('1','1','jkflsadj','hjadfslkh','jdsalf@fjska.com','ljldsafj','lkjfdaslk','','1','0','','1','','1','2019-05-26 03:10:02','2019-05-26 03:10:02','0');
INSERT INTO enquiries VALUES('2','1','Rikesh Shrestha','9841236972','admin@turingsoft.com','Dumb','Dummy text','','1','0','','1','','1','2019-05-26 03:15:13','2019-05-26 03:15:13','0');
INSERT INTO enquiries VALUES('3','1','Rikesh Shrestha','567890','admin@turingsoft.com','ghjkl;','ghjkl;','','1','0','','1','','1','2019-05-26 07:56:58','2019-05-26 07:56:58','0');



DROP TABLE IF EXISTS exam_lists;

CREATE TABLE `exam_lists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `routine_status` tinyint(1) NOT NULL DEFAULT '0',
  `publish_status` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `exam_lists_post_by_foreign` (`post_by`),
  KEY `exam_lists_verified_by_foreign` (`verified_by`),
  CONSTRAINT `exam_lists_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `exam_lists_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO exam_lists VALUES('1','First Terminal','','1','1','1','1','0','','1','','2019-05-27 10:26:08','2019-05-29 10:17:56','0');



DROP TABLE IF EXISTS exam_results;

CREATE TABLE `exam_results` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` tinyint(3) unsigned NOT NULL,
  `exam_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `classroom_id` tinyint(3) unsigned NOT NULL,
  `section_id` tinyint(3) unsigned NOT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `exam_results_session_id_foreign` (`session_id`),
  KEY `exam_results_exam_id_foreign` (`exam_id`),
  KEY `exam_results_student_id_foreign` (`student_id`),
  KEY `exam_results_classroom_id_foreign` (`classroom_id`),
  KEY `exam_results_section_id_foreign` (`section_id`),
  KEY `exam_results_post_by_foreign` (`post_by`),
  KEY `exam_results_verified_by_foreign` (`verified_by`),
  CONSTRAINT `exam_results_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  CONSTRAINT `exam_results_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exam_lists` (`id`),
  CONSTRAINT `exam_results_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `exam_results_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  CONSTRAINT `exam_results_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `academics_years` (`id`),
  CONSTRAINT `exam_results_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  CONSTRAINT `exam_results_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS exam_routines;

CREATE TABLE `exam_routines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `exam_id` int(10) unsigned NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` tinyint(3) unsigned NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `exam_routines_exam_id_foreign` (`exam_id`),
  KEY `exam_routines_session_id_foreign` (`session_id`),
  KEY `exam_routines_post_by_foreign` (`post_by`),
  KEY `exam_routines_verified_by_foreign` (`verified_by`),
  CONSTRAINT `exam_routines_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exam_lists` (`id`),
  CONSTRAINT `exam_routines_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `exam_routines_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `academics_years` (`id`),
  CONSTRAINT `exam_routines_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO exam_routines VALUES('3','1','public/1558954490.jpg','1','','1','1','0','','1','','2019-05-27 10:54:51','2019-05-27 10:54:51','0');



DROP TABLE IF EXISTS f_a_qs;

CREATE TABLE `f_a_qs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'undefined',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `f_a_qs_post_by_foreign` (`post_by`),
  KEY `f_a_qs_verified_by_foreign` (`verified_by`),
  CONSTRAINT `f_a_qs_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `f_a_qs_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS fee_type_status;

CREATE TABLE `fee_type_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fee_type_id` int(10) unsigned NOT NULL,
  `session_id` tinyint(3) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fee_type_status_fee_type_id_foreign` (`fee_type_id`),
  KEY `fee_type_status_session_id_foreign` (`session_id`),
  CONSTRAINT `fee_type_status_fee_type_id_foreign` FOREIGN KEY (`fee_type_id`) REFERENCES `fee_types` (`id`),
  CONSTRAINT `fee_type_status_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `academics_years` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO fee_type_status VALUES('1','1','1','0','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_type_status VALUES('2','2','1','0','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_type_status VALUES('3','3','1','0','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_type_status VALUES('4','4','1','0','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_type_status VALUES('5','5','1','0','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_type_status VALUES('6','6','1','0','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_type_status VALUES('7','7','1','0','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_type_status VALUES('8','8','1','0','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_type_status VALUES('9','9','1','1','2019-05-23 10:50:44','2019-05-24 09:14:10','0');
INSERT INTO fee_type_status VALUES('10','10','1','0','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_type_status VALUES('11','11','1','0','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_type_status VALUES('12','12','1','0','2019-05-23 10:50:44','2019-05-23 10:50:44','0');



DROP TABLE IF EXISTS fee_types;

CREATE TABLE `fee_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` tinyint(3) unsigned NOT NULL,
  `fee_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classroom_id` tinyint(3) unsigned NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `fee_types_id_unique` (`id`),
  KEY `fee_types_session_id_foreign` (`session_id`),
  KEY `fee_types_classroom_id_foreign` (`classroom_id`),
  KEY `fee_types_post_by_foreign` (`post_by`),
  KEY `fee_types_verified_by_foreign` (`verified_by`),
  CONSTRAINT `fee_types_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  CONSTRAINT `fee_types_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `fee_types_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `academics_years` (`id`),
  CONSTRAINT `fee_types_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO fee_types VALUES('1','1','01001','Baishak Monthly Fee','monthly','1','1500.00','','1','1','0','','1','','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_types VALUES('2','1','01001','Jestha Monthly Fee','monthly','1','1500.00','','1','1','0','','1','','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_types VALUES('3','1','01001','Ashad Monthly Fee','monthly','1','1500.00','','1','1','0','','1','','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_types VALUES('4','1','01001','Shrawan Monthly Fee','monthly','1','1500.00','','1','1','0','','1','','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_types VALUES('5','1','01001','Bhadra Monthly Fee','monthly','1','1500.00','','1','1','0','','1','','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_types VALUES('6','1','01001','Ashwin Monthly Fee','monthly','1','1500.00','','1','1','0','','1','','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_types VALUES('7','1','01001','Kartik Monthly Fee','monthly','1','1500.00','','1','1','0','','1','','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_types VALUES('8','1','01001','Mangsir Monthly Fee','monthly','1','1500.00','','1','1','0','','1','','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_types VALUES('9','1','01001','Poush Monthly Fee','monthly','1','1500.00','','1','1','0','','1','','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_types VALUES('10','1','01001','Magh Monthly Fee','monthly','1','1500.00','','1','1','0','','1','','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_types VALUES('11','1','01001','Falgun Monthly Fee','monthly','1','1500.00','','1','1','0','','1','','2019-05-23 10:50:44','2019-05-23 10:50:44','0');
INSERT INTO fee_types VALUES('12','1','01001','Chaitra Monthly Fee','monthly','1','1500.00','','1','1','0','','1','','2019-05-23 10:50:44','2019-05-23 10:50:44','0');



DROP TABLE IF EXISTS fiscal_years;

CREATE TABLE `fiscal_years` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ending_date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_status` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fiscal_years_post_by_foreign` (`post_by`),
  KEY `fiscal_years_verified_by_foreign` (`verified_by`),
  CONSTRAINT `fiscal_years_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `fiscal_years_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO fiscal_years VALUES('1','75/76','2018-07-17','2019-07-16','','1','1','1','0','','1','','','2019-05-28 04:35:07','0');



DROP TABLE IF EXISTS galleries;

CREATE TABLE `galleries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `galleries_post_by_foreign` (`post_by`),
  KEY `galleries_verified_by_foreign` (`verified_by`),
  CONSTRAINT `galleries_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `galleries_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS gallery_images;

CREATE TABLE `gallery_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` int(10) unsigned NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `gallery_images_gallery_id_foreign` (`gallery_id`),
  CONSTRAINT `gallery_images_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS groups;

CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO groups VALUES('1','Assets','0','0','','','','1','','','0');
INSERT INTO groups VALUES('2','Current Assets','1','1','','','','1','','','0');
INSERT INTO groups VALUES('3','Bank Accounts','2','2','','','','1','','','0');
INSERT INTO groups VALUES('4','Cash-In-Hand','2','2','','','','1','','','0');
INSERT INTO groups VALUES('5','Deposits','2','2','','','','1','','','0');
INSERT INTO groups VALUES('6','Loans And Advances','2','2','','','','1','','','0');
INSERT INTO groups VALUES('7','Stock-In-Hand','2','2','','','','1','','','0');
INSERT INTO groups VALUES('8','Sundry Debtors','2','2','','','','1','','','0');
INSERT INTO groups VALUES('9','Miscellaneous Expenses','1','1','','','','1','','','0');
INSERT INTO groups VALUES('10','Investments','1','1','','','','1','','','0');
INSERT INTO groups VALUES('11','Fixed Assets','1','1','','','','1','','','0');
INSERT INTO groups VALUES('12','Liabilities','0','0','','','','1','','','0');
INSERT INTO groups VALUES('13','Branch/Divisions','12','1','','','','1','','','0');
INSERT INTO groups VALUES('14','Loans','12','1','','','','1','','','0');
INSERT INTO groups VALUES('15','Bank OCC A/C (Bank OD A/C)','14','2','','','','1','','','0');
INSERT INTO groups VALUES('16','Secured Loans','14','2','','','','1','','','0');
INSERT INTO groups VALUES('17','Unsecured Loans','14','2','','','','1','','','0');
INSERT INTO groups VALUES('18','Suspense A/C','12','1','','','','1','','','0');
INSERT INTO groups VALUES('19','Current Liabilities','12','1','','','','1','','','0');
INSERT INTO groups VALUES('20','Provisions','19','2','','','','1','','','0');
INSERT INTO groups VALUES('21','Sundry Creditors','19','2','','','','1','','','0');
INSERT INTO groups VALUES('22','Duties & Taxes','19','2','','','','1','','','0');
INSERT INTO groups VALUES('23','Capital Account','12','1','','','','1','','','0');
INSERT INTO groups VALUES('24','Reserves & Surplus (Retained Earnings)','23','2','','','','1','','','0');
INSERT INTO groups VALUES('25','Income','25','0','','','','1','','','0');
INSERT INTO groups VALUES('26','Sales Accounts','25','1','','','','1','','','0');
INSERT INTO groups VALUES('27','Indirect Incomes','25','1','','','','1','','','0');
INSERT INTO groups VALUES('28','Direct Incomes','25','1','','','','1','','','0');
INSERT INTO groups VALUES('29','Expenses','29','0','','','','1','','','0');
INSERT INTO groups VALUES('30','Purchase Accounts','29','1','','','','1','','','0');
INSERT INTO groups VALUES('31','Indirect Expenses','29','1','','','','1','','','0');
INSERT INTO groups VALUES('32','Direct Expenses','29','1','','','','1','','','0');



DROP TABLE IF EXISTS income_expenses;

CREATE TABLE `income_expenses` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `month` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income` int(11) NOT NULL DEFAULT '0',
  `expense` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `income_expenses_post_by_foreign` (`post_by`),
  KEY `income_expenses_verified_by_foreign` (`verified_by`),
  CONSTRAINT `income_expenses_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `income_expenses_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO income_expenses VALUES('1','Baishak','0','0','1','1','0','','1','','','2019-05-29 15:20:51','0');
INSERT INTO income_expenses VALUES('2','Jestha','127000','0','1','1','0','','1','','','2019-05-29 15:20:51','0');
INSERT INTO income_expenses VALUES('3','Ashad','0','0','1','1','0','','1','','','2019-05-29 15:20:51','0');
INSERT INTO income_expenses VALUES('4','Shrawan','0','0','1','1','0','','1','','','2019-05-29 15:20:51','0');
INSERT INTO income_expenses VALUES('5','Bhadra','0','0','1','1','0','','1','','','2019-05-29 15:20:51','0');
INSERT INTO income_expenses VALUES('6','Ashwin','0','0','1','1','0','','1','','','2019-05-29 15:20:51','0');
INSERT INTO income_expenses VALUES('7','Kartik','0','0','1','1','0','','1','','','2019-05-29 15:20:51','0');
INSERT INTO income_expenses VALUES('8','Mangsir','0','0','1','1','0','','1','','','2019-05-29 15:20:51','0');
INSERT INTO income_expenses VALUES('9','Poush','0','0','1','1','0','','1','','','2019-05-29 15:20:51','0');
INSERT INTO income_expenses VALUES('10','Magh','0','0','1','1','0','','1','','','2019-05-29 15:20:51','0');
INSERT INTO income_expenses VALUES('11','Falgun','0','0','1','1','0','','1','','','2019-05-29 15:20:51','0');
INSERT INTO income_expenses VALUES('12','Chaitra','0','0','1','1','0','','1','','','2019-05-29 15:20:51','0');



DROP TABLE IF EXISTS invoice_items;

CREATE TABLE `invoice_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(10) unsigned NOT NULL,
  `fee_type_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` decimal(8,2) NOT NULL,
  `paid` decimal(8,2) DEFAULT NULL,
  `scholarship` decimal(8,2) DEFAULT NULL,
  `balance` decimal(8,2) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `invoice_items_invoice_id_foreign` (`invoice_id`),
  KEY `invoice_items_fee_type_id_foreign` (`fee_type_id`),
  KEY `invoice_items_post_by_foreign` (`post_by`),
  KEY `invoice_items_verified_by_foreign` (`verified_by`),
  CONSTRAINT `invoice_items_fee_type_id_foreign` FOREIGN KEY (`fee_type_id`) REFERENCES `fee_types` (`id`) ON DELETE SET NULL,
  CONSTRAINT `invoice_items_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  CONSTRAINT `invoice_items_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `invoice_items_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO invoice_items VALUES('3','2','1','Baishak Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO invoice_items VALUES('4','2','','Transport Fee','1000.00','','','','','0','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO invoice_items VALUES('5','3','1','Baishak Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO invoice_items VALUES('6','4','1','Baishak Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO invoice_items VALUES('7','5','1','Baishak Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO invoice_items VALUES('8','6','1','Baishak Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO invoice_items VALUES('9','7','1','Baishak Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO invoice_items VALUES('10','8','1','Baishak Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO invoice_items VALUES('11','9','1','Baishak Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO invoice_items VALUES('12','10','1','Baishak Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO invoice_items VALUES('13','11','1','Baishak Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO invoice_items VALUES('14','12','2','Jestha Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:10:58','2019-05-23 11:10:58','0');
INSERT INTO invoice_items VALUES('15','12','','Transport Fee','1000.00','','','','','0','1','0','','1','','2019-05-23 11:10:58','2019-05-23 11:10:58','0');
INSERT INTO invoice_items VALUES('16','13','2','Jestha Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:10:58','2019-05-23 11:10:58','0');
INSERT INTO invoice_items VALUES('17','14','2','Jestha Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:10:58','2019-05-23 11:10:58','0');
INSERT INTO invoice_items VALUES('18','15','2','Jestha Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:10:58','2019-05-23 11:10:58','0');
INSERT INTO invoice_items VALUES('19','16','2','Jestha Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:10:58','2019-05-23 11:10:58','0');
INSERT INTO invoice_items VALUES('20','17','2','Jestha Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:10:59','2019-05-23 11:10:59','0');
INSERT INTO invoice_items VALUES('21','18','2','Jestha Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:10:59','2019-05-23 11:10:59','0');
INSERT INTO invoice_items VALUES('22','19','2','Jestha Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:10:59','2019-05-23 11:10:59','0');
INSERT INTO invoice_items VALUES('23','20','2','Jestha Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:10:59','2019-05-23 11:10:59','0');
INSERT INTO invoice_items VALUES('24','21','2','Jestha Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:10:59','2019-05-23 11:10:59','0');
INSERT INTO invoice_items VALUES('25','22','3','Ashad Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('26','22','','Transport Fee','1000.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('27','22','4','Shrawan Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('28','22','','Transport Fee','1000.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('29','22','5','Bhadra Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('30','22','','Transport Fee','1000.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('31','23','3','Ashad Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('32','23','4','Shrawan Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('33','23','5','Bhadra Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('34','24','3','Ashad Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('35','24','4','Shrawan Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('36','24','5','Bhadra Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('37','25','3','Ashad Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('38','25','4','Shrawan Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('39','25','5','Bhadra Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('40','26','3','Ashad Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('41','26','4','Shrawan Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('42','26','5','Bhadra Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('43','27','3','Ashad Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('44','27','4','Shrawan Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('45','27','5','Bhadra Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoice_items VALUES('46','28','3','Ashad Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:02','2019-05-23 11:12:02','0');
INSERT INTO invoice_items VALUES('47','28','4','Shrawan Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:02','2019-05-23 11:12:02','0');
INSERT INTO invoice_items VALUES('48','28','5','Bhadra Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:02','2019-05-23 11:12:02','0');
INSERT INTO invoice_items VALUES('49','29','3','Ashad Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:02','2019-05-23 11:12:02','0');
INSERT INTO invoice_items VALUES('50','29','4','Shrawan Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:02','2019-05-23 11:12:02','0');
INSERT INTO invoice_items VALUES('51','29','5','Bhadra Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:02','2019-05-23 11:12:02','0');
INSERT INTO invoice_items VALUES('52','30','3','Ashad Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:02','2019-05-23 11:12:02','0');
INSERT INTO invoice_items VALUES('53','30','4','Shrawan Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:02','2019-05-23 11:12:02','0');
INSERT INTO invoice_items VALUES('54','30','5','Bhadra Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:02','2019-05-23 11:12:02','0');
INSERT INTO invoice_items VALUES('55','31','3','Ashad Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:02','2019-05-23 11:12:02','0');
INSERT INTO invoice_items VALUES('56','31','4','Shrawan Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:02','2019-05-23 11:12:02','0');
INSERT INTO invoice_items VALUES('57','31','5','Bhadra Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-23 11:12:02','2019-05-23 11:12:02','0');
INSERT INTO invoice_items VALUES('58','32','6','Ashwin Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 06:24:57','2019-05-24 06:24:57','0');
INSERT INTO invoice_items VALUES('59','32','','Transport Fee','1000.00','','','','','0','1','0','','1','','2019-05-24 06:24:57','2019-05-24 06:24:57','0');
INSERT INTO invoice_items VALUES('60','33','10','Magh Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 07:36:05','2019-05-24 07:36:05','0');
INSERT INTO invoice_items VALUES('61','33','','Transport Fee','1000.00','','','','','0','1','0','','1','','2019-05-24 07:36:05','2019-05-24 07:36:05','0');
INSERT INTO invoice_items VALUES('62','33','11','Falgun Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 07:36:05','2019-05-24 07:36:05','0');
INSERT INTO invoice_items VALUES('63','33','','Transport Fee','1000.00','','','','','0','1','0','','1','','2019-05-24 07:36:05','2019-05-24 07:36:05','0');
INSERT INTO invoice_items VALUES('64','34','10','Magh Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 08:42:42','2019-05-24 08:42:42','0');
INSERT INTO invoice_items VALUES('65','35','12','Chaitra Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 08:43:32','2019-05-24 08:43:32','0');
INSERT INTO invoice_items VALUES('66','35','','Transport Fee','1000.00','','','','','0','1','0','','1','','2019-05-24 08:43:32','2019-05-24 08:43:32','0');
INSERT INTO invoice_items VALUES('67','36','12','Chaitra Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO invoice_items VALUES('68','37','12','Chaitra Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO invoice_items VALUES('69','38','12','Chaitra Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO invoice_items VALUES('70','39','12','Chaitra Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO invoice_items VALUES('71','40','12','Chaitra Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO invoice_items VALUES('72','41','12','Chaitra Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO invoice_items VALUES('73','42','12','Chaitra Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO invoice_items VALUES('74','43','12','Chaitra Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO invoice_items VALUES('75','44','12','Chaitra Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO invoice_items VALUES('76','45','10','Magh Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 08:47:50','2019-05-24 08:47:50','0');
INSERT INTO invoice_items VALUES('77','46','10','Magh Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 08:47:50','2019-05-24 08:47:50','0');
INSERT INTO invoice_items VALUES('78','47','10','Magh Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 08:47:50','2019-05-24 08:47:50','0');
INSERT INTO invoice_items VALUES('79','48','10','Magh Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 08:47:50','2019-05-24 08:47:50','0');
INSERT INTO invoice_items VALUES('80','49','10','Magh Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 08:47:50','2019-05-24 08:47:50','0');
INSERT INTO invoice_items VALUES('81','50','10','Magh Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 08:47:50','2019-05-24 08:47:50','0');
INSERT INTO invoice_items VALUES('82','51','10','Magh Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 08:47:51','2019-05-24 08:47:51','0');
INSERT INTO invoice_items VALUES('83','52','10','Magh Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 08:47:51','2019-05-24 08:47:51','0');
INSERT INTO invoice_items VALUES('84','53','9','Poush Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');
INSERT INTO invoice_items VALUES('85','53','','Transport Fee','1000.00','','','','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');
INSERT INTO invoice_items VALUES('86','54','9','Poush Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');
INSERT INTO invoice_items VALUES('87','55','9','Poush Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');
INSERT INTO invoice_items VALUES('88','56','9','Poush Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');
INSERT INTO invoice_items VALUES('89','57','9','Poush Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');
INSERT INTO invoice_items VALUES('90','58','9','Poush Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');
INSERT INTO invoice_items VALUES('91','59','9','Poush Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');
INSERT INTO invoice_items VALUES('92','60','9','Poush Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');
INSERT INTO invoice_items VALUES('93','61','9','Poush Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');
INSERT INTO invoice_items VALUES('94','62','9','Poush Monthly Fee','1500.00','','','','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');



DROP TABLE IF EXISTS invoices;

CREATE TABLE `invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `session_id` tinyint(3) unsigned NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `total` decimal(8,2) NOT NULL,
  `paid` decimal(8,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `previous_dues` decimal(8,2) NOT NULL DEFAULT '0.00',
  `balance` decimal(8,2) NOT NULL,
  `static_previous_dues` decimal(8,2) NOT NULL DEFAULT '0.00',
  `previous_invoice_id` int(10) unsigned DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `invoices_session_id_foreign` (`session_id`),
  KEY `invoices_previous_invoice_id_foreign` (`previous_invoice_id`),
  KEY `invoices_post_by_foreign` (`post_by`),
  KEY `invoices_verified_by_foreign` (`verified_by`),
  CONSTRAINT `invoices_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `invoices_previous_invoice_id_foreign` FOREIGN KEY (`previous_invoice_id`) REFERENCES `invoices` (`id`) ON DELETE SET NULL,
  CONSTRAINT `invoices_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `academics_years` (`id`),
  CONSTRAINT `invoices_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO invoices VALUES('2','7','1','2019-05-23','','','2500.00','2500.00','0.00','0.00','0.00','0.00','','','1','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:16:11','0');
INSERT INTO invoices VALUES('3','8','1','2019-05-23','','','1500.00','0.00','0.00','0.00','1500.00','0.00','','','0','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO invoices VALUES('4','9','1','2019-05-23','','','1500.00','0.00','0.00','0.00','1500.00','0.00','','','0','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO invoices VALUES('5','10','1','2019-05-23','','','1500.00','0.00','0.00','0.00','1500.00','0.00','','','0','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO invoices VALUES('6','11','1','2019-05-23','','','1500.00','0.00','0.00','0.00','1500.00','0.00','','','0','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO invoices VALUES('7','12','1','2019-05-23','','','1500.00','0.00','0.00','0.00','1500.00','0.00','','','0','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO invoices VALUES('8','13','1','2019-05-23','','','1500.00','0.00','0.00','0.00','1500.00','0.00','','','0','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO invoices VALUES('9','14','1','2019-05-23','','','1500.00','0.00','0.00','0.00','1500.00','0.00','','','0','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO invoices VALUES('10','15','1','2019-05-23','','','1500.00','0.00','0.00','0.00','1500.00','0.00','','','0','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO invoices VALUES('11','16','1','2019-05-23','','','1500.00','0.00','0.00','0.00','1500.00','0.00','','','0','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO invoices VALUES('12','7','1','2019-05-23','','','2500.00','2500.00','0.00','0.00','0.00','2500.00','2','','1','1','0','','1','','2019-05-23 11:10:58','2019-05-23 11:16:11','0');
INSERT INTO invoices VALUES('13','8','1','2019-05-23','','','1500.00','0.00','0.00','1500.00','1500.00','1500.00','3','','0','1','0','','1','','2019-05-23 11:10:58','2019-05-23 11:10:58','0');
INSERT INTO invoices VALUES('14','9','1','2019-05-23','','','1500.00','0.00','0.00','1500.00','1500.00','1500.00','4','','0','1','0','','1','','2019-05-23 11:10:58','2019-05-23 11:10:58','0');
INSERT INTO invoices VALUES('15','10','1','2019-05-23','','','1500.00','0.00','0.00','1500.00','1500.00','1500.00','5','','0','1','0','','1','','2019-05-23 11:10:58','2019-05-23 11:10:58','0');
INSERT INTO invoices VALUES('16','11','1','2019-05-23','','','1500.00','0.00','0.00','1500.00','1500.00','1500.00','6','','0','1','0','','1','','2019-05-23 11:10:58','2019-05-23 11:10:58','0');
INSERT INTO invoices VALUES('17','12','1','2019-05-23','','','1500.00','0.00','0.00','1500.00','1500.00','1500.00','7','','0','1','0','','1','','2019-05-23 11:10:59','2019-05-23 11:10:59','0');
INSERT INTO invoices VALUES('18','13','1','2019-05-23','','','1500.00','0.00','0.00','1500.00','1500.00','1500.00','8','','0','1','0','','1','','2019-05-23 11:10:59','2019-05-23 11:10:59','0');
INSERT INTO invoices VALUES('19','14','1','2019-05-23','','','1500.00','0.00','0.00','1500.00','1500.00','1500.00','9','','0','1','0','','1','','2019-05-23 11:10:59','2019-05-23 11:10:59','0');
INSERT INTO invoices VALUES('20','15','1','2019-05-23','','','1500.00','0.00','0.00','1500.00','1500.00','1500.00','10','','0','1','0','','1','','2019-05-23 11:10:59','2019-05-23 11:10:59','0');
INSERT INTO invoices VALUES('21','16','1','2019-05-23','','','1500.00','0.00','0.00','1500.00','1500.00','1500.00','11','','0','1','0','','1','','2019-05-23 11:10:59','2019-05-23 11:10:59','0');
INSERT INTO invoices VALUES('22','7','1','2019-05-23','','','7500.00','7000.00','0.00','0.00','500.00','5000.00','12','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:16:12','0');
INSERT INTO invoices VALUES('23','8','1','2019-05-23','','','4500.00','0.00','0.00','3000.00','4500.00','3000.00','13','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoices VALUES('24','9','1','2019-05-23','','','4500.00','0.00','0.00','3000.00','4500.00','3000.00','14','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoices VALUES('25','10','1','2019-05-23','','','4500.00','0.00','0.00','3000.00','4500.00','3000.00','15','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoices VALUES('26','11','1','2019-05-23','','','4500.00','0.00','0.00','3000.00','4500.00','3000.00','16','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoices VALUES('27','12','1','2019-05-23','','','4500.00','0.00','0.00','3000.00','4500.00','3000.00','17','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoices VALUES('28','13','1','2019-05-23','','','4500.00','0.00','0.00','3000.00','4500.00','3000.00','18','','0','1','0','','1','','2019-05-23 11:12:01','2019-05-23 11:12:01','0');
INSERT INTO invoices VALUES('29','14','1','2019-05-23','','','4500.00','0.00','0.00','3000.00','4500.00','3000.00','19','','0','1','0','','1','','2019-05-23 11:12:02','2019-05-23 11:12:02','0');
INSERT INTO invoices VALUES('30','15','1','2019-05-23','','','4500.00','0.00','0.00','3000.00','4500.00','3000.00','20','','0','1','0','','1','','2019-05-23 11:12:02','2019-05-23 11:12:02','0');
INSERT INTO invoices VALUES('31','16','1','2019-05-23','','','4500.00','0.00','0.00','3000.00','4500.00','3000.00','21','','0','1','0','','1','','2019-05-23 11:12:02','2019-05-23 11:12:02','0');
INSERT INTO invoices VALUES('32','7','1','2019-05-24','','','2500.00','0.00','0.00','500.00','2500.00','500.00','22','','0','1','0','','1','','2019-05-24 06:24:57','2019-05-24 06:24:57','0');
INSERT INTO invoices VALUES('33','7','1','2019-05-24','','','5000.00','0.00','3000.00','3000.00','2000.00','3000.00','32','','0','1','0','','1','','2019-05-24 07:36:05','2019-05-24 07:36:05','0');
INSERT INTO invoices VALUES('34','12','1','2019-05-24','','','1500.00','0.00','0.00','7500.00','1500.00','7500.00','27','','0','1','0','','1','','2019-05-24 08:42:42','2019-05-24 08:42:42','0');
INSERT INTO invoices VALUES('35','7','1','2019-05-24','','','2500.00','0.00','0.00','5000.00','2500.00','5000.00','33','','0','1','0','','1','','2019-05-24 08:43:32','2019-05-24 08:43:32','0');
INSERT INTO invoices VALUES('36','8','1','2019-05-24','','','1500.00','0.00','0.00','7500.00','1500.00','7500.00','23','','0','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO invoices VALUES('37','9','1','2019-05-24','','','1500.00','0.00','0.00','7500.00','1500.00','7500.00','24','','0','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO invoices VALUES('38','10','1','2019-05-24','','','1500.00','0.00','0.00','7500.00','1500.00','7500.00','25','','0','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO invoices VALUES('39','11','1','2019-05-24','','','1500.00','0.00','0.00','7500.00','1500.00','7500.00','26','','0','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO invoices VALUES('40','12','1','2019-05-24','','','1500.00','0.00','0.00','9000.00','1500.00','9000.00','34','','0','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO invoices VALUES('41','13','1','2019-05-24','','','1500.00','0.00','0.00','7500.00','1500.00','7500.00','28','','0','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO invoices VALUES('42','14','1','2019-05-24','','','1500.00','0.00','0.00','7500.00','1500.00','7500.00','29','','0','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO invoices VALUES('43','15','1','2019-05-24','','','1500.00','0.00','0.00','7500.00','1500.00','7500.00','30','','0','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO invoices VALUES('44','16','1','2019-05-24','','','1500.00','0.00','0.00','7500.00','1500.00','7500.00','31','','0','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO invoices VALUES('45','8','1','2019-05-24','','','1500.00','0.00','0.00','9000.00','1500.00','9000.00','36','','0','1','0','','1','','2019-05-24 08:47:50','2019-05-24 08:47:50','0');
INSERT INTO invoices VALUES('46','9','1','2019-05-24','','','1500.00','0.00','0.00','9000.00','1500.00','9000.00','37','','0','1','0','','1','','2019-05-24 08:47:50','2019-05-24 08:47:50','0');
INSERT INTO invoices VALUES('47','10','1','2019-05-24','','','1500.00','0.00','0.00','9000.00','1500.00','9000.00','38','','0','1','0','','1','','2019-05-24 08:47:50','2019-05-24 08:47:50','0');
INSERT INTO invoices VALUES('48','11','1','2019-05-24','','','1500.00','0.00','0.00','9000.00','1500.00','9000.00','39','','0','1','0','','1','','2019-05-24 08:47:50','2019-05-24 08:47:50','0');
INSERT INTO invoices VALUES('49','13','1','2019-05-24','','','1500.00','0.00','0.00','9000.00','1500.00','9000.00','41','','0','1','0','','1','','2019-05-24 08:47:50','2019-05-24 08:47:50','0');
INSERT INTO invoices VALUES('50','14','1','2019-05-24','','','1500.00','0.00','0.00','9000.00','1500.00','9000.00','42','','0','1','0','','1','','2019-05-24 08:47:50','2019-05-24 08:47:50','0');
INSERT INTO invoices VALUES('51','15','1','2019-05-24','','','1500.00','0.00','0.00','9000.00','1500.00','9000.00','43','','0','1','0','','1','','2019-05-24 08:47:51','2019-05-24 08:47:51','0');
INSERT INTO invoices VALUES('52','16','1','2019-05-24','','','1500.00','0.00','0.00','9000.00','1500.00','9000.00','44','','0','1','0','','1','','2019-05-24 08:47:51','2019-05-24 08:47:51','0');
INSERT INTO invoices VALUES('53','7','1','2019-05-24','','','2500.00','0.00','1500.00','7500.00','1000.00','7500.00','35','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');
INSERT INTO invoices VALUES('54','8','1','2019-05-24','','','1500.00','0.00','0.00','10500.00','1500.00','10500.00','45','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');
INSERT INTO invoices VALUES('55','9','1','2019-05-24','','','1500.00','0.00','0.00','10500.00','1500.00','10500.00','46','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');
INSERT INTO invoices VALUES('56','10','1','2019-05-24','','','1500.00','0.00','0.00','10500.00','1500.00','10500.00','47','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');
INSERT INTO invoices VALUES('57','11','1','2019-05-24','','','1500.00','0.00','0.00','10500.00','1500.00','10500.00','48','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');
INSERT INTO invoices VALUES('58','12','1','2019-05-24','','','1500.00','0.00','0.00','10500.00','1500.00','10500.00','40','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');
INSERT INTO invoices VALUES('59','13','1','2019-05-24','','','1500.00','0.00','0.00','10500.00','1500.00','10500.00','49','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');
INSERT INTO invoices VALUES('60','14','1','2019-05-24','','','1500.00','0.00','0.00','10500.00','1500.00','10500.00','50','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');
INSERT INTO invoices VALUES('61','15','1','2019-05-24','','','1500.00','0.00','0.00','10500.00','1500.00','10500.00','51','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');
INSERT INTO invoices VALUES('62','16','1','2019-05-24','','','1500.00','0.00','1500.00','10500.00','0.00','10500.00','52','','0','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');



DROP TABLE IF EXISTS item_of_journals;

CREATE TABLE `item_of_journals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `journal_id` int(10) unsigned NOT NULL,
  `ledger_id` int(10) unsigned NOT NULL,
  `debit` decimal(8,2) NOT NULL,
  `credit` decimal(8,2) NOT NULL,
  `cr_dr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `item_of_journals_journal_id_foreign` (`journal_id`),
  KEY `item_of_journals_ledger_id_foreign` (`ledger_id`),
  KEY `item_of_journals_post_by_foreign` (`post_by`),
  KEY `item_of_journals_verified_by_foreign` (`verified_by`),
  CONSTRAINT `item_of_journals_journal_id_foreign` FOREIGN KEY (`journal_id`) REFERENCES `journals` (`id`),
  CONSTRAINT `item_of_journals_ledger_id_foreign` FOREIGN KEY (`ledger_id`) REFERENCES `list_of_ledgers` (`id`),
  CONSTRAINT `item_of_journals_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `item_of_journals_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO item_of_journals VALUES('1','1','2','16000.00','0.00','dr','1','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO item_of_journals VALUES('2','1','3','0.00','16000.00','cr','1','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO item_of_journals VALUES('3','2','2','0.00','0.00','dr','1','1','0','','1','','2019-05-23 11:09:43','2019-05-23 11:09:43','0');
INSERT INTO item_of_journals VALUES('4','2','3','0.00','0.00','cr','1','1','0','','1','','2019-05-23 11:09:43','2019-05-23 11:09:43','0');
INSERT INTO item_of_journals VALUES('5','3','2','16000.00','0.00','dr','1','1','0','','1','','2019-05-23 11:10:59','2019-05-23 11:10:59','0');
INSERT INTO item_of_journals VALUES('6','3','3','0.00','16000.00','cr','1','1','0','','1','','2019-05-23 11:10:59','2019-05-23 11:10:59','0');
INSERT INTO item_of_journals VALUES('7','4','2','48000.00','0.00','dr','1','1','0','','1','','2019-05-23 11:12:02','2019-05-23 11:12:02','0');
INSERT INTO item_of_journals VALUES('8','4','3','0.00','48000.00','cr','1','1','0','','1','','2019-05-23 11:12:02','2019-05-23 11:12:02','0');
INSERT INTO item_of_journals VALUES('9','5','1','12000.00','0.00','dr','1','1','0','','1','','2019-05-23 11:16:12','2019-05-23 11:16:12','0');
INSERT INTO item_of_journals VALUES('10','5','2','0.00','12000.00','cr','1','1','0','','1','','2019-05-23 11:16:12','2019-05-23 11:16:12','0');
INSERT INTO item_of_journals VALUES('11','6','2','2500.00','0.00','dr','1','1','0','','1','','2019-05-24 06:24:57','2019-05-24 06:24:57','0');
INSERT INTO item_of_journals VALUES('12','6','3','0.00','2500.00','cr','1','1','0','','1','','2019-05-24 06:24:57','2019-05-24 06:24:57','0');
INSERT INTO item_of_journals VALUES('13','7','2','2000.00','0.00','dr','1','1','0','','1','','2019-05-24 07:36:05','2019-05-24 07:36:05','0');
INSERT INTO item_of_journals VALUES('14','7','3','0.00','2000.00','cr','1','1','0','','1','','2019-05-24 07:36:05','2019-05-24 07:36:05','0');
INSERT INTO item_of_journals VALUES('15','8','2','1500.00','0.00','dr','1','1','0','','1','','2019-05-24 08:42:42','2019-05-24 08:42:42','0');
INSERT INTO item_of_journals VALUES('16','8','3','0.00','1500.00','cr','1','1','0','','1','','2019-05-24 08:42:43','2019-05-24 08:42:43','0');
INSERT INTO item_of_journals VALUES('17','9','2','16000.00','0.00','dr','1','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO item_of_journals VALUES('18','9','3','0.00','16000.00','cr','1','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO item_of_journals VALUES('19','10','2','12000.00','0.00','dr','1','1','0','','1','','2019-05-24 08:47:51','2019-05-24 08:47:51','0');
INSERT INTO item_of_journals VALUES('20','10','3','0.00','12000.00','cr','1','1','0','','1','','2019-05-24 08:47:51','2019-05-24 08:47:51','0');
INSERT INTO item_of_journals VALUES('21','11','2','13000.00','0.00','dr','1','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');
INSERT INTO item_of_journals VALUES('22','11','3','0.00','13000.00','cr','1','1','0','','1','','2019-05-24 09:14:11','2019-05-24 09:14:11','0');



DROP TABLE IF EXISTS journals;

CREATE TABLE `journals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fiscal_year_id` tinyint(3) unsigned NOT NULL,
  `date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `narration` text COLLATE utf8mb4_unicode_ci,
  `total_debit` decimal(8,2) NOT NULL,
  `total_credit` decimal(8,2) NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reconciliation` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `journals_fiscal_year_id_foreign` (`fiscal_year_id`),
  KEY `journals_post_by_foreign` (`post_by`),
  KEY `journals_verified_by_foreign` (`verified_by`),
  CONSTRAINT `journals_fiscal_year_id_foreign` FOREIGN KEY (`fiscal_year_id`) REFERENCES `fiscal_years` (`id`),
  CONSTRAINT `journals_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `journals_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO journals VALUES('1','1','2019-05-23','Invoices of Class1 has been Generated ','16000.00','16000.00','','0','1','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO journals VALUES('2','1','2019-05-23','Invoices of Class1 has been Generated ','0.00','0.00','','0','1','1','0','','1','','2019-05-23 11:09:43','2019-05-23 11:09:43','0');
INSERT INTO journals VALUES('3','1','2019-05-23','Invoices of Class1 has been Generated ','16000.00','16000.00','','0','1','1','0','','1','','2019-05-23 11:10:59','2019-05-23 11:10:59','0');
INSERT INTO journals VALUES('4','1','2019-05-23','Invoices of Class1 has been Generated ','48000.00','48000.00','','0','1','1','0','','1','','2019-05-23 11:12:02','2019-05-23 11:12:02','0');
INSERT INTO journals VALUES('5','1','2019-05-23','Sahas  Dangol  of Class One,Section Default had paid Fees of amount 12000','12000.00','12000.00','','0','1','1','0','','1','','2019-05-23 11:16:12','2019-05-23 11:16:12','0');
INSERT INTO journals VALUES('6','1','2019-05-24','Invoices of Class1 has been Generated ','2500.00','2500.00','','0','1','1','0','','1','','2019-05-24 06:24:57','2019-05-24 06:24:57','0');
INSERT INTO journals VALUES('7','1','2019-05-24','Invoices of Class1 has been Generated ','2000.00','2000.00','','0','1','1','0','','1','','2019-05-24 07:36:05','2019-05-24 07:36:05','0');
INSERT INTO journals VALUES('8','1','2019-05-24','Invoices of Class1 has been Generated ','1500.00','1500.00','','0','1','1','0','','1','','2019-05-24 08:42:42','2019-05-24 08:42:42','0');
INSERT INTO journals VALUES('9','1','2019-05-24','Invoices of Class1 has been Generated ','16000.00','16000.00','','0','1','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO journals VALUES('10','1','2019-05-24','Invoices of Class1 has been Generated ','12000.00','12000.00','','0','1','1','0','','1','','2019-05-24 08:47:51','2019-05-24 08:47:51','0');
INSERT INTO journals VALUES('11','1','2019-05-24','Invoices of Class1 has been Generated ','13000.00','13000.00','','0','1','1','0','','1','','2019-05-24 09:14:10','2019-05-24 09:14:10','0');



DROP TABLE IF EXISTS leave_applications;

CREATE TABLE `leave_applications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `subject` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `leave_applications_student_id_foreign` (`student_id`),
  KEY `leave_applications_post_by_foreign` (`post_by`),
  KEY `leave_applications_verified_by_foreign` (`verified_by`),
  CONSTRAINT `leave_applications_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `leave_applications_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  CONSTRAINT `leave_applications_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS ledgers;

CREATE TABLE `ledgers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `voucher_no` int(10) unsigned NOT NULL,
  `ledger_id` int(10) unsigned NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` int(10) unsigned NOT NULL,
  `debit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ledgers_voucher_no_foreign` (`voucher_no`),
  KEY `ledgers_description_foreign` (`description`),
  KEY `ledgers_post_by_foreign` (`post_by`),
  KEY `ledgers_verified_by_foreign` (`verified_by`),
  CONSTRAINT `ledgers_description_foreign` FOREIGN KEY (`description`) REFERENCES `list_of_ledgers` (`id`),
  CONSTRAINT `ledgers_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `ledgers_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`),
  CONSTRAINT `ledgers_voucher_no_foreign` FOREIGN KEY (`voucher_no`) REFERENCES `journals` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO ledgers VALUES('1','1','2','2019-05-23','3','16000.00','0.00','','1','1','0','','1','','2019-05-23 11:06:48','2019-05-23 11:06:48','0');
INSERT INTO ledgers VALUES('2','1','3','2019-05-23','2','0.00','16000.00','','1','1','0','','1','','2019-05-23 11:06:49','2019-05-23 11:06:49','0');
INSERT INTO ledgers VALUES('3','2','2','2019-05-23','3','0.00','0.00','','1','1','0','','1','','2019-05-23 11:09:43','2019-05-23 11:09:43','0');
INSERT INTO ledgers VALUES('4','2','3','2019-05-23','2','0.00','0.00','','1','1','0','','1','','2019-05-23 11:09:43','2019-05-23 11:09:43','0');
INSERT INTO ledgers VALUES('5','3','2','2019-05-23','3','16000.00','0.00','','1','1','0','','1','','2019-05-23 11:10:59','2019-05-23 11:10:59','0');
INSERT INTO ledgers VALUES('6','3','3','2019-05-23','2','0.00','16000.00','','1','1','0','','1','','2019-05-23 11:10:59','2019-05-23 11:10:59','0');
INSERT INTO ledgers VALUES('7','4','2','2019-05-23','3','48000.00','0.00','','1','1','0','','1','','2019-05-23 11:12:02','2019-05-23 11:12:02','0');
INSERT INTO ledgers VALUES('8','4','3','2019-05-23','2','0.00','48000.00','','1','1','0','','1','','2019-05-23 11:12:02','2019-05-23 11:12:02','0');
INSERT INTO ledgers VALUES('9','5','1','2019-05-23','2','12000.00','0.00','','1','1','0','','1','','2019-05-23 11:16:12','2019-05-23 11:16:12','0');
INSERT INTO ledgers VALUES('10','5','2','2019-05-23','1','0.00','12000.00','','1','1','0','','1','','2019-05-23 11:16:12','2019-05-23 11:16:12','0');
INSERT INTO ledgers VALUES('11','6','2','2019-05-24','3','2500.00','0.00','','1','1','0','','1','','2019-05-24 06:24:57','2019-05-24 06:24:57','0');
INSERT INTO ledgers VALUES('12','6','3','2019-05-24','2','0.00','2500.00','','1','1','0','','1','','2019-05-24 06:24:57','2019-05-24 06:24:57','0');
INSERT INTO ledgers VALUES('13','7','2','2019-05-24','3','2000.00','0.00','','1','1','0','','1','','2019-05-24 07:36:06','2019-05-24 07:36:06','0');
INSERT INTO ledgers VALUES('14','7','3','2019-05-24','2','0.00','2000.00','','1','1','0','','1','','2019-05-24 07:36:06','2019-05-24 07:36:06','0');
INSERT INTO ledgers VALUES('15','8','2','2019-05-24','3','1500.00','0.00','','1','1','0','','1','','2019-05-24 08:42:43','2019-05-24 08:42:43','0');
INSERT INTO ledgers VALUES('16','8','3','2019-05-24','2','0.00','1500.00','','1','1','0','','1','','2019-05-24 08:42:43','2019-05-24 08:42:43','0');
INSERT INTO ledgers VALUES('17','9','2','2019-05-24','3','16000.00','0.00','','1','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO ledgers VALUES('18','9','3','2019-05-24','2','0.00','16000.00','','1','1','0','','1','','2019-05-24 08:43:33','2019-05-24 08:43:33','0');
INSERT INTO ledgers VALUES('19','10','2','2019-05-24','3','12000.00','0.00','','1','1','0','','1','','2019-05-24 08:47:51','2019-05-24 08:47:51','0');
INSERT INTO ledgers VALUES('20','10','3','2019-05-24','2','0.00','12000.00','','1','1','0','','1','','2019-05-24 08:47:51','2019-05-24 08:47:51','0');
INSERT INTO ledgers VALUES('21','11','2','2019-05-24','3','13000.00','0.00','','1','1','0','','1','','2019-05-24 09:14:11','2019-05-24 09:14:11','0');
INSERT INTO ledgers VALUES('22','11','3','2019-05-24','2','0.00','13000.00','','1','1','0','','1','','2019-05-24 09:14:11','2019-05-24 09:14:11','0');



DROP TABLE IF EXISTS list_of_ledgers;

CREATE TABLE `list_of_ledgers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `under` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `list_of_ledgers_under_foreign` (`under`),
  KEY `list_of_ledgers_post_by_foreign` (`post_by`),
  KEY `list_of_ledgers_verified_by_foreign` (`verified_by`),
  CONSTRAINT `list_of_ledgers_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `list_of_ledgers_under_foreign` FOREIGN KEY (`under`) REFERENCES `groups` (`id`),
  CONSTRAINT `list_of_ledgers_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO list_of_ledgers VALUES('1','Cash','','4','1','','1','0','','1','','','','0');
INSERT INTO list_of_ledgers VALUES('2','Student Fees Due','','2','1','','1','0','','1','','','','0');
INSERT INTO list_of_ledgers VALUES('3','Student Fees Income','','28','1','','1','0','','1','','','','0');



DROP TABLE IF EXISTS mark_grades;

CREATE TABLE `mark_grades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_upto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_point` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mark_grades_post_by_foreign` (`post_by`),
  KEY `mark_grades_verified_by_foreign` (`verified_by`),
  CONSTRAINT `mark_grades_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `mark_grades_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO mark_grades VALUES('1','A+','90','100','3.6','4','4','','1','1','0','','1','','','','0');
INSERT INTO mark_grades VALUES('2','A','80','90','3.2','3.6','3.6','','1','1','0','','1','','','','0');
INSERT INTO mark_grades VALUES('3','B+','70','80','2.8','3.2','3.2','','1','1','0','','1','','','','0');
INSERT INTO mark_grades VALUES('4','B','60','70','2.4','2.8','2.8','','1','1','0','','1','','','','0');
INSERT INTO mark_grades VALUES('5','C+','50','60','2','2.4','2.4','','1','1','0','','1','','','','0');
INSERT INTO mark_grades VALUES('6','C','40','50','1.6','2','2','','1','1','0','','1','','','','0');
INSERT INTO mark_grades VALUES('7','D+','30','40','1.2','1.6','1.6','','1','1','0','','1','','','','0');
INSERT INTO mark_grades VALUES('8','D','20','30','0.8','1.2','1.2','','1','1','0','','1','','','','0');
INSERT INTO mark_grades VALUES('9','E','1','20','0.1','0.8','0.8','','1','1','0','','1','','','','0');
INSERT INTO mark_grades VALUES('10','N','0','0','0','0','0','','1','1','0','','1','','','','0');



DROP TABLE IF EXISTS marks;

CREATE TABLE `marks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` tinyint(3) unsigned NOT NULL,
  `exam_id` int(10) unsigned NOT NULL,
  `subject_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `classroom_id` tinyint(3) unsigned NOT NULL,
  `section_id` tinyint(3) unsigned NOT NULL,
  `th_marks` tinyint(4) DEFAULT NULL,
  `pr_marks` tinyint(4) DEFAULT NULL,
  `marks` tinyint(4) DEFAULT NULL,
  `th_result` tinyint(1) DEFAULT NULL,
  `pr_result` tinyint(1) DEFAULT NULL,
  `result` tinyint(1) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `marks_session_id_foreign` (`session_id`),
  KEY `marks_exam_id_foreign` (`exam_id`),
  KEY `marks_subject_id_foreign` (`subject_id`),
  KEY `marks_student_id_foreign` (`student_id`),
  KEY `marks_classroom_id_foreign` (`classroom_id`),
  KEY `marks_section_id_foreign` (`section_id`),
  KEY `marks_post_by_foreign` (`post_by`),
  KEY `marks_verified_by_foreign` (`verified_by`),
  CONSTRAINT `marks_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  CONSTRAINT `marks_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exam_lists` (`id`),
  CONSTRAINT `marks_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `marks_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  CONSTRAINT `marks_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `academics_years` (`id`),
  CONSTRAINT `marks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  CONSTRAINT `marks_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  CONSTRAINT `marks_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=393 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO marks VALUES('197','1','1','5','7','1','1','56','12','68','1','1','1','','1','0','','1','','1','','2019-05-28 05:34:47','0');
INSERT INTO marks VALUES('198','1','1','6','7','1','1','23','','23','0','','0','','1','0','','1','','1','','2019-05-28 05:45:43','0');
INSERT INTO marks VALUES('199','1','1','1','7','1','1','89','','89','1','1','1','','1','0','','1','','1','','2019-05-28 05:09:42','0');
INSERT INTO marks VALUES('200','1','1','2','7','1','1','67','23','90','1','1','1','','1','0','','1','','1','','2019-05-28 05:11:38','0');
INSERT INTO marks VALUES('201','1','1','5','8','1','1','54','13','67','1','1','1','','1','0','','1','','1','','2019-05-28 05:34:52','0');
INSERT INTO marks VALUES('202','1','1','6','8','1','1','42','','42','1','1','1','','1','0','','1','','1','','2019-05-28 05:45:46','0');
INSERT INTO marks VALUES('203','1','1','3','8','1','1','65','12','77','1','1','1','','1','0','','1','','1','','2019-05-28 05:16:52','0');
INSERT INTO marks VALUES('204','1','1','4','8','1','1','45','50','95','1','1','1','','1','0','','1','','1','','2019-05-28 05:20:08','0');
INSERT INTO marks VALUES('205','1','1','5','9','1','1','43','12','55','1','1','1','','1','0','','1','','1','','2019-05-28 05:34:57','0');
INSERT INTO marks VALUES('206','1','1','6','9','1','1','42','','42','1','1','1','','1','0','','1','','1','','2019-05-28 05:45:48','0');
INSERT INTO marks VALUES('207','1','1','3','9','1','1','54','13','67','1','1','1','','1','0','','1','','1','','2019-05-28 05:17:00','0');
INSERT INTO marks VALUES('208','1','1','4','9','1','1','24','24','48','1','1','1','','1','0','','1','','1','','2019-05-28 05:21:05','0');
INSERT INTO marks VALUES('209','1','1','5','10','1','1','44','11','55','1','1','1','','1','0','','1','','1','','2019-05-28 05:35:01','0');
INSERT INTO marks VALUES('210','1','1','6','10','1','1','52','','52','1','1','1','','1','0','','1','','1','','2019-05-28 05:45:50','0');
INSERT INTO marks VALUES('211','1','1','1','10','1','1','100','','100','1','1','1','','1','0','','1','','1','','2019-05-28 05:09:54','0');
INSERT INTO marks VALUES('212','1','1','4','10','1','1','44','44','88','1','1','1','','1','0','','1','','1','','2019-05-28 05:20:22','0');
INSERT INTO marks VALUES('213','1','1','5','11','1','1','55','1','56','','0','0','','1','0','','1','','1','','2019-05-28 05:35:05','0');
INSERT INTO marks VALUES('214','1','1','6','11','1','1','50','','50','1','1','1','','1','0','','1','','1','','2019-05-28 05:45:55','0');
INSERT INTO marks VALUES('215','1','1','1','11','1','1','67','','67','1','1','1','','1','0','','1','','1','','2019-05-28 05:09:57','0');
INSERT INTO marks VALUES('216','1','1','4','11','1','1','45','45','90','1','1','1','','1','0','','1','','1','','2019-05-28 05:21:48','0');
INSERT INTO marks VALUES('217','1','1','5','12','1','1','34','12','46','1','1','1','','1','0','','1','','1','','2019-05-28 05:35:12','0');
INSERT INTO marks VALUES('218','1','1','6','12','1','1','87','','87','1','1','1','','1','0','','1','','1','','2019-05-28 05:45:57','0');
INSERT INTO marks VALUES('219','1','1','1','12','1','1','','','','','','','','1','0','','1','','1','','','0');
INSERT INTO marks VALUES('220','1','1','4','12','1','1','34','45','79','1','1','1','','1','0','','1','','1','','2019-05-28 05:22:01','0');
INSERT INTO marks VALUES('221','1','1','5','13','1','1','35','13','48','1','1','1','','1','0','','1','','1','','2019-05-28 05:35:17','0');
INSERT INTO marks VALUES('222','1','1','6','13','1','1','98','','98','1','1','1','','1','0','','1','','1','','2019-05-28 05:46:01','0');
INSERT INTO marks VALUES('223','1','1','1','13','1','1','98','','98','1','1','1','','1','0','','1','','1','','2019-05-28 05:10:00','0');
INSERT INTO marks VALUES('224','1','1','4','13','1','1','23','23','46','1','1','1','','1','0','','1','','1','','2019-05-28 05:22:06','0');
INSERT INTO marks VALUES('225','1','1','5','14','1','1','34','11','45','1','1','1','','1','0','','1','','1','','2019-05-28 05:35:22','0');
INSERT INTO marks VALUES('226','1','1','6','14','1','1','78','','78','1','1','1','','1','0','','1','','1','','2019-05-28 05:46:02','0');
INSERT INTO marks VALUES('227','1','1','3','14','1','1','43','12','55','1','1','1','','1','0','','1','','1','','2019-05-28 05:17:04','0');
INSERT INTO marks VALUES('228','1','1','2','14','1','1','57','12','69','1','1','1','','1','0','','1','','1','','2019-05-28 05:11:45','0');
INSERT INTO marks VALUES('229','1','1','5','15','1','1','67','11','78','1','1','1','','1','0','','1','','1','','2019-05-28 05:35:29','0');
INSERT INTO marks VALUES('230','1','1','6','15','1','1','56','','56','1','1','1','','1','0','','1','','1','','2019-05-28 05:46:04','0');
INSERT INTO marks VALUES('231','1','1','3','15','1','1','12','12','24','0','','0','','1','0','','1','','1','','2019-05-28 05:17:08','0');
INSERT INTO marks VALUES('232','1','1','2','15','1','1','54','24','78','1','1','1','','1','0','','1','','1','','2019-05-28 05:11:54','0');
INSERT INTO marks VALUES('233','1','1','5','16','1','1','74','23','97','1','1','1','','1','0','','1','','1','','2019-05-28 05:35:40','0');
INSERT INTO marks VALUES('234','1','1','6','16','1','1','54','','54','1','1','1','','1','0','','1','','1','','2019-05-28 05:46:07','0');
INSERT INTO marks VALUES('235','1','1','1','16','1','1','65','','65','1','1','1','','1','0','','1','','1','','2019-05-28 05:10:22','0');
INSERT INTO marks VALUES('236','1','1','2','16','1','1','75','25','100','1','1','1','','1','0','','1','','1','','2019-05-28 05:12:19','0');
INSERT INTO marks VALUES('237','1','1','5','17','1','1','23','23','46','0','','0','','1','0','','1','','1','','2019-05-28 05:35:45','0');
INSERT INTO marks VALUES('238','1','1','6','17','1','1','72','','72','1','1','1','','1','0','','1','','1','','2019-05-28 05:46:13','0');
INSERT INTO marks VALUES('239','1','1','1','17','1','1','87','','87','1','1','1','','1','0','','1','','1','','2019-05-28 05:10:26','0');
INSERT INTO marks VALUES('240','1','1','4','17','1','1','45','45','90','1','1','1','','1','0','','1','','1','','2019-05-28 05:22:14','0');
INSERT INTO marks VALUES('241','1','1','5','18','1','1','43','23','66','1','1','1','','1','0','','1','','1','','2019-05-28 05:35:52','0');
INSERT INTO marks VALUES('242','1','1','6','18','1','1','70','','70','1','1','1','','1','0','','1','','1','','2019-05-28 05:46:19','0');
INSERT INTO marks VALUES('243','1','1','3','18','1','1','30','25','55','1','1','1','','1','0','','1','','1','','2019-05-28 05:17:15','0');
INSERT INTO marks VALUES('244','1','1','2','18','1','1','57','24','81','1','1','1','','1','0','','1','','1','','2019-05-28 05:12:24','0');
INSERT INTO marks VALUES('245','1','1','5','19','1','1','54','16','70','1','1','1','','1','0','','1','','1','','2019-05-28 05:35:57','0');
INSERT INTO marks VALUES('246','1','1','6','19','1','1','47','','47','1','1','1','','1','0','','1','','1','','2019-05-28 05:46:23','0');
INSERT INTO marks VALUES('247','1','1','3','19','1','1','33','22','55','1','1','1','','1','0','','1','','1','','2019-05-28 05:17:21','0');
INSERT INTO marks VALUES('248','1','1','2','19','1','1','65','24','89','1','1','1','','1','0','','1','','1','','2019-05-28 05:12:25','0');
INSERT INTO marks VALUES('249','1','1','5','20','1','1','67','9','76','','0','0','','1','0','','1','','1','','2019-05-28 05:36:01','0');
INSERT INTO marks VALUES('250','1','1','6','20','1','1','75','','75','1','1','1','','1','0','','1','','1','','2019-05-28 05:46:30','0');
INSERT INTO marks VALUES('251','1','1','3','20','1','1','44','11','55','1','1','1','','1','0','','1','','1','','2019-05-28 05:17:27','0');
INSERT INTO marks VALUES('252','1','1','2','20','1','1','48','25','73','1','1','1','','1','0','','1','','1','','2019-05-28 05:12:28','0');
INSERT INTO marks VALUES('253','1','1','5','21','1','1','70','13','83','1','1','1','','1','0','','1','','1','','2019-05-28 05:36:15','0');
INSERT INTO marks VALUES('254','1','1','6','21','1','1','85','','85','1','1','1','','1','0','','1','','1','','2019-05-28 05:46:37','0');
INSERT INTO marks VALUES('255','1','1','3','21','1','1','55','22','77','1','1','1','','1','0','','1','','1','','2019-05-28 05:17:31','0');
INSERT INTO marks VALUES('256','1','1','2','21','1','1','35','20','55','1','1','1','','1','0','','1','','1','','2019-05-28 05:12:35','0');
INSERT INTO marks VALUES('257','1','1','5','22','1','1','43','13','56','1','1','1','','1','0','','1','','1','','2019-05-28 05:36:19','0');
INSERT INTO marks VALUES('258','1','1','6','22','1','1','67','','67','1','1','1','','1','0','','1','','1','','2019-05-28 05:46:39','0');
INSERT INTO marks VALUES('259','1','1','1','22','1','1','56','','56','1','1','1','','1','0','','1','','1','','2019-05-28 05:10:27','0');
INSERT INTO marks VALUES('260','1','1','4','22','1','1','34','44','78','1','1','1','','1','0','','1','','1','','2019-05-28 05:22:20','0');
INSERT INTO marks VALUES('261','1','1','5','23','1','1','8','8','16','0','','0','','1','0','','1','','1','','2019-05-28 05:36:24','0');
INSERT INTO marks VALUES('262','1','1','6','23','1','1','76','','76','1','1','1','','1','0','','1','','1','','2019-05-28 05:46:41','0');
INSERT INTO marks VALUES('263','1','1','1','23','1','1','43','','43','1','1','1','','1','0','','1','','1','','2019-05-28 05:10:35','0');
INSERT INTO marks VALUES('264','1','1','2','23','1','1','52','12','64','1','1','1','','1','0','','1','','1','','2019-05-28 05:12:41','0');
INSERT INTO marks VALUES('265','1','1','5','24','1','1','54','16','70','1','1','1','','1','0','','1','','1','','2019-05-28 05:36:29','0');
INSERT INTO marks VALUES('266','1','1','6','24','1','1','57','','57','1','1','1','','1','0','','1','','1','','2019-05-28 05:46:43','0');
INSERT INTO marks VALUES('267','1','1','1','24','1','1','23','','23','0','','0','','1','0','','1','','1','','2019-05-28 05:10:37','0');
INSERT INTO marks VALUES('268','1','1','4','24','1','1','34','34','68','1','1','1','','1','0','','1','','1','','2019-05-28 05:22:24','0');
INSERT INTO marks VALUES('269','1','1','5','25','1','1','43','9','52','','0','0','','1','0','','1','','1','','2019-05-28 05:36:34','0');
INSERT INTO marks VALUES('270','1','1','6','25','1','1','84','','84','1','1','1','','1','0','','1','','1','','2019-05-28 05:46:46','0');
INSERT INTO marks VALUES('271','1','1','3','25','1','1','66','22','88','1','1','1','','1','0','','1','','1','','2019-05-28 05:17:36','0');
INSERT INTO marks VALUES('272','1','1','2','25','1','1','43','13','56','1','1','1','','1','0','','1','','1','','2019-05-28 05:12:46','0');
INSERT INTO marks VALUES('273','1','1','5','26','1','1','45','8','53','','0','0','','1','0','','1','','1','','2019-05-28 05:36:38','0');
INSERT INTO marks VALUES('274','1','1','6','26','1','1','58','','58','1','1','1','','1','0','','1','','1','','2019-05-28 05:46:48','0');
INSERT INTO marks VALUES('275','1','1','1','26','1','1','54','','54','1','1','1','','1','0','','1','','1','','2019-05-28 05:10:39','0');
INSERT INTO marks VALUES('276','1','1','4','26','1','1','24','24','48','1','1','1','','1','0','','1','','1','','2019-05-28 05:22:38','0');
INSERT INTO marks VALUES('277','1','1','5','27','1','1','44','11','55','1','1','1','','1','0','','1','','1','','2019-05-28 05:36:43','0');
INSERT INTO marks VALUES('278','1','1','6','27','1','1','58','','58','1','1','1','','1','0','','1','','1','','2019-05-28 05:46:54','0');
INSERT INTO marks VALUES('279','1','1','3','27','1','1','55','11','66','1','1','1','','1','0','','1','','1','','2019-05-28 05:17:43','0');
INSERT INTO marks VALUES('280','1','1','2','27','1','1','65','18','83','1','1','1','','1','0','','1','','1','','2019-05-28 05:12:54','0');
INSERT INTO marks VALUES('281','1','1','5','28','1','1','34','9','43','','0','0','','1','0','','1','','1','','2019-05-28 05:36:50','0');
INSERT INTO marks VALUES('282','1','1','6','28','1','1','58','','58','1','1','1','','1','0','','1','','1','','2019-05-28 05:46:56','0');
INSERT INTO marks VALUES('283','1','1','3','28','1','1','66','12','78','1','1','1','','1','0','','1','','1','','2019-05-28 05:17:46','0');
INSERT INTO marks VALUES('284','1','1','4','28','1','1','46','46','92','1','1','1','','1','0','','1','','1','','2019-05-28 05:22:48','0');
INSERT INTO marks VALUES('285','1','1','5','29','1','1','58','18','76','1','1','1','','1','0','','1','','1','','2019-05-28 05:36:57','0');
INSERT INTO marks VALUES('286','1','1','6','29','1','1','59','','59','1','1','1','','1','0','','1','','1','','2019-05-28 05:47:00','0');
INSERT INTO marks VALUES('287','1','1','1','29','1','1','65','','65','1','1','1','','1','0','','1','','1','','2019-05-28 05:10:41','0');
INSERT INTO marks VALUES('288','1','1','4','29','1','1','24','42','66','1','1','1','','1','0','','1','','1','','2019-05-28 05:22:52','0');
INSERT INTO marks VALUES('289','1','1','5','30','1','1','54','13','67','1','1','1','','1','0','','1','','1','','2019-05-28 05:37:02','0');
INSERT INTO marks VALUES('290','1','1','6','30','1','1','94','','94','1','1','1','','1','0','','1','','1','','2019-05-28 05:47:03','0');
INSERT INTO marks VALUES('291','1','1','3','30','1','1','55','13','68','1','1','1','','1','0','','1','','1','','2019-05-28 05:17:50','0');
INSERT INTO marks VALUES('292','1','1','2','30','1','1','74','16','90','1','1','1','','1','0','','1','','1','','2019-05-28 05:13:03','0');
INSERT INTO marks VALUES('293','1','1','5','31','1','1','56','14','70','1','1','1','','1','0','','1','','1','','2019-05-28 05:37:06','0');
INSERT INTO marks VALUES('294','1','1','6','31','1','1','85','','85','1','1','1','','1','0','','1','','1','','2019-05-28 05:47:07','0');
INSERT INTO marks VALUES('295','1','1','3','31','1','1','66','14','80','1','1','1','','1','0','','1','','1','','2019-05-28 05:17:54','0');
INSERT INTO marks VALUES('296','1','1','2','31','1','1','64','4','68','','0','0','','1','0','','1','','1','','2019-05-28 05:13:12','0');
INSERT INTO marks VALUES('297','1','1','5','32','1','1','54','11','65','1','1','1','','1','0','','1','','1','','2019-05-28 05:37:10','0');
INSERT INTO marks VALUES('298','1','1','6','32','1','1','45','','45','1','1','1','','1','0','','1','','1','','2019-05-28 05:47:09','0');
INSERT INTO marks VALUES('299','1','1','3','32','1','1','67','13','80','1','1','1','','1','0','','1','','1','','2019-05-28 05:18:00','0');
INSERT INTO marks VALUES('300','1','1','4','32','1','1','45','12','57','','0','0','','1','0','','1','','1','','2019-05-28 05:22:58','0');
INSERT INTO marks VALUES('301','1','1','5','33','1','1','58','10','68','1','1','1','','1','0','','1','','1','','2019-05-28 05:37:15','0');
INSERT INTO marks VALUES('302','1','1','6','33','1','1','75','','75','1','1','1','','1','0','','1','','1','','2019-05-28 05:47:11','0');
INSERT INTO marks VALUES('303','1','1','3','33','1','1','32','12','44','1','1','1','','1','0','','1','','1','','2019-05-28 05:18:05','0');
INSERT INTO marks VALUES('304','1','1','2','33','1','1','54','24','78','1','1','1','','1','0','','1','','1','','2019-05-28 05:13:17','0');
INSERT INTO marks VALUES('305','1','1','5','34','1','1','73','11','84','1','1','1','','1','0','','1','','1','','2019-05-28 05:37:21','0');
INSERT INTO marks VALUES('306','1','1','6','34','1','1','78','','78','1','1','1','','1','0','','1','','1','','2019-05-28 05:47:14','0');
INSERT INTO marks VALUES('307','1','1','3','34','1','1','26','23','49','0','','0','','1','0','','1','','1','','2019-05-28 05:18:19','0');
INSERT INTO marks VALUES('308','1','1','2','34','1','1','42','24','66','1','1','1','','1','0','','1','','1','','2019-05-28 05:13:21','0');
INSERT INTO marks VALUES('309','1','1','5','35','1','1','70','10','80','1','1','1','','1','0','','1','','1','','2019-05-28 05:37:25','0');
INSERT INTO marks VALUES('310','1','1','6','35','1','1','89','','89','1','1','1','','1','0','','1','','1','','2019-05-28 05:47:18','0');
INSERT INTO marks VALUES('311','1','1','3','35','1','1','23','0','23','0','','0','','1','0','','1','','1','','2019-05-28 05:33:52','0');
INSERT INTO marks VALUES('312','1','1','2','35','1','1','42','24','66','1','1','1','','1','0','','1','','1','','2019-05-28 05:13:25','0');
INSERT INTO marks VALUES('313','1','1','5','36','1','1','65','15','80','1','1','1','','1','0','','1','','1','','2019-05-28 05:37:30','0');
INSERT INTO marks VALUES('314','1','1','6','36','1','1','85','','85','1','1','1','','1','0','','1','','1','','2019-05-28 05:47:24','0');
INSERT INTO marks VALUES('315','1','1','3','36','1','1','74','12','86','1','1','1','','1','0','','1','','1','','2019-05-28 05:18:39','0');
INSERT INTO marks VALUES('316','1','1','2','36','1','1','24','','24','0','','0','','1','0','','1','','1','','2019-05-28 05:13:27','0');
INSERT INTO marks VALUES('317','1','1','5','37','1','1','63','11','74','1','1','1','','1','0','','1','','1','','2019-05-28 05:37:34','0');
INSERT INTO marks VALUES('318','1','1','6','37','1','1','45','','45','1','1','1','','1','0','','1','','1','','2019-05-28 05:47:26','0');
INSERT INTO marks VALUES('319','1','1','1','37','1','1','54','','54','1','1','1','','1','0','','1','','1','','2019-05-28 05:10:42','0');
INSERT INTO marks VALUES('320','1','1','4','37','1','1','0','0','0','0','','0','','1','0','','1','','1','','2019-05-28 05:23:06','0');
INSERT INTO marks VALUES('321','1','1','5','38','1','1','64','10','74','1','1','1','','1','0','','1','','1','','2019-05-28 05:37:37','0');
INSERT INTO marks VALUES('322','1','1','6','38','1','1','69','','69','1','1','1','','1','0','','1','','1','','2019-05-28 05:47:55','0');
INSERT INTO marks VALUES('323','1','1','1','38','1','1','89','','89','1','1','1','','1','0','','1','','1','','2019-05-28 05:10:45','0');
INSERT INTO marks VALUES('324','1','1','2','38','1','1','45','5','50','','0','0','','1','0','','1','','1','','2019-05-28 05:13:40','0');
INSERT INTO marks VALUES('325','1','1','5','39','1','1','68','18','86','1','1','1','','1','0','','1','','1','','2019-05-28 05:37:43','0');
INSERT INTO marks VALUES('326','1','1','6','39','1','1','54','','54','1','1','1','','1','0','','1','','1','','2019-05-28 05:47:58','0');
INSERT INTO marks VALUES('327','1','1','3','39','1','1','42','23','65','1','1','1','','1','0','','1','','1','','2019-05-28 05:18:46','0');
INSERT INTO marks VALUES('328','1','1','4','39','1','1','0','0','0','0','','0','','1','0','','1','','1','','2019-05-28 05:23:09','0');
INSERT INTO marks VALUES('329','1','1','5','40','1','1','66','','66','','0','0','','1','0','','1','','1','','2019-05-28 05:37:46','0');
INSERT INTO marks VALUES('330','1','1','6','40','1','1','54','','54','1','1','1','','1','0','','1','','1','','2019-05-28 05:48:04','0');
INSERT INTO marks VALUES('331','1','1','1','40','1','1','34','','34','0','','0','','1','0','','1','','1','','2019-05-28 05:10:47','0');
INSERT INTO marks VALUES('332','1','1','2','40','1','1','47','6','53','','0','0','','1','0','','1','','1','','2019-05-28 05:13:45','0');
INSERT INTO marks VALUES('333','1','1','5','41','1','1','','11','11','0','','0','','1','0','','1','','1','','2019-05-28 05:37:54','0');
INSERT INTO marks VALUES('334','1','1','6','41','1','1','87','','87','1','1','1','','1','0','','1','','1','','2019-05-28 05:48:06','0');
INSERT INTO marks VALUES('335','1','1','1','41','1','1','74','','74','1','1','1','','1','0','','1','','1','','2019-05-28 05:10:50','0');
INSERT INTO marks VALUES('336','1','1','2','41','1','1','57','17','74','1','1','1','','1','0','','1','','1','','2019-05-28 05:13:51','0');
INSERT INTO marks VALUES('337','1','1','5','42','1','1','74','22','96','1','1','1','','1','0','','1','','1','','2019-05-28 05:37:59','0');
INSERT INTO marks VALUES('338','1','1','6','42','1','1','45','','45','1','1','1','','1','0','','1','','1','','2019-05-28 05:48:08','0');
INSERT INTO marks VALUES('339','1','1','3','42','1','1','44','0','44','','0','0','','1','0','','1','','1','','2019-05-28 05:33:58','0');
INSERT INTO marks VALUES('340','1','1','4','42','1','1','45','0','45','','0','0','','1','0','','1','','1','','2019-05-28 05:23:15','0');
INSERT INTO marks VALUES('341','1','1','5','43','1','1','55','11','66','1','1','1','','1','0','','1','','1','','2019-05-28 05:38:05','0');
INSERT INTO marks VALUES('342','1','1','6','43','1','1','54','','54','1','1','1','','1','0','','1','','1','','2019-05-28 05:48:09','0');
INSERT INTO marks VALUES('343','1','1','1','43','1','1','98','','98','1','1','1','','1','0','','1','','1','','2019-05-28 05:10:53','0');
INSERT INTO marks VALUES('344','1','1','2','43','1','1','54','15','69','1','1','1','','1','0','','1','','1','','2019-05-28 05:14:11','0');
INSERT INTO marks VALUES('345','1','1','5','44','1','1','54','10','64','1','1','1','','1','0','','1','','1','','2019-05-28 05:38:09','0');
INSERT INTO marks VALUES('346','1','1','6','44','1','1','43','','43','1','1','1','','1','0','','1','','1','','2019-05-28 05:48:11','0');
INSERT INTO marks VALUES('347','1','1','3','44','1','1','33','0','33','','0','0','','1','0','','1','','1','','2019-05-28 05:34:00','0');
INSERT INTO marks VALUES('348','1','1','4','44','1','1','0','45','45','0','','0','','1','0','','1','','1','','2019-05-28 05:23:19','0');
INSERT INTO marks VALUES('349','1','1','5','45','1','1','55','12','67','1','1','1','','1','0','','1','','1','','2019-05-28 05:38:28','0');
INSERT INTO marks VALUES('350','1','1','6','45','1','1','68','','68','1','1','1','','1','0','','1','','1','','2019-05-28 05:48:13','0');
INSERT INTO marks VALUES('351','1','1','1','45','1','1','25','','25','0','','0','','1','0','','1','','1','','2019-05-28 05:10:56','0');
INSERT INTO marks VALUES('352','1','1','2','45','1','1','63','13','76','1','1','1','','1','0','','1','','1','','2019-05-28 05:14:15','0');
INSERT INTO marks VALUES('353','1','1','5','46','1','1','56','11','67','1','1','1','','1','0','','1','','1','','2019-05-28 05:38:32','0');
INSERT INTO marks VALUES('354','1','1','6','46','1','1','83','','83','1','1','1','','1','0','','1','','1','','2019-05-28 05:48:15','0');
INSERT INTO marks VALUES('355','1','1','1','46','1','1','54','','54','1','1','1','','1','0','','1','','1','','2019-05-28 05:10:58','0');
INSERT INTO marks VALUES('356','1','1','2','46','1','1','63','12','75','1','1','1','','1','0','','1','','1','','2019-05-28 05:14:20','0');
INSERT INTO marks VALUES('357','1','1','5','47','1','1','65','12','77','1','1','1','','1','0','','1','','1','','2019-05-28 05:38:37','0');
INSERT INTO marks VALUES('358','1','1','6','47','1','1','84','','84','1','1','1','','1','0','','1','','1','','2019-05-28 05:48:17','0');
INSERT INTO marks VALUES('359','1','1','3','47','1','1','44','22','66','1','1','1','','1','0','','1','','1','','2019-05-28 05:19:07','0');
INSERT INTO marks VALUES('360','1','1','4','47','1','1','4','5','9','0','','0','','1','0','','1','','1','','2019-05-28 05:23:26','0');
INSERT INTO marks VALUES('361','1','1','5','48','1','1','66','13','79','1','1','1','','1','0','','1','','1','','2019-05-28 05:38:42','0');
INSERT INTO marks VALUES('362','1','1','6','48','1','1','85','','85','1','1','1','','1','0','','1','','1','','2019-05-28 05:48:18','0');
INSERT INTO marks VALUES('363','1','1','1','48','1','1','26','','26','0','','0','','1','0','','1','','1','','2019-05-28 05:11:05','0');
INSERT INTO marks VALUES('364','1','1','2','48','1','1','72','17','89','1','1','1','','1','0','','1','','1','','2019-05-28 05:14:25','0');
INSERT INTO marks VALUES('365','1','1','5','49','1','1','67','13','80','1','1','1','','1','0','','1','','1','','2019-05-28 05:39:01','0');
INSERT INTO marks VALUES('366','1','1','6','49','1','1','85','','85','1','1','1','','1','0','','1','','1','','2019-05-28 05:48:20','0');
INSERT INTO marks VALUES('367','1','1','3','49','1','1','55','11','66','1','1','1','','1','0','','1','','1','','2019-05-28 05:19:14','0');
INSERT INTO marks VALUES('368','1','1','4','49','1','1','45','0','45','','0','0','','1','0','','1','','1','','2019-05-28 05:23:36','0');
INSERT INTO marks VALUES('369','1','1','5','50','1','1','71','23','94','1','1','1','','1','0','','1','','1','','2019-05-28 05:39:07','0');
INSERT INTO marks VALUES('370','1','1','6','50','1','1','86','','86','1','1','1','','1','0','','1','','1','','2019-05-28 05:48:22','0');
INSERT INTO marks VALUES('371','1','1','3','50','1','1','65','23','88','1','1','1','','1','0','','1','','1','','2019-05-28 05:19:25','0');
INSERT INTO marks VALUES('372','1','1','4','50','1','1','24','42','66','1','1','1','','1','0','','1','','1','','2019-05-28 05:23:53','0');
INSERT INTO marks VALUES('373','1','1','5','51','1','1','70','11','81','1','1','1','','1','0','','1','','1','','2019-05-28 05:39:15','0');
INSERT INTO marks VALUES('374','1','1','6','51','1','1','87','','87','1','1','1','','1','0','','1','','1','','2019-05-28 05:48:24','0');
INSERT INTO marks VALUES('375','1','1','1','51','1','1','75','','75','1','1','1','','1','0','','1','','1','','2019-05-28 05:11:07','0');
INSERT INTO marks VALUES('376','1','1','2','51','1','1','35','15','50','1','1','1','','1','0','','1','','1','','2019-05-28 05:14:38','0');
INSERT INTO marks VALUES('377','1','1','5','52','1','1','65','12','77','1','1','1','','1','0','','1','','1','','2019-05-28 05:39:20','0');
INSERT INTO marks VALUES('378','1','1','6','52','1','1','78','','78','1','1','1','','1','0','','1','','1','','2019-05-28 05:48:26','0');
INSERT INTO marks VALUES('379','1','1','3','52','1','1','54','12','66','1','1','1','','1','0','','1','','1','','2019-05-28 05:19:31','0');
INSERT INTO marks VALUES('380','1','1','4','52','1','1','48','48','96','1','1','1','','1','0','','1','','1','','2019-05-28 05:23:59','0');
INSERT INTO marks VALUES('381','1','1','5','53','1','1','66','11','77','1','1','1','','1','0','','1','','1','','2019-05-28 05:39:23','0');
INSERT INTO marks VALUES('382','1','1','6','53','1','1','76','','76','1','1','1','','1','0','','1','','1','','2019-05-28 05:48:28','0');
INSERT INTO marks VALUES('383','1','1','1','53','1','1','84','','84','1','1','1','','1','0','','1','','1','','2019-05-28 05:11:09','0');
INSERT INTO marks VALUES('384','1','1','4','53','1','1','34','50','84','1','1','1','','1','0','','1','','1','','2019-05-28 05:34:22','0');
INSERT INTO marks VALUES('385','1','1','5','54','1','1','54','12','66','1','1','1','','1','0','','1','','1','','2019-05-28 05:39:28','0');
INSERT INTO marks VALUES('386','1','1','6','54','1','1','75','','75','1','1','1','','1','0','','1','','1','','2019-05-28 05:48:30','0');
INSERT INTO marks VALUES('387','1','1','1','54','1','1','75','','75','1','1','1','','1','0','','1','','1','','2019-05-28 05:11:12','0');
INSERT INTO marks VALUES('388','1','1','2','54','1','1','56','11','67','1','1','1','','1','0','','1','','1','','2019-05-28 05:14:45','0');
INSERT INTO marks VALUES('389','1','1','5','55','1','1','65','11','76','1','1','1','','1','0','','1','','1','','2019-05-28 05:39:32','0');
INSERT INTO marks VALUES('390','1','1','6','55','1','1','78','','78','1','1','1','','1','0','','1','','1','','2019-05-28 05:48:34','0');
INSERT INTO marks VALUES('391','1','1','3','55','1','1','56','12','68','1','1','1','','1','0','','1','','1','','2019-05-28 05:19:36','0');
INSERT INTO marks VALUES('392','1','1','4','55','1','1','43','34','77','1','1','1','','1','0','','1','','1','','2019-05-28 05:24:22','0');



DROP TABLE IF EXISTS migrations;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO migrations VALUES('1','2018_01_00_000000_create_users_table','1');
INSERT INTO migrations VALUES('2','2018_01_01_000010_create_designations_table','1');
INSERT INTO migrations VALUES('3','2018_01_01_000011_create_departments_table','1');
INSERT INTO migrations VALUES('4','2018_01_01_100000_create_password_resets_table','1');
INSERT INTO migrations VALUES('5','2018_01_01_100001_create_settings_table','1');
INSERT INTO migrations VALUES('6','2018_01_01_100002_create_classrooms_table','1');
INSERT INTO migrations VALUES('7','2018_01_01_100004_create_staffs_table','1');
INSERT INTO migrations VALUES('8','2018_01_01_100005_create_staff_attendances_table','1');
INSERT INTO migrations VALUES('10','2018_01_01_100007_create_transport_routes_table','1');
INSERT INTO migrations VALUES('11','2018_01_01_100008_create_academics_years_table','1');
INSERT INTO migrations VALUES('12','2018_01_01_100008_create_sections_table','1');
INSERT INTO migrations VALUES('13','2018_01_01_100008_create_students_table','1');
INSERT INTO migrations VALUES('14','2018_01_01_100010_create_student_sessions_table','1');
INSERT INTO migrations VALUES('15','2018_01_01_100015_create_transport_vehicles_table','1');
INSERT INTO migrations VALUES('16','2018_01_01_100017_create_transport_assigns_table','1');
INSERT INTO migrations VALUES('17','2018_01_04_190234_create_student_groups_table','1');
INSERT INTO migrations VALUES('18','2018_06_04_173837_create_class_days_table','1');
INSERT INTO migrations VALUES('19','2019_01_28_044944_create_permissions_tables','1');
INSERT INTO migrations VALUES('20','2019_02_14_041748_create_visitors_table','1');
INSERT INTO migrations VALUES('21','2019_02_16_063516_create_routines_table','1');
INSERT INTO migrations VALUES('22','2019_02_16_101350_create_notices_table','1');
INSERT INTO migrations VALUES('23','2019_02_17_060509_create_student_attendances_table','1');
INSERT INTO migrations VALUES('30','2019_02_27_070118_create_syllabus_table','1');
INSERT INTO migrations VALUES('31','2019_02_28_053258_create_galleries_table','1');
INSERT INTO migrations VALUES('34','2019_03_02_113000_create_gallery_images_table','1');
INSERT INTO migrations VALUES('35','2019_03_07_053227_create_users_activations_table','1');
INSERT INTO migrations VALUES('36','2019_03_13_091545_create_payment_methods_table','1');
INSERT INTO migrations VALUES('37','2019_03_14_041529_create_payee_and_payers_table','1');
INSERT INTO migrations VALUES('38','2019_03_14_060604_create_chart_of_accounts_table','1');
INSERT INTO migrations VALUES('39','2019_03_14_063624_create_transactions_table','1');
INSERT INTO migrations VALUES('40','2019_03_14_064924_create_bank_accounts_table','1');
INSERT INTO migrations VALUES('41','2019_03_17_060257_create_permission_groups_table','1');
INSERT INTO migrations VALUES('42','2019_03_21_050601_create_news_and_events_table','1');
INSERT INTO migrations VALUES('43','2019_03_21_063657_create_leave_applications_table','1');
INSERT INTO migrations VALUES('44','2019_03_21_095535_create_about_institutes_table','1');
INSERT INTO migrations VALUES('45','2019_03_21_095746_create_f_a_qs_table','1');
INSERT INTO migrations VALUES('46','2019_03_21_095812_create_quick_links_table','1');
INSERT INTO migrations VALUES('47','2019_03_22_093437_create_contents_table','1');
INSERT INTO migrations VALUES('49','2019_04_02_050000_create_fiscal_years_table','1');
INSERT INTO migrations VALUES('50','2019_04_02_054600_create_journals_table','1');
INSERT INTO migrations VALUES('51','2019_04_03_052409_create_groups_table','1');
INSERT INTO migrations VALUES('52','2019_04_03_070001_create_list_of_ledgers_table','1');
INSERT INTO migrations VALUES('53','2019_04_03_070629_create_ledgers_table','1');
INSERT INTO migrations VALUES('54','2019_04_03_095454_create_item_of_journals_table','1');
INSERT INTO migrations VALUES('61','2019_09_04_175517_create_website_languages_table','1');
INSERT INTO migrations VALUES('63','2019_10_26_190026_create_complains_table','1');
INSERT INTO migrations VALUES('64','2019_05_22_084034_create_scholarship_items_table','2');
INSERT INTO migrations VALUES('72','2019_02_26_100136_create_fee_types_table','3');
INSERT INTO migrations VALUES('73','2019_02_27_061045_create_invoices_table','3');
INSERT INTO migrations VALUES('74','2019_02_27_061137_create_invoice_items_table','3');
INSERT INTO migrations VALUES('75','2019_03_01_072012_create_student_payments_table','3');
INSERT INTO migrations VALUES('76','2019_03_02_073348_create_fee_type_status','3');
INSERT INTO migrations VALUES('77','2019_04_11_061749_create_copy_of_invoices_table','3');
INSERT INTO migrations VALUES('78','2019_05_12_051055_create_payment_histories_table','3');
INSERT INTO migrations VALUES('79','2019_10_26_065006_create_enquiries_table','4');
INSERT INTO migrations VALUES('80','2018_01_01_100006_create_subjects_table','5');
INSERT INTO migrations VALUES('81','2019_04_15_043158_create_optional_subject_assigns_table','5');
INSERT INTO migrations VALUES('82','2019_05_10_052927_create_subject_teachers_table','5');
INSERT INTO migrations VALUES('85','2019_02_18_070035_create_exam_lists_table','6');
INSERT INTO migrations VALUES('86','2019_02_18_083112_create_mark_grades_table','6');
INSERT INTO migrations VALUES('87','2019_02_18_091742_create_exam_routines_table','6');
INSERT INTO migrations VALUES('88','2019_05_10_094826_create_exam_results_table','7');
INSERT INTO migrations VALUES('89','2019_07_10_104623_create_marks_table','7');
INSERT INTO migrations VALUES('90','2019_05_29_095242_create_income_expenses_table','8');



DROP TABLE IF EXISTS model_has_permissions;

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS model_has_roles;

CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO model_has_roles VALUES('1','App\\User','1');
INSERT INTO model_has_roles VALUES('1','App\\User','2');
INSERT INTO model_has_roles VALUES('1','App\\User','37');
INSERT INTO model_has_roles VALUES('2','App\\User','39');
INSERT INTO model_has_roles VALUES('3','App\\User','41');
INSERT INTO model_has_roles VALUES('4','App\\User','42');
INSERT INTO model_has_roles VALUES('5','App\\User','40');
INSERT INTO model_has_roles VALUES('10','App\\User','38');
INSERT INTO model_has_roles VALUES('11','App\\User','27');
INSERT INTO model_has_roles VALUES('11','App\\User','28');
INSERT INTO model_has_roles VALUES('11','App\\User','29');
INSERT INTO model_has_roles VALUES('11','App\\User','30');
INSERT INTO model_has_roles VALUES('11','App\\User','31');
INSERT INTO model_has_roles VALUES('11','App\\User','32');
INSERT INTO model_has_roles VALUES('11','App\\User','33');
INSERT INTO model_has_roles VALUES('11','App\\User','34');
INSERT INTO model_has_roles VALUES('11','App\\User','35');
INSERT INTO model_has_roles VALUES('11','App\\User','36');
INSERT INTO model_has_roles VALUES('11','App\\User','43');
INSERT INTO model_has_roles VALUES('11','App\\User','44');
INSERT INTO model_has_roles VALUES('11','App\\User','45');
INSERT INTO model_has_roles VALUES('11','App\\User','46');
INSERT INTO model_has_roles VALUES('11','App\\User','47');
INSERT INTO model_has_roles VALUES('11','App\\User','48');
INSERT INTO model_has_roles VALUES('11','App\\User','49');
INSERT INTO model_has_roles VALUES('11','App\\User','50');
INSERT INTO model_has_roles VALUES('11','App\\User','51');
INSERT INTO model_has_roles VALUES('11','App\\User','52');
INSERT INTO model_has_roles VALUES('11','App\\User','53');
INSERT INTO model_has_roles VALUES('11','App\\User','54');
INSERT INTO model_has_roles VALUES('11','App\\User','55');
INSERT INTO model_has_roles VALUES('11','App\\User','56');
INSERT INTO model_has_roles VALUES('11','App\\User','57');
INSERT INTO model_has_roles VALUES('11','App\\User','58');
INSERT INTO model_has_roles VALUES('11','App\\User','59');
INSERT INTO model_has_roles VALUES('11','App\\User','60');
INSERT INTO model_has_roles VALUES('11','App\\User','61');
INSERT INTO model_has_roles VALUES('11','App\\User','62');
INSERT INTO model_has_roles VALUES('11','App\\User','63');
INSERT INTO model_has_roles VALUES('11','App\\User','64');
INSERT INTO model_has_roles VALUES('11','App\\User','65');
INSERT INTO model_has_roles VALUES('11','App\\User','66');
INSERT INTO model_has_roles VALUES('11','App\\User','67');
INSERT INTO model_has_roles VALUES('11','App\\User','68');
INSERT INTO model_has_roles VALUES('11','App\\User','69');
INSERT INTO model_has_roles VALUES('11','App\\User','70');
INSERT INTO model_has_roles VALUES('11','App\\User','71');
INSERT INTO model_has_roles VALUES('11','App\\User','72');
INSERT INTO model_has_roles VALUES('11','App\\User','73');
INSERT INTO model_has_roles VALUES('11','App\\User','74');
INSERT INTO model_has_roles VALUES('11','App\\User','75');
INSERT INTO model_has_roles VALUES('11','App\\User','76');
INSERT INTO model_has_roles VALUES('11','App\\User','77');
INSERT INTO model_has_roles VALUES('11','App\\User','78');
INSERT INTO model_has_roles VALUES('11','App\\User','79');
INSERT INTO model_has_roles VALUES('11','App\\User','80');
INSERT INTO model_has_roles VALUES('11','App\\User','81');



DROP TABLE IF EXISTS news_and_events;

CREATE TABLE `news_and_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_days` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `news_and_events_post_by_foreign` (`post_by`),
  KEY `news_and_events_verified_by_foreign` (`verified_by`),
  CONSTRAINT `news_and_events_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `news_and_events_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS notices;

CREATE TABLE `notices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `notices_post_by_foreign` (`post_by`),
  KEY `notices_verified_by_foreign` (`verified_by`),
  CONSTRAINT `notices_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `notices_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS optional_subject_assigns;

CREATE TABLE `optional_subject_assigns` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `optional_subject1_id` int(10) unsigned DEFAULT NULL,
  `optional_subject2_id` int(10) unsigned DEFAULT NULL,
  `session_id` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `optional_subject_assigns_optional_subject1_id_foreign` (`optional_subject1_id`),
  KEY `optional_subject_assigns_optional_subject2_id_foreign` (`optional_subject2_id`),
  CONSTRAINT `optional_subject_assigns_optional_subject1_id_foreign` FOREIGN KEY (`optional_subject1_id`) REFERENCES `subjects` (`id`) ON DELETE SET NULL,
  CONSTRAINT `optional_subject_assigns_optional_subject2_id_foreign` FOREIGN KEY (`optional_subject2_id`) REFERENCES `subjects` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO optional_subject_assigns VALUES('1','7','1','2','1','2019-05-27 08:18:31','2019-05-27 10:48:50','0');
INSERT INTO optional_subject_assigns VALUES('2','8','3','4','1','2019-05-27 08:18:31','2019-05-27 10:48:50','0');
INSERT INTO optional_subject_assigns VALUES('3','9','3','4','1','2019-05-27 08:18:31','2019-05-27 10:48:50','0');
INSERT INTO optional_subject_assigns VALUES('4','10','1','4','1','2019-05-27 08:18:32','2019-05-27 10:48:50','0');
INSERT INTO optional_subject_assigns VALUES('5','11','1','4','1','2019-05-27 08:18:32','2019-05-27 10:48:50','0');
INSERT INTO optional_subject_assigns VALUES('6','12','1','4','1','2019-05-27 08:18:32','2019-05-27 10:48:50','0');
INSERT INTO optional_subject_assigns VALUES('7','13','1','4','1','2019-05-27 08:18:32','2019-05-27 10:48:50','0');
INSERT INTO optional_subject_assigns VALUES('8','14','3','2','1','2019-05-27 08:18:32','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('9','15','3','2','1','2019-05-27 08:18:32','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('10','16','1','2','1','2019-05-27 08:18:32','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('11','17','1','4','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('12','18','3','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('13','19','3','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('14','20','3','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('15','21','3','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('16','22','1','4','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('17','23','1','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('18','24','1','4','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('19','25','3','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('20','26','1','4','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('21','27','3','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('22','28','3','4','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('23','29','1','4','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('24','30','3','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('25','31','3','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('26','32','3','4','1','2019-05-27 10:48:51','2019-05-27 10:54:36','0');
INSERT INTO optional_subject_assigns VALUES('27','33','3','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('28','34','3','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('29','35','3','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('30','36','3','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('31','37','1','4','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('32','38','1','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('33','39','3','4','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('34','40','1','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('35','41','1','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('36','42','3','4','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('37','43','1','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('38','44','3','4','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('39','45','1','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('40','46','1','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('41','47','3','4','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('42','48','1','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('43','49','3','4','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('44','50','3','4','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('45','51','1','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('46','52','3','4','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('47','53','1','4','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('48','54','1','2','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');
INSERT INTO optional_subject_assigns VALUES('49','55','3','4','1','2019-05-27 10:48:51','2019-05-27 10:48:51','0');



DROP TABLE IF EXISTS password_resets;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS payee_and_payers;

CREATE TABLE `payee_and_payers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `payee_and_payers_post_by_foreign` (`post_by`),
  KEY `payee_and_payers_verified_by_foreign` (`verified_by`),
  CONSTRAINT `payee_and_payers_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `payee_and_payers_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS payment_histories;

CREATE TABLE `payment_histories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(10) unsigned NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payment_histories_student_id_foreign` (`student_id`),
  CONSTRAINT `payment_histories_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO payment_histories VALUES('1','7','12000.00','2019-05-23 11:16:12','2019-05-23 11:16:12');



DROP TABLE IF EXISTS payment_methods;

CREATE TABLE `payment_methods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `payment_methods_name_unique` (`name`),
  KEY `payment_methods_post_by_foreign` (`post_by`),
  KEY `payment_methods_verified_by_foreign` (`verified_by`),
  CONSTRAINT `payment_methods_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `payment_methods_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS permission_groups;

CREATE TABLE `permission_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO permission_groups VALUES('1','role','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permission_groups VALUES('2','visitor','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permission_groups VALUES('3','hr','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permission_groups VALUES('4','student','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permission_groups VALUES('5','classroom','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permission_groups VALUES('6','section','2019-05-23 02:31:35','2019-05-23 02:31:35','0');
INSERT INTO permission_groups VALUES('7','studentfee','2019-05-23 02:31:35','2019-05-23 02:31:35','0');
INSERT INTO permission_groups VALUES('8','routine','2019-05-23 02:31:35','2019-05-23 02:31:35','0');
INSERT INTO permission_groups VALUES('9','notice','2019-05-23 02:31:35','2019-05-23 02:31:35','0');
INSERT INTO permission_groups VALUES('10','exam','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permission_groups VALUES('11','grade','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permission_groups VALUES('12','exam-routine','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permission_groups VALUES('13','marksheet','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permission_groups VALUES('14','complaint','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permission_groups VALUES('15','enquiry','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permission_groups VALUES('16','permission','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permission_groups VALUES('17','user','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permission_groups VALUES('18','student-attendance','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permission_groups VALUES('19','staff-attendance','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permission_groups VALUES('20','exam-attendance','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permission_groups VALUES('21','mark','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permission_groups VALUES('22','route','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permission_groups VALUES('23','vehicle','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permission_groups VALUES('24','vehicle-assign','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permission_groups VALUES('25','subject','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permission_groups VALUES('26','department','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permission_groups VALUES('27','designation','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permission_groups VALUES('28','gallery','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permission_groups VALUES('29','syllabus','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permission_groups VALUES('30','transaction','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permission_groups VALUES('31','bank-account','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permission_groups VALUES('32','payment-method','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permission_groups VALUES('33','chart-of-account','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permission_groups VALUES('34','payee-payer','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permission_groups VALUES('35','invoice','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permission_groups VALUES('36','database-backup','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permission_groups VALUES('37','academics-year','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permission_groups VALUES('38','student-payment','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permission_groups VALUES('39','student-history','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permission_groups VALUES('40','news-and-event','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permission_groups VALUES('41','faq','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permission_groups VALUES('42','quick-link','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permission_groups VALUES('43','content','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permission_groups VALUES('44','testimonial','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permission_groups VALUES('45','student-leave-application','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permission_groups VALUES('46','report','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permission_groups VALUES('47','journal','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permission_groups VALUES('48','ledger','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permission_groups VALUES('49','trial-balance','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permission_groups VALUES('50','balance-sheet','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permission_groups VALUES('51','profit-loss','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permission_groups VALUES('52','day-book','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permission_groups VALUES('53','setting','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permission_groups VALUES('54','subject-assign','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permission_groups VALUES('55','fiscal-year','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permission_groups VALUES('56','subjectteacher','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permission_groups VALUES('57','class-teacher-assign','2019-05-23 02:31:41','2019-05-23 02:31:41','0');



DROP TABLE IF EXISTS permissions;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=229 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO permissions VALUES('1','1','role-list','web','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permissions VALUES('2','1','role-create','web','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permissions VALUES('3','1','role-edit','web','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permissions VALUES('4','1','role-delete','web','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permissions VALUES('5','2','visitor-list','web','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permissions VALUES('6','2','visitor-create','web','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permissions VALUES('7','2','visitor-edit','web','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permissions VALUES('8','2','visitor-delete','web','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permissions VALUES('9','3','hr-list','web','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permissions VALUES('10','3','hr-create','web','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permissions VALUES('11','3','hr-edit','web','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permissions VALUES('12','3','hr-delete','web','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permissions VALUES('13','4','student-list','web','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permissions VALUES('14','4','student-create','web','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permissions VALUES('15','4','student-edit','web','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permissions VALUES('16','4','student-delete','web','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permissions VALUES('17','5','classroom-list','web','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permissions VALUES('18','5','classroom-create','web','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permissions VALUES('19','5','classroom-edit','web','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permissions VALUES('20','5','classroom-delete','web','2019-05-23 02:31:34','2019-05-23 02:31:34','0');
INSERT INTO permissions VALUES('21','6','section-list','web','2019-05-23 02:31:35','2019-05-23 02:31:35','0');
INSERT INTO permissions VALUES('22','6','section-create','web','2019-05-23 02:31:35','2019-05-23 02:31:35','0');
INSERT INTO permissions VALUES('23','6','section-edit','web','2019-05-23 02:31:35','2019-05-23 02:31:35','0');
INSERT INTO permissions VALUES('24','6','section-delete','web','2019-05-23 02:31:35','2019-05-23 02:31:35','0');
INSERT INTO permissions VALUES('25','7','studentfee-list','web','2019-05-23 02:31:35','2019-05-23 02:31:35','0');
INSERT INTO permissions VALUES('26','7','studentfee-create','web','2019-05-23 02:31:35','2019-05-23 02:31:35','0');
INSERT INTO permissions VALUES('27','7','studentfee-edit','web','2019-05-23 02:31:35','2019-05-23 02:31:35','0');
INSERT INTO permissions VALUES('28','7','studentfee-delete','web','2019-05-23 02:31:35','2019-05-23 02:31:35','0');
INSERT INTO permissions VALUES('29','8','routine-list','web','2019-05-23 02:31:35','2019-05-23 02:31:35','0');
INSERT INTO permissions VALUES('30','8','routine-create','web','2019-05-23 02:31:35','2019-05-23 02:31:35','0');
INSERT INTO permissions VALUES('31','8','routine-edit','web','2019-05-23 02:31:35','2019-05-23 02:31:35','0');
INSERT INTO permissions VALUES('32','8','routine-delete','web','2019-05-23 02:31:35','2019-05-23 02:31:35','0');
INSERT INTO permissions VALUES('33','9','notice-list','web','2019-05-23 02:31:35','2019-05-23 02:31:35','0');
INSERT INTO permissions VALUES('34','9','notice-create','web','2019-05-23 02:31:35','2019-05-23 02:31:35','0');
INSERT INTO permissions VALUES('35','9','notice-edit','web','2019-05-23 02:31:35','2019-05-23 02:31:35','0');
INSERT INTO permissions VALUES('36','9','notice-delete','web','2019-05-23 02:31:35','2019-05-23 02:31:35','0');
INSERT INTO permissions VALUES('37','10','exam-list','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('38','10','exam-create','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('39','10','exam-edit','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('40','10','exam-delete','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('41','11','grade-list','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('42','11','grade-create','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('43','11','grade-edit','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('44','11','grade-delete','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('45','12','exam-routine-list','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('46','12','exam-routine-create','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('47','12','exam-routine-edit','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('48','12','exam-routine-delete','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('49','13','marksheet-list','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('50','13','marksheet-create','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('51','13','marksheet-edit','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('52','13','marksheet-delete','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('53','14','complaint-list','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('54','14','complaint-create','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('55','14','complaint-edit','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('56','14','complaint-delete','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('57','15','enquiry-list','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('58','15','enquiry-create','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('59','15','enquiry-edit','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('60','15','enquiry-delete','web','2019-05-23 02:31:36','2019-05-23 02:31:36','0');
INSERT INTO permissions VALUES('61','16','permission-list','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('62','16','permission-create','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('63','16','permission-edit','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('64','16','permission-delete','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('65','17','user-list','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('66','17','user-create','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('67','17','user-edit','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('68','17','user-delete','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('69','18','student-attendance-list','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('70','18','student-attendance-create','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('71','18','student-attendance-edit','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('72','18','student-attendance-delete','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('73','19','staff-attendance-list','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('74','19','staff-attendance-create','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('75','19','staff-attendance-edit','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('76','19','staff-attendance-delete','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('77','20','exam-attendance-list','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('78','20','exam-attendance-create','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('79','20','exam-attendance-edit','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('80','20','exam-attendance-delete','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('81','21','mark-list','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('82','21','mark-create','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('83','21','mark-edit','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('84','21','mark-delete','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('85','22','route-list','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('86','22','route-create','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('87','22','route-edit','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('88','22','route-delete','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('89','23','vehicle-list','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('90','23','vehicle-create','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('91','23','vehicle-edit','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('92','23','vehicle-delete','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('93','24','vehicle-assign-list','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('94','24','vehicle-assign-create','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('95','24','vehicle-assign-edit','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('96','24','vehicle-assign-delete','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('97','25','subject-list','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('98','25','subject-create','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('99','25','subject-edit','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('100','25','subject-delete','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('101','26','department-list','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('102','26','department-create','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('103','26','department-edit','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('104','26','department-delete','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('105','27','designation-list','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('106','27','designation-create','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('107','27','designation-edit','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('108','27','designation-delete','web','2019-05-23 02:31:37','2019-05-23 02:31:37','0');
INSERT INTO permissions VALUES('109','28','gallery-list','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('110','28','gallery-create','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('111','28','gallery-edit','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('112','28','gallery-delete','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('113','29','syllabus-list','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('114','29','syllabus-create','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('115','29','syllabus-edit','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('116','29','syllabus-delete','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('117','30','transaction-list','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('118','30','transaction-create','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('119','30','transaction-edit','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('120','30','transaction-delete','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('121','31','bank-account-list','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('122','31','bank-account-create','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('123','31','bank-account-edit','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('124','31','bank-account-delete','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('125','32','payment-method-list','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('126','32','payment-method-create','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('127','32','payment-method-edit','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('128','32','payment-method-delete','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('129','33','chart-of-account-list','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('130','33','chart-of-account-create','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('131','33','chart-of-account-edit','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('132','33','chart-of-account-delete','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('133','34','payee-payer-list','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('134','34','payee-payer-create','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('135','34','payee-payer-edit','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('136','34','payee-payer-delete','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('137','35','invoice-list','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('138','35','invoice-create','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('139','35','invoice-edit','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('140','35','invoice-delete','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('141','36','database-backup-list','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('142','36','database-backup-create','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('143','36','database-backup-edit','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('144','36','database-backup-delete','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('145','37','academics-year-list','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('146','37','academics-year-create','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('147','37','academics-year-edit','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('148','37','academics-year-delete','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('149','38','student-payment-list','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('150','38','student-payment-create','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('151','38','student-payment-edit','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('152','38','student-payment-delete','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('153','39','student-history-list','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('154','39','student-history-create','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('155','39','student-history-edit','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('156','39','student-history-delete','web','2019-05-23 02:31:38','2019-05-23 02:31:38','0');
INSERT INTO permissions VALUES('157','40','news-and-event-list','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('158','40','news-and-event-create','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('159','40','news-and-event-edit','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('160','40','news-and-event-delete','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('161','41','faq-list','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('162','41','faq-create','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('163','41','faq-edit','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('164','41','faq-delete','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('165','42','quick-link-list','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('166','42','quick-link-create','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('167','42','quick-link-edit','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('168','42','quick-link-delete','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('169','43','content-list','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('170','43','content-create','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('171','43','content-edit','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('172','43','content-delete','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('173','44','testimonial-list','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('174','44','testimonial-create','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('175','44','testimonial-edit','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('176','44','testimonial-delete','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('177','45','student-leave-application-list','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('178','45','student-leave-application-create','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('179','45','student-leave-application-edit','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('180','45','student-leave-application-delete','web','2019-05-23 02:31:39','2019-05-23 02:31:39','0');
INSERT INTO permissions VALUES('181','46','report-list','web','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permissions VALUES('182','46','report-create','web','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permissions VALUES('183','46','report-edit','web','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permissions VALUES('184','46','report-delete','web','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permissions VALUES('185','47','journal-list','web','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permissions VALUES('186','47','journal-create','web','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permissions VALUES('187','47','journal-edit','web','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permissions VALUES('188','47','journal-delete','web','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permissions VALUES('189','48','ledger-list','web','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permissions VALUES('190','48','ledger-create','web','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permissions VALUES('191','48','ledger-edit','web','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permissions VALUES('192','48','ledger-delete','web','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permissions VALUES('193','49','trial-balance-list','web','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permissions VALUES('194','49','trial-balance-create','web','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permissions VALUES('195','49','trial-balance-edit','web','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permissions VALUES('196','49','trial-balance-delete','web','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permissions VALUES('197','50','balance-sheet-list','web','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permissions VALUES('198','50','balance-sheet-create','web','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permissions VALUES('199','50','balance-sheet-edit','web','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permissions VALUES('200','50','balance-sheet-delete','web','2019-05-23 02:31:40','2019-05-23 02:31:40','0');
INSERT INTO permissions VALUES('201','51','profit-loss-list','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('202','51','profit-loss-create','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('203','51','profit-loss-edit','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('204','51','profit-loss-delete','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('205','52','day-book-list','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('206','52','day-book-create','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('207','52','day-book-edit','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('208','52','day-book-delete','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('209','53','setting-list','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('210','53','setting-create','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('211','53','setting-edit','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('212','53','setting-delete','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('213','54','subject-assign-list','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('214','54','subject-assign-create','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('215','54','subject-assign-edit','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('216','54','subject-assign-delete','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('217','55','fiscal-year-list','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('218','55','fiscal-year-create','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('219','55','fiscal-year-edit','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('220','55','fiscal-year-delete','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('221','56','subjectteacher-list','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('222','56','subjectteacher-create','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('223','56','subjectteacher-edit','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('224','56','subjectteacher-delete','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('225','57','class-teacher-assign-list','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('226','57','class-teacher-assign-create','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('227','57','class-teacher-assign-edit','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');
INSERT INTO permissions VALUES('228','57','class-teacher-assign-delete','web','2019-05-23 02:31:41','2019-05-23 02:31:41','0');



DROP TABLE IF EXISTS quick_links;

CREATE TABLE `quick_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `links` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `quick_links_post_by_foreign` (`post_by`),
  KEY `quick_links_verified_by_foreign` (`verified_by`),
  CONSTRAINT `quick_links_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `quick_links_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS role_has_permissions;

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO role_has_permissions VALUES('1','1');
INSERT INTO role_has_permissions VALUES('2','1');
INSERT INTO role_has_permissions VALUES('3','1');
INSERT INTO role_has_permissions VALUES('4','1');
INSERT INTO role_has_permissions VALUES('5','1');
INSERT INTO role_has_permissions VALUES('5','3');
INSERT INTO role_has_permissions VALUES('6','1');
INSERT INTO role_has_permissions VALUES('6','3');
INSERT INTO role_has_permissions VALUES('7','1');
INSERT INTO role_has_permissions VALUES('7','3');
INSERT INTO role_has_permissions VALUES('8','1');
INSERT INTO role_has_permissions VALUES('8','3');
INSERT INTO role_has_permissions VALUES('9','1');
INSERT INTO role_has_permissions VALUES('9','2');
INSERT INTO role_has_permissions VALUES('9','3');
INSERT INTO role_has_permissions VALUES('9','5');
INSERT INTO role_has_permissions VALUES('10','1');
INSERT INTO role_has_permissions VALUES('11','1');
INSERT INTO role_has_permissions VALUES('12','1');
INSERT INTO role_has_permissions VALUES('13','1');
INSERT INTO role_has_permissions VALUES('13','2');
INSERT INTO role_has_permissions VALUES('13','3');
INSERT INTO role_has_permissions VALUES('13','5');
INSERT INTO role_has_permissions VALUES('14','1');
INSERT INTO role_has_permissions VALUES('15','1');
INSERT INTO role_has_permissions VALUES('16','1');
INSERT INTO role_has_permissions VALUES('17','1');
INSERT INTO role_has_permissions VALUES('17','2');
INSERT INTO role_has_permissions VALUES('17','3');
INSERT INTO role_has_permissions VALUES('17','5');
INSERT INTO role_has_permissions VALUES('18','1');
INSERT INTO role_has_permissions VALUES('19','1');
INSERT INTO role_has_permissions VALUES('20','1');
INSERT INTO role_has_permissions VALUES('21','1');
INSERT INTO role_has_permissions VALUES('21','2');
INSERT INTO role_has_permissions VALUES('21','3');
INSERT INTO role_has_permissions VALUES('21','5');
INSERT INTO role_has_permissions VALUES('22','1');
INSERT INTO role_has_permissions VALUES('23','1');
INSERT INTO role_has_permissions VALUES('24','1');
INSERT INTO role_has_permissions VALUES('25','1');
INSERT INTO role_has_permissions VALUES('25','3');
INSERT INTO role_has_permissions VALUES('25','4');
INSERT INTO role_has_permissions VALUES('26','1');
INSERT INTO role_has_permissions VALUES('26','4');
INSERT INTO role_has_permissions VALUES('27','1');
INSERT INTO role_has_permissions VALUES('27','4');
INSERT INTO role_has_permissions VALUES('28','1');
INSERT INTO role_has_permissions VALUES('28','4');
INSERT INTO role_has_permissions VALUES('29','1');
INSERT INTO role_has_permissions VALUES('29','3');
INSERT INTO role_has_permissions VALUES('29','5');
INSERT INTO role_has_permissions VALUES('30','1');
INSERT INTO role_has_permissions VALUES('31','1');
INSERT INTO role_has_permissions VALUES('32','1');
INSERT INTO role_has_permissions VALUES('33','1');
INSERT INTO role_has_permissions VALUES('33','2');
INSERT INTO role_has_permissions VALUES('33','3');
INSERT INTO role_has_permissions VALUES('33','5');
INSERT INTO role_has_permissions VALUES('34','1');
INSERT INTO role_has_permissions VALUES('35','1');
INSERT INTO role_has_permissions VALUES('36','1');
INSERT INTO role_has_permissions VALUES('37','1');
INSERT INTO role_has_permissions VALUES('37','2');
INSERT INTO role_has_permissions VALUES('37','3');
INSERT INTO role_has_permissions VALUES('38','1');
INSERT INTO role_has_permissions VALUES('39','1');
INSERT INTO role_has_permissions VALUES('40','1');
INSERT INTO role_has_permissions VALUES('41','1');
INSERT INTO role_has_permissions VALUES('41','2');
INSERT INTO role_has_permissions VALUES('41','5');
INSERT INTO role_has_permissions VALUES('42','1');
INSERT INTO role_has_permissions VALUES('43','1');
INSERT INTO role_has_permissions VALUES('44','1');
INSERT INTO role_has_permissions VALUES('45','1');
INSERT INTO role_has_permissions VALUES('45','2');
INSERT INTO role_has_permissions VALUES('45','3');
INSERT INTO role_has_permissions VALUES('45','5');
INSERT INTO role_has_permissions VALUES('46','1');
INSERT INTO role_has_permissions VALUES('47','1');
INSERT INTO role_has_permissions VALUES('48','1');
INSERT INTO role_has_permissions VALUES('49','1');
INSERT INTO role_has_permissions VALUES('49','2');
INSERT INTO role_has_permissions VALUES('49','5');
INSERT INTO role_has_permissions VALUES('50','1');
INSERT INTO role_has_permissions VALUES('50','5');
INSERT INTO role_has_permissions VALUES('51','1');
INSERT INTO role_has_permissions VALUES('51','5');
INSERT INTO role_has_permissions VALUES('52','1');
INSERT INTO role_has_permissions VALUES('52','5');
INSERT INTO role_has_permissions VALUES('53','1');
INSERT INTO role_has_permissions VALUES('54','1');
INSERT INTO role_has_permissions VALUES('54','2');
INSERT INTO role_has_permissions VALUES('54','3');
INSERT INTO role_has_permissions VALUES('54','5');
INSERT INTO role_has_permissions VALUES('55','1');
INSERT INTO role_has_permissions VALUES('56','1');
INSERT INTO role_has_permissions VALUES('57','1');
INSERT INTO role_has_permissions VALUES('57','2');
INSERT INTO role_has_permissions VALUES('57','3');
INSERT INTO role_has_permissions VALUES('58','1');
INSERT INTO role_has_permissions VALUES('58','5');
INSERT INTO role_has_permissions VALUES('59','1');
INSERT INTO role_has_permissions VALUES('60','1');
INSERT INTO role_has_permissions VALUES('61','1');
INSERT INTO role_has_permissions VALUES('62','1');
INSERT INTO role_has_permissions VALUES('63','1');
INSERT INTO role_has_permissions VALUES('64','1');
INSERT INTO role_has_permissions VALUES('65','1');
INSERT INTO role_has_permissions VALUES('66','1');
INSERT INTO role_has_permissions VALUES('67','1');
INSERT INTO role_has_permissions VALUES('68','1');
INSERT INTO role_has_permissions VALUES('69','1');
INSERT INTO role_has_permissions VALUES('69','5');
INSERT INTO role_has_permissions VALUES('70','1');
INSERT INTO role_has_permissions VALUES('70','5');
INSERT INTO role_has_permissions VALUES('71','1');
INSERT INTO role_has_permissions VALUES('71','5');
INSERT INTO role_has_permissions VALUES('72','1');
INSERT INTO role_has_permissions VALUES('72','5');
INSERT INTO role_has_permissions VALUES('73','1');
INSERT INTO role_has_permissions VALUES('73','5');
INSERT INTO role_has_permissions VALUES('74','1');
INSERT INTO role_has_permissions VALUES('74','5');
INSERT INTO role_has_permissions VALUES('75','1');
INSERT INTO role_has_permissions VALUES('75','5');
INSERT INTO role_has_permissions VALUES('76','1');
INSERT INTO role_has_permissions VALUES('76','5');
INSERT INTO role_has_permissions VALUES('77','1');
INSERT INTO role_has_permissions VALUES('77','5');
INSERT INTO role_has_permissions VALUES('78','1');
INSERT INTO role_has_permissions VALUES('78','5');
INSERT INTO role_has_permissions VALUES('79','1');
INSERT INTO role_has_permissions VALUES('79','5');
INSERT INTO role_has_permissions VALUES('80','1');
INSERT INTO role_has_permissions VALUES('80','5');
INSERT INTO role_has_permissions VALUES('81','1');
INSERT INTO role_has_permissions VALUES('82','1');
INSERT INTO role_has_permissions VALUES('83','1');
INSERT INTO role_has_permissions VALUES('84','1');
INSERT INTO role_has_permissions VALUES('85','1');
INSERT INTO role_has_permissions VALUES('85','2');
INSERT INTO role_has_permissions VALUES('85','3');
INSERT INTO role_has_permissions VALUES('85','5');
INSERT INTO role_has_permissions VALUES('86','1');
INSERT INTO role_has_permissions VALUES('87','1');
INSERT INTO role_has_permissions VALUES('88','1');
INSERT INTO role_has_permissions VALUES('89','1');
INSERT INTO role_has_permissions VALUES('89','2');
INSERT INTO role_has_permissions VALUES('89','3');
INSERT INTO role_has_permissions VALUES('89','5');
INSERT INTO role_has_permissions VALUES('90','1');
INSERT INTO role_has_permissions VALUES('91','1');
INSERT INTO role_has_permissions VALUES('92','1');
INSERT INTO role_has_permissions VALUES('93','1');
INSERT INTO role_has_permissions VALUES('94','1');
INSERT INTO role_has_permissions VALUES('95','1');
INSERT INTO role_has_permissions VALUES('96','1');
INSERT INTO role_has_permissions VALUES('97','1');
INSERT INTO role_has_permissions VALUES('97','2');
INSERT INTO role_has_permissions VALUES('97','5');
INSERT INTO role_has_permissions VALUES('98','1');
INSERT INTO role_has_permissions VALUES('99','1');
INSERT INTO role_has_permissions VALUES('100','1');
INSERT INTO role_has_permissions VALUES('101','1');
INSERT INTO role_has_permissions VALUES('102','1');
INSERT INTO role_has_permissions VALUES('103','1');
INSERT INTO role_has_permissions VALUES('104','1');
INSERT INTO role_has_permissions VALUES('105','1');
INSERT INTO role_has_permissions VALUES('105','2');
INSERT INTO role_has_permissions VALUES('105','5');
INSERT INTO role_has_permissions VALUES('106','1');
INSERT INTO role_has_permissions VALUES('107','1');
INSERT INTO role_has_permissions VALUES('108','1');
INSERT INTO role_has_permissions VALUES('109','1');
INSERT INTO role_has_permissions VALUES('109','2');
INSERT INTO role_has_permissions VALUES('109','3');
INSERT INTO role_has_permissions VALUES('110','1');
INSERT INTO role_has_permissions VALUES('111','1');
INSERT INTO role_has_permissions VALUES('112','1');
INSERT INTO role_has_permissions VALUES('113','1');
INSERT INTO role_has_permissions VALUES('113','2');
INSERT INTO role_has_permissions VALUES('113','5');
INSERT INTO role_has_permissions VALUES('114','1');
INSERT INTO role_has_permissions VALUES('115','1');
INSERT INTO role_has_permissions VALUES('116','1');
INSERT INTO role_has_permissions VALUES('117','1');
INSERT INTO role_has_permissions VALUES('118','1');
INSERT INTO role_has_permissions VALUES('119','1');
INSERT INTO role_has_permissions VALUES('120','1');
INSERT INTO role_has_permissions VALUES('121','1');
INSERT INTO role_has_permissions VALUES('122','1');
INSERT INTO role_has_permissions VALUES('123','1');
INSERT INTO role_has_permissions VALUES('124','1');
INSERT INTO role_has_permissions VALUES('125','1');
INSERT INTO role_has_permissions VALUES('126','1');
INSERT INTO role_has_permissions VALUES('127','1');
INSERT INTO role_has_permissions VALUES('128','1');
INSERT INTO role_has_permissions VALUES('129','1');
INSERT INTO role_has_permissions VALUES('130','1');
INSERT INTO role_has_permissions VALUES('131','1');
INSERT INTO role_has_permissions VALUES('132','1');
INSERT INTO role_has_permissions VALUES('133','1');
INSERT INTO role_has_permissions VALUES('134','1');
INSERT INTO role_has_permissions VALUES('135','1');
INSERT INTO role_has_permissions VALUES('136','1');
INSERT INTO role_has_permissions VALUES('137','1');
INSERT INTO role_has_permissions VALUES('137','4');
INSERT INTO role_has_permissions VALUES('138','1');
INSERT INTO role_has_permissions VALUES('138','4');
INSERT INTO role_has_permissions VALUES('139','1');
INSERT INTO role_has_permissions VALUES('139','4');
INSERT INTO role_has_permissions VALUES('140','1');
INSERT INTO role_has_permissions VALUES('140','4');
INSERT INTO role_has_permissions VALUES('141','1');
INSERT INTO role_has_permissions VALUES('142','1');
INSERT INTO role_has_permissions VALUES('143','1');
INSERT INTO role_has_permissions VALUES('144','1');
INSERT INTO role_has_permissions VALUES('145','1');
INSERT INTO role_has_permissions VALUES('146','1');
INSERT INTO role_has_permissions VALUES('147','1');
INSERT INTO role_has_permissions VALUES('148','1');
INSERT INTO role_has_permissions VALUES('149','1');
INSERT INTO role_has_permissions VALUES('149','4');
INSERT INTO role_has_permissions VALUES('150','1');
INSERT INTO role_has_permissions VALUES('150','4');
INSERT INTO role_has_permissions VALUES('151','1');
INSERT INTO role_has_permissions VALUES('151','4');
INSERT INTO role_has_permissions VALUES('152','1');
INSERT INTO role_has_permissions VALUES('152','4');
INSERT INTO role_has_permissions VALUES('153','1');
INSERT INTO role_has_permissions VALUES('153','3');
INSERT INTO role_has_permissions VALUES('154','1');
INSERT INTO role_has_permissions VALUES('155','1');
INSERT INTO role_has_permissions VALUES('156','1');
INSERT INTO role_has_permissions VALUES('157','1');
INSERT INTO role_has_permissions VALUES('158','1');
INSERT INTO role_has_permissions VALUES('159','1');
INSERT INTO role_has_permissions VALUES('160','1');
INSERT INTO role_has_permissions VALUES('161','1');
INSERT INTO role_has_permissions VALUES('162','1');
INSERT INTO role_has_permissions VALUES('163','1');
INSERT INTO role_has_permissions VALUES('164','1');
INSERT INTO role_has_permissions VALUES('165','1');
INSERT INTO role_has_permissions VALUES('166','1');
INSERT INTO role_has_permissions VALUES('167','1');
INSERT INTO role_has_permissions VALUES('168','1');
INSERT INTO role_has_permissions VALUES('169','1');
INSERT INTO role_has_permissions VALUES('170','1');
INSERT INTO role_has_permissions VALUES('171','1');
INSERT INTO role_has_permissions VALUES('172','1');
INSERT INTO role_has_permissions VALUES('173','1');
INSERT INTO role_has_permissions VALUES('174','1');
INSERT INTO role_has_permissions VALUES('175','1');
INSERT INTO role_has_permissions VALUES('176','1');
INSERT INTO role_has_permissions VALUES('177','1');
INSERT INTO role_has_permissions VALUES('178','1');
INSERT INTO role_has_permissions VALUES('179','1');
INSERT INTO role_has_permissions VALUES('180','1');
INSERT INTO role_has_permissions VALUES('181','1');
INSERT INTO role_has_permissions VALUES('182','1');
INSERT INTO role_has_permissions VALUES('183','1');
INSERT INTO role_has_permissions VALUES('184','1');
INSERT INTO role_has_permissions VALUES('185','1');
INSERT INTO role_has_permissions VALUES('185','4');
INSERT INTO role_has_permissions VALUES('186','1');
INSERT INTO role_has_permissions VALUES('186','4');
INSERT INTO role_has_permissions VALUES('187','1');
INSERT INTO role_has_permissions VALUES('187','4');
INSERT INTO role_has_permissions VALUES('188','1');
INSERT INTO role_has_permissions VALUES('188','4');
INSERT INTO role_has_permissions VALUES('189','1');
INSERT INTO role_has_permissions VALUES('189','4');
INSERT INTO role_has_permissions VALUES('190','1');
INSERT INTO role_has_permissions VALUES('190','4');
INSERT INTO role_has_permissions VALUES('191','1');
INSERT INTO role_has_permissions VALUES('191','4');
INSERT INTO role_has_permissions VALUES('192','1');
INSERT INTO role_has_permissions VALUES('192','4');
INSERT INTO role_has_permissions VALUES('193','1');
INSERT INTO role_has_permissions VALUES('193','4');
INSERT INTO role_has_permissions VALUES('194','1');
INSERT INTO role_has_permissions VALUES('194','4');
INSERT INTO role_has_permissions VALUES('195','1');
INSERT INTO role_has_permissions VALUES('195','4');
INSERT INTO role_has_permissions VALUES('196','1');
INSERT INTO role_has_permissions VALUES('196','4');
INSERT INTO role_has_permissions VALUES('197','1');
INSERT INTO role_has_permissions VALUES('197','4');
INSERT INTO role_has_permissions VALUES('198','1');
INSERT INTO role_has_permissions VALUES('198','4');
INSERT INTO role_has_permissions VALUES('199','1');
INSERT INTO role_has_permissions VALUES('199','4');
INSERT INTO role_has_permissions VALUES('200','1');
INSERT INTO role_has_permissions VALUES('200','4');
INSERT INTO role_has_permissions VALUES('201','1');
INSERT INTO role_has_permissions VALUES('201','4');
INSERT INTO role_has_permissions VALUES('202','1');
INSERT INTO role_has_permissions VALUES('202','4');
INSERT INTO role_has_permissions VALUES('203','1');
INSERT INTO role_has_permissions VALUES('203','4');
INSERT INTO role_has_permissions VALUES('204','1');
INSERT INTO role_has_permissions VALUES('204','4');
INSERT INTO role_has_permissions VALUES('205','1');
INSERT INTO role_has_permissions VALUES('205','4');
INSERT INTO role_has_permissions VALUES('206','1');
INSERT INTO role_has_permissions VALUES('206','4');
INSERT INTO role_has_permissions VALUES('207','1');
INSERT INTO role_has_permissions VALUES('207','4');
INSERT INTO role_has_permissions VALUES('208','1');
INSERT INTO role_has_permissions VALUES('208','4');
INSERT INTO role_has_permissions VALUES('209','1');
INSERT INTO role_has_permissions VALUES('210','1');
INSERT INTO role_has_permissions VALUES('211','1');
INSERT INTO role_has_permissions VALUES('212','1');
INSERT INTO role_has_permissions VALUES('213','1');
INSERT INTO role_has_permissions VALUES('214','1');
INSERT INTO role_has_permissions VALUES('215','1');
INSERT INTO role_has_permissions VALUES('216','1');
INSERT INTO role_has_permissions VALUES('217','1');
INSERT INTO role_has_permissions VALUES('217','4');
INSERT INTO role_has_permissions VALUES('218','1');
INSERT INTO role_has_permissions VALUES('218','4');
INSERT INTO role_has_permissions VALUES('219','1');
INSERT INTO role_has_permissions VALUES('219','4');
INSERT INTO role_has_permissions VALUES('220','1');
INSERT INTO role_has_permissions VALUES('220','4');



DROP TABLE IF EXISTS roles;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO roles VALUES('1','Admin','web','','','0');
INSERT INTO roles VALUES('2','Principal','web','','','0');
INSERT INTO roles VALUES('3','Teacher','web','','','0');
INSERT INTO roles VALUES('4','Accountant','web','','','0');
INSERT INTO roles VALUES('5','Receptionist','web','','','0');
INSERT INTO roles VALUES('6','Lab Incharge','web','','','0');
INSERT INTO roles VALUES('7','Sports Teacher','web','','','0');
INSERT INTO roles VALUES('8','Peon','web','','','0');
INSERT INTO roles VALUES('9','Gardener','web','','','0');
INSERT INTO roles VALUES('10','Driver','web','','','0');
INSERT INTO roles VALUES('11','Student','web','','','0');



DROP TABLE IF EXISTS routines;

CREATE TABLE `routines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `classroom_id` tinyint(3) unsigned NOT NULL,
  `section_id` tinyint(3) unsigned NOT NULL,
  `routine_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `routines_post_by_foreign` (`post_by`),
  KEY `routines_verified_by_foreign` (`verified_by`),
  KEY `routines_classroom_id_foreign` (`classroom_id`),
  KEY `routines_section_id_foreign` (`section_id`),
  CONSTRAINT `routines_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  CONSTRAINT `routines_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `routines_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  CONSTRAINT `routines_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS scholarship_items;

CREATE TABLE `scholarship_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` tinyint(3) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `fee_type_id` int(10) unsigned NOT NULL,
  `percentage` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `scholarship_items_session_id_foreign` (`session_id`),
  KEY `scholarship_items_student_id_foreign` (`student_id`),
  KEY `scholarship_items_fee_type_id_foreign` (`fee_type_id`),
  KEY `scholarship_items_post_by_foreign` (`post_by`),
  KEY `scholarship_items_verified_by_foreign` (`verified_by`),
  CONSTRAINT `scholarship_items_fee_type_id_foreign` FOREIGN KEY (`fee_type_id`) REFERENCES `fee_types` (`id`),
  CONSTRAINT `scholarship_items_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `scholarship_items_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `academics_years` (`id`),
  CONSTRAINT `scholarship_items_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  CONSTRAINT `scholarship_items_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO scholarship_items VALUES('4','1','9','1','100','','1','0','','1','','2019-05-24 08:47:21','2019-05-24 08:47:21','0');
INSERT INTO scholarship_items VALUES('5','1','9','2','100','','1','0','','1','','2019-05-24 08:47:21','2019-05-24 08:47:21','0');
INSERT INTO scholarship_items VALUES('6','1','9','3','100','','1','0','','1','','2019-05-24 08:47:21','2019-05-24 08:47:21','0');
INSERT INTO scholarship_items VALUES('7','1','9','4','100','','1','0','','1','','2019-05-24 08:47:21','2019-05-24 08:47:21','0');
INSERT INTO scholarship_items VALUES('8','1','9','11','100','','1','0','','1','','2019-05-24 08:47:21','2019-05-24 08:47:21','0');
INSERT INTO scholarship_items VALUES('9','1','16','9','100','','1','0','','1','','2019-05-24 09:13:24','2019-05-24 09:13:24','0');
INSERT INTO scholarship_items VALUES('10','1','7','9','100','','1','0','','1','','2019-05-28 06:17:56','2019-05-28 06:17:56','0');
INSERT INTO scholarship_items VALUES('11','1','7','10','100','','1','0','','1','','2019-05-28 06:17:56','2019-05-28 06:17:56','0');
INSERT INTO scholarship_items VALUES('12','1','7','11','100','','1','0','','1','','2019-05-28 06:17:56','2019-05-28 06:17:56','0');



DROP TABLE IF EXISTS sections;

CREATE TABLE `sections` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classroom_id` tinyint(3) unsigned NOT NULL,
  `session_id` tinyint(3) unsigned NOT NULL,
  `capacity` int(11) NOT NULL,
  `class_teacher_id` int(10) unsigned DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sections_classroom_id_foreign` (`classroom_id`),
  KEY `sections_session_id_foreign` (`session_id`),
  KEY `sections_class_teacher_id_foreign` (`class_teacher_id`),
  KEY `sections_post_by_foreign` (`post_by`),
  KEY `sections_verified_by_foreign` (`verified_by`),
  CONSTRAINT `sections_class_teacher_id_foreign` FOREIGN KEY (`class_teacher_id`) REFERENCES `staffs` (`id`) ON DELETE SET NULL,
  CONSTRAINT `sections_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sections_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `sections_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `academics_years` (`id`),
  CONSTRAINT `sections_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO sections VALUES('1','Default','1','1','50','5','1','','1','0','','1','','2019-05-23 05:10:58','2019-05-29 06:29:00','0');
INSERT INTO sections VALUES('2','Default','2','1','50','','1','','1','0','','1','','2019-05-29 06:38:49','2019-05-29 06:38:49','0');



DROP TABLE IF EXISTS settings;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO settings VALUES('1','school_name','Saral Siksha','2019-05-23 02:52:02','2019-05-27 06:00:08','0');
INSERT INTO settings VALUES('2','site_title','saralsiksha','2019-05-23 02:52:02','2019-05-23 02:52:02','0');
INSERT INTO settings VALUES('3','school_phone','9860335848','2019-05-23 02:52:02','2019-05-23 02:52:02','0');
INSERT INTO settings VALUES('4','school_email','saralsiksha@gmail.com','2019-05-23 02:52:02','2019-05-27 06:00:08','0');
INSERT INTO settings VALUES('5','pan_no','985763632','2019-05-23 02:52:03','2019-05-23 02:52:02','0');
INSERT INTO settings VALUES('6','currency_symbol','$','2019-05-23 02:52:03','2019-05-23 02:52:03','0');
INSERT INTO settings VALUES('7','data_color','azure','2019-05-23 02:52:03','2019-05-23 02:52:03','0');
INSERT INTO settings VALUES('8','data_background_color','black','2019-05-23 02:52:03','2019-05-23 02:52:03','0');
INSERT INTO settings VALUES('9','net_profit','0','2019-05-23 02:52:03','2019-05-23 02:52:03','0');
INSERT INTO settings VALUES('10','net_loss','0','2019-05-23 02:52:03','2019-05-23 02:52:03','0');
INSERT INTO settings VALUES('11','background_image','','2019-05-23 02:52:03','2019-05-23 02:52:03','0');
INSERT INTO settings VALUES('12','logo','public/Ay6yNZJQrnTNE8shf7oWmvpk1mWyyBnCSfUdCKzG.jpeg','2019-05-27 06:00:08','2019-05-27 06:00:08','0');
INSERT INTO settings VALUES('13','_method','PUT','2019-05-27 06:00:08','2019-05-27 06:00:08','0');
INSERT INTO settings VALUES('14','short_name','Mount','2019-05-27 06:00:08','2019-05-27 06:00:08','0');
INSERT INTO settings VALUES('15','tagline','Education For Peace And Prosperity','2019-05-27 06:00:08','2019-05-27 06:00:08','0');
INSERT INTO settings VALUES('16','phone','9860335848','2019-05-27 06:00:08','2019-05-27 06:00:08','0');
INSERT INTO settings VALUES('17','school_address','Dhangadi, Nepal','2019-05-27 06:00:08','2019-05-27 06:00:08','0');
INSERT INTO settings VALUES('18','establish_date','2050','2019-05-27 06:00:08','2019-05-27 06:00:08','0');
INSERT INTO settings VALUES('19','fb_link','','2019-05-27 06:00:08','2019-05-27 06:00:08','0');
INSERT INTO settings VALUES('20','twitter_link','','2019-05-27 06:00:08','2019-05-27 06:00:08','0');
INSERT INTO settings VALUES('21','instagram_link','','2019-05-27 06:00:08','2019-05-27 06:00:08','0');
INSERT INTO settings VALUES('22','linkedin_link','','2019-05-27 06:00:08','2019-05-27 06:00:08','0');
INSERT INTO settings VALUES('23','principal_voice','','2019-05-27 06:00:08','2019-05-27 06:00:08','0');



DROP TABLE IF EXISTS staff_attendances;

CREATE TABLE `staff_attendances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `attendance` int(11) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `staff_attendances_staff_id_foreign` (`staff_id`),
  KEY `staff_attendances_post_by_foreign` (`post_by`),
  KEY `staff_attendances_verified_by_foreign` (`verified_by`),
  CONSTRAINT `staff_attendances_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `staff_attendances_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`id`),
  CONSTRAINT `staff_attendances_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS staffs;

CREATE TABLE `staffs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temporary_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizenship_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizenship_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_middle_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_occupation` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_middle_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_occupation` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci,
  `joining_date` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation_id` tinyint(3) unsigned NOT NULL,
  `department_id` tinyint(3) unsigned NOT NULL,
  `higher_education_degree` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_duration` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_to_leave` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_duration` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_institution_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  `is_activated` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `staffs_staff_id_unique` (`staff_id`),
  KEY `staffs_user_id_foreign` (`user_id`),
  KEY `staffs_designation_id_foreign` (`designation_id`),
  KEY `staffs_department_id_foreign` (`department_id`),
  KEY `staffs_post_by_foreign` (`post_by`),
  KEY `staffs_verified_by_foreign` (`verified_by`),
  CONSTRAINT `staffs_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  CONSTRAINT `staffs_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`),
  CONSTRAINT `staffs_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `staffs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `staffs_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO staffs VALUES('1','37','Udaya','','Joshi','1984-04-24','Male','Kathmandu','Dahngadi','Nepal','1234567890987654321','','','9860464445','9860464445','admin@turingsoft.com','Single','Ms','','Rsn','9860464445','9860464445','','Ms','','Rsn','9860464445','9860464445','','A-','','2019-Mar-06','hr2019-1','10','1','Master in human science','1','Khwopa medical college','Tarkaribajar ,banepa','ms rsn','tarkaribajar ,banepa','9','domination by seniors\"','','','','1','','1','0','','1','','2019-05-23 07:24:12','2019-05-23 07:24:12','0','1');
INSERT INTO staffs VALUES('2','38','Regan','','Joshi','1989-02-01','Male','','tarkaribajar ,banepa','Nepal','1234567890987654321','','','9860464445','9860464445','principal@turingsoft.com','Single','ms','','rsn','9860464445','9860464445','','ms','','rsn','9860464445','9860464445','','A+','','2019-Mar-06','hr2019-2','9','1','slc','1','shree kalidevi school','sindhupalchowk','little angle school','hattiban','3 months','salary\"','','','','1','','1','0','','1','','2019-05-23 07:24:13','2019-05-23 07:24:13','0','1');
INSERT INTO staffs VALUES('3','39','Krishna','Prasad','Sharma','1990-12-24','Male','Kathmandu','Lalitpur','Nepali','1234567890987654321','','','','9843498012','account@turingsoft.com','Married','ms','Ram','Sharma','9860464445','9860464545','Government Officer','Radhika','Kumari','Sharma','','9808409971','House Wife','A+','','2019-Mar-21','hr2019-3','1','1','B.E','2','Khwopa Engineering College','Libali, Bhaktapur','','','','','','','','1','','1','0','','1','','2019-05-23 07:24:13','2019-05-23 07:24:13','0','1');
INSERT INTO staffs VALUES('4','40','Sonia','','Sakya','1990-04-23','Female','Tarkaribajar ,banepa','Tarkaribajar ,banepa','Nepal','1234567890987654321','','','9860464445','9860464445','receptionist@turingsoft.com','Single','Ms','','Rsn','9860464445','9860464445','','Ms','','Rsn','9860464445','9860464445','','A+','','2019-Apr-12','hr2019-4','4','1','MA','2','Trichandra Multiple Campus','Ratnapark','','','','','','','','1','','1','0','','1','','2019-05-23 07:24:13','2019-05-23 07:24:13','0','1');
INSERT INTO staffs VALUES('5','41','Bikash','','Katuwal','1993-01-25','Male','tarkaribajar ,banepa','tarkaribajar ,banepa','Nepal','1234567890987654321','','','9860464445','9860464445','teacher@turingsoft.com','Single','Ram','Bahadur','Bumjan','9860464445','9860464445','','Laxmi','','Katuwal','9860464445','9860464445','','O+','','2019-Apr-12','hr2019-5','2','1','BSc.','1','Patan Multiple College','Patan Dhoka','','','','','','','','1','','1','0','','1','','2019-05-23 07:24:13','2019-05-23 07:24:13','0','1');
INSERT INTO staffs VALUES('6','42','Kaji','Prasad','Ojha','1985-12-23','Male','Kathmandu','Birtamod, Jhapa','Nepal','1234567890987654321','','','9860464445','9860464445','student@turingsoft.com','Single','Depak','Kumar','Ojha','9860464445','9860464445','','Gita','Laxmi','Ojha','9860464445','9860464445','','AB+','','2019-Apr-12','hr2019-6','3','1','MBS','1','Tribhuban University','Kritipur','','','','','','','','1','','1','0','','1','','2019-05-23 07:24:14','2019-05-23 07:24:14','0','1');



DROP TABLE IF EXISTS student_attendances;

CREATE TABLE `student_attendances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` tinyint(3) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `classroom_id` tinyint(3) unsigned NOT NULL,
  `section_id` tinyint(3) unsigned NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendance` int(11) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `student_attendances_session_id_foreign` (`session_id`),
  KEY `student_attendances_student_id_foreign` (`student_id`),
  KEY `student_attendances_classroom_id_foreign` (`classroom_id`),
  KEY `student_attendances_section_id_foreign` (`section_id`),
  KEY `student_attendances_post_by_foreign` (`post_by`),
  KEY `student_attendances_verified_by_foreign` (`verified_by`),
  CONSTRAINT `student_attendances_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  CONSTRAINT `student_attendances_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `student_attendances_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  CONSTRAINT `student_attendances_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `academics_years` (`id`),
  CONSTRAINT `student_attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  CONSTRAINT `student_attendances_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS student_groups;

CREATE TABLE `student_groups` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `student_groups_post_by_foreign` (`post_by`),
  KEY `student_groups_verified_by_foreign` (`verified_by`),
  CONSTRAINT `student_groups_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `student_groups_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS student_payments;

CREATE TABLE `student_payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(10) unsigned NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `student_payments_invoice_id_foreign` (`invoice_id`),
  KEY `student_payments_post_by_foreign` (`post_by`),
  KEY `student_payments_verified_by_foreign` (`verified_by`),
  CONSTRAINT `student_payments_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  CONSTRAINT `student_payments_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `student_payments_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO student_payments VALUES('1','2','2019-05-23','2500.00','','1','1','0','','1','','2019-05-23 11:16:11','2019-05-23 11:16:11','0');
INSERT INTO student_payments VALUES('2','12','2019-05-23','2500.00','','1','1','0','','1','','2019-05-23 11:16:11','2019-05-23 11:16:11','0');
INSERT INTO student_payments VALUES('3','22','2019-05-23','7000.00','','1','1','0','','1','','2019-05-23 11:16:12','2019-05-23 11:16:12','0');



DROP TABLE IF EXISTS student_sessions;

CREATE TABLE `student_sessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` tinyint(3) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `classroom_id` tinyint(3) unsigned NOT NULL,
  `section_id` tinyint(3) unsigned NOT NULL,
  `roll` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `student_sessions_session_id_foreign` (`session_id`),
  KEY `student_sessions_student_id_foreign` (`student_id`),
  KEY `student_sessions_classroom_id_foreign` (`classroom_id`),
  KEY `student_sessions_section_id_foreign` (`section_id`),
  KEY `student_sessions_post_by_foreign` (`post_by`),
  KEY `student_sessions_verified_by_foreign` (`verified_by`),
  CONSTRAINT `student_sessions_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  CONSTRAINT `student_sessions_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `student_sessions_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  CONSTRAINT `student_sessions_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `academics_years` (`id`),
  CONSTRAINT `student_sessions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  CONSTRAINT `student_sessions_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO student_sessions VALUES('1','1','7','1','1','stu2019One-1','','1','0','','1','','2019-05-23 07:19:49','2019-05-23 07:19:49','0');
INSERT INTO student_sessions VALUES('2','1','8','1','1','stu2019One-2','','1','0','','1','','2019-05-23 07:19:49','2019-05-23 07:19:49','0');
INSERT INTO student_sessions VALUES('3','1','9','1','1','stu2019One-3','','1','0','','1','','2019-05-23 07:19:49','2019-05-23 07:19:49','0');
INSERT INTO student_sessions VALUES('4','1','10','1','1','stu2019One-4','','1','0','','1','','2019-05-23 07:19:50','2019-05-23 07:19:50','0');
INSERT INTO student_sessions VALUES('5','1','11','1','1','stu2019One-5','','1','0','','1','','2019-05-23 07:19:50','2019-05-23 07:19:50','0');
INSERT INTO student_sessions VALUES('6','1','12','1','1','stu2019One-6','','1','0','','1','','2019-05-23 07:19:50','2019-05-23 07:19:50','0');
INSERT INTO student_sessions VALUES('7','1','13','1','1','stu2019One-7','','1','0','','1','','2019-05-23 07:19:50','2019-05-23 07:19:50','0');
INSERT INTO student_sessions VALUES('8','1','14','1','1','stu2019One-8','','1','0','','1','','2019-05-23 07:19:51','2019-05-23 07:19:51','0');
INSERT INTO student_sessions VALUES('9','1','15','1','1','stu2019One-9','','1','0','','1','','2019-05-23 07:19:51','2019-05-23 07:19:51','0');
INSERT INTO student_sessions VALUES('10','1','16','1','1','stu2019One-10','','1','0','','1','','2019-05-23 07:19:51','2019-05-23 07:19:51','0');
INSERT INTO student_sessions VALUES('11','1','17','1','1','stu2019One-11','','1','0','','1','','2019-05-27 10:44:46','2019-05-27 10:44:46','0');
INSERT INTO student_sessions VALUES('12','1','18','1','1','stu2019One-12','','1','0','','1','','2019-05-27 10:44:46','2019-05-27 10:44:46','0');
INSERT INTO student_sessions VALUES('13','1','19','1','1','stu2019One-13','','1','0','','1','','2019-05-27 10:44:46','2019-05-27 10:44:46','0');
INSERT INTO student_sessions VALUES('14','1','20','1','1','stu2019One-14','','1','0','','1','','2019-05-27 10:44:46','2019-05-27 10:44:46','0');
INSERT INTO student_sessions VALUES('15','1','21','1','1','stu2019One-15','','1','0','','1','','2019-05-27 10:44:47','2019-05-27 10:44:47','0');
INSERT INTO student_sessions VALUES('16','1','22','1','1','stu2019One-16','','1','0','','1','','2019-05-27 10:44:47','2019-05-27 10:44:47','0');
INSERT INTO student_sessions VALUES('17','1','23','1','1','stu2019One-17','','1','0','','1','','2019-05-27 10:44:47','2019-05-27 10:44:47','0');
INSERT INTO student_sessions VALUES('18','1','24','1','1','stu2019One-18','','1','0','','1','','2019-05-27 10:44:47','2019-05-27 10:44:47','0');
INSERT INTO student_sessions VALUES('19','1','25','1','1','stu2019One-19','','1','0','','1','','2019-05-27 10:44:47','2019-05-27 10:44:47','0');
INSERT INTO student_sessions VALUES('20','1','26','1','1','stu2019One-20','','1','0','','1','','2019-05-27 10:44:48','2019-05-27 10:44:48','0');
INSERT INTO student_sessions VALUES('21','1','27','1','1','stu2019One-21','','1','0','','1','','2019-05-27 10:44:48','2019-05-27 10:44:48','0');
INSERT INTO student_sessions VALUES('22','1','28','1','1','stu2019One-22','','1','0','','1','','2019-05-27 10:44:48','2019-05-27 10:44:48','0');
INSERT INTO student_sessions VALUES('23','1','29','1','1','stu2019One-23','','1','0','','1','','2019-05-27 10:44:48','2019-05-27 10:44:48','0');
INSERT INTO student_sessions VALUES('24','1','30','1','1','stu2019One-24','','1','0','','1','','2019-05-27 10:44:48','2019-05-27 10:44:48','0');
INSERT INTO student_sessions VALUES('25','1','31','1','1','stu2019One-25','','1','0','','1','','2019-05-27 10:44:49','2019-05-27 10:44:49','0');
INSERT INTO student_sessions VALUES('26','1','32','1','1','stu2019One-26','','1','0','','1','','2019-05-27 10:44:49','2019-05-27 10:44:49','0');
INSERT INTO student_sessions VALUES('27','1','33','1','1','stu2019One-27','','1','0','','1','','2019-05-27 10:44:49','2019-05-27 10:44:49','0');
INSERT INTO student_sessions VALUES('28','1','34','1','1','stu2019One-28','','1','0','','1','','2019-05-27 10:44:49','2019-05-27 10:44:49','0');
INSERT INTO student_sessions VALUES('29','1','35','1','1','stu2019One-29','','1','0','','1','','2019-05-27 10:44:49','2019-05-27 10:44:49','0');
INSERT INTO student_sessions VALUES('30','1','36','1','1','stu2019One-30','','1','0','','1','','2019-05-27 10:44:50','2019-05-27 10:44:50','0');
INSERT INTO student_sessions VALUES('31','1','37','1','1','stu2019One-31','','1','0','','1','','2019-05-27 10:44:50','2019-05-27 10:44:50','0');
INSERT INTO student_sessions VALUES('32','1','38','1','1','stu2019One-32','','1','0','','1','','2019-05-27 10:44:50','2019-05-27 10:44:50','0');
INSERT INTO student_sessions VALUES('33','1','39','1','1','stu2019One-33','','1','0','','1','','2019-05-27 10:44:50','2019-05-27 10:44:50','0');
INSERT INTO student_sessions VALUES('34','1','40','1','1','stu2019One-34','','1','0','','1','','2019-05-27 10:44:50','2019-05-27 10:44:50','0');
INSERT INTO student_sessions VALUES('35','1','41','1','1','stu2019One-35','','1','0','','1','','2019-05-27 10:44:50','2019-05-27 10:44:50','0');
INSERT INTO student_sessions VALUES('36','1','42','1','1','stu2019One-36','','1','0','','1','','2019-05-27 10:44:51','2019-05-27 10:44:51','0');
INSERT INTO student_sessions VALUES('37','1','43','1','1','stu2019One-37','','1','0','','1','','2019-05-27 10:44:51','2019-05-27 10:44:51','0');
INSERT INTO student_sessions VALUES('38','1','44','1','1','stu2019One-38','','1','0','','1','','2019-05-27 10:44:51','2019-05-27 10:44:51','0');
INSERT INTO student_sessions VALUES('39','1','45','1','1','stu2019One-39','','1','0','','1','','2019-05-27 10:44:51','2019-05-27 10:44:51','0');
INSERT INTO student_sessions VALUES('40','1','46','1','1','stu2019One-40','','1','0','','1','','2019-05-27 10:44:51','2019-05-27 10:44:51','0');
INSERT INTO student_sessions VALUES('41','1','47','1','1','stu2019One-41','','1','0','','1','','2019-05-27 10:44:52','2019-05-27 10:44:52','0');
INSERT INTO student_sessions VALUES('42','1','48','1','1','stu2019One-42','','1','0','','1','','2019-05-27 10:44:52','2019-05-27 10:44:52','0');
INSERT INTO student_sessions VALUES('43','1','49','1','1','stu2019One-43','','1','0','','1','','2019-05-27 10:44:52','2019-05-27 10:44:52','0');
INSERT INTO student_sessions VALUES('44','1','50','1','1','stu2019One-44','','1','0','','1','','2019-05-27 10:44:52','2019-05-27 10:44:52','0');
INSERT INTO student_sessions VALUES('45','1','51','1','1','stu2019One-45','','1','0','','1','','2019-05-27 10:44:52','2019-05-27 10:44:52','0');
INSERT INTO student_sessions VALUES('46','1','52','1','1','stu2019One-46','','1','0','','1','','2019-05-27 10:44:52','2019-05-27 10:44:52','0');
INSERT INTO student_sessions VALUES('47','1','53','1','1','stu2019One-47','','1','0','','1','','2019-05-27 10:44:52','2019-05-27 10:44:52','0');
INSERT INTO student_sessions VALUES('48','1','54','1','1','stu2019One-48','','1','0','','1','','2019-05-27 10:44:53','2019-05-27 10:44:53','0');
INSERT INTO student_sessions VALUES('49','1','55','1','1','stu2019One-49','','1','0','','1','','2019-05-27 10:44:53','2019-05-27 10:44:53','0');



DROP TABLE IF EXISTS students;

CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temporary_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci,
  `height` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_middle_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_occupation` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_middle_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_occupation` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_middle_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_relation` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_temporary_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_permanent_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_occupation` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_school_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_class` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_school_address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_school_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_school_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route_id` int(10) unsigned DEFAULT NULL,
  `percentage` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scholarship_in` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siblings` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_date` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roll_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` tinyint(3) unsigned NOT NULL,
  `classroom_id` tinyint(3) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_roll_no_unique` (`roll_no`),
  KEY `students_user_id_foreign` (`user_id`),
  KEY `students_route_id_foreign` (`route_id`),
  KEY `students_section_id_foreign` (`section_id`),
  KEY `students_classroom_id_foreign` (`classroom_id`),
  KEY `students_post_by_foreign` (`post_by`),
  KEY `students_verified_by_foreign` (`verified_by`),
  CONSTRAINT `students_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  CONSTRAINT `students_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `students_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `transport_routes` (`id`) ON DELETE SET NULL,
  CONSTRAINT `students_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `students_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO students VALUES('7','27','Sahas','','Dangol','1995-11-19','Male','','Lubhoo','Nepali','Hindu','','A+','','5ft','5ft','Santa','Ram','Dangol','','9860124365','Government officer','','Radhika','Devi','Shrestha','','9841414141','Housewife','','Santa','Ram','Dangol','father','','','9860124365','','Lubhoo','Government officer','','Shree lubhoo ma. Vi.','N/a','A','','Kathmandu','','none','1','100','','','','','','stu2019One-1','','1','1','1','','1','0','','1','','2019-05-23 07:19:49','2019-05-24 07:35:02','0');
INSERT INTO students VALUES('8','28','Rikesh','','Shrestha','2019-12-25','male','','ramechap','nepali','hindu','','A+','','5ft','70','Ram','Bahadur','Shrestha','','9860124366','teacher','','sita','','shrestha','','9841414142','housewife','','ram','','shrestha','father','','','9860124366','','ramechap','teacher','','n/a','n/a','A','','sindhupalchowk','none','none','','','','','1','','','stu2019One-2','','1','1','1','','1','0','','1','','2019-05-23 07:19:49','2019-05-23 07:19:49','0');
INSERT INTO students VALUES('9','29','Susan','','Thapa','1993-07-18','Male','','Bhaktapur','Nepali','Hindu','','B+','','5ft','5ft','Hari','','Thapa','','9860124367','Lecturer','','Geet','','Thapa','','9841414143','Teacher','','Hari','','Thapa','father','','','9860124367','','Bhaktapur','Lecturer','','NJES','N/A','B','','Bhaktapur','','none','','100','','','','','','stu2019One-3','','1','1','1','','1','0','','1','','2019-05-23 07:19:49','2019-05-24 08:47:21','0');
INSERT INTO students VALUES('10','30','Ram ','','Shrestha','1992-11-16','male','','thimi','nepali','hindu','','A+','','5ft','72','rajan','','Shrestha','','9860124368','government officer','','bina','','shrestha','','9841414144','bussiness','','shyam','','shrestha','father','','','9860124368','','thimi','','','glad stone academy','N/A','C','','thimi','none','none','','','','','1','','','stu2019One-4','','1','1','1','','1','0','','1','','2019-05-23 07:19:50','2019-05-23 07:19:50','0');
INSERT INTO students VALUES('11','31','geeta','','chettri','1991-12-26','female','','kathmandu','nepali','buddhist','','O-','','4ft','55','gagan','','chettri','','9860124369','officer','','deepa','','chettri','','9841414145','housewife','','shyam','','shrestha','father','','','9860124369','','thimi','','','nawaratna','playgroup','A','','kathmandu','none','none','','','','','0','','','stu2019One-5','','1','1','1','','1','0','','1','','2019-05-23 07:19:50','2019-05-23 07:19:50','0');
INSERT INTO students VALUES('12','32','sweta','','hada','1992-05-17','female','','lalitpur','nepali','hindu','','O+','','4ft','50','sunil','','hada','','9860124370','police officer','','sunita','','hada','','9841414146','teacher','','shyam','','shrestha','father','','','9860124370','','thimi','','','adarsha school','playgroup','A','','thimi','none','none','','','','','0','','','stu2019One-6','','1','1','1','','1','0','','1','','2019-05-23 07:19:50','2019-05-23 07:19:50','0');
INSERT INTO students VALUES('13','33','harish','','joshi','1993-12-26','male','','chitwan','nepali','hindu','','A+','','5ft','75','george','','joshi','','9860124371','lecturer','','geet','','joshi','','9841414147','bussiness','','sugam','','joshi','father','','','9860124371','','thimi','','','bal bikas','N/A','A','','chitwan','none','none','','','','','1','','','stu2019One-7','','1','1','1','','1','0','','1','','2019-05-23 07:19:50','2019-05-23 07:19:50','0');
INSERT INTO students VALUES('14','34','sudip','','bala','1992-08-18','male','','bhaktapur','nepali','hindu','','B-','','5ft','65','sugan','','bala','','9860124372','bussinessman','','sudha','','bala','','9841414148','housewife','','sagun','','bala','father','','','9860124372','','thimi','','','khwopa','playgroup','C','','banepa','none','none','','','','','2','','','stu2019One-8','','1','1','1','','1','0','','1','','2019-05-23 07:19:51','2019-05-23 07:19:51','0');
INSERT INTO students VALUES('15','35','sushant','','prajapati','1993-11-24','male','','patan','nepali','hindu','','A+','','5ft','68','bisnu','','prajapati','','9860124373','teacher','','maiya','','prajapati','','9841414149','housewife','','sagun','','bala','father','','','9860124373','','thimi','','','lal batika','playgroup','A','','sanepa','none','none','','','','','0','','','stu2019One-9','','1','1','1','','1','0','','1','','2019-05-23 07:19:51','2019-05-23 07:19:51','0');
INSERT INTO students VALUES('16','36','Dinesh','','Bhandari','1990-04-16','Male','','Pokhara','Nepali','Hindu','','A+','','5ft','5ft','Bishal','','Bhandari','','9860124374','Teacher','','Jiavni','','Bhandari','','9841414150','Teacher','','Bishal','','Bhandari','father','','','9860124374','','Thimi','Teacher','','Naulojyoti','Playgroup','A','','Hetauda','','none','','100','','','','','','stu2019One-10','','1','1','1','','1','0','','1','','2019-05-23 07:19:51','2019-05-24 09:13:24','0');
INSERT INTO students VALUES('17','43','Amar','','Dangol','1995-11-19','male','','lubhoo','nepali','christian','','N/A','','N/A','N/A','Santa','Ram','Dangol','','9818001002','police officer','','radhika','devi','shrestha','','','waiter','','santa','ram','dangol','father','','','9818001002','','lubhoo','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-11','','1','1','1','','1','0','','1','','2019-05-27 10:44:46','2019-05-27 10:44:46','0');
INSERT INTO students VALUES('18','44','amrita','','Shrestha','2019-12-25','female','','ramechap','nepali','christian','','N/A','','N/A','N/A','Ram','Bahadur','Shrestha','','9818001003','teacher','','sita','','shrestha','','','Army','','ram','','shrestha','father','','','9818001003','','ramechap','teacher','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-12','','1','1','1','','1','0','','1','','2019-05-27 10:44:46','2019-05-27 10:44:46','0');
INSERT INTO students VALUES('19','45','Robin','','thapa','1993-07-18','male','','bhaktapur','nepali','christian','','N/A','','N/A','N/A','hari','','thapa','','9818001004','lecturer','','geet','','thapa','','','teacher','','sita','','thapa','father','','','9818001004','','bhaktapur','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-13','','1','1','1','','1','0','','1','','2019-05-27 10:44:46','2019-05-27 10:44:46','0');
INSERT INTO students VALUES('20','46','Pujan','','Shrestha','1992-11-16','male','','thimi','nepali','christian','','N/A','','N/A','N/A','rajan','','Shrestha','','9818001005','government officer','','bina','','shrestha','','','bussiness','','shyam','','shrestha','father','','','9818001005','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-14','','1','1','1','','1','0','','1','','2019-05-27 10:44:46','2019-05-27 10:44:46','0');
INSERT INTO students VALUES('21','47','samar','','chettri','1991-12-26','male','','kathmandu','nepali','christian','','N/A','','N/A','N/A','gagan','','chettri','','9818001006','officer','','deepa','','chettri','','','housewife','','shyam','','shrestha','father','','','9818001006','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-15','','1','1','1','','1','0','','1','','2019-05-27 10:44:47','2019-05-27 10:44:47','0');
INSERT INTO students VALUES('22','48','amir','','hada','1992-05-17','male','','lalitpur','nepali','christian','','N/A','','N/A','N/A','sunil','','hada','','9818001007','police officer','','sunita','','hada','','','teacher','','shyam','','shrestha','father','','','9818001007','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-16','','1','1','1','','1','0','','1','','2019-05-27 10:44:47','2019-05-27 10:44:47','0');
INSERT INTO students VALUES('23','49','bivash','','joshi','1993-12-26','male','','chitwan','nepali','christian','','N/A','','N/A','N/A','george','','joshi','','9818001008','lecturer','','geet','','joshi','','','bussiness','','sugam','','joshi','father','','','9818001008','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-17','','1','1','1','','1','0','','1','','2019-05-27 10:44:47','2019-05-27 10:44:47','0');
INSERT INTO students VALUES('24','50','biplov','','bala','1992-08-18','male','','bhaktapur','nepali','christian','','N/A','','N/A','N/A','sugan','','bala','','9818001009','bussinessman','','sudha','','bala','','','housewife','','sagun','','bala','father','','','9818001009','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-18','','1','1','1','','1','0','','1','','2019-05-27 10:44:47','2019-05-27 10:44:47','0');
INSERT INTO students VALUES('25','51','nomad','','prajapati','1993-11-24','male','','patan','nepali','christian','','N/A','','N/A','N/A','bisnu','','prajapati','','9818001010','teacher','','maiya','','prajapati','','','housewife','','sagun','','bala','father','','','9818001010','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-19','','1','1','1','','1','0','','1','','2019-05-27 10:44:47','2019-05-27 10:44:47','0');
INSERT INTO students VALUES('26','52','vijay','','bhandari','1990-04-16','male','','pokhara','nepali','christian','','N/A','','N/A','N/A','bishal','','bhandari','','9818001011','teacher','','jiavni','','bhandari','','','teacher','','rita','bhandari','bala','father','','','9818001011','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-20','','1','1','1','','1','0','','1','','2019-05-27 10:44:48','2019-05-27 10:44:48','0');
INSERT INTO students VALUES('27','53','sarthak','','bhandari','1990-04-16','male','','pokhara','nepali','christian','','N/A','','N/A','N/A','bishal','','bhandari','','9818001012','teacher','','jiavni','','bhandari','','','teacher','','rita','bhandari','bala','father','','','9818001012','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-21','','1','1','1','','1','0','','1','','2019-05-27 10:44:48','2019-05-27 10:44:48','0');
INSERT INTO students VALUES('28','54','prabal','','Dangol','1995-11-20','male','','lubhoo','nepali','christian','','N/A','','N/A','N/A','Santa','Ram','Dangol','','9818001013','police officer','','radhika','devi','shrestha','','','waiter','','santa','','dangol','father','','','9818001013','','lubhoo','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-22','','1','1','1','','1','0','','1','','2019-05-27 10:44:48','2019-05-27 10:44:48','0');
INSERT INTO students VALUES('29','55','sohil','','Shrestha','2019-12-26','female','','ramechap','nepali','christian','','N/A','','N/A','N/A','Ram','Bahadur','Shrestha','','9818001014','teacher','','sita','','shrestha','','','Army','','ram','','shrestha','father','','','9818001014','','ramechap','teacher','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-23','','1','1','1','','1','0','','1','','2019-05-27 10:44:48','2019-05-27 10:44:48','0');
INSERT INTO students VALUES('30','56','yogesh','','thapa','1993-07-19','male','','bhaktapur','nepali','christian','','N/A','','N/A','N/A','hari','','thapa','','9818001015','lecturer','','geet','','thapa','','','teacher','','sita','','thapa','father','','','9818001015','','bhaktapur','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-24','','1','1','1','','1','0','','1','','2019-05-27 10:44:48','2019-05-27 10:44:48','0');
INSERT INTO students VALUES('31','57','anamika','','Shrestha','1992-11-17','male','','thimi','nepali','christian','','N/A','','N/A','N/A','rajan','','Shrestha','','9818001016','government officer','','bina','','shrestha','','','bussiness','','shyam','','shrestha','father','','','9818001016','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-25','','1','1','1','','1','0','','1','','2019-05-27 10:44:49','2019-05-27 10:44:49','0');
INSERT INTO students VALUES('32','58','yama','','chettri','1991-12-27','male','','kathmandu','nepali','christian','','N/A','','N/A','N/A','gagan','','chettri','','9818001017','officer','','deepa','','chettri','','','housewife','','shyam','','shrestha','father','','','9818001017','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-26','','1','1','1','','1','0','','1','','2019-05-27 10:44:49','2019-05-27 10:44:49','0');
INSERT INTO students VALUES('33','59','sanam','','hada','1992-05-18','male','','lalitpur','nepali','christian','','N/A','','N/A','N/A','sunil','','hada','','9818001018','police officer','','sunita','','hada','','','teacher','','shyam','','shrestha','father','','','9818001018','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-27','','1','1','1','','1','0','','1','','2019-05-27 10:44:49','2019-05-27 10:44:49','0');
INSERT INTO students VALUES('34','60','mangal','','joshi','1993-12-27','male','','chitwan','nepali','christian','','N/A','','N/A','N/A','george','','joshi','','9818001019','lecturer','','geet','','joshi','','','bussiness','','sugam','','joshi','father','','','9818001019','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-28','','1','1','1','','1','0','','1','','2019-05-27 10:44:49','2019-05-27 10:44:49','0');
INSERT INTO students VALUES('35','61','Amar','','bala','1992-08-19','male','','bhaktapur','nepali','christian','','N/A','','N/A','N/A','sugan','','bala','','9818001020','bussinessman','','sudha','','bala','','','housewife','','sagun','','bala','father','','','9818001020','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-29','','1','1','1','','1','0','','1','','2019-05-27 10:44:49','2019-05-27 10:44:49','0');
INSERT INTO students VALUES('36','62','amrita','','prajapati','1993-11-25','male','','patan','nepali','christian','','N/A','','N/A','N/A','bisnu','','prajapati','','9818001021','teacher','','maiya','','prajapati','','','housewife','','sagun','','bala','father','','','9818001021','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-30','','1','1','1','','1','0','','1','','2019-05-27 10:44:50','2019-05-27 10:44:50','0');
INSERT INTO students VALUES('37','63','Robin','','bhandari','1990-04-16','male','','pokhara','nepali','christian','','N/A','','N/A','N/A','bishal','','bhandari','','9818001022','teacher','','jiavni','','bhandari','','','teacher','','rita','','bala','father','','','9818001022','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-31','','1','1','1','','1','0','','1','','2019-05-27 10:44:50','2019-05-27 10:44:50','0');
INSERT INTO students VALUES('38','64','Pujan','','bhandari','1990-04-16','male','','pokhara','nepali','christian','','N/A','','N/A','N/A','bishal','','bhandari','','9818001023','teacher','','jiavni','','bhandari','','','teacher','','rita','','bala','father','','','9818001023','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-32','','1','1','1','','1','0','','1','','2019-05-27 10:44:50','2019-05-27 10:44:50','0');
INSERT INTO students VALUES('39','65','samar','','Dangol','1995-11-21','male','','lubhoo','nepali','christian','','N/A','','N/A','N/A','Santa','Ram','Dangol','','9818001024','police officer','','radhika','devi','shrestha','','','waiter','','santa','','dangol','father','','','9818001024','','lubhoo','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-33','','1','1','1','','1','0','','1','','2019-05-27 10:44:50','2019-05-27 10:44:50','0');
INSERT INTO students VALUES('40','66','amir','','Shrestha','2019-12-27','female','','ramechap','nepali','christian','','N/A','','N/A','N/A','Ram','Bahadur','Shrestha','','9818001025','teacher','','sita','','shrestha','','','Army','','ram','','shrestha','father','','','9818001025','','ramechap','teacher','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-34','','1','1','1','','1','0','','1','','2019-05-27 10:44:50','2019-05-27 10:44:50','0');
INSERT INTO students VALUES('41','67','bivash','','thapa','1993-07-20','male','','bhaktapur','nepali','christian','','N/A','','N/A','N/A','hari','','thapa','','9818001026','lecturer','','geet','','thapa','','','teacher','','sita','','thapa','father','','','9818001026','','bhaktapur','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-35','','1','1','1','','1','0','','1','','2019-05-27 10:44:50','2019-05-27 10:44:50','0');
INSERT INTO students VALUES('42','68','biplov','','Shrestha','1992-11-18','male','','thimi','nepali','christian','','N/A','','N/A','N/A','rajan','','Shrestha','','9818001027','government officer','','bina','','shrestha','','','bussiness','','shyam','','shrestha','father','','','9818001027','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-36','','1','1','1','','1','0','','1','','2019-05-27 10:44:51','2019-05-27 10:44:51','0');
INSERT INTO students VALUES('43','69','nomad','','chettri','1991-12-28','male','','kathmandu','nepali','christian','','N/A','','N/A','N/A','gagan','','chettri','','9818001028','officer','','deepa','','chettri','','','housewife','','shyam','','shrestha','father','','','9818001028','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-37','','1','1','1','','1','0','','1','','2019-05-27 10:44:51','2019-05-27 10:44:51','0');
INSERT INTO students VALUES('44','70','vijay','','hada','1992-05-19','male','','lalitpur','nepali','christian','','N/A','','N/A','N/A','sunil','','hada','','9818001029','police officer','','sunita','','hada','','','teacher','','shyam','','shrestha','father','','','9818001029','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-38','','1','1','1','','1','0','','1','','2019-05-27 10:44:51','2019-05-27 10:44:51','0');
INSERT INTO students VALUES('45','71','sarthak','','joshi','1993-12-28','male','','chitwan','nepali','christian','','N/A','','N/A','N/A','george','','joshi','','9818001030','lecturer','','geet','','joshi','','','bussiness','','sugam','','joshi','father','','','9818001030','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-39','','1','1','1','','1','0','','1','','2019-05-27 10:44:51','2019-05-27 10:44:51','0');
INSERT INTO students VALUES('46','72','prabal','','bala','1992-08-20','male','','bhaktapur','nepali','christian','','N/A','','N/A','N/A','sugan','','bala','','9818001031','bussinessman','','sudha','','bala','','','housewife','','sagun','','bala','father','','','9818001031','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-40','','1','1','1','','1','0','','1','','2019-05-27 10:44:51','2019-05-27 10:44:51','0');
INSERT INTO students VALUES('47','73','sohil','','prajapati','1993-11-26','male','','patan','nepali','christian','','N/A','','N/A','N/A','bisnu','','prajapati','','9818001032','teacher','','maiya','','prajapati','','','housewife','','sagun','','bala','father','','','9818001032','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-41','','1','1','1','','1','0','','1','','2019-05-27 10:44:52','2019-05-27 10:44:52','0');
INSERT INTO students VALUES('48','74','yogesh','','bhandari','1990-04-16','male','','pokhara','nepali','christian','','N/A','','N/A','N/A','bishal','','bhandari','','9818001033','teacher','','jiavni','','bhandari','','','teacher','','rita','','bala','father','','','9818001033','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-42','','1','1','1','','1','0','','1','','2019-05-27 10:44:52','2019-05-27 10:44:52','0');
INSERT INTO students VALUES('49','75','anamika','','bhandari','1990-04-16','male','','pokhara','nepali','christian','','N/A','','N/A','N/A','bishal','','bhandari','','9818001034','teacher','','jiavni','','bhandari','','','teacher','','rita','','bala','father','','','9818001034','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-43','','1','1','1','','1','0','','1','','2019-05-27 10:44:52','2019-05-27 10:44:52','0');
INSERT INTO students VALUES('50','76','yama','','Dangol','1995-11-22','male','','lubhoo','nepali','christian','','N/A','','N/A','N/A','Santa','Ram','Dangol','','9818001035','police officer','','radhika','devi','shrestha','','','waiter','','santa','','dangol','father','','','9818001035','','lubhoo','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-44','','1','1','1','','1','0','','1','','2019-05-27 10:44:52','2019-05-27 10:44:52','0');
INSERT INTO students VALUES('51','77','sanam','','Shrestha','2019-12-28','female','','ramechap','nepali','christian','','N/A','','N/A','N/A','Ram','Bahadur','Shrestha','','9818001036','teacher','','sita','','shrestha','','','Army','','ram','','shrestha','father','','','9818001036','','ramechap','teacher','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-45','','1','1','1','','1','0','','1','','2019-05-27 10:44:52','2019-05-27 10:44:52','0');
INSERT INTO students VALUES('52','78','mangal','','thapa','1993-07-21','male','','bhaktapur','nepali','christian','','N/A','','N/A','N/A','hari','','thapa','','9818001037','lecturer','','geet','','thapa','','','teacher','','sita','','thapa','father','','','9818001037','','bhaktapur','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-46','','1','1','1','','1','0','','1','','2019-05-27 10:44:52','2019-05-27 10:44:52','0');
INSERT INTO students VALUES('53','79','Amar','','Shrestha','1992-11-19','male','','thimi','nepali','christian','','N/A','','N/A','N/A','rajan','','Shrestha','','9818001038','government officer','','bina','','shrestha','','','bussiness','','shyam','','shrestha','father','','','9818001038','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-47','','1','1','1','','1','0','','1','','2019-05-27 10:44:52','2019-05-27 10:44:52','0');
INSERT INTO students VALUES('54','80','amrita','','chettri','1991-12-29','male','','kathmandu','nepali','christian','','N/A','','N/A','N/A','gagan','','chettri','','9818001039','officer','','deepa','','chettri','','','housewife','','shyam','','shrestha','father','','','9818001039','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-48','','1','1','1','','1','0','','1','','2019-05-27 10:44:53','2019-05-27 10:44:53','0');
INSERT INTO students VALUES('55','81','Robin','','hada','1992-05-20','male','','lalitpur','nepali','christian','','N/A','','N/A','N/A','sunil','','hada','','9818001040','police officer','','sunita','','hada','','','teacher','','shyam','','shrestha','father','','','9818001040','','thimi','','','N/A','N/A','N/A','','N/A','N/A','N/A','','','','','','','','stu2019One-49','','1','1','1','','1','0','','1','','2019-05-27 10:44:53','2019-05-27 10:44:53','0');



DROP TABLE IF EXISTS subject_teachers;

CREATE TABLE `subject_teachers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` tinyint(3) unsigned NOT NULL,
  `teacher_id` int(10) unsigned NOT NULL,
  `classroom_id` tinyint(3) unsigned NOT NULL,
  `section_id` tinyint(3) unsigned NOT NULL,
  `subject_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `subject_teachers_session_id_foreign` (`session_id`),
  KEY `subject_teachers_teacher_id_foreign` (`teacher_id`),
  KEY `subject_teachers_classroom_id_foreign` (`classroom_id`),
  KEY `subject_teachers_section_id_foreign` (`section_id`),
  KEY `subject_teachers_subject_id_foreign` (`subject_id`),
  KEY `subject_teachers_post_by_foreign` (`post_by`),
  KEY `subject_teachers_verified_by_foreign` (`verified_by`),
  CONSTRAINT `subject_teachers_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  CONSTRAINT `subject_teachers_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `subject_teachers_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  CONSTRAINT `subject_teachers_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `academics_years` (`id`),
  CONSTRAINT `subject_teachers_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  CONSTRAINT `subject_teachers_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `staffs` (`id`),
  CONSTRAINT `subject_teachers_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS subjects;

CREATE TABLE `subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classroom_id` tinyint(3) unsigned NOT NULL,
  `credit_hour` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_mark` tinyint(4) NOT NULL,
  `pass_mark` tinyint(4) NOT NULL,
  `th_full_mark` tinyint(4) NOT NULL,
  `pr_full_mark` tinyint(4) DEFAULT NULL,
  `th_pass_mark` tinyint(4) NOT NULL,
  `pr_pass_mark` tinyint(4) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `subjects_classroom_id_foreign` (`classroom_id`),
  KEY `subjects_post_by_foreign` (`post_by`),
  KEY `subjects_verified_by_foreign` (`verified_by`),
  CONSTRAINT `subjects_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  CONSTRAINT `subjects_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `subjects_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO subjects VALUES('1','Optional Math','00101','optional-1','1','4','100','40','100','','40','','1','','1','0','','1','','2019-05-27 07:07:34','2019-05-27 07:07:34','0');
INSERT INTO subjects VALUES('2','Population','00102','optional-2','1','4','100','40','75','25','30','10','1','','1','0','','1','','2019-05-27 07:08:40','2019-05-27 07:08:40','0');
INSERT INTO subjects VALUES('3','Science','00103','optional-1','1','4','100','40','75','25','30','10','1','','1','0','','1','','2019-05-27 07:12:50','2019-05-27 07:12:50','0');
INSERT INTO subjects VALUES('4','Computer','00104','optional-2','1','4','100','40','50','50','20','20','1','','1','0','','1','','2019-05-27 10:33:38','2019-05-27 10:33:38','0');
INSERT INTO subjects VALUES('5','English','00105','regular','1','4','100','40','75','25','30','10','1','','1','0','','1','','2019-05-27 10:34:23','2019-05-27 10:34:23','0');
INSERT INTO subjects VALUES('6','Music','00106','additional','1','4','100','40','100','','40','','1','','1','0','','1','','2019-05-27 10:34:57','2019-05-27 10:34:57','0');



DROP TABLE IF EXISTS syllabus;

CREATE TABLE `syllabus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `classroom_id` tinyint(3) unsigned NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `syllabus_classroom_id_foreign` (`classroom_id`),
  KEY `syllabus_post_by_foreign` (`post_by`),
  KEY `syllabus_verified_by_foreign` (`verified_by`),
  CONSTRAINT `syllabus_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  CONSTRAINT `syllabus_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `syllabus_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS transactions;

CREATE TABLE `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_id` int(11) NOT NULL,
  `trans_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `dr_cr` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chart_id` int(11) NOT NULL,
  `payee_payer_id` int(11) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  `session_id` tinyint(3) unsigned NOT NULL,
  `attachment` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `transactions_session_id_foreign` (`session_id`),
  KEY `transactions_post_by_foreign` (`post_by`),
  KEY `transactions_verified_by_foreign` (`verified_by`),
  CONSTRAINT `transactions_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `transactions_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `academics_years` (`id`),
  CONSTRAINT `transactions_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS transport_assigns;

CREATE TABLE `transport_assigns` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS transport_routes;

CREATE TABLE `transport_routes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `route_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_fare` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `transport_routes_post_by_foreign` (`post_by`),
  KEY `transport_routes_verified_by_foreign` (`verified_by`),
  CONSTRAINT `transport_routes_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `transport_routes_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO transport_routes VALUES('1','Koteshowr','1000','1','','1','1','0','','1','','2019-05-23 07:35:32','2019-05-23 07:41:53','0');
INSERT INTO transport_routes VALUES('2','Suryabinayak','500','1','','1','1','0','','1','','2019-05-23 07:44:45','2019-05-23 07:44:45','0');



DROP TABLE IF EXISTS transport_vehicles;

CREATE TABLE `transport_vehicles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vehicle_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `transport_vehicles_post_by_foreign` (`post_by`),
  KEY `transport_vehicles_verified_by_foreign` (`verified_by`),
  CONSTRAINT `transport_vehicles_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `transport_vehicles_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO transport_vehicles VALUES('1','A','Ba 2 Kha 1213','2','','1','1','0','','1','','2019-05-23 07:24:39','2019-05-23 07:24:39','0');



DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `facebook` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(11) NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(11) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES('1','0','Admin','admin@gmail.com','$2y$10$Y/x.DBD9JC1.wxYy9Vw8kO4g8x1NeOVyJAMhqYKz9ozwlIx5FkmB6','Admin','1','','','','','','1','0','','','','CALDJeYOXm8DzYzjQ78QN7WbmmfhPJF00aIYj2Cf9TwwYHjreeuhucjD93z9','','','0');
INSERT INTO users VALUES('2','0','Rikesh Shrestha','rikesh@gmail.com','$2y$10$Q0Mxx32LcYLfbExSJWDj/Ob6iREuBmlNM0Q2do3A0j5XAz7Iboxfi','Admin','1','','','','','','1','0','','','','','2019-05-23 02:50:56','2019-05-23 02:50:56','0');
INSERT INTO users VALUES('27','0','Sahas  Dangol','9860124365','$2y$10$rxVZgJaV/Ng/UydWzeGScOn01CfEIuX.5UNtIVp2S8d5UfNRVR5h6','Student','1','','','','','','1','0','','','','','2019-05-23 07:19:48','2019-05-23 07:19:48','0');
INSERT INTO users VALUES('28','0','Rikesh  Shrestha','9860124366','$2y$10$6A9s1n/VhGv1xgC.fhLnGug6CvJf6FMeDdF5IoLRF3b0N2N/PPOVG','Student','1','','','','','','1','0','','','','','2019-05-23 07:19:49','2019-05-23 07:19:49','0');
INSERT INTO users VALUES('29','0','susan  thapa','9860124367','$2y$10$1atofzxzKWO6rXXPhfjcSuaVvGdPYK3WRpQc7r0wq7SZj4U07CXO2','Student','1','','','','','','1','0','','','','','2019-05-23 07:19:49','2019-05-23 07:19:49','0');
INSERT INTO users VALUES('30','0','Ram   Shrestha','9860124368','$2y$10$eHcyX2a.R.0K5hTg2n4/XOdCNmdLeQg5xo5yGpJABM9qMoY37bUcC','Student','1','','','','','','1','0','','','','','2019-05-23 07:19:50','2019-05-23 07:19:50','0');
INSERT INTO users VALUES('31','0','geeta  chettri','9860124369','$2y$10$6GoJYm2KghKDzslHOYVLh.8KUnhau.xCL7ozMgeSU8SkdCWOTyWQS','Student','1','','','','','','1','0','','','','','2019-05-23 07:19:50','2019-05-23 07:19:50','0');
INSERT INTO users VALUES('32','0','sweta  hada','9860124370','$2y$10$nFR35w9wZNNs5hdIaQrGE.e7qy2Jr9wO/JZa5XO84K8JRM125GE1m','Student','1','','','','','','1','0','','','','','2019-05-23 07:19:50','2019-05-23 07:19:50','0');
INSERT INTO users VALUES('33','0','harish  joshi','9860124371','$2y$10$qAI9amyUpZqStA//K10Sa.Iqnormbi.07yYImCjBG/Cg27q4CKJzC','Student','1','','','','','','1','0','','','','','2019-05-23 07:19:50','2019-05-23 07:19:50','0');
INSERT INTO users VALUES('34','0','sudip  bala','9860124372','$2y$10$qSjVNpxWuKAMaiHuotKnbuNiQnndQxPURxvU/4dUS/JIi5stapOKW','Student','1','','','','','','1','0','','','','','2019-05-23 07:19:51','2019-05-23 07:19:51','0');
INSERT INTO users VALUES('35','0','sushant  prajapati','9860124373','$2y$10$Sl1NvhB37PT2Ef21aWrAkODNik5rlMovAnla5Z9aoIKwetBSBi/rW','Student','1','','','','','','1','0','','','','','2019-05-23 07:19:51','2019-05-23 07:19:51','0');
INSERT INTO users VALUES('36','0','dinesh  bhandari','9860124374','$2y$10$..Y0GqseZryfFgvaLbLwJ.1KOH3sRsBPu/z66eBbZ0xXuN8czMgZ2','Student','1','','','','','','1','0','','','','','2019-05-23 07:19:51','2019-05-23 07:19:51','0');
INSERT INTO users VALUES('37','0','Udaya  Joshi','admin@turingsoft.com','$2y$10$JA6aG3eDccGntIbb1z7UCOAtbf0CFRTEY4UF4V4.J3CfUzBRw2nE.','user','1','','','','','','1','0','','','','','2019-05-23 07:24:12','2019-05-23 07:24:12','0');
INSERT INTO users VALUES('38','0','Regan  Joshi','principal@turingsoft.com','$2y$10$QVmOiVbi09dAGJqpfBVdnuTQ7BctmaZGKiq5jwayOVnXx9oUFlRwW','user','1','','','','','','1','0','','','','','2019-05-23 07:24:12','2019-05-23 07:24:12','0');
INSERT INTO users VALUES('39','0','Krishna Prasad Sharma','account@turingsoft.com','$2y$10$eLimVXfCC1bXLHb6T.04se9gxfMBThvhP6g9VxjvHEjFSvWF8G3eW','user','1','','','','','','1','0','','','','','2019-05-23 07:24:13','2019-05-23 07:24:13','0');
INSERT INTO users VALUES('40','0','Sonia  Sakya','receptionist@turingsoft.com','$2y$10$6KlVPQ0KO4SgL0oYhp/.b.4JWRQjxQwzIrYDQ47Q0BeGvjsESuK.K','user','1','','','','','','1','0','','','','','2019-05-23 07:24:13','2019-05-23 07:24:13','0');
INSERT INTO users VALUES('41','0','Bikash  Katuwal','teacher@turingsoft.com','$2y$10$Ywo5aDlafqt2gbxl7Ov2tuEWOX5BBDwBQlbyZzUIwXhw4rpls07yS','user','1','','','','','','1','0','','','','','2019-05-23 07:24:13','2019-05-23 07:24:13','0');
INSERT INTO users VALUES('42','0','Kaji Prasad Ojha','student@turingsoft.com','$2y$10$.sABLmQ47N.CarNF0dMX6.i5gtB5AjHUlnj1SUwYm20Ipd8TcKTwi','user','1','','','','','','1','0','','','','','2019-05-23 07:24:14','2019-05-23 07:24:14','0');
INSERT INTO users VALUES('43','0','Amar  Dangol','9818001002','$2y$10$xQSII.2NQTuhJKhqgDta.uuf2dIedHAlD/oDoOEyeBxrD1nnY.Ndi','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:45','2019-05-27 10:44:45','0');
INSERT INTO users VALUES('44','0','amrita  Shrestha','9818001003','$2y$10$gu/XLpAk0YURNSkPeOot4u.e749kDaWLFO1FO9DoZgGMFfshbT5W6','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:46','2019-05-27 10:44:46','0');
INSERT INTO users VALUES('45','0','Robin  thapa','9818001004','$2y$10$WurLila74Ditq0lqgU3JU.BOl4lbX0HSADihrAbDktILgJ4gszWQu','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:46','2019-05-27 10:44:46','0');
INSERT INTO users VALUES('46','0','Pujan  Shrestha','9818001005','$2y$10$tAccapvhbpSAbQTiCZO39.rzo6rTMKf.jH5ALfAdi9TEkbh4X532K','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:46','2019-05-27 10:44:46','0');
INSERT INTO users VALUES('47','0','samar  chettri','9818001006','$2y$10$FI8ONSiV/99f6V3TMpIIkueEz4Va/Q1hwnxGy4Omz3Fy5ZlrHEYBe','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:47','2019-05-27 10:44:47','0');
INSERT INTO users VALUES('48','0','amir  hada','9818001007','$2y$10$Gu0qzwBqVeVM4Znu6DMrR.ocNpm5MeHsrTNHrEcw4vxocTx2sO1RK','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:47','2019-05-27 10:44:47','0');
INSERT INTO users VALUES('49','0','bivash  joshi','9818001008','$2y$10$lDBLU8zLlFcxh2kb7DM6Q.4qrgMf0ZH.TT3fycX5KgjNiRTZ/sqDK','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:47','2019-05-27 10:44:47','0');
INSERT INTO users VALUES('50','0','biplov  bala','9818001009','$2y$10$9o.zRXJ.2I2YA8nhA.CAYu3TCshNR3BqJDPy6Mi4DsxbSMRYCK1Xe','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:47','2019-05-27 10:44:47','0');
INSERT INTO users VALUES('51','0','nomad  prajapati','9818001010','$2y$10$9w623lMevjzz0rGKopT1LOPEFhoqmAuVV23lUX8lnJI2MqoM5qFhO','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:47','2019-05-27 10:44:47','0');
INSERT INTO users VALUES('52','0','vijay  bhandari','9818001011','$2y$10$OE8niW1lulP88Haf83r2h.sAc5CrhMgqO5KmHwy7VwfeRz318rRbK','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:47','2019-05-27 10:44:47','0');
INSERT INTO users VALUES('53','0','sarthak  bhandari','9818001012','$2y$10$ZgK9zBHfM2XWyY2xxuuMkeAMXcOaR9tPTq5EgcFBDOcML00IURovG','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:48','2019-05-27 10:44:48','0');
INSERT INTO users VALUES('54','0','prabal  Dangol','9818001013','$2y$10$fvfaahYLt.JVLUaQDNrJMeyMFr5PQPRFTEs6HPyXYJ1ucGBBlX0jK','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:48','2019-05-27 10:44:48','0');
INSERT INTO users VALUES('55','0','sohil  Shrestha','9818001014','$2y$10$u30LPqVL1M5v3leXzTTm0uQZuF1LxI4EFFtRYho75a1SUg4yAgf.q','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:48','2019-05-27 10:44:48','0');
INSERT INTO users VALUES('56','0','yogesh  thapa','9818001015','$2y$10$FNTEvxEpFiHlXC1Zs8g7ROPwb1.p3rEYwtXbmnh7KhoVmyXbXBmf6','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:48','2019-05-27 10:44:48','0');
INSERT INTO users VALUES('57','0','anamika  Shrestha','9818001016','$2y$10$XPybW3LLdbmwv6qQXbgG1uJq4coJUka.s3VmbNkIUAspa1u1WD.be','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:48','2019-05-27 10:44:48','0');
INSERT INTO users VALUES('58','0','yama  chettri','9818001017','$2y$10$x/y4ptiur/VHwSBOrwr./ekkS2G5dKGum7TQ53le9PyO6Y8fRMu0m','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:49','2019-05-27 10:44:49','0');
INSERT INTO users VALUES('59','0','sanam  hada','9818001018','$2y$10$WYVDmdegC4Oh/1ICIRYd9OiARkrxdZ37y9LlmHVbR27RTbV4fBfGa','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:49','2019-05-27 10:44:49','0');
INSERT INTO users VALUES('60','0','mangal  joshi','9818001019','$2y$10$cXsVwAsZP7zJl.7IXODVm.m7F.j96HXlspm9Dt8x373WHCb7lfyve','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:49','2019-05-27 10:44:49','0');
INSERT INTO users VALUES('61','0','Amar  bala','9818001020','$2y$10$YfPMEo.N14rvEXJjUnDcveNUdzREoaj1hR83C0iiKmAOBfQS7LOuq','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:49','2019-05-27 10:44:49','0');
INSERT INTO users VALUES('62','0','amrita  prajapati','9818001021','$2y$10$kNBcrYeNG8wXDBljYiiOre6FwgNpR1b3ZSBy8wbpdKABrhApeqiV2','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:50','2019-05-27 10:44:50','0');
INSERT INTO users VALUES('63','0','Robin  bhandari','9818001022','$2y$10$9bIZk/0sbokBBo/IEA9r2uS/c7.ygNk1J9rasvQKdvdozlFgDiSwG','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:50','2019-05-27 10:44:50','0');
INSERT INTO users VALUES('64','0','Pujan  bhandari','9818001023','$2y$10$PBpRJPAl89A9utak0Cb52O4KhE2CUmKDssoLxrXgj3ofHvYgENFOq','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:50','2019-05-27 10:44:50','0');
INSERT INTO users VALUES('65','0','samar  Dangol','9818001024','$2y$10$8tCt9i5PlA.GNXM4OCzPHO/5i43Q4CpLy.7X0uzs5bQmDdlKiN/dC','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:50','2019-05-27 10:44:50','0');
INSERT INTO users VALUES('66','0','amir  Shrestha','9818001025','$2y$10$LhTuenLCSf5mBKwtFv0hDO4B/5/oZH1LCrjSPP/bt8iIAcGelCoCm','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:50','2019-05-27 10:44:50','0');
INSERT INTO users VALUES('67','0','bivash  thapa','9818001026','$2y$10$UDdt.LpJiZj/Ov7ChWpUrO4jmvOtJbevnNByc2PnSS0BarhAZxXHW','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:50','2019-05-27 10:44:50','0');
INSERT INTO users VALUES('68','0','biplov  Shrestha','9818001027','$2y$10$rZs4tkMGxbGyHj8ptu79g.S5n5XXS2QCkwsCv6Gh4jUtAABvmiEOC','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:51','2019-05-27 10:44:51','0');
INSERT INTO users VALUES('69','0','nomad  chettri','9818001028','$2y$10$YnPY5hbaqMcdtfknigocces6lBkDe1fwStnN/.2MDoj8mmEs7TvHC','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:51','2019-05-27 10:44:51','0');
INSERT INTO users VALUES('70','0','vijay  hada','9818001029','$2y$10$uZ8/wsb83TK0r71Sex2Fnuba9DcAJwst8GrhW/gGZz5duzNhuNNF.','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:51','2019-05-27 10:44:51','0');
INSERT INTO users VALUES('71','0','sarthak  joshi','9818001030','$2y$10$nSdATN.xXphytK7rZRWY7ui7QIWG9Mc0UDOOh3yUwdVkhtHmObuqy','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:51','2019-05-27 10:44:51','0');
INSERT INTO users VALUES('72','0','prabal  bala','9818001031','$2y$10$44tKVXPhRx07v49tyAsCueIAqT/ddfLvIW2IbOGMCPFs07s9.8eX6','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:51','2019-05-27 10:44:51','0');
INSERT INTO users VALUES('73','0','sohil  prajapati','9818001032','$2y$10$RtnY58Q63liXbSoqeCmTxeV4qzLKzozggAKe//d3PRjuuSDxp2D4S','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:51','2019-05-27 10:44:51','0');
INSERT INTO users VALUES('74','0','yogesh  bhandari','9818001033','$2y$10$qog/zVbhBOuzvyTmQcFKEecAAHs6lySPgxt6C.FdvEZ5BF0TSaaxK','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:52','2019-05-27 10:44:52','0');
INSERT INTO users VALUES('75','0','anamika  bhandari','9818001034','$2y$10$Nwu.SXvxITNN6.74ZCUYxO.4CXlV/D9/OE/Hvjwqp5fNewQhdhJVi','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:52','2019-05-27 10:44:52','0');
INSERT INTO users VALUES('76','0','yama  Dangol','9818001035','$2y$10$RpYRGtyrW.c9w5dLE4y2G.sD7MvPSVuSNjJYiDbo6Yg2aPtNh9G5y','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:52','2019-05-27 10:44:52','0');
INSERT INTO users VALUES('77','0','sanam  Shrestha','9818001036','$2y$10$lLa5PNaD5YhHRan9F2ZwFO/tu/Ir9rUJHs8PlxvCG9AFqdt1sEiuq','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:52','2019-05-27 10:44:52','0');
INSERT INTO users VALUES('78','0','mangal  thapa','9818001037','$2y$10$d/TkFGpz7oeoehmgJBexBert5yhuj5CBV/CP8K5LmdCezTzq.2G2i','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:52','2019-05-27 10:44:52','0');
INSERT INTO users VALUES('79','0','Amar  Shrestha','9818001038','$2y$10$fucGk9ZJ1/ISOjVpjczHMuqFiK1SGyYcf7l/odNnRgYaFJk6N0D7e','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:52','2019-05-27 10:44:52','0');
INSERT INTO users VALUES('80','0','amrita  chettri','9818001039','$2y$10$5ec/DOlpR0ti7r6ZrpeKj.MC1EghnlFrGToNtjIwRHR9YrGQFFAWK','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:53','2019-05-27 10:44:53','0');
INSERT INTO users VALUES('81','0','Robin  hada','9818001040','$2y$10$8fUF0ZK8C8v4JTZh7wauoug38PeYOY9ctBcat4j/Lyv603Ir1Zvuy','Student','1','','','','','','1','0','','','','','2019-05-27 10:44:53','2019-05-27 10:44:53','0');



DROP TABLE IF EXISTS users_activations;

CREATE TABLE `users_activations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_staff` int(10) unsigned NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `users_activations_id_staff_foreign` (`id_staff`),
  CONSTRAINT `users_activations_id_staff_foreign` FOREIGN KEY (`id_staff`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS visitors;

CREATE TABLE `visitors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_time` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_time` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitor_card_no` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `visitors_post_by_foreign` (`post_by`),
  KEY `visitors_verified_by_foreign` (`verified_by`),
  CONSTRAINT `visitors_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `visitors_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS website_languages;

CREATE TABLE `website_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) unsigned NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `website_languages_post_by_foreign` (`post_by`),
  KEY `website_languages_verified_by_foreign` (`verified_by`),
  CONSTRAINT `website_languages_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `website_languages_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




