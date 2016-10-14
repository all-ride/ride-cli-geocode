<?php

namespace ride\cli\command;

use ride\library\geocode\Geocoder;

/**
 * Command to geocode an address
 */
class GeocodeCommand extends AbstractCommand {

    /**
     * Initializes the command
     * @return null
     */
    protected function initialize() {
        $this->setDescription('Geocodes the provided address or shows an overview of available services when no arguments provided.');

        $this->addArgument('service', 'Id of the geocode service', false);
        $this->addArgument('address', 'Address to lookup', false, true);
    }

    /**
     * Invokes the command
     * @param \ride\library\geocode\Geocoder $geocoder
     * @return null
     */
    public function invoke(Geocoder $geocoder, $service = null, $address = null) {
        if ($service === null) {
            $services = $geocoder->getServices();

            foreach ($services as $name => $service) {
                $this->output->writeLine('- ' . $name);
            }

            return;
        } elseif ($address == null) {
            $this->output->writeErrorLine('Error: address is required');

            return;
        }

        $results = $geocoder->geocode($service, $address);
        foreach ($results as $result) {
            $this->output->writeLine('Coordinate: ' . $result->getCoordinate());
            $this->output->writeLine('Street: ' . $result->getStreet());
            $this->output->writeLine('Number: ' . $result->getNumber());
            $this->output->writeLine('Postal code: ' . $result->getPostalCode());
            $this->output->writeLine('City: ' . $result->getCity());
            $this->output->writeLine('Region code: ' . $result->getRegionCode());
            $this->output->writeLine('Region: ' . $result->getRegion());
            $this->output->writeLine('Country code: ' . $result->getCountryCode());
            $this->output->writeLine('Country: ' . $result->getCountry());
            $this->output->writeLine('-----');
        }
    }

}
