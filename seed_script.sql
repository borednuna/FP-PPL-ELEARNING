INSERT INTO `user` (`username`, `password`, `email`, `role`) VALUES ('nuna', 'nuna123', 'nunanuna123@gmail.com', 'mentor');
INSERT INTO `user` (`username`, `password`, `email`, `role`) VALUES ('bong', 'bong123', 'bongbong123@gmail.com', 'mentor');
INSERT INTO `user` (`username`, `password`, `email`, `role`) VALUES ('meng', 'meng123', 'mengmeng123@gmail.com', 'student');
INSERT INTO `user` (`username`, `password`, `email`, `role`) VALUES ('baweng', 'baweng123', 'bawengbaweng123@gmail.com', 'student');
INSERT INTO `user` (`username`, `password`, `email`, `role`) VALUES ('grace', 'grace123', 'gracegrace123@gmail.com', 'admin');

INSERT INTO `notification` (`title`, `content`, `user_id`) VALUES ('Welcome to E-Learning', 'Welcome to E-Learning, please enjoy your learning journey', 3);
INSERT INTO `notification` (`title`, `content`, `user_id`) VALUES ('Welcome to E-Learning', 'Welcome to E-Learning, please enjoy your learning journey', 4);

INSERT INTO `class` (`class_name`, `date_created`, `class_description`, `mentor_id`, `quota`) VALUES ('Web Development', '2021-01-01 00:00:00', 'Learn how to develop a website', 1, 30);
INSERT INTO `class` (`class_name`, `date_created`, `class_description`, `mentor_id`, `quota`) VALUES ('Mobile Development', '2021-01-01 00:00:00', 'Learn how to develop a mobile application', 2, 40);
INSERT INTO `class` (`class_name`, `date_created`, `class_description`, `mentor_id`, `quota`) VALUES ('Data Science', '2021-01-01 00:00:00', 'Learn how to analyze data', 1, 50);

INSERT INTO `class_user` (`class_id`, `user_id`) VALUES (1, 3);
INSERT INTO `class_user` (`class_id`, `user_id`) VALUES (1, 4);
INSERT INTO `class_user` (`class_id`, `user_id`) VALUES (2, 3);
INSERT INTO `class_user` (`class_id`, `user_id`) VALUES (2, 4);
INSERT INTO `class_user` (`class_id`, `user_id`) VALUES (3, 3);
INSERT INTO `class_user` (`class_id`, `user_id`) VALUES (3, 4);

