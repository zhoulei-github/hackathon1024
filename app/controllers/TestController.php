<?php

class TestController extends BaseController
{
    public function test()
    {
        $b = Cinema::whereId(1)
            ->get(['id', 'name'])
            ->toArray();

        print_r($b);
    }
}
