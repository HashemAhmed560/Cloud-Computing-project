START TRANSACTION;

CREATE TABLE `students` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `cgpa` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `students` (`id`, `name`, `age`, `cgpa`) VALUES
('20221445676', 'Hashem Ahmed Abdel hafiz', 20, 3.4),
('20221372791', 'Hussein Hesham Ibrahim', 22, 3.1),
('20221441784', 'AbdelRahman Ahmed Fathi', 20, 2.0),
('20221903971', 'Antonios Gerges Nageh', 21, 3.2),
('20221442265', 'AbdelRahman Tarek Zaki', 19, 3.0);

ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);
