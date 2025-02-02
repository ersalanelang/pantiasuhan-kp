# UPT RPA Wiloso Projo Website

This project was developed during my internship at **Dinas Kominfo Yogyakarta** to create a website for **UPT RPA Wiloso Projo**.

## Technologies Used
- **PHP**
- **Laravel**
- **Bootstrap**

## About the Project
The website serves as an online platform for **UPT RPA Wiloso Projo**, providing information, management features, and data processing functionalities. Built using Laravel, the project follows MVC architecture and integrates Bootstrap for responsive design.

## Installation Guide
### Prerequisites
- XAMPP (or any local server with PHP & MySQL support)
- Composer
- Node.js (for frontend assets if required)

### Setup Steps
1. Clone this repository:
   ```sh
   git clone https://github.com/your-repository-link.git
   ```
2. Navigate to the project directory:
   ```sh
   cd panti-asuhan
   ```
3. Install dependencies:
   ```sh
   composer install
   ```
4. Copy `.env.example` to `.env` and update the database credentials:
   ```sh
   cp .env.example .env
   ```
5. Generate application key:
   ```sh
   php artisan key:generate
   ```
6. Run migrations and seed the database:
   ```sh
   php artisan migrate --seed
   ```
7. Start the local development server:
   ```sh
   php artisan serve
   ```

## Features
- User authentication and management
- Data storage and retrieval
- Responsive UI with Bootstrap

## License
This project is open-source and licensed under the [MIT License](https://opensource.org/licenses/MIT).

---
**Developed during internship at Dinas Kominfo Yogyakarta** 🚀
