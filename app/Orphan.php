<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

//    use SoftDeletes;

use \Validator;



class Orphan extends Model
{
    //
	

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

	protected $fillable = ["first_name","father_name","grandfather_name","family_name",
	"gender",
	"national_id",
	"birth_date",
	"birth_country",
	"orphan_file",
	"rel_2_bdwin",
	"is_study",
	"reason_no_study",
	"edu_type",
	"study_class",
	"study_stage",
	"edu_name",
	"study_level",
	"live_with",
	"hobbies",
	"is_praying",
	"is_mem_quran",
	"quran_chapters",
	"quran_parts",
	"is_healthy",
	"ill_name",
	"o_classification",
	"profile_image",
	"researcher_notes",
	];

	// Validations' Rules
	private $rules = array(
		'orphan_file'=> 'required',
		'first_name' => 'required|alpha|min:3',
		'father_name'  => 'required|alpha|min:3',
		'grandfather_name'=> 'required|alpha|min:3',
		'family_name'=> 'required|alpha|min:3',
		'gender'=> 'required',
		'national_id'=> 'required|alpha_num|min:5',
		'birth_date'=> 'required|before:01-01-2005',
		'birth_country'=> 'required|alpha|min:3',
		'rel_2_bdwin'=> 'required',
		'edu_type'=> 'required',
		'study_class'=> 'required',
		'edu_name'=> 'required',
		'study_level'=> 'required',
		'live_with'=> 'required',
		'quran_chapters'=> 'required',
		'quran_parts'=> 'required',
		'o_classification'=> 'required',
		'researcher_notes'=> 'required',

		
	);	

	// create a new private attribute to store errors
	//private $Errors;


	// Check Validatations
	public function validate($data)
	{
		// make a new validator object
		$v = Validator::make($data, $this->rules);

		// check for failure
		if ($v->fails())
		{
			//dd($v->messages());
			// set errors and return false
			
			$this->errors = $v->errors();
			return false;
		}

		// validation pass
		return true;
		
	}

	// retrieve the errors object
    public function errors()
    {
        return $this->errors;
    }
		
}
