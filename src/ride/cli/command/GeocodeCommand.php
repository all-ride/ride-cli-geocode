<?php

namespace ride\cli\command;

use ride\library\cli\command\AbstractCommand;
use ride\library\geocode\Geocoder;

/**
 * Command to geocode an address
 */
class GeocodeCommand extends AbstractCommand {

    /**
     * Instance of the geocoder
     * @var ride\library\geocode\Geocoder
     */
    protected $geocoder;

    /**
     * Constructs a new geocode command
     * @param \ride\library\geocode\Geocoder $geocoder
     * @return null
     */
    public function __construct(Geocoder $geocoder) {
        parent::__construct('geocode', 'Geocodes the provided address');

        $this->addArgument('service', 'Id of the geocode service');
        $this->addArgument('address', 'Address to lookup', true, true);

        $this->geocoder = $geocoder;
    }

    /**
     * Executes the command
     * @return null
     */
    public function execute() {
        $service = $this->input->getArgument('service');
        $address = $this->input->getArgument('address');

        $results = $this->geocoder->geocode($service, $address);
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
