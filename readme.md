# API CRUD PHP Application

This project is a simple PHP-based RESTful API for managing tasks. It supports basic CRUD (Create, Read, Update, Delete) operations using a MySQL database.

## Features

- **Create**: Add new tasks to the database.
- **Read**: Retrieve all tasks from the database.
- **Update**: Update an existing task.
- **Delete**: Remove a task from the database.

## Prerequisites

- Docker and Docker Compose installed on your system.

## Setup Instructions

1. Clone the repository:
   ```bash
   git clone https://github.com/briceteddy/api_crud_api
   cd api_crud_php
   ```

2. Build and start the Docker containers:
   ```bash
   docker-compose up --build
   ```

3. Access the API at `http://localhost:8081`.

4. Ensure the database table `tasks` is created:
   ```sql
   CREATE TABLE tasks (
       id INT AUTO_INCREMENT PRIMARY KEY,
       title VARCHAR(255) NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

## Endpoints

### 1. **Read Tasks**
- **URL**: `/api/read`
- **Method**: `GET`
- **Description**: Retrieves all tasks from the database.
- **Response**:
  ```json
  [
      {
          "id": 1,
          "title": "prendre une douche",
          "created_at": "2025-04-07 12:00:00"
      },
      {
          "id": 2,
          "title": "se vetir",
          "created_at": "2025-04-07 12:05:00"
      }
  ]
  ```

### 2. **Create Task**
- **URL**: `/api/create`
- **Method**: `POST`
- **Description**: Adds a new task to the database.
- **Request Body**:
  ```json
  {
      "title": "prendre petit dejeuner"
  }
  ```
- **Response**:
  ```json
  {
      "message": "Task created successfully."
  }
  ```

### 3. **Update Task**
- **URL**: `/api/update`
- **Method**: `PUT`
- **Description**: Updates an existing task.
- **Request Body**:
  ```json
  {
      "id": 1,
      "title": "se reveiller"
  }
  ```
- **Response**:
  ```json
  {
      "message": "Task updated successfully."
  }
  ```

### 4. **Delete Task**
- **URL**: `/api/delete`
- **Method**: `DELETE`
- **Description**: Deletes a task from the database.
- **Request Body**:
  ```json
  {
      "id": 1
  }
  ```
- **Response**:
  ```json
  {
      "message": "Task deleted successfully."
  }
  ```

## Testing the API

You can test the API using tools like:
- **Postman**: A GUI-based tool for testing RESTful APIs.
- **cURL**: A command-line tool for making HTTP requests.

### Example cURL Commands

- **Read Tasks**:
  ```bash
  curl -X GET http://localhost:8081/api/read
  ```

- **Create Task**:
  ```bash
  curl -X POST http://localhost:8081/api/create \
  -H "Content-Type: application/json" \
  -d '{"title": "prendre petit dejeuner"}'
  ```

- **Update Task**:
  ```bash
  curl -X PUT http://localhost:8081/api/update \
  -H "Content-Type: application/json" \
  -d '{"id": 1, "title": "se reveiller"}'
  ```

- **Delete Task**:
  ```bash
  curl -X DELETE http://localhost:8081/api/delete \
  -H "Content-Type: application/json" \
  -d '{"id": 1}'
  ```

## Troubleshooting

- If you encounter database connection issues, ensure the database credentials in `config/database.php` match those in `docker-compose.yml`.
- Check the logs of the MySQL container for errors:
  ```bash
  docker logs php_crud_db
  ```

