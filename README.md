# PHP JWT Examples

This code uses the PHP Firebase JWT gem: https://github.com/firebase/php-jwt and runs through a couple of different scenarios.

* building a JWT with the 'hmac' algorithm
* building a JWT with the 'rsa' algorithm
* building a JWT with the 'hmac' algorithm but verifying additional claims
* decoding an invalid JWT with the 'hmac' algorithm

## To install

This assumes you have composer installed. If not, [get it](https://getcomposer.org/doc/00-intro.md)

`composer install`

`php <file>`

## Environment

Tested on php 7.3.24.

JWTs originally built by [FusionAuth](http://fusionauth.io).


