@extends('layouts.app')

@section('title', 'About Us - PETSROLOGY')

@section('styles')
<style>
    body {
        background: #f8f9fa;
    }

    .about-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    .hero-section {
        background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
        color: white;
        padding: 80px 40px;
        border-radius: 20px;
        margin-bottom: 60px;
        text-align: center;
        box-shadow: 0 10px 40px rgba(255,111,97,0.15);
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
        background-size: 40px 40px;
        animation: float 20s linear infinite;
    }

    @keyframes float {
        0% { transform: translate(0, 0) rotate(0deg); }
        100% { transform: translate(-40px, -40px) rotate(360deg); }
    }

    .hero-section h1 {
        font-size: 3.5rem;
        font-weight: 900;
        margin-bottom: 20px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        letter-spacing: 2px;
        position: relative;
        z-index: 2;
    }

    .hero-section p {
        font-size: 1.3rem;
        line-height: 1.8;
        opacity: 0.95;
        max-width: 800px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .mission-section {
        background: white;
        padding: 60px 40px;
        border-radius: 20px;
        margin-bottom: 60px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.08);
        border: 1px solid #f0f0f0;
    }

    .mission-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }

    .mission-text h2 {
        color: #ff6f61;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 25px;
    }

    .mission-text p {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #666;
        margin-bottom: 20px;
    }

    .mission-values {
        display: grid;
        gap: 25px;
    }

    .value-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 20px;
        background: #fff;
        border-radius: 15px;
        border-left: 4px solid #ff6f61;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255,111,97,0.08);
    }

    .value-item:hover {
        transform: translateX(10px);
        box-shadow: 0 8px 25px rgba(255,111,97,0.15);
    }

    .value-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        box-shadow: 0 4px 15px rgba(255,111,97,0.3);
    }

    .value-content h3 {
        color: #ff6f61;
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .value-content p {
        color: #666;
        margin: 0;
        font-size: 0.95rem;
    }

    .team-section {
        text-align: center;
        margin-bottom: 60px;
    }

    .team-section h2 {
        color: #ff6f61;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .team-section p {
        font-size: 1.1rem;
        color: #666;
        margin-bottom: 50px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
        margin-top: 40px;
    }

    .team-member {
        background: white;
        padding: 30px 25px 35px;
        border-radius: 20px;
        text-align: center;
        box-shadow: 0 8px 30px rgba(0,0,0,0.08);
        border: 1px solid #f0f0f0;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 520px;
        justify-content: space-between;
    }

    .team-member::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #ff6f61, #ff9472);
        transition: left 0.5s ease;
    }

    .team-member:hover::before {
        left: 0;
    }

    .team-member:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(255,111,97,0.15);
        border-color: #ff6f61;
    }

    .member-info {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .member-avatar {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        color: white;
        font-size: 3rem;
        box-shadow: 0 8px 25px rgba(255,111,97,0.25);
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
        flex-shrink: 0;
    }

    .member-photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        position: absolute;
        top: 0;
        left: 0;
    }

    .member-avatar .fas {
        position: relative;
        z-index: 1;
    }

    .team-member:hover .member-avatar {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 12px 35px rgba(255,111,97,0.35);
    }

    .member-name {
        color: #ff6f61;
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 8px;
        line-height: 1.2;
        min-height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .member-role {
        color: #ff9472;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 1px;
        min-height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .member-description {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.5;
        margin-bottom: 20px;
        flex: 1;
        min-height: 80px;
        display: flex;
        align-items: center;
        text-align: center;
        padding: 0 5px;
    }

    .member-skills {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 6px;
        margin-bottom: 20px;
        min-height: 60px;
        align-items: flex-start;
        align-content: flex-start;
    }

    .skill-tag {
        background: rgba(255,111,97,0.1);
        color: #ff6f61;
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
        border: 1px solid rgba(255,111,97,0.2);
        white-space: nowrap;
    }

    .member-social {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-top: auto;
        padding-top: 10px;
    }

    .social-link {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    .social-link.linkedin {
        background: #0077b5;
        color: white;
    }

    .social-link.linkedin:hover {
        background: #005885;
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0,119,181,0.3);
    }

    .social-link.github {
        background: #333;
        color: white;
    }

    .social-link.github:hover {
        background: #000;
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.3);
    }

    .contact-section {
        background: linear-gradient(135deg, #ff9472 0%, #ff6f61 100%);
        color: white;
        padding: 60px 40px;
        border-radius: 20px;
        text-align: center;
        box-shadow: 0 10px 40px rgba(255,111,97,0.15);
    }

    .contact-section h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .contact-section p {
        font-size: 1.1rem;
        opacity: 0.95;
        margin-bottom: 30px;
        line-height: 1.8;
    }

    .contact-btn {
        background: white;
        color: #ff6f61;
        padding: 15px 40px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 4px 15px rgba(255,255,255,0.3);
    }

    .contact-btn:hover {
        background: rgba(255,255,255,0.9);
        color: #e65c50;
        text-decoration: none;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255,255,255,0.4);
    }

    @media (max-width: 968px) {
        .mission-content {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .team-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        .hero-section h1 {
            font-size: 2.5rem;
        }

        .hero-section p {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 576px) {
        .team-grid {
            grid-template-columns: 1fr;
        }

        .about-container {
            padding: 20px 10px;
        }

        .hero-section,
        .mission-section,
        .contact-section {
            padding: 40px 20px;
        }
    }
</style>
@endsection

@section('content')
<div class="about-container">
    <!-- Hero Section -->
    <section class="hero-section">
        <h1>About PETSROLOGY</h1>
        <p>We are passionate about connecting loving families with pets in need, providing comprehensive veterinary care, and creating a better world for all animals. Our mission is to build a community where every pet finds a loving home and receives the care they deserve.</p>
    </section>

    <!-- Mission Section -->
    <section class="mission-section">
        <div class="mission-content">
            <div class="mission-text">
                <h2>Our Mission & Vision</h2>
                <p>At PETSROLOGY, we believe that every animal deserves a chance at happiness. We're dedicated to revolutionizing pet adoption, veterinary care, and pet supply services through technology and compassion.</p>
                <p>Our vision is to create a world where no pet goes without love, care, or a home. We strive to make pet adoption accessible, veterinary care affordable, and pet ownership a joyful experience for everyone.</p>
            </div>
            <div class="mission-values">
                <div class="value-item">
                    <div class="value-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="value-content">
                        <h3>Compassion First</h3>
                        <p>Every decision we make is guided by our love for animals and commitment to their wellbeing.</p>
                    </div>
                </div>
                <div class="value-item">
                    <div class="value-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="value-content">
                        <h3>Community Driven</h3>
                        <p>We build strong connections between pet owners, veterinarians, and animal lovers.</p>
                    </div>
                </div>
                <div class="value-item">
                    <div class="value-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="value-content">
                        <h3>Trust & Safety</h3>
                        <p>We ensure the highest standards of safety and reliability in all our services.</p>
                    </div>
                </div>
                <div class="value-item">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <div class="value-content">
                        <h3>Innovation</h3>
                        <p>We leverage technology to make pet care and adoption more accessible and efficient.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <h2>Meet Our Development Team</h2>
        <p>Our dedicated team of developers and designers work tirelessly to bring you the best pet care platform experience.</p>
        
        <div class="team-grid">
            <div class="team-member">
                <div class="member-info">
                    <div class="member-avatar">
                        <img src="{{ asset('images/team/tuly.jpg') }}" alt="Tanjina Ahmed Tuly" class="member-photo" 
                             onerror="this.style.display='none'; this.parentElement.querySelector('.fas').style.display='flex';">
                        <i class="fas fa-user-tie" style="display: none;"></i>
                    </div>
                    <h3 class="member-name">Tanjina Ahmed Tuly</h3>
                    <p class="member-role">Lead Full-Stack Developer</p>
                    <p class="member-description">Passionate about creating seamless user experiences and robust backend systems. Specializes in Laravel and modern web technologies.</p>
                    <div class="member-skills">
                        <span class="skill-tag">PHP</span>
                        <span class="skill-tag">Laravel</span>
                        <span class="skill-tag">JavaScript</span>
                        <span class="skill-tag">MySQL</span>
                    </div>
                </div>
                <div class="member-social">
                    <a href="https://linkedin.com/in/alex-johnson-dev" target="_blank" class="social-link linkedin">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://github.com/alex-johnson" target="_blank" class="social-link github">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>

            <div class="team-member">
                <div class="member-info">
                    <div class="member-avatar">
                        <img src="{{ asset('images/team/shafin.png') }}" alt="Tanjid Ahammed Shafin" class="member-photo" 
                             onerror="this.style.display='none'; this.parentElement.querySelector('.fas').style.display='flex';">
                        <i class="fas fa-paint-brush" style="display: none;"></i>
                    </div>
                    <h3 class="member-name">Tanjid Ahammed Shafin</h3>
                    <p class="member-role">Full Stack Developer</p>
                    <p class="member-description">Creates beautiful and intuitive designs that make pet adoption and care accessible to everyone. Expert in user-centered design principles.</p>
                    <div class="member-skills">
                        <span class="skill-tag">UI Design</span>
                        <span class="skill-tag">UX Research</span>
                        <span class="skill-tag">Figma</span>
                        <span class="skill-tag">CSS</span>
                    </div>
                </div>
                <div class="member-social">
                    <a href="https://linkedin.com/in/sarah-chen-design" target="_blank" class="social-link linkedin">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://github.com/sarah-chen" target="_blank" class="social-link github">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>

            <div class="team-member">
                <div class="member-info">
                    <div class="member-avatar">
                        <img src="{{ asset('images/team/jamil.jpg') }}" alt="Jamil Hasan" class="member-photo" 
                             onerror="this.style.display='none'; this.parentElement.querySelector('.fas').style.display='flex';">
                        <i class="fas fa-code" style="display: none;"></i>
                    </div>
                    <h3 class="member-name">Jamil Hasan</h3>
                    <p class="member-role">Frontend Developer</p>
                    <p class="member-description">Brings designs to life with clean, responsive code. Focuses on performance optimization and modern JavaScript frameworks.</p>
                    <div class="member-skills">
                        <span class="skill-tag">React</span>
                        <span class="skill-tag">Vue.js</span>
                        <span class="skill-tag">CSS3</span>
                        <span class="skill-tag">TypeScript</span>
                    </div>
                </div>
                <div class="member-social">
                    <a href="https://linkedin.com/in/michael-rodriguez-frontend" target="_blank" class="social-link linkedin">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://github.com/michael-rodriguez" target="_blank" class="social-link github">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>

            <div class="team-member">
                <div class="member-info">
                    <div class="member-avatar">
                        <img src="{{ asset('images/team/T2.jpg') }}" alt="Tamal" class="member-photo" 
                             onerror="this.style.display='none'; this.parentElement.querySelector('.fas').style.display='flex';">
                        <i class="fas fa-database" style="display: none;"></i>
                    </div>
                    <h3 class="member-name">Jahangir Alam Tamal</h3>
                    <p class="member-role">Full Stack Developer & AI Engineer</p>
                    <p class="member-description">Ensures our platform runs smoothly with scalable architecture and secure data management. Expert in API development and cloud services.</p>
                    <div class="member-skills">
                        <span class="skill-tag">Node.js</span>
                        <span class="skill-tag">MySQL</span>
                        <span class="skill-tag">Laravel</span>
                        <span class="skill-tag">Flutter</span>
                    </div>
                </div>
                <div class="member-social">
                    <a href="https://www.linkedin.com/in/jahangir-alam-tamal-8815a8268/" target="_blank" class="social-link linkedin">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://github.com/fiftee15n" target="_blank" class="social-link github">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <h2>Let's Connect</h2>
        <p>Have questions about our platform or want to get involved? We'd love to hear from you. Join our mission to make the world a better place for pets and their families.</p>
        <a href="{{ route('contact') }}" class="contact-btn">
            <i class="fas fa-envelope"></i>
            Get In Touch
        </a>
    </section>
</div>
@endsection
