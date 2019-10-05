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

INSERT INTO academics_years VALUES('1','2019/2020','2076','','1','1','1','0','','1','','2019-06-07 07:04:37','2019-06-07 07:04:37','0');



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS exam_results;

CREATE TABLE `exam_results` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` tinyint(3) unsigned NOT NULL,
  `exam_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `classroom_id` tinyint(3) unsigned NOT NULL,
  `section_id` tinyint(3) unsigned NOT NULL,
  `full_mark` int(11) NOT NULL,
  `obtained_mark` int(11) NOT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` tinyint(4) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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

INSERT INTO fiscal_years VALUES('1','75/76','2019-04-16','2020-04-16','','1','1','1','0','','1','','','','0');



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

INSERT INTO income_expenses VALUES('1','Baisakh','0','0','1','1','0','','1','','','2019-06-07 06:47:15','0');
INSERT INTO income_expenses VALUES('2','Jestha','0','0','1','1','0','','1','','','2019-06-07 06:47:15','0');
INSERT INTO income_expenses VALUES('3','Ashad','0','0','1','1','0','','1','','','2019-06-07 06:47:15','0');
INSERT INTO income_expenses VALUES('4','Shrawan','0','0','1','1','0','','1','','','2019-06-07 06:47:15','0');
INSERT INTO income_expenses VALUES('5','Bhadra','0','0','1','1','0','','1','','','2019-06-07 06:47:15','0');
INSERT INTO income_expenses VALUES('6','Ashwin','0','0','1','1','0','','1','','','2019-06-07 06:47:15','0');
INSERT INTO income_expenses VALUES('7','Kartik','0','0','1','1','0','','1','','','2019-06-07 06:47:15','0');
INSERT INTO income_expenses VALUES('8','Mangsir','0','0','1','1','0','','1','','','2019-06-07 06:47:15','0');
INSERT INTO income_expenses VALUES('9','Poush','0','0','1','1','0','','1','','','2019-06-07 06:47:15','0');
INSERT INTO income_expenses VALUES('10','Magh','0','0','1','1','0','','1','','','2019-06-07 06:47:15','0');
INSERT INTO income_expenses VALUES('11','Falgun','0','0','1','1','0','','1','','','2019-06-07 06:47:15','0');
INSERT INTO income_expenses VALUES('12','Chaitra','0','0','1','1','0','','1','','','2019-06-07 06:47:15','0');



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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
INSERT INTO mark_grades VALUES('4','B','60','70','2.4','2.8','4','','1','1','0','','1','','','','0');
INSERT INTO mark_grades VALUES('5','C+','50','60','2','2.4','2.4','','1','1','0','','1','','','','0');
INSERT INTO mark_grades VALUES('6','C','40','50','1.6','2','2','','1','1','0','','1','','','','0');
INSERT INTO mark_grades VALUES('7','D+','30','40','1.2','1.6','1.6','','1','1','0','','1','','','','0');
INSERT INTO mark_grades VALUES('8','D','20','30','0.8','1.2','1.2','','1','1','0','','1','','','','0');
INSERT INTO mark_grades VALUES('9','E','1','20','0.1','0.8','0.8','','1','1','0','','1','','','','0');
INSERT INTO mark_grades VALUES('10','N','0','0','0','0.1','0','','1','1','0','','1','','','','0');



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS migrations;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO migrations VALUES('1','2018_01_00_000000_create_users_table','1');
INSERT INTO migrations VALUES('2','2018_01_01_000010_create_designations_table','1');
INSERT INTO migrations VALUES('3','2018_01_01_000011_create_departments_table','1');
INSERT INTO migrations VALUES('4','2018_01_01_100000_create_password_resets_table','1');
INSERT INTO migrations VALUES('5','2018_01_01_100001_create_settings_table','1');
INSERT INTO migrations VALUES('6','2018_01_01_100002_create_classrooms_table','1');
INSERT INTO migrations VALUES('7','2018_01_01_100004_create_staffs_table','1');
INSERT INTO migrations VALUES('8','2018_01_01_100005_create_staff_attendances_table','1');
INSERT INTO migrations VALUES('9','2018_01_01_100006_create_subjects_table','1');
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
INSERT INTO migrations VALUES('24','2019_02_18_070035_create_exam_lists_table','1');
INSERT INTO migrations VALUES('25','2019_02_18_083112_create_mark_grades_table','1');
INSERT INTO migrations VALUES('26','2019_02_18_091742_create_exam_routines_table','1');
INSERT INTO migrations VALUES('27','2019_02_26_100136_create_fee_types_table','1');
INSERT INTO migrations VALUES('28','2019_02_27_061045_create_invoices_table','1');
INSERT INTO migrations VALUES('29','2019_02_27_061137_create_invoice_items_table','1');
INSERT INTO migrations VALUES('30','2019_02_27_070118_create_syllabus_table','1');
INSERT INTO migrations VALUES('31','2019_02_28_053258_create_galleries_table','1');
INSERT INTO migrations VALUES('32','2019_03_01_072012_create_student_payments_table','1');
INSERT INTO migrations VALUES('33','2019_03_02_073348_create_fee_type_status','1');
INSERT INTO migrations VALUES('34','2019_03_02_113000_create_gallery_images_table','1');
INSERT INTO migrations VALUES('35','2019_03_07_053227_create_users_activations_table','1');
INSERT INTO migrations VALUES('36','2019_03_17_060257_create_permission_groups_table','1');
INSERT INTO migrations VALUES('37','2019_03_21_050601_create_news_and_events_table','1');
INSERT INTO migrations VALUES('38','2019_03_21_063657_create_leave_applications_table','1');
INSERT INTO migrations VALUES('39','2019_03_21_095535_create_about_institutes_table','1');
INSERT INTO migrations VALUES('40','2019_03_21_095746_create_f_a_qs_table','1');
INSERT INTO migrations VALUES('41','2019_03_21_095812_create_quick_links_table','1');
INSERT INTO migrations VALUES('42','2019_03_22_093437_create_contents_table','1');
INSERT INTO migrations VALUES('43','2019_03_29_101247_create_testimonials_table','1');
INSERT INTO migrations VALUES('44','2019_04_02_050000_create_fiscal_years_table','1');
INSERT INTO migrations VALUES('45','2019_04_02_054600_create_journals_table','1');
INSERT INTO migrations VALUES('46','2019_04_03_052409_create_groups_table','1');
INSERT INTO migrations VALUES('47','2019_04_03_070001_create_list_of_ledgers_table','1');
INSERT INTO migrations VALUES('48','2019_04_03_070629_create_ledgers_table','1');
INSERT INTO migrations VALUES('49','2019_04_03_095454_create_item_of_journals_table','1');
INSERT INTO migrations VALUES('50','2019_04_11_061749_create_copy_of_invoices_table','1');
INSERT INTO migrations VALUES('51','2019_04_15_043158_create_optional_subject_assigns_table','1');
INSERT INTO migrations VALUES('52','2019_05_10_052927_create_subject_teachers_table','1');
INSERT INTO migrations VALUES('53','2019_05_10_094826_create_exam_results_table','1');
INSERT INTO migrations VALUES('54','2019_05_12_051055_create_payment_histories_table','1');
INSERT INTO migrations VALUES('55','2019_05_22_084034_create_scholarship_items_table','1');
INSERT INTO migrations VALUES('56','2019_05_29_095242_create_income_expenses_table','1');
INSERT INTO migrations VALUES('57','2019_07_10_104623_create_marks_table','1');
INSERT INTO migrations VALUES('58','2019_09_04_175517_create_website_languages_table','1');
INSERT INTO migrations VALUES('59','2019_10_26_065006_create_enquiries_table','1');
INSERT INTO migrations VALUES('60','2019_10_26_190026_create_complains_table','1');



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
  `student_id` int(10) unsigned NOT NULL,
  `optional_subject1_id` int(10) unsigned DEFAULT NULL,
  `optional_subject2_id` int(10) unsigned DEFAULT NULL,
  `session_id` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `optional_subject_assigns_student_id_foreign` (`student_id`),
  KEY `optional_subject_assigns_optional_subject1_id_foreign` (`optional_subject1_id`),
  KEY `optional_subject_assigns_optional_subject2_id_foreign` (`optional_subject2_id`),
  CONSTRAINT `optional_subject_assigns_optional_subject1_id_foreign` FOREIGN KEY (`optional_subject1_id`) REFERENCES `subjects` (`id`) ON DELETE SET NULL,
  CONSTRAINT `optional_subject_assigns_optional_subject2_id_foreign` FOREIGN KEY (`optional_subject2_id`) REFERENCES `subjects` (`id`) ON DELETE SET NULL,
  CONSTRAINT `optional_subject_assigns_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS password_resets;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
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

