# gamers-php

PHP (Laravel + Eloquent ORM) app for creating a players MySQL table from a CSV file.

App after going to [http://localhost/](http://localhost/):
1. Creates a MySQL table named `players`.
2. Parses data from `storage/app/players.csv`.
3. Inserts the data into the table.
4. Opens a page with the inserted data fetched from the server.

## Installation

Install [Docker Desktop](https://www.docker.com/).

Clone the repository and change directory:

    git clone https://github.com/theBang/gamers-php.git
    cd gamers-php

Install dependencies with Docker:

    docker run --rm -it \
        --volume $PWD:/app \
        composer create-project

Create `.env` from the `.env.example`.

Create `storage/app/players.csv` from `storage/app/players.example.csv`.

## Usage

To start the app with PHP and MySQL containers:

    ./vendor/bin/sail up -d

Go to [http://localhost/](http://localhost/).
