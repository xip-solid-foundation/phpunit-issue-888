Set up docker:

```
docker-compose up -d
```

Run tests:

```
docker-compose exec php bash -c "XDEBUG_MODE=coverage bin/phpunit --coverage-text"
```