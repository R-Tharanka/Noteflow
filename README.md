# Noteflow - Your Personal Academic Companion

A private, personal web application to help you stay organized, study smarter, and manage all your university-related content in one place.

## 🎯 Objective

To build a secure and user-friendly web application for personal use that allows you to:
- Store and manage your university materials (documents, photos, links)
- Write and organize notes
- Create and answer your own questions
- Use an interactive notepad with drawing tools (pencil, highlighter, eraser, textbox)

## 🛠️ Key Features

### 📁 Document & Media Storage
- Upload documents (PDF, DOCX, etc.), images, and notes
- Organize files by folders, semester, or subject
- Preview/download any file anytime

### 🔗 Useful Link Organizer
- Save links to important resources, articles, and videos
- Add titles, descriptions, and tags
- Search and categorize them easily

### 📝 Note Manager
- Create text-based notes
- Edit, update, and delete notes
- Organize by topics, subjects, or dates
- Optionally support markdown formatting

### ❓ Question & Answer Builder (Study Tool)
- Add custom questions and write your answers
- Organize questions by subject or topic
- Use as flashcards or self-tests
- Add filters like "Easy", "Medium", "Hard", or "Review Later"

### 🧠 Visual Notepad (Canvas with Tools)
- An interactive whiteboard-style notepad
- Tools include:
  - ✏️ Pencil for drawing
  - 🖍️ Highlighter (semi-transparent)
  - 🔤 Textbox (type anywhere)
  - 🧽 Eraser
  - 🧭 Undo/Redo, Clear, Save as image
- Built with HTML5 Canvas + Fabric.js (or similar)

### 🔐 Authentication
- Simple login or Google OAuth
- JWT for secure sessions

## 🔧 Tech Stack

### Backend
- Laravel 12
- MongoDB (using Laravel MongoDB package)
- Laravel Fortify (Authentication)
- Laravel Socialite (OAuth integrations)

### Frontend
- React 19
- Tailwind CSS
- HTML5 Canvas API

### Integrations
- Google Drive API
- Google OAuth Consent Screen

## 📦 Project Structure
- `/backend`: Laravel API server
- `/frontend`: React application
- `/docs`: Project documentation

## 🚀 Getting Started

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js and npm
- MongoDB

### Backend Setup
```bash
# Navigate to backend directory
cd backend

# Install dependencies
composer install

# Copy environment file and update with your settings
cp .env.example .env

# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate

# Start the development server
php artisan serve
```

### Frontend Setup
```bash
# Navigate to frontend directory
cd frontend

# Install dependencies
npm install

# Start the development server
npm start
```

## 🔑 API Configuration

To use the Google Drive API and OAuth features:
1. Create a project in Google Cloud Console
2. Configure the OAuth consent screen
3. Create credentials (OAuth client ID)
4. Add the credentials to your .env file

## 📋 Development Roadmap
- [ ] Set up database schema and models
- [ ] Implement user authentication
- [ ] Create document storage functionality
- [ ] Develop link organizer feature
- [ ] Build note management system
- [ ] Design Q&A builder interface
- [ ] Integrate visual notepad with drawing tools
- [ ] Implement Google Drive integration
- [ ] Add search and filtering capabilities
- [ ] Polish UI/UX
- [ ] Deploy production version

## 📄 License
This project is licensed under the MIT License - see the LICENSE file for details.

## 👤 Author
Personal project by [R-Tharanka](https://github.com/R-Tharanka), [Mayomibhagya](https://github.com/Mayomibhagya)
