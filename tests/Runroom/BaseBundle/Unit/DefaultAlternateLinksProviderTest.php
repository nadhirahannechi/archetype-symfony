<?php

namespace Tests\Runroom\BaseBundle\Unit;

use PHPUnit\Framework\TestCase;
use Runroom\BaseBundle\Service\AlternateLinksProvider\DefaultAlternateLinksProvider;

class DefaultAlternateLinksProviderTest extends TestCase
{
    public function setUp()
    {
        $this->router = $this->prophesize('Symfony\Bundle\FrameworkBundle\Routing\Router');
        $this->requestStack = $this->prophesize('Symfony\Component\HttpFoundation\RequestStack');
        $this->locales = ['es', 'en'];

        $this->provider = new DefaultAlternateLinksProvider(
            $this->router->reveal(),
            $this->requestStack->reveal(),
            $this->locales
        );
    }

    /**
     * @test
     */
    public function itReturnsEmptyArrayAsRouteParameters()
    {
        foreach ($this->locales as $locale) {
            $this->assertEmpty($this->provider->getRouteParameters('model', $locale));
        }
    }

    /**
     * @test
     */
    public function itProvidesAnyAlternateLinks()
    {
        $base_routes = ['default', 'home'];

        foreach ($base_routes as $base_route) {
            $this->assertTrue($this->provider->providesAlternateLinks($base_route));
        }
    }
}
