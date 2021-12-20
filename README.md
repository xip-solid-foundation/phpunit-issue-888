Set up database:

```
docker-compose exec php bin/console doc:d:c --env=test
docker-compose exec php bin/console doc:mig:mig -n --env=test
```