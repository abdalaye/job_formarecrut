<?php

namespace App\Repositories;

use App\Models\Entreprise;
use App\Repositories\BaseRepository;

/**
 * Class SubscriptionRepository
 * @package App\Repositories
 * @version March 18, 2022, 6:02 pm UTC
*/

class EntrepriseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Entreprise::class;
    }

    public function active() 
    {
        return $this->allQuery()->active();
    }

    public function inactive() 
    {
        return $this->allQuery()->inactive();
    }

    public function saveTrainings($trainings, $recruteur) 
    {
        foreach($trainings as $training) {
            $payload = [
                'formation'     => $training['formation'],
                'etablissement' => $training['etablissement'],
                'ville'         => $training['ville'],
                'debut_mois'    => $training['debut_mois'],
                'debut_annee'   => $training['debut_annee'],
                'fin_mois'      => $training['fin_mois'],
                'fin_annee'     => $training['fin_annee'],
                'description'   => $training['description'],
            ];

            $recruteur->trainings()->updateOrCreate([
                'formation' => $payload['formation'],
                'etablissement' => $payload['etablissement'],
            ], $payload);
        }
    }

    public function saveExperiences($experiences, $recruteur)
    {
        foreach($experiences as $experience) {
            $payload = [
                'poste'         => $experience['poste'],
                'employeur'     => $experience['employeur'],
                'ville'         => $experience['ville'],
                'debut_mois'    => $experience['debut_mois'],
                'debut_annee'   => $experience['debut_annee'],
                'fin_mois'      => $experience['fin_mois'],
                'fin_annee'     => $experience['fin_annee'],
                'description'   => $experience['description'],
            ];

            $recruteur->pro_experiences()->updateOrCreate([
                'poste' => $payload['poste'],
                'employeur' => $payload['employeur'],
            ], $payload);
        }
    }
}
