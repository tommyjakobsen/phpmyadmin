<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Abstract parent class for all Gis<Geom_type> test classes
 *
 * @package PhpMyAdmin-test
 */
declare(strict_types=1);

namespace PhpMyAdmin\Tests\Gis;

use PHPUnit\Framework\TestCase;

/**
 * Abstract parent class for all Gis<Geom_type> test classes
 *
 * @package PhpMyAdmin-test
 */
abstract class GisGeomTestCase extends TestCase
{
    /**
     * test generateParams method
     *
     * @param string $wkt    point in WKT form
     * @param int    $index  index
     * @param array  $params expected output array
     *
     * @dataProvider providerForTestGenerateParams
     * @return void
     */
    public function testGenerateParams($wkt, $index, $params)
    {
        if ($index == null) {
            $this->assertEquals(
                $params,
                $this->object->generateParams($wkt)
            );
        } else {
            $this->assertEquals(
                $params,
                $this->object->generateParams($wkt, $index)
            );
        }
    }

    /**
     * test scaleRow method
     *
     * @param string $spatial spatial data of a row
     * @param array  $min_max expected results
     *
     * @dataProvider providerForTestScaleRow
     * @return void
     */
    public function testScaleRow($spatial, $min_max)
    {
        $this->assertEquals(
            $min_max,
            $this->object->scaleRow($spatial)
        );
    }

    /**
     * Tests whether content is a valid image.
     *
     * @param object $object Image
     *
     * @return void
     */
    public function assertImage($object)
    {
        $this->assertGreaterThan(0, imagesx($object));
    }
}
