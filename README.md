# Smart AI Agents - Full Stack Website
A comprehensive authentication system with email verification, password reset, and multi-platform deployment support.

## 🌟 Features
- User Registration with email verification via Brevo  
- Secure Login/Logout functionality  
- Password Reset with OTP verification  
- Email Integration using Brevo API  
- Multi-platform Deployment support  
- WhatsApp Integration via Twilio (limited free tier)  
- Course Integration via Together API  
- Responsive Design  

## 📁 Project Structure

### PHP Authentication System
```
Project/
│── connection.php          # Database connection configuration
│── controllerUserData.php  # Main controller for user operations
│── forgot-password.php     # Password reset request handler
│── home.php                # Main dashboard page
│── LICENSE                 # Project license
│── login-user.php          # User login handler
│── logout-user.php         # User logout handler
│── new-password.php        # New password setup
│── password-changed.php    # Password change confirmation
│── README.md               # Project documentation
│── reset-code.php          # Password reset code verification
│── signup-user.php         # User registration handler
│── style.css               # Styling for all pages
│── userform.sql            # Database schema for user table
│── user-otp.php            # OTP verification handler
│── sendmail.php            # Email sending functionality
│── config.php              # Centralized configuration (recommended)
│── .env                    # Environment variables (not in repo)
```

### Python Deployment Structure
```
ai-agent/
│── Procfile              # Process file for deployment
│── README.md             # Documentation
│── render.yaml           # Render deployment configuration
│── requirements.txt      # Python dependencies
│── runtime.txt           # Python runtime version
│── test.py               # Test script
│
├── static/
│   └── images/           # Static assets
│
└── templates/            # HTML templates
```

## 🚀 Quick Start

### Prerequisites
- PHP 7.4+ and MySQL for authentication system  
- Python 3.8+ for AI agent  
- Brevo account for email services  
- Twilio account for WhatsApp integration  
- Together API account for course features  

### Installation
**Clone the repository**
```bash
git clone <repository-url>
cd Project
```

**Database Setup**
- Import `userform.sql` into your MySQL database via phpMyAdmin  
- Update database credentials in `connection.php`  

**Environment Configuration**
Create a `.env` file (never commit this to version control):  
```
BREVO_API_KEY=your_brevo_api_key_here
DATABASE_HOST=your_database_host
DATABASE_USER=your_database_username
DATABASE_PASS=your_database_password
DATABASE_NAME=your_database_name
TWILIO_ACCOUNT_SID=your_twilio_account_sid
TWILIO_AUTH_TOKEN=your_twilio_auth_token
TOGETHER_API_KEY=your_together_api_key_here
```

### Brevo Configuration
- Sign up at [brevo.com](https://www.brevo.com/)  
- Verify your email address  
- Get your API key from Brevo API Settings  
- Update `controllerUserData.php` with your Brevo API key and verified email  

### Configuration Files
**config.php (Recommended)**
```php
<?php
return [
    'brevo' => [
        'api_key' => getenv('BREVO_API_KEY') ?: 'your-api-key-here',
        'sender_email' => 'nellurujaswanth2004@gmail.com',
        'sender_name' => 'AI Agent System'
    ],
    'database' => [
        'host' => getenv('DATABASE_HOST') ?: 'localhost',
        'username' => getenv('DATABASE_USER') ?: 'username',
        'password' => getenv('DATABASE_PASS') ?: 'password',
        'name' => getenv('DATABASE_NAME') ?: 'database_name'
    ],
    'twilio' => [
        'account_sid' => getenv('TWILIO_ACCOUNT_SID'),
        'auth_token' => getenv('TWILIO_AUTH_TOKEN')
    ]
];
?>
```

**connection.php**
```php
<?php
$config = require_once 'config.php';
$db = $config['database'];

$con = mysqli_connect($db['host'], $db['username'], $db['password'], $db['name']);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
```

## 🌐 Deployment

### PHP Deployment on InfinityFree
- Upload Files to InfinityFree hosting  
- Configure Database in phpMyAdmin  
- Set Environment Variables in hosting panel  
- Update Support Email in `home.php` and `index.php`  

### Python Deployment on Sevella
**Prepare Requirements**
```
# requirements.txt
flask==2.3.3
requests==2.31.0
python-dotenv==1.0.0
```

**Configure Environment Variables in Sevella:**
```
BREVO_API_KEY=your_brevo_api_key_here
TOGETHER_API_KEY=your_together_api_key_here
TWILIO_ACCOUNT_SID=your_twilio_account_sid
TWILIO_AUTH_TOKEN=your_twilio_auth_token
```

- Deploy using the provided `render.yaml` and `Procfile`  

**Live URLs**
- PHP Authentication: [InfinityFree Deployment]  
- Python AI Agent: https://ai-agent-31l3s.sevalla.app/  

## 🔧 API Integration

### Brevo Email Service
- Used for email OTP verification  
- API key management through Brevo dashboard  
- Default sender configuration  

### Twilio WhatsApp Integration
- Free tier: 9 messages per day  
- Account SID and Auth Token required  
- Configure in environment variables  

### Together API
- Course integration features  
- API key required for functionality  

## 🔒 Security Notes
⚠️ Critical Security Practices:
- Never store API keys in version control  
- Use environment variables for all sensitive data  
- Regularly rotate API keys  
- Validate and sanitize all user inputs  
- Use prepared statements for database queries  

## 📧 Support
For customer support, update the email address in:  
- `home.php` (line 503)  
- `index.php`  

## 🐛 Troubleshooting
### Common Issues
**Email not sending**
- Verify Brevo API key  
- Check sender email verification  
- Review Brevo account limits  

**Database connection errors**
- Verify credentials in `connection.php`  
- Check database host accessibility  
- Ensure user has proper permissions  

**Deployment issues**
- Verify environment variables are set  
- Check file permissions  
- Review deployment platform requirements  

## 📄 License
This project is licensed under the terms specified in the LICENSE file.

## 🤝 Contributing
1. Fork the repository  
2. Create a feature branch  
3. Commit your changes  
4. Push to the branch  
5. Create a Pull Request  

## 📞 Contact
For questions or support, please contact the development team through the support email configured in the application.

**Note:** Always keep your API keys and sensitive information secure. Use environment variables and never commit them to version control systems.
