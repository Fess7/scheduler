init:
	docker-compose up --build -d

start:
	docker-compose exec -u www-data php php index.php week