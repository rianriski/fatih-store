<?php

namespace App\Http\Controllers\API;

class ResponseFormatterController
{
  // membuat format awal JSON
  // pakasi static agar bisa dipanggil pake ::
  // buka file pak sandhika, lupa aku nama materi soal :: ini
  protected static $response = [
    'meta' => [
      'code' => 200,
      'status' => 'success',
      'message' => 'null'
    ],
    'data' => null
  ];

  // ini fungsi jika SUKSES mem-parsing data dari database
  public static function success($data = null, $message = null)
  {

    // memasukkan $message ke $response -> meta -> message
    self::$response['meta']['message'] = $message;

    // memasukkan $data ke $response -> data
    self::$response['data'] = $data;

    // mengembalikan hasil berupa json dari $response
    return response()->json(self::$response, self::$response['meta']['code']);
  }

  // ini fungsi jika GAGAL mem-parsing data dari database
  public static function error($data = null, $message = null, $code = 400)
  {

    // memasukkan info 'error' ke $response -> meta -> status
    self::$response['meta']['status'] = 'error';

    // memasukkan $code ke $response -> meta -> code
    self::$response['meta']['code'] = $code;

    // memasukkan $message ke $response -> meta -> message
    self::$response['meta']['message'] = $message;

    // memasukkan $data ke $response -> data
    self::$response['data'] = $data;


    // mengembalikan hasil berupa json dari $response
    return response()->json(self::$response, self::$response['meta']['code']);
  }
}
