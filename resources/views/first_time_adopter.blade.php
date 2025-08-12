@extends('layouts.app')

@section('title', 'First-Time Pet Adopter Guide - PETSROLOGY')

@section('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            margin: 0;
            padding: 0;
        }

        /* Header Styles */
        header {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            text-align: center;
            padding: 80px 0 60px;
            box-shadow: 0 4px 20px rgba(40, 167, 69, 0.2);
            position: relative;
            overflow: hidden;
            margin: 0;
            margin-top: 0;
            width: 100vw;
            margin-left: calc(-50vw + 50%);
        }

        header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="rgba(255,255,255,0.05)"><path d="M0,50 Q250,0 500,50 T1000,50 L1000,100 L0,100 Z"/></svg>') repeat-x;
            background-size: 1000px 100px;
        }

        .back-btn {
            position: absolute;
            top: 20px;
            left: 10px;
            background: rgba(255,255,255,0.2);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            z-index: 10;
        }

        .back-btn:hover {
            background: rgba(255,255,255,0.3);
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
        }

        .header-icon-container {
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }

        .header-icon {
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.15);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255,255,255,0.2);
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        }

        .header-icon span {
            font-size: 2.5rem;
        }

        header h1 {
            font-size: 3.2rem;
            margin-bottom: 15px;
            font-weight: 800;
            letter-spacing: 1.5px;
            position: relative;
            z-index: 1;
        }

        header p {
            font-size: 1.3rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 50px 20px;
        }

        /* Section Styles */
        .section {
            margin-bottom: 60px;
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.05);
            border: 1px solid rgba(40, 167, 69, 0.1);
            position: relative;
            overflow: hidden;
        }

        .section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        }

        .section-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: #28a745;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .section-title i {
            font-size: 2rem;
            color: #20c997;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 30px;
            line-height: 1.8;
        }

        /* Quiz Section */
        .quiz-container {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 40px;
        }

        .quiz-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #28a745;
            margin-bottom: 20px;
            text-align: center;
        }

        .quiz-question {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            display: none;
        }

        .quiz-question.active {
            display: block;
        }

        .question-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .quiz-options {
            display: grid;
            gap: 12px;
        }

        .quiz-option {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 15px 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .quiz-option:hover {
            background: #e3f2fd;
            border-color: #28a745;
        }

        .quiz-option.selected {
            background: #d4edda;
            border-color: #28a745;
            color: #155724;
        }

        .quiz-option input[type="radio"] {
            display: none;
        }

        .quiz-option .radio-custom {
            width: 20px;
            height: 20px;
            border: 2px solid #28a745;
            border-radius: 50%;
            position: relative;
        }

        .quiz-option.selected .radio-custom::after {
            content: '';
            width: 10px;
            height: 10px;
            background: #28a745;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .quiz-navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }

        .quiz-btn {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .quiz-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.3);
        }

        .quiz-btn:disabled {
            background: #6c757d;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .quiz-progress {
            flex: 1;
            margin: 0 20px;
            text-align: center;
            color: #666;
            font-weight: 600;
        }

        /* Pet Type Cards */
        .pet-types-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .pet-type-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border: 2px solid transparent;
            cursor: pointer;
        }

        .pet-type-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            border-color: #28a745;
        }

        .pet-type-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            display: block;
        }

        .pet-type-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }

        .pet-type-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .difficulty-level {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .difficulty-easy {
            background: #d4edda;
            color: #155724;
        }

        .difficulty-medium {
            background: #fff3cd;
            color: #856404;
        }

        .difficulty-hard {
            background: #f8d7da;
            color: #721c24;
        }

        /* Checklist Section */
        .checklist-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .checklist-category {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            padding: 25px;
            border-left: 5px solid #28a745;
        }

        .checklist-category h3 {
            color: #28a745;
            font-size: 1.3rem;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .checklist-items {
            list-style: none;
            padding: 0;
        }

        .checklist-items li {
            margin-bottom: 12px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .checklist-items li i {
            color: #28a745;
            margin-top: 2px;
            font-size: 0.9rem;
        }

        /* FAQ Section */
        .faq-container {
            margin-top: 30px;
        }

        .faq-item {
            background: white;
            border-radius: 12px;
            margin-bottom: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        .faq-question {
            background: #f8f9fa;
            padding: 20px 25px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            color: #333;
            transition: background 0.3s ease;
        }

        .faq-question:hover {
            background: #e9ecef;
        }

        .faq-question i {
            color: #28a745;
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        .faq-answer {
            padding: 0 25px;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-item.active .faq-answer {
            padding: 20px 25px;
            max-height: 200px;
        }

        .faq-answer p {
            color: #666;
            line-height: 1.6;
            margin: 0;
        }

        /* Results Section */
        .results-container {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            display: none;
        }

        .results-container.show {
            display: block;
        }

        .results-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #155724;
            margin-bottom: 15px;
        }

        .results-subtitle {
            color: #155724;
            margin-bottom: 25px;
            font-size: 1.1rem;
        }

        .recommended-pet {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin: 20px 0;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .action-btn {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.3);
            color: white;
            text-decoration: none;
        }

        .action-btn.secondary {
            background: transparent;
            color: #28a745;
            border: 2px solid #28a745;
        }

        .action-btn.secondary:hover {
            background: #28a745;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            

            header {
                padding: 60px 20px 40px;
            }

            header h1 {
                font-size: 2.5rem;
            }

            .main-content {
                padding: 30px 15px;
            }

            .section {
                padding: 25px 20px;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .pet-types-grid {
                grid-template-columns: 1fr;
            }

            .checklist-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .quiz-navigation {
                flex-direction: column;
                gap: 15px;
            }

            .quiz-progress {
                margin: 0;
            }
        }
    </style>
@endsection

@section('content')
    <header>
        <a href="{{ url('/adopt-home') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Back to Adoption
        </a>
        <div class="header-content">
            <div class="header-icon-container">
                <div class="header-icon">
                    <span>🎓</span>
                </div>
            </div>
            <h1>First-Time Pet Adopter Guide</h1>
            <p>Your complete guide to finding the perfect companion and becoming a responsible pet parent</p>
        </div>
    </header>

    <div class="main-content">
        <!-- Pet Readiness Quiz Section -->
        <section class="section">
            <h2 class="section-title">
                <i class="fas fa-clipboard-check"></i>
                Pet Readiness Quiz
            </h2>
            <p class="section-subtitle">
                Take this quick assessment to determine which type of pet might be the best fit for your lifestyle and experience level.
            </p>

            <div class="quiz-container">
                <h3 class="quiz-title">Are You Ready for a Pet?</h3>
                
                <div class="quiz-question active" data-question="1">
                    <h4 class="question-title">1. How much time can you dedicate to pet care daily?</h4>
                    <div class="quiz-options">
                        <label class="quiz-option" data-value="low">
                            <input type="radio" name="time" value="low">
                            <span class="radio-custom"></span>
                            <span>Less than 1 hour - I have a very busy schedule</span>
                        </label>
                        <label class="quiz-option" data-value="medium">
                            <input type="radio" name="time" value="medium">
                            <span class="radio-custom"></span>
                            <span>1-3 hours - I can manage regular care routines</span>
                        </label>
                        <label class="quiz-option" data-value="high">
                            <input type="radio" name="time" value="high">
                            <span class="radio-custom"></span>
                            <span>3+ hours - I have plenty of time for training and play</span>
                        </label>
                    </div>
                </div>

                <div class="quiz-question" data-question="2">
                    <h4 class="question-title">2. What's your living situation?</h4>
                    <div class="quiz-options">
                        <label class="quiz-option" data-value="apartment">
                            <input type="radio" name="living" value="apartment">
                            <span class="radio-custom"></span>
                            <span>Small apartment - Limited space, no yard</span>
                        </label>
                        <label class="quiz-option" data-value="house-small">
                            <input type="radio" name="living" value="house-small">
                            <span class="radio-custom"></span>
                            <span>House with small yard - Moderate space</span>
                        </label>
                        <label class="quiz-option" data-value="house-large">
                            <input type="radio" name="living" value="house-large">
                            <span class="radio-custom"></span>
                            <span>Large house with big yard - Plenty of space</span>
                        </label>
                    </div>
                </div>

                <div class="quiz-question" data-question="3">
                    <h4 class="question-title">3. What's your experience with pets?</h4>
                    <div class="quiz-options">
                        <label class="quiz-option" data-value="none">
                            <input type="radio" name="experience" value="none">
                            <span class="radio-custom"></span>
                            <span>No experience - This would be my first pet</span>
                        </label>
                        <label class="quiz-option" data-value="some">
                            <input type="radio" name="experience" value="some">
                            <span class="radio-custom"></span>
                            <span>Some experience - I've helped care for family pets</span>
                        </label>
                        <label class="quiz-option" data-value="lots">
                            <input type="radio" name="experience" value="lots">
                            <span class="radio-custom"></span>
                            <span>Lots of experience - I've owned pets before</span>
                        </label>
                    </div>
                </div>

                <div class="quiz-question" data-question="4">
                    <h4 class="question-title">4. What's your monthly budget for pet expenses?</h4>
                    <div class="quiz-options">
                        <label class="quiz-option" data-value="low">
                            <input type="radio" name="budget" value="low">
                            <span class="radio-custom"></span>
                            <span>৳2,000-5,000 - Basic needs only</span>
                        </label>
                        <label class="quiz-option" data-value="medium">
                            <input type="radio" name="budget" value="medium">
                            <span class="radio-custom"></span>
                            <span>৳5,000-10,000 - Good care with some extras</span>
                        </label>
                        <label class="quiz-option" data-value="high">
                            <input type="radio" name="budget" value="high">
                            <span class="radio-custom"></span>
                            <span>৳10,000+ - Premium care and accessories</span>
                        </label>
                    </div>
                </div>

                <div class="quiz-question" data-question="5">
                    <h4 class="question-title">5. How do you feel about pet training and behavioral issues?</h4>
                    <div class="quiz-options">
                        <label class="quiz-option" data-value="avoid">
                            <input type="radio" name="training" value="avoid">
                            <span class="radio-custom"></span>
                            <span>I'd prefer a well-trained, calm pet</span>
                        </label>
                        <label class="quiz-option" data-value="basic">
                            <input type="radio" name="training" value="basic">
                            <span class="radio-custom"></span>
                            <span>I can handle basic training needs</span>
                        </label>
                        <label class="quiz-option" data-value="challenge">
                            <input type="radio" name="training" value="challenge">
                            <span class="radio-custom"></span>
                            <span>I'm excited about training and bonding</span>
                        </label>
                    </div>
                </div>

                <div class="quiz-navigation">
                    <button type="button" class="quiz-btn" id="prevBtn" onclick="changeQuestion(-1)" disabled>
                        <i class="fas fa-arrow-left"></i> Previous
                    </button>
                    <div class="quiz-progress">
                        <span id="currentQuestion">1</span> of 5
                    </div>
                    <button type="button" class="quiz-btn" id="nextBtn" onclick="changeQuestion(1)" disabled>
                        Next <i class="fas fa-arrow-right"></i>
                    </button>
                    <button type="button" class="quiz-btn" id="submitBtn" onclick="submitQuiz()" style="display: none;">
                        Get Results <i class="fas fa-check"></i>
                    </button>
                </div>
            </div>

            <div class="results-container" id="quizResults">
                <h3 class="results-title">Your Recommended Pet Type</h3>
                <p class="results-subtitle">Based on your answers, here's what we recommend:</p>
                <div class="recommended-pet" id="recommendedPet">
                    <!-- Results will be populated by JavaScript -->
                </div>
                <div class="action-buttons">
                    <a href="{{ url('/adopt-home') }}" class="action-btn">
                        <i class="fas fa-heart"></i> Browse Available Pets
                    </a>
                    <button class="action-btn secondary" onclick="retakeQuiz()">
                        <i class="fas fa-redo"></i> Retake Quiz
                    </button>
                </div>
            </div>
        </section>

        <!-- Pet Types Overview Section -->
        <section class="section">
            <h2 class="section-title">
                <i class="fas fa-paw"></i>
                Understanding Different Pet Types
            </h2>
            <p class="section-subtitle">
                Learn about the characteristics, needs, and care requirements of different types of pets to make an informed decision.
            </p>

            <div class="pet-types-grid">
                <div class="pet-type-card">
                    <span class="pet-type-icon">🐱</span>
                    <h3 class="pet-type-title">Cats</h3>
                    <p class="pet-type-description">
                        Independent and low-maintenance companions. Perfect for apartment living and busy lifestyles.
                    </p>
                    <span class="difficulty-level difficulty-easy">Beginner Friendly</span>
                </div>

                <div class="pet-type-card">
                    <span class="pet-type-icon">🐶</span>
                    <h3 class="pet-type-title">Dogs</h3>
                    <p class="pet-type-description">
                        Loyal and social animals that require daily exercise, training, and regular interaction.
                    </p>
                    <span class="difficulty-level difficulty-medium">Moderate Commitment</span>
                </div>

                <div class="pet-type-card">
                    <span class="pet-type-icon">🐦</span>
                    <h3 class="pet-type-title">Birds</h3>
                    <p class="pet-type-description">
                        Intelligent and social creatures that can live for many years. Require specialized care and attention.
                    </p>
                    <span class="difficulty-level difficulty-medium">Moderate Commitment</span>
                </div>

                <div class="pet-type-card">
                    <span class="pet-type-icon">🐰</span>
                    <h3 class="pet-type-title">Small Animals</h3>
                    <p class="pet-type-description">
                        Rabbits, guinea pigs, and hamsters. Great for smaller spaces and shorter-term commitments.
                    </p>
                    <span class="difficulty-level difficulty-easy">Beginner Friendly</span>
                </div>
            </div>
        </section>

        <!-- Preparation Checklist Section -->
        <section class="section">
            <h2 class="section-title">
                <i class="fas fa-tasks"></i>
                Pre-Adoption Checklist
            </h2>
            <p class="section-subtitle">
                Make sure you're fully prepared before bringing your new companion home. Here's everything you need to consider and prepare.
            </p>

            <div class="checklist-grid">
                <div class="checklist-category">
                    <h3><i class="fas fa-home"></i> Home Preparation</h3>
                    <ul class="checklist-items">
                        <li><i class="fas fa-check"></i> Pet-proof your home (secure toxic plants, chemicals)</li>
                        <li><i class="fas fa-check"></i> Set up a comfortable sleeping area</li>
                        <li><i class="fas fa-check"></i> Install safety gates if needed</li>
                        <li><i class="fas fa-check"></i> Create a designated feeding space</li>
                        <li><i class="fas fa-check"></i> Remove or secure fragile items</li>
                    </ul>
                </div>

                <div class="checklist-category">
                    <h3><i class="fas fa-shopping-cart"></i> Essential Supplies</h3>
                    <ul class="checklist-items">
                        <li><i class="fas fa-check"></i> Food and water bowls</li>
                        <li><i class="fas fa-check"></i> High-quality pet food</li>
                        <li><i class="fas fa-check"></i> Collar and ID tag</li>
                        <li><i class="fas fa-check"></i> Leash (for dogs)</li>
                        <li><i class="fas fa-check"></i> Toys and enrichment items</li>
                        <li><i class="fas fa-check"></i> Grooming supplies</li>
                        <li><i class="fas fa-check"></i> First aid kit</li>
                    </ul>
                </div>

                <div class="checklist-category">
                    <h3><i class="fas fa-stethoscope"></i> Veterinary Care</h3>
                    <ul class="checklist-items">
                        <li><i class="fas fa-check"></i> Research local veterinarians</li>
                        <li><i class="fas fa-check"></i> Schedule initial health checkup</li>
                        <li><i class="fas fa-check"></i> Understand vaccination schedules</li>
                        <li><i class="fas fa-check"></i> Consider pet insurance options</li>
                        <li><i class="fas fa-check"></i> Learn about spay/neuter importance</li>
                    </ul>
                </div>

                <div class="checklist-category">
                    <h3><i class="fas fa-heart"></i> Emotional Preparation</h3>
                    <ul class="checklist-items">
                        <li><i class="fas fa-check"></i> Understand the adjustment period</li>
                        <li><i class="fas fa-check"></i> Prepare for long-term commitment</li>
                        <li><i class="fas fa-check"></i> Research training methods</li>
                        <li><i class="fas fa-check"></i> Plan for pet care during travel</li>
                        <li><i class="fas fa-check"></i> Join local pet owner communities</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="section">
            <h2 class="section-title">
                <i class="fas fa-question-circle"></i>
                Frequently Asked Questions
            </h2>
            <p class="section-subtitle">
                Get answers to the most common questions about pet adoption and first-time pet ownership.
            </p>

            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>How much does it cost to adopt a pet?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Adoption fees typically range from ৳5,000-15,000 depending on the pet type and age. This usually includes initial vaccinations, health checks, and spaying/neutering. Remember to budget for ongoing costs like food, veterinary care, and supplies.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>What should I expect during the first week?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>The first week is an adjustment period for both you and your pet. Expect some anxiety, changes in eating patterns, and exploration behaviors. Maintain consistent routines, be patient, and give your new companion time to settle in.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>How do I choose the right pet for my lifestyle?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Consider your living space, available time, activity level, and experience. Active people might enjoy dogs, while those with less time might prefer cats. Take our quiz above for personalized recommendations!</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>What vaccinations does my new pet need?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Most pets need core vaccines (rabies, distemper) and may need additional vaccines based on lifestyle and local risks. Schedule a vet visit within the first week to establish a vaccination schedule tailored to your pet.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>How long do pets typically live?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Lifespans vary by species and size. Cats typically live 12-18 years, small dogs 12-16 years, large dogs 8-12 years, and small animals like rabbits live 8-12 years. This is a long-term commitment!</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>What if my new pet doesn't get along with my family?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Most adoption centers have trial periods and will work with you to find solutions. Some behavioral issues can be resolved with patience and training. If it truly isn't a good match, reputable shelters will help you find a better fit.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        let currentQuestionIndex = 0;
        let quizAnswers = {};
        const totalQuestions = 5;

        function initializeQuiz() {
            updateQuizNavigation();
            addOptionClickListeners();
        }

        function addOptionClickListeners() {
            document.querySelectorAll('.quiz-option').forEach(option => {
                option.addEventListener('click', function() {
                    const questionContainer = this.closest('.quiz-question');
                    const questionNumber = questionContainer.dataset.question;
                    const inputName = this.querySelector('input').name;
                    const value = this.dataset.value;

                    // Remove selection from other options in same question
                    questionContainer.querySelectorAll('.quiz-option').forEach(opt => {
                        opt.classList.remove('selected');
                    });

                    // Add selection to clicked option
                    this.classList.add('selected');
                    this.querySelector('input').checked = true;

                    // Store answer
                    quizAnswers[inputName] = value;

                    // Enable next button
                    updateQuizNavigation();
                });
            });
        }

        function changeQuestion(direction) {
            const questions = document.querySelectorAll('.quiz-question');
            
            // Hide current question
            questions[currentQuestionIndex].classList.remove('active');
            
            // Update index
            currentQuestionIndex += direction;
            
            // Show new question
            questions[currentQuestionIndex].classList.add('active');
            
            // Update navigation
            updateQuizNavigation();
            updateProgressDisplay();
        }

        function updateQuizNavigation() {
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const submitBtn = document.getElementById('submitBtn');
            const currentQuestion = document.querySelector('.quiz-question.active');
            const hasAnswered = currentQuestion.querySelector('.quiz-option.selected');

            // Update previous button
            prevBtn.disabled = currentQuestionIndex === 0;

            // Update next/submit buttons
            if (currentQuestionIndex === totalQuestions - 1) {
                nextBtn.style.display = 'none';
                submitBtn.style.display = hasAnswered ? 'block' : 'none';
            } else {
                nextBtn.style.display = 'block';
                nextBtn.disabled = !hasAnswered;
                submitBtn.style.display = 'none';
            }
        }

        function updateProgressDisplay() {
            document.getElementById('currentQuestion').textContent = currentQuestionIndex + 1;
        }

        function submitQuiz() {
            const results = calculateResults();
            displayResults(results);
        }

        function calculateResults() {
            const { time, living, experience, budget, training } = quizAnswers;
            
            let scores = {
                cats: 0,
                dogs: 0,
                birds: 0,
                small: 0
            };

            // Time availability scoring
            if (time === 'low') {
                scores.cats += 3;
                scores.small += 3;
                scores.birds += 2;
                scores.dogs += 1;
            } else if (time === 'medium') {
                scores.cats += 2;
                scores.dogs += 3;
                scores.birds += 3;
                scores.small += 2;
            } else {
                scores.dogs += 3;
                scores.cats += 2;
                scores.birds += 3;
                scores.small += 1;
            }

            // Living situation scoring
            if (living === 'apartment') {
                scores.cats += 3;
                scores.small += 3;
                scores.birds += 2;
                scores.dogs += 1;
            } else if (living === 'house-small') {
                scores.cats += 2;
                scores.dogs += 2;
                scores.birds += 3;
                scores.small += 2;
            } else {
                scores.dogs += 3;
                scores.cats += 2;
                scores.birds += 2;
                scores.small += 1;
            }

            // Experience scoring
            if (experience === 'none') {
                scores.cats += 3;
                scores.small += 3;
                scores.dogs += 1;
                scores.birds += 1;
            } else if (experience === 'some') {
                scores.cats += 2;
                scores.dogs += 2;
                scores.birds += 2;
                scores.small += 2;
            } else {
                scores.dogs += 3;
                scores.birds += 3;
                scores.cats += 2;
                scores.small += 1;
            }

            // Budget scoring
            if (budget === 'low') {
                scores.small += 3;
                scores.cats += 2;
                scores.dogs += 1;
                scores.birds += 1;
            } else if (budget === 'medium') {
                scores.cats += 3;
                scores.dogs += 2;
                scores.birds += 2;
                scores.small += 2;
            } else {
                scores.dogs += 3;
                scores.birds += 3;
                scores.cats += 2;
                scores.small += 1;
            }

            // Training preference scoring
            if (training === 'avoid') {
                scores.cats += 3;
                scores.small += 3;
                scores.birds += 2;
                scores.dogs += 1;
            } else if (training === 'basic') {
                scores.cats += 2;
                scores.dogs += 2;
                scores.birds += 2;
                scores.small += 2;
            } else {
                scores.dogs += 3;
                scores.birds += 3;
                scores.cats += 1;
                scores.small += 1;
            }

            // Find the highest scoring pet type
            const winner = Object.keys(scores).reduce((a, b) => scores[a] > scores[b] ? a : b);
            
            return {
                recommended: winner,
                scores: scores
            };
        }

        function displayResults(results) {
            const resultsContainer = document.getElementById('quizResults');
            const recommendedPetDiv = document.getElementById('recommendedPet');
            
            const petInfo = {
                cats: {
                    name: 'Cats',
                    icon: '🐱',
                    description: 'Cats are perfect for your lifestyle! They\'re independent, low-maintenance, and great for apartment living.',
                    benefits: [
                        'Independent nature requires less constant attention',
                        'Perfect for apartment or small space living',
                        'Lower daily time commitment',
                        'Natural litter box training',
                        'Excellent companions for working professionals'
                    ]
                },
                dogs: {
                    name: 'Dogs',
                    icon: '🐶',
                    description: 'Dogs would be an excellent match! They\'re loyal, social, and will be your perfect active companion.',
                    benefits: [
                        'Loyal and social companions',
                        'Great motivation for daily exercise',
                        'Excellent for families and active lifestyles',
                        'Strong emotional bonds and protection',
                        'Wide variety of sizes and temperaments'
                    ]
                },
                birds: {
                    name: 'Birds',
                    icon: '🐦',
                    description: 'Birds are ideal for you! They\'re intelligent, social, and perfect for your living situation.',
                    benefits: [
                        'Highly intelligent and can learn tricks',
                        'Social and interactive companions',
                        'Perfect for apartment living',
                        'Long lifespan means lasting companionship',
                        'Beautiful and colorful additions to your home'
                    ]
                },
                small: {
                    name: 'Small Animals',
                    icon: '🐰',
                    description: 'Small animals like rabbits or guinea pigs are perfect for you! They\'re gentle and great for beginners.',
                    benefits: [
                        'Perfect for first-time pet owners',
                        'Gentle and calm temperament',
                        'Suitable for smaller living spaces',
                        'Lower time and budget commitment',
                        'Great way to learn pet care basics'
                    ]
                }
            };

            const recommended = petInfo[results.recommended];
            
            recommendedPetDiv.innerHTML = `
                <div style="text-align: center; margin-bottom: 20px;">
                    <span style="font-size: 4rem;">${recommended.icon}</span>
                    <h3 style="font-size: 1.5rem; color: #155724; margin: 10px 0;">${recommended.name}</h3>
                </div>
                <p style="font-size: 1.1rem; color: #155724; margin-bottom: 20px; text-align: center;">
                    ${recommended.description}
                </p>
                <h4 style="color: #155724; margin-bottom: 15px;">Why ${recommended.name} are perfect for you:</h4>
                <ul style="text-align: left; color: #155724; line-height: 1.8;">
                    ${recommended.benefits.map(benefit => `<li>${benefit}</li>`).join('')}
                </ul>
            `;
            
            // Hide quiz and show results
            document.querySelector('.quiz-container').style.display = 'none';
            resultsContainer.classList.add('show');
        }

        function retakeQuiz() {
            // Reset quiz state
            currentQuestionIndex = 0;
            quizAnswers = {};
            
            // Hide results and show quiz
            document.getElementById('quizResults').classList.remove('show');
            document.querySelector('.quiz-container').style.display = 'block';
            
            // Reset all questions
            document.querySelectorAll('.quiz-question').forEach((question, index) => {
                question.classList.remove('active');
                if (index === 0) question.classList.add('active');
                
                // Clear selections
                question.querySelectorAll('.quiz-option').forEach(option => {
                    option.classList.remove('selected');
                    option.querySelector('input').checked = false;
                });
            });
            
            // Reset navigation
            updateQuizNavigation();
            updateProgressDisplay();
        }

        function toggleFAQ(element) {
            const faqItem = element.closest('.faq-item');
            const isActive = faqItem.classList.contains('active');
            
            // Close all FAQ items
            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Open clicked item if it wasn't already active
            if (!isActive) {
                faqItem.classList.add('active');
            }
        }

        // Initialize quiz on page load
        document.addEventListener('DOMContentLoaded', function() {
            initializeQuiz();
        });
    </script>
@endsection