INSERT INTO `material` (`title`, `material_description`, `class_id`, `date_created`, `material_content`, `video_path`) VALUES ('HTML', 'Learn how to use HTML', 1, '2021-01-01 00:00:00', 'HTML is a markup language that is used to create web pages.', 'https://www.youtube.com/watch?v=UB1O30fR-EE');
INSERT INTO `material` (`title`, `material_description`, `class_id`, `date_created`, `material_content`, `video_path`) VALUES ('CSS', 'Learn how to use CSS', 1, '2021-01-01 00:00:00', 'CSS is a style sheet language used for describing the presentation of a document written in a markup language like HTML.', 'https://www.youtube.com/watch?v=UB1O30fR-EE');
INSERT INTO `material` (`title`, `material_description`, `class_id`, `date_created`, `material_content`, `video_path`) VALUES ('JavaScript', 'Learn how to use JavaScript', 1, '2021-01-01 00:00:00', 'JavaScript is a programming language that enables you to create dynamically updating content, control multimedia, animate images, and much more.', 'https://www.youtube.com/watch?v=UB1O30fR-EE');
INSERT INTO `material` (`title`, `material_description`, `class_id`, `date_created`, `material_content`, `video_path`) VALUES ('React', 'Learn how to use React', 1, '2021-01-01 00:00:00', 'React is a JavaScript library for building user interfaces.', 'https://www.youtube.com/watch?v=UB1O30fR-EE');
INSERT INTO `material` (`title`, `material_description`, `class_id`, `date_created`, `material_content`, `video_path`) VALUES ('Angular', 'Learn how to use Angular', 1, '2021-01-01 00:00:00', 'Angular is a platform and framework for building single-page client applications using HTML and TypeScript.', 'https://www.youtube.com/watch?v=UB1O30fR-EE');
INSERT INTO `material` (`title`, `material_description`, `class_id`, `date_created`, `material_content`, `video_path`) VALUES ('Vue', 'Learn how to use Vue', 1, '2021-01-01 00:00:00', 'Vue.js is a progressive JavaScript framework used to build interactive web interfaces.', 'https://www.youtube.com/watch?v=UB1O30fR-EE');
INSERT INTO `material` (`title`, `material_description`, `class_id`, `date_created`, `material_content`, `video_path`) VALUES ('Flutter', 'Learn how to use Flutter', 2, '2021-01-01 00:00:00', 'Flutter is an open-source UI software development kit created by Google.', 'https://www.youtube.com/watch?v=UB1O30fR-EE');
INSERT INTO `material` (`title`, `material_description`, `class_id`, `date_created`, `material_content`, `video_path`) VALUES ('Dart', 'Learn how to use Dart', 2, '2021-01-01 00:00:00', 'Dart is a client-optimized programming language for apps on multiple platforms.', 'https://www.youtube.com/watch?v=UB1O30fR-EE');
INSERT INTO `material` (`title`, `material_description`, `class_id`, `date_created`, `material_content`, `video_path`) VALUES ('Firebase', 'Learn how to use Firebase', 2, '2021-01-01 00:00:00', 'Firebase is a platform developed by Google for creating mobile and web applications.', 'https://www.youtube.com/watch?v=UB1O30fR-EE');
INSERT INTO `material` (`title`, `material_description`, `class_id`, `date_created`, `material_content`, `video_path`) VALUES ('Python', 'Learn how to use Python', 3, '2021-01-01 00:00:00', 'Python is an interpreted, high-level, general-purpose programming language.', 'https://www.youtube.com/watch?v=UB1O30fR-EE');
INSERT INTO `material` (`title`, `material_description`, `class_id`, `date_created`, `material_content`, `video_path`) VALUES ('Pandas', 'Learn how to use Pandas', 3, '2021-01-01 00:00:00', 'Pandas is a fast, powerful, flexible, and easy-to-use open-source data analysis and data manipulation library built on top of the Python programming language.', 'https://www.youtube.com/watch?v=UB1O30fR-EE');
INSERT INTO `material` (`title`, `material_description`, `class_id`, `date_created`, `material_content`, `video_path`) VALUES ('Numpy', 'Learn how to use Numpy', 3, '2021-01-01 00:00:00', 'NumPy is a library for the Python programming language, adding support for large, multi-dimensional arrays and matrices, along with a large collection of high-level mathematical functions to operate on these arrays.', 'https://www.youtube.com/watch?v=UB1O30fR-EE');

INSERT INTO `assignment` (`name`, `description`, `material_id`, `deadline`) VALUES ('HTML Assignment', 'Create a simple website using HTML', 1, '2021-01-10 00:00:00');
INSERT INTO `assignment` (`name`, `description`, `material_id`, `deadline`) VALUES ('CSS Assignment', 'Create a simple website using CSS', 2, '2021-01-10 00:00:00');
INSERT INTO `assignment` (`name`, `description`, `material_id`, `deadline`) VALUES ('JavaScript Assignment', 'Create a simple website using JavaScript', 3, '2021-01-10 00:00:00');
INSERT INTO `assignment` (`name`, `description`, `material_id`, `deadline`) VALUES ('React Assignment', 'Create a simple website using React', 4, '2021-01-10 00:00:00');
INSERT INTO `assignment` (`name`, `description`, `material_id`, `deadline`) VALUES ('Angular Assignment', 'Create a simple website using Angular', 5, '2021-01-10 00:00:00');
INSERT INTO `assignment` (`name`, `description`, `material_id`, `deadline`) VALUES ('Vue Assignment', 'Create a simple website using Vue', 6, '2021-01-10 00:00:00');
INSERT INTO `assignment` (`name`, `description`, `material_id`, `deadline`) VALUES ('Flutter Assignment', 'Create a simple mobile application using Flutter', 7, '2021-01-10 00:00:00');
INSERT INTO `assignment` (`name`, `description`, `material_id`, `deadline`) VALUES ('Dart Assignment', 'Create a simple mobile application using Dart', 8, '2021-01-10 00:00:00');
INSERT INTO `assignment` (`name`, `description`, `material_id`, `deadline`) VALUES ('Firebase Assignment', 'Create a simple mobile application using Firebase', 9, '2021-01-10 00:00:00');
INSERT INTO `assignment` (`name`, `description`, `material_id`, `deadline`) VALUES ('Python Assignment', 'Create a simple data analysis using Python', 10, '2021-01-10 00:00:00');
INSERT INTO `assignment` (`name`, `description`, `material_id`, `deadline`) VALUES ('Pandas Assignment', 'Create a simple data analysis using Pandas', 11, '2021-01-10 00:00:00');
INSERT INTO `assignment` (`name`, `description`, `material_id`, `deadline`) VALUES ('Numpy Assignment', 'Create a simple data analysis using Numpy', 12, '2021-01-10 00:00:00');