INSERT INTO permission_groups VALUES('1','role','2019-06-07 05:12:20','2019-06-07 05:12:20','0');
INSERT INTO permission_groups VALUES('2','visitor','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permission_groups VALUES('3','hr','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permission_groups VALUES('4','student','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permission_groups VALUES('5','classroom','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permission_groups VALUES('6','section','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permission_groups VALUES('7','studentfee','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permission_groups VALUES('8','routine','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permission_groups VALUES('9','notice','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permission_groups VALUES('10','exam','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permission_groups VALUES('11','grade','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permission_groups VALUES('12','exam-routine','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permission_groups VALUES('13','marksheet','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permission_groups VALUES('14','complaint','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permission_groups VALUES('15','enquiry','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permission_groups VALUES('16','permission','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permission_groups VALUES('17','user','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permission_groups VALUES('18','student-attendance','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permission_groups VALUES('19','staff-attendance','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permission_groups VALUES('20','exam-attendance','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permission_groups VALUES('21','mark','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permission_groups VALUES('22','route','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permission_groups VALUES('23','vehicle','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permission_groups VALUES('24','vehicle-assign','2019-06-07 05:12:24','2019-06-07 05:12:24','0');
INSERT INTO permission_groups VALUES('25','subject','2019-06-07 05:12:24','2019-06-07 05:12:24','0');
INSERT INTO permission_groups VALUES('26','department','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permission_groups VALUES('27','designation','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permission_groups VALUES('28','gallery','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permission_groups VALUES('29','syllabus','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permission_groups VALUES('30','transaction','2019-06-07 05:12:26','2019-06-07 05:12:26','0');
INSERT INTO permission_groups VALUES('31','bank-account','2019-06-07 05:12:26','2019-06-07 05:12:26','0');
INSERT INTO permission_groups VALUES('32','payment-method','2019-06-07 05:12:26','2019-06-07 05:12:26','0');
INSERT INTO permission_groups VALUES('33','chart-of-account','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permission_groups VALUES('34','payee-payer','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permission_groups VALUES('35','invoice','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permission_groups VALUES('36','database-backup','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permission_groups VALUES('37','academics-year','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permission_groups VALUES('38','student-payment','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permission_groups VALUES('39','student-history','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permission_groups VALUES('40','news-and-event','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permission_groups VALUES('41','faq','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permission_groups VALUES('42','quick-link','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permission_groups VALUES('43','content','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permission_groups VALUES('44','testimonial','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permission_groups VALUES('45','student-leave-application','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permission_groups VALUES('46','report','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permission_groups VALUES('47','journal','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permission_groups VALUES('48','ledger','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permission_groups VALUES('49','trial-balance','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permission_groups VALUES('50','balance-sheet','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permission_groups VALUES('51','profit-loss','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permission_groups VALUES('52','day-book','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permission_groups VALUES('53','setting','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permission_groups VALUES('54','subject-assign','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permission_groups VALUES('55','fiscal-year','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permission_groups VALUES('56','subjectteacher','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permission_groups VALUES('57','class-teacher-assign','2019-06-07 05:12:29','2019-06-07 05:12:29','0');



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

INSERT INTO permissions VALUES('1','1','role-list','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('2','1','role-create','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('3','1','role-edit','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('4','1','role-delete','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('5','2','visitor-list','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('6','2','visitor-create','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('7','2','visitor-edit','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('8','2','visitor-delete','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('9','3','hr-list','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('10','3','hr-create','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('11','3','hr-edit','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('12','3','hr-delete','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('13','4','student-list','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('14','4','student-create','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('15','4','student-edit','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('16','4','student-delete','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('17','5','classroom-list','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('18','5','classroom-create','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('19','5','classroom-edit','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('20','5','classroom-delete','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('21','6','section-list','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('22','6','section-create','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('23','6','section-edit','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('24','6','section-delete','web','2019-06-07 05:12:21','2019-06-07 05:12:21','0');
INSERT INTO permissions VALUES('25','7','studentfee-list','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('26','7','studentfee-create','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('27','7','studentfee-edit','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('28','7','studentfee-delete','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('29','8','routine-list','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('30','8','routine-create','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('31','8','routine-edit','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('32','8','routine-delete','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('33','9','notice-list','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('34','9','notice-create','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('35','9','notice-edit','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('36','9','notice-delete','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('37','10','exam-list','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('38','10','exam-create','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('39','10','exam-edit','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('40','10','exam-delete','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('41','11','grade-list','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('42','11','grade-create','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('43','11','grade-edit','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('44','11','grade-delete','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('45','12','exam-routine-list','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('46','12','exam-routine-create','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('47','12','exam-routine-edit','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('48','12','exam-routine-delete','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('49','13','marksheet-list','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('50','13','marksheet-create','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('51','13','marksheet-edit','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('52','13','marksheet-delete','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('53','14','complaint-list','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('54','14','complaint-create','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('55','14','complaint-edit','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('56','14','complaint-delete','web','2019-06-07 05:12:22','2019-06-07 05:12:22','0');
INSERT INTO permissions VALUES('57','15','enquiry-list','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('58','15','enquiry-create','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('59','15','enquiry-edit','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('60','15','enquiry-delete','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('61','16','permission-list','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('62','16','permission-create','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('63','16','permission-edit','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('64','16','permission-delete','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('65','17','user-list','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('66','17','user-create','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('67','17','user-edit','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('68','17','user-delete','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('69','18','student-attendance-list','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('70','18','student-attendance-create','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('71','18','student-attendance-edit','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('72','18','student-attendance-delete','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('73','19','staff-attendance-list','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('74','19','staff-attendance-create','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('75','19','staff-attendance-edit','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('76','19','staff-attendance-delete','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('77','20','exam-attendance-list','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('78','20','exam-attendance-create','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('79','20','exam-attendance-edit','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('80','20','exam-attendance-delete','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('81','21','mark-list','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('82','21','mark-create','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('83','21','mark-edit','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('84','21','mark-delete','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('85','22','route-list','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('86','22','route-create','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('87','22','route-edit','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('88','22','route-delete','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('89','23','vehicle-list','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('90','23','vehicle-create','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('91','23','vehicle-edit','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('92','23','vehicle-delete','web','2019-06-07 05:12:23','2019-06-07 05:12:23','0');
INSERT INTO permissions VALUES('93','24','vehicle-assign-list','web','2019-06-07 05:12:24','2019-06-07 05:12:24','0');
INSERT INTO permissions VALUES('94','24','vehicle-assign-create','web','2019-06-07 05:12:24','2019-06-07 05:12:24','0');
INSERT INTO permissions VALUES('95','24','vehicle-assign-edit','web','2019-06-07 05:12:24','2019-06-07 05:12:24','0');
INSERT INTO permissions VALUES('96','24','vehicle-assign-delete','web','2019-06-07 05:12:24','2019-06-07 05:12:24','0');
INSERT INTO permissions VALUES('97','25','subject-list','web','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permissions VALUES('98','25','subject-create','web','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permissions VALUES('99','25','subject-edit','web','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permissions VALUES('100','25','subject-delete','web','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permissions VALUES('101','26','department-list','web','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permissions VALUES('102','26','department-create','web','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permissions VALUES('103','26','department-edit','web','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permissions VALUES('104','26','department-delete','web','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permissions VALUES('105','27','designation-list','web','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permissions VALUES('106','27','designation-create','web','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permissions VALUES('107','27','designation-edit','web','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permissions VALUES('108','27','designation-delete','web','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permissions VALUES('109','28','gallery-list','web','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permissions VALUES('110','28','gallery-create','web','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permissions VALUES('111','28','gallery-edit','web','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permissions VALUES('112','28','gallery-delete','web','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permissions VALUES('113','29','syllabus-list','web','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permissions VALUES('114','29','syllabus-create','web','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permissions VALUES('115','29','syllabus-edit','web','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permissions VALUES('116','29','syllabus-delete','web','2019-06-07 05:12:25','2019-06-07 05:12:25','0');
INSERT INTO permissions VALUES('117','30','transaction-list','web','2019-06-07 05:12:26','2019-06-07 05:12:26','0');
INSERT INTO permissions VALUES('118','30','transaction-create','web','2019-06-07 05:12:26','2019-06-07 05:12:26','0');
INSERT INTO permissions VALUES('119','30','transaction-edit','web','2019-06-07 05:12:26','2019-06-07 05:12:26','0');
INSERT INTO permissions VALUES('120','30','transaction-delete','web','2019-06-07 05:12:26','2019-06-07 05:12:26','0');
INSERT INTO permissions VALUES('121','31','bank-account-list','web','2019-06-07 05:12:26','2019-06-07 05:12:26','0');
INSERT INTO permissions VALUES('122','31','bank-account-create','web','2019-06-07 05:12:26','2019-06-07 05:12:26','0');
INSERT INTO permissions VALUES('123','31','bank-account-edit','web','2019-06-07 05:12:26','2019-06-07 05:12:26','0');
INSERT INTO permissions VALUES('124','31','bank-account-delete','web','2019-06-07 05:12:26','2019-06-07 05:12:26','0');
INSERT INTO permissions VALUES('125','32','payment-method-list','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('126','32','payment-method-create','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('127','32','payment-method-edit','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('128','32','payment-method-delete','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('129','33','chart-of-account-list','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('130','33','chart-of-account-create','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('131','33','chart-of-account-edit','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('132','33','chart-of-account-delete','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('133','34','payee-payer-list','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('134','34','payee-payer-create','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('135','34','payee-payer-edit','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('136','34','payee-payer-delete','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('137','35','invoice-list','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('138','35','invoice-create','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('139','35','invoice-edit','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('140','35','invoice-delete','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('141','36','database-backup-list','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('142','36','database-backup-create','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('143','36','database-backup-edit','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('144','36','database-backup-delete','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('145','37','academics-year-list','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('146','37','academics-year-create','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('147','37','academics-year-edit','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('148','37','academics-year-delete','web','2019-06-07 05:12:27','2019-06-07 05:12:27','0');
INSERT INTO permissions VALUES('149','38','student-payment-list','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('150','38','student-payment-create','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('151','38','student-payment-edit','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('152','38','student-payment-delete','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('153','39','student-history-list','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('154','39','student-history-create','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('155','39','student-history-edit','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('156','39','student-history-delete','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('157','40','news-and-event-list','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('158','40','news-and-event-create','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('159','40','news-and-event-edit','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('160','40','news-and-event-delete','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('161','41','faq-list','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('162','41','faq-create','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('163','41','faq-edit','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('164','41','faq-delete','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('165','42','quick-link-list','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('166','42','quick-link-create','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('167','42','quick-link-edit','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('168','42','quick-link-delete','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('169','43','content-list','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('170','43','content-create','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('171','43','content-edit','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('172','43','content-delete','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('173','44','testimonial-list','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('174','44','testimonial-create','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('175','44','testimonial-edit','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('176','44','testimonial-delete','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('177','45','student-leave-application-list','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('178','45','student-leave-application-create','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('179','45','student-leave-application-edit','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('180','45','student-leave-application-delete','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('181','46','report-list','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('182','46','report-create','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('183','46','report-edit','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('184','46','report-delete','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('185','47','journal-list','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('186','47','journal-create','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('187','47','journal-edit','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('188','47','journal-delete','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('189','48','ledger-list','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('190','48','ledger-create','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('191','48','ledger-edit','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('192','48','ledger-delete','web','2019-06-07 05:12:28','2019-06-07 05:12:28','0');
INSERT INTO permissions VALUES('193','49','trial-balance-list','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('194','49','trial-balance-create','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('195','49','trial-balance-edit','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('196','49','trial-balance-delete','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('197','50','balance-sheet-list','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('198','50','balance-sheet-create','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('199','50','balance-sheet-edit','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('200','50','balance-sheet-delete','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('201','51','profit-loss-list','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('202','51','profit-loss-create','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('203','51','profit-loss-edit','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('204','51','profit-loss-delete','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('205','52','day-book-list','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('206','52','day-book-create','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('207','52','day-book-edit','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('208','52','day-book-delete','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('209','53','setting-list','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('210','53','setting-create','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('211','53','setting-edit','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('212','53','setting-delete','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('213','54','subject-assign-list','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('214','54','subject-assign-create','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('215','54','subject-assign-edit','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('216','54','subject-assign-delete','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('217','55','fiscal-year-list','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('218','55','fiscal-year-create','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('219','55','fiscal-year-edit','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('220','55','fiscal-year-delete','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('221','56','subjectteacher-list','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('222','56','subjectteacher-create','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('223','56','subjectteacher-edit','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('224','56','subjectteacher-delete','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('225','57','class-teacher-assign-list','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('226','57','class-teacher-assign-create','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('227','57','class-teacher-assign-edit','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');
INSERT INTO permissions VALUES('228','57','class-teacher-assign-delete','web','2019-06-07 05:12:29','2019-06-07 05:12:29','0');



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
INSERT INTO role_has_permissions VALUES('49','3');
INSERT INTO role_has_permissions VALUES('49','5');
INSERT INTO role_has_permissions VALUES('50','1');
INSERT INTO role_has_permissions VALUES('50','3');
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
INSERT INTO role_has_permissions VALUES('81','3');
INSERT INTO role_has_permissions VALUES('82','1');
INSERT INTO role_has_permissions VALUES('82','3');
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
INSERT INTO role_has_permissions VALUES('97','3');
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
INSERT INTO role_has_permissions VALUES('221','1');
INSERT INTO role_has_permissions VALUES('222','1');
INSERT INTO role_has_permissions VALUES('223','1');
INSERT INTO role_has_permissions VALUES('224','1');
INSERT INTO role_has_permissions VALUES('225','1');
INSERT INTO role_has_permissions VALUES('226','1');
INSERT INTO role_has_permissions VALUES('227','1');
INSERT INTO role_has_permissions VALUES('228','1');



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS settings;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sync_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO settings VALUES('1','school_name','Codepass Secondary School','2019-06-07 05:14:17','2019-06-07 07:11:51','0');
INSERT INTO settings VALUES('2','site_title','Codepass','2019-06-07 05:14:17','2019-06-07 05:14:17','0');
INSERT INTO settings VALUES('3','school_phone','1234567890','2019-06-07 05:14:18','2019-06-07 07:11:51','0');
INSERT INTO settings VALUES('4','school_email','codepasstech@gmail.com','2019-06-07 05:14:18','2019-06-07 07:11:51','0');
INSERT INTO settings VALUES('5','pan_no','1234567890','2019-06-07 05:14:18','2019-06-07 05:14:18','0');
INSERT INTO settings VALUES('6','currency_symbol','Rs.','2019-06-07 05:14:18','2019-06-07 05:14:18','0');
INSERT INTO settings VALUES('7','data_color','green','2019-06-07 05:14:18','2019-06-07 05:14:18','0');
INSERT INTO settings VALUES('8','data_background_color','black','2019-06-07 05:14:18','2019-06-07 05:14:18','0');
INSERT INTO settings VALUES('9','net_profit','0','2019-06-07 05:14:18','2019-06-07 05:14:18','0');
INSERT INTO settings VALUES('10','net_loss','0','2019-06-07 05:14:18','2019-06-07 05:14:18','0');
INSERT INTO settings VALUES('11','background_image','','2019-06-07 05:14:18','2019-06-07 05:14:18','0');
INSERT INTO settings VALUES('12','_method','PUT','2019-06-07 07:11:51','2019-06-07 07:11:51','0');
INSERT INTO settings VALUES('13','short_name','Mount','2019-06-07 07:11:51','2019-06-07 07:11:51','0');
INSERT INTO settings VALUES('14','tagline','For the Better Future','2019-06-07 07:11:51','2019-06-07 07:11:51','0');
INSERT INTO settings VALUES('15','school_address','kathmandu','2019-06-07 07:11:51','2019-06-07 07:11:51','0');
INSERT INTO settings VALUES('16','establish_date','2001','2019-06-07 07:11:51','2019-06-07 07:11:51','0');
INSERT INTO settings VALUES('17','fb_link','','2019-06-07 07:11:51','2019-06-07 07:11:51','0');
INSERT INTO settings VALUES('18','twitter_link','','2019-06-07 07:11:51','2019-06-07 07:11:51','0');
INSERT INTO settings VALUES('19','instagram_link','','2019-06-07 07:11:51','2019-06-07 07:11:51','0');
INSERT INTO settings VALUES('20','linkedin_link','','2019-06-07 07:11:51','2019-06-07 07:11:51','0');
INSERT INTO settings VALUES('21','principal_voice','
                                                    
                                                ','2019-06-07 07:11:51','2019-06-07 07:11:51','0');



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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




DROP TABLE IF EXISTS testimonials;

CREATE TABLE `testimonials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  KEY `testimonials_post_by_foreign` (`post_by`),
  KEY `testimonials_verified_by_foreign` (`verified_by`),
  CONSTRAINT `testimonials_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  CONSTRAINT `testimonials_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES('1','0','Admin','admin@gmail.com','$2y$10$uO9gGXP14Ih.xi398RJyLOvCtEw1GDqRRZKlEIy4bJvHLFvn9VaKe','Admin','1','','','','','','1','0','','','','','','','0');
INSERT INTO users VALUES('2','0','MASTER','master@gmail.com','$2y$10$473IG7T4kL9yaj7l1116luZrBHN/y.SI./P6Qm1imIuWxOvFeoV1q','Admin','1','','','','','','1','0','','','','','2019-06-07 05:13:40','2019-06-07 05:13:40','0');



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




