
# Code sample example
### Business Requirements (fabrication)
The payroll system gives Sales staff two payments every month. They receive a regular fixed base monthly salary, plus a monthly bonus, with the following rules for their issuing dates:
- The base salaries are paid on the last day of the month unless that day is a Saturday or a Sunday (weekend). In that case, salaries are paid on the Friday before the weekend.
- On the 15th of every month bonuses are paid for the previous month unless that day is a weekend. In that case, they are paid the first Wednesday after the 15th.
- Do not take into account public holidays.



## Author

- [Dalibor Bazina](https://bazina.dev)
- daliborbazina@gmail.com 
- +4915207976074


## Installation

Install my code sample example with composer

```bash
  composer install
```
    
## Run Locally


Go to the project directory

```bash
  cd bazina
```

Install dependencies

```bash
  composer install
```

Start the calc

```bash
  php cli/calc.php
```


## Documentation

- EDD
- Singleton-based implementation of an event dispatcher
- Services separated by context (payments and generators)
- Dependency injection
- Strategy design pattern for output of data


