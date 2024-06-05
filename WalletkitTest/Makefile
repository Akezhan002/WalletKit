# Переменная окружения для выбора файла .env
ENV_FILE := .env.local

# Команда для сборки контейнеров
build:
	cp $(ENV_FILE) .env
	chmod -R 777 storage/
	cd ./_docker && docker-compose build

# Команда для запуска контейнеров
run:
	cd ./_docker && docker-compose --env-file ../.env up -d
	docker exec -it wallet-app composer install --no-interaction --prefer-dist --optimize-autoloader --ignore-platform-reqs

# Команда накатывает миграции
migrate:
	docker exec -it wallet-app php artisan migrate
	docker exec -it wallet-app php artisan db:seed --class=ClientSeeder

# Команда для остановки и удаления контейнеров
stop:
	cd ./_docker && docker-compose stop

