<?php

namespace App\Repositories;

use App\Models\Entreprise;
use App\Repositories\BaseRepository;

/**
 * Class EntrepriseRepository
 * @package App\Repositories
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
}
