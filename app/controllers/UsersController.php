<?php
use HireMe\Entities\User;
use HireMe\Managers\RegisterManager;
use HireMe\Repositories\CandidateRepo;
use HireMe\Repositories\CategoryRepo;
use HireMe\Managers\AccountManager;
use HireMe\Managers\ProfileManager;

class UsersController extends BaseController{

	protected $candidateRepo;
	protected $categoryRepo;

	public function __construct(CandidateRepo $candidateRepo,
															CategoryRepo $categoryRepo)
	{
		$this->candidateRepo  = $candidateRepo;
		$this->categoryRepo 	= $categoryRepo;
	}



	public function signUp()
	{
		return View::make('users/sign-up');
	}

	public function register()
	{
		$user = $this->candidateRepo->newCandidate();
		$data = Input::all();

		$manager = new RegisterManager($user, $data);
		$manager->save();

		return Redirect::route('home');
	}

	public function account()
	{
		$user = Auth::user();
		return View::make('users/account', compact('user'));
	}

	public function updateAccount()
	{
		$user = Auth::user();
		$data = Input::all();

		$manager = new AccountManager($user, $data);
		$manager->save();

		return Redirect::route('home');
	}

	public function profile()
	{
		$user = Auth::user();

		$categories = $this->categoryRepo->getList();
		$job_types  = \Lang::get('utils.job_types');

		$candidate = $user->candidate;

		return View::make('users/profile', compact('user','candidate', 'categories', 'job_types'));
	}

	 public function updateProfile()
    {
        $user = Auth::user();
        $candidate = $user->getCandidate();
        $manager = new ProfileManager($candidate, Input::all());

        $manager->save();

        return Redirect::route('home');
    }


	public function profileAccount()
	{
		$user = Auth::user();
		$candidate = $user->candidate;

		$manager = new ProfileManager($candidate, $data);
		$manager->save();

		return Redirect::route('home');
	}
}
