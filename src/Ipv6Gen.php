<?php

/**
 * Random IPv6 Address Generator with Subnet
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
    private $charList;
    /**
     * @var string[]
     */
    private $blocks;

    /**
     * @param array $ipv6
     */
    public function __construct(array $ipv6)
    {
        $this->charList = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'];
        $this->subnet = $ipv6[0];
        $this->prefix = $ipv6[1];
        $this->init();
    }

    /**
     * @return void
     */
    private function init(): void
    {
        $fixedCount = ceil($this->prefix / 4);
        if ($fixedCount < 0)
            $fixedCount = 0;
        $chars = str_replace(':', '', $this->subnet);
        $fixedChars = substr($chars, 0, $fixedCount);
        $this->blocks = str_split($fixedChars, 4);
        while (count($this->blocks) < 8)
            $this->blocks[] = '';
    }

    /**
     * @param int $count
     * @return string
     */
    private function randChars(int $count): string
    {
        $chars = '';
        for ($i = 0; $i < $count; $i++)
            $chars .= $this->charList[array_rand($this->charList)];
        return $chars;
    }

    /**
     * @return string
     */
    public function getIP(): string
    {
        $blocks = $this->blocks;
        foreach ($blocks as $index => $block):
            $fillCount = 4 - strlen($block);
            if (0 < $fillCount)
                $blocks[$index] = $block . $this->randChars($fillCount);
        endforeach;

        return implode(':', $blocks);
    }

    /**
     * @param int $count
     * @return array
     */
    public function getIPs(int $count): array
    {
        $list = [];
        for ($i = 0; $i < $count; $i++)
            $list[] = $this->getIP();
        return $list;
    }


}
