BACKEND=chat-demo-backend 
FRONTEND=chat-demo-frontend
DB_NAME=chat-demo-db

build:
	docker-compose build

start:
	docker-compose up -d

stop:
	docker-compose stop

restart:
	docker-compose stop; docker-compose rm -f; \
	cd application; yarn run build; cd ../; \
	docker-compose up -d

down:
	docker-compose down

sh:
	docker exec -it $(BACKEND) /bin/sh

install:
	docker-compose up -d --build; \
	docker-compose exec $(BACKEND)  composer install; \
	docker-compose exec $(FRONTEND) yarn install;

key:
	docker-compose exec $(BACKEND)  php artisan key:generate

migrate:
	 docker-compose exec $(BACKEND) php artisan migrate

dbseed:
	docker-compose exec $(BACKEND) php artisan db:seed

log:
	docker logs -f ${BACKEND}

log_db:
	docker-compose logs -f ${DB_NAME}

ps:
	docker-compose ps

c_clear:
	docker-compose exec $(BACKEND)  php artisan cache:clear;