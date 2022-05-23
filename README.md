test project
========================

1) Install Environment
----------------------------------
**If you have docker and docker-compose on your machine**

Clone the project repo like below

    git clone https://github.com/aminejs/test.git

Clone the docker environment repo like below

    git clone https://github.com/aminejs/env-docker.git

Map in volume the directory where the symfony project lives like so:

- In the ".env" file change the path "TEST_APP_PATH=**your symfony project path**"
- Change the project name in the file "vhosts.conf" with the name you've given to the project

Build docker image

    docker-compose build

Create and start containers

    docker-compose up -d

Get inside the container

    docker-compose exec test bash

Once in, install dependencies

    composer install

2) Run it !
-------------------------------------

**You can access the project endpoints like so:**

- http://localhost:85/api/maxLetterOccurrences?input=aaabcbbbccaaaaaaaabbdd
- http://localhost:85/api/maxLetterOccurrences/all

**You can access the OpenAPI like so:**

- http://localhost:8082/