INSERT INTO `submission` (`assignment_id`, `user_id`, `submission_description`, `uploaded_file`, `date_submitted`) VALUES (1, 3, 'This is my HTML assignment', 'https://www.youtube.com/watch?v=UB1O30fR-EE', '2021-01-10 00:00:00');
INSERT INTO `submission` (`assignment_id`, `user_id`, `submission_description`, `uploaded_file`, `date_submitted`) VALUES (2, 3, 'This is my CSS assignment', 'https://www.youtube.com/watch?v=UB1O30fR-EE', '2021-01-10 00:00:00');
INSERT INTO `submission` (`assignment_id`, `user_id`, `submission_description`, `uploaded_file`, `date_submitted`) VALUES (3, 3, 'This is my JavaScript assignment', 'https://www.youtube.com/watch?v=UB1O30fR-EE', '2021-01-10 00:00:00');
INSERT INTO `submission` (`assignment_id`, `user_id`, `submission_description`, `uploaded_file`, `date_submitted`) VALUES (4, 3, 'This is my React assignment', 'https://www.youtube.com/watch?v=UB1O30fR-EE', '2021-01-10 00:00:00');
INSERT INTO `submission` (`assignment_id`, `user_id`, `submission_description`, `uploaded_file`, `date_submitted`) VALUES (5, 3, 'This is my Angular assignment', 'https://www.youtube.com/watch?v=UB1O30fR-EE', '2021-01-10 00:00:00');
INSERT INTO `submission` (`assignment_id`, `user_id`, `submission_description`, `uploaded_file`, `date_submitted`) VALUES (6, 3, 'This is my Vue assignment', 'https://www.youtube.com/watch?v=UB1O30fR-EE', '2021-01-10 00:00:00');
INSERT INTO `submission` (`assignment_id`, `user_id`, `submission_description`, `uploaded_file`, `date_submitted`) VALUES (7, 3, 'This is my Flutter assignment', 'https://www.youtube.com/watch?v=UB1O30fR-EE', '2021-01-10 00:00:00');
INSERT INTO `submission` (`assignment_id`, `user_id`, `submission_description`, `uploaded_file`, `date_submitted`) VALUES (8, 3, 'This is my Dart assignment', 'https://www.youtube.com/watch?v=UB1O30fR-EE', '2021-01-10 00:00:00');
INSERT INTO `submission` (`assignment_id`, `user_id`, `submission_description`, `uploaded_file`, `date_submitted`) VALUES (9, 3, 'This is my Firebase assignment', 'https://www.youtube.com/watch?v=UB1O30fR-EE', '2021-01-10 00:00:00');
INSERT INTO `submission` (`assignment_id`, `user_id`, `submission_description`, `uploaded_file`, `date_submitted`) VALUES (10, 3, 'This is my Python assignment', 'https://www.youtube.com/watch?v=UB1O30fR-EE', '2021-01-10 00:00:00');
INSERT INTO `submission` (`assignment_id`, `user_id`, `submission_description`, `uploaded_file`, `date_submitted`) VALUES (11, 3, 'This is my Pandas assignment', 'https://www.youtube.com/watch?v=UB1O30fR-EE', '2021-01-10 00:00:00');
INSERT INTO `submission` (`assignment_id`, `user_id`, `submission_description`, `uploaded_file`, `date_submitted`) VALUES (12, 3, 'This is my Numpy assignment', 'https://www.youtube.com/watch?v=UB1O30fR-EE', '2021-01-10 00:00:00');
INSERT INTO `submission` (`assignment_id`, `user_id`, `submission_description`, `uploaded_file`, `date_submitted`) VALUES (1, 4, 'This is my HTML assignment', 'https://www.youtube.com/watch?v=UB1O30fR-EE', '2021-01-10 00:00:00');
INSERT INTO `submission` (`assignment_id`, `user_id`, `submission_description`, `uploaded_file`, `date_submitted`) VALUES (2, 4, 'This is my CSS assignment', 'https://www.youtube.com/watch?v=UB1O30fR-EE', '2021-01-10 00:00:00');
INSERT INTO `submission` (`assignment_id`, `user_id`, `submission_description`, `uploaded_file`, `date_submitted`) VALUES (3, 4, 'This is my JavaScript assignment', 'https://www.youtube.com/watch?v=UB1O30fR-EE', '2021-01-10 00:00:00');

