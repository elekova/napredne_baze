<?php

namespace Bolt\protocol\v1\structures;

use Bolt\protocol\IStructure;

/**
 * Class Point2D
 * Immutable
 *
 * Represents a single location in 2-dimensional space.
 *
 * @author Michal Stefanak
 * @link https://github.com/neo4j-php/Bolt
 * @link https://www.neo4j.com/docs/bolt/current/bolt/structure-semantics/#structure-point2d
 * @package Bolt\protocol\v1\structures
 */
class Point2D implements IStructure
{
    private int $srid;
    private float $x;
    private float $y;

    /**
     * Point2D constructor.
     * @param int $srid
     * @param float $x
     * @param float $y
     */
    public function __construct(int $srid, float $x, float $y)
    {
        $this->srid = $srid;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * Spatial Reference System Identifier
     * @return int
     */
    public function srid(): int
    {
        return $this->srid;
    }

    /**
     * @return float
     */
    public function x(): float
    {
        return $this->x;
    }

    /**
     * @return float
     */
    public function y(): float
    {
        return $this->y;
    }

    public function __toString(): string
    {
        return 'point({srid: ' . $this->srid . ', ' . 'x: ' . $this->x . ', y: ' . $this->y . '})';
    }
}
