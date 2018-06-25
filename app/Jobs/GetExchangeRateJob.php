<?php

namespace App\Jobs;


use App\Traits\InteractsWithApi;
use Illuminate\Http\Request;

class GetExchangeRateJob
{
    use InteractsWithApi;

    /**
     * @var Request
     */
    private $request;


    /**
     * RegisterCustomerJob constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        return $this->getFromApi( $this->request->input('base'),$this->request->input('target'),$this->request->input('amount'));
    }
}