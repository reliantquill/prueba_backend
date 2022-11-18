<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class FechaController extends Controller
{

    public function toFecha($pfecha) {
        //$fecha = Carbon::create($pfecha, 'America/Bogota')->format('Y-m-d');
        $fecha = Carbon::create($pfecha)->format('Y-m-d');
        return $fecha;
    }

    public function toAnioMes() {
        //$fecha = Carbon::create($pfecha, 'America/Bogota')->format('Y-m-d');
        $fecha = Carbon::now()->format('Ym');
        return $fecha;
    }

    public function toTimestamp($pfecha) {
        $fecha = Carbon::create($pfecha, 'America/Bogota')->format('Y-m-d H:i:s');
        return $fecha;
    }


    public function toKey() {
        $fecha = Carbon::now()->format('YmdHis');
        return $fecha;
    }

    public function toFechaHora($pfechaHora) {
        $fecha = Carbon::create($pfechaHora)->format('Y-m-d H:i:s');
        return $fecha;
    }

    public function nowFechaHora() {
        $fecha = Carbon::now()->format('Y-m-d H:i:s');
        return $fecha;
    }

    public function nowHora() {
        $fecha = Carbon::now()->format('H:i:s');
        return $fecha;
    }

    public function nowFecha() {
        $fecha = Carbon::now()->format('Y-m-d');
        return $fecha;
    }

    public function nowAnio() {
        $fecha = Carbon::now()->format('Y');
        return $fecha;
    }

    public function nowMes() {
        $fecha = Carbon::now()->format('m');
        return $fecha;
    }

    public function nowDia() {
        $fecha = Carbon::now()->format('d');
        return $fecha;
    }

    public function equalFechas($pfecha1, $pfecha2) {
        //si las fecha son iguales true, sino false
        $date1 = Carbon::createFromFormat($pfecha1);
        $date2 = Carbon::createFromFormat($pfecha2);

        $result = $date1->eq($date2);
        return $result;
    }

    public function addDia($pfecha, $pdia) {
        $date1 = Carbon::createFromDate($pfecha);
        $result = $date1->addDays($pdia)->format('Y-m-d H:i:s');
        return $result;
    }

    public function subDia($pfecha, $pdia) {
        $date1  = Carbon::createFromDate($pfecha);
        $result = $date1->subDays($pdia)->format('Y-m-d H:i:s');
        return $result;
    }

    public function isSabado($pfecha) {
        $date   = Carbon::createFromDate($pfecha)->format('l');
        $result = ($date == 'Saturday')?true:false;
        return $result;
    }

    public function isDomingo($pfecha) {
        $date   = Carbon::createFromDate($pfecha)->format('l');
        $result = ($date == 'Sunday')?true:false;
        return $result;
    }

    public function toSemana($pfecha) {
        $date   = Carbon::createFromDate($pfecha)->format('l');
        return $date;

      //$date   = Carbon::createFromDate($pfecha);
      //return $date->locale('es')->shortDayName; // string(7) "lunes"
        /*
          $fecha->locale('es')->dayName;                        // string(7) "lunes"
          $fecha->locale('es')->shortDayName;                   // string(3) "lun."
          $fecha->locale('es')->minDayName;                     // string(2) "lu"
          $fecha->englishMonth;                                 // string(7) "August"
          $fecha->shortEnglishMonth;                            // string(3) "Aug"
          $fecha->locale('es')->monthName;                      // string(7) "agosto"
          $fecha->locale('es')->shortMonthName;                 // string(3) "ago"
      */
    }


    public function toEdad($pfecha) {
        $result = Carbon::createFromDate($pfecha)->age;
        return $result;
    }

    public function toEdadFull($pfecha) {
        $now    = Carbon::now();
        $result = Carbon::createFromDate($pfecha)->diff($now)->format('%y Años, %m mes y %d dias');
        return $result;
    }

    public function diffDias($pfecha1, $pfecha2) {
        $date1 = Carbon::createFromDate($pfecha1);
        $date2 = Carbon::createFromDate($pfecha2);
        $diff = $date1->diffInDays($date2);
        return $diff;
    }

    public function diffHoras($pfecha1, $pfecha2) {
        $date1 = Carbon::createFromDate($pfecha1);
        $date2 = Carbon::createFromDate($pfecha2);

        $diff = $date1->diffInHours($date2);
        return $diff;
    }

    public function diffMinutos($pfecha1, $pfecha2) {
        $date1 = Carbon::createFromDate($pfecha1);
        $date2 = Carbon::createFromDate($pfecha2);

        $diff = $date1->diffInMinutes($date2);
        return $diff;
    }

    public function diffMes($pfecha1, $pfecha2) {
        $date1 = Carbon::createFromDate($pfecha1);
        $date2 = Carbon::createFromDate($pfecha2);

        $diff = $date1->diffInMonths($date2);
        return $diff;
    }

    public function diffAnios($pfecha1, $pfecha2) {
        $date1 = Carbon::createFromDate($pfecha1);
        $date2 = Carbon::createFromDate($pfecha2);

        $diff = $date1->diffInYears($date2);
        return $diff;
    }

    public function lastDiaMes($anio, $mes) {
        $pfecha1 = $anio . '-' . $mes . '-01';
        $date    = Carbon::createFromDate($pfecha1);
        $result  = $date->endOfMonth()->format('d');
        return $result;
    }

    public function lastFechaMes($anio, $mes) {
        $pfecha1 = $anio . '-' . $mes . '-01';
        $date    = Carbon::createFromDate($pfecha1);
        $result  = $date->endOfMonth()->toDateString();
        return $result;
    }
}
