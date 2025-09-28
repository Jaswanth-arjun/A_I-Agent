<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']) ? 'true' : 'false';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AI Agents Hub - Smart Automation Solutions</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  <script>
    var isLoggedIn = <?php echo $is_logged_in; ?>;
  </script>
  <style>
    :root {
      --primary-color: #0d6efd;
      --secondary-color: #6c757d;
      --dark-color: #212529;
      --light-color: #f8f9fa;
    }
    
    body {
      background-color: #f7f9fc;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .hero {
      padding: 80px 20px;
      text-align: center;
      background: linear-gradient(135deg, #0d6efd, #0b5ed7);
      color: white;
      position: relative;
      overflow: hidden;
    }
    
    .hero::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path fill="rgba(255,255,255,0.05)" d="M0,0 L100,0 L100,100 L0,100 Z" /></svg>');
      background-size: cover;
    }
    
    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      height: 100%;
    }
    
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .card-icon {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      color: var(--primary-color);
    }
    
    .feature-icon {
      font-size: 2rem;
      color: var(--primary-color);
      margin-bottom: 1rem;
    }
    
    .testimonial-card {
      background-color: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .testimonial-img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      object-fit: cover;
    }
    
    .pricing-card {
      border: 2px solid rgba(13, 110, 253, 0.2);
      border-radius: 10px;
      transition: all 0.3s ease;
    }
    
    .pricing-card:hover {
      border-color: var(--primary-color);
    }
    
    .pricing-card.popular {
      border: 2px solid var(--primary-color);
      position: relative;
    }
    
    .popular-badge {
      position: absolute;
      top: -10px;
      right: 20px;
      background-color: var(--primary-color);
      color: white;
      padding: 5px 15px;
      border-radius: 20px;
      font-size: 0.8rem;
    }
    
    .nav-pills .nav-link.active {
      background-color: var(--primary-color);
    }
    
    .footer {
      background-color: var(--dark-color);
      color: white;
      padding: 40px 0;
    }
    
    .footer a {
      color: rgba(255, 255, 255, 0.7);
      text-decoration: none;
      transition: color 0.3s;
    }
    
    .footer a:hover {
      color: white;
    }
    
    .social-icon {
      font-size: 1.5rem;
      margin-right: 15px;
    }
    
    @keyframes navFadeIn {
      0% {
        opacity: 0;
        transform: translateY(-10px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    .navbar-collapse.show {
      animation: navFadeIn 0.3s ease-in-out;
    }
    
    .navbar-nav .nav-link {
      transition: color 0.3s ease, transform 0.3s ease;
    }
    
    .navbar-nav .nav-link:hover {
      color: #ffffff;
      transform: scale(1.05);
    }
    
    /* Toggler icon bounce */
    .navbar-toggler-icon {
      transition: transform 0.3s ease;
    }
    
    .navbar-toggler:focus .navbar-toggler-icon,
    .navbar-toggler:hover .navbar-toggler-icon {
      transform: rotate(90deg);
    }
    
    /* FAN-STACK CARD EFFECT */
    .fan-stack {
      position: relative;
      width: 260px;
      height: 200px;
      margin: 40px auto;
      cursor: pointer;
      user-select: none;
    }
    
    .fan-stack .card {
      position: absolute;
      bottom: 0;
      left: 50%;
      width: 350px;
      height: 250px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.16);
      transform: translateX(-50%);
      transition:
        transform 0.5s cubic-bezier(.4,2.2,.2,1),
        z-index 0s 0.5s,
        opacity 0.5s cubic-bezier(.4,2.2,.2,1);
      will-change: transform, opacity;
      z-index: 1;
      opacity: 1;
    }
    
    .fan-stack .card1 { transform: translateX(-50%) rotate(-25deg); z-index: 5; }
    .fan-stack .card2 { transform: translateX(-50%) rotate(-12.5deg); z-index: 4; }
    .fan-stack .card3 { transform: translateX(-50%) rotate(0deg); z-index: 3; }
    .fan-stack .card4 { transform: translateX(-50%) rotate(12.5deg); z-index: 2; }
    .fan-stack .card5 { transform: translateX(-50%) rotate(25deg); z-index: 1; }
    
    /* Animation for "going to back" */
    .fan-stack .to-back {
      transform: translateX(-50%) scale(0.8) translateY(40px) rotate(0deg);
      opacity: 0;
      z-index: 0 !important;
      pointer-events: none;
    }
  </style>
</head>
<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">
        <i class="bi bi-robot me-2"></i>AI Agents Hub
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#hero">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#agents">Agents</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#features">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#pricing">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#testimonials">Testimonials</a>
          </li>
        </ul>
        <div class="d-flex align-items-center">
          <div class="user-menu" style="display: none;">
            <div class="dropdown">
              <button class="btn btn-outline-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle me-1"></i>
                <span class="user-email"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Dashboard</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item logout-btn" href="#">Logout</a></li>
              </ul>
            </div>
          </div>
          <a href="../A_I-AGENT/login-user.php" class="btn btn-outline-light me-2 login-btn">Login</a>
          <a href="../A_I-AGENT/signup-user.php" class="btn btn-light signup-btn">Sign Up</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero" id="hero">
    <div class="container position-relative">
      <h1 class="display-4 fw-bold mb-3">Empower Your Workflow with AI</h1>
      <p class="lead mb-4">Discover intelligent automation solutions that learn and adapt to your needs</p>
      <div class="d-flex justify-content-center gap-3">
        <a href="#agents" class="btn btn-light btn-lg px-4 py-2">
          <i class="bi bi-rocket me-2"></i>Explore Agents
        </a>
        <a href="#" class="btn btn-outline-light btn-lg px-4 py-2">
          <i class="bi bi-play-circle me-2"></i>Watch Demo
        </a>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="py-5 bg-white">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-3">
          <h2 class="fw-bold text-primary" id="counter">0</h2>
          <script>
            let c=0,t=setInterval(()=>{
              counter.innerText=++c+"+";
              if(c>=1000) clearInterval(t)
            },0.0000000000000000000000000000000000000000000000000000000001)
          </script>
          <p class="text-muted">Active Users</p>
        </div>
        <div class="col-md-3">
          <h2 class="fw-bold text-primary" id="counter2">0</h2>
          <script>
            let c2=0,t2=setInterval(()=>{
              counter2.innerText=++c2+"+";
              if(c2>=50) clearInterval(t2)
            },20)
          </script>
          <p class="text-muted">AI Agents</p>
        </div>
        <div class="col-md-3">
          <h2 class="fw-bold text-primary" id="counter3">0%</h2>
          <script>
            let c3=0,t3=setInterval(()=>{
              counter3.innerText=++c3+"%";
              if(c3>=98) clearInterval(t3)
            },20)
          </script>
          <p class="text-muted">Satisfaction Rate</p>
        </div>
        <div class="col-md-3">
          <h2 class="fw-bold text-primary" id="counter4"></h2>
          <script>
            let txt="24/7",i=0,t4=setInterval(()=>{
              counter4.innerText+=txt[i++];
              if(i==txt.length) clearInterval(t4)
            },200)
          </script>
          <p class="text-muted">Support Available</p>
        </div>
      </div>
    </div>
  </section>

  <!-- AI Agents Section -->
  <section class="py-5" id="agents">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Featured AI Agents</h2>
        <p class="lead text-muted">Choose from our collection of specialized AI assistants</p>
      </div>
      
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100">
            <div class="card-body text-center p-4">
              <div class="card-icon">
                <i class="bi bi-book"></i>
              </div>
              <h5 class="card-title">Course Automation Agent</h5>
              <p class="card-text">Learn any course via daily emails powered by AI. Customize topics, time, and pace.</p>
              <div class="mt-3">
                <span class="badge bg-primary me-1">Education</span>
                <span class="badge bg-success">Featured</span>
              </div>
              <button id="startLearningBtn" class="btn btn-primary mt-3 w-100">Start Learning</button>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card h-100">
            <div class="card-body text-center p-4">
              <div class="card-icon">
                <i class="bi bi-check2-square"></i>
              </div>
              <h5 class="card-title">Task Assistant Agent</h5>
              <p class="card-text">Organize your daily to-dos, track habits, and get reminders smartly with AI.</p>
              <div class="mt-3">
                <span class="badge bg-info me-1">Productivity</span>
                <span class="badge bg-warning text-dark">Beta</span>
              </div>
              <a href="#" class="btn btn-outline-primary mt-3 w-100">Join Waitlist</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card h-100">
            <div class="card-body text-center p-4">
              <div class="card-icon">
                <i class="bi bi-pencil"></i>
              </div>
              <h5 class="card-title">Writing Assistant Agent</h5>
              <p class="card-text">Generate blogs, social posts, and creative content with natural language prompts.</p>
              <div class="mt-3">
                <span class="badge bg-secondary me-1">Content</span>
                <span class="badge bg-warning text-dark">Beta</span>
              </div>
              <a href="#" class="btn btn-outline-primary mt-3 w-100">Join Waitlist</a>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="card h-100">
            <div class="card-body text-center p-4">
              <div class="card-icon">
                <i class="bi bi-graph-up"></i>
              </div>
              <h5 class="card-title">Data Analysis Agent</h5>
              <p class="card-text">Automate data processing, visualization, and insights generation.</p>
              <div class="mt-3">
                <span class="badge bg-info me-1">Analytics</span>
                <span class="badge bg-success">New</span>
              </div>
              <a href="#" class="btn btn-outline-primary mt-3 w-100">Coming Soon</a>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="card h-100">
            <div class="card-body text-center p-4">
              <div class="card-icon">
                <i class="bi bi-chat-left-text"></i>
              </div>
              <h5 class="card-title">Customer Support Agent</h5>
              <p class="card-text">AI-powered chatbot that handles customer inquiries 24/7.</p>
              <div class="mt-3">
                <span class="badge bg-primary me-1">Business</span>
                <span class="badge bg-success">Popular</span>
              </div>
              <a href="#" class="btn btn-outline-primary mt-3 w-100">Learn More</a>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="card h-100">
            <div class="card-body text-center p-4">
              <div class="card-icon">
                <i class="bi bi-code-slash"></i>
              </div>
              <h5 class="card-title">Code Assistant Agent</h5>
              <p class="card-text">Get AI-powered code suggestions, debugging help, and documentation.</p>
              <div class="mt-3">
                <span class="badge bg-dark me-1">Development</span>
                <span class="badge bg-success">New</span>
              </div>
              <a href="#" class="btn btn-outline-primary mt-3 w-100">Coming Soon</a>
            </div>
          </div>
        </div>
      </div>
      
      <div class="text-center mt-5">
        <a href="#" class="btn btn-outline-primary btn-lg">
          <i class="bi bi-grid me-2"></i>View All Agents
        </a>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="py-5 bg-light" id="features">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Powerful Features</h2>
        <p class="lead text-muted">Everything you need to boost your productivity</p>
      </div>
      
      <div class="row g-4">
        <div class="col-md-4">
          <div class="text-center p-4">
            <div class="feature-icon">
              <i class="bi bi-lightning-charge"></i>
            </div>
            <h4>Fast Integration</h4>
            <p class="text-muted">Connect with your favorite tools in minutes with our simple API and plugins.</p>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="text-center p-4">
            <div class="feature-icon">
              <i class="bi bi-shield-lock"></i>
            </div>
            <h4>Secure & Private</h4>
            <p class="text-muted">Your data is encrypted and never shared with third parties.</p>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="text-center p-4">
            <div class="feature-icon">
              <i class="bi bi-arrow-repeat"></i>
            </div>
            <h4>Continuous Learning</h4>
            <p class="text-muted">Our agents improve over time by learning from your interactions.</p>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="text-center p-4">
            <div class="feature-icon">
              <i class="bi bi-phone"></i>
            </div>
            <h4>Mobile Friendly</h4>
            <p class="text-muted">Access your agents from anywhere with our responsive design.</p>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="text-center p-4">
            <div class="feature-icon">
              <i class="bi bi-sliders"></i>
            </div>
            <h4>Customizable</h4>
            <p class="text-muted">Tailor each agent to your specific needs and preferences.</p>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="text-center p-4">
            <div class="feature-icon">
              <i class="bi bi-people"></i>
            </div>
            <h4>Team Collaboration</h4>
            <p class="text-muted">Share agents with your team and work together seamlessly.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- How It Works Section -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">How It Works</h2>
        <p class="lead text-muted">Get started in just a few simple steps</p>
      </div>
      
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="pe-md-5">
            <div class="d-flex mb-4">
              <div class="me-4">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                  <span class="fw-bold">1</span>
                </div>
              </div>
              <div>
                <h4>Choose Your Agent</h4>
                <p class="text-muted">Browse our collection of specialized AI agents and select the ones that match your needs.</p>
              </div>
            </div>
            
            <div class="d-flex mb-4">
              <div class="me-4">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                  <span class="fw-bold">2</span>
                </div>
              </div>
              <div>
                <h4>Customize Settings</h4>
                <p class="text-muted">Configure the agent to your preferences and connect it to your existing tools.</p>
              </div>
            </div>
            
            <div class="d-flex">
              <div class="me-4">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                  <span class="fw-bold">3</span>
                </div>
              </div>
              <div>
                <h4>Start Automating</h4>
                <p class="text-muted">Let the agent handle repetitive tasks while you focus on what matters most.</p>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-6 mt-4 mt-md-0">
          <div class="fan-stack" id="fanStack">
            <img class="card card1" src="static/images/img1.png" alt="Step 1" />
            <img class="card card2" src="static/images/img2.png" alt="Step 2" />
            <img class="card card3" src="static/images/img3.png" alt="Step 3" />
            <img class="card card4" src="static/images/img4.png" alt="Step 4" />
            <img class="card card5" src="static/images/img5.png" alt="Step 5" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="py-5 bg-light" id="testimonials">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">What Our Users Say</h2>
        <p class="lead text-muted">Trusted by professionals worldwide</p>
      </div>
      
      <div class="row g-4">
        <div class="col-md-4">
          <div class="testimonial-card h-100">
            <div class="d-flex align-items-center mb-3">
              <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="User" class="testimonial-img me-3">
              <div>
                <h5 class="mb-0">Sarah Johnson</h5>
                <p class="text-muted mb-0">Marketing Director</p>
              </div>
            </div>
            <p class="mb-0">"The Writing Assistant Agent has saved me hours each week. It generates high-quality content that I can just tweak and publish."</p>
            <div class="mt-3 text-warning">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="testimonial-card h-100">
            <div class="d-flex align-items-center mb-3">
              <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="User" class="testimonial-img me-3">
              <div>
                <h5 class="mb-0">Michael Chen</h5>
                <p class="text-muted mb-0">Software Engineer</p>
              </div>
            </div>
            <p class="mb-0">"The Code Assistant has become an indispensable part of my workflow. It catches bugs before I do and suggests better implementations."</p>
            <div class="mt-3 text-warning">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="testimonial-card h-100">
            <div class="d-flex align-items-center mb-3">
              <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="User" class="testimonial-img me-3">
              <div>
                <h5 class="mb-0">Emma Rodriguez</h5>
                <p class="text-muted mb-0">Student</p>
              </div>
            </div>
            <p class="mb-0">"The Course Automation Agent helped me learn Python in just 30 days. The daily lessons were perfectly paced and easy to follow."</p>
            <div class="mt-3 text-warning">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-half"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Pricing Section -->
  <section class="py-5" id="pricing">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Simple, Transparent Pricing</h2>
        <p class="lead text-muted">Choose the plan that fits your needs</p>
      </div>
      
      <div class="row g-4">
        <div class="col-md-4">
          <div class="pricing-card p-4 h-100">
            <div class="text-center">
              <h4>Starter</h4>
              <h2 class="fw-bold my-3">$9<span class="fs-6 text-muted">/month</span></h2>
              <p class="text-muted">Perfect for individuals getting started</p>
              <a href="#" class="btn btn-outline-primary w-100 mt-3">Get Started</a>
            </div>
            <hr class="my-4">
            <ul class="list-unstyled">
              <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Access to 5 basic agents</li>
              <li class="mb-2"><i class="bi bi-check text-success me-2"></i>100 tasks per month</li>
              <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Email support</li>
              <li class="mb-2 text-muted"><i class="bi bi-x me-2"></i>Team collaboration</li>
              <li class="mb-2 text-muted"><i class="bi bi-x me-2"></i>Priority support</li>
            </ul>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="pricing-card p-4 h-100 popular">
            <div class="popular-badge">Most Popular</div>
            <div class="text-center">
              <h4>Professional</h4>
              <h2 class="fw-bold my-3">$29<span class="fs-6 text-muted">/month</span></h2>
              <p class="text-muted">For professionals and small teams</p>
              <a href="#" class="btn btn-primary w-100 mt-3">Get Started</a>
            </div>
            <hr class="my-4">
            <ul class="list-unstyled">
              <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Access to all agents</li>
              <li class="mb-2"><i class="bi bi-check text-success me-2"></i>1000 tasks per month</li>
              <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Priority email support</li>
              <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Team collaboration</li>
              <li class="mb-2 text-muted"><i class="bi bi-x me-2"></i>Dedicated account manager</li>
            </ul>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="pricing-card p-4 h-100">
            <div class="text-center">
              <h4>Enterprise</h4>
              <h2 class="fw-bold my-3">$99<span class="fs-6 text-muted">/month</span></h2>
              <p class="text-muted">For businesses with advanced needs</p>
              <a href="#" class="btn btn-outline-primary w-100 mt-3">Contact Sales</a>
            </div>
            <hr class="my-4">
            <ul class="list-unstyled">
              <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Unlimited agent access</li>
              <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Unlimited tasks</li>
              <li class="mb-2"><i class="bi bi-check text-success me-2"></i>24/7 priority support</li>
              <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Advanced team features</li>
              <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Dedicated account manager</li>
            </ul>
          </div>
        </div>
      </div>
      
      <div class="text-center mt-5">
        <p class="text-muted">Need a custom solution? <a href="#">Contact our sales team</a></p>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-5 bg-primary text-white">
    <div class="container text-center">
      <h2 class="fw-bold mb-3">Ready to Transform Your Workflow?</h2>
      <p class="lead mb-4">Join thousands of professionals who are already boosting their productivity with AI Agents</p>
      <a href="#" class="btn btn-light btn-lg px-5 py-3 me-3">Start Free Trial</a>
      <a href="#" class="btn btn-outline-light btn-lg px-5 py-3">Schedule Demo</a>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Frequently Asked Questions</h2>
        <p class="lead text-muted">Find answers to common questions</p>
      </div>
      
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="accordion" id="faqAccordion">
            <div class="accordion-item mb-3 border-0 shadow-sm">
              <h3 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                  What types of AI agents do you offer?
                </button>
              </h3>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  We offer a wide range of specialized AI agents including course automation, task management, writing assistance, data analysis, customer support, and code assistance. Our collection is constantly growing based on user needs.
                </div>
              </div>
            </div>
            
            <div class="accordion-item mb-3 border-0 shadow-sm">
              <h3 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                  How secure is my data with your service?
                </button>
              </h3>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  We take security very seriously. All data is encrypted in transit and at rest. We never share your data with third parties, and you can request deletion of your data at any time. Our systems undergo regular security audits.
                </div>
              </div>
            </div>
            
            <div class="accordion-item mb-3 border-0 shadow-sm">
              <h3 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                  Can I try before I buy?
                </button>
              </h3>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Absolutely! We offer a 14-day free trial for all our plans. No credit card required. You'll have full access to all features during the trial period so you can evaluate if our service meets your needs.
                </div>
              </div>
            </div>
            
            <div class="accordion-item mb-3 border-0 shadow-sm">
              <h3 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                  How do I cancel my subscription?
                </button>
              </h3>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  You can cancel at any time through your account settings. There are no cancellation fees, and you'll continue to have access until the end of your billing period. We'd appreciate any feedback about why you're canceling so we can improve.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 mb-4 mb-lg-0">
          <h5 class="text-white mb-4">
            <i class="bi bi-robot me-2"></i>AI Agents Hub
          </h5>
          <p>Empowering individuals and businesses with intelligent automation solutions.</p>
          <div class="mt-4">
            <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-github"></i></a>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-white mb-4">Products</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="#">Course Automation</a></li>
            <li class="mb-2"><a href="#">Task Assistant</a></li>
            <li class="mb-2"><a href="#">Writing Assistant</a></li>
            <li class="mb-2"><a href="#">Data Analysis</a></li>
            <li class="mb-2"><a href="#">All Agents</a></li>
          </ul>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-white mb-4">Resources</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="#">Documentation</a></li>
            <li class="mb-2"><a href="#">API Reference</a></li>
            <li class="mb-2"><a href="#">Tutorials</a></li>
            <li class="mb-2"><a href="#">Blog</a></li>
            <li class="mb-2"><a href="#">Community</a></li>
          </ul>
        </div>
        
        <div class="col-lg-3 col-md-6">
          <h5 class="text-white mb-4">Company</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="#">About Us</a></li>
            <li class="mb-2"><a href="#">Careers</a></li>
            <li class="mb-2"><a href="#">Contact</a></li>
            <li class="mb-2"><a href="#">Privacy Policy</a></li>
            <li class="mb-2"><a href="#">Terms of Service</a></li>
          </ul>
        </div>
      </div>
      
      <hr class="mt-4 mb-4" style="border-color: rgba(255,255,255,0.1);">
      
      <div class="row">
        <div class="col-md-6 text-center text-md-start">
          <p class="mb-0">&copy; 2025 AI Agents Hub. All rights reserved.</p>
        </div>
        <div class="col-md-6 text-center text-md-end">
          <p class="mb-0">Made with <i class="bi bi-heart-fill text-danger"></i> for AI enthusiasts</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });
    
    // Track which section is in view for navbar highlighting
    window.addEventListener('scroll', function() {
      const sections = document.querySelectorAll('section');
      const navItems = document.querySelectorAll('.nav-link');
      
      let current = '';
      sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (pageYOffset >= (sectionTop - 100)) {
          current = section.getAttribute('id');
        }
      });
      
      navItems.forEach(item => {
        item.classList.remove('active');
        if (item.getAttribute('href') === `#${current}`) {
          item.classList.add('active');
        }
      });
    });

    // Fan stack animation
    document.addEventListener('DOMContentLoaded', function() {
      const fanStack = document.getElementById('fanStack');
      let animating = false;

      fanStack.addEventListener('click', function() {
        if (animating) return;
        const cards = Array.from(fanStack.children);
        if (cards.length < 2) return;
        animating = true;

        const topCard = cards[0];
        topCard.classList.add('to-back');
        
        setTimeout(function() {
          topCard.classList.remove('to-back');
          fanStack.appendChild(topCard);
          Array.from(fanStack.children).forEach((img, i) => {
            img.className = 'card card' + (i+1);
          });
          animating = false;
        }, 500);
      });
    });

    // Start Learning button functionality
    document.getElementById('startLearningBtn').onclick = function(e) {
      if (isLoggedIn) {
        window.location.href = "http://localhost:5000/course-agent";
      } else {
        alert("Please login and you can access");
      }
    };
  </script>
</body>
</html>