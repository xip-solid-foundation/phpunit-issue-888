Set up docker:

```
docker-compose up -d
```

Set up database:

```
docker-compose exec php bin/console doc:d:c --env=test
docker-compose exec php bin/console doc:mig:mig -n --env=test
```

Run tests:

```
docker-compose exec php bash -c "XDEBUG_MODE=coverage bin/phpunit --coverage-text"
```