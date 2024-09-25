<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zebservice - Build Your Web Presence</title>
    <style>
        :root {
            --primary-color: #4a90e2;
            --secondary-color: #f5a623;
            --text-color: #333;
            --light-bg: #f8f9fa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        header {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        .nav-links a {
            margin-left: 1.5rem;
            text-decoration: none;
            color: var(--text-color);
        }

        .hero {
            background-color: var(--light-bg);
            padding: 8rem 0 4rem;
            text-align: center;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .cta-button {
            display: inline-block;
            background-color: var(--primary-color);
            color: #fff;
            padding: 0.8rem 2rem;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #3a7bd5;
        }

        .features {
            padding: 4rem 0;
        }

        .features h2 {
            text-align: center;
            margin-bottom: 3rem;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .feature-item {
            text-align: center;
            padding: 1.5rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .feature-item h3 {
            margin: 1rem 0;
        }

        .pricing {
            background-color: var(--light-bg);
            padding: 4rem 0;
        }

        .pricing h2 {
            text-align: center;
            margin-bottom: 3rem;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .pricing-plan {
            background-color: #fff;
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .pricing-plan h3 {
            margin-bottom: 1rem;
        }

        .pricing-plan .price {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .pricing-plan ul {
            list-style-type: none;
            margin-bottom: 2rem;
        }

        footer {
            background-color: var(--text-color);
            color: #fff;
            text-align: center;
            padding: 2rem 0;
        }
    </style>
</head>
<body>
<header>
    <nav class="container">
        <div class="logo">Zebservice</div>
        <div class="nav-links">
            <a href="#features">Features</a>
            <a href="#pricing">Pricing</a>
            <a href="#contact">Contact</a>
        </div>
    </nav>
</header>

<main>
    <section class="hero">
        <div class="container">
            <h1>Build Your Web Presence with Zebservice</h1>
            <p>Create stunning websites and powerful web applications with ease</p>
            <a href="#" class="cta-button">Get Started</a>
        </div>
    </section>

    <section id="features" class="features">
        <div class="container">
            <h2>Why Choose Zebservice</h2>
            <div class="feature-grid">
                <div class="feature-item">
                    <h3>Intuitive Builder</h3>
                    <p>Drag-and-drop interface for effortless design</p>
                </div>
                <div class="feature-item">
                    <h3>Responsive Templates</h3>
                    <p>Mobile-friendly designs for all devices</p>
                </div>
                <div class="feature-item">
                    <h3>Custom Functionality</h3>
                    <p>Add advanced features with our app marketplace</p>
                </div>
                <div class="feature-item">
                    <h3>SEO Optimization</h3>
                    <p>Built-in tools to improve your search rankings</p>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing" class="pricing">
        <div class="container">
            <h2>Choose Your Plan</h2>
            <div class="pricing-grid">
                <div class="pricing-plan">
                    <h3>Basic</h3>
                    <div class="price">$9.99/mo</div>
                    <ul>
                        <li>1 Website</li>
                        <li>5GB Storage</li>
                        <li>Basic Templates</li>
                        <li>Community Support</li>
                    </ul>
                    <a href="#" class="cta-button">Select Plan</a>
                </div>
                <div class="pricing-plan">
                    <h3>Pro</h3>
                    <div class="price">$24.99/mo</div>
                    <ul>
                        <li>5 Websites</li>
                        <li>20GB Storage</li>
                        <li>Premium Templates</li>
                        <li>Priority Support</li>
                    </ul>
                    <a href="#" class="cta-button">Select Plan</a>
                </div>
                <div class="pricing-plan">
                    <h3>Enterprise</h3>
                    <div class="price">Custom</div>
                    <ul>
                        <li>Unlimited Websites</li>
                        <li>Unlimited Storage</li>
                        <li>Custom Development</li>
                        <li>24/7 Dedicated Support</li>
                    </ul>
                    <a href="#" class="cta-button">Contact Sales</a>
                </div>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="container">
        <p>&copy; 2024 Zebservice. All rights reserved.</p>
    </div>
</footer>

<script>
    // Simple JavaScript for smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Highlight active nav link
    window.addEventListener('scroll', () => {
        let current = '';
        document.querySelectorAll('section').forEach(section => {
            const sectionTop = section.offsetTop;
            if (pageYOffset >= sectionTop - 60) {
                current = section.getAttribute('id');
            }
        });

        document.querySelectorAll('.nav-links a').forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').substring(1) === current) {
                link.classList.add('active');
            }
        });
    });
</script>
</body>
</html>
