
CREATE TABLE IF NOT EXISTS profile (
    id INT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    tagline TEXT NOT NULL,
    about_one TEXT NOT NULL,
    about_two TEXT NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(100) NOT NULL,
    items TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    technology VARCHAR(100) NOT NULL,
    short_label VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    highlight VARCHAR(200) NOT NULL
);

CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(30),
    service VARCHAR(100),
    timeline VARCHAR(100),
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DELETE FROM profile;
DELETE FROM skills;
DELETE FROM projects;

INSERT INTO profile VALUES (
    1,
    'Ali Alqunon',
    'I develop immersive games, innovative software, and interactive experiences that turn creative ideas into reality.',
    'I am an enthusiastic Software Engineering student pursuing a bachelor’s degree, with a strong interest in technology, software development, and creative problem-solving. My academic work has built a foundation in development methodologies, system analysis, testing, and database design.',
    'I specialize in bringing game ideas to life through engaging mechanics and interactive storytelling. My projects have been showcased at university and public events, and Journey of Social Interaction reached the top 10 finalists in the Future Technologies Competition. I enjoy teamwork, communicating technical ideas, and creating technology with a positive impact.',
    'alif72140@gmail.com',
    '+966558284284'
);

INSERT INTO skills (category, items) VALUES
('Software Engineering', 'Coding, Software Development, Debugging, System Analysis, Software Testing'),
('Game Development', 'Unreal Engine 5, Blueprints, Gameplay Mechanics, Optimization'),
('Web & Database', 'HTML, CSS, JavaScript, PHP, MySQL, Database Design'),
('Technical Foundations', 'Networking Basics, Reporting, Microsoft Office'),
('Professional Skills', 'Teamwork, Organization, Communication, Problem Solving'),
('Work Habits', 'Time Management, Attention to Detail');

INSERT INTO projects (
    title,
    technology,
    short_label,
    description,
    highlight
) VALUES
(
    'The Road',
    'UNREAL ENGINE',
    'THE ROAD',
    'A cinematic game project exploring atmospheric environments, immersive storytelling, and interactive gameplay.',
    'Cinematic Game Development'
),
(
    'Journey of Social Interaction',
    'CONVAI / GAME AI',
    'SOCIAL INTERACTION',
    'A social simulation game designed to help people practice challenging everyday interactions. Players speak with NPCs through a microphone and ConvAI, including scenarios such as negotiating taxi fares and changing hotel reservations.',
    'Top 10 Finalist — Future Technologies Competition; showcased at the International Rally in Hail and presented to a Ministry delegation'
),
(
    'Operation Outbreak',
    'UNREAL ENGINE / BLUEPRINTS',
    'OPERATION OUTBREAK',
    'A narrative-driven zombie survival game set in a military hospital. Players take the role of Michael, explore eerie corridors, solve puzzles, and uncover a mystery linked to the former hospital director.',
    'Showcased at International Students Day — University of Hail'
),
(
    'Laura’s Adventures',
    'UNREAL ENGINE 5',
    'LAURA’S ADVENTURES',
    'A 3D adventure game created to strengthen game development skills and explore interactive environments and gameplay.',
    'Presented at the Saudi National Day celebration — College of Computer Science'
);
