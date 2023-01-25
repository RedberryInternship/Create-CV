<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
	/**
	 * Handle the User "created" event.
	 *
	 * @param \App\Models\User $user
	 *
	 * @return void
	 */
	public function creating(User $user)
	{
		$user->key = User::where('token_id', $user->token_id)->max('key') + 1;
	}
}
