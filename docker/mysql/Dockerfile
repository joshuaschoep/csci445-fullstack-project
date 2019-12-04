FROM mysql:8.0.17

# copies the sql file to a spot where it will run on initialization
COPY $PWD/databaseCreation.sql /docker-entrypoint-initdb.d/
