<?php

namespace App\Repository\User;

/**
 * interface ini untuk mengatur segala API untuk mengakses data user dari
 * database/data repositori.
 */
interface UserRepositoryInterface
{
    /**
     * ini untuk mengambil data keseluruhan
     * user di data repositori.
     *
     * @return Collection data list user
     */
    public function getUsers();

    /**
     * ini untuk mencari user berdasarkan id yang dicari.
     *
     * @param int $id
     *
     * @return object
     */
    public function findUser($id);

    /**
     * ini untuk menghapus data berdasarkan id.
     *
     * @param [type] $id [description]
     *
     * @return [type] [description]
     */
    public function delete($id);

    /**
     * update data berdasarkan id dan data
     * didapat dari variable request.
     *
     * @param [type] $id      [description]
     * @param [type] $request [description]
     *
     * @return [type] [description]
     */
    public function update($id, $request);

    /**
     * menambahkan data berdasarkan request.
     *
     * @param [type] $request [description]
     *
     * @return [type] [description]
     */
    public function insert($request);
}
