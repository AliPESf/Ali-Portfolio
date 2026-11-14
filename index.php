<?php
$status = isset($_GET['status']) ? $_GET['status'] : '';
require 'database.php';
$profile = $pdo->query("SELECT * FROM profile WHERE id = 1")->fetch(PDO::FETCH_ASSOC);
$skills = $pdo->query("SELECT * FROM skills ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);
$projects = $pdo->query("SELECT * FROM projects ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);
function e($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>try{document.documentElement.dataset.theme=localStorage.getItem("portfolio-theme")==="light"?"light":"dark"}catch(e){document.documentElement.dataset.theme="dark"}</script>
<title>Ali Alqunon | Portfolio</title>
<link rel="stylesheet" href="style.css?v=20">
<link rel="stylesheet" href="luxury.css?v=1">
<link rel="stylesheet" href="performance.css?v=1">
<script src="script.js?v=21" defer></script>
</head>
<body>
<canvas id="particles" aria-hidden="true"></canvas>
<header class="site-header"><nav class="navbar container" aria-label="Main navigation">
<a href="#home" class="logo">AQ<span>.</span></a>
<div class="nav-links"><a href="#home">Home</a><a href="#about">About</a><a href="#skills">Skills</a><a href="#projects">Projects</a><a href="#achievements">Achievements</a><a href="#contact">Contact</a></div>
<div class="nav-actions"><button id="theme-toggle" class="theme-toggle" type="button" aria-label="Switch to light mode" title="Switch theme"><span id="theme-icon">☀</span><span id="theme-label">Light</span></button><a href="#contact" class="nav-btn">Let's Talk</a></div>
</nav></header>
<main>
<section id="home" class="hero container glass-shell">
<div class="hero-content"><p class="eyebrow">WELCOME TO MY WORLD</p><h2 class="hero-name"><?= e($profile["name"]) ?></h2><h1>Building Digital <span>Experiences.</span></h1><p class="typing-line">I'm a <strong id="typing-text"></strong><span class="cursor">|</span></p><p class="hero-description"><?= e($profile["tagline"]) ?></p><div class="hero-buttons"><a class="btn btn-gold" href="#projects">Explore My Work</a><a class="btn btn-outline" href="#contact">Contact Me</a></div><div class="stats"><div><strong><?= count($projects) ?>+</strong><small>Projects</small></div><div><strong>02</strong><small>Game Engines</small></div><div><strong>SE</strong><small>Specialization</small></div></div></div>
<div class="hero-visual"><div class="photo-glow"></div><div class="photo-circle"><img src="profile.png" alt="Ali Alqunon" /></div><div class="photo-tag">SOFTWARE ENGINEER</div></div>
</section>
<section id="about" class="section container reveal glass-section">
<div class="section-heading"><p class="eyebrow">GET TO KNOW ME</p><h2>About <span>Me.</span></h2><p>Software Engineering • Game Development • Creative Technology</p></div>
<div class="about-layout"><div class="about-photo"><div class="about-photo-inner"><img src="profile.png" alt="Portrait of Ali Alqunon"></div><span class="about-photo-label">ALI ALQUNON</span></div>
<div class="about-copy"><p class="eyebrow">THE PERSON BEHIND THE PROJECTS</p><h3>Engineering ideas into <span>digital experiences.</span></h3>
<p><?= e($profile['about_one']) ?></p><p><?= e($profile['about_two']) ?></p>
<div class="about-tags"><span>Software Engineering</span><span>Game Development</span><span>Web Development</span></div>
<a class="btn btn-gold" href="cv.pdf" download>↓ Download CV</a></div></div></section>
<section id="skills" class="section container reveal glass-section"><div class="section-heading"><p class="eyebrow">WHAT I WORK WITH</p><h2>Technical <span>Skills.</span></h2><p>Engineering, development, and professional capabilities.</p></div>
<div class="skill-grid"><?php foreach ($skills as $i => $skill): ?><article class="info-card"><b><?= str_pad($i+1, 2, '0', STR_PAD_LEFT) ?></b><h3><?= e($skill['category']) ?></h3><p><?= e($skill['items']) ?></p></article><?php endforeach; ?></div></section>
<section id="projects" class="section container reveal glass-section"><div class="section-heading"><p class="eyebrow">SELECTED WORK</p><h2>Featured <span>Projects.</span></h2><p>Games, technology, and interactive experiences.</p></div>
<div class="project-grid"><?php foreach ($projects as $i => $project): ?><article class="info-card project"><div class="project-art project-art-<?= ($i % 4) + 1 ?>"><span><?= e($project['short_label']) ?></span></div><b><?= str_pad($i+1, 2, '0', STR_PAD_LEFT) ?> / <?= e($project['technology']) ?></b><h3><?= e($project['title']) ?></h3><p><?= e($project['description']) ?></p><span><?= e($project['highlight']) ?></span></article><?php endforeach; ?></div></section>

<section id="achievements" class="section container reveal glass-section">
  <div class="section-heading"><p class="eyebrow">MILESTONES & MOMENTS</p><h2>My <span>Achievements.</span></h2><p>Highlights from showcases, game demonstrations, training, and competitions.</p></div>
  <div class="achievement-grid">
    <figure class="achievement-card"><a href="assets/achievements/achievement-145722.png" target="_blank" rel="noopener"><img src="assets/achievements/achievement-145722.png" alt="University Technology Showcase" loading="lazy" decoding="async"></a><figcaption><h3>University Technology Showcase</h3><p>A technology showcase and project presentation at the university.</p></figcaption></figure>
    <figure class="achievement-card"><a href="assets/achievements/achievement-145748.png" target="_blank" rel="noopener"><img src="assets/achievements/achievement-145748.png" alt="Interactive Game Demonstration" loading="lazy" decoding="async"></a><figcaption><h3>Interactive Game Demonstration</h3><p>Visitors exploring an interactive game experience at a public event.</p></figcaption></figure>
    <figure class="achievement-card"><a href="assets/achievements/achievement-145804.png" target="_blank" rel="noopener"><img src="assets/achievements/achievement-145804.png" alt="Live Gameplay Experience" loading="lazy" decoding="async"></a><figcaption><h3>Live Gameplay Experience</h3><p>A live game demonstration with attendees and visitors.</p></figcaption></figure>
    <figure class="achievement-card"><a href="assets/achievements/achievement-145821.png" target="_blank" rel="noopener"><img src="assets/achievements/achievement-145821.png" alt="Game Development Instructor" loading="lazy" decoding="async"></a><figcaption><h3>Game Development Instructor</h3><p>Promotional poster for a game development training course using Unreal Engine 5 and Blueprints.</p></figcaption></figure>
    <figure class="achievement-card"><a href="assets/achievements/achievement-145837.png" target="_blank" rel="noopener"><img src="assets/achievements/achievement-145837.png" alt="Blueprints Training Session" loading="lazy" decoding="async"></a><figcaption><h3>Blueprints Training Session</h3><p>A training session introducing game development and Blueprints.</p></figcaption></figure>
    <figure class="achievement-card"><a href="assets/achievements/achievement-145906.png" target="_blank" rel="noopener"><img src="assets/achievements/achievement-145906.png" alt="Hackathon Recognition" loading="lazy" decoding="async"></a><figcaption><h3>Hackathon Recognition</h3><p>Fourth-place recognition at the AJA AI Hackathon.</p></figcaption></figure>
    <figure class="achievement-card"><a href="assets/achievements/achievement-145933.png" target="_blank" rel="noopener"><img src="assets/achievements/achievement-145933.png" alt="University Project Presentation" loading="lazy" decoding="async"></a><figcaption><h3>University Project Presentation</h3><p>Presenting a technology project to visitors at the university.</p></figcaption></figure>
  </div>
</section>
<section id="contact" class="section container reveal glass-section"><div class="section-heading"><p class="eyebrow">LET'S WORK TOGETHER</p><h2>Contact <span>Me.</span></h2><p>Have an idea or a project? Send me a message.</p><div class="direct-contact"><a href="mailto:<?= e($profile['email']) ?>"><?= e($profile['email']) ?></a><a href="tel:<?= e($profile['phone']) ?>"><?= e($profile['phone']) ?></a></div></div><form class="contact-form" method="post" action="send_message.php"><div class="form-grid"><label><span>Name *</span><input name="name" type="text" maxlength="100" placeholder="Your name" required></label><label><span>Email *</span><input name="email" type="email" maxlength="150" placeholder="Your email" required></label><label><span>Phone Number</span><input name="phone" type="tel" maxlength="30" placeholder="Your phone number"></label><label><span>Service of Interest</span><select name="service"><option value="">Select a service</option><option>Web Development</option><option>Game Development</option><option>Software Development</option><option>Other</option></select></label><label><span>Timeline</span><input name="timeline" type="text" maxlength="100" placeholder="e.g. 2 weeks"></label><label class="message-field"><span>Project Details *</span><textarea name="message" rows="5" maxlength="3000" placeholder="Tell me about your project..." required></textarea></label></div><div class="form-bottom"><p class="form-status" role="status"><?php if ($status === 'success') echo 'Your message has been saved successfully.'; elseif ($status === 'error') echo 'Could not save your message. Please try again.'; elseif ($status === 'invalid') echo 'Please check your name, email and message.'; ?></p><button class="btn btn-gold" type="submit">Send Message ↗</button></div></form></section>
</main>
<footer class="site-footer"><div class="container footer-inner"><a href="#home" class="logo">AQ<span>.</span></a><p>Building thoughtful software and digital experiences.</p><div class="footer-links"><a href="#home">Home</a><a href="#about">About</a><a href="#skills">Skills</a><a href="#projects">Projects</a><a href="#achievements">Achievements</a><a href="#contact">Contact</a></div><div class="social-links"><a href="mailto:<?= e($profile['email']) ?>" aria-label="Email">@</a></div><div class="footer-bottom"><span>© 2026 Ali Alqunon. All rights reserved.</span><span>Designed & developed by Ali Alqunon</span></div></div></footer>
</body>
</html>
