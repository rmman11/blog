<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class ExpensesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

   /* public function build(): \ArielMejiaDev\LarapexCharts\RadialChart
    {
        return $this->chart->radialChart()
            ->setTitle('Passing effectiveness.')
            ->setSubtitle('Barcelona city vs Madrid sports.')
            ->addData([75, 60])
            ->setLabels(['Barcelona city', 'Madrid sports'])
            ->setColors(['#D32F2F', '#03A9F4']);
    }*/

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle('My Monthly Income')
            ->setSubtitle('July Income')
            ->addData([400, 500,700, 300])
            ->setLabels(['income1', 'income2', 'income3']);
    }
}
