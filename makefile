up:
    docker-compose up -d

down:
    docker-compose down

build:
    docker-compose build

logs:
    docker-compose logs -f

mysql:
    docker exec -it php_crud_db mysql -u user -p

health:
    curl -s http://localhost:8081/api/health | jq
