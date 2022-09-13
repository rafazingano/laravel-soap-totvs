<?php

namespace RafaZingano\SoapTotvs\Connection;

use Laminas\Soap\Client;

class WebService
{
    /**
     * @param string $path
     * @return Client
     */

    public function getClient(string $path) : Client
    {
        try {

            $connection = new Client(getenv('soap-totvs.host') . $path, [
                'login'                 =>          confiv('soap-totvs.user'),
                'password'              =>          getenv('soap-totvs.pass'),
                'soap_version'          =>          SOAP_1_1,
                'cache_wsdl'            =>          WSDL_CACHE_NONE,
                'keep_alive'            =>          false,
                'connection_timeout'    =>          500000
            ]);

        } catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }

        return $connection;
    }

}
