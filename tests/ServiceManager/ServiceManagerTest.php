<?php
namespace Fgsl\Test\Model;

use PHPUnit\Framework\TestCase;
use Fgsl\ServiceManager\ServiceManager;
use Laminas\ServiceManager\ServiceManager as LaminasServiceManager;

class ServiceManagerTest extends TestCase
{
    public function testServiceManager() 
    {        
        $laminasServiceManager = new LaminasServiceManager();

        $instanceEncapsulated = true;
        try {
            ServiceManager::setInstance($laminasServiceManager);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            $instanceEncapsulated = false;
        }
        
        $this->assertTrue($instanceEncapsulated);
        
        $serviceManager = ServiceManager::getInstance();
        
        $this->assertIsObject($serviceManager);        
    }
}
