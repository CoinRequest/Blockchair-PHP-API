# BlockChair PHP API Client

PHP package for the [BlockChair](https://blockchair.com) API.

## Getting Started

Run the following command to install this package into your project.

```
composer require coinrequest/blockchair-php-api 
```

### Prerequisites

You will need Composer to install this package.

### Installing

After installing this package with composer, create a new BlockChair
instance.

Something like this

```
$blockChair = new BlockChair();
```

And call the desired endpoint

```
$blockChair->bitcoin->stats();
```
Chains:

* Bitcoin 
* Ethereum
* BitcoinCash 
* BitcoinSv
* Litecoin 
* Dogecoin
* Dash 
* Groestlcoin

The current implemented endpoints are: 

* {chain}/stats
* {chain}/dashboards/block/{blockId}
* {chain}/dashboards/transaction/{txId}
* {chain}/dashboards/address/{address}
* ethereum/dashboards/uncle/{txId}

## Running the tests

Run the tests in the Tests directory with PHPUnit.


## Built With

* [BlockChair](https://api.blockchair.com) - For the Blockchain data :)
* [PHPUnit](https://github.com/sebastianbergmann/phpunit/) - Test Framework
* [Guzzle](https://github.com/guzzle/guzzle) - For HTTP Requests

## Contributing

Please help us to develop this package. Every input and/or feedback is really appreciated!

## License

This project is licensed under the MIT License.


