IMAGE_NAME = app2
CONTAINER_NAME = app2

all: build run

build:
	docker build -t $(IMAGE_NAME) .

run:
	docker run -d -p 8002:8000 --name $(CONTAINER_NAME) $(IMAGE_NAME)

stop:
	docker stop $(CONTAINER_NAME)
	docker rm $(CONTAINER_NAME)

clean:
	docker rmi $(IMAGE_NAME)

restart: stop run
