# How to run the Application

## Docker
- Run docker instance from the root of the project folder:
# sudo docker-compose up

Docker instace will run on http://127.0.0.1:8080/

## Database setup / import
- Import schema/securities-database-dump.sql
- Update api/.env with SQL server credentials (database name is securities)

## Testing

Testing with Postman:
- URL: http://127.0.0.1:8080/

## Raw Data packets:

Use the Body -> RAW input in postman and enter these JSON objects:
 
{
  "expression": {
    "fn": "-", 
    "a": {"fn": "-", "a": "eps", "b": "shares"}, 
    "b": {"fn": "-", "a": "assets", "b": "liabilities"}
  },
  "security": "CDE"
}


{
  "expression": {"fn": "*", "a": "sales", "b": 2},
  "security": "ABC"
}

{
  "expression": {"fn": "/", "a": "price", "b": "eps"},
  "security": "BCD"
}

## Resutls
Result will be returned as result->total
Some additional debug info is also returned to verify calculations

## PHPUnit Tests

Unit tests can be run like this from the root directory:
cd api; ./vendor/bin/phpunit tests
