

INSERT INTO lessons (title, description, content, video_url) VALUES
('Introduction to Programming', 'Learn the basics of programming with Python.', 
'Programming is the process of creating a set of instructions that tell a computer how to perform a task. Python is a high-level, interpreted language known for its readability and simplicity. Key concepts include variables, data types, loops, and functions. Writing clean and efficient code is essential for software development.

Python uses indentation to define blocks of code, making it visually distinct from other languages that use curly brackets. One of the major advantages of Python is its vast ecosystem of libraries, including NumPy for numerical computing, Pandas for data analysis, and TensorFlow for machine learning. Learning to debug and optimize your code is crucial for writing effective programs.

Common programming paradigms include procedural, object-oriented, and functional programming. Python supports all three, making it a versatile language for various applications, from web development to artificial intelligence.', 'https://www.example.com/python_intro_video'),

('The Solar System', 'Explore the planets and their characteristics.', 
'The Solar System consists of the Sun and the objects that orbit it, including eight planets: Mercury, Venus, Earth, Mars, Jupiter, Saturn, Uranus, and Neptune. Each planet has unique characteristics, such as composition, atmosphere, and orbit. Moons, asteroids, and comets also play a significant role in the solar system.

Mercury, the smallest planet, is closest to the Sun and has no atmosphere, leading to extreme temperature fluctuations. Venus, similar in size to Earth, has a thick atmosphere of carbon dioxide, creating a runaway greenhouse effect. Earth, the only known planet to support life, has liquid water and a protective atmosphere. Mars, the "Red Planet," has the largest volcano in the solar system, Olympus Mons.

Beyond the terrestrial planets, gas giants like Jupiter and Saturn dominate with their massive size and thick atmospheres. Jupiter has the Great Red Spot, a storm persisting for centuries, while Saturn is famous for its intricate ring system. Uranus and Neptune, the ice giants, have atmospheres rich in methane, giving them a blue hue.', 'https://www.example.com/solar_system_video'),

('Basic Algebra', 'Understand the fundamentals of algebraic equations.', 
'Algebra is a branch of mathematics that uses symbols and letters to represent numbers and quantities in formulas and equations. It is foundational for higher-level math and includes concepts such as variables, expressions, equations, and inequalities.

One of the core principles of algebra is solving for unknown values, represented by variables like x or y. Equations such as 2x + 3 = 7 require isolating the variable to determine its value. The properties of operations, including the associative, commutative, and distributive properties, are essential for simplifying expressions.

Factoring is another key concept, allowing complex expressions to be broken down into simpler components. For example, the quadratic equation ax^2 + bx + c = 0 can be solved using the quadratic formula or factoring techniques. Algebra also plays a crucial role in real-world applications, including finance, engineering, and computer science.', 'https://www.example.com/algebra_basics_video'),

('Electricity and Circuits', 'Learn how electricity flows and how circuits work.', 
'Electricity is the flow of electrical charge, and circuits provide paths for the movement of electrons. Basic components of a circuit include resistors, capacitors, batteries, and switches. Ohm’s Law and Kirchhoff’s laws are fundamental principles governing electrical circuits.

Ohm’s Law states that voltage (V) is equal to current (I) times resistance (R), expressed as V = IR. This principle is crucial for designing electrical systems. Series and parallel circuits behave differently: in a series circuit, components share the same current, whereas in a parallel circuit, they share the same voltage.

Capacitors store energy in an electric field, while inductors store energy in a magnetic field. Understanding the behavior of these components is essential for designing electronic devices. Advanced topics include semiconductor devices like diodes and transistors, which form the basis of modern electronics. Electricity is also used in power grids, renewable energy systems, and digital circuits that power computers and smartphones.', 'https://www.example.com/electricity_circuits_video');

INSERT INTO quizzes (lesson_id, question, option_a, option_b, option_c, option_d, correct_answer) VALUES
(1, 'Which of the following is a high-level programming language?', 'Assembly', 'Python', 'Machine Code', 'Binary', 'B'),
(1, 'What is a variable in programming?', 'A constant value', 'A placeholder for storing data', 'An operator', 'A function', 'B'),
(1, 'Which of these is a valid Python data type?', 'Integer', 'Float', 'String', 'All of the above', 'D'),
(1, 'What is the purpose of a function in programming?', 'To store a single value', 'To define a block of reusable code', 'To perform division', 'To compile a program', 'B'),
(2, 'Which planet is closest to the Sun?', 'Mars', 'Venus', 'Mercury', 'Earth', 'C'),
(2, 'What is the largest planet in the Solar System?', 'Earth', 'Jupiter', 'Saturn', 'Neptune', 'B'),
(2, 'Which planet is known as the Red Planet?', 'Venus', 'Mars', 'Jupiter', 'Neptune', 'B'),
(2, 'What celestial body orbits planets?', 'Star', 'Asteroid', 'Moon', 'Comet', 'C'),
(3, 'What does x represent in the equation 2x + 5 = 11?', '2', '3', '4', '5', 'B'),
(3, 'Which of the following is a basic property of algebra?', 'Multiplication Law', 'Associative Property', 'Newton’s Law', 'Pythagorean Theorem', 'B'),
(3, 'What is the solution to x^2 - 4 = 0?', '-2 and 2', '-4 and 4', '-1 and 1', '0', 'A'),
(3, 'What is the term for an equation that contains an unknown value?', 'Expression', 'Identity', 'Formula', 'Variable equation', 'D'),
(4, 'What is the unit of electrical resistance?', 'Volt', 'Watt', 'Ohm', 'Ampere', 'C'),
(4, 'What component stores energy in an electric field?', 'Capacitor', 'Resistor', 'Inductor', 'Battery', 'A'),
(4, 'Which law states that V = IR?', 'Newton’s Law', 'Ohm’s Law', 'Kirchhoff’s Law', 'Faraday’s Law', 'B'),
(4, 'In a series circuit, what remains constant across all components?', 'Voltage', 'Current', 'Resistance', 'Power', 'B');