INSERT INTO `exam` (`name`, `class_id`, `date_created`, `start_time`, `end_time`) VALUES ('HTML Exam', 1, '2021-01-01 00:00:00', '2021-01-10 00:00:00', '2021-01-10 01:00:00');
INSERT INTO `exam` (`name`, `class_id`, `date_created`, `start_time`, `end_time`) VALUES ('CSS Exam', 1, '2021-01-01 00:00:00', '2021-01-10 00:00:00', '2021-01-10 01:00:00');
INSERT INTO `exam` (`name`, `class_id`, `date_created`, `start_time`, `end_time`) VALUES ('JavaScript Exam', 1, '2021-01-01 00:00:00', '2021-01-10 00:00:00', '2021-01-10 01:00:00');
INSERT INTO `exam` (`name`, `class_id`, `date_created`, `start_time`, `end_time`) VALUES ('React Exam', 1, '2021-01-01 00:00:00', '2021-01-10 00:00:00', '2021-01-10 01:00:00');
INSERT INTO `exam` (`name`, `class_id`, `date_created`, `start_time`, `end_time`) VALUES ('Angular Exam', 1, '2021-01-01 00:00:00', '2021-01-10 00:00:00', '2021-01-10 01:00:00');
INSERT INTO `exam` (`name`, `class_id`, `date_created`, `start_time`, `end_time`) VALUES ('Vue Exam', 1, '2021-01-01 00:00:00', '2021-01-10 00:00:00', '2021-01-10 01:00:00');
INSERT INTO `exam` (`name`, `class_id`, `date_created`, `start_time`, `end_time`) VALUES ('Flutter Exam', 2, '2021-01-01 00:00:00', '2021-01-10 00:00:00', '2021-01-10 01:00:00');
INSERT INTO `exam` (`name`, `class_id`, `date_created`, `start_time`, `end_time`) VALUES ('Dart Exam', 2, '2021-01-01 00:00:00', '2021-01-10 00:00:00', '2021-01-10 01:00:00');
INSERT INTO `exam` (`name`, `class_id`, `date_created`, `start_time`, `end_time`) VALUES ('Firebase Exam', 2, '2021-01-01 00:00:00', '2021-01-10 00:00:00', '2021-01-10 01:00:00');
INSERT INTO `exam` (`name`, `class_id`, `date_created`, `start_time`, `end_time`) VALUES ('Python Exam', 3, '2021-01-01 00:00:00', '2021-01-10 00:00:00', '2021-01-10 01:00:00');
INSERT INTO `exam` (`name`, `class_id`, `date_created`, `start_time`, `end_time`) VALUES ('Pandas Exam', 3, '2021-01-01 00:00:00', '2021-01-10 00:00:00', '2021-01-10 01:00:00');
INSERT INTO `exam` (`name`, `class_id`, `date_created`, `start_time`, `end_time`) VALUES ('Numpy Exam', 3, '2021-01-01 00:00:00', '2021-01-10 00:00:00', '2021-01-10 01:00:00');

