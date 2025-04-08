# API CRUD PHP Application

This project is a simple PHP-based RESTful API for managing tasks. It supports basic CRUD (Create, Read, Update, Delete) operations using a MySQL database.

## Features

- **Create**: Add new tasks to the database.
- **Read**: Retrieve all tasks from the database.
- **Update**: Update an existing task.
- **Delete**: Remove a task from the database.

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
          "title": "Task 1",
          "created_at": "2025-04-07 12:00:00"
      },
      {
          "id": 2,
          "title": "Task 2",
          "created_at": "2025-04-07 12:05:00"
      }
  ]