# Ride: Geocode CLI

This module adds the geocode command to the Ride CLI.

## Commands

### geocode

This command geocodes the provided address with the provided service or shows an overview of the available services when no arguments are provided.

**Syntax**: ```geocode [<service> [<address>]]```
- ```<service>```: Id of the geocode service
- ```<address>```: Address to lookup

**Alias**: ```g```

## Related Modules 

- [ride/app](https://github.com/all-ride/ride-app)
- [ride/app-geocode](https://github.com/all-ride/ride-app-geocode)
- [ride/cli](https://github.com/all-ride/ride-cli)
- [ride/lib-cli](https://github.com/all-ride/ride-lib-cli)
- [ride/lib-geocode](https://github.com/all-ride/ride-lib-geocode)

## Installation

You can use [Composer](http://getcomposer.org) to install this application.

```
composer require ride/cli-geocode
```
