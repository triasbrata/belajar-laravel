<?php namespace App\Repository\User;


/**
* ini class user yang berisi data dummy
*/
class UserRepositoryDummy implements UserRepositoryInterface
{
	/**
	 * refrensinya ada di interface  UserRepositoryInterface
	 */
	public function getUsers()
	{
		return $this->userAll();
	}

	/**
	 * refrensinya ada di interface UserRepositoryInterface
	 */
	public function findUser($id)
	{
		return $this->userAll()->where('id',$id,false)->first();
	}

	/**
	 * ini akan memberikan semua user
	 * @return [type] [description]
	 */
	private function userAll()
	{

		return collect([
			['id'=>1, 'nama'=>'Jamil', 'jenis_kelamin' => 'Laki-Laki'],
			['id'=>2, 'nama'=>'Upi', 'jenis_kelamin' => 'Laki-Laki'],
			['id'=>3, 'nama'=>'Edo', 'jenis_kelamin' => 'Laki-Laki'],
			['id'=>4, 'nama'=>'Maya', 'jenis_kelamin' => 'Perempuan']
		]);
	}
}