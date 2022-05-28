<?php

namespace App\Repositories;

use App\Models\Offre;

class OffreRepository
{

    public function __construct(Offre $offre)
	{
		$this->offre = $offre;
	}

	public function store(Array $inputs):bool
	{
		$offre = new $this->offre($inputs);

		return $offre->save();
	}

	public function getById($id):Offre
	{
		return $this->offre->findOrFail($id);
    }

	public function update($id, Array $inputs):bool
	{
        $offre = $this->getById($id);
        return $offre->update($inputs);
	}


	public function destroy($id)
	{
		return $this->getById($id)->delete();
	}

}
