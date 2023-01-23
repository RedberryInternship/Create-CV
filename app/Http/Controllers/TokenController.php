<?php

namespace App\Http\Controllers;

use App\Models\Token;

class TokenController extends Controller
{
	public function generate_token()
	{
		$token_string = md5(rand(1, 10) . microtime());
		while (Token::where('token', $token_string)->count())
		{
			$token_string = md5(rand(1, 10) . microtime());
		}
		$token = Token::create([
			'token' => $token_string,
		]);

		return view('token', [
			'token' => $token->token,
		]);
	}
}