INSERT INTO `question` (`question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_answer`, `exam_id`) VALUES ('What is HTML?', 'A. Hyper Text Markup Language', 'B. Hyper Text Markup Library', 'C. Hyper Text Markup List', 'D. Hyper Text Markup Link', 'E. Hyper Text Markup Line', 'A', 1);
INSERT INTO `question` (`question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_answer`, `exam_id`) VALUES ('What is CSS?', 'A. Cascading Style Sheet', 'B. Cascading Style Script', 'C. Cascading Style System', 'D. Cascading Style Sheet', 'E. Cascading Style Sheet', 'A', 2);
INSERT INTO `question` (`question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_answer`, `exam_id`) VALUES ('What is CSS?', 'A. Cascading Style Sheet', 'B. Cascading Style Script', 'C. Cascading Style System', 'D. Cascading Style Sheet', 'E. Cascading Style Sheet', 'A', 2);
INSERT INTO `question` (`question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_answer`, `exam_id`) VALUES ('What is CSS?', 'A. Cascading Style Sheet', 'B. Cascading Style Script', 'C. Cascading Style System', 'D. Cascading Style Sheet', 'E. Cascading Style Sheet', 'A', 2);
INSERT INTO `question` (`question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_answer`, `exam_id`) VALUES ('What is JavaScript?', 'A. JavaScript', 'B. Java', 'C. Java Script', 'D. JavaScript', 'E. JavaScript', 'D', 3);
INSERT INTO `question` (`question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_answer`, `exam_id`) VALUES ('What is React?', 'A. React', 'B. React Native', 'C. React JS', 'D. React', 'E. React', 'C', 4);
INSERT INTO `question` (`question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_answer`, `exam_id`) VALUES ('What is Angular?', 'A. Angular', 'B. Angular JS', 'C. Angular 2', 'D. Angular', 'E. Angular', 'D', 5);
INSERT INTO `question` (`question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_answer`, `exam_id`) VALUES ('What is Vue?', 'A. Vue', 'B. Vue JS', 'C. Vue 2', 'D. Vue', 'E. Vue', 'B', 6);
INSERT INTO `question` (`question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_answer`, `exam_id`) VALUES ('What is Flutter?', 'A. Flutter', 'B. Flutter SDK', 'C. Flutter Engine', 'D. Flutter', 'E. Flutter', 'A', 7);
INSERT INTO `question` (`question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_answer`, `exam_id`) VALUES ('What is Dart?', 'A. Dart', 'B. Dart SDK', 'C. Dart Engine', 'D. Dart', 'E. Dart', 'D', 8);
INSERT INTO `question` (`question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_answer`, `exam_id`) VALUES ('What is Firebase?', 'A. Firebase', 'B. Firebase SDK', 'C. Firebase Engine', 'D. Firebase', 'E. Firebase', 'A', 9);
INSERT INTO `question` (`question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_answer`, `exam_id`) VALUES ('What is Python?', 'A. Python', 'B. Python SDK', 'C. Python Engine', 'D. Python', 'E. Python', 'A', 10);
INSERT INTO `question` (`question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_answer`, `exam_id`) VALUES ('What is Pandas?', 'A. Pandas', 'B. Pandas SDK', 'C. Pandas Engine', 'D. Pandas', 'E. Pandas', 'A', 11);
INSERT INTO `question` (`question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_answer`, `exam_id`) VALUES ('What is Numpy?', 'A. Numpy', 'B. Numpy SDK', 'C. Numpy Engine', 'D. Numpy', 'E. Numpy', 'A', 12);

INSERT INTO `exam_submission` (`exam_submission_description`, `date_submitted`, `exam_id`, `user_id`, `correct_answer`, `wrong_answer`, `score`) VALUES ('This is my HTML exam submission', '2021-01-10 00:00:00', 1, 3, 1, 4, 20);
INSERT INTO `exam_submission` (`exam_submission_description`, `date_submitted`, `exam_id`, `user_id`, `correct_answer`, `wrong_answer`, `score`) VALUES ('This is my CSS exam submission', '2021-01-10 00:00:00', 2, 3, 2, 3, 40);
INSERT INTO `exam_submission` (`exam_submission_description`, `date_submitted`, `exam_id`, `user_id`, `correct_answer`, `wrong_answer`, `score`) VALUES ('This is my JavaScript exam submission', '2021-01-10 00:00:00', 3, 3, 3, 2, 60);
