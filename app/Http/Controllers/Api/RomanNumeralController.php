<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RomanNumeralResource;
use App\Http\Resources\RomanNumeralResourceCollection;
use App\Http\Resources\RomanNumeralTopTen;
use App\Models\RomanNumeral;
use App\Services\RomanNumeralConverter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RomanNumeralController extends Controller
{
    public function convert(Request $request)
    {


        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'data.int' => 'required|integer|between:0,3999',
        ]);


        // If validation fails return message
        if ($validator->fails()) {
            return response()->json(['message' => $validator->getMessageBag()]);
        }

        // Convert int to roman numeral
        $convertInt = new RomanNumeralConverter();
        $convertInt->convertInteger($request->data['int']);

        // Store conversion request in database
        $store = new RomanNumeral();
        $store->int = $request->data['int'];
        $store->roman_numeral = $convertInt->result;
        $store->save();

        // Response
        return new RomanNumeralResource(RomanNumeral::find($store->id));
    }

    public function recent()
    {
        $romanNumerals = DB::table('roman_numerals')->latest()->get();
        return new RomanNumeralResourceCollection($romanNumerals);
    }

    public function topTen()
    {
        $topTen = RomanNumeral::select('int')
            ->selectRaw('COUNT(*) AS count')
            ->groupBy('int')
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        // Response
        return new RomanNumeralTopTen($topTen);
    }
}
