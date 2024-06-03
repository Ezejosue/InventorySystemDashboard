# 📦 Product Inventory API

Welcome to the Product Inventory API! This API provides comprehensive functionalities for managing a product inventory, including authentication and security features.

## 🛠️ Technologies Used

- **Laravel**: The PHP framework used for building the API logic.
- **MySQL**: Relational database for storing inventory data.
- **Docker**: Ensures a consistent development environment through containerization.
- **Swagger**: Interactive API documentation available at [Swagger UI](http://191.101.232.231:8080/api/documentation#/).

## ✨ Features

- Full CRUD (Create, Read, Update, Delete) operations for product management.
- User authentication and session handling.
- Integrated security to protect inventory data.

## 🚀 Getting Started

### Prerequisites

Ensure you have the following installed on your system:

- Docker
- Docker Compose

### Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/Ezejosue/InventorySystemDashboard.git
    cd InventorySystemDashboard
    ```

2. **Copy the `.env.example` file to `.env` and configure environment variables:**

    ```bash
    cp .env.example .env
    ```

3. **Build and start the Docker containers:**

    ```bash
    docker-compose up --build
    ```

4. **Run database migrations and seeders:**

    ```bash
    docker-compose exec app php artisan migrate --seed
    ```

## 📘 Usage

The API provides several endpoints for managing product inventory. Full documentation of the endpoints and their usage is available at [Swagger UI](http://191.101.232.231:8080/api/documentation#/).

### Main Endpoints

- **/api/products**: Product management endpoints.
  - `GET /api/products`: List all products.
  - `POST /api/products`: Create a new product.
  - `GET /api/products/{id}`: Get product details.
  - `PUT /api/products/{id}`: Update a product.
  - `DELETE /api/products/{id}`: Delete a product.

- **/api/auth**: Authentication endpoints.
  - `POST /api/login`: Log in.
  - `POST /api/register`: Register a new user.
  - `POST /api/logout`: Log out.

## 🔍 Testing

You can test and consume the API at the following URL:

[UDB Dashboard](https://udb-dashboard.vercel.app/login)

## 🤝 Contributing

Contributions are welcome! Please open an issue or submit a pull request.

## 📄 License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## 📬 Contact

For any questions or comments, please contact [your_name@domain.com](test@domain.com).
