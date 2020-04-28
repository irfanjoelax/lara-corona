<?php

namespace App\Http\Controllers;

use App\Charts\CovidChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CovidController extends Controller
{
    public function chart()
    {
        // get request API
        $provRequest = collect(Http::get('https://api.kawalcorona.com/indonesia/provinsi')->json());
        $provData = $provRequest->flatten(1);

        // requirement chart
        $labelChart     = $provData->pluck('Provinsi');
        $positifData    = $provData->pluck('Kasus_Posi');
        $healthData     = $provData->pluck('Kasus_Semb');
        $deathData      = $provData->pluck('Kasus_Meni');
        $colorChart     = $labelChart->map(function ($item) {
            return '#' . substr(md5(mt_rand()), 0, 6);
        });

        // make chart positive
        $positiveChart = new CovidChart;
        $positiveChart->displayLegend(false);
        $positiveChart->labels($labelChart);
        $positiveChart->dataset('Data Kasus Positif Per Provinsi', 'pie', $positifData)->backgroundColor($colorChart);

        // make chart health
        $healthChart = new CovidChart;
        $healthChart->displayLegend(false);
        $healthChart->labels($labelChart);
        $healthChart->dataset('Data Kasus Sembuh Per Provinsi', 'pie', $healthData)->backgroundColor($colorChart);

        // make chart health
        $deathChart = new CovidChart;
        $deathChart->displayLegend(false);
        $deathChart->labels($labelChart);
        $deathChart->dataset('Data Kasus Meninngal Per Provinsi', 'pie', $deathData)->backgroundColor($colorChart);

        // passing to view
        return view('corona', [
            'positivechart' => $positiveChart,
            'healthChart' => $healthChart,
            'deathChart' => $deathChart,
        ]);
    }
}
