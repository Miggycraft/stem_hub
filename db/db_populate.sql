INSERT INTO lessons (title, description, content, video_url) VALUES
('Introduction to Programming', 'Learn the basics of programming with Python.', 'Programming is the process of creating a set of instructions that tell a computer how to perform a task...', 'https://example.com/videos/intro-to-programming.mp4'),
('The Solar System', 'Explore the planets and their characteristics.', 'The Solar System consists of the Sun and the objects that orbit it, including planets, moons, and asteroids...', 'https://example.com/videos/solar-system.mp4'),
('Basic Algebra', 'Understand the fundamentals of algebraic equations.', 'Algebra is a branch of mathematics that uses symbols and letters to represent numbers and quantities in formulas and equations...', 'https://example.com/videos/basic-algebra.mp4'),
('Electricity and Circuits', 'Learn how electricity flows and how circuits work.', 'Electricity is the flow of electrical charge, and circuits provide a path for this flow...', 'https://example.com/videos/electricity-circuits.mp4'),
('Introduction to Biology', 'Discover the basics of living organisms.', 'Biology is the study of life and living organisms, including their structure, function, growth, and evolution...', 'https://example.com/videos/intro-to-biology.mp4');


-- improve quizzes

-- Quiz for Lesson 1: Introduction to Programming
INSERT INTO quizzes (lesson_id, question, option_a, option_b, option_c, option_d, correct_answer) VALUES
(1, 'What is a variable in programming?', 'A type of loop', 'A container for storing data', 'A function', 'A programming language', 'B');

-- Quiz for Lesson 2: The Solar System
INSERT INTO quizzes (lesson_id, question, option_a, option_b, option_c, option_d, correct_answer) VALUES
(2, 'Which planet is known as the Red Planet?', 'Earth', 'Mars', 'Jupiter', 'Venus', 'B');

-- Quiz for Lesson 3: Basic Algebra
INSERT INTO quizzes (lesson_id, question, option_a, option_b, option_c, option_d, correct_answer) VALUES
(3, 'What is the value of x in the equation 2x + 3 = 7?', '1', '2', '3', '4', 'B');

-- Quiz for Lesson 4: Electricity and Circuits
INSERT INTO quizzes (lesson_id, question, option_a, option_b, option_c, option_d, correct_answer) VALUES
(4, 'What is the unit of electrical resistance?', 'Volt', 'Ampere', 'Ohm', 'Watt', 'C');

-- Quiz for Lesson 5: Introduction to Biology
INSERT INTO quizzes (lesson_id, question, option_a, option_b, option_c, option_d, correct_answer) VALUES
(5, 'What is the basic unit of life?', 'Cell', 'Atom', 'Molecule', 'Organ', 'A');