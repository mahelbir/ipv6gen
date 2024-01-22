<?php

/**
 * Random IPv6 Address Generator by Subnet
 *
 * @author  Mahmuthan Elbir <me@mahmuthanelbir.com.tr>
 * @license MIT
 */

namespace Mahelbir;

class Ipv6Gen
{

    /**
     * @var string
     */
    private $subnet;
    /**
     * @var int
     */
    private $prefix;
    /**
     * @var string[]
     */
    private $charList = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'];
    /**
     * @var string[]
     */
    private $blocks;

    /**
     * @param string $ipv6
     * @param int $subnetPrefix
     */
    public function __construct(string $ipv6, int $subnetPrefix)
    {
        if (!filter_var($ipv6, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            throw new \InvalidArgumentException("Invalid IPv6 address");
        }

        if (strlen($ipv6) != 39) {
            throw new \InvalidArgumentException("Ensure the IPv6 address is 128 bits long");
        }

        if ($subnetPrefix < 0 || $subnetPrefix > 128) {
            throw new \InvalidArgumentException("Invalid subnet prefix");
        }

        $this->subnet = $ipv6;
        $this->prefix = $subnetPrefix;
        $this->init();
    }

    /**
     * @return void
     */
    private function init(): void
    {
        $fixedCount = ceil($this->prefix / 4);
        $fixedCount = max(0, $fixedCount);
        $chars = str_replace(':', '', $this->subnet);
        $fixedChars = substr($chars, 0, $fixedCount);
        $this->blocks = str_split($fixedChars, 4);
        while (count($this->blocks) < 8) {
            $this->blocks[] = '';
        }
    }

    /**
     * @param int $count
     * @return string
     */
    private function randChars(int $count): string
    {
        return array_reduce(range(1, $count), function ($carry) {
            return $carry . $this->charList[array_rand($this->charList)];
        }, '');
    }

    /**
     * @return string
     */
    public function getIP(): string
    {
        $blocks = $this->blocks;
        foreach ($blocks as $index => $block) {
            $fillCount = 4 - strlen($block);
            if ($fillCount > 0) {
                $blocks[$index] = $block . $this->randChars($fillCount);
            }
        }

        return implode(':', $blocks);
    }

    /**
     * @param int $count
     * @return array
     */
    public function getIPs(int $count): array
    {
        return array_map(function () {
            return $this->getIP();
        }, range(1, $count));
    }


}
