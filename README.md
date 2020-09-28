This is an example on how to run locally symfony using caddy.

# Installation

You will need docker installed on your machine, you can download docker desktop [here](https://www.docker.com/products/docker-desktop)

##### Steps
1. Add the following line to your `/etc/hosts` file :
```
127.0.0.1    symfony.test
```

2. Build the containers
`$ docker-compose build`

3. Run the containers
`$ docker-compose up`

4. Everything is ready ! Browse https://symfony.test to access your application

Feel free to add containers for your favourite tools, such as `mailcatcher`, `rabbitmq`, `elk`...
