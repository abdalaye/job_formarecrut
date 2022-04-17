<?php

namespace App\Repositories;

use App\Http\Controllers\UtilitiesController;
use App\Models\Candidat;
use Illuminate\Support\Facades\Hash;

class CandidatRepository
{

    protected $candidat;
    protected $folderCandidat = "candidats/profils";

    public function __construct(Candidat $candidat)
	{
		$this->candidat = $candidat;
	}

	public function store(Array $inputs):bool
	{
		$candidat = new $this->candidat($inputs);

		return $candidat->save();
	}

	public function getById($id):Candidat
	{
		return $this->candidat->findOrFail($id);
    }

	public function update($id, Array $inputs):bool
	{
        $candidat = $this->getById($id);
        return $candidat->update($inputs);
	}

	public function updateStep1($idOrCandidat, Array $inputs):bool
	{
        if($idOrCandidat instanceof Candidat) $candidat = $idOrCandidat;
        else $candidat = $this->getById($idOrCandidat);

        $last_photo = $candidat->getOriginal("photo");
        if($last_photo) UtilitiesController::removeFile($last_photo); //remove File

        if(isset($inputs['photo_upload'])) { //Save Photo

            $photoUrl = UtilitiesController::uploadFile($inputs['photo_upload'],$this->folderCandidat,['jpg', 'png', 'jpeg']);
            if(!$photoUrl) {
                session()->flash("error", "Le chargement de l'image de profil a échoué !");
                $inputs['photo'] = null;
            }
            else $inputs['photo'] = $photoUrl;
        }

        return $candidat->update($inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}
