const words = ['Software Engineer', 'Game Developer', 'Creative Developer'];
const typingText = document.getElementById('typing-text');
let wordIndex = 0;
let letterIndex = 0;
let deleting = false;
function typeText() {
    if (!typingText) return;
    const word = words[wordIndex];
    letterIndex += deleting ? -1 : 1;
    typingText.textContent = word.substring(0, letterIndex);
    let speed = deleting ? 55 : 100;
    if (letterIndex === word.length && !deleting) {
        deleting = true;
        speed = 1600;
    } else if (letterIndex === 0 && deleting) {
        deleting = false;
        wordIndex = (wordIndex + 1) % words.length;
        speed = 400;
    }
    setTimeout(typeText, speed);
}
typeText();

const canvas = document.getElementById('particles');
const ctx = canvas ? canvas.getContext('2d', { alpha: true }) : null;
const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
const particles = [];
let lastFrame = 0;
function resizeCanvas() {
    if (!canvas) return;
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}
if (ctx) {
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas, { passive: true });
    const count = window.innerWidth < 700 ? 10 : 22;
    for (let i = 0; i < count; i++) {
        particles.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            radius: Math.random() * 1.2 + 0.4,
            speed: Math.random() * 0.3 + 0.08,
            opacity: Math.random() * 0.35 + 0.15
        });
    }
    function animateParticles(time) {
        requestAnimationFrame(animateParticles);
        if (document.hidden || reducedMotion.matches || time - lastFrame < 33) return;
        lastFrame = time;
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        const rgb = document.documentElement.dataset.theme === 'light' ? '155,114,47' : '208,170,107';
        particles.forEach(function(p) {
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
            ctx.fillStyle = 'rgba(' + rgb + ',' + p.opacity + ')';
            ctx.fill();
            p.y -= p.speed;
            if (p.y < 0) { p.y = canvas.height; p.x = Math.random() * canvas.width; }
        });
    }
    if (!reducedMotion.matches) requestAnimationFrame(animateParticles);
}

const sections = document.querySelectorAll('.reveal');
if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    sections.forEach(function(section) { observer.observe(section); });
} else {
    sections.forEach(function(section) { section.classList.add('visible'); });
}

const themeButton = document.getElementById('theme-toggle');
const themeIcon = document.getElementById('theme-icon');
const themeLabel = document.getElementById('theme-label');
function updateThemeButton() {
    const isLight = document.documentElement.dataset.theme === 'light';
    themeIcon.textContent = isLight ? '☾' : '☀';
    themeLabel.textContent = isLight ? 'Dark' : 'Light';
    themeButton.setAttribute('aria-label', isLight ? 'Switch to dark mode' : 'Switch to light mode');
}
updateThemeButton();
themeButton.addEventListener('click', function() {
    const next = document.documentElement.dataset.theme === 'light' ? 'dark' : 'light';
    document.documentElement.dataset.theme = next;
    try { localStorage.setItem('portfolio-theme', next); } catch(e) {}
    updateThemeButton();
});
